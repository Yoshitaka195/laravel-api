## laravel-api について

Laravel フレームワークを用いた API 開発

### docker 起動

`make up`

### docker 内の laravel_api_php コンテナ内に入る

`make exec`

### パッケージをインストールする

```
cd application
composer install
```

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

### データのマイグレーション

```
php artisan migrate
php artisan db:seed
```

### 設計概略

> Controller
> ↓
> Request
> ↓
> Service
> ↓
> Repository
> ↓
> Entity
> ↓
> Response
> ↓
> Controller

[changelog]: ./CHANGELOG.md
