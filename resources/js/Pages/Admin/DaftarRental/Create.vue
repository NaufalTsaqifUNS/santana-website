<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 py-8"
        >
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header with Back Button -->
                <div class="mb-8">
                    <Link
                        :href="route('daftar-rental.index')"
                        class="group inline-flex items-center text-gray-600 hover:text-red-500 transition-all duration-300 mb-4"
                    >
                        <svg
                            class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            ></path>
                        </svg>
                        <span class="font-medium">Kembali ke Daftar</span>
                    </Link>

                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg"
                        >
                            <svg
                                class="w-6 h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h1
                                class="text-3xl md:text-4xl font-bold text-gray-900"
                            >
                                Tambah Mobil Baru
                            </h1>
                            <p class="text-gray-600 mt-1">
                                Lengkapi informasi mobil rental Anda
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100"
                >
                    <!-- Progress Indicator -->
                    <div
                        class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200"
                    >
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-gray-700"
                                >Formulir Data Mobil</span
                            >
                            <span
                                class="px-3 py-1 bg-gradient-to-r from-red-100 to-red-200 text-red-800 text-xs font-semibold rounded-full border border-red-200"
                            >
                                Wajib Diisi
                            </span>
                        </div>
                    </div>

                    <form @submit.prevent="submit" class="p-6 md:p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Nama Mobil -->
                            <div class="lg:col-span-2">
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                        ></path>
                                    </svg>
                                    Nama Mobil
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    v-model="form.namaMobil"
                                    type="text"
                                    placeholder="Contoh: Toyota Avanza 2023"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300"
                                    required
                                />
                                <div
                                    v-if="errors.namaMobil"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.namaMobil }}
                                </div>
                            </div>

                            <!-- Foto Mobil -->
                            <div class="lg:col-span-2">
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    Foto Mobil
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div
                                    class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-red-400 transition-all duration-300 bg-gradient-to-br from-gray-50 to-white"
                                >
                                    <input
                                        type="file"
                                        @change="handleFileUpload"
                                        accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        required
                                    />
                                    <div class="text-center">
                                        <svg
                                            class="mx-auto h-12 w-12 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            ></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600">
                                            <span
                                                class="font-semibold text-red-500"
                                                >Klik untuk upload</span
                                            >
                                            atau drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            PNG, JPG, WEBP hingga 10MB
                                        </p>
                                    </div>
                                </div>
                                <div
                                    v-if="errors.fotoMobil"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.fotoMobil }}
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="lg:col-span-2">
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"
                                        ></path>
                                    </svg>
                                    Deskripsi Mobil
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <textarea
                                    v-model="form.deskripsiMobil"
                                    rows="4"
                                    placeholder="Masukkan deskripsi detail tentang mobil ini..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300 resize-none"
                                    required
                                ></textarea>
                                <div
                                    v-if="errors.deskripsiMobil"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.deskripsiMobil }}
                                </div>
                            </div>

                            <!-- Harga -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                    Harga Mobil (Rp)
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium"
                                        >Rp</span
                                    >
                                    <input
                                        v-model="form.hargaMobil"
                                        type="number"
                                        min="0"
                                        placeholder="500000"
                                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300"
                                        required
                                    />
                                </div>
                                <div
                                    v-if="errors.hargaMobil"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.hargaMobil }}
                                </div>
                            </div>

                            <!-- Jenis Mobil -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                        ></path>
                                    </svg>
                                    Jenis Mobil
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select
                                    v-model="form.jenisMobil"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300 bg-white"
                                    required
                                >
                                    <option value="" disabled>
                                        Pilih Jenis Mobil
                                    </option>
                                    <option value="MPV">MPV</option>
                                    <option value="Luxury MPV">
                                        Luxury MPV
                                    </option>
                                    <option value="SUV">SUV</option>
                                    <option value="Van">Van</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Minibus">Minibus</option>
                                    <option value="Bus">Bus</option>
                                </select>
                                <div
                                    v-if="errors.jenisMobil"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.jenisMobil }}
                                </div>
                            </div>

                            <!-- Seat -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                        ></path>
                                    </svg>
                                    Jumlah Seat
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    v-model="form.seat"
                                    type="number"
                                    min="1"
                                    placeholder="7"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300"
                                    required
                                />
                                <div
                                    v-if="errors.seat"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.seat }}
                                </div>
                            </div>

                            <!-- Bahan Bakar -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"
                                        ></path>
                                    </svg>
                                    Jenis Bahan Bakar
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select
                                    v-model="form.jenisBahanBakar"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 hover:border-red-300 bg-white"
                                    required
                                >
                                    <option value="" disabled>
                                        Pilih Bahan Bakar
                                    </option>
                                    <option value="Bensin">Bensin</option>
                                    <option value="Solar">Solar</option>
                                    <option value="Listrik">Listrik</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                                <div
                                    v-if="errors.jenisBahanBakar"
                                    class="mt-2 text-red-600 text-sm flex items-center"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.jenisBahanBakar }}
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div
                            class="mt-8 flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200"
                        >
                            <Link
                                :href="route('daftar-rental.index')"
                                class="group inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 transform hover:scale-105"
                            >
                                <svg
                                    class="w-5 h-5 mr-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    ></path>
                                </svg>
                                Batal
                            </Link>
                            <button
                                type="submit"
                                :disabled="processing"
                                class="group relative inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:shadow-red-500/50 transform hover:scale-105 transition-all duration-300 overflow-hidden disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                            >
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"
                                ></span>
                                <svg
                                    v-if="!processing"
                                    class="w-5 h-5 mr-2 relative z-10"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                                <svg
                                    v-else
                                    class="animate-spin w-5 h-5 mr-2 relative z-10"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                <span class="relative z-10">
                                    {{
                                        processing
                                            ? "Menyimpan..."
                                            : "Simpan Mobil"
                                    }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Info Cards -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200"
                    >
                        <div class="flex items-start">
                            <svg
                                class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-0.5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <div>
                                <h3
                                    class="font-semibold text-blue-900 text-sm mb-1"
                                >
                                    Info Penting
                                </h3>
                                <p class="text-blue-700 text-xs">
                                    Pastikan semua data yang diinput sudah benar
                                    sebelum menyimpan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200"
                    >
                        <div class="flex items-start">
                            <svg
                                class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <div>
                                <h3
                                    class="font-semibold text-green-900 text-sm mb-1"
                                >
                                    Kualitas Foto
                                </h3>
                                <p class="text-green-700 text-xs">
                                    Upload foto dengan resolusi tinggi untuk
                                    hasil terbaik
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200"
                    >
                        <div class="flex items-start">
                            <svg
                                class="w-6 h-6 text-purple-600 mr-3 flex-shrink-0 mt-0.5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path
                                    fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <div>
                                <h3
                                    class="font-semibold text-purple-900 text-sm mb-1"
                                >
                                    Deskripsi Lengkap
                                </h3>
                                <p class="text-purple-700 text-xs">
                                    Berikan deskripsi yang detail dan menarik
                                    untuk pelanggan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { reactive, ref } from "vue";

const processing = ref(false);
const errors = ref({});

const form = reactive({
    namaMobil: "",
    fotoMobil: null,
    deskripsiMobil: "",
    hargaMobil: "",
    jenisMobil: "",
    seat: "",
    jenisBahanBakar: "",
});

const handleFileUpload = (event) => {
    form.fotoMobil = event.target.files[0];
};

const submit = () => {
    processing.value = true;
    errors.value = {};

    const formData = new FormData();
    Object.keys(form).forEach((key) => {
        if (form[key] !== null) {
            formData.append(key, form[key]);
        }
    });

    router.post(route("daftar-rental.store"), formData, {
        onSuccess: () => {
            processing.value = false;
        },
        onError: (err) => {
            errors.value = err;
            processing.value = false;
        },
        preserveScroll: true,
    });
};
</script>
