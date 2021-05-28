## owned-media-admin-api について

Laravel フレームワークを用いた API 開発

### docker 立ち上げ

`make up`

### docker 内の laravel_api_php コンテナ内に入る

`make exec`

### パッケージをインストールする

```
cd application
composer install
```

### laravel プロジェクトを抜ける

`exit`

### laravel と mysql を接続する

### application 配下に.env を作成し、下記を編集

```
// .env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=application
DB_USERNAME=root
DB_PASSWORD=root
```

### db データの作成

```
php artisan migrate
php artisan db:seed
```

[changelog]: ./CHANGELOG.md
