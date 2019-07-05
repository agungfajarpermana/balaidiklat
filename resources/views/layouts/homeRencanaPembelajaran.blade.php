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

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white" href="{{route('diklat.home')}}">Home</a>
      <a class="navbar-brand mx-auto d-block" href="#">
        <img src="{{asset('image/PU.jpg')}}" class="rounded" width="40" height="40" alt="">
      </a>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">

      <div class="card">
        <h5 class="card-header text-center">
          RENCANA PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form class="" action="#" method="post" id="form_rp">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="select_nama_pelatihan">Nama Pelatihan <span class="text-danger">*</span></label>
                <select name="nama" id="select_nama_pelatihan" class="form-control">
                  <option selected disabled>PILIH</option>
                  @foreach ($datas as $data)
                    <option value="{{$data->id_nama_pelatihan}}">{{$data->nama_pelatihan}}</option>
                  @endforeach
                </select>
                <span class="text-danger invalid-feedback" id="n_pel">tidak boleh kosong</span>
              </div>
              <div class="form-group col-md-4">
                <label for="select_mata_pelatihan">Mata Pelatihan <span class="text-danger">*</span></label>
                <select name="mata" id="select_mata_pelatihan" class="form-control">
                  <option selected disabled>PILIH</option>
                </select>
                <span class="text-danger invalid-feedback" id="m_pel">tidak boleh kosong</span>
              </div>
              <div class="form-group col-md-4">
                <label for="disabledSelect">Alokasi Waktu</label>
                <select name="waktu" id="alokasi_waktu" class="form-control" disabled="disabled">
                  <option id="waktu" value="hai"></option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Deskripsi Singkat</label>
                <textarea class="form-control" name="deskripsis" id="deskripsi" rows="3" disabled="disabled"></textarea>
                <span class="text-danger invalid-feedback" id="desc"></span>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Hasil Belajar</label>
                <textarea class="form-control" name="hasils" id="hasil" rows="3" disabled="disabled"></textarea>
                <span class="text-danger invalid-feedback" id="hasils"></span>
              </div>
            </div>
              <div class="row">
                <div class="col-md-12" style="margin-bottom:5px;">
                  <div class="card border-light">
                    <div class="card-header text-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      INDIKATOR HASIL BELAJAR
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush tampil_j">
                          <!--Tampil Indikator With Jquery-->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card border-light">
                    <div class="card-header text-dark" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      MATERI POKOK
                    </div>

                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush tampil_m">
                          <!--Tampil Materi Pokok With Jquery-->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card border-light">
                    <div class="card-header text-dark" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      SUB MATERI POKOK
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush tampil_sm">
                          <!--Tampil Sub Materi With Jquery-->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <button class="btn btn-danger btn-block" id="submit">Next</button>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
      <br>
      <ul class="nav justify-content-center bg-secondary" style="position:absolute;width:100%;margin-top:3px;">
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
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        function confirm(){
          $('#submit').attr('disabled', 'disabled');
          Swal({
            title: 'Masukan NIP',
            input: 'text',
            inputAttributes: {
              maxlength: 18,
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            onClose: () => {
              confirm();
            },
            inputValidator: (value) => {
              if(!value){
                return "Tidak boleh kosong!"
              }
            },
          }).then((result) => {
            if (result.value) {
              // $('.swal2-confirm').attr('disabled', 'disabled');
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

              $.ajax({
                url: "{{route('rppmd.validasi')}}",
                method: "POST",
                data: {nip:result.value},
                success: function(res){
                  if(res.status == true){
                    $('#submit').removeAttr('disabled');
                    $('#submit').attr('data-nip', res.nip);
                    $('.nip').val(res.nip);
                    Swal({
                      position: 'center',
                      type: 'success',
                      title: 'Valid',
                      showConfirmButton: false,
                      timer: 1500,
                    });
                  }else{
                    Swal({
                      position: 'center',
                      type: 'error',
                      text: 'NIP tidak terdaftar! Pastikan anda telah mengisi form RBPMD terlebih dahulu.',
                      showConfirmButton: false,
                      timer: 2500,
                    });
                    setTimeout(function() { 
                        confirm();
                    }, 2500);
                  }
                }
              });
            } else if (
              // Read more about handling dismissals
              result.dismiss === Swal.DismissReason.cancel
            ) {
              Swal({
                position: 'center',
                type: 'success',
                title: 'Cancel',
                showConfirmButton: false,
                timer: 800,
                onClose: () => {
                  window.location.href = "{{route('diklat.home')}}"; 
                }
              })
              
            }
          });
        }
        confirm();

        $(document).on('change', '#select_nama_pelatihan', function(){
          var nama_pelatihan = $(this).val();
          var token          = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.store.namapelatihan')}}",
            data: {nama_pelatihan:nama_pelatihan, token:token},
            beforeSend: function(){
              Swal({
                position: 'center',
                type: 'warning',
                title: 'Loading!',
                showConfirmButton: false,
                onClose: () => {
                  Swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Loading!',
                    showConfirmButton: false,
                    onClose: () => {
                      Swal({
                        position: 'center',
                        type: 'warning',
                        title: 'Loading!',
                        showConfirmButton: false,
                      }); 
                    }
                  }); 
                }
              });
            },
            success: function(data){
              $('#select_mata_pelatihan').html(data);
              $('#waktu').html("");
              $('#waktu').val("");
              $('#deskripsi').html("");
              $('#hasil').html("");
              $('.tampil_j').html("");
              $('.tampil_m').html("");
              $('.tampil_sm').html("");
              Swal({
                position: 'center',
                type: 'success',
                title: 'Ok!',
                timer: 1500,
                showConfirmButton: false,
              }); 
            }
          });
        });

        $(document).on('change', '#select_mata_pelatihan', function(){
          var nip = $('#submit').attr('data-nip');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.store.matapelatihan')}}",
            data: {nip:nip,token:token},
            beforeSend: function(){
              Swal({
                position: 'center',
                type: 'warning',
                title: 'Loading!',
                showConfirmButton: false,
                onClose: () => {
                  Swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Loading!',
                    showConfirmButton: false,
                    onClose: () => {
                      Swal({
                        position: 'center',
                        type: 'warning',
                        title: 'Loading!',
                        showConfirmButton: false,
                      }); 
                    }
                  }); 
                }
              });
            },
            success: function(data){
              $('#waktu').html(data.alokasi_waktu);
              $('#waktu').val(data.alokasi_waktu);
              $('#deskripsi').html(data.deskripsi);
              $('#hasil').html(data.hasil);

              for (var i = 0; i < data.indikator.length; i++) {
                $('.tampil_j').append('<li class="list-group-item"><span class="text-primary">'+(i+1)+'.</span> <span class="text-dark">'+data.indikator[i]+'</span><input type="hidden" name="indikator[]" value="'+data.indikator[i]+'"></li>');
              }

              for (var i = 0; i < data.materi.length; i++) {
                $('.tampil_m').append('<li class="list-group-item"><span class="text-primary">'+(i+1)+'.</span> <span class="text-dark">'+data.materi[i]+'</span><input type="hidden" name="materi[]" value="'+data.materi[i]+'"></li>');
              }

              $.each(data.subMateri, function(key, val){
                $('.tampil_sm').append('<li class="list-group-item"><span class="text-primary">'+(key+1)+'.</span> <span class="text-dark">'+val.sub_materi_pokok+'</span><input type="hidden" name="materi[]" value="'+val.sub_materi_pokok+'"></li>');
              });

              Swal({
                position: 'center',
                type: 'success',
                title: 'Ok!',
                showConfirmButton: false,
                timer: 1500,
              });
            }
          });
        });

        $(document).on('click', '#submit', function(e){
          $(this).attr('disabled', 'disabled');
          $(this).text('inisialisasi');

          var nama_pelatihan = $('#select_nama_pelatihan').val();
          var mata_pelatihan = $('#select_mata_pelatihan').val();
          var waktu          = $('#waktu').val();
          var deskripsi      = $('#deskripsi').val();
          var hasil          = $('#hasil').val();
          var id             = $(this).attr('data-nip');
          var token          = $('input[name=_token]').val();

          if(nama_pelatihan != null && mata_pelatihan != null){
            $('#select_nama_pelatihan').removeClass(' is-invalid');
            $('#select_nama_pelatihan').addClass(' is-valid');
            $('#select_mata_pelatihan').removeClass(' is-invalid');
            $('#select_mata_pelatihan').addClass(' is-valid');
            swal({
              title: 'Anda Yakin?',
              text: 'Mau Lanjut Ke Form Berikutnya!',
              type: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, lanjutkan!',
              cancelButtonText: 'Tidak, batalkan!',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
              reverseButtons: true,
              onClose: () => {
                $('#submit').removeAttr('disabled');
                $('#submit').text('Next');
              }
            }).then((result) => {
              if (result.value) {

                $.ajax({
                  method: "POST",
                  url: "{{route('rppmd.create.next')}}",
                  data: {id:id,nama_pelatihan:nama_pelatihan,mata_pelatihan:mata_pelatihan,waktu:waktu,deskripsi:deskripsi,hasil:hasil,token:token},
                  beforeSend: function(){
                    Swal({
                      position: 'center',
                      type: 'warning',
                      title: 'Loading!',
                      showConfirmButton: false,
                      onBeforeOpen: () => {
                        Swal.showLoading()
                      },
                      onClose: () => {
                        Swal({
                          position: 'center',
                          type: 'warning',
                          title: 'Loading!',
                          showConfirmButton: false,
                          onBeforeOpen: () => {
                            Swal.showLoading()
                          },
                          onClose: () => {
                            Swal({
                              position: 'center',
                              type: 'warning',
                              title: 'Loading!',
                              showConfirmButton: false,
                              onBeforeOpen: () => {
                                Swal.showLoading()
                              },
                            }); 
                          }
                        }); 
                      }
                    });
                  },
                  success: function(data){
                    $('#submit').text('Next');
                    Swal({
                      position: 'center',
                      type: 'success',
                      title: 'Berhasil disimpan',
                      showConfirmButton: false,
                      timer: 800,
                      onClose: () => {
                        window.location.href = "{{route('rppmd.form.lanjut')}}";
                      }
                    });
                  }
                });

              } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
              ) {
                $('#submit').removeAttr('disabled');
                $('#submit').text('Next');
                swal(
                  'Cancelled',
                  'Silahkan Periksa Kembali Data Anda. :)',
                  'warning'
                )
              }
            });
          }else{
            $('#submit').removeAttr('disabled');
            $('#submit').text('Next');
            $('#select_nama_pelatihan').addClass(' is-invalid');
            $('#select_mata_pelatihan').addClass(' is-invalid');

            swal(
              'Oopps !!',
              'Nama Pelatihan dan Mata Pelatihan Tidak Boleh Kosong. :)',
              'error'
            )
          }
          e.preventDefault();
        });
      });
    </script>
