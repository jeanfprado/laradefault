@extends('layouts.partials._modal')

@section('title', 'Editando Usuário')

@section('content')
 
 {!! Form::model($user,['route'=> ['users.update', $user->id]]) !!}
    @include('users._form')
 {!! Form::close() !!}
 
@stop