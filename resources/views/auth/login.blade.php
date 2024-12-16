@extends('auth.layouts')
@section('content')
    <div class="auth-form card">
        <div class="card-body">
            <form action="{{route('authenticate')}}" method="post">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="info@ashikahmed.net" placeholder="hello@example.com">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="12345678" placeholder="Password" >
                </div>
                <div class="col-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Remember me</label>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <a href="reset.html">Forgot Password?</a>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
            <p class="mt-3 mb-0">Don't have an account? <a class="text-primary" href="signup.html">Sign up</a></p>
        </div>
    </div>

@endsection
