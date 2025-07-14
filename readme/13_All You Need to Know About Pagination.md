# Laravel Sayfalama (Pagination) - Tüm Komutlar ve Açıklamalar

## Neden Sayfalama Kullanılır?

Binlerce kaydı aynı anda getirmek sunucunuzu ve tarayıcınızı zorlayabilir. Sayfalama, her sayfada görüntülenen ve getirilen kayıt sayısını sınırlar, böylece performans ve kullanıcı deneyimi artar.

## Sayfalama Nasıl Uygulanır?

Sorgunuzu şu şekilde değiştirin:

```php
$jobs = Job::with('employer')->paginate(3);
```

Bu kod, her sayfada işlerle birlikte işverenleri de getirerek 3 kayıt döndürür.

## Sayfalama Linklerini Görüntüleme

Blade görünümünüzde sayfalama linklerini şöyle gösterebilirsiniz:

```blade
{{ $jobs->links() }}
```

Laravel, varsayılan olarak Tailwind CSS ile uyumlu stilli sayfalama kontrolleri üretir.

## Sayfalama Görünümlerini Özelleştirme

Sayfalama işaretlemesini özelleştirmek veya Bootstrap gibi farklı bir CSS framework kullanmak isterseniz, sayfalama görünümlerini yayınlayın:

```bash
php artisan vendor:publish --tag=laravel-pagination
```

Bu komut, düzenleme için görünümleri `resources/views/vendor/pagination` dizinine kopyalar.

Varsayılan sayfalama görünümünü değiştirmek için (ör. Bootstrap 5'e geçmek için) `AppServiceProvider` dosyanızda şu şekilde yapılandırabilirsiniz:

```php
use Illuminate\Pagination\Paginator;

public function boot()
{
    Paginator::useBootstrapFive();
}
```

## Sayfalama Türleri

-   **Standart Sayfalama**: Sayfa numaralarını ve gezinme linklerini gösterir.
-   **Basit Sayfalama**: Sadece "Önceki" ve "Sonraki" linklerini gösterir, sorgu karmaşıklığını azaltır.
-   **Cursor Sayfalama**: Büyük veri kümelerinde daha verimli olan, belirli bir noktadan sonra kayıtları getiren bir işaretçi (cursor) kullanır; doğrudan sayfa numarasıyla gezinme yoktur.

Basit sayfalama örneği:

```php
$jobs = Job::with('employer')->simplePaginate(3);
```

Cursor sayfalama örneği:

```php
$jobs = Job::with('employer')->cursorPaginate(3);
```

## Tüm Pagination Komutları ve Açıklamaları

### 1. Temel Pagination Komutları

```php
// Standart sayfalama - sayfa numaraları ile
$jobs = Job::paginate(10);

// Basit sayfalama - sadece önceki/sonraki
$jobs = Job::simplePaginate(10);

// Cursor sayfalama - büyük veri setleri için
$jobs = Job::cursorPaginate(10);
```

### 2. Sayfalama ile İlişkili Veriler

```php
// İlişkili verileri de getir
$jobs = Job::with('employer')->paginate(10);

// Birden fazla ilişki
$jobs = Job::with(['employer', 'tags'])->paginate(10);
```

### 3. Özel Sayfa Belirtme

```php
// Belirli bir sayfadan başla
$jobs = Job::paginate(10, ['*'], 'page', 2);

// Query parametresi ile
$jobs = Job::paginate(10, ['*'], 'page', request('page', 1));
```

### 4. Sayfalama Bilgileri

```php
// Toplam kayıt sayısı
$jobs->total();

// Mevcut sayfa numarası
$jobs->currentPage();

// Sayfa başına kayıt sayısı
$jobs->perPage();

// Son sayfa numarası
$jobs->lastPage();

// Sonraki sayfa var mı?
$jobs->hasMorePages();

// Önceki sayfa var mı?
$jobs->onFirstPage();
```

### 5. URL Parametreleri Ekleme

```php
// Mevcut query parametrelerini koru
$jobs = Job::paginate(10);
$jobs->appends(request()->query());

// Özel parametreler ekle
$jobs->appends(['sort' => 'name']);

// Blade'de kullanım
{{ $jobs->appends(['sort' => 'name'])->links() }}
```

### 6. Özel Sayfalama Görünümleri

```bash
# Pagination view'larını yayınla
php artisan vendor:publish --tag=laravel-pagination

# Özel view kullan
{{ $jobs->links('custom.pagination') }}
```

### 7. AppServiceProvider'da Yapılandırma

```php
use Illuminate\Pagination\Paginator;

public function boot()
{
    // Bootstrap 4 kullan
    Paginator::useBootstrapFour();

    // Bootstrap 5 kullan
    Paginator::useBootstrapFive();

    // Özel view belirle
    Paginator::defaultView('custom.pagination');

    // Basit sayfalama için özel view
    Paginator::defaultSimpleView('custom.simple-pagination');
}
```

### 8. Sayfalama URL'lerini Özelleştirme

```php
// URL path'ini değiştir
$jobs = Job::paginate(10);
$jobs->withPath('/custom/path');

// Fragment ekle
$jobs->fragment('results');

// Tam URL örneği
{{ $jobs->withPath('/jobs')->fragment('results')->links() }}
```

### 9. Sayfalama ile Filtreleme

```php
// Filtrelenmiş veriler ile sayfalama
$jobs = Job::where('salary', '>', 50000)->paginate(10);

// Arama ile birlikte
$search = request('search');
$jobs = Job::where('title', 'like', "%{$search}%")->paginate(10);
```

### 10. Manuel Sayfalama Oluşturma

```php
use Illuminate\Pagination\LengthAwarePaginator;

$items = collect([/* veriler */]);
$currentPage = request()->get('page', 1);
$perPage = 10;

$paginator = new LengthAwarePaginator(
    $items->forPage($currentPage, $perPage),
    $items->count(),
    $perPage,
    $currentPage,
    ['path' => request()->url()]
);
```

## Sayfalama Sorguları Nasıl Çalışır?

Standart sayfalama, doğru kayıt alt kümesini getirmek için SQL LIMIT ve OFFSET kullanır.  
Cursor sayfalama ise büyük offsetlerin performans maliyetinden kaçınmak için kodlanmış bir işaretçi kullanır.

## Blade Template'de Kullanım Örnekleri

```blade
<!-- Temel sayfalama linkleri -->
{{ $jobs->links() }}

<!-- Özel view ile -->
{{ $jobs->links('custom.pagination') }}

<!-- Parametreler ile -->
{{ $jobs->appends(request()->query())->links() }}

<!-- Sayfalama bilgileri göster -->
<div>
    Toplam {{ $jobs->total() }} kayıt -
    Sayfa {{ $jobs->currentPage() }} / {{ $jobs->lastPage() }}
</div>
```

## Özet

-   Sayfalama, her sayfada gösterilen kayıt sayısını sınırlayarak performansı artırır.
-   Laravel, yerleşik yöntemler ve Blade yardımcıları ile sayfalamayı kolaylaştırır.
-   Sayfalama görünümlerini özelleştirebilir veya farklı CSS frameworkleri kullanabilirsiniz.
-   İhtiyacınıza göre standart, basit veya cursor sayfalama arasında seçim yapabilirsiniz.
-   Sayfalama uygulamasını pratik etmeye devam edin ve on üçüncü gün için hazırsınız!
