# Script untuk membuat favicon dari santana-logo.png
# Usage: .\create-favicon.ps1

Write-Host "🎨 Creating Favicon from Santana Logo..." -ForegroundColor Cyan
Write-Host ""

$logoPath = "public/images/santana-logo.png"
$faviconPath = "public/favicon.ico"
$appleTouchIconPath = "public/apple-touch-icon.png"

# Cek apakah logo ada
if (-Not (Test-Path $logoPath)) {
    Write-Host "❌ Error: Logo tidak ditemukan di $logoPath" -ForegroundColor Red
    Write-Host "Pastikan file santana-logo.png ada di folder public/images/" -ForegroundColor Yellow
    exit 1
}

Write-Host "✅ Logo ditemukan: $logoPath" -ForegroundColor Green
Write-Host ""

# Informasi tentang cara convert
Write-Host "📋 Untuk membuat favicon, Anda memiliki beberapa opsi:" -ForegroundColor Yellow
Write-Host ""
Write-Host "OPSI 1: Menggunakan Online Converter (RECOMMENDED)" -ForegroundColor Cyan
Write-Host "----------------------------------------" -ForegroundColor Gray
Write-Host "1. Buka: https://favicon.io/favicon-converter/" -ForegroundColor White
Write-Host "2. Upload file: public/images/santana-logo.png" -ForegroundColor White
Write-Host "3. Klik 'Download' untuk mendapatkan favicon package" -ForegroundColor White
Write-Host "4. Extract file ZIP yang didownload" -ForegroundColor White
Write-Host "5. Copy file-file ini ke folder public/:" -ForegroundColor White
Write-Host "   - favicon.ico" -ForegroundColor Green
Write-Host "   - apple-touch-icon.png" -ForegroundColor Green
Write-Host "   - favicon-16x16.png" -ForegroundColor Green
Write-Host "   - favicon-32x32.png" -ForegroundColor Green
Write-Host ""

Write-Host "OPSI 2: Menggunakan ImageMagick (Command Line)" -ForegroundColor Cyan
Write-Host "----------------------------------------" -ForegroundColor Gray
Write-Host "Jika Anda punya ImageMagick installed:" -ForegroundColor White
Write-Host "magick convert public/images/santana-logo.png -resize 32x32 public/favicon.ico" -ForegroundColor Green
Write-Host "magick convert public/images/santana-logo.png -resize 180x180 public/apple-touch-icon.png" -ForegroundColor Green
Write-Host ""

Write-Host "OPSI 3: Copy Logo sebagai Favicon Sementara" -ForegroundColor Cyan
Write-Host "----------------------------------------" -ForegroundColor Gray
Write-Host "Untuk sementara, kita bisa copy logo PNG sebagai favicon:" -ForegroundColor White
Write-Host ""

$response = Read-Host "Apakah Anda ingin copy logo sebagai favicon sementara? (y/n)"

if ($response -eq 'y' -or $response -eq 'Y') {
    Write-Host ""
    Write-Host "📦 Copying logo as temporary favicon..." -ForegroundColor Cyan

    # Copy sebagai favicon-32x32.png
    Copy-Item $logoPath "public/favicon-32x32.png" -Force
    Write-Host "✅ Created: public/favicon-32x32.png" -ForegroundColor Green

    # Copy sebagai apple-touch-icon.png
    Copy-Item $logoPath $appleTouchIconPath -Force
    Write-Host "✅ Created: public/apple-touch-icon.png" -ForegroundColor Green

    # Copy sebagai favicon.png (sebagai fallback)
    Copy-Item $logoPath "public/favicon.png" -Force
    Write-Host "✅ Created: public/favicon.png" -ForegroundColor Green

    Write-Host ""
    Write-Host "⚠️  CATATAN PENTING:" -ForegroundColor Yellow
    Write-Host "   - File .ico belum dibuat (butuh converter khusus)" -ForegroundColor Yellow
    Write-Host "   - Logo mungkin tidak optimal untuk icon kecil" -ForegroundColor Yellow
    Write-Host "   - Disarankan untuk resize logo terlebih dahulu" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "💡 Untuk hasil terbaik:" -ForegroundColor Cyan
    Write-Host "   1. Buka https://favicon.io/favicon-converter/" -ForegroundColor White
    Write-Host "   2. Upload santana-logo.png" -ForegroundColor White
    Write-Host "   3. Download dan extract" -ForegroundColor White
    Write-Host "   4. Copy semua file ke folder public/" -ForegroundColor White
    Write-Host ""
    Write-Host "✅ Favicon sementara berhasil dibuat!" -ForegroundColor Green
    Write-Host ""
    Write-Host "🔄 Refresh browser untuk melihat perubahan (Ctrl + Shift + R)" -ForegroundColor Cyan

} else {
    Write-Host ""
    Write-Host "📝 Silakan ikuti Opsi 1 atau Opsi 2 di atas untuk membuat favicon." -ForegroundColor Yellow
    Write-Host ""
}

Write-Host ""
Write-Host "📖 Dokumentasi lengkap ada di: CUSTOM_BRANDING.md" -ForegroundColor Cyan
Write-Host ""
