<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Inertia\Inertia;

class ContactController extends Controller
{
    // Menampilkan halaman contact
    public function index()
    {
        return Inertia::render("Contact");
    }

    // Menangani form submission
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            "full_name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "phone" => "required|string|max:20",
            "message" => "required|string|max:1000",
        ]);

        // Kirim email ke Gmail perusahaan
        try {
            Mail::to(env("MAIL_TO_ADDRESS", "info@santanarental.com"))->send(
                new ContactMail($validated),
            );

            // Return success response
            return redirect()
                ->back()
                ->with("success", "Pesan Anda berhasil dikirim!");
        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error("Email sending failed: " . $e->getMessage());

            return redirect()
                ->back()
                ->withErrors([
                    "error" => "Gagal mengirim email. Silakan coba lagi.",
                ]);
        }
    }
}
