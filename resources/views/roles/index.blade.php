@extends('adminlte::page')

@section('title', 'Papeis | Ecommerce')

@section('content_header')
    <h1>Papeis Cadastrados</h1>
@stop

@section('content')

		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title"><i class="fa fa-tag"></i> Lista de Papeis Cadastras </h3>
		      <div class="box-tools pull-right">
                    <small> 
                        @can('module_role.create')
                        <a href="{{route('roles.create')}}"  data-toggle="modal" data-target="#modalMedium" title="Novo Papel"  class="btn btn-default bt-sm "><i class="fa fa-plus" ></i></a>
                        @endcan
                    </small> 
		      </div>
		    </div>
		    <!-- /.box-header -->
		    <div class="box-body">
          <table class="table table-bordered table-striped">
            <thead>
                    <tr>
                       <th>Nome</th>
                       <th>Titulo</th>
                       <th>Usuários</th>   
                       <th style="width: 120px ">Açôes</th>
                       </tr>
                       </thead>
                       <tbody>
                    @foreach($roles as $role)
                    <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->title }}</td>  
                    <td>{{ $role->user->count() }}</td>        
                   <td>
                    @can('module_role.create')
                    <a href="{{ route('roles.permission', ['role' => $role->id]) }}" data-toggle="modal" data-target="#modalLarge" title="Gerenciar Permissões" class="btn btn-default btn-sm"   ><i class="fa fa-lock" ></i></a>
                    @endcan
                    @can('module_role.edit')
                    <a href="{{route('roles.edit', ['role' => $role->id])}}" data-toggle="modal" data-target="#modalMedium" title="Editar Papel" class="btn btn-default btn-sm"  ><i class="fa fa-edit" ></i></a>
                    @endcan
                    @can('module_role.delete')
                    <a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="$(this).find('form').submit();" >
                      <i class="fa fa-remove"> </i>
                      {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                      {!! Form::close() !!} 
                    </a>
                                      
                    @endcan
                    </td>
                    </tr>
               
                      @endforeach
                        </tbody>
                    </table>
		      </table>
		    </div>
		   
          </div>

          @include('layouts.partials._type-modal')
     
                    	
@stop



