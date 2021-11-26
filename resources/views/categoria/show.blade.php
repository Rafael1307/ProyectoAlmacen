@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                             
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
                                        
										<th>Foto</th>
										<th>Nombre</th>
										<th>Marca</th>
										<th>Precio</th>
										<th>Descripcion</th>
										<th>Catid</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    @if ($producto->catId == $id)
                                        
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>                                                
                                                <img src="{{ asset('storage').'/'.$producto->foto }}" width="50px">
                                            </td>
											<td>{{ $producto->Nombre }}</td>
											<td>{{ $producto->Marca }}</td>
											<td>{{ $producto->Precio }}</td>
											<td>{{ $producto->Descripcion }}</td>
											<td>{{ $producto->categoria->tipo }}</td>

                                            
                                        </tr>
                                        @endif

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
