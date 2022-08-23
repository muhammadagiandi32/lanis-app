@extends('layouts.admin')

@section('content')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <ol class="breadcrumb breadcrumb-line text-muted fs-6 fw-bold">
                <li class="breadcrumb-item pe-3">Home</li>
                <!-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> -->
                <li class="breadcrumb-item px-3 text-muted"><a href="#" class="pe-3">Admin(staff)</a></li>
            </ol>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$message}}
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="bi bi-x fs-1 text-success"></i>
    </button>
</div>
@endif
@if ($message = Session::get('delete'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$message}}
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="bi bi-x fs-1 text-warning"></i>
    </button>
</div>
@endif
<div class="card-body">
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Admin</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Jumlah Admin(Staff) 500</span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <a href="{{'admins/create'}}" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="fas fa-plus"></i>
                    </span>
                    <!--end::Svg Icon-->
                </a>

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->

        <div class="row">
            <div class="card-body py-3">

                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="example" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-50px">#</th>
                                <th class="min-w-100px">Nama</th>
                                <th class="min-w-140px">HP</th>
                                <th class="min-w-100px">Alamat</th>
                                <th class="min-w-100px">Created At</th>
                                <th class="min-w-150px">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>

                            @foreach($admins as $key => $admin)


                            <tr>

                                <td class="text-dark fw-bold text-hover-primary fs-6">{{$key+1}}</td>
                                <td class="text-dark fw-bold text-hover-primary fs-6">{{$admin->name}}</td>
                                <td class="text-dark fw-bold text-hover-primary fs-6">{{$admin->hp}}</td>
                                <td class="text-dark fw-bold text-hover-primary fs-6">{{$admin->alamat}}</td>
                                <td class="text-dark fw-bold text-hover-primary fs-6">{{$admin->created_at}}</td>
                                <td>
                                    <div class="justify-content-center">
                                        <!-- <a href="{{ url('admins.edit',$admin->id) }}" class="badge badge-warning">Edit -->
                                        </a>
                                        &nbsp;
                                        <form action="{{ url('admins', $admin->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm" value="delete" onclick="return confirm('Are you sure?')">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>
        <!--end begin::Body-->
    </div>
</div>
@endsection