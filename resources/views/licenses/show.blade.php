@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">License Info</h4>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="form-group">
                            <label for="license_key" class="form-label">License Key</label>
                            <input type="text" name="license_key" id="license_key" class="form-control" value="{{$license->license_key}}">
                        </div>

                        <div class="form-group">
                            <label for="allowed_domain" class="form-label">Domain</label>
                            <input type="text" name="allowed_domain" id="allowed_domain" class="form-control" value="{{$license->allowed_domain}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="signature" class="form-label">Signature</label>
                            <textarea id="signature" class="form-control" rows="8"> {!! $license->signature !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
