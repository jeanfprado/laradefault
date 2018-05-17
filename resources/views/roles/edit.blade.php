@extends('layouts.partials._modal')

@section('title', 'Editando Papel de Acesso')

@section('content')
 
 {!! Form::model($role,['route'=> ['roles.update', $role->id]]) !!}
    {!! Form::hidden('_method','PUT') !!}
    @include('roles._form')

    {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
 
@stop