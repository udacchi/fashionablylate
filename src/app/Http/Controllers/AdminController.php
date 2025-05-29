<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"]);
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->gender !== null && $request->gender !== '' && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('type')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->type);
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);

        $contactTypes = [
            '商品のお届けについて',
            '商品の交換について',
            '商品トラブル',
            'ショップへのお問い合わせ',
            'その他'
        ];

        $genders = [
            '' => '性別',
            'all' => '全て',
            ' male ' => ' 男性 ',
            ' female ' => ' 女性 ',
            ' others ' => ' その他 '
        ];

        return view('admin.index', compact('contacts', 'contactTypes', 'genders'));
    }

    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);

        if (request()->ajax()) {
            return view('admin._modal', compact('contact'));
        }

        return view('admin.show', compact('contact'));
    }

    public function export(Request $request)
    {
        $contacts = Contact::query();

        if ($request->filled('name')) {
            $contacts->where('name', 'like', '%' . $request->name . '%');
        }

        $contacts = $contacts->get();

        $csvHeader = [
            'お名前',
            '性別',
            'メールアドレス',
            'お問い合わせの種類',
            'お問い合わせ内容',
            '登録日時'
        ];

        $csvData = $contacts->map(function ($contact) {
            return [
                $contact->name,
                $contact->gender,
                $contact->email,
                optional($contact->category)->name ?? '未分類',
                $contact->content,
                $contact->created_at->format('Y-m-d H:i:s'),
            ];
        });

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader);

        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('message', 'お問い合わせを削除しました');
    }
}
