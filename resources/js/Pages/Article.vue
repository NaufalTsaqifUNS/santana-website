<template>
    <MainLayout>
        <!-- Article Hero Section -->
        <section
            class="relative bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white py-16 md:py-24"
        >
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Breadcrumb -->
                <nav class="mb-6 flex items-center space-x-2 text-sm">
                    <Link
                        href="/"
                        class="text-gray-300 hover:text-white transition-colors"
                    >
                        Home
                    </Link>
                    <span class="text-gray-400">/</span>
                    <Link
                        href="/artikel"
                        class="text-gray-300 hover:text-white transition-colors"
                    >
                        Artikel
                    </Link>
                    <span class="text-gray-400">/</span>
                    <span class="text-gray-400">{{ article.title }}</span>
                </nav>

                <!-- Category Badge -->
                <div class="mb-4">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-400 border border-red-500/30"
                    >
                        {{ article.type || "Umum" }}
                    </span>
                </div>

                <!-- Article Title -->
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight"
                >
                    {{ article.title }}
                </h1>

                <!-- Article Meta -->
                <div
                    class="flex flex-wrap items-center gap-4 text-gray-300 text-sm"
                >
                    <div class="flex items-center gap-2">
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
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>
                        <span>{{
                            formatDate(
                                article.published_at || article.created_at,
                            )
                        }}</span>
                    </div>
                    <div class="flex items-center gap-2" v-if="article.author">
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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>
                        <span>{{ article.author }}</span>
                    </div>
                    <div
                        class="flex items-center gap-2"
                        v-if="article.read_time"
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
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <span>{{ article.read_time }} menit baca</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Article Content Section -->
        <section class="py-12 md:py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Featured Image -->
                    <div
                        v-if="article.image_url"
                        class="w-full h-64 md:h-96 overflow-hidden"
                    >
                        <img
                            :src="article.image_url"
                            :alt="article.title"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <!-- Article Body -->
                    <div class="p-6 md:p-10">
                        <!-- Article Content -->
                        <div
                            class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-a:text-red-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-img:rounded-xl"
                            v-html="article.content"
                        ></div>

                        <!-- Tags -->
                        <div
                            v-if="article.tags && article.tags.length > 0"
                            class="mt-8 pt-8 border-t border-gray-200"
                        >
                            <h3
                                class="text-sm font-semibold text-gray-900 mb-3"
                            >
                                Tags:
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                <Link
                                    v-for="tag in article.tags"
                                    :key="tag.id"
                                    :href="`/tag/${tag.slug}`"
                                    class="px-4 py-2 rounded-full text-xs font-medium bg-gray-100 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors"
                                >
                                    #{{ tag.name }}
                                </Link>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h3
                                class="text-sm font-semibold text-gray-900 mb-3"
                            >
                                Bagikan Artikel:
                            </h3>
                            <div class="flex gap-3">
                                <a
                                    :href="shareLinks.whatsapp"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors text-sm font-medium"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                                        />
                                    </svg>
                                    WhatsApp
                                </a>
                                <a
                                    :href="shareLinks.facebook"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors text-sm font-medium"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                        />
                                    </svg>
                                    Facebook
                                </a>
                                <a
                                    :href="shareLinks.twitter"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center gap-2 px-4 py-2 bg-gray-900 hover:bg-black text-white rounded-lg transition-colors text-sm font-medium"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                        />
                                    </svg>
                                    Twitter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                <div
                    v-if="relatedArticles && relatedArticles.length > 0"
                    class="mt-16"
                >
                    <h2
                        class="text-2xl md:text-3xl font-bold text-gray-900 mb-8"
                    >
                        Artikel Terkait
                    </h2>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                    >
                        <Link
                            v-for="related in relatedArticles"
                            :key="related.id"
                            :href="`/artikel/${related.slug}`"
                            class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1"
                        >
                            <div class="relative h-48 overflow-hidden">
                                <img
                                    :src="
                                        related.image_url ||
                                        '/images/placeholder-article.jpg'
                                    "
                                    :alt="related.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                />
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold bg-red-500/90 text-white backdrop-blur-sm"
                                    >
                                        {{ related.type || "Umum" }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div
                                    class="flex items-center gap-2 text-gray-500 text-xs mb-2"
                                >
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
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />
                                    </svg>
                                    <span>{{
                                        formatDate(
                                            related.published_at ||
                                                related.created_at,
                                        )
                                    }}</span>
                                </div>
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-red-600 transition-colors"
                                >
                                    {{ related.title }}
                                </h3>
                                <p class="text-gray-600 text-sm line-clamp-2">
                                    {{ stripHtml(related.content) }}
                                </p>
                            </div>
                        </Link>
                    </div>
                </div>

                <!-- Back to Articles Button -->
                <div class="mt-12 text-center">
                    <Link
                        href="/artikel"
                        class="inline-flex items-center gap-2 px-8 py-3 bg-gray-900 hover:bg-red-600 text-white rounded-full font-medium transition-all duration-300 hover:shadow-lg hover:scale-105"
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
                        Kembali ke Artikel
                    </Link>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    article: {
        type: Object,
        required: true,
    },
    relatedArticles: {
        type: Array,
        default: () => [],
    },
});

// Format tanggal
const formatDate = (dateString) => {
    if (!dateString) return "";
    const options = { year: "numeric", month: "long", day: "numeric" };
    return new Date(dateString).toLocaleDateString("id-ID", options);
};

// Strip HTML tags untuk preview
const stripHtml = (html) => {
    if (!html) return "";
    const tmp = document.createElement("DIV");
    tmp.innerHTML = html;
    return tmp.textContent || tmp.innerText || "";
};

// Share links
const shareLinks = computed(() => {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(props.article.title);

    return {
        whatsapp: `https://wa.me/?text=${title}%20${url}`,
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
        twitter: `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
    };
});
</script>

<style scoped>
/* Prose styling untuk konten artikel */
:deep(.prose) {
    color: #374151;
    max-width: 100%;
}

:deep(.prose h1),
:deep(.prose h2),
:deep(.prose h3),
:deep(.prose h4) {
    color: #111827;
    font-weight: 700;
    margin-top: 2em;
    margin-bottom: 1em;
}

:deep(.prose h1) {
    font-size: 2.25em;
    line-height: 1.2;
}

:deep(.prose h2) {
    font-size: 1.875em;
    line-height: 1.3;
}

:deep(.prose h3) {
    font-size: 1.5em;
    line-height: 1.4;
}

:deep(.prose p) {
    margin-top: 1.25em;
    margin-bottom: 1.25em;
    line-height: 1.75;
}

:deep(.prose a) {
    color: #ef4444;
    text-decoration: none;
    font-weight: 500;
}

:deep(.prose a:hover) {
    text-decoration: underline;
}

:deep(.prose strong) {
    color: #111827;
    font-weight: 600;
}

:deep(.prose ul),
:deep(.prose ol) {
    margin-top: 1.25em;
    margin-bottom: 1.25em;
    padding-left: 1.625em;
}

:deep(.prose li) {
    margin-top: 0.5em;
    margin-bottom: 0.5em;
}

:deep(.prose img) {
    margin-top: 2em;
    margin-bottom: 2em;
    border-radius: 0.75rem;
}

:deep(.prose blockquote) {
    font-style: italic;
    border-left: 4px solid #ef4444;
    padding-left: 1em;
    margin: 1.5em 0;
    color: #6b7280;
}

:deep(.prose code) {
    background-color: #f3f4f6;
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
    font-size: 0.875em;
    font-family: "Courier New", Courier, monospace;
}

:deep(.prose pre) {
    background-color: #1f2937;
    color: #f9fafb;
    padding: 1em;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1.5em 0;
}

:deep(.prose pre code) {
    background-color: transparent;
    padding: 0;
    color: inherit;
}

/* Line clamp utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>
