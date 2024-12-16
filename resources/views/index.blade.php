@extends('layouts.app')
@section('content')

    <div class="page-title">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-4">
                <div class="page-title-content">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs">
                    <a href="#">Home </a>
                    <i class="ri-arrow-right-s-line"></i>
                    <a href="#">Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>483</h3>
                    <p>Total Invoices</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                <div class="widget-content">
                    <h3>273</h3>
                    <p>Paid Invoices</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                <div class="widget-content">
                    <h3>121</h3>
                    <p>Unpaid Invoices</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center bg-white">
                <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>89</h3>
                    <p>Canceled Invoices</p>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header flex-row">
                    <h4 class="card-title">Invoice </h4>
                    <a class="btn btn-primary" href="create-invoice.html"><span><i class="bi bi-plus"></i></span>Create Invoice</a>
                </div>
                <div class="card-body">
                    <div class="invoice-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </th>
                                    <th>Client</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Due</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="images/avatar/1.jpg" alt="" width="30" class="me-2">Weston P. Thomas</td>
                                    <td>$254</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                    <td>February 16, 2021</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="images/avatar/2.jpg" alt="" width="30" class="me-2">William D. Gibson</td>
                                    <td>$254</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                    <td>December 21, 2021</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="images/avatar/3.jpg" alt="" width="30" class="me-2">John
                                        C. Adams</td>
                                    <td>$254</td>
                                    <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                    <td>March 21, 2021</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="images/avatar/4.jpg" alt="" width="30" class="me-2">John
                                        L. Foster</td>
                                    <td>$254</td>
                                    <td><span class="badge px-3 py-2 bg-warning">Due</span></td>
                                    <td>April 29, 2021</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault" value=""></div>
                                    </td>
                                    <td><img src="images/avatar/5.jpg" alt="" width="30" class="me-2">Terry
                                        P. Camacho</td>
                                    <td>$254</td>
                                    <td><span class="badge px-3 py-2 bg-danger">Cancel</span></td>
                                    <td>November 26, 2021</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
