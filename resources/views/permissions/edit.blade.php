@extends('layouts.partials._modal')

@section('title', 'Editando Permissão')

@section('content')
 
 {!! Form::model($permission,['route'=> ['permissions.update', $permission->id]]) !!}
    {!! Form::hidden('_method','PUT') !!}
    @include('permissions._form')

    {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
 
@stop