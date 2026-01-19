<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ArticleController extends Controller
{
    // ================= ADMIN =================

    public function index()
    {
        return Inertia::render("Admin/Articles/Index", [
            "articles" => Article::with("tags")->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return Inertia::render("Admin/Articles/Create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "type" => "required|in:umum,traveling,rental",
            "content" => "required",
            "image_url" => "nullable|image",
            "tags" => "nullable",
            "author" => "nullable|string|max:255",
            "read_time" => "nullable|integer",
            "published_at" => "nullable|date",
            "is_published" => "nullable|boolean",
        ]);

        $data = $request->only(
            "title",
            "type",
            "content",
            "author",
            "read_time",
            "published_at",
        );

        // Set is_published
        $data["is_published"] = $request->is_published ? true : false;

        // Slug aman
        $slug = Str::slug($request->title);
        $count = Article::where("slug", "LIKE", "{$slug}%")->count();
        $data["slug"] = $count ? "{$slug}-{$count}" : $slug;

        // Handle image upload (from form field "image_url")
        if ($request->hasFile("image_url")) {
            $data["thumbnail"] = $request
                ->file("image_url")
                ->store("articles", "public");
        }

        $article = Article::create($data);

        // Tags (string / array)
        if ($request->tags) {
            $tags = is_array($request->tags)
                ? $request->tags
                : explode(",", $request->tags);

            $tagIds = collect($tags)->map(function ($tag) {
                return Tag::firstOrCreate(
                    ["slug" => Str::slug(trim($tag))],
                    ["name" => trim($tag)],
                )->id;
            });

            $article->tags()->sync($tagIds);
        }

        return redirect()->route("admin.articles.index");
    }

    public function edit(Article $article)
    {
        return Inertia::render("Admin/Articles/Edit", [
            "article" => $article->load("tags"),
            "selectedTags" => $article->tags->pluck("name")->toArray(),
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            "title" => "required",
            "type" => "required|in:umum,traveling,rental",
            "content" => "required",
            "image_url" => "nullable|image",
            "tags" => "nullable",
            "author" => "nullable|string|max:255",
            "read_time" => "nullable|integer",
            "published_at" => "nullable|date",
            "is_published" => "nullable|boolean",
            "remove_image" => "nullable|boolean",
        ]);

        $data = $request->only(
            "title",
            "type",
            "content",
            "author",
            "read_time",
            "published_at",
        );

        // Set is_published
        $data["is_published"] = $request->is_published ? true : false;

        // Update slug jika judul berubah
        if ($article->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Article::where("slug", "LIKE", "{$slug}%")
                ->where("id", "!=", $article->id)
                ->count();

            $data["slug"] = $count ? "{$slug}-{$count}" : $slug;
        }

        // Handle remove old image
        if ($request->remove_image && $article->thumbnail) {
            Storage::disk("public")->delete($article->thumbnail);
            $data["thumbnail"] = null;
        }

        // Update image (from form field "image_url")
        if ($request->hasFile("image_url")) {
            if ($article->thumbnail) {
                Storage::disk("public")->delete($article->thumbnail);
            }

            $data["thumbnail"] = $request
                ->file("image_url")
                ->store("articles", "public");
        }

        $article->update($data);

        // Update tags
        if ($request->tags) {
            $tags = is_array($request->tags)
                ? $request->tags
                : explode(",", $request->tags);

            $tagIds = collect($tags)->map(function ($tag) {
                return Tag::firstOrCreate(
                    ["slug" => Str::slug(trim($tag))],
                    ["name" => trim($tag)],
                )->id;
            });

            $article->tags()->sync($tagIds);
        } else {
            $article->tags()->detach();
        }

        return redirect()->route("admin.articles.index");
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk("public")->delete($article->thumbnail);
        }

        $article->delete();
        return back();
    }

    // ================= PUBLIC =================

    public function publicIndex()
    {
        return Inertia::render("Articles/Index", [
            "articles" => Article::latest()->paginate(9),
        ]);
    }

    public function show($slug)
    {
        $article = Article::where("slug", $slug)->with("tags")->firstOrFail();

        // Get related articles (same type, exclude current article)
        $relatedArticles = Article::where("type", $article->type)
            ->where("id", "!=", $article->id)
            ->where("is_published", true)
            ->latest("published_at")
            ->take(3)
            ->get();

        return Inertia::render("Articles/Show", [
            "article" => $article,
            "relatedArticles" => $relatedArticles,
        ]);
    }

    public function byTag($tag)
    {
        $tag = Tag::where("slug", $tag)->firstOrFail();

        return Inertia::render("Articles/ByTag", [
            "tag" => $tag,
            "articles" => $tag->articles()->latest()->paginate(9),
        ]);
    }
}
