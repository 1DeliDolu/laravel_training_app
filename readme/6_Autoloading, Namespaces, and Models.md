# Autoloading, Namespaces, and Models

Bu bölümde, PHP/Laravel'de değişkenlerin ve kodun nasıl yüklendiği, namespace kullanımı ve model yapısına giriş yapılır. Ayrıca, bir değişkenin route ile nasıl kullanıldığı örneklenmiştir.

## Örnek: $jobs Değişkeninin Tanımı ve Route ile Kullanımı

Aşağıdaki kodda, `$jobs` adında bir dizi tanımlanmış ve bu dizi, ana sayfa route'u (`/`) ile view dosyasına aktarılmıştır:

```php
$jobs=[
    ['title' => 'Software Engineer', 'company' => 'Tech Corp'],
    ['title' => 'Data Analyst', 'company' => 'Data Solutions'],
    ['title' => 'Web Developer', 'company' => 'Web Innovations'],
];

use Illuminate\Support\Facades\Route;

Route::get('/', function () use ($jobs) {
    return view('home', ['jobs' => $jobs]);
});
```

### Açıklama

-   `$jobs` dizisi, route tanımının üstünde global olarak tanımlanmıştır.
-   `use ($jobs)` ifadesi ile, bu değişken route fonksiyonu içinde kullanılabilir hale getirilmiştir (PHP'de closure ile değişken kullanımı).
-   Route çalıştığında, `$jobs` dizisi `home` view'ına aktarılır.

Bu yapı, küçük projelerde veya hızlı prototiplemede kullanılabilir. Daha büyük projelerde ise veriler genellikle bir model üzerinden alınır ve controller ile view'a aktarılır.
