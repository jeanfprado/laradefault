@extends('layouts.partials._modal')

@section('title', 'Novo Usuário')

@section('content')
 
 {!! Form::open(['route'=>'users.store']) !!}
    @include('users._form')
    {!! Form::submit('Gravar', ['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
 
@stop