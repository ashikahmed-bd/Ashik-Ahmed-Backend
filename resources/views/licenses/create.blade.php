@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create License</h4>
            </div>
            <div class="card-body">
                <form action="{{route('license.store')}}" method="post" >
                    @csrf
                    <div class="row g-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label for="allowed_domain" class="form-label">Allowed Domain</label>
                                <input type="text" name="allowed_domain" id="allowed_domain" class="form-control" value="savethebangladesh.org" placeholder="Allowed domain">
                            </div>
                            <div class="form-group">
                                <label for="user_id" class="form-label">License Type <span class="text-danger">*</span></label>
                                <select name="type" id="user_id" class="form-select" >
                                    <option value="" disabled>Select User</option>
                                    <option value="trial">Trial</option>
                                    <option value="subscription">Subscription</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="lifetime">Lifetime</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id" class="form-label">User <span class="text-danger">*</span></label>
                                <select name="user_id" id="user_id" class="form-select" >
                                    <option value="" disabled>Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary pl-5 pr-5">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
