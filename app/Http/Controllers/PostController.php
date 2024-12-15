<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
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

        return PostResource::collection($posts);
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
        $post->description = $request->description;

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('posts', config('app.disk'));
            Image::read($request->file('image'))->resize('1024', '768')->save(Storage::disk(config('app.disk'))->path($imagePath));
            $post->image = $imagePath;
        }

        $post->status = $request->status;
        $post->user_id = Auth::id();
        $post->save();

        // Apply tags
        $post->retag($request->tags);

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
