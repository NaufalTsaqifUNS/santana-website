# 🔧 Panduan Fix: Link Artikel Tidak Berfungsi

## ❌ Masalah yang Terjadi

Ketika mengklik link "Artikel" di Header atau Footer, halaman tidak bisa dibuka / tidak menuju ke halaman artikel.

---

## ✅ Solusi yang Sudah Diterapkan

### 1. **Memindahkan File ke Lokasi yang Benar**

**Masalah:**
- File artikel awalnya di `Components/Articles/` 
- Inertia.js mencari pages di folder `Pages/` secara default
- Path `../Components/Articles/Index` tidak bisa di-resolve

**Solusi:**
```
❌ SALAH:
resources/js/Components/Articles/Index.vue
resources/js/Components/Articles/Show.vue

✅ BENAR:
resources/js/Pages/Articles/Index.vue
resources/js/Pages/Articles/Show.vue
```

---

### 2. **Update Controller Path**

**File:** `app/Http/Controllers/ArticleController.php`

**Sebelum (SALAH):**
```php
return Inertia::render("../Components/Articles/Index", [
    "articles" => Article::latest()->paginate(9),
]);

return Inertia::render("../Components/Articles/Show", [
    "article" => $article,
    "relatedArticles" => $relatedArticles,
]);
```

**Sesudah (BENAR):**
```php
return Inertia::render("Articles/Index", [
    "articles" => Article::latest()->paginate(9),
]);

return Inertia::render("Articles/Show", [
    "article" => $article,
    "relatedArticles" => $relatedArticles,
]);
```

---

### 3. **Clear Cache**

Setelah perubahan path, wajib clear cache:

```bash
php artisan optimize:clear
```

Output yang diharapkan:
```
✓ cache ....................................... DONE
✓ compiled .................................... DONE
✓ config ...................................... DONE
✓ events ...................................... DONE
✓ routes ...................................... DONE
✓ views ....................................... DONE
```

---

## 🧪 Cara Testing Setelah Fix

### 1. Restart Development Server

```bash
# Stop server (Ctrl+C)
# Clear cache
php artisan optimize:clear

# Restart
php artisan serve
```

### 2. Rebuild Frontend Assets

```bash
# Stop npm dev (Ctrl+C)
npm run dev
# atau
npm run build
```

### 3. Test di Browser

Buka browser baru (atau Clear Cache + Hard Reload: Ctrl+Shift+R):

```
http://localhost:8000/artikel
```

**Expected Result:**
- ✅ Halaman artikel tampil
- ✅ Header & Footer tampil
- ✅ Data artikel tampil (jika ada di database)
- ✅ Tidak ada error di console

### 4. Test Link di Header

1. Buka homepage: `http://localhost:8000/`
2. Klik "Artikel" di Header
3. **Expected:** Halaman artikel terbuka tanpa reload
4. **Network tab:** Request dengan `X-Inertia: true`

### 5. Test Link di Footer

1. Scroll ke bawah ke Footer
2. Klik "Artikel" di navigation
3. **Expected:** Halaman artikel terbuka

---

## 📊 Verifikasi Struktur File

### Cek Struktur Folder:

```bash
# Windows
dir resources\js\Pages\Articles

# Expected Output:
# Index.vue
# Show.vue
```

```bash
# Linux/Mac
ls resources/js/Pages/Articles/

# Expected Output:
# Index.vue
# Show.vue
```

### Pastikan Folder Components/Articles TIDAK ADA:

```bash
# Windows
dir resources\js\Components\Articles
# Expected: "File Not Found" atau error

# Linux/Mac
ls resources/js/Components/Articles/
# Expected: "No such file or directory"
```

---

## 🔍 Troubleshooting

### Problem 1: Error "Component not found"

**Gejala:**
```
Inertia page component not found
```

**Solusi:**
```bash
# 1. Clear semua cache
php artisan optimize:clear

# 2. Pastikan file ada
dir resources\js\Pages\Articles\Index.vue
dir resources\js\Pages\Articles\Show.vue

# 3. Rebuild assets
npm run dev
```

---

### Problem 2: Link masih tidak berfungsi

**Solusi:**

1. **Cek Console Browser (F12):**
   - Ada error JavaScript?
   - Ada error 404?
   - Ada error Inertia?

2. **Cek Network Tab:**
   - Request ke `/artikel` status 200?
   - Response berupa JSON atau HTML?
   - Header `X-Inertia` ada?

3. **Cek Route:**
   ```bash
   php artisan route:list --name=artikel
   ```
   Expected output:
   ```
   artikel.index  › ArticleController@publicIndex
   artikel.show   › ArticleController@show
   ```

4. **Test Direct URL:**
   Ketik langsung di address bar:
   ```
   http://localhost:8000/artikel
   ```
   Jika bisa, berarti masalah di Link component.

---

### Problem 3: Data artikel tidak muncul

**Bukan masalah routing!** Ini masalah database.

**Solusi:**

1. **Cek tabel articles ada:**
   ```bash
   php artisan tinker
   ```
   ```php
   \App\Models\Article::count()
   // Output harus > 0
   ```

2. **Jika belum ada data, tambahkan:**
   ```php
   \App\Models\Article::create([
       'title' => 'Test Artikel',
       'slug' => 'test-artikel',
       'content' => '<p>Ini adalah test artikel</p>',
       'type' => 'Umum',
       'is_published' => true,
       'published_at' => now()
   ]);
   ```

3. **Refresh browser**

---

### Problem 4: Blank page / White screen

**Gejala:**
- Halaman blank putih
- Tidak ada error di console

**Solusi:**

1. **Cek file Vue ada syntax error:**
   ```bash
   npm run build
   ```
   Lihat error apa yang muncul.

2. **Cek MainLayout:**
   ```
   resources/js/Layouts/MainLayout.vue
   ```
   Pastikan `<slot />` ada.

3. **Cek import di component:**
   ```vue
   import MainLayout from "@/Layouts/MainLayout.vue";  ✅
   ```

---

## 📝 Checklist Final

Sebelum testing, pastikan:

- [ ] File `Pages/Articles/Index.vue` ada
- [ ] File `Pages/Articles/Show.vue` ada
- [ ] Folder `Components/Articles/` sudah dihapus
- [ ] Controller menggunakan path `Articles/Index` (tanpa `../`)
- [ ] Cache sudah di-clear: `php artisan optimize:clear`
- [ ] Assets sudah di-rebuild: `npm run dev`
- [ ] Server sudah direstart
- [ ] Browser cache sudah di-clear (Ctrl+Shift+R)

---

## 🎯 Struktur Final yang Benar

```
santana-website/
├── app/Http/Controllers/
│   └── ArticleController.php
│       ├── publicIndex() → Inertia::render("Articles/Index")
│       └── show($slug)   → Inertia::render("Articles/Show")
│
├── resources/js/
│   ├── Pages/
│   │   └── Articles/
│   │       ├── Index.vue  ✅ Daftar artikel
│   │       └── Show.vue   ✅ Detail artikel
│   │
│   ├── Layouts/
│   │   └── MainLayout.vue  (wrap semua halaman)
│   │
│   └── Components/
│       ├── Header.vue  (link ke /artikel)
│       └── Footer.vue  (link ke /artikel)
│
└── routes/
    └── web.php
        ├── GET /artikel          → artikel.index
        └── GET /artikel/{slug}   → artikel.show
```

---

## ✅ Verifikasi Akhir

Setelah fix, test scenario berikut:

1. **Homepage → Artikel:**
   - [ ] Buka `http://localhost:8000/`
   - [ ] Klik "Artikel" di Header
   - [ ] Halaman artikel terbuka ✅

2. **Artikel → Detail:**
   - [ ] Di halaman artikel
   - [ ] Klik salah satu card artikel
   - [ ] Detail artikel terbuka ✅

3. **Detail → Back to List:**
   - [ ] Di halaman detail
   - [ ] Klik "Kembali ke Artikel"
   - [ ] Kembali ke daftar artikel ✅

4. **Footer Link:**
   - [ ] Scroll ke footer
   - [ ] Klik "Artikel"
   - [ ] Halaman artikel terbuka ✅

5. **Direct URL:**
   - [ ] Ketik `/artikel` di address bar
   - [ ] Halaman artikel terbuka ✅

**Jika semua ✅, maka fix berhasil!**

---

## 🚨 Catatan Penting

### Kenapa Harus di Pages, Bukan Components?

**Inertia.js Convention:**
- `Pages/` = Full page components yang di-render oleh controller
- `Components/` = Reusable components (Header, Footer, Card, dll)

**Inertia default path resolution:**
```php
// Inertia mencari di:
resources/js/Pages/{ComponentName}.vue

// Jadi:
Inertia::render("Articles/Index")
// → resources/js/Pages/Articles/Index.vue ✅

// BUKAN:
Inertia::render("../Components/Articles/Index")
// → Bisa error atau tidak ditemukan ❌
```

**Best Practice:**
- Pages yang di-render controller → `Pages/`
- Components yang di-import di pages → `Components/`

---

## 📞 Jika Masih Error

Jika setelah mengikuti semua langkah masih error:

1. **Screenshot error di console (F12)**
2. **Screenshot network tab**
3. **Cek laravel.log:**
   ```
   storage/logs/laravel.log
   ```
4. **Test dengan:**
   ```bash
   php artisan route:list
   php artisan about
   npm run build
   ```

---

## ✅ Status: FIXED!

Struktur sudah benar:
- ✅ Files di `Pages/Articles/`
- ✅ Controller path standard
- ✅ Cache cleared
- ✅ Ready to use!

**Selamat! Link artikel sekarang harus berfungsi! 🎉**

---

**Last Updated:** Januari 2025  
**Status:** ✅ RESOLVED