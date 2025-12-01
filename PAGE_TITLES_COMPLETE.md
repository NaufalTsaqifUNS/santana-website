# 📄 Custom Page Titles - Dokumentasi Lengkap

Dokumentasi untuk semua page titles yang sudah dikustomisasi di website Santana Rental Mobil Solo.

---

## ✅ Halaman yang Sudah Dikustomisasi

Semua halaman utama sudah memiliki custom title yang SEO-friendly dan konsisten dengan branding.

### 🏠 Halaman Publik

| No | Halaman | File | Title | Status |
|----|---------|------|-------|--------|
| 1 | **Beranda** | `Home.vue` | "Beranda - Santana Rental Mobil Solo" | ✅ |
| 2 | **Daftar Mobil** | `list-rental.vue` | "Daftar Mobil - Santana Rental Mobil Solo" | ✅ |
| 3 | **Detail Mobil** | `CarDetail.vue` | "{Nama Mobil} - Santana Rental Mobil Solo" | ✅ |
| 4 | **Riwayat Perjalanan** | `riwayat-perjalanan.vue` | "Riwayat Perjalanan - Santana Rental Mobil Solo" | ✅ |
| 5 | **Hubungi Kami** | `Contact.vue` | "Hubungi Kami - Santana Rental Mobil Solo" | ✅ |
| 6 | **404 Not Found** | `NotFound.vue` | "Halaman Tidak Ditemukan - Santana Rental Mobil Solo" | ✅ |

### 🔐 Halaman Admin

| No | Halaman | File | Title | Status |
|----|---------|------|-------|--------|
| 1 | **Login** | `Auth/Login.vue` | "Login Admin - Santana Rental Mobil Solo" | ✅ |
| 2 | **Dashboard** | `Admin/Dashboard.vue` | "Dashboard Admin - Santana Rental Mobil Solo" | ✅ |

---

## 🎯 Format Title yang Digunakan

### Pattern Standar:
```
[Nama Halaman] - Santana Rental Mobil Solo
```

### Contoh:
- ✅ "Beranda - Santana Rental Mobil Solo"
- ✅ "Daftar Mobil - Santana Rental Mobil Solo"
- ✅ "Hubungi Kami - Santana Rental Mobil Solo"

### Title Dinamis:
Untuk halaman detail mobil, title menggunakan nama mobil:
```vue
<Head :title="`${car.name} - Santana Rental Mobil Solo`" />
```

**Contoh output:**
- "Toyota Avanza 2023 - Santana Rental Mobil Solo"
- "Honda Brio Satya - Santana Rental Mobil Solo"

---

## 🔧 Cara Implementasi

### 1. Import Head Component

```vue
<script setup>
import { Head } from "@inertiajs/vue3";
</script>
```

### 2. Tambahkan di Template

**Title Statis:**
```vue
<template>
    <Head title="Beranda - Santana Rental Mobil Solo" />
    
    <!-- Konten halaman -->
</template>
```

**Title Dinamis:**
```vue
<template>
    <Head :title="`${car.name} - Santana Rental Mobil Solo`" />
    
    <!-- Konten halaman -->
</template>
```

---

## 📝 Detail Perubahan per File

### 1. Home.vue
```vue
<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
// ... other imports
</script>

<template>
    <Head title="Beranda - Santana Rental Mobil Solo" />
    
    <div class="min-h-screen bg-gray-50">
        <!-- Hero section, dll -->
    </div>
</template>
```

### 2. list-rental.vue
```vue
<script setup>
import { Head, router } from "@inertiajs/vue3";
// ... other imports
</script>

<template>
    <Head title="Daftar Mobil - Santana Rental Mobil Solo" />
    
    <MainLayout>
        <!-- Konten halaman -->
    </MainLayout>
</template>
```

### 3. CarDetail.vue
```vue
<script setup>
import { Head, Link } from "@inertiajs/vue3";
// ... other imports

const props = defineProps({
    car: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head :title="`${car.name} - Santana Rental Mobil Solo`" />
    
    <div class="min-h-screen bg-gray-50">
        <!-- Detail mobil -->
    </div>
</template>
```

### 4. riwayat-perjalanan.vue
```vue
<script setup>
import { Head } from "@inertiajs/vue3";
// ... other imports
</script>

<template>
    <Head title="Riwayat Perjalanan - Santana Rental Mobil Solo" />
    
    <MainLayout>
        <!-- Konten halaman -->
    </MainLayout>
</template>
```

### 5. Contact.vue
```vue
<script setup>
import { Head, useForm } from "@inertiajs/vue3";
// ... other imports
</script>

<template>
    <Head title="Hubungi Kami - Santana Rental Mobil Solo" />
    
    <div class="min-h-screen bg-gray-50">
        <!-- Form contact -->
    </div>
</template>
```

### 6. NotFound.vue
```vue
<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Halaman Tidak Ditemukan - Santana Rental Mobil Solo" />
    
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
        <!-- 404 content -->
    </div>
</template>
```

### 7. Auth/Login.vue
```vue
<script>
import { ref } from "vue";
import { Head, router } from "@inertiajs/vue3";

export default {
    setup() {
        // ... login logic
    }
};
</script>

<template>
    <Head title="Login Admin - Santana Rental Mobil Solo" />
    
    <div class="min-h-screen flex items-center justify-center">
        <!-- Login form -->
    </div>
</template>
```

### 8. Admin/Dashboard.vue
```vue
<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

// ... props and logic
</script>

<template>
    <Head title="Dashboard Admin - Santana Rental Mobil Solo" />
    
    <AdminLayout>
        <!-- Dashboard content -->
    </AdminLayout>
</template>
```

---

## 🌐 Cara Title Ditampilkan di Browser

### Format Lengkap:
```
[Title dari Head] | [APP_NAME dari .env]
```

### Contoh di Tab Browser:

**Sebelum dikustomisasi:**
```
Home | Laravel
```

**Setelah dikustomisasi:**
```
Beranda - Santana Rental Mobil Solo
```

> **Catatan:** Jika Anda melihat format `[Title] | [APP_NAME]`, itu berarti ada konfigurasi tambahan di layout. Format saat ini hanya menampilkan title dari `<Head>` component.

---

## 🎨 Best Practices

### ✅ DO:
- Gunakan format konsisten: `[Nama Halaman] - Santana Rental Mobil Solo`
- Maksimal 60 karakter untuk SEO optimal
- Gunakan bahasa Indonesia untuk halaman publik
- Tambahkan "Admin" untuk halaman admin
- Gunakan title dinamis untuk konten detail (mobil, artikel, dll)

### ❌ DON'T:
- Jangan gunakan ALL CAPS
- Jangan terlalu panjang (>70 karakter)
- Jangan duplikat title antar halaman
- Jangan hardcode nama perusahaan di banyak tempat

---

## 📊 Manfaat SEO

### 1. **Unique Titles**
Setiap halaman memiliki title unik yang membantu search engine memahami konten.

### 2. **Keyword Rich**
Title mengandung keyword penting:
- "Rental Mobil"
- "Solo"
- Nama halaman/konten

### 3. **Brand Consistency**
Semua halaman konsisten dengan branding "Santana Rental Mobil Solo"

### 4. **User-Friendly**
Title jelas dan deskriptif, memudahkan user memahami isi halaman.

---

## 🔍 Testing

### Test di Browser:
1. Jalankan server: `php artisan serve`
2. Buka halaman: http://localhost:8000
3. Lihat tab browser - title akan muncul
4. Navigate ke halaman lain - title akan berubah

### Test dengan Developer Tools:
```javascript
// Buka Console dan ketik:
document.title
// Output: "Beranda - Santana Rental Mobil Solo"
```

### Test SEO:
- **Google Search Console**: Verifikasi title muncul dengan benar
- **Meta Tag Checker**: https://metatags.io
- **View Page Source**: `Ctrl + U` dan cari `<title>`

---

## 🚀 Menambahkan Title di Halaman Baru

### Langkah-langkah:

1. **Import Head Component**
   ```vue
   import { Head } from "@inertiajs/vue3";
   ```

2. **Tambahkan di Template**
   ```vue
   <template>
       <Head title="Nama Halaman - Santana Rental Mobil Solo" />
       <!-- Konten -->
   </template>
   ```

3. **Clear Cache**
   ```bash
   php artisan view:clear
   ```

4. **Test di Browser**
   - Refresh halaman
   - Lihat tab browser

---

## 📱 Title di Social Media

Title juga digunakan saat share di social media (jika tidak ada Open Graph title):

### Facebook/WhatsApp Preview:
```
Beranda - Santana Rental Mobil Solo
```

### Twitter Card:
```
Beranda - Santana Rental Mobil Solo
```

**Untuk kustomisasi lebih lanjut**, edit Open Graph tags di `app.blade.php`:
```html
<meta property="og:title" content="Custom Title untuk Social Media">
```

---

## 🔄 Update Title Massal

Jika ingin mengubah format title semua halaman:

### Cara Manual:
Edit satu per satu file Vue dan ubah title.

### Cara Otomatis (Jika dibutuhkan nanti):
Buat helper function di JavaScript:

```javascript
// utils/pageTitle.js
export const getPageTitle = (pageName) => {
    return `${pageName} - Santana Rental Mobil Solo`;
};

// Gunakan di component:
import { getPageTitle } from '@/utils/pageTitle';

<Head :title="getPageTitle('Beranda')" />
```

---

## 🐛 Troubleshooting

### Title tidak berubah?
**Solusi:**
```bash
# Clear cache
php artisan view:clear
php artisan config:clear

# Hard refresh browser
Ctrl + Shift + R
```

### Title masih menampilkan "Laravel"?
**Solusi:**
1. Pastikan `<Head>` component sudah ditambahkan
2. Pastikan import `Head` dari `@inertiajs/vue3`
3. Restart dev server

### Title tidak muncul di social media?
**Solusi:**
1. Tambahkan Open Graph tags di `app.blade.php`
2. Test dengan Facebook Debugger: https://developers.facebook.com/tools/debug/
3. Clear cache social media

---

## ✅ Checklist Implementasi

- [x] Home.vue - Title ditambahkan
- [x] list-rental.vue - Title ditambahkan
- [x] CarDetail.vue - Title dinamis ditambahkan
- [x] riwayat-perjalanan.vue - Title ditambahkan
- [x] Contact.vue - Title ditambahkan
- [x] NotFound.vue - Title ditambahkan
- [x] Auth/Login.vue - Title ditambahkan
- [x] Admin/Dashboard.vue - Title ditambahkan
- [x] APP_NAME di .env diupdate
- [x] Meta tags di app.blade.php ditambahkan
- [x] Test di browser - semua berfungsi
- [x] Dokumentasi dibuat

---

## 📖 Resources

- **Inertia.js Head**: https://inertiajs.com/title-and-meta
- **Vue.js**: https://vuejs.org
- **SEO Best Practices**: https://developers.google.com/search/docs/appearance/title-link
- **Meta Tags Guide**: https://metatags.io

---

## 🎉 Kesimpulan

Semua halaman utama website Santana Rental Mobil Solo sudah memiliki custom page titles yang:
- ✅ SEO-friendly
- ✅ User-friendly
- ✅ Konsisten dengan branding
- ✅ Unik untuk setiap halaman
- ✅ Dinamis untuk konten detail

**Next Steps:**
- Tambahkan favicon untuk icon di tab browser
- Tambahkan Open Graph image untuk social media
- Monitor SEO performance di Google Search Console

---

**Dokumentasi dibuat pada:** 2024
**Terakhir diupdate:** Implementasi custom titles selesai
**Status:** ✅ Production Ready