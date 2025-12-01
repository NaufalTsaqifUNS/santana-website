<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Website</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .email-body {
            padding: 30px 20px;
        }
        .info-section {
            background-color: #f9fafb;
            border-left: 4px solid #dc2626;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .info-label {
            font-weight: 600;
            color: #dc2626;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 16px;
            color: #1f2937;
            margin-bottom: 15px;
        }
        .info-value:last-child {
            margin-bottom: 0;
        }
        .message-box {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
        .message-label {
            font-weight: 600;
            color: #dc2626;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }
        .message-content {
            font-size: 15px;
            color: #374151;
            line-height: 1.8;
            white-space: pre-wrap;
        }
        .email-footer {
            background-color: #1f2937;
            color: #9ca3af;
            padding: 20px;
            text-align: center;
            font-size: 13px;
        }
        .email-footer p {
            margin: 5px 0;
        }
        .divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 20px 0;
        }
        .icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 8px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>🚗 Santana Rental Mobil Solo</h1>
            <p>Pesan Baru dari Website</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p style="font-size: 16px; color: #374151; margin-bottom: 20px;">
                Anda menerima pesan baru dari formulir kontak website Santana Rental Mobil Solo:
            </p>

            <!-- Contact Information -->
            <div class="info-section">
                <div class="info-label">👤 Nama Lengkap</div>
                <div class="info-value">{{ $contactData['full_name'] }}</div>

                <div class="info-label">📧 Email</div>
                <div class="info-value">
                    <a href="mailto:{{ $contactData['email'] }}" style="color: #dc2626; text-decoration: none;">
                        {{ $contactData['email'] }}
                    </a>
                </div>

                <div class="info-label">📱 Nomor Telepon</div>
                <div class="info-value">
                    <a href="tel:{{ $contactData['phone'] }}" style="color: #dc2626; text-decoration: none;">
                        {{ $contactData['phone'] }}
                    </a>
                </div>
            </div>

            <!-- Message -->
            <div class="message-box">
                <div class="message-label">💬 Pesan</div>
                <div class="message-content">{{ $contactData['message'] }}</div>
            </div>

            <div class="divider"></div>

            <!-- Action Note -->
            <p style="font-size: 14px; color: #6b7280; margin-top: 20px; padding: 15px; background-color: #fef3c7; border-radius: 5px; border-left: 4px solid #f59e0b;">
                <strong>💡 Catatan:</strong> Silakan balas email ini atau hubungi pelanggan melalui nomor telepon yang tertera untuk memberikan respons cepat.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p><strong>Santana Rental Mobil Solo</strong></p>
            <p>Dusun I, Singopuran, Kartasura, Sukoharjo, Jawa Tengah 57164</p>
            <p>📞 Telepon: (0271) 123456 | 📧 Email: info@santanarental.com</p>
            <p style="margin-top: 15px; font-size: 12px;">
                Email ini dikirim otomatis dari sistem website. Mohon tidak membalas email ini.
            </p>
        </div>
    </div>
</body>
</html>
