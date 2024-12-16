<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Enums\PostStatus;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::query()
            ->paginate($request->limit);

        return view('posts.index', [
            'title' => 'Manage Posts',
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $categories = Category::query()->where('type', '=', (CategoryType::Post)->value)->get();

        return view('posts.create', [
            'title' => 'Create',
            'categories' => $categories,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->excerpt = $request->excerpt;
        $post->tags = $request->tags;
        $post->description = $request->description;

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('posts', config('app.disk'));
            Image::read($request->file('image'))->resize('1024', '768')->save(Storage::disk(config('app.disk'))->path($imagePath));
            $post->image = $imagePath;
        }

        $post->active = $request->active;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->save();


        return response()->json([
            'success' => true,
            'message' => 'Post created successfully'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::query()->where('type', '=', (CategoryType::Post)->value)->get();
        $post = Post::query()->findOrFail($id);
        return view('posts.update', [
            'title' => 'Update',
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::query()->findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->excerpt = $request->excerpt;
        $post->tags = $request->tags;
        $post->description = $request->description;

        if ($request->hasFile('image')){

            if (Storage::disk($post->disk)->exists($post->image)) {
                Storage::disk($post->disk)->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', config('app.disk'));
            Image::read($request->file('image'))->resize('1024', '768')->save(Storage::disk(config('app.disk'))->path($imagePath));
            $post->image = $imagePath;
        }

        $post->active = $request->active;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->update();

        return redirect()->back()->with(['success' => 'Post Updated Successful.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getPosts(Request $request)
    {
        $posts = Post::query()
            ->with(['author', 'category'])
            ->where('status', '=', (PostStatus::PUBLISHED)->value)
            ->latest()
            ->paginate($request->limit);

        return PostResource::collection($posts);
    }


    public function getPostBySlug(string $slug)
    {
        $post = Post::query()
            ->with(['author', 'category'])
            ->where('status', '=', (PostStatus::PUBLISHED)->value)
            ->where('slug', '=', $slug)
            ->firstOrFail();

        return PostResource::make($post);
    }

    public function getLatest()
    {
        $posts = Post::query()
            ->with(['author'])
            ->where('status', '=', (PostStatus::PUBLISHED)->value)
            ->latest()->take(5)->get();

        return PostResource::collection($posts);
    }

    public function searchByTag($tag)
    {
        $posts = Post::query()->whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->with('tags')->get();

        return response()->json($posts);
    }
}
