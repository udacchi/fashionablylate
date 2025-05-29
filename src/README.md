＃お問い合せフォーム

＃＃環境構築
　①$ git clone git@github.com:coachtech-material/laravel-docker-template.git
　②$ mv laravel-docker-template fashionablylate　→ 　$ cd fashionablylate
　③$ git remote set-url origin git@github.com:udacchi/fashionablylate.git
　④$ git remote -v　→ 　$ git add .　→ 　$ git commit -m "リモートリポジトリの変更"　→ 　$ git push origin main
　⑤$ code 。　→ 　docker-compose.ymlの21行目と34行目にplatform:linux/amd64を追記して $ docker-compose up -d --build
　⑥$ docker-compose exec php bash　→ 　$ composer install　→ 　$ php artisan key:generate
　⑦$ cp .env.example .env　→ 　.envファイルの修正
　⑧$ php artisan make:migration create_contacts_table　→ 　$ php artisan migrate
　⑨$ php artisan make:seeder CategoryySeeder　→ 　$ php artisan db:seed

＃＃使用技術（実行環境）
　・Laravel Framework 8.83.8
　・PHP 7.4.9
　・MySQL 9.2.0 Homebrew
　・Docker 27.5.1
　・HTML / CSS / JavaScript（jQuery）
　・Blade テンプレートエンジン

＃＃ER図図
　![ER図](docs/er-diagram.png)

＃＃URL
　・開発環境：http://localhost/
　・phpMyAdmin：http://localhost:8080/
