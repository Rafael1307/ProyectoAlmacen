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
                            <span class="card-title">Informacion de Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group float-left">
                            <strong>Foto:</strong><br>
                            <img src="{{ asset('storage').'/'.$producto->foto }}" width="250px">
                        </div><br>
                        <div class="float-left">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->Nombre }}
                        </div><br>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->Marca }}
                        </div><br>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->Precio }}
                        </div><br>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->Descripcion }}
                        </div><br>
                        <div class="form-group">
                            <strong>Catid:</strong>
                            {{ $producto->catId }}
                        </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
