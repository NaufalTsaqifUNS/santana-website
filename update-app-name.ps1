# Script untuk update APP_NAME di file .env
# Usage: .\update-app-name.ps1

$envFile = ".env"
$newAppName = "Santana Rental Mobil Solo"

Write-Host "🔧 Updating APP_NAME in .env file..." -ForegroundColor Cyan
Write-Host ""

if (-Not (Test-Path $envFile)) {
    Write-Host "❌ Error: File .env tidak ditemukan!" -ForegroundColor Red
    Write-Host "Pastikan Anda menjalankan script ini di root folder project." -ForegroundColor Yellow
    exit 1
}

# Backup file .env
Copy-Item $envFile "$envFile.backup" -Force
Write-Host "📦 Backup created: .env.backup" -ForegroundColor Green

# Baca isi file .env
$content = Get-Content $envFile -Raw

# Replace APP_NAME
$content = $content -replace 'APP_NAME=Laravel', "APP_NAME=`"$newAppName`""
$content = $content -replace 'APP_NAME="Laravel"', "APP_NAME=`"$newAppName`""
$content = $content -replace "APP_NAME='Laravel'", "APP_NAME=`"$newAppName`""

# Simpan kembali
$content | Set-Content $envFile -NoNewline

Write-Host "✅ APP_NAME berhasil diupdate menjadi: $newAppName" -ForegroundColor Green
Write-Host ""

# Clear cache Laravel
Write-Host "🧹 Clearing Laravel cache..." -ForegroundColor Cyan
php artisan config:clear | Out-Null
php artisan cache:clear | Out-Null

Write-Host "✅ Cache cleared successfully!" -ForegroundColor Green
Write-Host ""
Write-Host "🎉 Selesai! Refresh browser untuk melihat perubahan." -ForegroundColor Green
Write-Host ""
Write-Host "💡 Jika nama belum berubah, restart development server:" -ForegroundColor Yellow
Write-Host "   Ctrl+C untuk stop server, lalu jalankan:" -ForegroundColor Yellow
Write-Host "   php artisan serve" -ForegroundColor Yellow
Write-Host ""
