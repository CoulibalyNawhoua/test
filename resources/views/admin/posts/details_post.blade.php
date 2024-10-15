@extends('layouts.base')

@section('content')
    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body pt-15">
                    <!--begin::Summary-->
                    <div class="d-flex flex-center flex-column mb-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if ($publication->photo)
                                <img src="{{ Storage::url($publication->photo) }}" alt="image">
                            @else
                                <img alt="Pic" src="{{ asset('assets/media/avatars/blank.png') }}">
                            @endif
                        </div>
                        <!--end::Avatar-->

                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $publication->nom }}
                        </a>

                        <!--end::Name-->

                        <!--begin::Position-->
                        <div class="fs-5 fw-semibold text-muted mb-6">{{ $publication->prenom }} </div>

                        <!--end::Position-->

                        <!--begin::Info-->
                        <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-75px">6,900</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <div class="fw-semibold text-muted">Earnings</div>
                            </div>
                            <!--end::Stats-->

                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">130</span>
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <div class="fw-semibold text-muted">Tasks</div>
                            </div>
                            <!--end::Stats-->

                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">500</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <div class="fw-semibold text-muted">Hours</div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Summary-->


                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::Sidebar-->

        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">


            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">


                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold mb-0">Détails publication</h2>
                            </div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div id="kt_customer_view_payment_method" class="card-body pt-0">

                            {{-- foreach --}}

                            <!--begin::Option-->
                            <div class="py-0" data-kt-customer-payment-method="row">
                                <!--begin::Header-->
                                <div class="py-3 d-flex flex-stack flex-wrap">
                                    <!--begin::Toggle-->
                                    <div class="d-flex align-items-center collapsible  rotate" data-bs-toggle="collapse"
                                        href="#kt_customer_view_payment_method_1" role="button" aria-expanded="false"
                                        aria-controls="kt_customer_view_payment_method_1">
                                        <!--begin::Arrow-->
                                        <div class="me-3 rotate-90">
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <!--end::Arrow-->

                                        <!--begin::Logo-->
                                        <img src="/metronic8/demo1/assets/media/svg/card-logos/mastercard.svg"
                                            class="w-40px me-3" alt="">
                                        <!--end::Logo-->

                                        <!--begin::Summary-->
                                        <div class="me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="text-gray-800 fw-bold"> {{ $publication->titre }} </div>


                                                <div class="badge badge-light-success ms-5">Publier</div>
                                            </div>
                                            <div class="text-muted">{{ $publication->updated_at }} </div>
                                        </div>
                                        <!--end::Summary-->
                                    </div>
                                    <!--end::Toggle-->


                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
                                    data-bs-parent="#kt_customer_view_payment_method">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap py-5">
                                        <!--begin::Col-->
                                        <div class="flex-equal me-5"> {!! $publication->description !!} </div>



                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Body-->
                                <div class="rating justify-content-end">




                                </div>

                            </div>
                            <!--end::Option-->



                        </div>
                        <!--end::Card body-->
                    </div>


                </div>
                <!--end:::Tab pane-->


            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
@endsection
