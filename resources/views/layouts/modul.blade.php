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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <style media="screen">
      .next:hover{
        cursor: no-drop;
      }
    </style>

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white" href="{{ route('diklat.home') }}">Home</a>
      <form class="form-inline float-right" id="formsearch">
        <input class="form-control mr-sm-3" type="search" name="search" placeholder="Nama Modul" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" id="search" type="submit">Search</button>
      </form>
    </nav>
    <br>
    <div class="container" style="padding:10px;width:80%;">
      
      <div class="row" id="display_modul">
        <!-- output modul -->
      </div>

      <nav aria-label="Page navigation example" id="pagination" style="display:none">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" id="previous" href="" aria-label="Previous">
              previous
            </a>
          </li>
          <li class="page-item disabled"><a class="page-link">page: <b id="page"></b> of <b id="last"></b> data: <b id="data"></b></a></li>
          <li class="page-item">
            <a class="page-link" id="next" href="" aria-label="Next">
              next
            </a>
          </li>
        </ul>
      </nav>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
      Dropzone.autoDiscover = false;
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        function load_data_modul(page){
          $.ajax({
            url: "{{route('fetch.modul')}}?page="+page,
            method: "GET",
            beforeSend: function(){
              iziToast.error({
                title: 'process',
                message: 'Loading..!',
                position: 'topRight'
              });
            },
            success: function(res){
              $('#display_modul').hide().html((res.output != '' ? res.output : '<div class="col-sm-12"><h5 class="text-center">Modul Belum Tersedia!</h5></div>')).fadeIn(1500);
              $('#previous').attr('href', res.previous);
              $('#page').html(res.page);
              $('#last').html(res.last);
              $('#data').html(res.data);
              $('#next').attr('href', res.next);
              $('#pagination').css({'display':(res.total == 0 ? 'none' : '')});
              
              if(res.total > 12){
                $('#footer').removeClass('fixed-bottom');
              }else if(res.total < 4){
                $('#footer').addClass('fixed-bottom');
              }
            }
          });
        }

        load_data_modul(1);

        function load_data_modul_search(page){
          let search = $('#formsearch').attr('data-search');
          let token = $('input[name=_token]').val();

          $.ajax({
            url: "{{route('search.modul')}}?page="+page,
            method: "POST",
            data: {search:search,token:token},
            beforeSend: function(){
              iziToast.error({
                title: 'process',
                message: 'Loading..!',
                position: 'topRight'
              });
            },
            success: function(res){
              $('#display_modul').hide().html((res.output != '' ? res.output : '<div class="col-sm-12"><h5 class="text-center">Maaf, data tidak ditemukan..</h5></div>')).fadeIn(1500);
              $('.list').attr('data-page', res.page);
              $('.list').attr('data-count', res.total);
              $('.list').attr('data-last', res.last);
              $('#previous').attr('href', res.previous);
              $('#page').html(res.page);
              $('#last').html(res.last);
              $('#data').html(res.data);
              $('#next').attr('href', res.next);
              $('#pagination').css({'display':(res.total == 0 ? 'none' : '')});
            }
          });
        }

        $(document).on('click', '.pagination a', function(e){
          let page = $(this).attr('href').split('page=')[1];
          let search = $('#formsearch').attr('data-search');

          if(!search){
            load_data_modul(page);
          }else{
            load_data_modul_search(page);
          }

          e.preventDefault();
        });

        // SEARCH
        $(document).on('click', '#search', function(e){
          let val = $('input[name="search"]').val();
          $('#formsearch').attr('data-search', val);

          load_data_modul_search(1);
          e.preventDefault();
        });

        $(document).on('click', '#download', function(e){
          $(this).addClass('disabled');
          $(this).text('Generate');
          let id = $(this).attr('data-id');

          $.ajax({
            method: "GET",
            success: function(res){
              $('.download'+id).removeClass('disabled');
              $('.download'+id).text('Download');
            }
          });
        });
      });
    </script>