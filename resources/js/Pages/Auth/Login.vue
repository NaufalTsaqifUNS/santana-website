<template>
    <Head title="Login Admin - Santana Rental Mobil Solo" />

    <div
        class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
    >
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Animated Gradient Blobs -->
            <div
                class="absolute w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-blob"
                style="top: -10%; right: -5%"
            ></div>
            <div
                class="absolute w-96 h-96 bg-red-600/10 rounded-full blur-3xl animate-blob animation-delay-2000"
                style="bottom: -20%; left: -10%"
            ></div>

            <!-- Grid Pattern Overlay -->
            <div
                class="absolute inset-0 opacity-5"
                style="
                    background-image:
                        linear-gradient(#ef4444 1px, transparent 1px),
                        linear-gradient(90deg, #ef4444 1px, transparent 1px);
                    background-size: 40px 40px;
                "
            ></div>
        </div>

        <!-- Login Card -->
        <div
            class="relative max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-2xl border border-gray-100 animate-slide-up"
        >
            <!-- Logo/Icon -->
            <div class="flex justify-center">
                <div
                    class="p-4 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl shadow-lg"
                >
                    <svg
                        class="w-12 h-12 text-white"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        ></path>
                    </svg>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/10 border border-red-500/20 rounded-full mb-4"
                >
                    <div
                        class="w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    ></div>
                    <span class="text-red-600 text-sm font-semibold"
                        >Administrator Panel</span
                    >
                </div>
                <h2
                    class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2 animate-fade-in"
                >
                    Admin <span class="text-red-500">Login</span>
                </h2>
                <p
                    class="text-gray-600 text-sm sm:text-base animate-fade-in"
                    style="animation-delay: 0.1s"
                >
                    Sistem Rental Mobil Santana Cars
                </p>
            </div>

            <!-- Form -->
            <form
                class="mt-8 space-y-6 animate-fade-in"
                style="animation-delay: 0.2s"
                @submit.prevent="submit"
            >
                <!-- Email Input -->
                <div>
                    <label
                        for="email"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Email Address
                    </label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                ></path>
                            </svg>
                        </div>
                        <input
                            id="email"
                            v-model="form.email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-gray-400"
                            placeholder="admin@example.com"
                        />
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label
                        for="password"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Password
                    </label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                ></path>
                            </svg>
                        </div>
                        <input
                            id="password"
                            v-model="form.password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-gray-400"
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                <!-- Error Message -->
                <div
                    v-if="errors.email"
                    class="flex items-center gap-2 p-3 bg-red-50 border border-red-200 rounded-xl animate-shake"
                >
                    <svg
                        class="w-5 h-5 text-red-500 flex-shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                    </svg>
                    <span class="text-red-600 text-sm font-medium">{{
                        errors.email
                    }}</span>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        :disabled="processing"
                        class="group relative w-full flex justify-center items-center py-3.5 px-4 border border-transparent text-base font-semibold rounded-xl text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg hover:shadow-xl hover:shadow-red-500/50 hover:-translate-y-0.5 disabled:hover:translate-y-0 disabled:hover:shadow-lg"
                    >
                        <span v-if="processing" class="flex items-center">
                            <svg
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg"
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
                            Signing in...
                        </span>
                        <span v-else class="flex items-center gap-2">
                            Sign in to Dashboard
                            <svg
                                class="w-5 h-5 group-hover:translate-x-1 transition-transform"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                ></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Bottom Info -->
        <div
            class="absolute bottom-6 left-0 right-0 text-center animate-fade-in"
            style="animation-delay: 0.5s"
        ></div>
    </div>
</template>

<script>
import { ref } from "vue";
import { Head, router } from "@inertiajs/vue3";

export default {
    setup() {
        const form = ref({
            email: "",
            password: "",
        });
        const processing = ref(false);
        const errors = ref({});

        const submit = async () => {
            processing.value = true;
            errors.value = {};

            try {
                await router.post("/login", form.value);
            } catch (error) {
                if (error.response?.data?.errors) {
                    errors.value = error.response.data.errors;
                }
            } finally {
                processing.value = false;
            }
        };

        return {
            form,
            processing,
            errors,
            submit,
        };
    },
};
</script>

<style scoped>
@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(30px);
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

@keyframes blob {
    0%,
    100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
}

@keyframes shake {
    0%,
    100% {
        transform: translateX(0);
    }
    10%,
    30%,
    50%,
    70%,
    90% {
        transform: translateX(-5px);
    }
    20%,
    40%,
    60%,
    80% {
        transform: translateX(5px);
    }
}

.animate-slide-up {
    animation: slide-up 0.6s ease-out;
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

.animate-blob {
    animation: blob 15s ease-in-out infinite;
}

.animate-shake {
    animation: shake 0.5s ease-in-out;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>
