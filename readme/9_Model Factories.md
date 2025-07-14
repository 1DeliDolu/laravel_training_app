Factory'ler Nedir?
Factory'ler, modelleriniz için sahte (fake) veri oluşturmanızı sağlar. Örneğin, test için 10 kullanıcı oluşturmak veya yerel ortamınızı elle tek tek girmeden çok sayıda iş ilanı ile doldurmak isteyebilirsiniz.

Laravel, kullanıcı (User) modeli için varsayılan bir UserFactory ile gelir ve burada isim, e-posta ve zaman damgaları gibi kullanıcı özellikleri için sahte veriler tanımlanır. Ayrıca, bir kullanıcının doğrulanmamış (unverified) hali gibi ek durumlar da, özellikleri değiştirerek tanımlanabilir.

Factory'leri Tinker ile Kullanmak
Factory'leri Laravel kodunuzun her yerinde kullanabilirsiniz, ancak denemek için harika bir yer Artisan Tinker'dır. Tinker, Laravel için etkileşimli bir REPL'dir:

php artisan tinker
Bir factory ile kullanıcı oluşturma örneği:

User::factory()->create();
Eğer eksik sütunlar gibi hatalar alırsanız, veritabanı şemanızın factory'deki özelliklerle uyumlu olduğundan emin olun. Örneğin, users tablonuzda name sütununu firstName ve lastName olarak değiştirdiyseniz, factory'i aşağıdaki gibi güncelleyin:

'firstName' => $this->faker->firstName(),
'lastName' => $this->faker->lastName(),
Kodunuzda değişiklik yaptıktan sonra Tinker'ı yeniden başlatmayı unutmayın.

Birden Fazla Kayıt Oluşturmak
Birden fazla kaydı aynı anda oluşturmak için:

User::factory()->count(100)->create();
Bu komut, hızlıca 100 sahte kullanıcı oluşturur.

İş İlanları İçin Factory Oluşturmak
Kullanıcı factory'sini kopyalamak yerine, Job modeliniz için yeni bir factory oluşturun:

php artisan make:factory JobFactory --model=Job
JobFactory içinde, title ve salary gibi özellikleri tanımlayın. Gerçekçi veriler için Faker'ın jobTitle gibi metodlarını kullanabilirsiniz. Eğer çeşitlilik gerekmiyorsa, değerleri sabit de verebilirsiniz.

Örnek:

public function definition()
{
    return [
        'title' => $this->faker->jobTitle(),
        'salary' => $this->faker->numberBetween(30000, 100000),
    ];
}
Factory'leri İlişkilerle Kullanmak
Eğer Job modeliniz bir Employer'a aitse, bu ilişkiyi factory'de EmployerFactory oluşturarak ve referans vererek tanımlayabilirsiniz:

'employer_id' => Employer::factory(),
Bu, Laravel'e bir iş oluştururken yeni bir işveren kaydı oluşturmasını ve ilişkilendirmesini söyler.

"Emlpoyer factory bulunamadı" gibi hatalar alırsanız, factory'yi oluşturduğunuzdan ve modelinize HasFactory trait'ini eklediğinizden emin olun.

Factory Durumları (States)
Factory'ler, bir modelin farklı varyasyonlarını temsil eden durumlar tanımlayabilir. Örneğin, UserFactory'de emailVerifiedAt alanını null yapan unverified durumu vardır:

public function unverified()
{
    return $this->state(fn (array $attributes) => [
        'email_verified_at' => null,
    ]);
}
Bu durumda bir kullanıcı oluşturmak için:

User::factory()->unverified()->create();
Kendinize özel durumlar da tanımlayabilirsiniz, örneğin yönetici (admin) yetkisine sahip kullanıcılar için bir admin durumu gibi.

Özet
Factory'ler, modeller için sahte veri üretir ve test ile yerel geliştirme için kullanışlıdır.
Artisan Tinker ile factory'leri etkileşimli olarak oluşturup test edebilirsiniz.
Factory'leri Artisan komutlarıyla oluşturun ve Faker ile özellikleri tanımlayın.
Factory'ler, diğer factory'lere referans vererek ilişkileri yönetebilir.
Durumlar (states), belirli senaryolar için model varyasyonları oluşturmanıza olanak tanır.
Bir sonraki bölümde Eloquent ilişkilerini detaylıca inceleyeceğiz. Görüşmek üzere!

## Tek Komutla Model, Factory, Migration ve Controller Oluşturmak

Laravel'de tek bir komutla hem model, hem factory, hem migration hem de controller dosyalarını oluşturabilirsin. Bunun için aşağıdaki Artisan komutunu kullan:

```bash
php artisan make:model Job -a
```

Bu komut ile otomatik olarak şunlar oluşturulur:

- `app/Models/Job.php` (Model)
- `database/migrations/xxxx_xx_xx_create_jobs_table.php` (Migration)
- `database/factories/JobFactory.php` (Factory)
- `app/Http/Controllers/JobController.php` (Controller)

Bu sayede, tek tek dosya oluşturmakla uğraşmadan hızlıca geliştirmeye başlayabilirsin.
