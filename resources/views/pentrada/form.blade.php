<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Entrada') }}
            {{ Form::text('idEntrada', $ide, ['class' => 'form-control' . ($errors->has('idEntrada') ? ' is-invalid' : ''), 'placeholder' => 'Identrada', 'readonly' => 'readonly']) }}
            {!! $errors->first('idEntrada', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('idProducto', $productos, $pentrada->idProducto, ['class' => 'form-control' . ($errors->has('idProducto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
            {!! $errors->first('idProducto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::number('cantidad', $pentrada->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a  href="{{ route('entradas.index') }}" onclick="return confirm('¿Terminar el registro de entradas?')" class="btn btn-primary" style="float: right;">Terminar</a>
    </div>
    <div class="box-footer mt20">
        
    </div>
</div>