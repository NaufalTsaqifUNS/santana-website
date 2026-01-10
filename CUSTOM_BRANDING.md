# 🎨 Custom Branding Website Santana Rental

Dokumentasi lengkap untuk mengubah nama, favicon, dan branding website Santana Rental Mobil Solo.

---

## ✅ Yang Sudah Dikustomisasi

### 1. Nama Website di Tab Browser ✅

**File yang diubah:**
- `.env` - APP_NAME diubah menjadi "Santana Rental Mobil Solo"

**Hasil:**
- Tab browser sekarang menampilkan: **"Santana Rental Mobil Solo"**
- Tidak lagi menampilkan "Laravel"

---

## 🔧 Cara Mengubah Nama Website

### Metode 1: Menggunakan Script PowerShell (MUDAH)

```powershell
# Jalankan script yang sudah dibuat
.\update-app-name.ps1
```

### Metode 2: Edit Manual

1. Buka file `.env`
2. Cari baris: `APP_NAME=Laravel`
3. Ubah menjadi: `APP_NAME="Santana Rental Mobil Solo"`
4. Simpan file
5. Clear cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```
6. Restart server (jika sedang running)

---

## 🖼️ Menambahkan Favicon (Icon Tab Browser)

Favicon adalah icon kecil yang muncul di tab browser. Saat ini sudah ada placeholder di `app.blade.php`.

### Langkah-langkah:

#### 1. Siapkan Gambar Logo

**Spesifikasi:**
- Format: PNG atau ICO
- Ukuran yang dibutuhkan:
  - `favicon.ico` - 16x16, 32x32, atau 48x48 px
  - `apple-touch-icon.png` - 180x180 px (untuk Apple devices)

#### 2. Convert Logo ke Favicon

**Opsi A: Online Generator**
- Buka: https://favicon.io/favicon-converter/
- Upload logo Santana Rental
- Download hasil convert
- Extract file ZIP

**Opsi B: Manual dengan Tools**
- Gunakan Photoshop/GIMP
- Resize logo menjadi 32x32 px
- Save as `.ico` format

#### 3. Copy File ke Folder Public

```
santana-website/
└── public/
    ├── favicon.ico           <- Copy file ini
    ├── apple-touch-icon.png  <- Copy file ini
    └── images/
        └── og-image.jpg      <- (Opsional untuk social media)
```

**Via Command:**
```bash
# Buat folder images jika belum ada
mkdir public/images

# Copy favicon (ganti path sesuai lokasi file Anda)
copy path\to\your\favicon.ico public\favicon.ico
copy path\to\your\apple-touch-icon.png public\apple-touch-icon.png
```

#### 4. Refresh Browser

- Hard refresh: `Ctrl + Shift + R` (Windows/Linux) atau `Cmd + Shift + R` (Mac)
- Clear browser cache jika perlu

---

## 🌐 Meta Tags untuk SEO

Meta tags sudah ditambahkan di `resources/views/app.blade.php`:

### Meta Description
```html
<meta name="description" content="Santana Rental Mobil Solo - Layanan rental mobil terpercaya...">
```

**Cara Mengubah:**
1. Buka: `resources/views/app.blade.php`
2. Cari: `<meta name="description"`
3. Edit content sesuai kebutuhan
4. Maksimal 160 karakter untuk hasil optimal SEO

### Meta Keywords
```html
<meta name="keywords" content="rental mobil solo, sewa mobil solo, ...">
```

**Cara Mengubah:**
1. Edit keywords di file yang sama
2. Pisahkan dengan koma
3. Fokus pada kata kunci yang relevan

---

## 📱 Open Graph (Social Media Preview)

Ketika link website di-share di Facebook/WhatsApp/Twitter, akan muncul preview card.

### Setup Open Graph Image

1. **Buat gambar preview:**
   - Ukuran: 1200x630 px (recommended)
   - Format: JPG atau PNG
   - Content: Logo + tagline Santana Rental

2. **Save gambar:**
   ```
   public/images/og-image.jpg
   ```

3. **Update jika perlu:**
   Edit `app.blade.php`:
   ```html
   <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
   ```

4. **Test preview:**
   - Facebook: https://developers.facebook.com/tools/debug/
   - Twitter: https://cards-dev.twitter.com/validator
   - LinkedIn: https://www.linkedin.com/post-inspector/

---

## 🎨 Warna Brand di Website

Warna merah Santana sudah digunakan di seluruh website:

### Warna Utama:
- **Primary Red**: `#dc2626` (red-600)
- **Hover Red**: `#ef4444` (red-500)
- **Dark Red**: `#b91c1c` (red-700)

### Mengubah Warna Brand:

File utama yang perlu diubah:

1. **Tailwind Config** - `tailwind.config.js`:
   ```js
   theme: {
       extend: {
           colors: {
               brand: {
                   primary: '#dc2626',  // Ubah ini
                   hover: '#ef4444',    // Ubah ini
               }
           }
       }
   }
   ```

2. **Global Classes** - Cari dan replace di seluruh project:
   - `from-red-500` → `from-brand-primary`
   - `to-red-600` → `to-brand-hover`
   - `bg-red-600` → `bg-brand-primary`
   - dll.

---

## 📝 Mengubah Title di Setiap Halaman

### Halaman Statis

Edit di file Vue masing-masing:

**Contoh: Home Page** (`resources/js/Pages/Home.vue`)
```vue
<script setup>
import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Beranda - Santana Rental Mobil Solo" />
    <!-- konten halaman -->
</template>
```

**Contoh: Contact Page** (`resources/js/Pages/Contact.vue`)
```vue
<Head title="Hubungi Kami - Santana Rental Mobil Solo" />
```

### List Halaman yang Perlu Title:

| Halaman | File | Title yang Disarankan |
|---------|------|----------------------|
| Beranda | `Home.vue` | "Beranda - Santana Rental" |
| Rental List | `ListRental.vue` | "Daftar Mobil - Santana Rental" |
| Car Detail | `CarDetail.vue` | "{Nama Mobil} - Santana Rental" |
| Riwayat | `RiwayatPerjalanan.vue` | "Riwayat Perjalanan - Santana Rental" |
| Contact | `Contact.vue` | "Hubungi Kami - Santana Rental" |
| Login | `Auth/Login.vue` | "Login Admin - Santana Rental" |
| Dashboard | `Dashboard.vue` | "Dashboard - Santana Rental" |

---

## 🔤 Mengubah Font Website

### Font Saat Ini:
- **Figtree** (dari Google Fonts via Bunny Fonts)

### Mengganti Font:

1. **Pilih font dari Bunny Fonts** (privacy-friendly alternative to Google Fonts):
   https://fonts.bunny.net/

2. **Update di** `app.blade.php`:
   ```html
   <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
   ```

3. **Update Tailwind Config** (`tailwind.config.js`):
   ```js
   fontFamily: {
       sans: ['Inter', 'sans-serif'],
   }
   ```

4. **Rebuild Vite:**
   ```bash
   npm run build
   # atau untuk development
   npm run dev
   ```

---

## 🌍 Mengubah Logo di Email

Logo di email template menggunakan emoji 🚗. Untuk menggunakan logo asli:

1. **Upload logo** ke `public/images/logo-email.png`
   - Ukuran: 200x60 px (landscape) atau 120x120 px (square)
   - Background: Transparan atau putih

2. **Edit email template** (`resources/views/emails/contact.blade.php`):
   ```html
   <!-- Ganti ini: -->
   <h1>🚗 Santana Rental Mobil Solo</h1>
   
   <!-- Menjadi: -->
   <img src="{{ asset('images/logo-email.png') }}" alt="Santana Rental" style="max-width: 200px;">
   ```

---

## ✅ Checklist Branding Lengkap

- [x] Nama website di tab browser (APP_NAME)
- [x] Meta description untuk SEO
- [x] Meta keywords untuk SEO
- [ ] Favicon (.ico) di tab browser
- [ ] Apple touch icon untuk iOS
- [ ] Open Graph image untuk social media
- [ ] Logo di email template
- [x] Warna brand di seluruh website
- [ ] Custom font (jika diperlukan)
- [ ] Title unik di setiap halaman

---

## 🚀 Quick Commands

```bash
# Clear semua cache Laravel
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Rebuild assets Vite
npm run build

# Development mode (live reload)
npm run dev
```

---

## 📞 Tips & Troubleshooting

### Nama belum berubah di tab browser?

**Solusi:**
1. Clear cache: `php artisan config:clear`
2. Hard refresh browser: `Ctrl + Shift + R`
3. Restart dev server
4. Check file .env apakah APP_NAME sudah benar

### Favicon tidak muncul?

**Solusi:**
1. Clear browser cache completely
2. Pastikan file `public/favicon.ico` ada
3. Hard refresh: `Ctrl + Shift + R`
4. Coba buka di Incognito/Private mode
5. Restart dev server

### Perubahan CSS tidak apply?

**Solusi:**
1. Stop Vite (`Ctrl + C`)
2. Clear cache: `npm run build`
3. Jalankan lagi: `npm run dev`

### Meta tags tidak update di social media?

**Solusi:**
1. Website harus online (tidak bisa test di localhost)
2. Gunakan debugging tools:
   - Facebook: https://developers.facebook.com/tools/debug/
   - Twitter: https://cards-dev.twitter.com/validator
3. Clear cache di debugger
4. Test ulang

---

## 📚 Resources

- **Laravel Docs**: https://laravel.com/docs
- **Tailwind CSS**: https://tailwindcss.com
- **Inertia.js**: https://inertiajs.com
- **Favicon Generator**: https://favicon.io
- **Bunny Fonts**: https://fonts.bunny.net
- **Meta Tags Guide**: https://metatags.io

---

**Selamat! Branding website Santana Rental sudah dikustomisasi.** 🎉