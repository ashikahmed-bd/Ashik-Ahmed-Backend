@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="breadcrumbs">
                        <a href="{{route('home')}}">Home </a>
                        <i class="fi fi-rr-angle-small-right"></i>
                        <a href="{{route('settings.general')}}">General Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="settings-menu active">
                <a href="settings.html">Account</a>
                <a href="settings-general.html">General</a>
                <a href="settings-profile.html">Profile</a>
                <a href="settings-bank.html">Add Bank</a>
                <a href="settings-security.html">Security</a>
                <a href="settings-session.html">Session</a>
                <a href="settings-categories.html" class="active">Categories</a>
                <a href="settings-currencies.html">Currencies</a>
                <a href="settings-api.html">Api</a>
                <a href="support.html">Support</a>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create a new categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="create-new-category">
                                <form class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Name </label>
                                        <input type="text" class="form-control" placeholder="category name">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Type </label>
                                        <select class="form-select">
                                            <option selected="">Choose...</option>
                                            <option>Income</option>
                                            <option>Expenses</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Icon </label>
                                        <select class="form-select">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Color </label>
                                        <select class="form-select">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-success w-100">Create new category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Income Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="category-type">
                                <ul>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-purple-500 fi fi-rr-usd-circle"></i> Salary</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-red-500 fi fi-rr-store-alt"></i> Business</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-orange-500 fi fi-rr-life-ring"></i> Client</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-amber-500 fi fi-rr-gift"></i> Gifts</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-yellow-500 fi fi-bs-user-shield"></i> Insurance
                                                        </span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-lime-500 fi fi-rr-sack-dollar"></i> Loan</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-category">
                                            <span class="drag-icon"><i class="fi fi-ss-grip-lines"></i></span>
                                            <span class="category-icon"><i class="bg-green-500 fi fi-rr-add-document"></i> Other</span>
                                        </div>
                                        <div class="right-category">
                                            <span><i class="fi fi-rs-pencil"></i></span>
                                            <span><i class="fi fi-rr-eye"></i></span>
                                            <span><i class="fi fi-rr-trash"></i></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
