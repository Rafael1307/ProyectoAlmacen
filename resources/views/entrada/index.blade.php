@extends('layouts.app')

@section('template_title')
    Entrada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entrada') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('entradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradas as $entrada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $entrada->fecha }}</td>
											<td>{{ $entrada->hora }}</td>

                                            <td>
                                                <form action="{{ route('entradas.destroy',$entrada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('entradas.show',$entrada->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entradas->links() !!}
            </div>
        </div>
    </div>
@endsection
