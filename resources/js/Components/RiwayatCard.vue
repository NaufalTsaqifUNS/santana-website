<script setup>
defineProps({
    imageUrl: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    carName: {
        type: String,
        default: "",
    },
    date: {
        type: String,
        default: "",
    },
    isFeatured: {
        type: Boolean,
        default: false,
    },
    index: {
        type: Number,
        default: 0,
    },
});

const formatDate = (dateString) => {
    if (!dateString) return "";
    const date = new Date(dateString);
    return date.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });
};
</script>

<template>
    <!-- Featured Large Card - Professional & Clean -->
    <div
        v-if="isFeatured"
        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white"
    >
        <div class="relative h-full min-h-[500px]">
            <!-- Image -->
            <img
                :src="imageUrl"
                :alt="title"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            />

            <!-- Professional Gradient Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
            ></div>

            <!-- Featured Badge - Clean Design -->
            <div class="absolute top-5 left-5">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-lg"
                >
                    <svg
                        class="w-4 h-4 text-yellow-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        />
                    </svg>
                    <span
                        class="text-gray-800 text-xs font-bold uppercase tracking-wide"
                        >Featured</span
                    >
                </div>
            </div>

            <!-- Professional Info Card -->
            <div
                class="absolute bottom-0 left-0 right-0 p-5 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0"
            >
                <div
                    class="bg-white rounded-xl p-4 shadow-xl border border-gray-100"
                >
                    <!-- Location -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="flex-shrink-0 w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center"
                        >
                            <svg
                                class="w-4 h-4 text-red-500"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <h3
                            class="flex-1 text-base font-bold text-gray-900 leading-tight line-clamp-2"
                        >
                            {{ title }}
                        </h3>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-100 my-3"></div>

                    <!-- Car & Date Info -->
                    <div class="space-y-2">
                        <!-- Car -->
                        <div class="flex items-center gap-2">
                            <svg
                                class="w-4 h-4 text-gray-400 flex-shrink-0"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                />
                                <path
                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                />
                            </svg>
                            <span
                                class="text-sm font-semibold text-gray-700 truncate"
                            >
                                {{ carName }}
                            </span>
                        </div>

                        <!-- Date -->
                        <div v-if="date" class="flex items-center gap-2">
                            <svg
                                class="w-4 h-4 text-gray-400 flex-shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <span class="text-sm text-gray-600 font-medium">
                                {{ formatDate(date) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hover Border -->
            <div
                class="absolute inset-0 border-2 border-red-500/0 group-hover:border-red-500 rounded-2xl transition-colors duration-300 pointer-events-none"
            ></div>
        </div>
    </div>

    <!-- Regular Gallery Items - Professional & Minimalist -->
    <div
        v-else
        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 bg-white cursor-pointer"
    >
        <div class="relative h-full min-h-[500px]">
            <!-- Image -->
            <div class="absolute inset-0">
                <img
                    :src="imageUrl"
                    :alt="title"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
            </div>

            <!-- Professional Gradient -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent"
            ></div>

            <!-- Clean Info Card - Show on Hover -->
            <div
                class="absolute bottom-0 left-0 right-0 p-5 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0"
            >
                <div
                    class="bg-white rounded-xl p-4 shadow-xl border border-gray-100"
                >
                    <!-- Location -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="flex-shrink-0 w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center"
                        >
                            <svg
                                class="w-4 h-4 text-red-500"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <h4
                            class="flex-1 text-base font-bold text-gray-900 leading-tight line-clamp-2"
                        >
                            {{ title }}
                        </h4>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-100 my-3"></div>

                    <!-- Car & Date Info -->
                    <div class="space-y-2">
                        <!-- Car -->
                        <div class="flex items-center gap-2">
                            <svg
                                class="w-4 h-4 text-gray-400 flex-shrink-0"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                />
                                <path
                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                />
                            </svg>
                            <span
                                class="text-sm font-semibold text-gray-700 truncate"
                            >
                                {{ carName }}
                            </span>
                        </div>

                        <!-- Date -->
                        <div v-if="date" class="flex items-center gap-2">
                            <svg
                                class="w-4 h-4 text-gray-400 flex-shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <span class="text-sm text-gray-600 font-medium">
                                {{ formatDate(date) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hover Border -->
            <div
                class="absolute inset-0 border-2 border-red-500/0 group-hover:border-red-500 rounded-2xl transition-colors duration-300 pointer-events-none"
            ></div>
        </div>
    </div>
</template>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth text rendering */
h3,
h4,
p,
span {
    word-wrap: break-word;
    overflow-wrap: break-word;
}
</style>
