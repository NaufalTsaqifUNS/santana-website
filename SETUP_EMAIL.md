# Setup Email Gmail untuk Form Contact

Dokumentasi ini menjelaskan cara setup Gmail SMTP untuk mengirim email dari form contact website Santana Rental Mobil Solo.

## 📋 Prasyarat

- Akun Gmail perusahaan (contoh: santanarental@gmail.com)
- Akses ke pengaturan Gmail

## 🔧 Langkah Setup Gmail SMTP

### 1. Setup Gmail Account

Ada 2 cara untuk menggunakan Gmail SMTP:

#### **Opsi A: Menggunakan App Password (DIREKOMENDASIKAN)**

1. **Aktifkan 2-Step Verification** di akun Gmail:
   - Buka https://myaccount.google.com/security
   - Cari "2-Step Verification"
   - Klik dan ikuti instruksi untuk mengaktifkan

2. **Generate App Password**:
   - Buka https://myaccount.google.com/apppasswords
   - Pilih "App" → Pilih "Mail"
   - Pilih "Device" → Pilih "Other" dan ketik "Santana Website"
   - Klik "Generate"
   - **SIMPAN password 16 karakter yang muncul** (contoh: `abcd efgh ijkl mnop`)

#### **Opsi B: Menggunakan Password Biasa** (Kurang Aman)

1. Buka https://myaccount.google.com/lesssecureapps
2. Aktifkan "Allow less secure apps"
3. Gunakan password Gmail biasa

⚠️ **Catatan**: Google tidak merekomendasikan opsi ini karena alasan keamanan.

---

### 2. Konfigurasi File .env

Buka file `.env` di root folder project dan update bagian MAIL dengan konfigurasi berikut:

```env
# Email Configuration untuk Gmail
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=santanarental@gmail.com
MAIL_PASSWORD="abcd efgh ijkl mnop"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=santanarental@gmail.com
MAIL_FROM_NAME="Santana Rental Mobil Solo"

# Email tujuan untuk menerima pesan dari form contact
MAIL_TO_ADDRESS=santanarental@gmail.com
```

**Penjelasan:**
- `MAIL_MAILER`: Gunakan `smtp` untuk mengirim email
- `MAIL_HOST`: Server SMTP Gmail
- `MAIL_PORT`: Port 587 untuk TLS atau 465 untuk SSL
- `MAIL_USERNAME`: Email Gmail perusahaan Anda
- `MAIL_PASSWORD`: App Password (16 karakter) atau password Gmail biasa
- `MAIL_ENCRYPTION`: Gunakan `tls` atau `ssl`
- `MAIL_FROM_ADDRESS`: Email pengirim
- `MAIL_FROM_NAME`: Nama pengirim yang akan muncul
- `MAIL_TO_ADDRESS`: Email tujuan yang akan menerima pesan dari form contact

---

### 3. Test Pengiriman Email

Setelah setup, test apakah email berfungsi:

#### **Test via Artisan Tinker**

```bash
php artisan tinker
```

Lalu jalankan:

```php
Mail::raw('Test email dari Santana Rental', function ($message) {
    $message->to('santanarental@gmail.com')
            ->subject('Test Email');
});
```

Jika berhasil, Anda akan menerima email di inbox.

#### **Test via Website**

1. Jalankan server: `php artisan serve`
2. Buka halaman Contact: http://localhost:8000/Contact
3. Isi form dan klik "Send Message"
4. Cek inbox email tujuan

---

## 🚨 Troubleshooting

### Error: "Failed to authenticate on SMTP server"

**Solusi:**
- Pastikan username dan password benar
- Jika menggunakan App Password, pastikan tidak ada spasi (hilangkan spasi)
- Pastikan 2-Step Verification sudah aktif jika menggunakan App Password

### Error: "Connection could not be established"

**Solusi:**
- Cek koneksi internet
- Pastikan port 587 atau 465 tidak diblokir firewall
- Coba ganti `MAIL_PORT` dari 587 ke 465 dan `MAIL_ENCRYPTION` dari `tls` ke `ssl`

### Email tidak masuk ke Inbox

**Solusi:**
- Cek folder Spam/Junk
- Tunggu beberapa menit (terkadang ada delay)
- Pastikan `MAIL_FROM_ADDRESS` valid

### Error: "Address in mailbox given does not comply"

**Solusi:**
- Pastikan `MAIL_FROM_ADDRESS` adalah email yang valid
- Pastikan format email benar (tidak ada spasi atau karakter aneh)

---

## 📧 Format Email yang Dikirim

Email yang dikirim akan berisi:
- **Subject**: "Pesan Baru dari Website Santana Rental"
- **From**: Email perusahaan (MAIL_FROM_ADDRESS)
- **Reply-To**: Email customer yang mengisi form
- **To**: Email perusahaan (MAIL_TO_ADDRESS)
- **Content**: 
  - Nama Lengkap customer
  - Email customer (bisa di-klik untuk balas)
  - Nomor Telepon customer (bisa di-klik untuk telpon)
  - Pesan dari customer

---

## 🔐 Keamanan

### Penting! Jangan commit file .env

File `.env` berisi kredensial sensitif. Pastikan file ini ada di `.gitignore`:

```
# .gitignore
.env
.env.*
!.env.example
```

### Backup Kredensial

Simpan App Password di tempat yang aman:
- Password Manager (LastPass, 1Password, dll)
- Catatan terenkripsi
- **JANGAN** simpan di repository Git

---

## 📞 Kontak & Support

Jika ada masalah atau pertanyaan, hubungi:
- Email: support@santanarental.com
- WhatsApp: 0812-xxxx-xxxx

---

## ✅ Checklist Setup

- [ ] 2-Step Verification aktif di Gmail
- [ ] App Password sudah di-generate
- [ ] File .env sudah dikonfigurasi
- [ ] Test email berhasil via tinker
- [ ] Test form contact di website berhasil
- [ ] Email masuk ke inbox tujuan
- [ ] File .env tidak ter-commit ke Git

---

**Selamat! Setup email Gmail untuk form contact sudah selesai.** 🎉