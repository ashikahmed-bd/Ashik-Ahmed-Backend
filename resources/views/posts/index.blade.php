
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header flex-row">
                <h4 class="card-title">Manage Posts </h4>
                <a href="{{route('post.create')}}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    <span>Create Post</span>
                </a>
            </div>
            <div class="card-body">
                <div class="invoice-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Published at</th>
                                <th>Created by</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{asset_url($post->image)}}" alt="{{$post->title}}" width="30">
                                    </td>
                                    <td>{{Limit($post->title, 50)}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{DateFormat($post->published_at)}}</td>
                                    <td>{{$post->author->name}}</td>
                                    <td>
                                        @if($post->active)
                                            <span class="badge px-2 py-1 bg-success">Publish</span>
                                        @else
                                            <span class="badge px-2 py-1 bg-danger">Inactive</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{route('post.edit', $post->id)}}" class="badge edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
