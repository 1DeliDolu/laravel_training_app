# Laravel Components ile Layout Dosyası Oluşturma

Bu rehber, Laravel projemizde mevcut olan view dosyalarını inceleyerek, tekrar eden kodları azaltmak için Laravel Components kullanarak layout dosyası oluşturmayı açıklar.

## Mevcut Dosyaların Analizi

### 1. Mevcut Route Yapısı (`routes/web.php`)

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
```

**Açıklama:**

-   Ana sayfa (`/`) → `home.blade.php` dosyasını gösterir
-   Hakkında sayfası (`/about`) → `about.blade.php` dosyasını gösterir
-   İletişim sayfası (`/contact`) → `contact.blade.php` dosyasını gösterir

### 2. Mevcut View Dosyaları

#### A. Ana Sayfa (`resources/views/home.blade.php`)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>This is the home page of the Laravel application.</p>
</body>
</html>
```

#### B. Hakkında Sayfası (`resources/views/about.blade.php`)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>
<body>
    <h1>About Page</h1>
    <p>This is the about page of the Laravel application.</p>
    <p>Here you can find more information about the application.</p>
</body>
</html>
```

#### C. İletişim Sayfası (`resources/views/contact.blade.php`)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
</head>
<body>
    <h1>Contact Page</h1>
    <p>This is the contact page of the Laravel application.</p>
    <p>Here you can find contact information for the application.</p>
</body>
</html>
```

## Problem Analizi

### Tekrar Eden Kodlar

Mevcut view dosyalarında şu ortak yapılar tekrar ediyor:

1. **HTML Yapısı:** `<!DOCTYPE html>`, `<html>`, `<head>`, `<body>` etiketleri
2. **Meta Etiketleri:** `charset` ve `viewport` her dosyada aynı
3. **Temel HTML Yapısı:** Sadece `<title>` ve `<body>` içeriği farklı

### Avantajlar ve Dezavantajlar

**Mevcut Yaklaşımın Dezavantajları:**

-   Kod tekrarı (DRY prensibini ihlal ediyor)
-   Bakım zorluğu (her dosyada aynı değişikliği yapmak gerekir)
-   Tutarsızlık riski (farklı dosyalarda farklı yapılar olabilir)
-   Sayfa sayısı arttıkça yönetim zorlaşır

**Layout Kullanmanın Avantajları:**

-   Kod tekrarını azaltır
-   Merkezi yönetim sağlar
-   Tutarlılık garanti eder
-   Bakım kolaylığı sağlar
-   Yeni sayfalar eklemek kolaylaşır

## Laravel Components ile Layout Çözümü

### 1. Layout Component Yaklaşımı

Laravel'de layout oluşturmak için iki ana yöntem vardır:

#### A. Blade Template Inheritance (Miras)

-   `@extends`, `@section`, `@yield` direktifleri kullanır
-   Geleneksel ve yaygın kullanılan yöntemdir

#### B. Laravel Components

-   Daha modern ve esnek yaklaşım
-   `<x-component>` syntax kullanır
-   Daha organize ve yeniden kullanılabilir kod

### 2. Önerilen Layout Yapısı

Mevcut dosyalarınız için şu yapıyı öneririz:

```
resources/views/
├── components/
│   └── layout.blade.php     # Ana layout component
├── home.blade.php           # Ana sayfa (güncellenecek)
├── about.blade.php          # Hakkında sayfası (güncellenecek)
└── contact.blade.php        # İletişim sayfası (güncellenecek)
```

### 3. Component Layout Örneği

#### A. Layout Component (`resources/views/components/layout.blade.php`)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>&copy; 2025 Laravel Training App</p>
    </footer>
</body>
</html>
```

#### B. Güncellenmiş View Dosyaları

**Home Sayfası (`resources/views/home.blade.php`):**

```blade
<x-layout title="Home Page">
    <h1>Welcome to the Home Page</h1>
    <p>This is the home page of the Laravel application.</p>
</x-layout>
```

**About Sayfası (`resources/views/about.blade.php`):**

```blade
<x-layout title="About Page">
    <h1>About Page</h1>
    <p>This is the about page of the Laravel application.</p>
    <p>Here you can find more information about the application.</p>
</x-layout>
```

**Contact Sayfası (`resources/views/contact.blade.php`):**

```blade
<x-layout title="Contact Page">
    <h1>Contact Page</h1>
    <p>This is the contact page of the Laravel application.</p>
    <p>Here you can find contact information for the application.</p>
</x-layout>
```

## Component Syntax Açıklaması

### 1. Layout Component'in Özellikleri

### 2. Component Kullanımı

### 3. Kullanılan Kodlar ve Açıklamaları

#### A. Home View (`resources/views/home.blade.php`)

```blade
<x-layout>
<h1>Welcome to the Home Page</h1>
</x-layout>
```

**Açıklama:**

-   `<x-layout>` etiketi ile layout component'i kullanılır.
-   `<h1>Welcome to the Home Page</h1>` satırı, bu sayfaya özel içeriği belirtir.
-   Bu yapı sayesinde, sadece içerik kısmı değişerek tüm sayfalar ortak bir şablon ile gösterilir.

#### B. Layout Component (`resources/views/Components/layout.blade.php`)

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>
    {{ $slot }}
</body>
</html>
```

**Açıklama:**

-   Bu dosya, tüm sayfalar için ortak bir şablon (layout) sağlar.
-   `<nav>` etiketiyle bir menü oluşturulmuştur.
-   `{{ $slot }}` satırı, bu component ile sarmalanan içeriğin (slot) yerleştirileceği yerdir.
-   Sayfa başlığı ve meta etiketleri de burada tanımlanır.

**`{{ $slot }}` Nedir?**

-   Blade component'lerinde, `<x-layout>...</x-layout>` arasına yazılan tüm içerik, layout dosyasındaki `{{ $slot }}` ifadesinin olduğu yere otomatik olarak yerleştirilir.
-   Böylece, farklı sayfalar sadece içeriklerini değiştirerek aynı şablonu kullanabilir.

## Implementasyon Adımları

### 1. Layout Component Oluşturma

```bash
# Component dosyasını oluşturun
mkdir -p resources/views/components
touch resources/views/components/layout.blade.php
```

### 2. Mevcut View Dosyalarını Güncelleme

-   Her view dosyasını layout component kullanacak şekilde güncelleyin
-   Tekrar eden HTML kodlarını kaldırın
-   Sadece sayfa-specific içerikleri bırakın

### 3. Test Etme

```bash
# Sunucuyu başlatın
php artisan serve

# Sayfaları test edin
# http://localhost:8000
# http://localhost:8000/about
# http://localhost:8000/contact
```

## Sonuç

Laravel Components kullanarak layout oluşturmak:

-   Kod tekrarını azaltır
-   Bakım kolaylığı sağlar
-   Tutarlı tasarım garanti eder
-   Yeni sayfalar eklemek kolaylaşır

Bu yaklaşım, özellikle büyük projelerde çok faydalıdır ve Laravel'in modern özelliklerini kullanarak clean code prensiplerini uygular.
