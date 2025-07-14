## İş İlanı Düzenleme, Güncelleme ve Silme

### 1. Düzenleme Butonu Ekleme

İş ilanı detay sayfasında, tekrar kullanılabilir bir buton bileşeni ile **"İş İlanını Düzenle"** butonu ekleyin. Butonu uygun şekilde konumlandırın ve stil verin.

---

### 2. Düzenleme Rotasını Tanımlama

Bir iş ilanını düzenlemek için bir GET rotası ekleyin ve ilgili görünümü döndürün:

```php
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.edit', compact('job'));
});
```

`edit.blade.php` dosyasını oluşturun. Bu form, mevcut iş ilanı verileriyle önceden doldurulmuş olmalı.

---

### 3. İş İlanı Güncelleme

Formdan gelen güncelleme taleplerini işlemek için PATCH rotası ekleyin:

```php
Route::patch('/jobs/{id}', function (Request $request, $id) {
    $request->validate([
        'title' => 'required|min:3',
        'salary' => 'required',
    ]);

    $job = Job::findOrFail($id);
    $job->update([
        'title' => $request->input('title'),
        'salary' => $request->input('salary'),
    ]);

    return redirect("/jobs/{$id}");
});
```

Formunuzda HTTP PATCH isteğini taklit etmek için Blade'de `@method('PATCH')` direktifini kullanın.

---

### 4. İş İlanı Silme

Bir iş ilanını silmek için DELETE rotası ekleyin:

```php
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');
});
```

Formlar iç içe olamayacağı için, silme işlemi için ayrı ve gizli bir form oluşturun. Silme butonunu bu formu tetikleyecek şekilde ayarlayın (ör. `form` özniteliği ile).

---

### 5. Özet

- İş ilanı düzenleme ve güncelleme için rotalar ve görünümler eklendi.
- Güncelleme için PATCH, silme için DELETE HTTP metodları kullanıldı.
- Güncelleme öncesi form doğrulaması yapıldı.
- Silme işlemi ayrı bir form ve buton ile gerçekleştirildi.
- CRUD döngüsü tamamlandı: oluşturma, okuma, güncelleme, silme.

---

Bir sonraki adımda, rota organizasyonu ve özel controller sınıflarını inceleyeceğiz. Görüşmek üzere!
