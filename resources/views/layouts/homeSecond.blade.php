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
  <body>
    <div class="container-fluid" style="padding:10px;">

      <div class="card">
        <h5 class="card-header text-center">
          RANCANG BANGUN PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form action="#" method="post" id="submit_form">
          <table class="table table-bordered table-responsive-lg table-condensed">
            <thead>
              <tr class="text-center">
                <th >No</th>
                <th class="">Indikator Hasil Belajar</th>
                <th class="">Materi Pokok</th>
                <th class="">Sub Materi Pokok</th>
                <th class="">Metode</th>
                <th class="">Alat <br> Bantu/Media</th>
                <th class="">Teori <span class="text-danger">*</span></th>
                <th class="">Latihan</th>
                <th class="">Lapa <br> ngan </th>
                <th class="">Total <span class="text-danger">*</span></th>
              </tr>
            </thead>
            <tbody>
              @for ($i=0; $i < count($indikator); $i++)
                <tr>
                  <td>{{$i+1}}</td>
                  <td style="width:200px !important;" class="text-center">
                    <ul class="list-group">
                      <li class="list-group">{{$indikator[$i]}}</li>
                    </ul>
                  </td>
                  <td style="width:200px !important;" class="text-center">
                    <ul class="list-group">
                      <li class="list-group">{{$materi[$i]}}</li>
                    </ul>
                  </td>
                  <td style="width:50px !important;">
                    <div class="">
                      <ul class="list-group" id="dynamic_sub_materi_{{$i+1}}" style="padding-left:15px;">

                      </ul>
                    </div>
                    <div class="form-group" style="margin-top:5px;">
                      <div class="form-inline" id="dynamic_sub_materi_">
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_sub_materi" id="addSubMateri_{{$i+1}}" data-index="{{$i+1}}">+</button>
                        <input type="text" class="form-control col-md-10 col-sm-10 row_materi" name="subMateri_{{$i+1}}" id="row{{$i+1}}" placeholder="Sub Materi Pokok">
                      </div>
                      <div class="form-inline" style="margin-top:20px;">
                        <!--<a href="#" class="btn btn-outline-success col-md-12 index_sub_materi" id="saveSubMateri_{{$i+1}}">save</a>-->
                        <a href="#" class="btn btn-outline-danger col-md-12 index_sub_materi" id="editSubMateri_{{$i+1}}" style="display:none;">edit</a>
                      </div>
                    </div>
                  </td>
                  <td style="width:290px !important;">
                    <select class="custom-select mr-sm-2 selectClick" id="metode_{{$i+1}}" style=" margin-top:5px;">
                      <option selected disabled>Pilih...</option>
                      <option value="Ceramah">Ceramah</option>
                      <option value="Brainstorming">Brainstorming</option>
                      <option value="Ice Breaking">Ice Breaking</option>
                      <option value="Presentasi">Presentasi</option>
                      <option value="Tayangan Video">Tayangan Video</option>
                      <option value="Expositori(paparan vasilitator)">Expositori(paparan vasilitator)</option>
                      <option value="Tanya Jawab">Tanya Jawab</option>
                      <option value="Simulasi Games">Simulasi Games</option>
                      <option value="Diskusi Kelompok">Diskusi Kelompok</option>
                      <option value="Diskusi/Latihan">Diskusi/Latihan</option>
                      <option value="Curah Pendapat">Curah Pendapat</option>
                      <option value="Studi Kasus">Studi Kasus</option>
                      <option value="Role Play">Role Play</option>
                      <option value="Menyimpulkan">Menyimpulkan</option>
                    </select>
                    <div class="tampil_metode_{{$i+1}} indexS" data-index="{{$i+1}}" style="margin-top:5px;">

                    </div>
                  </td>
                  <td style="width:250px !important;">
                    <select class="custom-select mr-sm-2 selectClicks" id="media_{{$i+1}}" style=" margin-top:5px;">
                      <option selected disabled>Pilih...</option>
                      <option value="Laptop + LCD">Laptop + LCD</option>
                      <option value="Whiteboard">Whiteboard</option>
                      <option value="Spidol">Spidol</option>
                      <option value="Flipchard">Flipchard</option>
                      <option value="Bahan Ajar">Bahan Ajar</option>
                      <option value="Bahan Tayang">Bahan Tayang</option>
                      <option value="Bahan Peraga">Bahan Peraga</option>
                      <option value="Video">Video</option>
                      <option value="Marker">Marker</option>
                      <option value="Speaker">Speaker</option>
                      <option value="Wifi">Wifi</option>
                    </select>
                    <div class="tampil_media_{{$i+1}}" data-index="{{$i+1}}" style="margin-top:5px;">

                    </div>
                  </td>
                  <td style="width:100px !important;">
                    <input type="text" name="teori[]" class="form-control col-sm-12 text-center index_t teori_{{$i}} input" id="T_{{$i+1}}" placeholder="" value="" data-toggle="tooltip" data-placement="bottom" title="Wajib Di Isi.." style=" margin-top:5px;">
                    <small id="teori_{{$i}}" class="invalid-feedback text-danger">
                  
                    </small>
                  </td>
                  <td style="width:80px !important;">
                    <input type="text" class="form-control col-sm-12 text-center index_l latihan_{{$i}} input" id="L_{{$i+1}}" placeholder="" value="" disabled="disabled" data-toggle="tooltip" data-placement="bottom" title="Wajib Di Isi.." style=" margin-top:5px;">
                    <input type="hidden" name="latihan[]" class="form-control col-sm-12 text-center index_l" id="lats_{{$i+1}}" value="">
                    <small id="latihan_{{$i}}" class="invalid-feedback text-danger">
                  
                    </small>
                  </td>
                  <td style="width:100px !important;">
                    <input type="text" class="form-control col-sm-12 text-center index_lap lapangan_{{$i}} input" id="Lap_{{$i+1}}" placeholder="" value="" disabled="disabled" data-toggle="tooltip" data-placement="bottom" title="Wajib Di Isi.." style=" margin-top:5px;">
                    <input type="hidden" name="lapangan[]" class="form-control col-sm-12 text-center index_laps" id="Laps_{{$i+1}}" value="">
                    <small id="lapangan_{{$i}}" class="invalid-feedback text-danger">
                  
                    </small>
                  </td>
                  <td style="width:100px !important;" id="total_waktu">
                    <input type="text" class="form-control col-sm-12 text-center index_total total_{{$i}} input" id="total{{$i+1}}" disabled="disabled" value="0" style=" margin-top:5px;">
                    <input type="hidden" name="total[]" class="form-control col-sm-12 text-center index_totals" id="totals_{{$i+1}}" value="0">
                    <small id="total_{{$i}}" class="invalid-feedback text-danger">
                  
                    </small>
                  </td>
                </tr>
              @endfor
            </tbody>
          </table>

          <div class="form-group">
            <label for="inputAddress">Referensi</label>
            <div class="form-inline" id="dynamic_second">
              <input type="text" class="form-control col-md-11 input_ref" name="ref[]" id="referensi" placeholder="referensi">
              <button type="button" class="btn btn-outline-success col-md-1 col-sm-2" id="adds">+</button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nip">NIP Pengajar</label>
              <input type="text" class="form-control nip input" name="nip" id="nips" placeholder="NIP">
              <small id="nip" class="invalid-feedback text-danger">
                  
              </small>
            </div>

            <div class="form-group col-md-6">
              <label for="nama">Nama Pengajar</label>
              <input type="text" class="form-control nama input" name="nama" id="namas" placeholder="Nama">
              <small id="nama" class="invalid-feedback text-danger">
                  
              </small>
            </div>
          </div>

          <button type="submit" name="submit" class="btn btn-danger btn-block" id="submit">Submit</button>
          {{ csrf_field() }}
        </form>

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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

        //button add first
        var i = 1;
        var index_s = $('.index_sub_materi');
        index_s.each(function(a){
          a++;

          $('#addSubMateri_'+a).click(function(){
            i++;

            var val   = $('input[name="subMateri_'+a+'"]').val();
            var id    = $(this).attr('data-index');
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Tidak boleh kosong!',
                'info'
              );
            }else{
              $('#dynamic_sub_materi_'+a).append('<li style="list-style:decimal" id="sub'+i+'">'+val+' <input type="hidden" name="submateri[]" value="'+val+'"> <input type="hidden" name="indexsubmateri[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-sub closes_'+i+'" id="'+i+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="subMateri_'+a+'"]').val("");
            }
          });
        });
        $(document).on('click', '.btn-remove-sub', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');

          $('#sub'+id).remove();
          $(this).remove();
        });

        //button add referensi
        var j = 0;
        var ref = $('.input_ref');
        ref.each(function(i){
          i++;
          $('#adds').click(function(){
            j++;
            $('#dynamic_second').append('<input type="text" class="form-control col-md-11 input_ref" name="ref[]" id="rows'+j+'" placeholder="referensi" style="margin-top:5px;"><button type="button" class="btn btn-outline-danger col-md-1 col-sm-2 btn_remove_ref" id="'+j+'" style="margin-top:5px;">x</button>')
          });
        });
        $(document).on('click', '.btn_remove_ref', function(){
          var id = $(this).attr('id');
          $('#rows'+id).remove();
          $(this).remove();
        });

        //select dropdown metode
        var z        = 1;
        var index_mt = $('.selectClick');
        index_mt.each(function(b){
          b++;
          $(document).on('change', '#metode_'+b, function(){
            z++;

            var metode  = [];
            var val     = $(this).val();
            var data    = $('#submit_form').serialize();
            var token   = $('input[name=_token]').val();
            var id      = $('.tampil_metode_'+b).attr('data-index');

            $('.tampil_metode_'+b).append('<li style="list-style:decimal" id="circle'+z+'">'+val+' <input type="hidden" name="metode[]" value="'+val+'">  <input type="hidden" name="indexmetode[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-metode closes_'+z+'" id="'+z+'" style="margin-top:-1px;">x</a><input type="hidden" class="form-control col-md-11 col-sm-10 close" name="metode_'+b+'[]" id="rows'+z+' methods" value="'+val+'"></li>');
            $('input[name="metode_'+b+'[]"]').each(function(){
              metode.push($(this).val());
            });
          });
        });
        $(document).on('click', '.btn-remove-metode', function(e){
          e.preventDefault();

          var id       = $(this).attr('id');
          var token    = $('input[name=_token]').val();
          var id_close = $('.closes_'+id).attr('data-id');

          $('#circle'+id).remove();
          $(this).remove();
        });

        //select dropdown media
        var y = 1;
        var index_md = $('.selectClicks');
        index_md.each(function(c){
          c++;
          $(document).on('change', '#media_'+c, function(){
            y++;

            var media  = [];
            var val     = $(this).val();
            var data    = $('#submit_form').serialize();
            var token   = $('input[name=_token]').val();
            var id      = $('.tampil_media_'+c).attr('data-index');

            $('.tampil_media_'+c).append('<li style="list-style:decimal" id="circles'+y+'">'+val+'  <input type="hidden" name="media[]" value="'+val+'">  <input type="hidden" name="indexmedia[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-media closess_'+y+'" id="'+y+'" style="margin-top:-1px;">x</a><input type="hidden" class="form-control col-md-11 col-sm-10 closess" name="media_'+c+'[]" id="rows'+y+'" value="'+val+'"></li>');
            $('input[name="media_'+c+'[]"]').each(function(){
              media.push($(this).val());
            });
          });
        });
        $(document).on('click', '.btn-remove-media', function(e){
          e.preventDefault();

          var id       = $(this).attr('id');
          var token    = $('input[name=_token]').val();
          var id_close = $('.closess_'+id).attr('data-id');

          $('#circles'+id).remove();
          $(this).remove();
        });

        //input text (T,L,Lap,Total)
        var index_t = $('.index_t');
        index_t.each(function(d){
          d++;
          $('#T_'+d).keyup(function(){
            if($(this).val() != ''){
              $('#L_'+d).removeAttr('disabled');
              $('#L_'+d).keyup(function(){
                $('#lats_'+d).val($('#L_'+d).val());
                if($(this).val() != ''){
                  $('#Lap_'+d).removeAttr('disabled');
                }else{
                  $('#Lap_'+d).attr('disabled', 'disabled');
                  $('#total'+d).val(0);
                  $('#totals_'+d).val(0);
                }
              });
            }else{
              $('#L_'+d).attr('disabled', 'disabled');
              $('#Lap_'+d).attr('disabled', 'disabled');
              $('#total'+d).val(0);
              $('#totals_'+d).val(0);
            }
          });
          $('#Lap_'+d).keyup(function(){
            $('#Laps_'+d).val($('#Lap_'+d).val());
            var i = parseInt($('#T_'+d).val());
            var j = parseInt($('#L_'+d).val());
            var k = parseInt($(this).val());

            var jumlah = (i + j + k);

            if(!isNaN(jumlah)){
              $('#total'+d).val(jumlah);
              $('#totals_'+d).val(jumlah);
            }else{
              $('#total'+d).val(0);
              $('#totals_'+d).val(0);
            }
          });
        });

        $(document).on('click', '#submit', function(e){
          e.preventDefault();
          $(this).attr('disabled','disabled');
          $(this).text('inisialisasi');

          swal({
            title: 'Anda Yakin?',
            text: "Mau Lanjut Ke Form Berikutnya, Pastikan Total Waktu Di Isi!",
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
                method:"POST",
                url:"{{route('diklat.rbpmd2.create.submit')}}",
                data: $('#submit_form').serialize(),
                beforeSend: function(){
                  beforesend();
                  $('.input').each(function(key, val){
                    id = $(this).attr('id');
                    $('#'+id).removeClass('is-invalid');
                  })
                },
                success: function(res){
                  if(res.status == true){
                    $('#submit').text('Submit');
                    swal({
                      position: 'top-right',
                      type: 'success',
                      title: "Good Job!",
                      text: res.msg,
                      showConfirmButton: false,
                      timer: 1000,
                      onClose: () => {
                        window.location.href = "{{route('diklat.home')}}"
                      }
                    });
                    return false;
                  }
                  swal({
                    position: 'center',
                    type: 'info',
                    title: "Pesan Kesalahan!",
                    text: res.msg,
                    showConfirmButton: true,
                    onClose: () => {
                      $('#submit').text('Submit');
                      $('#submit').removeAttr('disabled');
                    }
                  });
                },
                error: function(res){
                  $('#submit').removeAttr('disabled');
                  $('#submit').text('Submit');
                  $.each(res.responseJSON.errors, function(key, val){
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
              $('#submit').removeAttr('disabled');
              $('#submit').text('Submit');
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
  </body>
</html>
