@extends('layouts.base')
@section('title')
enregistrer une publication
@endsection
@section('content')
<form id="kt_ecommerce_add_product_form"  data-kt-redirect="{{ route('pub.store') }}" action="{{ route('pub.store') }}" method="post">
    @csrf
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Title</h3>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="d-flex flex-wrap gap-5">
                <div class="fv-row w-100 flex-md-root">
                    <label class="required form-label">Titre</label>
                    <input type="text" class="form-control mb-2" value=""
                        name="titre" required>
                </div>
                <div class="fv-row w-100 flex-md-root">
                    <label class="required form-label">Libelé</label>
                    <input type="text" class="form-control mb-2" value=""
                        name="libele">
                </div>

            </div>
            <div class="fv-row w-100 flex-md-root">
                <label class="required form-label">Description</label>
                <textarea name="description"  id="summernote" cols="30" class="form-control mb-2" rows="10"></textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
                SOUMETTRE
            </button>

        </div>
    </div>
</form>



@endsection

@section('scripts')

@endsection

