@extends('base')
@section('content')

    <h1>Crear Empleado</h1>
    <div class="alert alert-info" role="alert">
        Los campos con asteriscos <strong>(*)</strong> son obligatorios.
    </div>
    <div class="col-md-6 m-auto">
        <form action="{{ route('store') }}" method="POST" data-parsley-validate="">
            @csrf
            @include('partials.form')
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#name').focus();
        });
    </script>
@endsection
