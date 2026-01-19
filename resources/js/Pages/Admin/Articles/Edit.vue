<template>
    <Head title="Edit Artikel - Admin Santana Cars" />

    <AdminLayout>
        <div class="min-h-screen bg-gray-50 py-8">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6">
                    <Link
                        :href="route('admin.articles.index')"
                        class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 mb-4 transition-colors"
                    >
                        <svg
                            class="w-4 h-4 mr-2"
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
                        Kembali ke Daftar Artikel
                    </Link>
                    <h1
                        class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2"
                    >
                        Edit Artikel
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Update informasi artikel di bawah ini
                    </p>
                </div>

                <!-- Form Card -->
                <form @submit.prevent="submit">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200"
                    >
                        <!-- Form Content -->
                        <div class="p-6 space-y-6">
                            <!-- Title -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Judul Artikel
                                    <span class="text-red-500">*</span>
                                </label>
                                <input
                                    v-model="form.title"
                                    type="text"
                                    placeholder="Masukkan judul artikel..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    :class="{
                                        'border-red-500': errors.title,
                                    }"
                                />
                                <p
                                    v-if="errors.title"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ errors.title }}
                                </p>
                                <!-- Current Slug -->
                                <p class="mt-2 text-xs text-gray-500">
                                    Slug saat ini:
                                    <span class="font-mono text-gray-700">{{
                                        article.slug
                                    }}</span>
                                </p>
                                <!-- Auto Generate Slug Preview if title changed -->
                                <p
                                    v-if="
                                        form.title &&
                                        form.title !== article.title
                                    "
                                    class="mt-1 text-xs text-blue-600"
                                >
                                    Slug baru:
                                    <span class="font-mono">{{
                                        generateSlug(form.title)
                                    }}</span>
                                </p>
                            </div>

                            <!-- Type & Author Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Type -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Tipe Artikel
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        v-model="form.type"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        :class="{
                                            'border-red-500': errors.type,
                                        }"
                                    >
                                        <option value="">Pilih Tipe</option>
                                        <option value="umum">Umum</option>
                                        <option value="traveling">
                                            Traveling
                                        </option>
                                        <option value="rental">Rental</option>
                                    </select>
                                    <p
                                        v-if="errors.type"
                                        class="mt-1 text-sm text-red-600"
                                    >
                                        {{ errors.type }}
                                    </p>
                                </div>

                                <!-- Author -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Nama Penulis
                                    </label>
                                    <input
                                        v-model="form.author"
                                        type="text"
                                        placeholder="Nama penulis (opsional)"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    />
                                </div>
                            </div>

                            <!-- Thumbnail -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Gambar Thumbnail
                                </label>

                                <!-- Current Image -->
                                <div
                                    v-if="article.image_url && !imagePreview"
                                    class="mb-4 relative"
                                >
                                    <img
                                        :src="article.image_url"
                                        alt="Current thumbnail"
                                        class="w-full h-64 object-cover rounded-lg"
                                    />
                                    <div
                                        class="absolute top-2 left-2 px-2 py-1 bg-blue-600 text-white text-xs rounded"
                                    >
                                        Gambar Saat Ini
                                    </div>
                                    <button
                                        @click="removeCurrentImage"
                                        type="button"
                                        class="absolute top-2 right-2 p-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors"
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
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <!-- New Image Preview -->
                                <div v-if="imagePreview" class="mb-4 relative">
                                    <img
                                        :src="imagePreview"
                                        alt="Preview"
                                        class="w-full h-64 object-cover rounded-lg"
                                    />
                                    <div
                                        class="absolute top-2 left-2 px-2 py-1 bg-green-600 text-white text-xs rounded"
                                    >
                                        Gambar Baru
                                    </div>
                                    <button
                                        @click="removeImage"
                                        type="button"
                                        class="absolute top-2 right-2 p-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors"
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
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Upload Area -->
                                <label
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50 transition-colors"
                                >
                                    <div
                                        class="flex flex-col items-center justify-center pt-5 pb-6"
                                    >
                                        <svg
                                            class="w-10 h-10 mb-3 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold"
                                                >Klik untuk upload gambar
                                                baru</span
                                            >
                                            atau drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG atau JPEG (MAX. 2MB)
                                        </p>
                                    </div>
                                    <input
                                        @change="handleImageUpload"
                                        type="file"
                                        class="hidden"
                                        accept="image/*"
                                    />
                                </label>
                                <p
                                    v-if="errors.image_url"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ errors.image_url }}
                                </p>
                            </div>

                            <!-- Content -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Konten Artikel
                                    <span class="text-red-500">*</span>
                                </label>
                                <RichTextEditor v-model="form.content" />
                                <p
                                    v-if="errors.content"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ errors.content }}
                                </p>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Tags
                                </label>
                                <input
                                    v-model="form.tags"
                                    type="text"
                                    placeholder="Pisahkan dengan koma (contoh: tips, panduan, traveling)"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                />
                                <p class="mt-2 text-xs text-gray-500">
                                    Masukkan tags yang relevan, dipisahkan
                                    dengan koma
                                </p>
                                <!-- Tags Preview -->
                                <div
                                    v-if="form.tags"
                                    class="mt-3 flex flex-wrap gap-2"
                                >
                                    <span
                                        v-for="(tag, index) in parseTags(
                                            form.tags,
                                        )"
                                        :key="index"
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700"
                                    >
                                        #{{ tag.trim() }}
                                    </span>
                                </div>
                            </div>

                            <!-- Read Time & Meta -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Read Time -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Waktu Baca (menit)
                                    </label>
                                    <input
                                        v-model="form.read_time"
                                        type="number"
                                        min="1"
                                        placeholder="5"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    />
                                </div>

                                <!-- Published Date -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Tanggal Publikasi
                                    </label>
                                    <input
                                        v-model="form.published_at"
                                        type="date"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    />
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="flex items-center cursor-pointer">
                                    <input
                                        v-model="form.is_published"
                                        type="checkbox"
                                        class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                    />
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700"
                                    >
                                        Publikasikan artikel
                                    </span>
                                </label>
                                <p class="ml-6 text-xs text-gray-500 mt-1">
                                    Jika tidak dicentang, artikel akan disimpan
                                    sebagai draft
                                </p>
                            </div>

                            <!-- Last Updated Info -->
                            <div
                                class="bg-blue-50 border border-blue-200 rounded-lg p-4"
                            >
                                <div class="flex items-start gap-3">
                                    <svg
                                        class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5"
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
                                    <div class="text-sm text-blue-800">
                                        <p class="font-medium">
                                            Informasi Artikel
                                        </p>
                                        <p class="mt-1">
                                            Dibuat:
                                            {{ formatDate(article.created_at) }}
                                        </p>
                                        <p class="mt-0.5">
                                            Terakhir diupdate:
                                            {{ formatDate(article.updated_at) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div
                            class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-xl flex items-center justify-between"
                        >
                            <Link
                                :href="route('admin.articles.index')"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors"
                            >
                                Batal
                            </Link>
                            <button
                                type="submit"
                                :disabled="processing"
                                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2"
                            >
                                <svg
                                    v-if="processing"
                                    class="animate-spin h-5 w-5"
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
                                {{
                                    processing
                                        ? "Menyimpan..."
                                        : "Update Artikel"
                                }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import RichTextEditor from "@/Components/RichTextEditor.vue";

const props = defineProps({
    article: Object,
    selectedTags: Array,
    errors: Object,
});

const processing = ref(false);
const imagePreview = ref(null);
const removeOldImage = ref(false);

const form = reactive({
    title: "",
    type: "",
    author: "",
    content: "",
    tags: "",
    read_time: null,
    published_at: null,
    is_published: false,
    image_url: null,
});

// Initialize form with article data
onMounted(() => {
    form.title = props.article.title || "";
    form.type = props.article.type || "";
    form.author = props.article.author || "";
    form.content = props.article.content || "";
    form.tags = props.selectedTags ? props.selectedTags.join(", ") : "";
    form.read_time = props.article.read_time || null;
    form.published_at = props.article.published_at
        ? props.article.published_at.split(" ")[0]
        : null;
    form.is_published = props.article.is_published || false;
});

// Generate Slug Preview
const generateSlug = (text) => {
    return text
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, "-")
        .replace(/^-+|-+$/g, "");
};

// Parse Tags
const parseTags = (tagsString) => {
    return tagsString.split(",").filter((tag) => tag.trim() !== "");
};

// Format Date
const formatDate = (dateString) => {
    if (!dateString) return "-";
    const options = {
        day: "numeric",
        month: "long",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    };
    return new Date(dateString).toLocaleDateString("id-ID", options);
};

// Handle Image Upload
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        // Preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);

        // Store file
        form.image_url = file;
    }
};

// Remove New Image
const removeImage = () => {
    imagePreview.value = null;
    form.image_url = null;
};

// Remove Current Image
const removeCurrentImage = () => {
    removeOldImage.value = true;
};

// Submit Form
const submit = () => {
    processing.value = true;

    const formData = new FormData();
    formData.append("_method", "PUT");
    formData.append("title", form.title);
    formData.append("type", form.type);
    formData.append("content", form.content);
    formData.append("is_published", form.is_published ? 1 : 0);

    if (form.author) formData.append("author", form.author);
    if (form.tags) formData.append("tags", form.tags);
    if (form.read_time) formData.append("read_time", form.read_time);
    if (form.published_at) formData.append("published_at", form.published_at);
    if (form.image_url) formData.append("image_url", form.image_url);
    if (removeOldImage.value) formData.append("remove_image", "1");

    router.post(route("admin.articles.update", props.article.id), formData, {
        preserveScroll: true,
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>

<style scoped>
/* Custom styling untuk textarea dengan preview HTML */
textarea {
    resize: vertical;
}
</style>
