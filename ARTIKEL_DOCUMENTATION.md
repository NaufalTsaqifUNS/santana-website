# Dokumentasi Halaman Artikel - Santana Cars Website

## 📋 Daftar Isi
1. [Overview](#overview)
2. [Struktur File](#struktur-file)
3. [Fitur Halaman](#fitur-halaman)
4. [Routing](#routing)
5. [Cara Penggunaan](#cara-penggunaan)
6. [Komponen yang Digunakan](#komponen-yang-digunakan)
7. [API & Data Flow](#api--data-flow)

---

## 🎯 Overview

Halaman artikel Santana Cars terdiri dari 2 halaman utama:
1. **Index** - Halaman daftar semua artikel dengan filter
2. **Show** - Halaman detail artikel dengan related articles

Kedua halaman menggunakan tema gelap konsisten dengan desain website Santana Cars (gray-900 + aksen merah).

---

## 📁 Struktur File

```
resources/js/Pages/
├── Article.vue                    # [Optional] Halaman artikel standalone
└── Articles/
    ├── Index.vue                  # ✅ Halaman daftar artikel (MAIN)
    └── Show.vue                   # ✅ Halaman detail artikel (MAIN)

resources/js/Layouts/
└── MainLayout.vue                 # Layout dengan Header & Footer

resources/js/Components/
├── Header.vue                     # Header dengan navigasi
└── Footer.vue                     # Footer dengan links

app/Http/Controllers/
└── ArticleController.php          # Controller untuk artikel

routes/
└── web.php                        # Route definitions
```

---

## ✨ Fitur Halaman

### 📄 Halaman Index (`/artikel`)

#### Hero Section
- Badge "Artikel & Berita"
- Judul besar dengan gradient background
- Subtitle deskriptif

#### Filter & Artikel
- **Filter Buttons**: Semua, Umum, Traveling, Rental
- **Grid Layout**: 3 kolom (responsive)
- **Card Artikel**:
  - Thumbnail image dengan hover zoom effect
  - Badge kategori dengan warna berbeda
  - Tanggal publikasi dengan icon
  - Judul (line-clamp 2 baris)
  - Preview konten (line-clamp 3 baris)
  - Link "Baca Selengkapnya" dengan arrow animation

#### Pagination
- Laravel pagination support
- Styling konsisten dengan tema

#### CTA Section
- Call-to-action untuk rental dan contact
- Gradient background
- Button dengan hover effects

---

### 📖 Halaman Detail (`/artikel/{slug}`)

#### Breadcrumb Navigation
```
Home / Artikel / [Judul Artikel]
```

#### Hero Section
- Breadcrumb
- Badge kategori
- Judul artikel (h1)
- Meta informasi:
  - 📅 Tanggal publikasi
  - 👤 Author (jika ada)
  - ⏱️ Waktu baca (jika ada)

#### Konten Artikel
- Featured image (full width)
- Body artikel dengan prose styling
- Support untuk:
  - Headings (H1-H4)
  - Paragraphs
  - Lists (ul, ol)
  - Links
  - Bold/Italic
  - Images
  - Blockquotes
  - Code blocks

#### Tags Section
- Menampilkan semua tags artikel
- Link ke halaman filter by tag

#### Share Section
- Tombol share ke:
  - WhatsApp
  - Facebook
  - Twitter

#### Related Articles
- Maksimal 3 artikel terkait
- Berdasarkan kategori/type yang sama
- Grid 3 kolom (responsive)

#### Navigation
- Tombol "Kembali ke Artikel" dengan smooth animation

---

## 🔗 Routing

### Public Routes (web.php)

```php
// Daftar semua artikel
Route::get('/artikel', [ArticleController::class, 'publicIndex'])
    ->name('artikel.index');
// Render: Articles/Index ✅

// Detail artikel by slug
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])
    ->name('artikel.show');
// Render: Articles/Show ✅

// Filter by tag
Route::get('/tag/{tag}', [ArticleController::class, 'byTag'])
    ->name('artikel.tag');
```

### Link dari Header & Footer
- Header: `/artikel` (sudah tersedia)
- Footer: `/artikel` (sudah tersedia)

---

## 🚀 Cara Penggunaan

### 1. Menampilkan Daftar Artikel

```vue
<Link href="/artikel" class="...">
    Artikel
</Link>
```

### 2. Link ke Detail Artikel

```vue
<Link :href="`/artikel/${article.slug}`" class="...">
    {{ article.title }}
</Link>
```

### 3. Filter by Tag

```vue
<Link :href="`/tag/${tag.slug}`" class="...">
    #{{ tag.name }}
</Link>
```

---

## 🧩 Komponen yang Digunakan

### Global Components
```vue
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";
```

### Inertia Components
```vue
import { Link } from "@inertiajs/vue3";
```

### Vue Composition API
```vue
import { ref, computed } from "vue";
```

---

## 📊 API & Data Flow

### ArticleController::publicIndex()

**Mengirim ke Pages/Articles/Index.vue:**
```php
return Inertia::render("Articles/Index", [
    'articles' => Article::latest()->paginate(9)
    // 'articles' berisi:
    // [
    //     'data' => [...],      // Array of articles
    //     'links' => [...],     // Pagination links
    //     'meta' => [...]       // Pagination meta
    // ]
]);
```

**Struktur Data Artikel:**
```javascript
{
    id: 1,
    title: "Judul Artikel",
    slug: "judul-artikel",
    content: "<p>HTML content...</p>",
    image_url: "/storage/articles/image.jpg",
    type: "Umum" | "Traveling" | "Rental",
    author: "Nama Author",
    read_time: 5,                    // dalam menit
    published_at: "2025-01-15",
    created_at: "2025-01-15",
    tags: [
        {
            id: 1,
            name: "Tips",
            slug: "tips"
        }
    ]
}
```

---

### ArticleController::show($slug)

**Mengirim ke Pages/Articles/Show.vue:**
```php
return Inertia::render("Articles/Show", [
    'article' => $article,           // Article with tags
    'relatedArticles' => [...]       // Max 3 articles
]);
```

**Related Articles Logic:**
- Filter by same `type`
- Exclude current article
- Only published articles
- Latest first
- Limit 3

---

## 🎨 Styling & Design

### Color Palette
```css
/* Background */
bg-gray-50           /* Light background */
bg-gray-900          /* Dark hero */
bg-gray-800          /* Dark gradient */

/* Accent */
bg-red-500           /* Primary button */
bg-red-600           /* Hover state */
text-red-600         /* Links & active */

/* Text */
text-gray-900        /* Headings */
text-gray-700        /* Body text */
text-gray-600        /* Secondary text */
```

### Typography
- **Hero Title**: 4xl - 6xl, bold
- **Card Title**: xl, bold
- **Body**: text-base, text-gray-700
- **Meta**: text-sm, text-gray-500

### Spacing
- Section: py-12 md:py-16
- Card gap: gap-6 md:gap-8
- Container: max-w-7xl (Index) / max-w-4xl (Show)

---

## 🔧 Fungsi Helper

### formatDate(dateString)
```javascript
// Input: "2025-01-15"
// Output: "15 Januari 2025"
const formatDate = (dateString) => {
    if (!dateString) return "";
    const options = { year: "numeric", month: "long", day: "numeric" };
    return new Date(dateString).toLocaleDateString("id-ID", options);
};
```

### stripHtml(html) / getPreview(content)
```javascript
// Strip HTML tags dan batasi karakter
const getPreview = (content) => {
    if (!content) return "";
    const tmp = document.createElement("DIV");
    tmp.innerHTML = content;
    const text = tmp.textContent || tmp.innerText || "";
    return text.length > 150 ? text.substring(0, 150) + "..." : text;
};
```

### getBadgeClass(type)
```javascript
// Return class berdasarkan type artikel
const getBadgeClass = (type) => {
    const badges = {
        Umum: "bg-blue-500/90 text-white border border-blue-400/30",
        Traveling: "bg-green-500/90 text-white border border-green-400/30",
        Rental: "bg-red-500/90 text-white border border-red-400/30",
    };
    return badges[type] || badges.Umum;
};
```

---

## 📱 Responsive Design

### Breakpoints
```css
/* Mobile First */
sm:  640px   /* Small devices */
md:  768px   /* Tablets */
lg:  1024px  /* Desktop */
xl:  1280px  /* Large desktop */
```

### Grid Layout
```css
/* Mobile */
grid-cols-1

/* Tablet */
md:grid-cols-2

/* Desktop */
lg:grid-cols-3
```

---

## ✅ Checklist Testing

### Fungsional
- [ ] Halaman index tampil dengan benar
- [ ] Filter kategori berfungsi (Semua, Umum, Traveling, Rental)
- [ ] Klik card artikel menuju ke detail artikel
- [ ] Halaman detail tampil dengan breadcrumb
- [ ] Related articles tampil (max 3)
- [ ] Share buttons berfungsi (WhatsApp, Facebook, Twitter)
- [ ] Tags bisa diklik dan menuju ke halaman filter
- [ ] Pagination berfungsi
- [ ] Tombol "Kembali ke Artikel" berfungsi

### UI/UX
- [ ] Header fixed dan bisa scroll
- [ ] Footer tampil di semua halaman
- [ ] Hover effects pada card artikel
- [ ] Image zoom effect berfungsi
- [ ] Responsive di mobile, tablet, desktop
- [ ] Loading state (jika ada)
- [ ] Empty state tampil jika tidak ada artikel

### Performance
- [ ] Images lazy loading
- [ ] Smooth scroll behavior
- [ ] Transition animations tidak lag

---

## 🐛 Troubleshooting

### Artikel tidak tampil
1. Cek apakah migration sudah dijalankan: `php artisan migrate`
2. Pastikan ada data artikel di database
3. Cek field `is_published` di artikel (harus `true`)

### Related articles tidak muncul
1. Pastikan ada artikel lain dengan `type` yang sama
2. Cek minimal ada 2 artikel dengan type yang sama
3. Artikel harus dalam status published

### Image tidak tampil
1. Cek path image: `/storage/articles/...`
2. Jalankan: `php artisan storage:link`
3. Pastikan file ada di `storage/app/public/articles/`

### Routing error
1. Clear route cache: `php artisan route:clear`
2. Verify routes: `php artisan route:list | grep artikel`

---

## 🔮 Future Enhancements

### Fitur yang Bisa Ditambahkan:
1. **Search functionality** - Pencarian artikel
2. **Comments system** - Sistem komentar
3. **Bookmark/Save** - Simpan artikel favorit
4. **Reading progress** - Indikator progress baca
5. **Dark mode toggle** - Switch tema terang/gelap
6. **Social share count** - Jumlah share
7. **View count** - Jumlah views
8. **Related by tags** - Related berdasarkan tags
9. **Newsletter subscribe** - Subscribe artikel terbaru
10. **Print friendly** - Versi print

---

## 📞 Support & Maintenance

### File yang Terkait:
- `resources/js/Pages/Articles/Index.vue` ⭐ **MAIN FILE**
- `resources/js/Pages/Articles/Show.vue` ⭐ **MAIN FILE**
- `resources/js/Pages/Article.vue` (Optional, tidak digunakan)
- `resources/js/Layouts/MainLayout.vue`
- `resources/js/Components/Header.vue`
- `resources/js/Components/Footer.vue`
- `app/Http/Controllers/ArticleController.php`
- `app/Models/Article.php`
- `routes/web.php`

### Developer Contact:
- **Project**: Santana Cars Website
- **Framework**: Laravel + Vue 3 + Inertia.js
- **Last Updated**: Januari 2025

---

## 📝 Notes

- **STRUKTUR AKHIR**: File artikel ada di `Pages/Articles/` (Best Practice Inertia)
- Controller menggunakan path standard: `Articles/Index` dan `Articles/Show`
- Semua halaman artikel menggunakan `MainLayout` yang sudah include Header & Footer
- Routing sudah otomatis menggunakan Inertia.js
- Header dan Footer memiliki link navigasi lengkap ke semua halaman
- Pagination menggunakan Laravel pagination links
- Design konsisten dengan halaman lain (gray-900 + red accent)

## ✅ Struktur Final (Correct!)

```
resources/js/Pages/Articles/
├── Index.vue  ✅ Daftar artikel
└── Show.vue   ✅ Detail artikel
```

**Controller Path:**
```php
Inertia::render("Articles/Index", [...])   ✅ Benar
Inertia::render("Articles/Show", [...])    ✅ Benar
```

**Ini adalah struktur standar Inertia.js!**

---

**Happy Coding! 🚀**