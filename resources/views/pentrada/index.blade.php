@extends('layouts.app')

@section('template_title')
    Pentrada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pentrada') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pentradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Informe PDF') }}
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
                                        
										<th>Entrada</th>
										<th>Producto</th>
										<th>Cantidad</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pentradas as $pentrada)
                                    @if ($pentrada->id == $id)
                                        
                                    
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pentrada->idEntrada }}</td>
											<td>{{ $pentrada->producto->Nombre }}</td>
											<td>{{ $pentrada->cantidad }}</td>

                                         
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pentradas->links() !!}
            </div>
        </div>
    </div>
@endsection
