@extends('layouts.admin')

@section('content')
<!--begin::Toolbar-->
<form id="tagihan_buku" method="POST" action="{{ url('/insertTagihans') }}" class="form">
    @csrf
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <ol class="breadcrumb breadcrumb-line text-muted fs-6 fw-bold">
                    <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Home</a></li>
                    <!-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> -->
                    <li class="breadcrumb-item px-3 text-muted">Siswa</li>
                </ol>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    @if ($message = Session::get('success'))
    <!--begin::Alert-->
    <div
        class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-5 mb-10">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0">...</span>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <!--begin::Title-->
            <h5 class="mb-1">This is an alert</h5>
            <!--end::Title-->
            <!--begin::Content-->
            <span>{{$message}}</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Close-->
        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <i class="bi bi-x fs-1 text-primary"></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->
    @endif

    @if ($message = Session::get('reset'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{$message}}
        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <i class="bi bi-x fs-1 text-success"></i>
        </button>
    </div>
    @endif
    <div class="card-body">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Siswa</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Jumlah Siswa 500</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <a href="{{'siswas/create'}}" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                                    <th><span style="width: 20px;"><label
                                                class="checkbox checkbox-single checkbox-all"><input id="selectAll"
                                                    type="checkbox">&nbsp;<span></span></label></span></th>
                                    <th class="min-w-100px">#</th>
                                    <th class="min-w-150px">Nama</th>
                                    <th class="min-w-140px">HP</th>
                                    <th class="min-w-120px">Nama Orangtua</th>
                                    <th class="min-w-120px">Alamat</th>
                                    <th class="min-w-120px">Kelas</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>

                                @foreach($data as $key => $siswa)


                                <tr>
                                    <td><span style="width: 20px;"><label class="checkbox checkbox-single"><input
                                                    id="checkBoxBuku" name="id_siswa[]" type="checkbox"
                                                    value="{{ $siswa->id }}">&nbsp;<span></span></label></span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{$key+1}}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$siswa->nama_lengkap}}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$siswa->hp}}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$siswa->nama_orangtua}}</a>
                                    </td>
                                    <td class="text-dark fw-bold text-hover-primary fs-6">{{$siswa->alamat}}</td>
                                    <td>
                                        <span class="badge badge-light-success">{{$siswa->kelas}}</span>
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
            {{-- Row 2 --}}
            <div id="tagihanBuku">

            </div>
            {{-- endrow 2 --}}
        </div>
    </div>
</form>
@endsection


@section('js')
<link src="{{ asset('assets/js/jquery.dataTables.min.css')}}">
</link>
<link src="{{ asset('assets/js/scroller.dataTables.min.css')}}">
</link>

@endsection