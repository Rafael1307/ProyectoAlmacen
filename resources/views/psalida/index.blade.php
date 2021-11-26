@extends('layouts.app')

@section('template_title')
    Psalida
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Psalida') }}
                            </span>

                             <div class="float-right">
                                <a class="btn btn-sm btn-primary float-right" href="{{ route('psalidas.show',$id) }}"><i class="fa fa-fw fa-eye"></i> Informe PDF</a>
                                
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
                                        
										<th>Salida</th>
										<th>Producto</th>
										<th>Cantidad</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($psalidas as $psalida)
                                    @if ($psalida->idSalida == $id)
                                        
                                    
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $psalida->idSalida }}</td>
											<td>{{ $psalida->producto->Nombre }}</td>
											<td>{{ $psalida->cantidad }}</td>

                                            
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $psalidas->links() !!}
            </div>
        </div>
    </div>
@endsection
