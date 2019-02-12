<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/xeditable.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white back" href="{{route('rbpmd.home')}}">Back</a>
      <p class="text-white mb-1">{{$pengajar}}</p>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">
      <div class="card">
        <h5 class="card-header text-center">
          RANCANG BANGUN PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form action="#" method="post" id="form_duplicate">
            <table class="table table-bordered table-responsive-lg table-condensed">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Indikator Hasil Belajar</th>
                  <th scope="col">Materi Pokok</th>
                  <th scope="col">Sub Materi Pokok</th>
                  <th scope="col">Metode</th>
                  <th scope="col">Media/Alat Bantu</th>
                  <th scope="col">Alokasi Waktu (Menit)</th>
                </tr>
              </thead>
              <tbody>
                  @for($i=0; $i < count($indikator); $i++)
                  <tr class="text-center">
                    <th>{{$i+1}}</th>
                    <td style="width:250px !important;">
                      <li class="li_indikator" data-key="{{$i}}" style="list-style:none">
                          <span data-type="textarea" data-placement="right" data-title="Indikator" id="indikator_{{$i}}">{{$indikator[$i]}}</span>
                          <input type="hidden" name="indikator[]" class="indikator_{{$i}}" value="{{$indikator[$i]}}">
                      </li>
                    </td>
                    <td style="width:250px !important;">
                      <li class="li_materi" data-key="{{$i}}" style="list-style:none">
                        <span data-type="textarea" data-placement="right" data-title="Materi Pokok" id="materi_{{$i}}">{{$materi[$i]}}</span>
                        <input type="hidden" name="materi[]" class="materi_{{$i}}" value="{{$materi[$i]}}">
                      </li>
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify fetch_sub" id="dynamic_sub" data-index="" data-id="" style="padding:0px 10px 10px 10px;">
                        @foreach ($submateri as $key => $value)
                          @if ($value->parent_id_materi == $i+1)
                            <li class="text-left li_submateri" data-id="{{$value->id}}" style="list-style:decimal;">
                              <span data-type="textarea" data-placement="right" data-title="Sub Materi Pokok" id="submateri_{{$value->id}}">{{$value->sub_materi_pokok}}</span>
                              <input type="hidden" name="submateri[]" class="submateri_{{$value->id}}" value="{{$value->sub_materi_pokok}}">
                              <input type="hidden" name="keysubmateri[]" value="{{$i+1}}">
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_metode" id="dynamic_metode" data-index="" data-id="">
                        <div class="collapse show" id="collapseExample">
                          <select class="custom-select mr-sm-2 selectMetode" id="pilih_metode{{$i+1}}" data-id="" data-index="" style="margin-bottom:5px;">
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
                          <div class="card c_metode" id='tampil_met{{$i+1}}'>
                            @foreach($metode as $key => $value)
                              @if($value->parent_id_sub == $i+1)
                                <li class="list-group-item li_metode" data-id="{{$value->id}}">
                                  <span data-type="select" data-placement="bottom" data-title="Metode" id="metode_{{$value->id}}">{{$value->metode}}</span>
                                  <input type="hidden" name="metode[]" class="metode_{{$value->id}}" value="{{$value->metode}}">
                                  <input type="hidden" name="keymetode[]" value="{{$i+1}}">
                                </li>
                              @endif
                            @endforeach
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_metode">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetode{{$i+1}}" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_metode" id="addMetode{{$i+1}}" data-rows="{{$i}}">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_media" id="dynamic_media">
                        <div class="collapse show" id="collapseMedia">
                          <select class="custom-select mr-sm-2 selectMedia" id="pilih_media{{$i+1}}" style="margin-bottom:5px;">
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
                          <div class="card c_media" id='tampil_med{{$i+1}}'>
                            @foreach($media as $key => $value)
                              @if($value->parent_id_metode == $i+1)
                                <li class="list-group-item li_media" data-id="{{$value->id}}">
                                  <span data-type="select" data-placement="bottom" data-title="Media/Alat Bantu" id="media_{{$value->id}}">{{$value->alat_bantu}}</span>
                                  <input type="hidden" name="media[]" class="media_{{$value->id}}" value="{{$value->alat_bantu}}">
                                  <input type="hidden" name="keymedia[]" value="{{$i+1}}">
                                </li>
                              @endif
                            @endforeach
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_media">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMedia{{$i+1}}" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_media" id="addMedia{{$i+1}}" data-rows="{{$i+1}}">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </td>
                    <td style="width:100px !important;">
                      <div class="form-group">
                        <div class="li_waktu" id="dynamic_first">
                          <input type="text" class="form-control text-center waktu_{{$i}} input waktu_total" name="waktu[]" id="waktu{{$i+1}}" value="{{$waktu[$i]}}">
                          <small id="waktu_{{$i}}" class="invalid-feedback text-danger text-lg-left">
                            
                          </small>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endfor
                <tr>
                  <td colspan="6">Akumulasi Waktu</td>
                  <td class="text-center text-danger"><b id="total">{{$total->sum()}}</b></td>
                </tr>
              </tbody>
            </table>
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

            <button type="button" name="button" class="btn btn-danger btn-block" id="duplicate">Duplicate</button>
            <input type="hidden" name="id" value="{{$id}}">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/xeditable.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
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

        $(document).on('click', '.li_indikator', function(e){
          let key = $(this).attr('data-key');
          $('#indikator_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('.indikator_'+key).val(newValue);
            }
          });
          e.preventDefault();
        });

        $(document).on('click', '.li_materi', function(e){
          let key = $(this).attr('data-key');
          $('#materi_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('.materi_'+key).val(newValue);
            }
          });
          e.preventDefault();
        });

        $(document).on('click', '.li_submateri', function(e){
          let key = $(this).attr('data-id');
          $('#submateri_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('.submateri_'+key).val(newValue);
            }
          });
          e.preventDefault();
        });

        $(document).on('click', '.li_metode', function(e){
          let key = $(this).attr('data-id');
          $('#metode_'+key).editable({
            source: [
              {value: "Ceramah", text: "Ceramah"},
              {value: "Brainstorming", text: "Brainstorming"},
              {value: "Ice Breaking", text: "Ice Breaking"},
              {value: "Presentasi", text: "Presentasi"},
              {value: "Expositori(paparan vasilitator)", text: "Expositori(paparan vasilitator)"},
              {value: "Tanya Jawab", text: "Tanya Jawab"},
              {value: "Tayangan Video", text: "Tayangan Video"},
              {value: "Simulasi Games", text: "Simulasi Games"},
              {value: "Diskusi Kelompok", text: "Diskusi Kelompok"},
              {value: "Diskusi/Latihan", text: "Diskusi/Latihan"},
              {value: "Curah Pendapat", text: "Curah Pendapat"},
              {value: "Studi Kasus", text: "Studi Kasus"},
              {value: "Role Play", text: "Role Play"},
              {value: "Menyimpulkan", text: "Menyimpulkan"}
            ],
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('.metode_'+key).val(newValue);
            }
          });
          e.preventDefault();
        });

        let row = 0;
        let lainmetode = $('.fetch_metode');
        lainmetode.each(function(i){
          i++; row++;
          
          // select metode duplicate
          $(document).on('change', '#pilih_metode'+i, function(e){
            let val = $(this).val();
            $('#tampil_met'+i+'').append('<li class="list-group-item text-left" id="selectMetode'+i+'_'+row+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="metode[]" value="'+val+'"><input type="hidden" name="keymetode[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMetode" id="'+i+'_'+row+'" style="margin-top:-1px;">x</a></li>');
          });

          // add metode duplicate
          $(document).on('click', '#addMetode'+i, function(e){
            let val = $('input[name="lainMetode'+i+'"]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Metode Tidak Boleh Kosong!',
                'info'
              );
            }else{
              $('#tampil_met'+i+'').append('<li class="list-group-item text-left" id="addMetode'+i+'_'+row+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="metode[]" value="'+val+'"><input type="hidden" name="keymetode[]" value="'+i+'"><a href="#" class="text-danger close removeAddMetode" id="'+i+'_'+row+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="lainMetode'+i+'"]').val("");
            }
          });
        });
        $(document).on('click', '.removeAddMetode', function(e){
          let id = $(this).attr('id');
          $('#addMetode'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMetode', function(e){
          let id = $(this).attr('id');
          $('#selectMetode'+id).remove();

          e.preventDefault();
        });

        $(document).on('click', '.li_media', function(e){
          let key = $(this).attr('data-id');
          $('#media_'+key).editable({
            source: [
              {value: "Laptop + LCD", text: "Laptop + LCD"},
              {value: "Whiteboard", text: "Whiteboard"},
              {value: "Spidol", text: "Spidol"},
              {value: "Flipchard", text: "Flipchard"},
              {value: "Bahan Ajar", text: "Bahan Ajar"},
              {value: "Bahan Tayang", text: "Bahan Tayang"},
              {value: "Bahan Peraga", text: "Bahan Peraga"},
              {value: "Video", text: "Video"},
              {value: "Marker", text: "Marker"},
              {value: "Speaker", text: "Speaker"},
              {value: "Wifi", text: "Wifi"}
            ],
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('.media_'+key).val(newValue);
            }
          });
          e.preventDefault();
        });
        
        let rows = 0;
        let lainmedia = $('.fetch_media');
        lainmedia.each(function(i){
          i++; rows++;
          
          // select metode duplicate
          $(document).on('change', '#pilih_media'+i, function(e){
            let val = $(this).val();
            $('#tampil_med'+i+'').append('<li class="list-group-item text-left" id="selectMedia'+i+'_'+rows+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="media[]" value="'+val+'"><input type="hidden" name="keymedia[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMedia" id="'+i+'_'+rows+'" style="margin-top:-1px;">x</a></li>');
          });

          // add metode duplicate
          $(document).on('click', '#addMedia'+i, function(e){
            let val = $('input[name="lainMedia'+i+'"]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Media Tidak Boleh Kosong!',
                'info'
              );
            }else{
              $('#tampil_med'+i+'').append('<li class="list-group-item text-left" id="addMedia'+i+'_'+rows+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="media[]" value="'+val+'"><input type="hidden" name="keymedia[]" value="'+i+'"><a href="#" class="text-danger close removeAddMedia" id="'+i+'_'+rows+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="lainMedia'+i+'"]').val("");
            }
          });
        });
        $(document).on('click', '.removeAddMedia', function(e){
          let id = $(this).attr('id');
          $('#addMedia'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMedia', function(e){
          let id = $(this).attr('id');
          $('#selectMedia'+id).remove();

          e.preventDefault();
        });
        
        // total akumulasi waktu
        $(document).on('keyup', '.waktu_total', function(e){
          let waktu = $('.waktu_total');
          let total = 0;
          for(let i=0; i < waktu.length; i++){
            if(parseInt(waktu[i].value))
              total += parseInt(waktu[i].value);
          }
          $('#total').html(total);

          e.preventDefault();
        });

        // submit form duplicate
        $(document).on('click', '#duplicate', function(e){
          $('.back').addClass('disabled');
          $(this).attr('disabled', 'disabled');
          $(this).text('Inisialisasi');

          $.ajax({
            url: "{{route('duplicate.submit')}}",
            method: "POST",
            data: $('#form_duplicate').serialize(),
            beforeSend: function(){
              beforesendrequest();
              $('.input').each(function(key, val){
                id = $(this).attr('id');
                $('#'+id).removeClass('is-invalid');
                $('#nips').removeClass('is-invalid');
                $('#namas').removeClass('is-invalid');
              })
            },
            success: function(res){
              $('.back').removeClass('disabled');
              $('#duplicate').text('Duplicate');
              swal({
                position: 'top-right',
                type: 'success',
                title: 'Berhasil Duplicate',
                showConfirmButton: false,
                timer: 1000,
                onClose: () => {
                  window.location.href = "{{route('rbpmd.home')}}"
                }
              });
            },
            error: function(res){
              $('.back').removeClass('disabled');
              $('#duplicate').removeAttr('disabled');
              $('#duplicate').text('Duplicate');
              swal(
                'Oops !!',
                'Ada error validasi pada form duplicate, Silahkan cek form duplicate anda!',
                'error'
              )
              $.each(res.responseJSON.errors, function(key,val){
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
  </body>
</html>
