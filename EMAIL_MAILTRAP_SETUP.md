# 📧 Setup Mailtrap untuk Testing Email

Panduan setup Mailtrap sebagai alternatif testing email sebelum production dengan Gmail.

## 🎯 Apa itu Mailtrap?

Mailtrap adalah email testing service yang menangkap semua email yang dikirim dari aplikasi Anda dalam sandbox environment. Email tidak benar-benar dikirim ke penerima, tetapi bisa dilihat di dashboard Mailtrap.

**Keuntungan:**
- ✅ Aman untuk testing (email tidak terkirim ke customer)
- ✅ Bisa preview tampilan email
- ✅ Tidak perlu setup App Password Gmail
- ✅ Unlimited testing emails (free tier)
- ✅ HTML/Text preview

---

## 🚀 Setup Mailtrap

### 1. Daftar Akun Mailtrap (Jika Belum Punya)

1. Buka: https://mailtrap.io
2. Klik **Sign Up** (gratis)
3. Verifikasi email
4. Login ke dashboard

### 2. Dapatkan Kredensial SMTP

1. Di dashboard Mailtrap, pilih **Email Testing**
2. Pilih inbox (biasanya "Demo inbox")
3. Klik tab **SMTP Settings**
4. Pilih **Integration** → **Laravel 9+**
5. Salin kredensial yang muncul

---

## ⚙️ Konfigurasi File .env

Edit file `.env` dan update bagian email:

```env
# Mailtrap Configuration (untuk testing)
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=bcc1a33c1e4fe5
MAIL_PASSWORD=5a5062784535bc
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@santanarental.com"
MAIL_FROM_NAME="Santana Rental Mobil Solo"

# Email tujuan (bisa email apa saja, tidak akan benar-benar dikirim)
MAIL_TO_ADDRESS="admin@santanarental.com"
```

**Catatan:**
- Ganti `MAIL_USERNAME` dan `MAIL_PASSWORD` dengan kredensial dari dashboard Mailtrap Anda
- `MAIL_FROM_ADDRESS` bisa email apa saja (tidak harus real email)
- `MAIL_TO_ADDRESS` juga bisa email apa saja
- Email tidak akan benar-benar dikirim, hanya ditangkap di Mailtrap

---

## 🧪 Test Email

### Test via Command

```bash
php artisan email:test
```

### Test via Website

1. Jalankan server:
   ```bash
   php artisan serve
   ```

2. Buka browser: http://localhost:8000/Contact

3. Isi form contact:
   - Nama: Test Customer
   - Email: test@example.com
   - Telepon: 0812-3456-7890
   - Pesan: Ini adalah test email

4. Klik **Send Message**

---

## 📧 Lihat Email di Mailtrap

1. Buka dashboard Mailtrap: https://mailtrap.io
2. Pilih inbox Anda
3. Email akan muncul dalam beberapa detik
4. Klik email untuk melihat:
   - **HTML** preview - tampilan email yang cantik
   - **Text** version
   - **Raw** - source code email
   - **Headers** - informasi teknis

---

## 🔄 Switch ke Gmail Production

Ketika sudah siap production dan ingin email benar-benar dikirim ke Gmail:

### 1. Generate App Password Gmail

1. Buka: https://myaccount.google.com/apppasswords
2. Generate App Password untuk aplikasi
3. Salin password 16 karakter

### 2. Update File .env

```env
# Gmail Configuration (untuk production)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=santanarental@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="santanarental@gmail.com"
MAIL_FROM_NAME="Santana Rental Mobil Solo"

# Email perusahaan yang akan menerima pesan
MAIL_TO_ADDRESS="santanarental@gmail.com"
```

### 3. Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
```

### 4. Test Lagi

```bash
php artisan email:test
```

Sekarang email akan benar-benar dikirim ke Gmail!

---

## 📊 Perbandingan: Mailtrap vs Gmail

| Fitur | Mailtrap | Gmail |
|-------|----------|-------|
| **Environment** | Development/Testing | Production |
| **Email Terkirim** | ❌ Tidak (sandbox) | ✅ Ya (real) |
| **Setup** | ⚡ Mudah | 🔧 Perlu App Password |
| **Preview Email** | ✅ Dashboard lengkap | ❌ Tidak ada |
| **Keamanan** | ✅ Aman (tidak kirim ke customer) | ⚠️ Hati-hati (kirim real) |
| **Cost** | 🆓 Gratis | 🆓 Gratis |
| **Debugging** | ✅ Mudah | ❌ Sulit |

---

## 💡 Best Practice

### Development/Testing
```env
# Gunakan Mailtrap
MAIL_HOST=sandbox.smtp.mailtrap.io
```

### Production
```env
# Gunakan Gmail
MAIL_HOST=smtp.gmail.com
```

### Tips:
1. **Selalu test dengan Mailtrap dulu** sebelum deploy production
2. **Jangan commit file .env** ke Git
3. **Gunakan .env.example** untuk template konfigurasi
4. **Dokumentasikan kredensial** di tempat aman (password manager)

---

## 🐛 Troubleshooting

### Email tidak muncul di Mailtrap?

**Cek:**
1. Kredensial `MAIL_USERNAME` dan `MAIL_PASSWORD` benar?
2. Clear cache: `php artisan config:clear`
3. Cek koneksi internet
4. Lihat log error: `storage/logs/laravel.log`

### Error "Connection refused"?

**Solusi:**
1. Pastikan `MAIL_PORT=2525` (bukan 587 atau 465)
2. Pastikan `MAIL_ENCRYPTION=null` (atau `tls`)
3. Cek firewall tidak block port 2525

### Email tampil rusak di Mailtrap?

**Solusi:**
1. Lihat tab **HTML** di Mailtrap
2. Pastikan template email sudah benar di `resources/views/emails/contact.blade.php`
3. Cek ada error HTML/CSS

---

## ✅ Checklist Setup Mailtrap

- [ ] Daftar akun Mailtrap
- [ ] Dapatkan kredensial SMTP
- [ ] Update file .env dengan kredensial Mailtrap
- [ ] Clear cache Laravel
- [ ] Test email via command: `php artisan email:test`
- [ ] Cek email di dashboard Mailtrap
- [ ] Test form contact di website
- [ ] Preview tampilan email (HTML/Text)

---

## 📖 Resources

- **Mailtrap Dashboard**: https://mailtrap.io
- **Mailtrap Docs**: https://help.mailtrap.io
- **Laravel Mail Docs**: https://laravel.com/docs/mail

---

**Selamat testing! Ketika siap production, ikuti panduan di `SETUP_EMAIL.md` untuk switch ke Gmail.** 🎉