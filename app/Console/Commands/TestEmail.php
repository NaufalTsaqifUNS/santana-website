<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "email:test {email? : Email tujuan (opsional)}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Test pengiriman email untuk form contact";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🚀 Memulai test pengiriman email...");
        $this->newLine();

        // Get email tujuan dari argument atau gunakan default dari .env
        $toEmail =
            $this->argument("email") ??
            env("MAIL_TO_ADDRESS", "santanarental@gmail.com");

        // Data dummy untuk test
        $testData = [
            "full_name" => "Test Customer",
            "email" => "testcustomer@example.com",
            "phone" => "0812-3456-7890",
            "message" =>
                "Ini adalah test email dari command line. Jika Anda menerima email ini, berarti konfigurasi email sudah berhasil! 🎉",
        ];

        try {
            // Kirim email
            \Mail::to($toEmail)->send(new \App\Mail\ContactMail($testData));

            $this->newLine();
            $this->info("✅ Email berhasil dikirim!");
            $this->info("📧 Tujuan: " . $toEmail);
            $this->newLine();
            $this->info("Silakan cek inbox email Anda.");
            $this->info("Jika tidak ada, cek folder Spam/Junk.");
            $this->newLine();

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->newLine();
            $this->error("❌ Gagal mengirim email!");
            $this->error("Error: " . $e->getMessage());
            $this->newLine();
            $this->warn("💡 Tips troubleshooting:");
            $this->line(
                "1. Pastikan konfigurasi MAIL_* di file .env sudah benar",
            );
            $this->line("2. Cek MAIL_USERNAME dan MAIL_PASSWORD");
            $this->line("3. Pastikan menggunakan App Password dari Gmail");
            $this->line("4. Cek koneksi internet");
            $this->newLine();
            $this->info("📖 Baca dokumentasi lengkap di: SETUP_EMAIL.md");
            $this->newLine();

            return Command::FAILURE;
        }
    }
}
