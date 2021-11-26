<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idSalida') }}
            {{ Form::hidden('idSalida', $ide, ['class' => 'form-control' . ($errors->has('idSalida') ? ' is-invalid' : ''), 'placeholder' => 'Idsalida']) }}
            {!! $errors->first('idSalida', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idProducto') }}
            {{ Form::select('idProducto', $productos, $psalida->idProducto, ['class' => 'form-control' . ($errors->has('idProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('idProducto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $psalida->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a  href="{{ route('salidas.index') }}" onclick="return confirm('¿Terminar el registro de salidas?')"class="btn btn-primary" style="float: right;">Terminar</a>

    </div>
</div>