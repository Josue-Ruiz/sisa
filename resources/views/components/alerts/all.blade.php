@error('error')
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{$message}}
</div>
@enderror
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{Session::get('success')}}
</div>
@endif
@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade in" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{Session::get('warning')}}
 </div>
@endif

                

             