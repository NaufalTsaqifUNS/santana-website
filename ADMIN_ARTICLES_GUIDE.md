# 📚 Dokumentasi CRUD Admin Artikel - Santana Cars

## ✅ Status: COMPLETED!

Dokumentasi lengkap untuk fitur manajemen artikel di Admin Panel Santana Cars.

---

## 📋 Daftar Isi

1. [Overview](#overview)
2. [Struktur File](#struktur-file)
3. [Fitur CRUD](#fitur-crud)
4. [Routes](#routes)
5. [Controller](#controller)
6. [Database](#database)
7. [Cara Penggunaan](#cara-penggunaan)
8. [Testing Guide](#testing-guide)

---

## 🎯 Overview

Sistem CRUD (Create, Read, Update, Delete) untuk mengelola artikel di Admin Panel dengan fitur:
- ✅ Daftar artikel dengan filter & pagination
- ✅ Tambah artikel baru dengan upload gambar
- ✅ Edit artikel existing
- ✅ Hapus artikel dengan confirmation
- ✅ Publish/Draft status
- ✅ Tags management
- ✅ Statistics dashboard
- ✅ Design konsisten dengan Admin Panel

---

## 📁 Struktur File

```
santana-website/
├── app/Http/Controllers/
│   └── ArticleController.php          # Controller dengan CRUD methods
│
├── app/Models/
│   ├── Article.php                    # Model Artikel
│   └── Tag.php                        # Model Tags
│
├── resources/js/
│   ├── Pages/Admin/Articles/
│   │   ├── Index.vue                  # ✅ Daftar artikel
│   │   ├── Create.vue                 # ✅ Form tambah artikel
│   │   └── Edit.vue                   # ✅ Form edit artikel
│   │
│   └── Layouts/
│       └── AdminLayout.vue            # ✅ Layout admin (updated)
│
├── routes/
│   └── web.php                        # ✅ Admin routes
│
└── database/migrations/
    ├── create_articles_table.php      # Table articles
    ├── create_tags_table.php          # Table tags
    └── create_article_tag_table.php   # Pivot table
```

---

## ✨ Fitur CRUD

### 1. **Index (Daftar Artikel)**

**File:** `resources/js/Pages/Admin/Articles/Index.vue`

**Fitur Utama:**
- ✅ **Header Section**
  - Judul halaman
  - Tombol "Tambah Artikel Baru"
  
- ✅ **Flash Messages**
  - Success notification setelah create/update/delete
  
- ✅ **Statistics Cards** (4 cards)
  - Total Artikel
  - Published (artikel yang dipublikasikan)
  - Draft (artikel yang belum dipublikasikan)
  - Artikel Bulan Ini
  
- ✅ **Filters**
  - Filter by Type: Semua, Umum, Traveling, Rental
  - Filter by Status: Semua, Published, Draft
  - Real-time filtering (client-side)
  
- ✅ **Table Artikel**
  - Columns:
    - **Artikel**: Thumbnail + Title + Slug
    - **Tipe**: Badge (Umum=blue, Traveling=green, Rental=red)
    - **Tags**: Max 2 tags tampil + counter
    - **Status**: Published/Draft badge
    - **Tanggal**: Format Indonesia
    - **Aksi**: View, Edit, Delete buttons
  - Thumbnail preview (atau placeholder jika tidak ada)
  - Hover effects pada rows
  
- ✅ **Actions**
  - **View**: Buka artikel di tab baru (frontend)
  - **Edit**: Menuju halaman edit
  - **Delete**: Modal confirmation sebelum hapus
  
- ✅ **Delete Modal**
  - Konfirmasi dengan preview artikel
  - Button Batal & Hapus
  - Loading state saat proses delete
  
- ✅ **Pagination**
  - Laravel pagination links
  - Info jumlah data (showing X to Y of Z)
  - Active page highlight
  
- ✅ **Empty State**
  - Icon & message jika tidak ada artikel
  - Quick action "Tambah Artikel" button

**Props:**
```javascript
{
  articles: {
    data: [],       // Array of articles
    links: [],      // Pagination links
    total: 0,       // Total articles
    from: 0,        // Start index
    to: 0          // End index
  },
  flash: {
    success: ""    // Success message
  }
}
```

---

### 2. **Create (Tambah Artikel)**

**File:** `resources/js/Pages/Admin/Articles/Create.vue`

**Fitur Utama:**
- ✅ **Back Button**
  - Kembali ke daftar artikel
  
- ✅ **Form Fields:**

  **1. Judul Artikel** (Required)
  - Input text
  - Auto-generate slug preview real-time
  - Validation error display
  
  **2. Tipe Artikel** (Required)
  - Select dropdown: Umum, Traveling, Rental
  - Default: none (harus pilih)
  
  **3. Nama Penulis** (Optional)
  - Input text
  - Untuk kredit penulis
  
  **4. Gambar Thumbnail** (Optional)
  - Drag & drop atau click to upload
  - Preview image sebelum upload
  - Remove button untuk hapus preview
  - Max size: 2MB
  - Format: PNG, JPG, JPEG
  
  **5. Konten Artikel** (Required)
  - Textarea dengan font mono
  - Support HTML tags
  - Rows: 15 (resizable)
  - Info: daftar HTML tags yang bisa digunakan
  
  **6. Tags** (Optional)
  - Input text (comma separated)
  - Preview tags real-time dengan prefix #
  - Contoh: tips, panduan, traveling
  
  **7. Waktu Baca** (Optional)
  - Input number (menit)
  - Min: 1
  
  **8. Tanggal Publikasi** (Optional)
  - Input date picker
  - Default: kosong (akan set ke now saat publish)
  
  **9. Status Publikasi**
  - Checkbox: "Publikasikan artikel sekarang"
  - Unchecked = Draft
  - Checked = Published

- ✅ **Form Actions**
  - Button **Batal**: Kembali ke daftar
  - Button **Simpan Artikel**: Submit form
  - Loading state dengan spinner
  - Disabled saat processing

**Validations:**
- Title: required
- Type: required, in:Umum,Traveling,Rental
- Content: required
- Image: nullable, image format, max 2MB

---

### 3. **Edit (Update Artikel)**

**File:** `resources/js/Pages/Admin/Articles/Edit.vue`

**Fitur Utama:**
- ✅ Semua fitur Create +
- ✅ **Pre-filled Data**
  - Semua field sudah terisi dengan data existing
  - Tags di-convert dari array ke string
  
- ✅ **Slug Preview**
  - Tampil slug saat ini
  - Tampil preview slug baru jika judul berubah
  
- ✅ **Image Handling**
  - Tampil gambar saat ini (jika ada)
  - Label "Gambar Saat Ini"
  - Option upload gambar baru
  - Label "Gambar Baru" untuk preview new image
  - Bisa remove gambar saat ini
  - Bisa remove gambar baru (cancel upload)
  
- ✅ **Info Box**
  - Tampil info artikel:
    - Tanggal dibuat
    - Terakhir diupdate
  - Background blue dengan icon
  
- ✅ **Button Text**
  - "Update Artikel" (bukan "Simpan")

**Props:**
```javascript
{
  article: Object,           // Article data
  selectedTags: Array,       // Array of tag names
  errors: Object            // Validation errors
}
```

---

## 🔗 Routes

**File:** `routes/web.php`

```php
// Admin Article Routes (Protected by auth middleware)
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.articles.')
    ->group(function () {
        // Index - Daftar artikel
        Route::get('/articles', [ArticleController::class, 'index'])
            ->name('index');
        
        // Create - Form tambah
        Route::get('/articles/create', [ArticleController::class, 'create'])
            ->name('create');
        
        // Store - Simpan artikel baru
        Route::post('/articles', [ArticleController::class, 'store'])
            ->name('store');
        
        // Edit - Form edit
        Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
            ->name('edit');
        
        // Update - Simpan perubahan
        Route::put('/articles/{article}', [ArticleController::class, 'update'])
            ->name('update');
        
        // Destroy - Hapus artikel
        Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])
            ->name('destroy');
    });
```

**Route Names:**
- `admin.articles.index` - GET `/admin/articles`
- `admin.articles.create` - GET `/admin/articles/create`
- `admin.articles.store` - POST `/admin/articles`
- `admin.articles.edit` - GET `/admin/articles/{id}/edit`
- `admin.articles.update` - PUT `/admin/articles/{id}`
- `admin.articles.destroy` - DELETE `/admin/articles/{id}`

---

## 🎛️ Controller

**File:** `app/Http/Controllers/ArticleController.php`

### Methods (Admin):

#### 1. **index()**
```php
public function index()
{
    return Inertia::render("Admin/Articles/Index", [
        "articles" => Article::with("tags")->latest()->paginate(10),
    ]);
}
```
- Load 10 artikel per page
- Include tags relationship
- Sort by latest

#### 2. **create()**
```php
public function create()
{
    return Inertia::render("Admin/Articles/Create");
}
```
- Render form create

#### 3. **store(Request $request)**
```php
public function store(Request $request)
{
    // Validate
    $request->validate([...]);
    
    // Auto-generate slug
    $slug = Str::slug($request->title);
    
    // Handle thumbnail upload
    if ($request->hasFile("image_url")) {
        $data["image_url"] = $request->file("image_url")
            ->store("articles", "public");
    }
    
    // Create article
    $article = Article::create($data);
    
    // Sync tags
    if ($request->tags) {
        // Create or get tags
        // Sync to article
    }
    
    return redirect()->route("admin.articles.index");
}
```

#### 4. **edit(Article $article)**
```php
public function edit(Article $article)
{
    return Inertia::render("Admin/Articles/Edit", [
        "article" => $article->load("tags"),
        "selectedTags" => $article->tags->pluck("name")->toArray(),
    ]);
}
```

#### 5. **update(Request $request, Article $article)**
```php
public function update(Request $request, Article $article)
{
    // Validate
    // Update slug if title changed
    // Handle new image upload
    // Remove old image if requested
    // Update article
    // Sync tags
    
    return redirect()->route("admin.articles.index");
}
```

#### 6. **destroy(Article $article)**
```php
public function destroy(Article $article)
{
    // Delete image from storage
    if ($article->image_url) {
        Storage::disk("public")->delete($article->image_url);
    }
    
    // Delete article
    $article->delete();
    
    return back();
}
```

---

## 🗄️ Database

### Table: articles

```sql
CREATE TABLE articles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    type VARCHAR(50),              -- Umum, Traveling, Rental
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    author VARCHAR(255),
    read_time INT,                 -- dalam menit
    is_published BOOLEAN DEFAULT 0,
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Table: tags

```sql
CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Table: article_tag (Pivot)

```sql
CREATE TABLE article_tag (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    article_id BIGINT NOT NULL,
    tag_id BIGINT NOT NULL,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);
```

---

## 🚀 Cara Penggunaan

### 1. **Akses Admin Panel**

```
http://localhost:8000/login
```
Login dengan kredensial admin.

### 2. **Navigasi ke Artikel**

Setelah login, klik **"Artikel"** di navigation bar (header admin).

### 3. **Tambah Artikel Baru**

1. Klik tombol **"Tambah Artikel Baru"** (merah, pojok kanan atas)
2. Isi form:
   - **Judul**: Masukkan judul artikel
   - **Tipe**: Pilih Umum/Traveling/Rental
   - **Penulis**: (Optional) Nama penulis
   - **Thumbnail**: Upload gambar (drag & drop atau click)
   - **Konten**: Tulis artikel dengan HTML tags
   - **Tags**: Masukkan tags dipisah koma
   - **Waktu Baca**: Estimasi menit baca
   - **Tanggal**: Pilih tanggal publikasi
   - **Status**: Centang untuk publish langsung
3. Klik **"Simpan Artikel"**

### 4. **Edit Artikel**

1. Di tabel artikel, klik icon **Edit** (pensil hijau)
2. Update field yang ingin diubah
3. Untuk ganti gambar: upload gambar baru
4. Klik **"Update Artikel"**

### 5. **Hapus Artikel**

1. Di tabel artikel, klik icon **Delete** (trash merah)
2. Modal konfirmasi akan muncul
3. Review artikel yang akan dihapus
4. Klik **"Hapus"** untuk konfirmasi

### 6. **Filter Artikel**

- **Filter by Type**: Dropdown di atas tabel
  - Pilih: Semua Tipe, Umum, Traveling, Rental
  
- **Filter by Status**: Dropdown di atas tabel
  - Pilih: Semua Status, Published, Draft

### 7. **View Artikel (Frontend)**

Klik icon **View** (mata biru) untuk membuka artikel di tab baru.

---

## 🧪 Testing Guide

### ✅ Checklist Testing

#### **1. Index Page**
- [ ] Buka `/admin/articles`
- [ ] Stats cards tampil dengan data benar
- [ ] Table artikel tampil
- [ ] Thumbnail tampil (atau placeholder)
- [ ] Badge tipe dengan warna benar
- [ ] Tags tampil (max 2 + counter)
- [ ] Status badge benar (green=published, yellow=draft)
- [ ] Filter by Type berfungsi
- [ ] Filter by Status berfungsi
- [ ] Pagination berfungsi
- [ ] Action buttons (View, Edit, Delete) tampil

#### **2. Create Page**
- [ ] Klik "Tambah Artikel Baru"
- [ ] Form kosong tampil
- [ ] Ketik judul → slug preview muncul
- [ ] Upload gambar → preview tampil
- [ ] Remove image → preview hilang
- [ ] Ketik tags → preview tags muncul
- [ ] Submit form tanpa required field → error tampil
- [ ] Submit form lengkap → artikel tersimpan
- [ ] Redirect ke index + flash success

#### **3. Edit Page**
- [ ] Klik Edit pada artikel
- [ ] Form terisi dengan data artikel
- [ ] Gambar saat ini tampil (jika ada)
- [ ] Tags sudah terisi
- [ ] Checkbox publish sesuai status
- [ ] Info box tampil (created & updated date)
- [ ] Update field → slug baru preview (jika judul berubah)
- [ ] Upload gambar baru → preview "Gambar Baru"
- [ ] Remove gambar lama → gambar hilang
- [ ] Update artikel → perubahan tersimpan
- [ ] Redirect ke index + flash success

#### **4. Delete**
- [ ] Klik Delete
- [ ] Modal konfirmasi muncul
- [ ] Info artikel ditampilkan
- [ ] Klik Batal → modal tutup, artikel tetap ada
- [ ] Klik Hapus → artikel terhapus
- [ ] Flash success muncul
- [ ] Artikel hilang dari list

#### **5. Filters**
- [ ] Filter "Umum" → hanya artikel Umum tampil
- [ ] Filter "Traveling" → hanya artikel Traveling tampil
- [ ] Filter "Rental" → hanya artikel Rental tampil
- [ ] Filter "Published" → hanya artikel published tampil
- [ ] Filter "Draft" → hanya artikel draft tampil
- [ ] Kombinasi filter bekerja

#### **6. View Frontend**
- [ ] Klik View → tab baru terbuka
- [ ] Artikel tampil di frontend
- [ ] Layout MainLayout (Header + Footer) tampil
- [ ] Related articles tampil

#### **7. Responsive**
- [ ] Test di mobile (< 640px)
- [ ] Test di tablet (640px - 1024px)
- [ ] Test di desktop (> 1024px)
- [ ] Table scrollable horizontal di mobile
- [ ] Stats cards stack di mobile
- [ ] Form fields responsive

---

## 🎨 Design System

### Colors:
```css
/* Stats Cards */
Total Artikel:    bg-blue-50, text-blue-600
Published:        bg-green-50, text-green-600
Draft:            bg-yellow-50, text-yellow-600
Bulan Ini:        bg-purple-50, text-purple-600

/* Type Badges */
Umum:             bg-blue-100, text-blue-800
Traveling:        bg-green-100, text-green-800
Rental:           bg-red-100, text-red-800

/* Status Badges */
Published:        bg-green-100, text-green-800
Draft:            bg-yellow-100, text-yellow-800

/* Buttons */
Primary (Add):    bg-red-600, hover:bg-red-700
Secondary:        border-gray-300, hover:bg-gray-50
Danger (Delete):  bg-red-600, hover:bg-red-700
Success (Save):   bg-red-600, hover:bg-red-700

/* Action Icons */
View:             hover:text-blue-600
Edit:             hover:text-green-600
Delete:           hover:text-red-600
```

### Typography:
- **Headings**: font-bold, text-gray-900
- **Body**: text-gray-700
- **Meta**: text-gray-500, text-sm
- **Monospace**: font-mono (untuk slug, code)

### Spacing:
- **Section**: py-8
- **Card padding**: p-6
- **Gap**: gap-6 (default), gap-4 (compact)

---

## 🔐 Security

- ✅ Protected by `auth` middleware
- ✅ Only authenticated users can access
- ✅ CSRF protection on all forms
- ✅ File upload validation (type, size)
- ✅ XSS protection (escaping output)
- ✅ SQL injection protection (Eloquent ORM)

---

## 📊 Statistics

Stats cards di Index menghitung:

1. **Total Artikel**: `$articles->total`
2. **Published**: Count artikel dengan `is_published = 1`
3. **Draft**: Count artikel dengan `is_published = 0`
4. **Bulan Ini**: Count artikel created di bulan current

---

## 🐛 Troubleshooting

### Problem: "Route not found"
**Solution:**
```bash
php artisan route:clear
php artisan route:cache
```

### Problem: "Class ArticleController not found"
**Solution:**
```bash
composer dump-autoload
```

### Problem: "Image not uploading"
**Solution:**
```bash
# Check storage link
php artisan storage:link

# Check permissions
chmod -R 775 storage/app/public
```

### Problem: "Validation errors not showing"
**Solution:**
- Check `errors` prop di component
- Pastikan validation di controller benar
- Check console browser untuk errors

---

## 📝 Notes

- **Image Storage**: `storage/app/public/articles/`
- **Image URL**: `/storage/articles/{filename}`
- **Max Image Size**: 2MB
- **Allowed Formats**: PNG, JPG, JPEG
- **Tags**: Auto-create if not exists
- **Slug**: Auto-generate dari title
- **Slug Conflict**: Tambah suffix angka jika duplicate

---

## 🎯 Best Practices

1. **Always backup** sebelum delete artikel
2. **Optimize images** sebelum upload (resize, compress)
3. **Use semantic HTML** di content
4. **Test di multiple browsers**
5. **Check responsive** di berbagai device
6. **Validate input** di client & server side
7. **Use meaningful slugs** untuk SEO

---

## 📞 Support

Jika ada pertanyaan atau masalah:
1. Check dokumentasi ini
2. Check error di browser console (F12)
3. Check Laravel log: `storage/logs/laravel.log`
4. Check database query log

---

## ✅ Checklist Final

Sebelum deploy:
- [ ] Semua routes terdaftar
- [ ] Controller methods lengkap
- [ ] Validations di semua form
- [ ] Image upload berfungsi
- [ ] Delete confirmation modal
- [ ] Flash messages tampil
- [ ] Pagination berfungsi
- [ ] Filters berfungsi
- [ ] Responsive di semua breakpoint
- [ ] Link "Artikel" di AdminLayout
- [ ] Testing di local environment
- [ ] Documentation lengkap

---

**Status: ✅ COMPLETED!**

Semua fitur CRUD Admin Artikel sudah selesai dan siap digunakan! 🎉

---

**Last Updated:** Januari 2025
**Version:** 1.0.0
**Developer:** Santana Cars Team