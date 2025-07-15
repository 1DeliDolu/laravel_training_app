# Laravel Login ve Kayıt Sistemi Oluşturma - Bölüm 1

## Form Bileşenlerini Çıkarma

Formları verimli bir şekilde oluşturmak için, yeniden kullanılabilir Blade bileşenleri oluşturun:

-   `form-label.blade.php` — form etiketleri için
-   `form-error.blade.php` — doğrulama hatalarını görüntülemek için
-   `form-input.blade.php` — giriş alanları için

Bu bileşenler esnek olmak için attributes ve slot'ları kabul eder.

Formda örnek kullanım:

```blade
<x-form-label for="title">Başlık</x-form-label>
<x-form-input id="title" name="title" required />
<x-form-error name="title" />
```

## Kayıt ve Giriş Formları Oluşturma

1. `auth` dizini altında `register.blade.php` ve `login.blade.php` görünümlerini oluşturun
2. Ad, soyad, e-posta, şifre ve şifre onayı için giriş alanları oluşturmak üzere form bileşenlerini kullanın
3. İstemci tarafı doğrulama için gerekli attribute'ları ekleyin

## Authentication Route'ları ve Controller'ları Tanımlama

1. Kayıt ve giriş formlarını göstermek için route'lar ekleyin (`GET /register`, `GET /login`)
2. Form gönderimlerini işlemek için route'lar ekleyin (`POST /register`, `POST /login`)
3. `RegisteredUserController` ve `SessionController` gibi karşılık gelen controller'ları `create` ve `store` methodları ile oluşturun

## Authentication Linklerini Koşullu Olarak Görüntüleme

Giriş ve kayıt linklerini sadece misafirlere göstermek için Blade direktiflerini kullanın:

```blade
@guest
    <x-nav-link href="/login">Giriş</x-nav-link>
    <x-nav-link href="/register">Kayıt</x-nav-link>
@endguest
```

Sadece kimlik doğrulaması yapılmış kullanıcılara içerik göstermek için `@auth` kullanın.

## Form Bileşenleri Örnekleri

### form-label.blade.php

```blade
@props(['for' => ''])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium leading-6 text-gray-900']) }} for="{{ $for }}">{{ $slot }}</label>
```

### form-input.blade.php

```blade
@props(['type' => 'text', 'name', 'id' => '', 'value' => '', 'required' => false])

<input
    {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500']) }}
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id ?: $name }}"
    value="{{ old($name, $value) }}"
    {{ $required ? 'required' : '' }}>
```

### form-error.blade.php

```blade
@props(['name'])

@error($name)
    <div {{ $attributes->merge(['class' => 'text-red-600 text-sm mt-1']) }}>
        {{ $message }}
    </div>
@enderror
```

## Örnek Kayıt Formu

```blade
<form method="POST" action="/register">
    @csrf

    <div class="mb-4">
        <x-form-label for="first_name">Ad</x-form-label>
        <x-form-input name="first_name" type="text" required />
        <x-form-error name="first_name" />
    </div>

    <div class="mb-4">
        <x-form-label for="last_name">Soyad</x-form-label>
        <x-form-input name="last_name" type="text" required />
        <x-form-error name="last_name" />
    </div>

    <div class="mb-4">
        <x-form-label for="email">E-posta</x-form-label>
        <x-form-input name="email" type="email" required />
        <x-form-error name="email" />
    </div>

    <div class="mb-4">
        <x-form-label for="password">Şifre</x-form-label>
        <x-form-input name="password" type="password" required />
        <x-form-error name="password" />
    </div>

    <div class="mb-4">
        <x-form-label for="password_confirmation">Şifre Onayı</x-form-label>
        <x-form-input name="password_confirmation" type="password" required />
        <x-form-error name="password_confirmation" />
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
        Kayıt Ol
    </button>
</form>
```

## Controller Örnekleri

### RegisteredUserController

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
```

### SessionController

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Verilen bilgiler kayıtlarımızla eşleşmiyor.',
        ]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
```

## Route Tanımları

```php
// web.php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
```

## Özet

-   Temiz ve sürdürülebilir formlar oluşturmak için form bileşenlerini yeniden kullanın
-   Authentication işlemleri için route'lar ve controller'lar tanımlayın
-   Navigasyon linklerini koşullu olarak görüntülemek için Blade direktiflerini kullanın
-   Formlar için istemci tarafı ve sunucu tarafı doğrulama uygulayın
-   Güvenlik için şifreleri hash'leyin ve session'ları yeniden oluşturun
-   Kullanıcı deneyimi için uygun yönlendirmeler yapın
