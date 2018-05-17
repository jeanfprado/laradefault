@extends('adminlte::page')

@section('title', 'Permissões | Laradefault')

@section('content_header')
    <h1>Permissões Cadastrados</h1>
@stop

@section('content')

		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title"><i class="fa fa-tag"></i> Lista de Permissões Cadastras </h3>
		      
		    </div>
		    <!-- /.box-header -->
		    <div class="box-body">
          <table class="table table-bordered table-striped">
            <thead>
                    <tr>
                       <th>Nome</th>
                       <th>Titulo</th>           
                       <th style="width: 60px ">Açôes</th>
                       </tr>
                       </thead>
                       <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->title }}</td>                             
                   <td>                    
                    @can('module_permission.edit')
                    <a href="{{route('permissions.edit', ['permission' => $permission->id])}}" data-toggle="modal" data-target="#modalMedium" title="Editar Papel" class="btn btn-default btn-sm"  ><i class="fa fa-edit" ></i></a>
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



