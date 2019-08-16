<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 @include('layouts.header')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
@include('layouts.topnav')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
@include('layouts.sidenav')
<!-- /.sidebar -->
</aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @if(session()->has('success'))
                  <div class="alert alert-solid alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      {{ session()->get('success') }}
                  </div>
              @endif
      <h1>
     Referrer: {{ucfirst($viewCouple->referrer)}} 
     <form action="{{url('admin/'.$viewCouple->id.'/approve')}}" method="post">
     @csrf
     @method('PATCH')
     @if($viewCouple->status==0)
     <input type="hidden" value="1" name="status">
     <button type="submit" class="buttonload btn btn-success">
      <i id="btn-loader1" class="fa fa-spinner fa-spin"></i>
      <label id="click1">Confirm Couple</label>
      </button>
      @else
      <input type="hidden" value="0" name="status">
     <button type="submit" class="buttonload btn btn-danger">
      <i id="btn-loader1" class="fa fa-spinner fa-spin"></i>
      <label id="click1">Decline Couple</label>
      </button>
      @endif
     </form>
                
        <!-- <small>Optional description</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
     <div class="row">
     <div class="col-md-4">
     <!-- <h1>{{$viewCouple}}</h1> -->
     <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <img src="{{asset('user_image/'.$viewCouple->couple_picture)}}"
            alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-6 col-md-6">
            <blockquote>
                <p>{{$viewCouple->first_name_one}} {{$viewCouple->last_name_one}}, {{$viewCouple->first_name_one}} {{$viewCouple->last_name_two}}</p> 
                <small><cite title="Source Title">{{$viewCouple->state_of_res}}, Nigeria.  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>
            <p> <i class="glyphicon glyphicon-envelope"></i> {{$viewCouple->email}}
                <br/>
                 <i class="glyphicon glyphicon-globe"></i> {{$viewCouple->couple_type}}
                <br /> 
                <i class="glyphicon glyphicon-gift"></i> {{$viewCouple->anniversary_month}}
                <br /> 
                <i class="glyphicon glyphicon-phone"></i> {{$viewCouple->phone_no}} | WhatsApp: {{$viewCouple->whatsApp_no}}</p>
                <br /> 
                <i class="glyphicon glyphicon-user"></i> Referrer: {{ucfirst($viewCouple->referrer)}} [Total: {{$getReferrer}}].
              <br>
              <p>Receipt</p>
               <div class="col-md-12">
               <div class="row">
                <div class="col-md-10 col-sm-6">
                <a href="{{('/user_receipt/'.$viewCouple->receipt)}}" target="_blank">
                <img src="{{asset('user_receipt/'.$viewCouple->receipt)}}" 
                height="100" width="200" alt="" class="img-rounded img-responsive" /></a>
                </div>

        </div>
       
    </div>
</div>
     </div>
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Camet Empire</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
@include('layouts.footer')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#btn-loader1").hide();
$(".buttonload").click(function(){
    $("#click1").show();
    $("#btn-loader1").show();
});
});
</script>