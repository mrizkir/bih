@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
  <div class="alert-body d-flex align-items-center">
    <i data-feather="check-circle" class="me-50"></i>    
    <span><strong>{!! $message !!}</strong></span>
  </div>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
  <div class="alert-body d-flex align-items-center">
    <i data-feather="alert-triangle" class="me-50"></i>    
    <span><strong>{!! $message !!}</strong></span>
  </div>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
  <div class="alert-body d-flex align-items-center">
    <i data-feather="alert-triangle" class="me-50"></i>    
    <span><strong>{!! $message !!}</strong></span>
  </div>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info" role="alert">
  <div class="alert-body d-flex align-items-center">
    <i data-feather="info" class="me-50"></i>    
    <span><strong>{!! $message !!}</strong></span>
  </div>
</div>
@endif
  
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  <div class="alert-body d-flex align-items-center">
    <i data-feather="alert-triangle" class="me-50"></i>    
    <span><strong>{{ $error }}</strong></span>    
  </div>
</div>
@endforeach
@endif