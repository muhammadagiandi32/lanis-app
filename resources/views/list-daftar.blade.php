@extends('layouts.admin')

@section('content')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Daftar Siswa</h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{$message}}
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="bi bi-x fs-1 text-success"></i>
                </button>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Sekolah</th>
                                <th>Statu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar as $key => $dt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$dt->nama_lengkap}}</td>
                                <td>{{$dt->jenis_kelamin}}</td>
                                <td>{{$dt->tgl_lahir}}</td>
                                <td>{{$dt->nama_sekolah}}</td>
                                <td>
                                    <span class="badge badge-light-primary">{{$dt->status}}</span>
                                </td>
                                <td>
                                    <a href="{{ route('status',$dt->id) }}" class="badge badge-success btn-sm">Approve</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection