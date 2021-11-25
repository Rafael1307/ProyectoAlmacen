@extends('layouts.app')

@section('template_title')
    {{ $psalida->name ?? 'Show Psalida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Psalida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('psalidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idsalida:</strong>
                            {{ $psalida->idSalida }}
                        </div>
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $psalida->idProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $psalida->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
