<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
            {{ Form::number('idEntrada', $ide, ['class' => 'form-control' . ($errors->has('idEntrada') ? ' is-invalid' : ''), 'placeholder' => 'Identrada']) }}
            {!! $errors->first('idEntrada', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('idProducto', $productos, $pentrada->idProducto, ['class' => 'form-control' . ($errors->has('idProducto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
            {!! $errors->first('idProducto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('cantidad', $pentrada->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a  href="{{ route('salidas.index') }}" onclick="return confirm('¿Terminar el registro de pedidos?')" ><button class="btn btn-primary" style="float: right;">Terminar</button></a>
    </div>
    <div class="box-footer mt20">
        
    </div>
</div>