<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                  <a class="nav-link text-white active" href="{{route('modul.show.owner')}}">Modul</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{route('change.user.owner')}}">Ubah username</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{route('change.pass.owner')}}">Ubah password</a>
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
        <form class="form-inline float-right" id="formsearch">
          <input class="form-control mr-sm-3" type="search" name="search" placeholder="Nama Modul" aria-label="Search">
          <button class="btn btn-outline-warning my-2 my-sm-0" id="search" type="submit">Search</button>
          {{csrf_field()}}
        </form>
      </nav>
    </div>
    <br>
    <div class="container" style="padding:10px;width:80%;">
      <form action="#" class="dropzone" enctype="multipart/form-data">
        <h4 class="dz-message">Drag & Drop files disini <br><br> (or click)</h4>
        {{csrf_field()}}
      </form>
      <div class="form-group" style="margin-top:5px;">
        <div class="form-inline" id="lain_media">
          <button type="button" class="btn btn-outline-primary col-sm-2" id="upload">Upload</button>
        </div>
      </div>
      <hr>
      <br>
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
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
            url: "{{route('fetch.modul.owner')}}?page="+page,
            method: "GET",
            beforeSend: function(){
              iziToast.error({
                title: 'process',
                message: 'Loading..!',
                position: 'topRight'
              });
            },
            success: function(res){
              if(res.total > 3){
                $('#footer').removeClass('fixed-bottom');
              }
              if(res.total < 4){
                $('#footer').addClass('fixed-bottom');
              }
              $('#display_modul').hide().html((res.output != '' ? res.output : '<div class="col-sm-12"><h5 class="text-center">Modul Belum Tersedia!</h5></div>')).fadeIn(1500);
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

        load_data_modul(1);

        function load_data_modul_search(page){
          let search = $('#formsearch').attr('data-search');
          let token = $('input[name=_token]').val();

          $.ajax({
            url: "{{route('search.modul.owner')}}?page="+page,
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

        var myDropzone = new Dropzone('.dropzone',{
          url: "{{route('modul.upload')}}",
          maxFiles: 5,
          maxFilesize: 7, // MB
          parallelUploads: 5,
          addRemoveLinks : true,
          acceptedFiles: "application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/docx,application/pdf,application/msword",
          autoProcessQueue: false,
          dictFileTooBig: "File Terlalu Besar Bro or Sis Maksimal 7 MB",
          dictInvalidFileType: "Jenis Extension File Ga Sesuai Tuh!",
          dictMaxFilesExceeded: "File Yang Dimasukan Max 5, Hapus Dulu Lebihnya, Nanti Upload Lagi :)",
          init: function() {
            this.on("error", function (file, data) {
                // $('.dz-error-message').text('Gagal Upload File');
                $('.dz-remove').css({'display':'block'});
            });
            this.on('success', function(file){
              if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
                  $('#upload').removeAttr('disabled');
                  $('#upload').text('Upload');
                  let _this = this;
                  $('.dz-remove').css({'display':'block'});
                  load_data_modul(1);

                  setTimeout(() => {
                    _this.removeAllFiles();
                  }, 3000);
              }
            });
          }
        });

        $(document).on('click', '#upload', function(e){
          $(this).attr('disabled','disabled');
          $(this).text('process upload..');

          if(myDropzone.getQueuedFiles().length > 0){
            myDropzone.processQueue();
          }else{
            $('#upload').removeAttr('disabled');
            $('#upload').text('Upload');
            Swal.fire({
              title: 'Belum ada file yang dimasukan!!',
              animation: false,
              customClass: 'animated tada'
            });
          }
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

        $(document).on('click', '#delete', function(e){
          $(this).addClass('disabled');
          $(this).text('Wait');

          let id = $(this).attr('data-id');
          let page = $('.list').attr('data-page');
          let count = $('.list').attr('data-count');
          let last  = $('.list').attr('data-last');
          let total = $('#data').text();
          
          Swal.fire({
            title: 'Kamu Yakin?',
            text: "Mau Hapus Data File Ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            onClose: () => {
              $('.delete'+id).removeClass('disabled');
              $('.delete'+id).text('Delete');
            }
          }).then((result) => {
            if (result.value) {
              $('.delete'+id).addClass('disabled');
              $('.delete'+id).text('Wait');
              $.ajax({
                url: "{{route('delete.modul')}}",
                method: "POST",
                data: {id:id},
                success: function(res){
                  $('#modul'+id).fadeOut('slow');
                  $('.list').attr('data-page', (page == 1 ? 1 : (page-1)));
                  $('.list').attr('data-count', (count-1));
                  $('#data').html((total-1));

                  if($('.list').attr('data-count') < 4){
                    $('#footer').addClass('fixed-bottom');
                  }

                  if(page == last && count == 1){
                    load_data_modul((page-1));
                  }else if(page != last && count == 1){
                    load_data_modul((page-1));
                  }else if(page == 1 && count == 1 || page != last && count != 1){
                    load_data_modul(page);
                  }
                  iziToast.success({
                    title: 'OK',
                    message: 'Berhasil Dihapus!',
                    position: 'topRight'
                  });
                }
              });
            }
          });

          e.preventDefault();
        });
      });
    </script>