<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

// Set layout
defineOptions({
    layout: MainLayout,
});

// Form handling
const form = useForm({
    full_name: "",
    email: "",
    phone: "",
    message: "",
});

const submitForm = () => {
    // You can integrate with backend later
    form.post("/contact", {
        onSuccess: () => {
            form.reset();
            alert("Message sent successfully!");
        },
        onError: () => {
            alert("Failed to send message. Please try again.");
        },
    });
};
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-16 sm:py-20 md:py-24 overflow-hidden"
        >
            <!-- Animated background elements -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 20%; left: 10%"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 40%; right: 10%; animation-delay: 0.5s"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 70%; left: 15%; animation-delay: 1s"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 85%; right: 15%; animation-delay: 1.5s"
                ></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-6 animate-fade-in"
                    >
                        <svg
                            class="w-4 h-4 text-red-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                            />
                            <path
                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                            />
                        </svg>
                        <span class="text-white text-sm font-medium"
                            >We're Here to Help</span
                        >
                    </div>

                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight"
                    >
                        Get In
                        <span class="relative inline-block">
                            <span class="text-red-500">Touch</span>
                            <svg
                                class="absolute -bottom-2 left-0 w-full"
                                height="8"
                                viewBox="0 0 200 12"
                                fill="none"
                            >
                                <path
                                    d="M2 10C60 2 140 2 198 10"
                                    stroke="#EF4444"
                                    stroke-width="3"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </span>
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed"
                    >
                        Have questions about our car rental services? We're here
                        to help. Reach out to us through any of the channels
                        below.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-12 sm:py-16 md:py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Contact Cards -->
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 sm:mb-16"
                >
                    <!-- Phone Card -->
                    <div
                        class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 hover:-translate-y-1"
                    >
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300"
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
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Phone
                        </h3>
                        <a
                            href="tel:+6281234567890"
                            class="text-gray-600 hover:text-red-600 transition-colors font-medium"
                        >
                            +62 812-3456-7890
                        </a>
                    </div>

                    <!-- Email Card -->
                    <div
                        class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 hover:-translate-y-1"
                    >
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300"
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
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Email
                        </h3>
                        <a
                            href="mailto:info@santanacarrental.com"
                            class="text-gray-600 hover:text-red-600 transition-colors font-medium break-all"
                        >
                            info@santanacarrental.com
                        </a>
                    </div>

                    <!-- Address Card -->
                    <div
                        class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 hover:-translate-y-1"
                    >
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300"
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
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Address
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            Santana Rental Mobil Solo<br />
                            Dusun I, Singopuran<br />
                            Kec. Kartasura, Kabupaten Sukoharjo<br />
                            Jawa Tengah 57164
                        </p>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12 sm:mb-16"
                >
                    <!-- Contact Form -->
                    <div>
                        <div
                            class="bg-white rounded-xl shadow-lg p-6 sm:p-8 h-full"
                        >
                            <div class="mb-6">
                                <h2
                                    class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2"
                                >
                                    Send Us a Message
                                </h2>
                                <p class="text-gray-600">
                                    Fill out the form below and we'll get back
                                    to you as soon as possible.
                                </p>
                            </div>

                            <form
                                @submit.prevent="submitForm"
                                class="space-y-5"
                            >
                                <!-- Full Name -->
                                <div>
                                    <label
                                        for="full_name"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Full Name
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="full_name"
                                        v-model="form.full_name"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                        placeholder="John Doe"
                                    />
                                    <span
                                        v-if="form.errors.full_name"
                                        class="text-red-500 text-sm mt-1 block"
                                    >
                                        {{ form.errors.full_name }}
                                    </span>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label
                                        for="email"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Email
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        v-model="form.email"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                        placeholder="john.doe@example.com"
                                    />
                                    <span
                                        v-if="form.errors.email"
                                        class="text-red-500 text-sm mt-1 block"
                                    >
                                        {{ form.errors.email }}
                                    </span>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label
                                        for="phone"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Phone Number
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        v-model="form.phone"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                        placeholder="+62 812-3456-7890"
                                    />
                                    <span
                                        v-if="form.errors.phone"
                                        class="text-red-500 text-sm mt-1 block"
                                    >
                                        {{ form.errors.phone }}
                                    </span>
                                </div>

                                <!-- Message -->
                                <div>
                                    <label
                                        for="message"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Message
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        id="message"
                                        v-model="form.message"
                                        required
                                        rows="5"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all resize-none"
                                        placeholder="Tell us how we can help you..."
                                    ></textarea>
                                    <span
                                        v-if="form.errors.message"
                                        class="text-red-500 text-sm mt-1 block"
                                    >
                                        {{ form.errors.message }}
                                    </span>
                                </div>

                                <!-- Submit Button -->
                                <div>
                                    <button
                                        type="submit"
                                        :disabled="form.processing"
                                        class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3.5 px-6 rounded-lg transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl hover:shadow-red-500/50 hover:scale-[1.02]"
                                    >
                                        <span v-if="form.processing"
                                            >Sending...</span
                                        >
                                        <span v-else>Send Message</span>
                                        <svg
                                            v-if="!form.processing"
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-8">
                        <!-- Follow Us -->
                        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
                            <div class="text-center mb-6">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full mb-4"
                                >
                                    <svg
                                        class="w-8 h-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                                        />
                                    </svg>
                                </div>
                                <h3
                                    class="text-2xl font-bold text-gray-900 mb-2"
                                >
                                    Follow Us
                                </h3>
                                <p class="text-gray-600 text-sm">
                                    Stay connected with us on social media for
                                    latest updates and offers.
                                </p>
                            </div>

                            <div class="space-y-4">
                                <!-- Facebook -->
                                <a
                                    href="https://facebook.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="group flex items-center gap-4 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-600 hover:to-blue-700 rounded-xl p-4 transition-all duration-300 hover:scale-105 hover:shadow-lg"
                                >
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-blue-600 group-hover:bg-white rounded-lg flex items-center justify-center transition-colors"
                                    >
                                        <svg
                                            class="w-6 h-6 text-white group-hover:text-blue-600 transition-colors"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4
                                            class="font-semibold text-blue-900 group-hover:text-white transition-colors"
                                        >
                                            Facebook
                                        </h4>
                                        <p
                                            class="text-sm text-blue-700 group-hover:text-blue-100 transition-colors"
                                        >
                                            Follow us on Facebook
                                        </p>
                                    </div>
                                    <svg
                                        class="w-5 h-5 text-blue-600 group-hover:text-white transition-colors"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                                <!-- Instagram -->
                                <a
                                    href="https://instagram.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="group flex items-center gap-4 bg-gradient-to-r from-pink-50 to-orange-50 hover:from-purple-600 hover:via-pink-600 hover:to-orange-500 rounded-xl p-4 transition-all duration-300 hover:scale-105 hover:shadow-lg"
                                >
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500 group-hover:bg-white rounded-lg flex items-center justify-center transition-colors"
                                    >
                                        <svg
                                            class="w-6 h-6 text-white group-hover:text-pink-600 transition-colors"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4
                                            class="font-semibold text-pink-900 group-hover:text-white transition-colors"
                                        >
                                            Instagram
                                        </h4>
                                        <p
                                            class="text-sm text-pink-700 group-hover:text-pink-100 transition-colors"
                                        >
                                            Follow us on Instagram
                                        </p>
                                    </div>
                                    <svg
                                        class="w-5 h-5 text-pink-600 group-hover:text-white transition-colors"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Quick Info Card -->
                        <div
                            class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 sm:p-8 text-white"
                        >
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center"
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
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-2">
                                        Need Quick Assistance?
                                    </h4>
                                    <p class="text-red-100 text-sm mb-4">
                                        Our team is ready to help you with any
                                        questions about our car rental services.
                                    </p>
                                    <a
                                        href="https://wa.me/6281234567890"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-2 bg-white text-red-600 font-semibold px-4 py-2.5 rounded-lg hover:bg-red-50 transition-colors"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"
                                            />
                                        </svg>
                                        <span>Chat on WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Section -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 p-6"
                    >
                        <h2
                            class="text-2xl sm:text-3xl font-bold text-white text-center mb-2"
                        >
                            Find Us on Map
                        </h2>
                        <p class="text-gray-300 text-center text-sm">
                            Visit our office for personalized service
                        </p>
                    </div>

                    <!-- Map Container -->
                    <div class="relative">
                        <div class="w-full h-96 lg:h-[500px]">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2744707890835!2d110.76385397499694!3d-7.545885992444448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16f0a8c7f0a9%3A0x5e0b0b0b0b0b0b0b!2sSingopuran%2C%20Kartasura%2C%20Sukoharjo%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                                class="w-full h-full border-0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>

                        <!-- Visit Location Button -->
                        <div
                            class="p-6 text-center bg-gray-50 border-t border-gray-200"
                        >
                            <a
                                href="https://www.google.com/maps/search/?api=1&query=Santana+Rental+Mobil+Solo+Dusun+I+Singopuran+Kartasura+Sukoharjo+Jawa+Tengah+57164"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-red-500/50 hover:scale-105"
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
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                                <span>Visit Location</span>
                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.8s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
