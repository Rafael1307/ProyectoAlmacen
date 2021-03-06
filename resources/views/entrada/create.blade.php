@extends('layouts.app')

@section('template_title')
    Create Entrada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear entrada de producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entradas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('entrada.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
