
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header flex-row">
                <h4 class="card-title">Manage License</h4>
                <a href="{{route('license.create')}}" class="btn btn-primary">
                    Create License
                </a>
            </div>
            <div class="card-body">
                <div class="invoice-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Domain</th>
                                <th>License Key</th>
                                <th>Type</th>
                                <th>Issue Date</th>
                                <th>Expire Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenses as $license)
                                <tr>
                                    <td>{{$license->allowed_domain}}</td>
                                    <td>{{$license->license_key}}</td>
                                    <td>{{$license->type}}</td>
                                    <td>{{$license->issued_at}}</td>
                                    <td>{{$license->expires_at}}</td>
                                    <td>
                                        @if($license->revoked)
                                            <span class="badge bg-danger">Inactive</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('license.show', $license->id) }}">View</a>
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
