@extends('adminlte::page')

@section('title', 'Usuário | Laradefault')

@section('content_header')
    <h1>Usuários Cadastrados</h1>
@stop

@section('content')

    @include('errors._check')

		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title"><i class="fa fa-tag"></i> Lista de Usuários Cadastrados </h3>
		      <div class="box-tools pull-right">
                    <small> 
                        @can('module_user.create')
                        <a href="{{route('users.create')}}"  data-toggle="modal" data-target="#modalMedium" title="Novo Usuário"  class="btn btn-default bt-sm "><i class="fa fa-user-plus" ></i></a>
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
                       <th>E-mail</th>
                       <th>Acesso</th>
                       <th  style="width: 90px ">Açôes</th>
                       </tr>
                       </thead>
                       <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->first()->name }}</td>
                    <td>
                     @can('module_user.edit') 
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" data-toggle="modal" data-target="#modalMedium" title="Editar Usuário" class="btn btn-default btn-sm"  ><i class="fa fa-edit" ></i></a>
                    @endcan
                    @can('module_user.delete')
                    <a href="#" title="Excluir Usuário" class="btn btn-default btn-sm"   ><i class="fa fa-remove" ></i></a>
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


@section('js')

<script>
    @if (session('success'))
        swal('Operação Realizada!');
    @endif
    @if (session('error'))
        swal('Error');
    @endif
</script>

@stop
