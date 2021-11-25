@extends('layouts.app')

@section('template_title')
    {{ $pentrada->name ?? 'Show Pentrada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pentrada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pentradas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identrada:</strong>
                            {{ $pentrada->idEntrada }}
                        </div>
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $pentrada->idProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $pentrada->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
