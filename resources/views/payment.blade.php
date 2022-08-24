@extends('layouts.admin')

@section('content')
<div class="row gy-5 g-xl-8">

    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Detail Siswa</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                    title="" data-bs-original-title="Click to add a user">
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_invite_friends">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        {{-- <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span> --}}
                        {{--
                        <!--end::Svg Icon-->New Member --}}
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <form id="form_payment_buku" method="POST" action="{{ url('/snaptokenBuku') }}">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                            id="table_payment">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                data-kt-check="true" data-kt-check-target=".widget-9-check">
                                        </div>
                                    </th>
                                    <th class="min-w-200px">NIS & Class </th>
                                    <th class="min-w-150px">Nama Tagihan</th>
                                    <th class="min-w-150px text-end">Total & Month</th>
                                    {{-- <th class="min-w-100px text-end">Actions</th> --}}
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td @if($data->bulan_bayar < now())class="bg-danger" @endif>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input name="check[]" id="check" class="form-check-input widget-9-check"
                                                    type="checkbox" value="{{ $data->id }}">
                                                <input name="total" id="check" class="form-check-input widget-9-check"
                                                    type="hidden" value="{{  $data->total }}">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{
                                                    $data->nama_tagihan }}</a>
                                                <span class="text-muted fw-bold text-muted d-block fs-7">{{
                                                    $data->nama_tagihan
                                                    }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-dark fw-bolder text-hover-primary d-block fs-6">{{
                                            $data->nama_tagihan
                                            }}</p>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">{{ $data->nama_tagihan
                                            }}</span>
                                        <input type="hidden" name="email[]" value="{{ $data->nama_tagihan }}">
                                        <input type="hidden" name="no_phone[]" value="{{ $data->hp }}">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 me-2">
                                            <p class="text-dark fw-bolder text-hover-primary d-block fs-6 text-end">Rp.
                                                {{ number_format($data->total, 0) }}</p>
                                            <span class="text-muted fw-bold text-muted d-block fs-7 text-end">{{
                                                $data->bulan_bayar }}</span>
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        <button type="submit" class="btn btn-primary btn-sm mb-5 text-end" id="pay">Pay Now</button>
                    </form>
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
    </div>
    <!--end::Col-->
</div>

@endsection