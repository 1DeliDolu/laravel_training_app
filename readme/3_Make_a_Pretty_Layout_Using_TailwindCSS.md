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
