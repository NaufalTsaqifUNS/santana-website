# 🔗 Peta Koneksi Inertia - Artikel Santana Cars

## ✅ Status: SUDAH TERHUBUNG PENUH!

Dokumentasi ini menjelaskan bagaimana Inertia.js menghubungkan Backend (Laravel) dengan Frontend (Vue.js) untuk fitur Artikel.

---

## 📊 Diagram Alur Koneksi

```
┌─────────────────────────────────────────────────────────────────┐
│                         USER REQUEST                             │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                      ROUTES (web.php)                            │
├─────────────────────────────────────────────────────────────────┤
│  GET /artikel          → ArticleController@publicIndex           │
│  GET /artikel/{slug}   → ArticleController@show                  │
│  GET /tag/{tag}        → ArticleController@byTag                 │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│              CONTROLLER (ArticleController.php)                  │
├─────────────────────────────────────────────────────────────────┤
│  ✅ use Inertia\Inertia;                                         │
│                                                                  │
│  publicIndex() {                                                 │
│    return Inertia::render(                                       │
│      "../Components/Articles/Index",                             │
│      [ 'articles' => Article::latest()->paginate(9) ]            │
│    );                                                            │
│  }                                                               │
│                                                                  │
│  show($slug) {                                                   │
│    return Inertia::render(                                       │
│      "../Components/Articles/Show",                              │
│      [                                                           │
│        'article' => $article,                                    │
│        'relatedArticles' => $relatedArticles                     │
│      ]                                                           │
│    );                                                            │
│  }                                                               │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                    INERTIA MIDDLEWARE                            │
├─────────────────────────────────────────────────────────────────┤
│  • Mengkonversi response menjadi JSON                            │
│  • Menambahkan shared data                                       │
│  • Mengirim ke Vue Component                                     │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│              VUE COMPONENTS (Frontend)                           │
├─────────────────────────────────────────────────────────────────┤
│  resources/js/Components/Articles/                               │
│  ├── Index.vue    ← Menerima props 'articles'                    │
│  └── Show.vue     ← Menerima props 'article' & 'relatedArticles' │
│                                                                  │
│  <script setup>                                                  │
│    import { Link } from "@inertiajs/vue3";                       │
│    import MainLayout from "@/Layouts/MainLayout.vue";            │
│                                                                  │
│    const props = defineProps({                                   │
│      articles: Object,  // atau article: Object                  │
│      relatedArticles: Array                                      │
│    });                                                           │
│  </script>                                                       │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                      MAIN LAYOUT                                 │
├─────────────────────────────────────────────────────────────────┤
│  resources/js/Layouts/MainLayout.vue                             │
│  ├── Header.vue  ← Navigasi dengan <Link>                        │
│  ├── <slot />    ← Konten artikel di sini                        │
│  └── Footer.vue  ← Footer dengan <Link>                          │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                     RENDERED TO USER                             │
└─────────────────────────────────────────────────────────────────┘
```

---

## 🔍 Detail Koneksi per File

### 1. **Routes → Controller**

**File:** `routes/web.php`

```php
use App\Http\Controllers\ArticleController;

// ✅ Koneksi Route ke Controller
Route::get('/artikel', [ArticleController::class, 'publicIndex'])
    ->name('artikel.index');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])
    ->name('artikel.show');
```

**Status:** ✅ Connected

---

### 2. **Controller → Inertia**

**File:** `app/Http/Controllers/ArticleController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Inertia\Inertia;  // ✅ Import Inertia

class ArticleController extends Controller
{
    // ✅ Method publicIndex untuk /artikel
    public function publicIndex()
    {
        return Inertia::render("../Components/Articles/Index", [
            "articles" => Article::latest()->paginate(9),
        ]);
    }

    // ✅ Method show untuk /artikel/{slug}
    public function show($slug)
    {
        $article = Article::where("slug", $slug)
            ->with("tags")
            ->firstOrFail();

        $relatedArticles = Article::where("type", $article->type)
            ->where("id", "!=", $article->id)
            ->where("is_published", true)
            ->latest("published_at")
            ->take(3)
            ->get();

        return Inertia::render("../Components/Articles/Show", [
            "article" => $article,
            "relatedArticles" => $relatedArticles,
        ]);
    }
}
```

**Status:** ✅ Connected
- ✅ Import `Inertia\Inertia`
- ✅ `Inertia::render()` dengan path component
- ✅ Data dikirim via array associative

---

### 3. **Inertia → Vue Components**

#### **A. Index.vue (Daftar Artikel)**

**File:** `resources/js/Components/Articles/Index.vue`

```vue
<template>
    <MainLayout>
        <!-- Hero, Filter, Grid Artikel -->
    </MainLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";  // ✅ Import Link dari Inertia
import MainLayout from "@/Layouts/MainLayout.vue";

// ✅ Menerima props dari Controller
const props = defineProps({
    articles: {
        type: Object,
        required: true,
    },
});
</script>
```

**Status:** ✅ Connected
- ✅ Import `Link` dari `@inertiajs/vue3`
- ✅ `defineProps` menerima data dari controller
- ✅ Props `articles` = data yang dikirim controller

---

#### **B. Show.vue (Detail Artikel)**

**File:** `resources/js/Components/Articles/Show.vue`

```vue
<template>
    <MainLayout>
        <!-- Hero, Content, Tags, Share, Related -->
    </MainLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";  // ✅ Import Link dari Inertia
import MainLayout from "@/Layouts/MainLayout.vue";

// ✅ Menerima props dari Controller
const props = defineProps({
    article: {
        type: Object,
        required: true,
    },
    relatedArticles: {
        type: Array,
        default: () => [],
    },
});
</script>
```

**Status:** ✅ Connected
- ✅ Import `Link` dari `@inertiajs/vue3`
- ✅ `defineProps` menerima data dari controller
- ✅ Props `article` & `relatedArticles` = data yang dikirim controller

---

### 4. **Vue Components → Layout**

**File:** `resources/js/Layouts/MainLayout.vue`

```vue
<template>
  <div>
    <Header />  <!-- ✅ Header dengan navigasi -->
    <main class="min-h-screen">
      <slot />  <!-- ✅ Konten artikel di sini -->
    </main>
    <Footer />  <!-- ✅ Footer dengan links -->
  </div>
</template>

<script>
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";

export default {
  components: { Header, Footer },
};
</script>
```

**Status:** ✅ Connected
- ✅ Header & Footer otomatis include
- ✅ `<slot />` untuk konten artikel
- ✅ Semua halaman artikel menggunakan layout ini

---

### 5. **Navigasi dengan Inertia Link**

**File:** `resources/js/Components/Header.vue` & `Footer.vue`

```vue
<template>
    <nav>
        <!-- ✅ Menggunakan Link dari Inertia -->
        <Link href="/">Home</Link>
        <Link href="/list-rental">Daftar Rental</Link>
        <Link href="/riwayat-perjalanan">Riwayat Perjalanan</Link>
        <Link href="/artikel">Artikel</Link>  <!-- ✅ Link ke artikel -->
        <Link href="/Contact">Contact</Link>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";  // ✅ Import Link
</script>
```

**Status:** ✅ Connected
- ✅ Semua navigasi menggunakan `<Link>` Inertia
- ✅ No page reload, SPA navigation
- ✅ Link ke `/artikel` sudah ada

---

## 🔄 Alur Data Flow

### **Request → Response Flow:**

```
1. User klik "Artikel" di Header
   ↓
2. <Link href="/artikel"> → Inertia request ke Laravel
   ↓
3. Route: /artikel → ArticleController@publicIndex
   ↓
4. Controller:
   - Query database: Article::latest()->paginate(9)
   - Return: Inertia::render("../Components/Articles/Index", [...])
   ↓
5. Inertia Middleware:
   - Convert to JSON
   - Add shared data
   ↓
6. Frontend (Vue):
   - Index.vue menerima props 'articles'
   - Render dengan MainLayout (Header + Footer)
   ↓
7. User melihat halaman artikel
```

### **Navigation Flow (Tanpa Reload):**

```
User di halaman /artikel
   ↓
Klik artikel card (slug: "tips-rental-mobil")
   ↓
<Link :href="`/artikel/${article.slug}`">
   ↓
Inertia request: GET /artikel/tips-rental-mobil
   ↓
ArticleController@show($slug = "tips-rental-mobil")
   ↓
Query article by slug + related articles
   ↓
Inertia::render("../Components/Articles/Show", [...])
   ↓
Show.vue menerima props 'article' & 'relatedArticles'
   ↓
Render detail artikel (NO PAGE RELOAD!)
```

---

## ✅ Checklist Verifikasi Koneksi

### Backend (Laravel)
- [x] ✅ Route `/artikel` terdaftar di `web.php`
- [x] ✅ Route `/artikel/{slug}` terdaftar di `web.php`
- [x] ✅ `ArticleController` ada dan berfungsi
- [x] ✅ `use Inertia\Inertia;` di controller
- [x] ✅ `Inertia::render()` dengan path yang benar
- [x] ✅ Data dikirim via array (articles, article, relatedArticles)
- [x] ✅ Model `Article` ada dan berfungsi

### Frontend (Vue.js)
- [x] ✅ File `Components/Articles/Index.vue` ada
- [x] ✅ File `Components/Articles/Show.vue` ada
- [x] ✅ Import `{ Link }` dari `@inertiajs/vue3`
- [x] ✅ `defineProps` untuk menerima data
- [x] ✅ `MainLayout` digunakan di kedua component
- [x] ✅ Header memiliki link `/artikel`
- [x] ✅ Footer memiliki link `/artikel`

### Inertia
- [x] ✅ Package `@inertiajs/vue3` terinstall
- [x] ✅ Inertia middleware aktif
- [x] ✅ `app.js` setup Inertia dengan Vue
- [x] ✅ Path component benar: `../Components/Articles/Index`
- [x] ✅ Path component benar: `../Components/Articles/Show`

---

## 🧪 Cara Testing Koneksi

### 1. Test Manual di Browser

```bash
# Jalankan server
php artisan serve
npm run dev
```

Buka browser:
```
http://localhost:8000/artikel          ← Harus tampil daftar artikel
http://localhost:8000/artikel/{slug}   ← Harus tampil detail artikel
```

**Expected Result:**
- ✅ Halaman load tanpa error
- ✅ Header & Footer tampil
- ✅ Data artikel tampil
- ✅ Navigasi tanpa page reload
- ✅ Network tab: XHR requests dari Inertia

---

### 2. Test dengan Artisan Command

```bash
# Cek routes
php artisan route:list | grep artikel

# Expected output:
# GET|HEAD  artikel ...................... artikel.index › ArticleController@publicIndex
# GET|HEAD  artikel/{slug} ............... artikel.show › ArticleController@show
```

---

### 3. Test di DevTools

1. Buka browser DevTools (F12)
2. Tab **Network**
3. Klik link "Artikel" di Header
4. Lihat request:
   ```
   Request URL: http://localhost:8000/artikel
   Request Headers: X-Inertia: true
   Response: JSON dengan component & props
   ```

---

## 📦 Dependencies Required

### Composer (Backend)
```json
{
    "inertiajs/inertia-laravel": "^0.6"  // ✅ Installed
}
```

### NPM (Frontend)
```json
{
    "@inertiajs/vue3": "^1.0.0",  // ✅ Installed
    "vue": "^3.3.0"                // ✅ Installed
}
```

---

## 🎯 Struktur Path yang Digunakan

```
Backend (Controller):
├── Inertia::render("../Components/Articles/Index")
│   └── Resolve ke: resources/js/Components/Articles/Index.vue
│
└── Inertia::render("../Components/Articles/Show")
    └── Resolve ke: resources/js/Components/Articles/Show.vue
```

**Kenapa pakai `../`?**
- Inertia default mencari di `resources/js/Pages/`
- Dengan `../` kita keluar ke `resources/js/`
- Lalu masuk ke `Components/Articles/`

---

## 🚨 Troubleshooting

### Problem: "Component not found"
**Solution:**
```bash
# Clear cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Rebuild frontend
npm run build
```

### Problem: "Props undefined"
**Solution:**
- Pastikan nama props di `defineProps` sama dengan key di controller
- Contoh: Controller kirim `'articles'` → Props terima `articles`

### Problem: "Link tidak navigasi"
**Solution:**
- Pastikan import `{ Link }` dari `@inertiajs/vue3`
- Bukan `<a>` biasa, tapi `<Link>`

---

## ✅ Kesimpulan

**STATUS: FULLY CONNECTED! 🎉**

Semua koneksi Inertia sudah berfungsi dengan baik:

1. ✅ **Routes** mengarah ke controller
2. ✅ **Controller** menggunakan `Inertia::render()`
3. ✅ **Vue Components** menerima props via `defineProps`
4. ✅ **MainLayout** mengwrap semua halaman
5. ✅ **Navigation** menggunakan `<Link>` Inertia
6. ✅ **SPA Navigation** berfungsi (no reload)

**Tidak ada masalah koneksi! Siap digunakan!** 🚀

---

**Last Updated:** Januari 2025
**Developer:** Santana Cars Team