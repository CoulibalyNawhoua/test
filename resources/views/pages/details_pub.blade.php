@extends('layouts.base')

@section('content')


    <div class="row g-7">

        <div class="col-lg-6 col-xl-3">
            <!--begin::Contacts-->
            <div class="card card-flush" id="kt_contacts_list">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_contacts_list_header">
                    <!--begin::Form-->
                    <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid ps-13" name="search" value=""
                            placeholder="Search contacts">
                        <!--end::Input-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5" id="kt_contacts_list_body">
                    <!--begin::List-->
                    <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                        data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                        data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px"
                        style="">

                        @foreach ($all_publications as $publication)
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-40px symbol-circle">

                                        @if ($publication->photo)
                                            <img src="{{ Storage::url($publication->photo) }}" alt="image">
                                        @else
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/blank.png') }}">
                                        @endif


                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2">
                                        </div>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-4">
                                        <a href="{{ route('details.pub', $publication->id) }}"
                                            class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">{{ $publication->titre }}</a>
                                        <div class="fw-semibold fs-7 text-muted">{{ $publication->libele }}</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed d-none"></div>
                        @endforeach

                    </div>
                    <!--end::List-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>

        <div class="col-xl-9">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                        <span class="svg-icon svg-icon-1 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3"
                                    d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <h2>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Détails de la publication</font>
                            </font>
                        </h2>
                    </div>

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->

                @if ($publication_details)
                    <div class="card-body pt-5">
                        <!--begin::Profile-->
                        <div class="d-flex gap-7 align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-100px">

                                @if ($publication_details->photo)
                                    <img src="{{ Storage::url($publication_details->photo) }}" alt="image">
                                @else
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/blank.png') }}">
                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Contact details-->
                            <div class="d-flex flex-column gap-2">
                                <!--begin::Name-->
                                <h3 class="mb-0">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $publication_details->nom }}</font>
                                    </font>
                                </h3>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <div class="d-flex align-items-center gap-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-muted text-hover-primary">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $publication_details->email }}</font>
                                        </font>
                                    </a>
                                </div>
                                <!--end::Email-->
                                <!--begin::Phone-->
                                <div class="d-flex align-items-center gap-2">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <a href="#" class="text-muted text-hover-primary">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $publication_details->telephone }}
                                            </font>
                                        </font>
                                    </a>
                                </div>
                                <!--end::Phone-->
                            </div>
                            <!--end::Contact details-->
                        </div>
                        <!--end::Profile-->
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8"
                            role="tablist">
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_contact_view_general" aria-selected="true" role="tab">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Général</font>
                                    </font>
                                </a>
                            </li>


                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content" id="">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                                <!--begin::Additional details-->
                                <div class="d-flex flex-column gap-5 mt-7">
                                    <!--begin::Company name-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">titre</font>
                                            </font>
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $publication_details->titre }}
                                                </font>
                                            </font>
                                        </div>
                                    </div>
                                    <!--end::Company name-->
                                    <!--begin::City-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">libellé</font>
                                            </font>
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $publication_details->libele }}
                                                </font>
                                            </font>
                                        </div>
                                    </div>
                                    <!--end::City-->
                                    <!--begin::Country-->


                                    <!--end::Country-->
                                    <!--begin::Notes-->
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-bold text-muted">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">desciption</font>
                                            </font>
                                        </div>
                                        <p>
                                            <font style="vertical-align: inherit;">
                                                {!! $publication_details->description !!}
                                            </font><br>
                                            <br>

                                        </p>
                                    </div>

                                    <div class="rating justify-content-end">
                                        @php $rating = $ratings; @endphp


                                        @foreach(range(1,5) as $i)
                                            <span class="fa-stack" style="width:1em">
                                                <i class="far fa-star fa-stack-1x"></i>

                                                @if($rating >0)
                                                    @if($rating >0.5)
                                                        <i class="fas fa-star fa-stack-1x text-warning"></i>
                                                    @else
                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                    @endif
                                                @endif
                                                @php $rating--; @endphp
                                            </span>
                                        @endforeach
                                    </div>
                                    {{-- <span>{{ $ratings->count() }} rate</span> --}}
                                </div>
                                <!--end::Additional details-->
                            </div>

                        </div>
                        <!--end::Tab content-->
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        Notez cette idée
                    </button>

                    <div class="modal fade" tabindex="-1" id="kt_modal_1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="{{ route('store.rating') }}" method="post">
                                    @csrf
                                    <input type="hidden" name='pub_id' value="{{ $publication_details->id }}">

                                    <div class="modal-header">
                                        <h3 class="modal-title">{{ $publication_details->titre }}</h3>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <div class="py-5">
                                            <div class="rounded border p-10">
                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                        <input type="radio" value="1" name="product_rating"
                                                            checked id="rating1">
                                                        <label for="rating1" class="fa fa-star"></label>
                                                        <input type="radio" value="2" name="product_rating"
                                                            id="rating2">
                                                        <label for="rating2" class="fa fa-star"></label>
                                                        <input type="radio" value="3" name="product_rating"
                                                            id="rating3">
                                                        <label for="rating3" class="fa fa-star"></label>
                                                        <input type="radio" value="4" name="product_rating"
                                                            id="rating4">
                                                        <label for="rating4" class="fa fa-star"></label>
                                                        <input type="radio" value="5" name="product_rating"
                                                            id="rating5">
                                                        <label for="rating5" class="fa fa-star"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                @endif

                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>




        {{-- <script>
            $('#addStar').change('.rating-input', function(e) {
            $(this).submit();
            });
        </script> --}}

    </div>

@endsection

<style>
    /* rating */
    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        padding: 20px 0;
    }

    .rating-css input {
        display: none;
    }

    .rating-css input+label {
        font-size: 60px;
        text-shadow: 1px 1px 0 #8f8420;
        cursor: pointer;
    }

    .rating-css input:checked+label~label {
        color: #b4afaf;
    }

    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }

    /* End of Star Rating */
</style>
