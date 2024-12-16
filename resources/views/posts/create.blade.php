@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Post</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                            <div class="form-group">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="meta_title" class="form-label">Meta Title <span class="text-danger">*</span></label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter meta title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description" class="form-label">Meta Description <span class="text-danger">*</span></label>
                                <textarea name="meta_description" dirname="meta_description" id="meta_description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords" class="form-label">Meta Keywords <span class="text-danger">*</span></label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter keywords...">
                            </div>

                            <div class="form-group">
                                <label for="excerpt" class="form-label">Overview <span class="text-danger">*</span></label>
                                <textarea name="excerpt" dirname="excerpt" id="excerpt" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">Description (Markdown) <span class="text-danger">*</span></label>
                                <textarea name="description" id="markdown"></textarea>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="form-group">
                                <label for="categories" class="form-label">Categories</label>
                                <select name="categories" id="categories" class="form-control">
                                    <option value="">Select Categories</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active" class="form-label">Status</label>
                                <select name="active" id="categories" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Preview</label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="form-group">
                                <img src="{{asset_url('default.png')}}" alt="default" class="w-100">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
