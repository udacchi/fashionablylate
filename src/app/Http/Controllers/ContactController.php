<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;



class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return view('index', ['categories' => $categories]);
    }

    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();

        $categoryName = Category::find($validated['category_id'])->name ?? '未指定';
        $validated['category_name'] = $categoryName;

        $genderLabels = [
            'male' => '男性',
            'female' => '女性',
            'others' => 'その他',
        ];
        $validated['gender_label'] = $genderLabels[$validated['gender']] ?? '不明';

        return view('confirm', ['inputs' => $validated]);
    }

    public function store(Request $request)
    {
        Contact::create($request->except('_token'));

        return view('thanks');
    }

    public function revise(Request $request)
    {
        $categories = Category::select('id', 'name')->get();

        return redirect('/')
            ->withInput($request->all()) 
            ->with(['categories' => $categories]); 
    }
}
