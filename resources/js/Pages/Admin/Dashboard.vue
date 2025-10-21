<template>
    <AdminLayout>
        <div class="min-h-screen bg-gray-50">
            <!-- Hero Header with Wave -->
            <div
                class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 pb-32 overflow-hidden"
            >
                <!-- Animated Background Elements -->
                <div class="absolute inset-0 opacity-10">
                    <div
                        class="absolute w-64 h-64 bg-red-500 rounded-full blur-3xl animate-pulse"
                        style="top: -10%; left: -5%"
                    ></div>
                    <div
                        class="absolute w-96 h-96 bg-red-600 rounded-full blur-3xl animate-pulse"
                        style="bottom: -20%; right: -10%; animation-delay: 2s"
                    ></div>
                </div>

                <!-- Grid Pattern -->
                <div
                    class="absolute inset-0 opacity-5"
                    style="
                        background-image:
                            linear-gradient(#ef4444 1px, transparent 1px),
                            linear-gradient(90deg, #ef4444 1px, transparent 1px);
                        background-size: 50px 50px;
                    "
                ></div>

                <div
                    class="relative container mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16"
                >
                    <!-- Top Bar -->
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8"
                    >
                        <div>
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-red-500/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-3"
                            >
                                <div
                                    class="w-2 h-2 bg-red-500 rounded-full animate-pulse"
                                ></div>
                                <span class="text-white text-xs font-medium"
                                    >Administrator</span
                                >
                            </div>
                            <h1
                                class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-2"
                            >
                                Dashboard Overview
                            </h1>
                            <p class="text-gray-300 text-sm sm:text-base">
                                Selamat datang kembali! Berikut adalah ringkasan
                                sistem Anda
                            </p>
                        </div>

                        <!-- Quick Stats Badge -->
                        <div class="flex gap-2">
                            <div
                                class="px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl"
                            >
                                <p class="text-xs text-gray-300 mb-1">
                                    Hari Ini
                                </p>
                                <p class="text-xl font-bold text-white">
                                    {{
                                        new Date().toLocaleDateString("id-ID", {
                                            day: "numeric",
                                            month: "short",
                                        })
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards - Floating Design -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                    >
                        <!-- Card 1 - Total Mobil -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity"
                            ></div>
                            <div
                                class="relative bg-white rounded-2xl p-6 shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <div
                                    class="flex items-start justify-between mb-4"
                                >
                                    <div
                                        class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg"
                                    >
                                        <svg
                                            class="w-7 h-7 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                            ></path>
                                        </svg>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full"
                                    >
                                        AKTIF
                                    </span>
                                </div>
                                <div class="space-y-1">
                                    <p
                                        class="text-gray-500 text-sm font-medium"
                                    >
                                        Total Mobil
                                    </p>
                                    <p class="text-4xl font-bold text-gray-900">
                                        {{ stats.totalMobil }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        Kendaraan terdaftar
                                    </p>
                                </div>
                                <!-- Progress Bar -->
                                <div
                                    class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full"
                                        style="width: 100%"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 - Total Perjalanan -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity"
                            ></div>
                            <div
                                class="relative bg-white rounded-2xl p-6 shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <div
                                    class="flex items-start justify-between mb-4"
                                >
                                    <div
                                        class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg"
                                    >
                                        <svg
                                            class="w-7 h-7 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                            ></path>
                                        </svg>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full"
                                    >
                                        DATA
                                    </span>
                                </div>
                                <div class="space-y-1">
                                    <p
                                        class="text-gray-500 text-sm font-medium"
                                    >
                                        Total Perjalanan
                                    </p>
                                    <p class="text-4xl font-bold text-gray-900">
                                        {{ stats.totalPerjalanan }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        Riwayat tercatat
                                    </p>
                                </div>
                                <!-- Progress Bar -->
                                <div
                                    class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full"
                                        style="width: 85%"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 - Mobil Tersedia -->
                        <div class="group relative sm:col-span-2 lg:col-span-1">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity"
                            ></div>
                            <div
                                class="relative bg-white rounded-2xl p-6 shadow-xl transform hover:scale-105 transition-all duration-300"
                            >
                                <div
                                    class="flex items-start justify-between mb-4"
                                >
                                    <div
                                        class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg"
                                    >
                                        <svg
                                            class="w-7 h-7 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full"
                                    >
                                        READY
                                    </span>
                                </div>
                                <div class="space-y-1">
                                    <p
                                        class="text-gray-500 text-sm font-medium"
                                    >
                                        Mobil Tersedia
                                    </p>
                                    <p class="text-4xl font-bold text-gray-900">
                                        {{ stats.mobilTersedia }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        Siap disewakan
                                    </p>
                                </div>
                                <!-- Progress Bar -->
                                <div
                                    class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full"
                                        :style="`width: ${(stats.mobilTersedia / stats.totalMobil) * 100}%`"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wave Separator -->
                <div class="absolute bottom-0 left-0 right-0">
                    <svg
                        viewBox="0 0 1440 120"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-full"
                    >
                        <path
                            d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                            fill="#F9FAFB"
                        />
                    </svg>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-12">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                    <!-- Left Column - Mobil Terbaru (Larger) -->
                    <div class="xl:col-span-2 space-y-6">
                        <!-- Section Header -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-500 rounded-lg">
                                    <svg
                                        class="w-5 h-5 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                        ></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">
                                    Mobil Terbaru
                                </h2>
                            </div>
                            <span class="text-sm text-gray-500"
                                >{{ mobilTerbaru.length }} mobil</span
                            >
                        </div>

                        <!-- Mobil Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div
                                v-for="mobil in mobilTerbaru"
                                :key="mobil.id"
                                class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-500/30"
                            >
                                <!-- Image Container -->
                                <div
                                    class="relative h-48 overflow-hidden bg-gray-100"
                                >
                                    <img
                                        :src="`/storage/${mobil.fotoMobil}`"
                                        :alt="mobil.namaMobil"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                    <!-- Gradient Overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"
                                    ></div>

                                    <!-- Badge -->
                                    <div class="absolute top-3 right-3">
                                        <span
                                            class="px-3 py-1.5 bg-white/95 backdrop-blur-sm text-red-600 text-xs font-bold rounded-full shadow-lg"
                                        >
                                            {{ mobil.jenisMobil }}
                                        </span>
                                    </div>

                                    <!-- Status Indicator -->
                                    <div class="absolute top-3 left-3">
                                        <div
                                            class="flex items-center gap-1.5 px-2.5 py-1 bg-green-500/90 backdrop-blur-sm rounded-full"
                                        >
                                            <div
                                                class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"
                                            ></div>
                                            <span
                                                class="text-white text-xs font-medium"
                                                >Tersedia</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-5">
                                    <h3
                                        class="text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors"
                                    >
                                        {{ mobil.namaMobil }}
                                    </h3>

                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div>
                                            <p
                                                class="text-xs text-gray-500 mb-1"
                                            >
                                                Harga per hari
                                            </p>
                                            <p
                                                class="text-xl font-bold text-red-600"
                                            >
                                                Rp
                                                {{
                                                    Number(
                                                        mobil.hargaMobil,
                                                    ).toLocaleString("id-ID")
                                                }}
                                            </p>
                                        </div>
                                        <button
                                            class="p-2 bg-red-50 hover:bg-red-500 rounded-lg group/btn transition-colors"
                                        >
                                            <svg
                                                class="w-5 h-5 text-red-500 group-hover/btn:text-white transition-colors"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 5l7 7-7 7"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Hover Effect Border -->
                                <div
                                    class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-red-500 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
                                ></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Perjalanan Terbaru -->
                    <div class="xl:col-span-1 space-y-6">
                        <!-- Section Header -->
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-red-500 rounded-lg">
                                <svg
                                    class="w-5 h-5 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    ></path>
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    ></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">
                                Perjalanan Terbaru
                            </h2>
                        </div>

                        <!-- Timeline List -->
                        <div
                            class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden"
                        >
                            <div
                                class="p-6 space-y-4 max-h-[600px] overflow-y-auto"
                            >
                                <div
                                    v-for="(
                                        perjalanan, index
                                    ) in perjalananTerbaru"
                                    :key="perjalanan.id"
                                    class="relative pl-6 pb-6 border-l-2 border-gray-200 last:border-l-transparent last:pb-0"
                                >
                                    <!-- Timeline Dot -->
                                    <div
                                        class="absolute -left-[9px] top-0 w-4 h-4 bg-red-500 rounded-full border-4 border-white shadow-md"
                                    ></div>

                                    <!-- Card -->
                                    <div
                                        class="group hover:bg-gray-50 rounded-xl p-4 -ml-2 transition-colors cursor-pointer"
                                    >
                                        <!-- Header -->
                                        <div
                                            class="flex items-start justify-between mb-2"
                                        >
                                            <div class="flex-1">
                                                <div
                                                    class="flex items-center gap-2 mb-1"
                                                >
                                                    <svg
                                                        class="w-4 h-4 text-red-500 flex-shrink-0"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                                        ></path>
                                                    </svg>
                                                    <p
                                                        class="font-bold text-gray-900 group-hover:text-red-600 transition-colors"
                                                    >
                                                        {{
                                                            perjalanan.namaMobil
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div
                                            class="flex items-center gap-2 mb-2 ml-6"
                                        >
                                            <svg
                                                class="w-4 h-4 text-gray-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                ></path>
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                ></path>
                                            </svg>
                                            <p
                                                class="text-sm font-semibold text-gray-700"
                                            >
                                                {{ perjalanan.namaLokasi }}
                                            </p>
                                        </div>

                                        <!-- Description -->
                                        <p
                                            class="text-sm text-gray-600 leading-relaxed ml-6 mb-2"
                                        >
                                            {{
                                                perjalanan.deskripsi_perjalanan
                                            }}
                                        </p>

                                        <!-- Date -->
                                        <div
                                            class="flex items-center gap-1.5 ml-6"
                                        >
                                            <svg
                                                class="w-3.5 h-3.5 text-gray-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="text-xs font-medium text-gray-500"
                                            >
                                                {{
                                                    formatDate(
                                                        perjalanan.tanggal_perjalanan,
                                                    )
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Info Cards -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl p-6 text-white shadow-xl"
                    >
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-white/20 rounded-lg">
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
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg">Performa Baik</h3>
                        </div>
                        <p class="text-white/90 text-sm">
                            Sistem berjalan dengan optimal
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100"
                    >
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-red-50 rounded-lg">
                                <svg
                                    class="w-5 h-5 text-red-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900">
                                Quick Access
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Kelola data dengan cepat dan mudah
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100"
                    >
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-red-50 rounded-lg">
                                <svg
                                    class="w-5 h-5 text-red-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900">
                                Secure
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Data Anda aman dan terproteksi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    stats: Object,
    mobilTerbaru: Array,
    perjalananTerbaru: Array,
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};
</script>

<style scoped>
@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.animate-slide-up {
    animation: slide-up 0.6s ease-out;
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #ef4444;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #dc2626;
}
</style>
