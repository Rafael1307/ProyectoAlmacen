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
                                <a href="{{ route('psalidas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('informe PDF') }}
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
                                        
										<th>Idsalida</th>
										<th>Idproducto</th>
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
