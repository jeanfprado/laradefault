@extends('layouts.partials._modal')

@section('title', 'Editando Usuário')

@section('content')
 
 {!! Form::model($user,['route'=> ['users.update', $user->id]]) !!}
    {!! Form::hidden('_method','PUT') !!}
    @include('users._form')
    {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
 
@stop