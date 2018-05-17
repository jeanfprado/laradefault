@extends('layouts.partials._modal')

@section('title', 'Novo Papel de Acesso')

@section('content')
 
 {!! Form::open(['route'=>'roles.store']) !!}
    @include('roles._form')
 
 {!! Form::submit('Gravar', ['class' => 'btn btn-primary']) !!}
    
 {!! Form::close() !!}
 
@stop