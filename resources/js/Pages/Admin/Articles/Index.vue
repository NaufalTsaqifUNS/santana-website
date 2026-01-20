<template>
    <Head title="Kelola Artikel - Admin Santana Cars" />

    <AdminLayout>
        <div class="min-h-screen bg-gray-50">
            <!-- Header -->
            <div class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                    >
                        <div>
                            <h1
                                class="text-2xl sm:text-3xl font-bold text-gray-900"
                            >
                                Kelola Artikel
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Kelola semua artikel dan konten website
                            </p>
                        </div>
                        <Link
                            :href="route('admin.articles.create')"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md"
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
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>
                            Tambah Artikel Baru
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Flash Message -->
            <div
                v-if="flash.success"
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6"
            >
                <div
                    class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-3"
                >
                    <svg
                        class="w-5 h-5 flex-shrink-0"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span>{{ flash.success }}</span>
                </div>
            </div>

            <!-- Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Table Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden"
                >
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                        >
                            <h2 class="text-lg font-semibold text-gray-900">
                                Daftar Artikel
                            </h2>
                            <div class="flex gap-2">
                                <!-- Filter by Type -->
                                <select
                                    v-model="filterType"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                >
                                    <option value="">Semua Tipe</option>
                                    <option value="umum">Umum</option>
                                    <option value="traveling">Traveling</option>
                                    <option value="rental">Rental</option>
                                </select>

                                <!-- Filter by Status -->
                                <select
                                    v-model="filterStatus"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                >
                                    <option value="">Semua Status</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Artikel
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Tipe
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Tags
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Tanggal
                                    </th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y divide-gray-200"
                                v-if="filteredArticles.length > 0"
                            >
                                <tr
                                    v-for="article in filteredArticles"
                                    :key="article.id"
                                    class="hover:bg-gray-50 transition-colors"
                                >
                                    <!-- Artikel Info -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <img
                                                v-if="article.image_url"
                                                :src="article.image_url"
                                                :alt="article.title"
                                                class="w-16 h-16 rounded-lg object-cover"
                                            />
                                            <div
                                                v-else
                                                class="w-16 h-16 rounded-lg bg-gray-200 flex items-center justify-center"
                                            >
                                                <svg
                                                    class="w-8 h-8 text-gray-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <p
                                                    class="font-medium text-gray-900"
                                                >
                                                    {{ article.title }}
                                                </p>
                                                <p
                                                    class="text-sm text-gray-500 mt-1"
                                                >
                                                    {{ article.slug }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Type -->
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                            :class="getTypeBadge(article.type)"
                                        >
                                            {{ formatTypeName(article.type) }}
                                        </span>
                                    </td>

                                    <!-- Tags -->
                                    <td class="px-6 py-4">
                                        <div
                                            class="flex flex-wrap gap-1"
                                            v-if="
                                                article.tags &&
                                                article.tags.length > 0
                                            "
                                        >
                                            <span
                                                v-for="tag in article.tags.slice(
                                                    0,
                                                    2,
                                                )"
                                                :key="tag.id"
                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700"
                                            >
                                                {{ tag.name }}
                                            </span>
                                            <span
                                                v-if="article.tags.length > 2"
                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700"
                                            >
                                                +{{ article.tags.length - 2 }}
                                            </span>
                                        </div>
                                        <span
                                            v-else
                                            class="text-sm text-gray-400"
                                        >
                                            Tidak ada tag
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                            :class="
                                                article.is_published
                                                    ? 'bg-green-100 text-green-800'
                                                    : 'bg-yellow-100 text-yellow-800'
                                            "
                                        >
                                            {{
                                                article.is_published
                                                    ? "Published"
                                                    : "Draft"
                                            }}
                                        </span>
                                    </td>

                                    <!-- Date -->
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{
                                                formatDate(
                                                    article.published_at ||
                                                        article.created_at,
                                                )
                                            }}
                                        </div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4">
                                        <div
                                            class="flex items-center justify-end gap-2"
                                        >
                                            <!-- View -->
                                            <a
                                                :href="`/artikel/${article.slug}`"
                                                target="_blank"
                                                class="p-2 text-gray-400 hover:text-blue-600 transition-colors"
                                                title="Lihat Artikel"
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
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    />
                                                </svg>
                                            </a>

                                            <!-- Edit -->
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.articles.edit',
                                                        article.id,
                                                    )
                                                "
                                                class="p-2 text-gray-400 hover:text-green-600 transition-colors"
                                                title="Edit"
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
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                    />
                                                </svg>
                                            </Link>

                                            <!-- Delete -->
                                            <button
                                                @click="confirmDelete(article)"
                                                class="p-2 text-gray-400 hover:text-red-600 transition-colors"
                                                title="Hapus"
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
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Empty State -->
                        <div
                            v-if="filteredArticles.length === 0"
                            class="text-center py-12"
                        >
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
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                Tidak ada artikel
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Mulai dengan membuat artikel baru.
                            </p>
                            <div class="mt-6">
                                <Link
                                    :href="route('admin.articles.create')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700"
                                >
                                    <svg
                                        class="-ml-1 mr-2 h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4"
                                        />
                                    </svg>
                                    Tambah Artikel
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div
                        v-if="articles.links && filteredArticles.length > 0"
                        class="px-6 py-4 border-t border-gray-200"
                    >
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan
                                <span class="font-medium">{{
                                    articles.from
                                }}</span>
                                sampai
                                <span class="font-medium">{{
                                    articles.to
                                }}</span>
                                dari
                                <span class="font-medium">{{
                                    articles.total
                                }}</span>
                                artikel
                            </div>
                            <nav class="flex gap-2">
                                <component
                                    v-for="(link, index) in articles.links"
                                    :key="index"
                                    :is="link.url ? Link : 'span'"
                                    :href="link.url"
                                    :class="[
                                        'px-4 py-2 text-sm font-medium rounded-lg transition-colors',
                                        link.active
                                            ? 'bg-red-600 text-white'
                                            : link.url
                                              ? 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50'
                                              : 'bg-gray-100 text-gray-400 cursor-not-allowed',
                                    ]"
                                    v-html="link.label"
                                />
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <Teleport to="body">
            <div
                v-if="showDeleteModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                @click="showDeleteModal = false"
            >
                <div
                    class="bg-white rounded-lg max-w-md w-full p-6"
                    @click.stop
                >
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center"
                        >
                            <svg
                                class="w-6 h-6 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Hapus Artikel
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Apakah Anda yakin ingin menghapus artikel ini?
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-gray-50 rounded-lg p-4 mb-6"
                        v-if="articleToDelete"
                    >
                        <p class="font-medium text-gray-900">
                            {{ articleToDelete.title }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ articleToDelete.slug }}
                        </p>
                    </div>

                    <div class="flex gap-3 justify-end">
                        <button
                            @click="showDeleteModal = false"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors"
                        >
                            Batal
                        </button>
                        <button
                            @click="deleteArticle"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors"
                        >
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </Teleport>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    articles: Object,
    flash: Object,
});

// Filters
const filterType = ref("");
const filterStatus = ref("");

// Delete Modal
const showDeleteModal = ref(false);
const articleToDelete = ref(null);

// Filtered Articles
const filteredArticles = computed(() => {
    let filtered = props.articles.data || [];

    if (filterType.value) {
        filtered = filtered.filter((a) => a.type === filterType.value);
    }

    if (filterStatus.value === "published") {
        filtered = filtered.filter((a) => a.is_published);
    } else if (filterStatus.value === "draft") {
        filtered = filtered.filter((a) => !a.is_published);
    }

    return filtered;
});

// This Month Count
const thisMonthCount = computed(() => {
    const now = new Date();
    const currentMonth = now.getMonth();
    const currentYear = now.getFullYear();

    return props.articles.data.filter((article) => {
        const createdAt = new Date(article.created_at);
        return (
            createdAt.getMonth() === currentMonth &&
            createdAt.getFullYear() === currentYear
        );
    }).length;
});

// Format Date
const formatDate = (dateString) => {
    if (!dateString) return "-";
    const options = { day: "numeric", month: "short", year: "numeric" };
    return new Date(dateString).toLocaleDateString("id-ID", options);
};

// Get Type Badge
const getTypeBadge = (type) => {
    const badges = {
        umum: "bg-blue-100 text-blue-800",
        traveling: "bg-green-100 text-green-800",
        rental: "bg-red-100 text-red-800",
    };
    return badges[type] || badges.umum;
};

// Format type name for display (capitalize first letter)
const formatTypeName = (type) => {
    if (!type) return "Umum";
    return type.charAt(0).toUpperCase() + type.slice(1);
};

// Confirm Delete
const confirmDelete = (article) => {
    articleToDelete.value = article;
    showDeleteModal.value = true;
};

// Delete Article
const deleteArticle = () => {
    if (articleToDelete.value) {
        router.delete(
            route("admin.articles.destroy", articleToDelete.value.id),
            {
                preserveScroll: true,
                onSuccess: () => {
                    showDeleteModal.value = false;
                    articleToDelete.value = null;
                },
            },
        );
    }
};
</script>

<style scoped>
/* Custom scrollbar untuk table */
.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
