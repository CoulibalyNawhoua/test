@extends('layouts.base')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers">
                </div>
            </div>


            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                    <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                    rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                                <path
                                    d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3"
                                    d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        Export
                    </button>

                    <div id="kt_datatable_example_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true">

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('export.excell') }}" class="menu-link px-3" data-kt-export="excel">Excel</a>
                        </div>
                        <!--begin::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('generate.pdf') }}" class="menu-link px-3" data-kt-export="pdf">PDF</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="csv">CSV</a>
                        </div>
                        <!--end::Menu item-->
                    </div>


                </div>

            </div>


        </div>
        <div class="card-body pt-0">
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1"
                                    aria-label="Customer Name: activate to sort column ascending" style="width: 175.094px;">
                                    Nom</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 216.625px;">Prénom(s)</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 216.625px;">Téléphone</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 216.625px;">Titre</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 216.625px;">Libellé</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1"
                                    aria-label="Created Date: activate to sort column ascending"
                                    style="width: 229.203px;">date création</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending"
                                    style="width: 175.094px;">Status</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending"
                                    style="width: 175.094px;">date publication</th>

                                <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 135.5px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">

                            @foreach ($publications as $publication)
                                <tr class="odd">

                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->nom }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->prenom }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->telephone }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->titre }}</a>
                                    </td>

                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->libele }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->created_at }}</a>
                                    </td>

                                    <td>
                                        @if ($publication->status == 0)
                                            <div class="badge badge-light-danger">En rédaction</div>
                                        @else
                                            <div class="badge badge-light-success">Publier</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pub.details', $publication->id) }}"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $publication->updated_at }}</a>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true" style="">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('pub.details', $publication->id) }}"
                                                    class="menu-link px-3">Détails</a>

                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length" id="kt_customers_table_length">
                            <label>
                                <select name="kt_customers_table_length" aria-controls="kt_customers_table"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">
                                    <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="0"
                                        class="page-link"><i class="previous"></i></a>
                                </li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="kt_customers_table" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_customers_table" data-dt-idx="2" tabindex="0"
                                        class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_customers_table" data-dt-idx="3" tabindex="0"
                                        class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_customers_table" data-dt-idx="4" tabindex="0"
                                        class="page-link">4</a></li>
                                <li class="paginate_button page-item next" id="kt_customers_table_next"><a href="#"
                                        aria-controls="kt_customers_table" data-dt-idx="5" tabindex="0"
                                        class="page-link"><i class="next"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
