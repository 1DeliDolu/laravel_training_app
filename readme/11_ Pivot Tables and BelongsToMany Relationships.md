
### Tag Modelini ve Migration'ı Oluşturma
Öncelikle, Tag modelini migration ve factory ile birlikte oluşturun:

```bash
php artisan make:model Tag -mf
```

Migration dosyasında, `tags` tablosuna bir `name` sütunu ekleyin.

### Pivot Tablosu Oluşturma
Jobs ve tags tablolarını ilişkilendirmek için bir pivot tablosu oluşturun (genellikle ilgili tabloların tekil halleri alfabetik sırayla birleştirilir, örn: `job_tag`).

Pivot tablosunda hem `job_listing_id` hem de `tag_id` için foreign ID sütunları olmalıdır:

```php
$table->foreignId('job_listing_id')->constrained()->cascadeOnDelete();
$table->foreignId('tag_id')->constrained()->cascadeOnDelete();
$table->timestamps();
```

> Not: Jobs tablonuzun adı `job_listings` olduğu için, foreign key sütununu `job_listing_id` olarak belirtin.

### Foreign Key Kısıtlamalarını Zorunlu Kılma
Silinen bir iş veya etiket ile ilişkili pivot kayıtlarının da silinmesi için foreign key kısıtlamalarını ve cascade silme işlemlerini ekleyin. Böylece yetim kayıtlar oluşmaz.

Eğer doğrudan SQLite kullanıyorsanız, foreign key kısıtlamalarını manuel olarak etkinleştirmeniz gerekebilir:

```sql
PRAGMA foreign_keys = ON;
```
Laravel uygulamanızda bu varsayılan olarak etkindir.

### Modellerde Çoktan-Çoğa İlişki Tanımlama
**Job** modelinde `tags` metodu:

```php
public function tags()
{
    return $this->belongsToMany(Tag::class, 'job_tag', 'job_listing_id', 'tag_id');
}
```

**Tag** modelinde tersine `jobs` metodu:

```php
public function jobs()
{
    return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_listing_id');
}
```

Tablo isimleriniz Laravel’in varsayılanlarından farklı olduğu için pivot tablo adını ve foreign key sütunlarını açıkça belirtin.

### İlişkinin Kullanımı
Bir işin etiketlerine erişmek için:

```php
$job = Job::find(10);
$tags = $job->tags; // Tag modellerinin koleksiyonu döner
```

Bir etiketin ilişkili olduğu işlere erişmek için:

```php
$tag = Tag::find(1);
$jobs = $tag->jobs; // Job modellerinin koleksiyonu döner
```

### İlişkili Modelleri Eklemek ve Kaldırmak
Bir etiketi bir işe eklemek için:

```php
$tag->jobs()->attach($jobId);
```

> Not: İlişkiye property olarak eriştiğinizde önbelleğe alınmış koleksiyon döner. En güncel veriyi almak için ilişkiyi metod olarak çağırıp `get()` kullanın:

```php
$tag->jobs()->get();
```

# Command
php artisan make:model Tag -mf

