@extends('layouts.app')

@section('template_title')
    {{ $userrole->name ?? 'Show Userrole' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Userrole</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('userroles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Iduser:</strong>
                            {{ $userrole->idUser }}
                        </div>
                        <div class="form-group">
                            <strong>Idrol:</strong>
                            {{ $userrole->idRol }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
