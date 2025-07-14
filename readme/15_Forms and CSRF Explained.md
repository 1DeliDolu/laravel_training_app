# Laravel Forms ve CSRF Açıklaması

## Formlar için Rotaların Tanımlanması

Yeni bir iş oluşturmak için bir rota eklerken, `jobs/create` URI'sini kullanın. Rota sırasına dikkat edin: `jobs/{id}` gibi joker karakterli rotalar, `jobs/create` gibi spesifik rotalardan sonra gelmelidir, aksi takdirde çakışmalar olabilir.

```php
// Doğru sıralama
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    // Job detayı
});
```

## Görünümlerin Düzenlenmesi

İlgili görünümleri klasörlerde gruplayın, örneğin tüm iş ile ilgili görünümleri `jobs` dizinine yerleştirin. Yaygın adlandırma kurallarını kullanın:

-   `index.blade.php` – tüm işleri listelemek için
-   `show.blade.php` – tek bir işi göstermek için
-   `create.blade.php` – iş oluşturma formu için

Görünümleri referans verirken nokta gösterimini kullanın, örn: `'jobs.create'`.

## Formun Oluşturulması

Tailwind UI form şablonu kullanın, gereksiz bölümleri çıkarın ve giriş alanlarını veritabanı sütunlarınıza (`title`, `salary`) göre ayarlayın. Daha iyi kullanıcı deneyimi için placeholder ve padding ekleyin.

```blade
<form method="POST" action="/jobs">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
        <input type="text" name="title" id="title" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
    </div>
    <!-- Diğer alanlar -->
</form>
```

## Form Gönderimini Yönetme

Varsayılan olarak formlar kendilerine GET ile gönderim yapar. Form metodunu POST olarak değiştirin ve action'ı `/jobs` olarak ayarlayın; bu, kaynak oluşturmak için RESTful bir yaklaşımdır.

Form gönderimini işlemek için routes dosyanıza `/jobs` için bir POST rotası ekleyin:

```php
Route::post('/jobs', function () {
    // Form işleme logic'i
});
```

## CSRF Koruması

Laravel, POST isteklerinde bir token gerektirerek CSRF saldırılarına karşı koruma sağlar. Formunuzun içine `@csrf` Blade direktifini ekleyin, böylece gizli bir token input'u eklenir.

```blade
<form method="POST" action="/jobs">
    @csrf
    <!-- Form alanları -->
</form>
```

Bunu eklemezseniz, form gönderildiğinde 419 hatası (sayfa süresi doldu) alırsınız.

## İstek Verilerine Erişim

Form verilerine erişmek için `request()` helper'ını kullanın:

```php
$request->all(); // tüm form verileri
$request->input('title'); // belirli bir alan
request('title'); // kısa kullanım
```

## Kayıt Oluşturma

Eloquent'in `create()` metodu ile yeni bir iş kaydı oluşturun:

```php
Job::create([
    'title' => request('title'),
    'description' => request('description'),
    'company' => request('company'),
    'salary' => request('salary'),
]);
```

Veya manuel yöntemle:

```php
$job = new Job();
$job->title = request('title');
$job->description = request('description');
$job->company = request('company');
$job->salary = request('salary');
$job->save();
```

`employer_id` alanını modelinizin `$fillable` dizisine eklemeyi veya toplu atama korumasını buna göre devre dışı bırakmayı unutmayın.

## Gönderimden Sonra Yönlendirme

İş oluşturulduktan sonra kullanıcıyı işlerin listelendiği sayfaya yönlendirin:

```php
return redirect('/jobs');
```

Flash mesajı ile birlikte:

```php
return redirect('/jobs')->with('success', 'Job created successfully!');
```

## Doğrulama (Validation)

Form verilerini doğrulamak için:

```php
$validated = request()->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'company' => 'required|string|max:255',
    'salary' => 'required|string|max:255',
]);

Job::create($validated);
```

## Hata Mesajlarını Gösterme

Blade template'te hata mesajlarını göstermek için:

```blade
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

Belirli alan için:

```blade
@error('title')
    <div class="text-red-500 text-sm">{{ $message }}</div>
@enderror
```

## Özet

-   Çakışmaları önlemek için spesifik rotaları joker karakterli rotalardan önce tanımlayın
-   Görünümleri kaynaklara özel klasörlerde ve geleneksel isimlerle düzenleyin
-   Formları hızlıca oluşturmak için Tailwind UI bileşenlerini kullanın
-   Form metodunu POST olarak ayarlayın ve güvenlik için `@csrf` ekleyin
-   İstek verilerine `request()` helper'ı ile erişin
-   Eloquent ile yeni kayıtları güvenli şekilde oluşturun ve toplu atama korumasını unutmayın
-   Başarılı form gönderiminden sonra kullanıcıları yönlendirin
-   Form doğrulama ekleyerek veri bütünlüğünü sağlayın

Bu temel form işlemleri Laravel'de güvenli ve etkili web uygulamaları oluşturmanın temelidir.
