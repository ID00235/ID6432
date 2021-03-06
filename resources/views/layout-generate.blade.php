<?php
    $userlogin = Request::user();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <title>@yield('pagetitle')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/starter-templates.css')}}" rel="stylesheet">
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <link href="{{asset('vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/docs.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-spinner.css')}}" rel="stylesheet" />
    <link href="{{asset('css/yamm.css')}}" rel="stylesheet" />
    <link href="{{asset('css/awesome-bootstrap-checkbox.css')}}" rel="stylesheet" />
    @section("stylesheet")
    @show
  </head>

  <body>
  
    
    <div class="container" style="width: 100%">
        @section("container")@show
    </div>
    <footer class="bd-footer">
      <div class="container">
        <center>
            <h6 style="margin-bottom: -15px;">Sistem Informasi Profil Desa - Pemerintah Daerah Kabupaten Batang Hari</h6> <br>
            &copy;2017 Diskominfo Kabupaten Batang Hari
        </center>
      </div>
    </footer>
    <p>&nbsp;</p>
    @section("modal")
    @show 
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>
    <script src="{{asset('js/bootstrap-table.js')}}"></script>
    <script src="{{asset('js/jquery.datatables.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/jquery.decimalMask.min.js')}}"></script>
    <script src="{{asset('js/bootbox.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/jquery.spinner.js')}}"></script>
    <script src="{{asset('script/init.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
      var base_url = '{{URLGroup()}}';
      var root_url = '{{URL::to('')}}';
        @if(Session::has('notice'))
           Notify.showNotice("{!!Session::get('notice')!!}");
        @endif
        @if(Session::has('alert'))
            Notify.showAlert("{!!Session::get('alert')!!}");
        @endif
        <?php Session::forget('alert');?>
        <?php Session::forget('notice');?>
        $(function(){
            $(document).on('click', '.yamm .dropdown-menu', function(e) {
              e.stopPropagation()
            })
        })
    </script>
    @section("javascript")
    @show
  </body>
</html>
