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
        return Inertia::render('Admin/Articles/Index', [
            'articles' => Article::with('tags')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Articles/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'type'      => 'required|in:umum,traveling,rental',
            'content'   => 'required',
            'thumbnail' => 'nullable|image',
            'tags'      => 'nullable',
        ]);

        $data = $request->only('title', 'type', 'content');

        // Slug aman
        $slug = Str::slug($request->title);
        $count = Article::where('slug', 'LIKE', "{$slug}%")->count();
        $data['slug'] = $count ? "{$slug}-{$count}" : $slug;

        // Thumbnail
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('articles', 'public');
        }

        $article = Article::create($data);

        // Tags (string / array)
        if ($request->tags) {
            $tags = is_array($request->tags)
                ? $request->tags
                : explode(',', $request->tags);

            $tagIds = collect($tags)->map(function ($tag) {
                return Tag::firstOrCreate(
                    ['slug' => Str::slug(trim($tag))],
                    ['name' => trim($tag)]
                )->id;
            });

            $article->tags()->sync($tagIds);
        }

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        return Inertia::render('Admin/Articles/Edit', [
            'article' => $article->load('tags'),
            'selectedTags' => $article->tags->pluck('name')->toArray(),
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'     => 'required',
            'type'      => 'required|in:umum,traveling,rental',
            'content'   => 'required',
            'thumbnail' => 'nullable|image',
            'tags'      => 'nullable',
        ]);

        $data = $request->only('title', 'type', 'content');

        // Update slug jika judul berubah
        if ($article->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Article::where('slug', 'LIKE', "{$slug}%")
                ->where('id', '!=', $article->id)
                ->count();

            $data['slug'] = $count ? "{$slug}-{$count}" : $slug;
        }

        // Update thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('articles', 'public');
        }

        $article->update($data);

        // Update tags
        if ($request->tags) {
            $tags = is_array($request->tags)
                ? $request->tags
                : explode(',', $request->tags);

            $tagIds = collect($tags)->map(function ($tag) {
                return Tag::firstOrCreate(
                    ['slug' => Str::slug(trim($tag))],
                    ['name' => trim($tag)]
                )->id;
            });

            $article->tags()->sync($tagIds);
        } else {
            $article->tags()->detach();
        }

        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();
        return back();
    }

    // ================= PUBLIC =================

    public function publicIndex()
    {
        return Inertia::render('Articles/Index', [
            'articles' => Article::latest()->paginate(9),
        ]);
    }

    public function show($slug)
    {
        return Inertia::render('Articles/Show', [
            'article' => Article::where('slug', $slug)
                ->with('tags')
                ->firstOrFail(),
        ]);
    }

    public function byTag($tag)
    {
        $tag = Tag::where('slug', $tag)->firstOrFail();

        return Inertia::render('Articles/ByTag', [
            'tag' => $tag,
            'articles' => $tag->articles()->latest()->paginate(9),
        ]);
    }
}
