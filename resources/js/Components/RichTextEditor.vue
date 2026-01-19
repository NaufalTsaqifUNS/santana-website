<template>
    <div class="rich-text-editor">
        <!-- Toolbar -->
        <div
            v-if="editor"
            class="toolbar border border-gray-300 rounded-t-lg bg-gray-50 p-2 flex flex-wrap gap-1"
        >
            <!-- Undo/Redo -->
            <button
                @click.prevent="editor.chain().focus().undo().run()"
                :disabled="!editor.can().undo()"
                class="toolbar-btn"
                title="Undo (Ctrl+Z)"
                type="button"
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
                        d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"
                    />
                </svg>
            </button>
            <button
                @click.prevent="editor.chain().focus().redo().run()"
                :disabled="!editor.can().redo()"
                class="toolbar-btn"
                title="Redo (Ctrl+Y)"
                type="button"
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
                        d="M21 10h-10a8 8 0 00-8 8v2m18-10l-6 6m6-6l-6-6"
                    />
                </svg>
            </button>

            <div class="divider"></div>

            <!-- Text Style -->
            <button
                @click.prevent="editor.chain().focus().toggleBold().run()"
                :class="{ 'is-active': editor.isActive('bold') }"
                class="toolbar-btn font-bold"
                title="Bold (Ctrl+B)"
                type="button"
            >
                B
            </button>
            <button
                @click.prevent="editor.chain().focus().toggleItalic().run()"
                :class="{ 'is-active': editor.isActive('italic') }"
                class="toolbar-btn italic"
                title="Italic (Ctrl+I)"
                type="button"
            >
                I
            </button>
            <button
                @click.prevent="editor.chain().focus().toggleUnderline().run()"
                :class="{ 'is-active': editor.isActive('underline') }"
                class="toolbar-btn underline"
                title="Underline (Ctrl+U)"
                type="button"
            >
                U
            </button>
            <button
                @click.prevent="editor.chain().focus().toggleStrike().run()"
                :class="{ 'is-active': editor.isActive('strike') }"
                class="toolbar-btn line-through"
                title="Strike"
                type="button"
            >
                S
            </button>

            <div class="divider"></div>

            <!-- Font Size -->
            <select
                @change="setFontSize($event.target.value)"
                class="toolbar-select"
                title="Font Size"
            >
                <option value="">Size</option>
                <option value="12px">12</option>
                <option value="16px" selected>16</option>
                <option value="20px">20</option>
                <option value="24px">24</option>
                <option value="32px">32</option>
                <option value="custom">Custom...</option>
            </select>

            <!-- Custom Font Size Input -->
            <input
                v-if="showCustomSizeInput"
                v-model="customSize"
                @keyup.enter="applyCustomSize"
                @blur="applyCustomSize"
                type="number"
                min="8"
                max="72"
                placeholder="px"
                class="toolbar-input"
                title="Custom Font Size (8-72px)"
                autofocus
            />

            <div class="divider"></div>

            <!-- Headings -->
            <button
                @click.prevent="
                    editor.chain().focus().toggleHeading({ level: 1 }).run()
                "
                :class="{
                    'is-active': editor.isActive('heading', { level: 1 }),
                }"
                class="toolbar-btn font-bold"
                title="Heading 1"
                type="button"
            >
                H1
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().toggleHeading({ level: 2 }).run()
                "
                :class="{
                    'is-active': editor.isActive('heading', { level: 2 }),
                }"
                class="toolbar-btn font-bold"
                title="Heading 2"
                type="button"
            >
                H2
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().toggleHeading({ level: 3 }).run()
                "
                :class="{
                    'is-active': editor.isActive('heading', { level: 3 }),
                }"
                class="toolbar-btn font-bold"
                title="Heading 3"
                type="button"
            >
                H3
            </button>
            <button
                @click.prevent="editor.chain().focus().setParagraph().run()"
                :class="{ 'is-active': editor.isActive('paragraph') }"
                class="toolbar-btn"
                title="Paragraph"
                type="button"
            >
                P
            </button>

            <div class="divider"></div>

            <!-- Lists -->
            <button
                @click.prevent="editor.chain().focus().toggleBulletList().run()"
                :class="{ 'is-active': editor.isActive('bulletList') }"
                class="toolbar-btn"
                title="Bullet List"
                type="button"
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
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().toggleOrderedList().run()
                "
                :class="{ 'is-active': editor.isActive('orderedList') }"
                class="toolbar-btn"
                title="Numbered List"
                type="button"
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
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
                    />
                </svg>
            </button>

            <div class="divider"></div>

            <!-- Text Align -->
            <button
                @click.prevent="
                    editor.chain().focus().setTextAlign('left').run()
                "
                :class="{ 'is-active': editor.isActive({ textAlign: 'left' }) }"
                class="toolbar-btn"
                title="Align Left"
                type="button"
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
                        d="M4 6h16M4 12h10M4 18h16"
                    />
                </svg>
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().setTextAlign('center').run()
                "
                :class="{
                    'is-active': editor.isActive({ textAlign: 'center' }),
                }"
                class="toolbar-btn"
                title="Align Center"
                type="button"
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
                        d="M4 6h16M8 12h8M4 18h16"
                    />
                </svg>
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().setTextAlign('right').run()
                "
                :class="{
                    'is-active': editor.isActive({ textAlign: 'right' }),
                }"
                class="toolbar-btn"
                title="Align Right"
                type="button"
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
                        d="M4 6h16M14 12h6M4 18h16"
                    />
                </svg>
            </button>
            <button
                @click.prevent="
                    editor.chain().focus().setTextAlign('justify').run()
                "
                :class="{
                    'is-active': editor.isActive({ textAlign: 'justify' }),
                }"
                class="toolbar-btn"
                title="Justify"
                type="button"
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
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>

            <div class="divider"></div>

            <!-- Link -->
            <button
                @click.prevent="addLink"
                :class="{ 'is-active': editor.isActive('link') }"
                class="toolbar-btn"
                title="Add Link"
                type="button"
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
                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                    />
                </svg>
            </button>
            <button
                v-if="editor.isActive('link')"
                @click.prevent="editor.chain().focus().unsetLink().run()"
                class="toolbar-btn"
                title="Remove Link"
                type="button"
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
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </button>

            <div class="divider"></div>

            <!-- Quote & Code -->
            <button
                @click.prevent="editor.chain().focus().toggleBlockquote().run()"
                :class="{ 'is-active': editor.isActive('blockquote') }"
                class="toolbar-btn"
                title="Quote"
                type="button"
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
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                    />
                </svg>
            </button>
            <button
                @click.prevent="editor.chain().focus().toggleCodeBlock().run()"
                :class="{ 'is-active': editor.isActive('codeBlock') }"
                class="toolbar-btn"
                title="Code Block"
                type="button"
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
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"
                    />
                </svg>
            </button>

            <div class="divider"></div>

            <!-- Horizontal Rule -->
            <button
                @click.prevent="
                    editor.chain().focus().setHorizontalRule().run()
                "
                class="toolbar-btn"
                title="Horizontal Line"
                type="button"
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
                        d="M20 12H4"
                    />
                </svg>
            </button>

            <!-- Clear Formatting -->
            <button
                @click.prevent="
                    editor.chain().focus().clearNodes().unsetAllMarks().run()
                "
                class="toolbar-btn"
                title="Clear Formatting"
                type="button"
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

        <!-- Editor Content -->
        <editor-content
            :editor="editor"
            class="editor-content border border-gray-300 border-t-0 rounded-b-lg p-4 min-h-[400px] bg-white prose prose-sm max-w-none focus:outline-none"
        />

        <!-- Character Count -->
        <div class="mt-2 text-xs text-gray-500 flex justify-between">
            <span>
                {{ editor ? editor.storage.characterCount.characters() : 0 }}
                karakter
            </span>
            <span>
                {{ editor ? editor.storage.characterCount.words() : 0 }} kata
            </span>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, onBeforeUnmount } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Link from "@tiptap/extension-link";
import Underline from "@tiptap/extension-underline";
import TextAlign from "@tiptap/extension-text-align";
import CharacterCount from "@tiptap/extension-character-count";
import { Extension } from "@tiptap/core";
import { TextStyle } from "@tiptap/extension-text-style";

// Custom FontSize extension
const FontSize = Extension.create({
    name: "fontSize",
    addOptions() {
        return {
            types: ["textStyle"],
        };
    },
    addGlobalAttributes() {
        return [
            {
                types: this.options.types,
                attributes: {
                    fontSize: {
                        default: null,
                        parseHTML: (element) =>
                            element.style.fontSize?.replace(/['"]+/g, ""),
                        renderHTML: (attributes) => {
                            if (!attributes.fontSize) {
                                return {};
                            }
                            return {
                                style: `font-size: ${attributes.fontSize}`,
                            };
                        },
                    },
                },
            },
        ];
    },
    addCommands() {
        return {
            setFontSize:
                (fontSize) =>
                ({ chain }) => {
                    return chain().setMark("textStyle", { fontSize }).run();
                },
            unsetFontSize:
                () =>
                ({ chain }) => {
                    return chain()
                        .setMark("textStyle", { fontSize: null })
                        .removeEmptyTextStyle()
                        .run();
                },
        };
    },
});

const props = defineProps({
    modelValue: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["update:modelValue"]);

const showCustomSizeInput = ref(false);
const customSize = ref("");

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,
        Link.configure({
            openOnClick: false,
            HTMLAttributes: {
                class: "text-red-600 underline",
            },
        }),
        Underline,
        TextStyle,
        FontSize,
        TextAlign.configure({
            types: ["heading", "paragraph"],
        }),
        CharacterCount,
    ],
    editorProps: {
        attributes: {
            class: "prose prose-sm max-w-none focus:outline-none min-h-[400px]",
        },
    },
    onUpdate: () => {
        if (editor.value) {
            emit("update:modelValue", editor.value.getHTML());
        }
    },
});

// Watch for external changes
watch(
    () => props.modelValue,
    (value) => {
        if (editor.value && editor.value.getHTML() !== value) {
            editor.value.commands.setContent(value, false);
        }
    },
);

// Add Link function
const addLink = () => {
    if (!editor.value) return;

    const previousUrl = editor.value.getAttributes("link").href;
    const url = window.prompt("Masukkan URL:", previousUrl);

    if (url === null) {
        return;
    }

    if (url === "") {
        editor.value.chain().focus().extendMarkRange("link").unsetLink().run();
        return;
    }

    editor.value
        .chain()
        .focus()
        .extendMarkRange("link")
        .setLink({ href: url })
        .run();
};

// Set Font Size function
const setFontSize = (size) => {
    if (!editor.value) return;

    if (size === "custom") {
        showCustomSizeInput.value = true;
        customSize.value = "";
        return;
    }

    showCustomSizeInput.value = false;

    if (size) {
        editor.value.chain().focus().setFontSize(size).run();
    } else {
        editor.value.chain().focus().unsetFontSize().run();
    }
};

// Apply Custom Font Size
const applyCustomSize = () => {
    if (!editor.value || !customSize.value) {
        showCustomSizeInput.value = false;
        return;
    }

    const size = parseInt(customSize.value);
    if (size >= 8 && size <= 72) {
        editor.value.chain().focus().setFontSize(`${size}px`).run();
    }

    showCustomSizeInput.value = false;
    customSize.value = "";
};

onBeforeUnmount(() => {
    if (editor.value) {
        editor.value.destroy();
    }
});
</script>

<style scoped>
.toolbar-btn {
    @apply px-3 py-2 rounded hover:bg-gray-200 transition-colors disabled:opacity-30 disabled:cursor-not-allowed text-gray-700;
}

.toolbar-btn.is-active {
    @apply bg-red-100 text-red-600 hover:bg-red-200;
}

.toolbar-select {
    @apply px-2 py-1.5 rounded border border-gray-300 text-sm text-gray-700 hover:bg-gray-100 transition-colors focus:ring-2 focus:ring-red-500 focus:border-transparent;
}

.toolbar-input {
    @apply w-16 px-2 py-1.5 rounded border border-gray-300 text-sm text-gray-700 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors;
}

.divider {
    @apply w-px bg-gray-300 mx-1;
}

/* Editor Content Styles */
:deep(.ProseMirror) {
    outline: none;
    min-height: 400px;
}

:deep(.ProseMirror p) {
    margin: 0.5em 0;
}

:deep(.ProseMirror h1) {
    font-size: 2em;
    font-weight: bold;
    margin: 0.67em 0;
}

:deep(.ProseMirror h2) {
    font-size: 1.5em;
    font-weight: bold;
    margin: 0.75em 0;
}

:deep(.ProseMirror h3) {
    font-size: 1.17em;
    font-weight: bold;
    margin: 0.83em 0;
}

:deep(.ProseMirror ul),
:deep(.ProseMirror ol) {
    padding-left: 1.5em;
    margin: 1em 0;
}

:deep(.ProseMirror ul) {
    list-style-type: disc;
}

:deep(.ProseMirror ol) {
    list-style-type: decimal;
}

:deep(.ProseMirror li) {
    margin: 0.25em 0;
}

:deep(.ProseMirror blockquote) {
    border-left: 4px solid #ef4444;
    padding-left: 1em;
    margin: 1em 0;
    color: #6b7280;
    font-style: italic;
}

:deep(.ProseMirror code) {
    background-color: #f3f4f6;
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
    font-size: 0.875em;
    font-family: "Courier New", Courier, monospace;
}

:deep(.ProseMirror pre) {
    background-color: #1f2937;
    color: #f9fafb;
    padding: 1em;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1em 0;
}

:deep(.ProseMirror pre code) {
    background-color: transparent;
    padding: 0;
    color: inherit;
}

:deep(.ProseMirror hr) {
    border: none;
    border-top: 2px solid #e5e7eb;
    margin: 2em 0;
}

:deep(.ProseMirror a) {
    color: #ef4444;
    text-decoration: underline;
    cursor: pointer;
}

:deep(.ProseMirror a:hover) {
    color: #dc2626;
}

:deep(.ProseMirror strong) {
    font-weight: bold;
}

:deep(.ProseMirror em) {
    font-style: italic;
}

:deep(.ProseMirror u) {
    text-decoration: underline;
}

:deep(.ProseMirror s) {
    text-decoration: line-through;
}

/* Placeholder */
:deep(.ProseMirror p.is-editor-empty:first-child::before) {
    content: attr(data-placeholder);
    float: left;
    color: #9ca3af;
    pointer-events: none;
    height: 0;
}
</style>
