<div class="form-group row {{ $errors->has('firstname') ? ' has-error' : '' }}">
    {{ Form::label('firstname', 'Nombre *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname', 'maxlength' => 250, 'placeholder' => 'Nombre']) }}


        @if ($errors->has('firstname'))
        <span class="text-danger">
            <strong>{{ $errors->first('firstname') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
    {{ Form::label('lastname', '1º Apellido *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname', 'maxlength' => 250, 'placeholder' => '1º Apellido']) }}


        @if ($errors->has('lastname'))
        <span class="text-danger">
            <strong>{{ $errors->first('lastname') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
    {{ Form::label('mother_lastname', '2º Apellido *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::text('mother_lastname', null, ['class' => 'form-control', 'id' => 'mother_lastname', 'maxlength' => 250, 'placeholder' => '2º Apellido']) }}


        @if ($errors->has('mother_lastname'))
        <span class="text-danger">
            <strong>{{ $errors->first('mother_lastname') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
    {{ Form::label('email', 'Email *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'maxlength' => 250, 'placeholder' => 'Email']) }}


        @if ($errors->has('email'))
        <span class="text-danger">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('password', 'Contraseña *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        <input name="password" type="password" value="" id="password" class="form-control">

        @if ($errors->has('password'))
        <span class="text-danger">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {{ Form::label('password_confirmation', 'Confirmar Contraseña', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'maxlength' => 250]) }}

        @if ($errors->has('password_confirmation'))
        <span class="text-danger">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('permission_id') ? ' has-error' : '' }}">
    {{ Form::label('role_id', 'Roles *', ['class' => 'control-label col-md-2 col-sm-2 col-xs-10']) }}

    <div class="col-md-6 col-sm-6 col-xs-8">
        {{ Form::select('role_id[]', $roles, $role_id, [
            'class'             => 'select2 form-control',
            'id'                => 'role_id',
            'multiple'          => 'true',
            'style'             => 'width: 100%',
        ]) }}
        @if ($errors->has('role_id'))
            <span class="text-danger">
                <strong>{{ $errors->first('role_id') }}</strong>
            </span>
        @endif
    </div>
</div>

{{ Form::hidden('page', $page) }}



@section('js-scripts')
    <script>

      function refreshSelects(){
        $("#role_id").css({width:'100%'}).select2({
            allowClear: true,
            placeholder: {
                id: '',
                text: 'Seleccione una opción...'
            },
            minimumResultsForSearch: 6      // minima cantidad de opciones para habilitar el buscador
        });
      }
      $(document).ready(function() {
        refreshSelects();

      });
    </script>
@stop
