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
        background: url('/image/slider.jpg');
        background-size: 100% 250%;
        background-repeat: no-repeat;
      }
    </style>

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <div class="container" style="padding:10px;width:50%;">
      <div class="card bg-transparent text-white border-transparent" style="margin-top:100px;">
        <div class="card-header text-center d-block">
          <a class="navbar-brand" href="{{route('diklat.home')}}">
            <img src="{{asset('image/PU.jpg')}}" class="rounded" width="40" height="40" alt="">
          </a>
        </div>
        <div class="card-body">
          <form action="#" method="post" id="login_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="email" name="email" class="form-control email input" id="emails" placeholder="Masukan email">
              <small id="email" class="invalid-feedback text-danger">
                  
              </small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control password input" id="passwords" placeholder="Password">
              <small id="password" class="invalid-feedback text-danger">
                  
              </small>
            </div>
            <button type="submit" class="btn btn-warning btn-block" id="submit">Submit</button>
            {{ csrf_field() }}
          </form>
        </div>
        <div class="card-footer text-center text-white">
          &copy 2018 Balai Diklat PUPR Wilayah III Jakarta
        </div>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(document).on('click', '#submit', function(e){
          $(this).attr('disabled','disabled');
          $(this).text('inisialisasi');

          $.ajax({
            method: "POST",
            url: "{{route('login.submit')}}",
            data: $('#login_form').serialize(),
            beforeSend: function(){
              $('.input').each(function(key, val){
                id = $(this).attr('id');
                $('#'+id).removeClass('is-invalid');
              })
            },
            success: function(data){
              if(data.success){
                swal({
                  position: 'center',
                  type: 'success',
                  title: 'Valid!',
                  showConfirmButton: false,
                  timer: 800,
                  onClose: () => {
                    window.location.href = "{{route('diklat.home')}}"
                  }
                });
              }else{
                $('#submit').removeAttr('disabled');
                $('#submit').text('Submit');
                swal(
                  'Oops!!',
                  'Email Dan Password Salah..! :)',
                  'info'
                );
              }
            },
            error: function(res){
              $('#submit').removeAttr('disabled');
              $('#submit').text('Submit');
              $.each(res.responseJSON.errors, function(key, val){
                id = key.replace(/\./g,'_'); // change dot to dashes
                $('.'+id).addClass('is-invalid');
                $('#'+id).text(val[0]);
              });
            }
          });
          e.preventDefault();
        });
      });
    </script>
