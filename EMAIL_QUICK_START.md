# 📧 Quick Start - Setup Email Gmail

Panduan singkat untuk setup email form contact dalam 5 menit.

## 🚀 Langkah Cepat

### 1. Generate App Password Gmail

1. Buka: https://myaccount.google.com/apppasswords
2. Login dengan akun Gmail perusahaan
3. Pilih **App** → **Mail**
4. Pilih **Device** → **Other** → Ketik "Santana Website"
5. Klik **Generate**
6. **Salin** password 16 karakter yang muncul (contoh: `abcd efgh ijkl mnop`)

> ⚠️ **Catatan**: Hapus semua spasi dari password sebelum copy ke .env

---

### 2. Edit File .env

Buka file `.env` dan ubah bagian email:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=emailperusahaan@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=emailperusahaan@gmail.com
MAIL_FROM_NAME="Santana Rental Mobil Solo"

# Email tujuan penerima pesan
MAIL_TO_ADDRESS=emailperusahaan@gmail.com
```

**Ganti:**
- `emailperusahaan@gmail.com` → Email Gmail perusahaan Anda
- `abcdefghijklmnop` → App Password (16 karakter TANPA spasi)

---

### 3. Test Email

Jalankan command test:

```bash
php artisan email:test
```

Atau test ke email tertentu:

```bash
php artisan email:test customer@example.com
```

**Jika berhasil:**
✅ Anda akan melihat pesan "Email berhasil dikirim!"
✅ Cek inbox email (atau folder Spam)

---

## 🐛 Error? Coba Ini:

### Password salah?
- Pastikan menggunakan **App Password**, bukan password Gmail biasa
- Hapus semua spasi dari App Password
- Generate App Password baru jika perlu

### Email tidak masuk?
- Cek folder **Spam/Junk**
- Tunggu 1-2 menit
- Pastikan `MAIL_FROM_ADDRESS` adalah email yang valid

### Connection error?
Coba ganti port dan encryption:

```env
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
```

---

## ✅ Selesai!

Sekarang form contact sudah bisa mengirim email ke Gmail perusahaan.

**Test di website:**
1. Jalankan: `php artisan serve`
2. Buka: http://localhost:8000/Contact
3. Isi form dan kirim
4. Cek inbox email

---

📖 **Dokumentasi lengkap:** Baca `SETUP_EMAIL.md` untuk troubleshooting detail.