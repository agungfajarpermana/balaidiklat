<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <style media="screen">
      body{
        min-height: 100%;
        background: url('/image/gedung2.png');
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        height: 647px;
        /* opacity: .75; */
        /* background-position: fixed; */
      }
      .intro{
        background-color: rgb(74, 94, 115);
        padding: 20px;
        height: 100%;
        opacity: .30;
        z-index: -100;
      }
      .title-footer{
        position: absolute;
        top: 10.5%;
        left: 13%;
      }
    </style>

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
  <div class="intro fixed-top"></div>
    <div class="container-fluid">
      <ul class="nav justify-content-end" style="margin-top:10px;">
        <li class="nav-item mr-2">
          @if(Auth::user())
            @if(Auth::user()->status == 3)
              <a class="nav-link btn btn-sm btn-danger" href="{{route('modul.show.owner')}}">Dashboard</a>
            @endif
          @endif
        </li>
        <li class="nav-item">
          @if(Auth::user())
            @if(Auth::user()->status == 3)
              <a class="nav-link btn btn-sm btn-outline-warning" href="{{route('logout.owner')}}">Logout</a>
            @else
              <a class="nav-link btn btn-sm btn-outline-warning" href="{{route('logout')}}">Logout</a>
            @endif
          @endif
        </li>
      </ul>
    </div>
    <div class="container" style="padding:10px;">
      <div class="row" style="margin-top:145px;">
        <div class="col-sm-5 offset-1">
          <div class="card bg-transparent text-white border-transparent">
            <div class="card-body">
              <h5 class="card-title">
                RBPMD
                @if (Auth::user())
                  @if (Auth::user()->status == 1 || Auth::user()->status == 2)
                    <button type="button" class="btn btn-sm btn-info float-right">
                      Notif <span class="badge badge-light rbpmd">0</span>
                    </button>
                  @endif
                @endif
              </h5>
              <p class="card-text">Rancang Bangun Pembelajaran Mata Pelatihan</p>
              <a href="{{route('rbpmd.next')}}" class="btn btn-outline-warning">Next</a>
              <a href="{{route('rbpmd.home')}}" class="btn btn-outline-warning">Show Data</a>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card bg-transparent text-white border-transparent">
            <div class="card-body">
              <h5 class="card-title">
                RP
                @if (Auth::user())
                  @if (Auth::user()->status == 1 || Auth::user()->status == 2)
                    <button type="button" class="btn btn-sm btn-info float-right">
                      Notif <span class="badge badge-light rppmd">0</span>
                    </button>
                  @endif
                @endif
              </h5>
              <p class="card-text">Rencana Pembelajaran</p>
              @if (Auth::user())
                  @if (Auth::user()->status == 1 || Auth::user()->status == 2)

                  @endif

                @else
                  <a href="{{route('rp.next')}}" class="btn btn-outline-warning">Next</a>
              @endif

              <a href="{{route('rppmd.showdata')}}" class="btn btn-outline-warning">Show Data</a>
            </div>
          </div>
        </div>
        
        <div class="col-sm-4 offset-sm-4" style="margin-top:20px;">
          <div class="card bg-transparent text-white border-transparent text-center">
            <div class="card-body">
              <h5 class="card-title">
                MODUL PEMBELAJARAN
              </h5>
              <a href="{{route('modul.show')}}" class="btn btn-outline-warning">Show Data</a>
            </div>
          </div>
        </div>
      </div>
      {{ csrf_field() }}
    </div>
    <ul class="nav fixed-bottom">
      <li class="nav-item">
        <img src="{{asset('image/kemenpu.png')}}" class="rounded" width="700" height="100" alt="...">
        <h6 class="title-footer text-white">Balai Diklat Wilayah III Jakarta</h6>
      </li>
    </ul>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
      $(window).on("beforeunload", function( e ) {
        e.returnValue = "?";
      });

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function notifikasi_rbpmd(){
        var token = $('input[name=_token]').val();

        $.ajax({
          url: "{{route('rbpmd.notif')}}",
          method: "POST",
          data: {token:token},
          success: function(data){
            $('.rbpmd').html(data.total);
          }
        });
      }

      function notifikasi_rppmd(){
        var token = $('input[name=_token]').val();

        $.ajax({
          url: "{{route('rppmd.notif')}}",
          method: "POST",
          data: {token:token},
          success: function(data){
            $('.rppmd').html(data.total);
          }
        });
      }

      notifikasi_rbpmd();
      notifikasi_rppmd();
      setInterval(function(){
        notifikasi_rbpmd();
        notifikasi_rppmd();
      }, 5000);
    </script>
