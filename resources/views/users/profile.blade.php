@extends('adminlte::page')

@section('title', 'Meu Perfil - Sysmma Sistema de Monitoramento Minerario e Ambiental')

@section('content_header')
    <h1>Meu Perfil</h1>		
@stop

@section('content')

@include('errors._check')

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
         <img class="profile-user-img img-responsive img-circle" src="{{ asset('image/avatar.png') }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{$user->name}}</h3>

          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" ><b>Alterar Senha</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box 
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sobre</h3>
        </div>
       /.box-header 
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Atividade</strong>

          <p class="text-muted">
            Empresa Expecializada em Licenciamento Ambiental e Geoprocessamento
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Localização</strong>

          <p class="text-muted"></p>

    
        </div>
        /.box-body
      </div>
       /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Ações</a></li>     
          <li><a href="#settings" data-toggle="tab">Dados</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-red">
                      10 Feb. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-plus bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                  <h3 class="timeline-header"><a href="">Inclusão</a> usuário: </h3>

                  <div class="timeline-body">
                    log do usuário inclusão de registro
                  </div>                  
                </div>
              </li>
              <!-- END timeline item -->
        
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      3 Jan. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-refresh bg-purple"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                  <h3 class="timeline-header"><a href="">Atualização</a> Usuário</h3>

                  <div class="timeline-body">
                        log do usuário Atualização de registro
                      </div>
               
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
            <!-- /.post -->
            <p class="text-red" > <strong>Em Desenvolvimento...</strong></p>
          </div>
          <!-- /.tab-pane -->
       

          <div class="tab-pane" id="settings">
            
            {!! Form::model($user,['route'=>['users.updateProfile'], 'id' => 'form', 'class' => 'form-horizontal'])  !!}

            <div class="form-group" >
              {!! Form::label('Name', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            </div>
            
            <div class="form-group" >
                {!! Form::label('Email', 'E-mail', ['class' => 'col-sm-2 control-label'])  !!}
                <div class="col-sm-10">
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
              </div>
            </div>
            
            <div class="form-group" >

                    <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Atualizar Cadastro', ['class'=>'btn btn-primary']) !!}
                          </div>
           </div>

           {!! Form::close()  !!}
              
                </div>
                             
                          
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Alteração de senha</h4>
            </div>
            <div class="modal-body">
              {!! Form::open(['route'=>'users.newpassword', 'id' => 'form'])  !!}
              <div class="form-group">
                    {!! Form::label('old_password','Senha Atual') !!}
                    {!! Form::password('old_password', ['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('password','Nova Senha') !!}
              {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
              <div class="form-group">
              {!! Form::label('password_confirmation','Confirmar Senha') !!}
              {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group" >
                
                {!! Form::submit('Atualizar', ['class' => 'btn btn-success btn-block']) !!}
                
            </div>
              {!! Form::close() !!}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

          </div>
      
        </div>
      </div>

@stop