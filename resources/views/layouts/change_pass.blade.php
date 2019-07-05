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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <style media="screen">
      .next:hover{
        cursor: no-drop;
      }
    </style>

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <div class="pos-f-t">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <div class="row">
            <div class="col-sm-3">
              <h4 class="text-white">Selamat Datang</h4>
              <span class="text-muted">dihalaman dashboard</span>
            </div>
            <div class="col-sm-6">
              <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{route('modul.show.owner')}}">Modul</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{route('change.user.owner')}}">Ubah username</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white active" href="{{route('change.pass.owner')}}">Ubah password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{route('diklat.home')}}">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-secondary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nav-link text-white">Change Password</a>
      </nav>
    </div>
    <br>
    <div class="container" style="padding:10px;width:80%;">
      <div class="col-sm-6 offset-3">
        <form id="form_pass">
          <div class="form-group">
            <label for="user">Username</label>
            <select class="form-control input" name="user" id="user">
              <option value="">Loading..</option>
            </select>
            <small class="invalid-feedback text-danger user">
              
            </small>
          </div>
          <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="text" class="form-control input" name="password" id="password" placeholder="new password">
            <small class="invalid-feedback text-danger password">
              
            </small>
          </div>
          <div class="form-group">
            <label for="password_confirmation">Ulangi Password Baru</label>
            <input type="text" class="form-control input" name="password_confirmation" id="password_confirmation" placeholder="retype password">
            <small class="invalid-feedback text-danger password_confirmation">
              
            </small>
          </div>
          <button type="submit" class="btn btn-success" id="changepass">Ubah Password</button>
        </form>
      </div>
    </div>
    <ul class="nav justify-content-center bg-secondary fixed-bottom" id="footer">
      <li class="nav-item">
        <p class="text-white" style="margin-top:15px;">
          &copy 2018 Balai Diklat PUPR Wilayah III Jakarta
        </p>
      </li>
    </ul>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        function load_data_user(){
          $.ajax({
            url: "{{route('change.user.get')}}",
            method: "GET",
            beforeSend: function(){
              $('#user').attr('disabled', 'disabled');
            },
            success: function(res){
              $('#user').removeAttr('disabled');
              $('#user').html(res);
            }
          });
        }

        load_data_user();

        $(document).on('click', '#changepass', function(e){
          $(this).attr('disabled', 'disabled');
          $(this).text('Loading..');

          $.ajax({
            url: "{{route('change.pass.create')}}",
            method: "POST",
            data: $('#form_pass').serialize(),
            beforeSend: function(){
              $('.input').each(function(){
                id = $(this).attr('id');
                $('#'+id).removeClass('is-invalid');
              });
            },
            success: function(res){
              $('#changepass').removeAttr('disabled');
              $('#changepass').text('Ubah Password');
              $('input[name="password"]').val("");
              $('input[name="password_confirmation"]').val("");

              load_data_user();
              iziToast.success({
                title: 'Ok',
                message: res.msg,
                position: 'topRight'
              });
            },
            error: function(res){
              $('#changepass').removeAttr('disabled');
              $('#changepass').text('Ubah Password');
              $.each(res.responseJSON.errors, function(key, val){
                $('#'+key).addClass('is-invalid');
                $('.'+key).text(val[0]);
              });
            }
          });

          e.preventDefault();
        });
      });
    </script>