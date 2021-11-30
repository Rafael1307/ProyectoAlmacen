<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idUser') }}
            {{ Form::text('idUser', $userrole->idUser, ['class' => 'form-control' . ($errors->has('idUser') ? ' is-invalid' : ''), 'placeholder' => 'Iduser']) }}
            {!! $errors->first('idUser', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idRol') }}
            {{ Form::text('idRol', $userrole->idRol, ['class' => 'form-control' . ($errors->has('idRol') ? ' is-invalid' : ''), 'placeholder' => 'Idrol']) }}
            {!! $errors->first('idRol', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>