@if($errors->any())  
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
          @foreach($errors->all() as $error )
          {{ $error }} </br>
          @endforeach
        </div>
  @endif
  @if (session('error'))

  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
    {{ session('error') }}
  </div>
  @endif
  
  @if (session('success'))

  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
    {{ session('success') }}
  </div>
  @endif   