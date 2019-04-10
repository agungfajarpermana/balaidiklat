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
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="navbar-brand mx-auto d-block" href="#">
        <img src="{{asset('image/garuda.png')}}" class="rounded" width="40" height="40" alt="">
      </a>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">

      <div class="card">
        <h5 class="card-header text-center">
          RENCANA PEMBELAJARAN
        </h5>
        <div class="card-body">
          <form class="" action="#" method="post" id="form_submit">
            <div class="row">
              <div class="col-md-6">
                <div class="card border-light">
                  <div class="card-header text-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    MATERI POKOK DAN SUB MATERI POKOK
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                      @foreach ($materi as $key => $value)
                        <ul class="list-group list-group-flush">
                          <p>
                            <a class="text-left text-dark materi_pokok" id="materi_p{{$key+1}}" data-id="{{$key+1}}" data-toggle="collapse" href="#multiCollapseExample{{$key+1}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{$key+1}}">
                              <span class="text-primary">{{$key+1}}.</span> {{$value}}
                            </a>
                          </p>
                          <div class="row">
                            <div class="col">
                              <div class="collapse multi-collapse" id="multiCollapseExample{{$key+1}}">
                                <div class="card card-body">
                                  <ul class="list-unstyled">
                                    <li>
                                      <ul class="tampil_materi{{$key+1}}">
                                        <!--Tampil Sub Materi Pokok-->
                                      </ul>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </ul>
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card border-light">
                  <div class="card-header text-dark" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    BENTUK EVALUASI
                  </div>
                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">

                      <div class="row">
                        <div class="col">
                          <div class="collapse show multi-collapse" id="evaluasi_s">
                            <div class="card card-body">
                              <ul class="list-unstyled">
                                <li>
                                  <ul class="tampil_evaluasi">
                                    <!--Tampil Sub Materi Pokok-->
                                  </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group" style="margin-top:5px;">
                        <div class="form-inline b_evaluasi" id="dynamic_evaluasi">
                          <input type="text" class="form-control col-md-10 col-sm-10" name="evaluasi"  id="evaluasi" placeholder="Evaluasi">
                          <button type="button" class="btn btn-outline-success col-md-2 col-sm-2" id="addEvaluasi" data-id="">+</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="card border-light">
                  <div class="card-header text-dark" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    REFERENSI
                  </div>

                  <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <div class="form-group">
                        <ul class="list-unstyled">
                          <li>
                            <ul class="fetch_ref">
                              @foreach ($referensi as $key => $value)
                                <li>{{$value}}</li>
                              @endforeach
                            </ul>
                          </li>
                        </ul>
                        <div class="form-inline" id="dynamic_referensi">
                          <input type="text" class="form-control col-md-11 col-sm-10" name="referensi" id="referensi" placeholder="tambahan referensi" style="margin-top:5px;">
                          <button type="button" class="btn btn-outline-success col-md-1 col-sm-2" id="addReferensi" style="margin-top:5px;">+</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <button type="submit" name="submit" class="btn btn-danger btn-block" id="submit">Submit</button>
              {{ csrf_field() }}
            </div>
          </form>
        </div>
      </div>
      <br>
      <ul class="nav justify-content-center bg-secondary">
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
    <script type="text/javascript">
      // disabled button back browser
      history.pushState(null,null,location.href);
      window.onpopstate = function(){
          history.go(1)
      }
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        function beforesend(){
          Swal({
            title: 'Loading!',
            html: 'Mohon bersabar.',
            onBeforeOpen: () => {
              Swal.showLoading()
            },
            onClose: () => {
              Swal({
                position: 'center',
                type: 'warning',
                title: 'Sedang proses..',
                showConfirmButton: false,
                onClose: () => {
                  Swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Sedang proses..',
                    showConfirmButton: false,
                  }); 
                }
              }); 
            }
          });
        }

        //tampil sub materi pokok otomatis
        var mpi = 0;
        var fetch_sub = $('.materi_pokok');
        fetch_sub.each(function(i){
          mpi++;
          i++;

          var id    = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.form.sub.materi')}}",
            data: {id:id,token:token},
            success: function(data){
              if(data.id == id){
                $('.tampil_materi'+i).html(data.data);
              }
            }
          });
        });

        //button evaluasi
        var i = 1;
        $('#addEvaluasi').click(function(){
          i++;

          var val   = $('input[name="evaluasi"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kosong!',
              'info'
            );
          }else{
            $('.tampil_evaluasi').append('<li style="list-style:circle;" id="rowEvaluasi'+i+'">'+val+' <input type="hidden" name="evalu[]" value="'+val+'"> <a href="#" class="text-danger close removeEvaluasi r_evaluasi" id="'+i+'" style="margin-top:-1px;">x</a></li>');
            $('input[name="evaluasi"]').val("");
          }

        });
        $(document).on('click', '.removeEvaluasi', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#rowEvaluasi'+id).remove();
          $(this).remove();
        });

        //button referensi
        var j = 1;
        $('#addReferensi').click(function(){
          j++;

          var val   = $('#referensi').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kososng!',
              'info'
            );
          }else{
            $('.fetch_ref').append('<li id="rowReferensi'+j+'">'+val+' <a href="#" class="text-danger close removeReferensi r_ref'+j+'" id="'+j+'" style="margin-top:-1px;">x</a><input type="hidden" name="referen[]" value="'+val+'" style="margin-top:5px;"></li>');
            $('#referensi').val("");
          }
        });
        $(document).on('click', '.removeReferensi', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $('#rowReferensi'+id).remove();
          $(this).remove();
        });

        $(document).on('click', '#submit', function(e){
          e.preventDefault();

          swal({
            title: 'Anda Yakin?',
            text: "Mau Lanjut Ke Form Berikut nya!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!',
            cancelButtonText: 'Tidak, batalkan!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              $.ajax({
                method: "POST",
                url: "{{route('rppmd.lanjut.create')}}",
                data: $('#form_submit').serialize(),
                beforeSend: function(){
                  beforesend();
                },
                success: function (res){
                  if(res.status == true){
                    $('#submit').attr('disabled', 'disabled');
                    Swal({
                      position: 'center',
                      type: 'success',
                      title: 'Good Job!',
                      text: res.msg,
                      showConfirmButton: false,
                      timer: 800,
                      onClose: () => {
                        window.location.href = "{{route('diklat.home')}}";
                      }
                    });
                    return false;
                  }
                  Swal({
                    position: 'center',
                    type: 'info',
                    title: 'Pesan Kesalahan!',
                    text: res.msg,
                    showConfirmButton: true
                  });
                }
              });
            } else if (
              // Read more about handling dismissals
              result.dismiss === swal.DismissReason.cancel
            ) {
              swal(
                'Cancelled',
                'Silahkan Periksa Kembali Data Anda. :)',
                'error'
              )
            }
          });

        });
      });
    </script>
