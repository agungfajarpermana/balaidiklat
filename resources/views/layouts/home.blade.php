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
      <a class="nav-link btn btn-danger text-white back" href="{{route('diklat.home')}}">Home</a>
      <a class="navbar-brand mx-auto d-block" href="#">
        <img src="{{asset('image/PU.jpg')}}" class="rounded" width="40" height="40" alt="">
      </a>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">
      <div class="card">
        <h5 class="card-header text-center">
          RANCANG BANGUN PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form action="#" method="post" id="form_submit">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1">Nama Pelatihan <span class="text-danger">*</span></label>
                <select class="form-control nama_pelatihan input" name="nama_pelatihan" id="nama_pelatihans">
                  <option selected disabled>PILIH</option>
                  @foreach ($n_pelatihan as $napel)
                    <option value="{{$napel->id_nama_pelatihan}}">{{$napel->nama_pelatihan}}</option>
                  @endforeach
                </select>
                <small id="nama_pelatihan" class="invalid-feedback text-danger">
                  
                </small>
              </div>
              <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1">Mata Pelatihan <span class="text-danger">*</span></label>
                <select class="form-control mata_pelatihan input" name="mata_pelatihan" id="mata_pelatihans">
                  <option selected disabled>PILIH</option>
                </select>
                <small id="mata_pelatihan" class="invalid-feedback text-danger">
                  
                </small>
              </div>
              <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1">Alokasi Waktu <span class="text-danger">*</span></label>
                <select class="form-control alokasi_waktu input" name="alokasi_waktu" id="alokasi_waktus">
                  <option selected disabled>PILIH</option>
                </select>
                <small id="alokasi_waktu" class="invalid-feedback text-danger">
                  
                </small>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Deskripsi Singkat <span class="text-danger">*</span></label>
                <textarea class="form-control deskripsi input" name="deskripsi" id="deskripsis" rows="3"></textarea>
                <small id="deskripsi" class="invalid-feedback text-danger">
                  
                </small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Hasil Belajar <span class="text-danger">*</span></label>
                <textarea class="form-control hasil input" name="hasil" id="hasils" rows="3"></textarea>
                <small id="hasil" class="invalid-feedback text-danger">
                  
                </small>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Indikator Hasil Belajar <span class="text-danger">*</span></label>
              <div class="form-inline" id="dynamic_first">
                <input type="text" class="form-control col-md-11 col-sm-10 indikator_0 input" name="indikator[]" id="indikators" placeholder="indikator hasil belajar">
                <button type="button" class="btn btn-outline-success btn-success col-md-1 col-sm-2 text-white" id="add">+</button>
                <small id="indikator_0" class="invalid-feedback text-danger">
                  
                </small>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Materi Pokok <span class="text-danger">*</span></label>
              <div class="form-inline" id="dynamic_second">
                <input type="text" class="form-control col-md-11 col-sm-10 materi_0 input" name="materi[]" id="materis" placeholder="materi pokok">
                <button type="button" class="btn btn-outline-success btn-success col-md-1 col-sm-2 text-white" id="adds">+</button>
                <small id="materi_0" class="invalid-feedback text-danger">
                  
                </small>
              </div>
            </div>

            <button class="btn btn-danger btn-block" id="submit">Next</button>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
    <br>
    <ul class="nav justify-content-center bg-secondary" style="position:absolute;width:100%;margin-top:43px;">
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

        function beforesend(){
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

        function beforesendrequest(){
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

        //button add indikator
        var i = 1;
        $('#add').click(function(){
          i++;
          $('#dynamic_first').append('<input type="text" name="indikator[]" class="form-control col-md-11 col-sm-10 indikator" id="row'+i+'" placeholder="indikator hasil belajar" style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-1 col-sm-2 remove" id="'+i+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.remove', function(){
          var id = $(this).attr('id');
          $('#row'+id).remove();
          $(this).remove();
        });

        //button add materi pokok
        var j = 1;
        $('#adds').click(function(){
          j++;
          $('#dynamic_second').append('<input type="text" name="materi[]" class="form-control col-md-11 col-sm-10" id="rows'+j+'" placeholder="materi pokok" style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-1 col-sm-2 btn_remove" id="'+j+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.btn_remove', function(){
          var id = $(this).attr('id');
          $('#rows'+id).remove();
          $(this).remove();
        });

        //dynamic dropdown list nama pelatihan
        $(document).on('change', '#nama_pelatihans', function(){
          var namaPelatihan = $(this).val();
          var mataPelatihan = $('#mata_pelatihans').val();
          var token         = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('diklat.nama.pelatihan')}}",
            data: {namaPelatihan:namaPelatihan, token:token},
            beforeSend: function(){
              beforesend();
            },
            success: function(data){
              $('#mata_pelatihans').html(data);
              $('#alokasi_waktus').html('<option value="" selected >PILIH</option>');
              Swal({
                position: 'center',
                type: 'success',
                title: 'Ok!',
                timer: 1000,
                showConfirmButton: false,
              }); 
            }
          });
        });

        //dynamic dropdown list mata pelatihan
        $(document).on('change', '#mata_pelatihans', function(){
          var mataPelatihan = $(this).val();
          var token         = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('diklat.mata.pelatihan')}}",
            data: {mataPelatihan:mataPelatihan, token:token},
            beforeSend: function(){
              beforesend();
            },
            success: function(data){
              $('#alokasi_waktus').html(data);
              Swal({
                position: 'center',
                type: 'success',
                title: 'Ok!',
                timer: 1000,
                showConfirmButton: false,
              });
            }
          });
        });

        $(document).on('click', '#submit', function(e){
          $('.back').addClass('disabled');
          $(this).attr('disabled', 'disabled');
          $(this).text('Inisialisasi');
          
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
            reverseButtons: true,
            onClose: () => {
              $('.back').removeClass('disabled');
              $('#submit').removeAttr('disabled');
              $('#submit').text('Next');
            }
          }).then((result) => {
            if (result.value) {
              $.ajax({
                method: "POST",
                url: "{{route('diklat.rbpmd.submit')}}",
                data: $('#form_submit').serialize(),
                beforeSend: function(){
                  beforesendrequest();
                  $('.input').each(function(){
                    id = $(this).attr('id');
                    $('#'+id).removeClass('is-invalid');
                  })
                },
                success: function(data){
                  if(data.status == true){
                    $('#submit').attr('disabled', 'disabled');
                    swal({
                      position: 'center',
                      type: 'success',
                      title: "Ok!",
                      showConfirmButton: false,
                      timer: 1000,
                      onClose: () => {
                        window.location.href = "{{route('diklat.rbpmd2.form')}}";
                      }
                    });
                  }else{
                    $('.back').removeClass('disabled');
                    $('#submit').removeAttr('disabled');
                    $('#submit').text('Next');
                    swal(
                      'Oops!!',
                      data.msg+' :)',
                      'error'
                    )
                  }
                },
                error: function(data){
                  $('.back').removeClass('disabled');
                  $('#submit').removeAttr('disabled');
                  $('#submit').text('Next');
                  $.each(data.responseJSON.errors, function(key, val){
                    id = key.replace(/\./g,'_'); // change dot to dashes
                    $('.'+id).addClass('is-invalid');
                    $('#'+id).text(val[0]);
                  });
                  swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Pesan Kesalahan!',
                    html: 'Ada error validasi pada form anda! <br> Silahkan periksa kembali data anda!',
                    showConfirmButton: true,
                    confirmButtonText: 'Mengerti'
                  });
                }

              });
            } else if (
              // Read more about handling dismissals
              result.dismiss === swal.DismissReason.cancel
            ) {
              $('.back').removeClass('disabled');
              $('#submit').removeAttr('disabled');
              $('#submit').text('Next');
              swal(
                'Batal !!',
                'Silahkan Periksa Kembali Data Anda. :)',
                'error'
              )
            }
          });

          e.preventDefault();
        });

      });
    </script>
  </body>
</html>
