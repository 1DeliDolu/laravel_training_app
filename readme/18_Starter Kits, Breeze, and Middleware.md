## Laravel Breeze Starter Kit Kullanımı

Laravel projesini Breeze ile hızlıca başlatmak için şu komutu çalıştırabilirsiniz:

```bash
laravel new app
```

Kurulum sırasında **Breeze** starter kit’ini seçin. Breeze, yeni bir proje için tasarlanmıştır ve bazı dosyaları (routes, views, components) üzerine yazar.

Breeze; React, Vue, Livewire veya klasik Blade + JavaScript gibi farklı frontend seçeneklerini destekler. Bu örnekte, karanlık mod olmadan Blade stack’i seçildi.

Kurulumdan sonra uygulamanızı başlatın (`php artisan serve` veya Herd ile erişin). Giriş ve kayıt bağlantılarını göreceksiniz.

### İçerdiği Özellikler

- Kayıt ve giriş formları
- Sadece giriş yapmış kullanıcıların erişebileceği dashboard
- Profil düzenleme ve şifre güncelleme
- Güvenli çıkış (logout) işlemi
- Rotaları koruyan ve misafirleri giriş sayfasına yönlendiren middleware

### Breeze’de Kimlik Doğrulama Nasıl Çalışır?

- Rotalar, sadece giriş yapmış ve doğrulanmış kullanıcıların erişebilmesi için `auth` ve `verified` gibi middleware’lerle korunur.
- Giriş yapan kullanıcıya `Auth` facade’ı veya helper’ı ile erişebilirsiniz.
- Breeze, layout, input, label ve validasyon hataları için Blade bileşenlerini yoğun şekilde kullanır.
- Kayıt işlemi; doğrulama, şifreyi hash’leme, event tetikleme ve otomatik giriş adımlarını içerir.

### Middleware Nedir?

Middleware, istekler uygulama mantığına ulaşmadan önce arada çalışan katmanlardır. Örneğin, `auth` middleware’i kullanıcı giriş yapmamışsa onu giriş sayfasına yönlendirir.

---

**Özetle:**

- Breeze gibi starter kit’ler, kimlik doğrulama altyapısını sıfırdan kurma zahmetini ortadan kaldırır.
- Breeze, temel kimlik doğrulama ve rota koruma özelliklerini içerir.
- Middleware, güvenli erişim kontrolü sağlar.
- Breeze’in kaynak kodunu inceleyerek Laravel’de kimlik doğrulama mantığını öğrenebilirsiniz.

Bir sonraki bölümde, starter kit olmadan kimlik doğrulamanın nasıl yapılacağını göreceğiz. Görüşmek üzere!
