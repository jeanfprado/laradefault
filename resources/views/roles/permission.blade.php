@extends('layouts.partials._modal')

@section('title', 'Adicionando Permissões')

@section('content')
 
 {!! Form::open(['route'=>'roles.permission.store']) !!}
 @inject('permissions', 'App\Models\Permission')
 @foreach($permissions::all() as $permission )
 <div class="col-md-3">
     <div class="form-group">
         <label>
             <input type="checkbox" value="{{ $permission->id }}" class="minimal" name="permissions[]"
             @if( isset($role) && $role->permission->contains($permission->id) )
             checked="checked"
             @endif
              /> {{ $permission->title }}
         </label>
     </div>
 </div>
 @endforeach
 <input name="role_id" class="hidden" value="{{ $role->id }}">
 
 {!! Form::submit('Gravar', ['class' => 'btn btn-primary']) !!}
    
 {!! Form::close() !!}
 
@stop