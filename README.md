# お問い合わせフォーム

## 環境構築


### Dockerビルド

+ https://github.com/shiorimorita/contact-form0929
+ docker-compose up -d --build

* MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築

+ docker-compose exec php bash
+ composer install
+ .env.example ファイルから .env を作成し、環境変数を変更
+ docker-compose exec php bash を実行後、以下を実行 
+ php artisan key:generate
+ php artisan migrate
+ php artisan db:seed

## 使用技術

* PHP 8.1.33
* Laravel 8.83.8
* mysql Ver 8.0.26

## ER図
<img width="621" height="628" alt="Image" src="https://github.com/user-attachments/assets/08080d0a-13dd-478c-b227-ecb5edbb3b82" />

## URL

* 開発環境 : http://localhost/
* phpMyAdmin : http://localhost:8080/