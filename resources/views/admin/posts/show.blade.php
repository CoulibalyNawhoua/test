@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-body p-lg-17">
            <div class="mb-18">
                <div class="mb-11">
                    <div class="text-center mb-18">
                        <h3 class="fs-2hx text-dark mb-6">{{ $publication->titre }}</h3>
                        <div class="fs-5 text-muted fw-semibold">{{ $publication->libele }} </div>
                    </div>

                </div>
                <div class="fs-5 fw-semibold text-gray-600">
                    <p class="m-0">{!! $publication->description !!} </p>

                </div>
            </div>

        </div>
        <!--end::Body-->
    </div>
@endsection
