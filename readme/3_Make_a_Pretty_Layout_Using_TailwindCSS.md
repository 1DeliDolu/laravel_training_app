## Navigation Link Component (`nav-link.blade.php`)

```blade
<a {{ $attributes }}>{{ $slot }}</a>
```

Bu kod, Blade component olarak bir navigation link (navigasyon bağlantısı) tanımlar. `{{ $attributes }}` ile gelen tüm HTML attribute'ları (örneğin href, class) otomatik olarak eklenir. `{{ $slot }}` ise component çağrılırken arasına yazılan metni gösterir. Böylece tekrar kullanılabilir ve özelleştirilebilir bir link component'ı elde edilir.

---

## Navigation Bar Kullanımı (`layout.blade.php`)

```blade
<x-nav-link href="/">Home</x-nav-link>
<x-nav-link href="/about">About</x-nav-link>
<x-nav-link href="/contact">Contact</x-nav-link>
```

Bu kodlar, yukarıda tanımlanan `nav-link` component'ını kullanarak bir navigasyon menüsü oluşturur. Her bir menü öğesi için `<x-nav-link>` etiketi kullanılır ve `href` attribute'u ile bağlantı adresi belirtilir. Araya yazılan metin ise linkte görünen isimdir (örneğin Home, About, Contact).

Bu yaklaşım sayesinde, menüdeki linklerin tasarımını veya davranışını tek bir yerden (component dosyasından) kolayca değiştirebilirsiniz. Ayrıca, TailwindCSS gibi bir CSS framework'ü ile component'a class ekleyerek stillendirme işlemlerini merkezi olarak yönetebilirsiniz.

---

## Layout Component Kullanımı ve Başlık Slot'u (`layout.blade.php`)

```blade
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <!-- Diğer içerikler buraya gelecek -->
</x-layout>
```

Bu örnekte, `<x-layout>` component'ı kullanılırken bir de `heading` adında bir slot gönderiliyor. Bu slot, sayfanın başlığını dinamik olarak belirlemenizi sağlar. `x-slot:heading` ile slot'a "Home Page" değeri atanıyor.

---

## TailwindCSS ile Header Bölümü (`layout.blade.php`)

```blade
<header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
    </div>
</header>
```

Bu kod, sayfanın üst kısmında şık bir başlık (header) bölümü oluşturur. TailwindCSS sınıfları ile arka plan, gölge, yazı tipi ve hizalama gibi stiller kolayca uygulanır. `{{ $heading }}` ifadesi, yukarıda slot ile gönderilen başlık değerini dinamik olarak gösterir.

---

## Navigation Link Component (`nav-link.blade.php`)

```blade
<a {{ $attributes }}>{{ $slot }}</a>
```

Bu kod, Blade component olarak bir navigation link (navigasyon bağlantısı) tanımlar. `{{ $attributes }}` ile gelen tüm HTML attribute'ları (örneğin href, class) otomatik olarak eklenir. `{{ $slot }}` ise component çağrılırken arasına yazılan metni gösterir. Böylece tekrar kullanılabilir ve özelleştirilebilir bir link component'ı elde edilir.
