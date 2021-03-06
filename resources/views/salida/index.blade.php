@extends('layouts.app')

@section('template_title')
    Salida
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Salida') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('salidas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($salidas as $salida)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $salida->fecha }}</td>
											<td>{{ $salida->hora }}</td>

                                            <td>
                                                <form action="{{ route('salidas.destroy',$salida->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('salidas.show',$salida->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    
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
                {!! $salidas->links() !!}
            </div>
        </div>
    </div>
@endsection
