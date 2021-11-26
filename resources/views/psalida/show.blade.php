<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">

    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        
            
                
                 
                    
                   
                        
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
                                        <th colspan="3"><center> INFORME SALIDAS DE PRODUCTO</center></th>
                                    </tr>
                                    <tr>
                                        
                                        
                                        <th>Salida</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
    
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($psalidas as $psalida)
                                    @if ($psalida->idSalida == $id)
                                        
                                    
                                        <tr>
                                            
                                            
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
</body>
</html>
