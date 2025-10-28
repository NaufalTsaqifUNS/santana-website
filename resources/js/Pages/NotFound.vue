<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center px-4"
    >
        <div class="max-w-md w-full text-center">
            <!-- 404 Number -->
            <h1
                class="text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600 mb-6"
            >
                404
            </h1>

            <!-- Title -->
            <h2 class="text-2xl font-semibold text-white mb-3">
                Halaman Tidak Ditemukan
            </h2>

            <!-- Description -->
            <p class="text-gray-400 mb-8">
                Halaman yang Anda cari tidak tersedia.
            </p>

            <!-- Button -->
            <Link
                href="/"
                class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-medium transition-colors"
            >
                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    />
                </svg>
                <span>Kembali ke Beranda</span>
            </Link>
        </div>
    </div>
</template>
