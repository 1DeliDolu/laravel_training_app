
On birinci güne hoş geldiniz! Bugün, modellerinizin birbirleriyle nasıl ilişkilendirileceğini tanımlamanızı sağlayan güçlü bir özellik olan Eloquent İlişkileri'ne dalıyoruz.

## Modeller Arası İlişkilerin Tanımlanması

Daha önce, bir iş ilanının bir işverene ait olduğunu belirtmiştik. Veritabanı şeması bunu bir yabancı anahtar ile gösterirken, PHP kodumuzda da bu ilişkiyi ifade etmemiz gerekir.

Job modelinizde, ilişkiyi döndüren bir `employer` metodu tanımlayın:

```php
public function employer()
{
    return $this->belongsTo(Employer::class);
}
```

Bu, Eloquent'a her işin bir işverene ait olduğunu söyler.

## İlişki Türleri

Bazı yaygın Eloquent ilişki türleri şunlardır:

- **belongsTo:** Ters bir bire-bir veya çoklu ilişkiyi tanımlar (ör. bir iş bir işverene aittir).
- **hasMany:** Bire-çok ilişkiyi tanımlar (ör. bir işverenin birden fazla işi vardır).
- **hasOne**
- **belongsToMany**

Şimdilik belongsTo ve hasMany üzerinde duracağız.

## İlişkili Modellerin Erişimi

Artisan Tinker kullanarak bir işi çekip işverenine şu şekilde erişebilirsiniz:

```php
$job = App\Models\Job::first();
$employer = $job->employer; // Özellik olarak erişilir, metod olarak değil
```

Eloquent, tembel yükleme (lazy loading) kullanır; yani ilişkili işveren verisi yalnızca employer özelliğine eriştiğinizde, ayrı bir SQL sorgusu ile getirilir.

## Ters İlişkinin Tanımlanması

Employer modelinde, ters ilişkiyi şu şekilde tanımlayın:

```php
public function jobs()
{
    return $this->hasMany(Job::class);
}
```

Bu sayede bir işverenin tüm işlerine erişebilirsiniz:

```php
$employer = App\Models\Employer::first();
$jobs = $employer->jobs; // Job modellerinden oluşan bir koleksiyon döner
```

Eloquent koleksiyonları diziler gibi davranır, ancak filtreleme ve işleme için birçok yardımcı metot içerir.

## Özet

- Eloquent modellerinizde belongsTo ve hasMany gibi metotlarla ilişkileri tanımlayın.
- İlişkili modellere özellik olarak erişin, bu tembel yüklemeyi tetikler.
- Bu iki ilişki türü, en yaygın kullanım senaryolarını kapsar.
- belongsToMany ve polimorfik ilişkiler gibi daha karmaşık ilişkiler ileride ele alınacaktır.