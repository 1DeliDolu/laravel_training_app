# Laravel Training App - İlk Route ve View

Bu rehber Laravel training app projesi için temel komutları ve ilk route ile view oluşturmayı açıklar.

## Temel Laravel Komutları

### 1. Geliştirme Sunucusunu Başlatma

```bash
php artisan serve
```

**Açıklama:**

-   Bu komut Laravel'in yerleşik geliştirme sunucusunu başlatır
-   Varsayılan olarak `http://localhost:8000` adresinde çalışır
-   Sadece geliştirme ortamında kullanılır, production için uygun değildir
-   Sunucuyu durdurmak için `Ctrl+C` tuşlarını kullanın

### 2. Frontend Asset'lerini Derleme (Development)

```bash
npm run dev
```

**Açıklama:**

-   Vite build tool'unu kullanarak CSS ve JavaScript dosyalarını derler
-   Geliştirme modunda çalışır (minify edilmemiş dosyalar)
-   Hot reload özelliği ile dosya değişikliklerini otomatik olarak tarayıcıya yansıtır
-   `resources/css/app.css` ve `resources/js/app.js` dosyalarını derler

### 3. Composer Bağımlılıklarını Yükleme

```bash
composer install
```

**Açıklama:**

-   `composer.json` dosyasında tanımlanan PHP bağımlılıklarını yükler
-   `vendor/` klasörünü oluşturur ve tüm paketleri bu klasöre yükler
-   Proje ilk kez kurulduğunda çalıştırılması gereken komuttur

### 4. Composer Autoload'u Yenileme

```bash
composer dump-autoload
```

**Açıklama:**

-   Autoload dosyalarını yeniler
-   Yeni sınıflar eklendiğinde veya namespace değişikliklerinde kullanılır

## Tam Kurulum Süreci

Laravel projesini ilk kez çalıştırmak için sırasıyla şu komutları çalıştırın:

```bash
# 1. Composer bağımlılıklarını yükle
composer install

# 2. NPM paketlerini yükle
npm install

# 3. Environment dosyasını oluştur
copy .env.example .env

# 4. Uygulama anahtarını oluştur
php artisan key:generate

# 5. Veritabanı migration'larını çalıştır
php artisan migrate

# 6. Frontend asset'lerini derle
npm run dev

# 7. Geliştirme sunucusunu başlat (yeni terminal penceresi)
php artisan serve
```

## İlk Route ve View Oluşturma

### 1. Mevcut web.php Dosyasının Açıklaması

Önce mevcut `routes/web.php` dosyasını satır satır inceleyelim:

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

**Satır Satır Açıklama:**

1. **`<?php`** - PHP açılış etiketi. Tüm PHP dosyaları bu etiketle başlar.

2. **Boş satır** - Kod okunabilirliği için boş satır.

3. **`use Illuminate\Support\Facades\Route;`** - Laravel'in Route facade'ini içe aktarır. Bu, route tanımlamak için gerekli sınıfı kullanıma sunar.

4. **Boş satır** - Kod okunabilirliği için boş satır.

5. **`Route::get('/', function () {`** - HTTP GET isteği için route tanımlar:

    - `Route::get()` - GET metodunu belirtir
    - `'/'` - Ana sayfa URL'ini belirtir (localhost:8000/)
    - `function () {` - Anonim fonksiyon başlatır (closure)

6. **`return view('welcome');`** - `resources/views/welcome.blade.php` view dosyasını döndürür

7. **`});`** - Anonim fonksiyonu ve route tanımını kapatır

### 2. Route Tanımlama

`routes/web.php` dosyasını açın ve yeni bir route ekleyin:

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Yeni route örneği
Route::get('/hello', function () {
    return view('hello');
});

// Parametreli route örneği
Route::get('/hello/{name}', function ($name) {
    return view('hello', ['name' => $name]);
});
```

### 2. View Oluşturma

`resources/views/hello.blade.php` dosyasını oluşturun:

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Hello Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <h1>Merhaba Laravel!</h1>
        @if(isset($name))
            <p>Merhaba, {{ $name }}!</p>
        @else
            <p>Hoş geldiniz!</p>
        @endif
    </div>
</body>
</html>
```

### 3. Controller Kullanarak Route Oluşturma

Daha organize bir yapı için controller kullanabilirsiniz:

```bash
# Controller oluştur
php artisan make:controller HelloController
```

`app/Http/Controllers/HelloController.php` dosyasını düzenleyin:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return view('hello');
    }

    public function show($name)
    {
        return view('hello', ['name' => $name]);
    }
}
```

Route'ları controller'a bağlayın (`routes/web.php`):

```php
use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'index']);
Route::get('/hello/{name}', [HelloController::class, 'show']);
```

## Yararlı Artisan Komutları

```bash
# Tüm artisan komutlarını listele
php artisan list

# Route'ları listele
php artisan route:list

# Cache'i temizle
php artisan cache:clear

# Config cache'i temizle
php artisan config:clear

# View cache'i temizle
php artisan view:clear

# Yeni migration oluştur
php artisan make:migration create_posts_table

# Yeni model oluştur
php artisan make:model Post

# Yeni controller oluştur
php artisan make:controller PostController
```

## Geliştirme İpuçları

1. **Debug Modu**: `.env` dosyasında `APP_DEBUG=true` olarak ayarlayın
2. **Log Dosyaları**: `storage/logs/laravel.log` dosyasını kontrol edin
3. **Blade Template**: View dosyalarında `.blade.php` uzantısını kullanın
4. **Asset Yönetimi**: CSS ve JS dosyalarını `@vite` direktifi ile dahil edin

## Sonuç

Bu temel komutlar ve örnekler ile Laravel training app projenizde çalışmaya başlayabilirsiniz. Daha detaylı bilgi için [Laravel Dokümantasyonu](https://laravel.com/docs) inceleyebilirsiniz.
