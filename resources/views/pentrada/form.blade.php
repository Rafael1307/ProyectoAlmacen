<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
            {{ Form::hidden('idEntrada', $ide, ['class' => 'form-control' . ($errors->has('idEntrada') ? ' is-invalid' : ''), 'placeholder' => 'Identrada']) }}
            {!! $errors->first('idEntrada', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idProducto') }}
            {{ Form::select('idProducto', $productos, $pentrada->idProducto, ['class' => 'form-control' . ($errors->has('idProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('idProducto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $pentrada->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('entradas.index') }}" onclick="return confirm('¿Terminar el registro de pedidos?')" ><button type="" class="btn btn-primary" style="float: right;">Terminar</button></a>
    </div>
    <div class="box-footer mt20">
        
    </div>
</div>