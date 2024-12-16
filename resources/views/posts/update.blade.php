@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Post</h4>
            </div>
            <div class="card-body">
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                            <div class="form-group">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <label for="meta_title" class="form-label">Meta Title <span class="text-danger">*</span></label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{$post->meta_title}}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description" class="form-label">Meta Description <span class="text-danger">*</span></label>
                                <textarea name="meta_description" id="meta_description" class="form-control">{!! $post->meta_description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords" class="form-label">Meta Keywords <span class="text-danger">*</span></label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{$post->meta_keywords}}">
                            </div>

                            <div class="form-group">
                                <label for="excerpt" class="form-label">Overview <span class="text-danger">*</span></label>
                                <textarea name="excerpt" id="excerpt" class="form-control">{!! $post->excerpt !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Description (Markdown) <span class="text-danger">*</span></label>
                                <textarea name="description" id="markdown">{!! $post->description !!}</textarea>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="form-group">
                                <label for="category_id" class="form-label">Categories</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" disabled>Select Option</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id === $post->category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active" class="form-label">Status</label>
                                <select name="active" id="active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control" value="{{$post->tags}}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Preview</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <img src="{{asset_url($post->image)}}" alt="default" class="w-100">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
