# View Data and Route Wildcards

Bu bölümde, Laravel'de bir route üzerinden view'a veri nasıl aktarılır ve bu veriler view dosyasında nasıl kullanılır, örnekle açıklanmıştır.

## 1. Route Üzerinden View'a Veri Aktarma

`routes/web.php` dosyasında ana sayfa (`/`) için bir route tanımlanmıştır. Bu route içinde `$jobs` adında bir dizi oluşturulmuş ve bu dizi, `view()` fonksiyonu ile `home` view'ına aktarılmıştır:

```php
Route::get('/', function () {
    $jobs = [
        ['title' => 'Software Engineer', 'company' => 'Tech Corp'],
        ['title' => 'Data Analyst', 'company' => 'Data Solutions'],
        ['title' => 'Web Developer', 'company' => 'Web Innovations'],
    ];
    return view('home', ['jobs' => $jobs]);
});
```

Burada `$jobs` dizisi, `home` view'ına `jobs` anahtarı ile gönderilmiştir.

## 2. View Dosyasında Veriyi Kullanmak

`resources/views/home.blade.php` dosyasında, gönderilen `$jobs` verisi bir döngü ile ekrana yazdırılır. Aşağıdaki kod parçası, ilgili kısmı göstermektedir:

```blade
<div class="mt-6">
    <h2 class="text-xl font-semibold">Available Jobs</h2>
    <ul class="mt-4 space-y-2">
        @foreach ($jobs as $job)
            <li class="p-4 bg-white shadow rounded-md">
                <h3 class="text-lg font-medium">{{ $job['title'] }}</h3>
                <p class="text-gray-600">Company: {{ $job['company'] }}</p>
            </li>
        @endforeach
    </ul>
</div>
```

Bu bölümde, `$jobs` dizisindeki her bir iş için başlık ve şirket bilgisi listelenir.

## Özet

-   Route içinde oluşturulan veri, `view()` fonksiyonu ile Blade dosyasına aktarılır.
-   Blade dosyasında bu veri, döngü ile ekrana yazdırılır.

Bu yöntemle, dinamik verileri view dosyalarınızda kolayca kullanabilirsiniz.
