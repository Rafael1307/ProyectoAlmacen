@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $producto->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->Marca }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->Precio }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Catid:</strong>
                            {{ $producto->catId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
