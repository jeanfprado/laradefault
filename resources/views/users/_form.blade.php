<div class="form-group">
    {!! Form::label('Name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
        {!! Form::label('Role', 'Papel de acesso') !!}
        {!! Form::select('role_id', $roles,null, ['class' => 'form-control']) !!}
    </div>
<div class="form-group">
    {!! Form::label('Password', 'Senha') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Password_confirmation', 'Senha de Confirmação') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
