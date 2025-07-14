Veritabanı Seed'leri Neden Kullanılır?
php artisan migrate:fresh komutunu çalıştırdıktan sonra veritabanı tablolarınız yeniden oluşturulur ancak boştur. Her seferinde elle veri eklemek zahmetlidir, bu yüzden seed'ler bu işlemi otomatikleştirir.

Laravel'de Seeder'lar
Seeder'lar, database/seeders dizininde bulunan sınıflardır. Varsayılan DatabaseSeeder sınıfı, birden fazla seeder'ı çalıştırmak için giriş noktasıdır.

Seeder'ları çalıştırmak için:

php artisan db:seed
Seeder Oluşturma ve Çalıştırma
Eğer eksik sütun gibi hatalar alırsanız, seeder ve factory'lerinizin veritabanı şemasıyla uyumlu olduğundan emin olun.

Migration ve seeding işlemini tek komutta birleştirebilirsiniz:

php artisan migrate:fresh --seed
Bu komut tüm tabloları siler, migration'ları çalıştırır ve veritabanını seed eder.

Seeder'larda Factory Kullanımı
Seeder'lar genellikle çok miktarda sahte veriyi hızlıca oluşturmak için factory'leri kullanır:

\App\Models\Job::factory(200)->create();
Bu komut, factory tanımını kullanarak 200 iş kaydı oluşturur.

Esnek Kullanım İçin Seeder'ları Bölmek
Veritabanınızın farklı bölümleri için birden fazla seeder sınıfı oluşturabilirsiniz:

php artisan make:seeder JobSeeder
Bu sayede seed'leri tek tek veya grup halinde çalıştırabilirsiniz; bu, test veya kısmi veri yenilemeleri için faydalıdır.

DatabaseSeeder içinde diğer seeder'ları şu şekilde çağırabilirsiniz:

public function run()
{
    $this->call([
        UserSeeder::class,
        JobSeeder::class,
    ]);
}
Özet
Seed'ler, veritabanınızı veriyle doldurmayı otomatikleştirir.
Seeder'ları çalıştırmak için php artisan db:seed kullanın.
Migration ve seeding işlemlerini migrate:fresh --seed ile birleştirin.
Factory'ler, seeder'lar içinde veriyi verimli şekilde üretir.
Seeder'ları bölerek modüler ve esnek veri kurulumu sağlayın.
Seed işlemlerini pratik etmeye devam edin, on altıncı günde formlara hazır olun!
