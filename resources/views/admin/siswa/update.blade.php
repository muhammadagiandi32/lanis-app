@extends('layouts.admin')

@section('content')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <ol class="breadcrumb breadcrumb-line text-muted fs-6 fw-bold">
                <!-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Library</a></li> -->
                <li class="breadcrumb-item px-3 text-muted">Home</li>
                <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Siswa</a></li>
            </ol>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->

<div class="card-body">
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Update Siswa</span>
            </h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <form action="{{ url('siswas/'.$siswa->id) }}" method="post">
                @method("put")
                @csrf
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Nama</label>
                    <input type="text" name="name" value="{{$siswa->name}}" class="form-control form-control-solid" />
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Email</label>
                    <input type="email" name="email" value="{{$siswa->email}}" class="form-control form-control-solid" />
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Hp</label>
                    <input type="text" name="hp" value="{{$siswa->hp}}" class="form-control form-control-solid" />
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Nama Orang Tua</label>
                    <input type="text" name="ortu" value="{{$siswa->nama_orangtua}}" class="form-control form-control-solid" />
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Alamat</label>
                    <input type="text" name="alamat" value="{{$siswa->alamat}}" class="form-control form-control-solid" placeholder="" />
                </div>
                <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Kelas</label>
                    <input type="text" name="kelas" value="{{$siswa->kelas}}" class="form-control form-control-solid" placeholder="" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <!--begin::Body-->
    </div>
</div>
@endsection