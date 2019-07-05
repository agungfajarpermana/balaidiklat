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
      <a class="navbar-brand mx-auto d-block" href="#">
        <img src="{{asset('image/garuda.png')}}" class="rounded" width="40" height="40" alt="">
      </a>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">

      <div class="card">
        <h5 class="card-header text-center">
          RENCANA PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form class="" action="#" method="post" id="form_rp_lanjut">
            <table class="table table-bordered table-responsive-lg table-condensed">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Tahapan Kegiatan</th>
                  <th scope="col">Kegiatan Fasilitator</th>
                  <th scope="col">Kegiatan Peserta</th>
                  <th scope="col">Metode</th>
                  <th scope="col">Media/Alat Bantu</th>
                  <th scope="col">Alokasi Waktu (Menit)</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>1</th>
                  <td style="width:300px !important;">
                    Pendahuluan
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penda_fasilitas" style="padding:10px;">

                    </ul>
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_fasilitas_">
                        <textarea class="form-control col-md-10 col-sm-10" name="fasilitor" id="fasilitor" rows="2"></textarea>
                        <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPendaFasilitas" style="margin-top:-1px;height:62px;">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penda_peserta" style="padding:10px;">

                    </ul>
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_peserta_">
                        <textarea class="form-control col-md-10 col-sm-10" name="peserta" id="peserta" rows="2"></textarea>
                        <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPendPeserta" style="margin-top:-1px;height:62px;">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <select class="custom-select mr-sm-2 selectMetode" id="penda_metode">
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
                    <div class="text-left tampil_penda_metode" style="margin-top:5px;">

                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <select class="custom-select mr-sm-2 selectMedia" id="penda_media">
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
                    <div class="tampil_penda_media text-left" style="margin-top:5px;">

                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control text-center waktu_0 input" name="waktu[]" id="waktu0" placeholder="0" value="">
                        <small id="waktu_0" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                </tr>

                @foreach ($data as $key => $value)
                  <tr class="text-center">
                    <th>{{$key+2}}</th>
                    <td style="width:300px !important;">
                      {{$value}}
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify" id="dynamic_fasilitas_{{$key+1}}" style="padding:10px;">

                      </ul>
                      <div class="form-group" style="margin-top:5px;">
                        <div class="form-inline">
                          <textarea class="form-control col-md-10 col-sm-10" name="fasilitor_{{$key+1}}[]" id="fasilitor"></textarea>
                          <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                          <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addFasilitator_{{$key+1}}" data-rows="{{$key+1}}" style="margin-top:-1px;height:62px;">+</button>
                        </div>
                      </div>
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify" id="dynamic_peserta_{{$key+1}}" style="padding:10px;">

                      </ul>
                      <div class="form-group" style="margin-top:5px;">
                        <div class="form-inline">
                          <textarea class="form-control col-md-10 col-sm-10" name="peserta_{{$key+1}}" id="peserta" rows="2"></textarea>
                          <!--<input type="text" class="form-control col-md-10 col-sm-10" name="peserta[]"  id="peserta" placeholder="Kegiatan Peserta">-->
                          <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_peserta" id="addPeserta_{{$key+1}}" data-rows="{{$key+1}}" style="margin-top:-1px;height:62px;">+</button>
                        </div>
                      </div>
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_metode">
                        <div class="collapse show" id="collapseExample{{$key+1}}">
                          <div class="card c_metode" id='tampil_met{{$key+1}}' data-index="{{$key+1}}">

                          </div>
                        </div>
                      </ul>
                      <div class="form-group" style="margin-top:5px;">
                        <div class="form-inline" id="dynamic_metode_{{$key+1}}">
                          <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetode_{{$key+1}}" id="sub_materi_pokok" placeholder="Lain - Lain...">
                          <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_metode" id="addMetode_{{$key+1}}" data-rows="{{$key+1}}">+</button>
                        </div>
                        <div class="form-inline">
                          <button type="button" class="btn btn-outline-info col-md-12 col-sm-12 l_index_metode" id="saveMetode_{{$key+1}}" data-rows="{{$key+1}}" style="margin-top:10px;display:none;">save</button>
                        </div>
                      </div>
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_media">
                        <div class="collapse show" id="collapseMedia{{$key+1}}">
                          <div class="card c_media" id='tampil_med{{$key+1}}' data-index="{{$key+1}}">

                          </div>
                        </div>
                      </ul>
                      <div class="form-group" style="margin-top:5px;">
                        <div class="form-inline" id="dynamic_media_{{$key+1}}">
                          <input type="text" class="form-control col-md-10 col-sm-10" name="lainMedia_{{$key+1}}"  id="sub_materi_pokok" placeholder="Lain - Lain...">
                          <button type="button" class="btn btn-outline-success col-md-2 col-sm-2  index_media" id="addMedia_{{$key+1}}" data-rows="{{$key+1}}">+</button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="" id="dynamic_first">
                          <input type="text" class="form-control text-center waktu_{{$key+1}} input" name="waktu[]" id="waktu{{$key+1}}" placeholder="0" value="">
                          <small id="waktu_{{$key+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                          </small>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach

                <tr class="text-center">
                  <th>{{$no+2}}</th>
                  <td style="width:300px !important;">
                    Penutup
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_fasilitas" style="padding:10px;">

                    </ul>
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_fasilitas">
                        <textarea class="form-control col-md-10 col-sm-10" name="fasilitor_p" id="fasilitor_p" rows="2"></textarea>
                        <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPenutupFasilitator" data-index="{{$no+1}}" style="margin-top:-1px;height:62px;">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_peserta" style="padding:10px;">

                    </ul>
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_fasilitas_">
                        <textarea class="form-control col-md-10 col-sm-10" name="peserta_p" id="peserta" rows="2"></textarea>
                        <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_peserta" id="addPenutupPeserta" data-index="{{$no+1}}" style="margin-top:-1px;height:62px;">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <select class="custom-select mr-sm-2 selectMetodePen" id="penutup_metode" data-index="{{$no+1}}">
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
                    <div class="tampil_penutup_metode indexS" data-index="{{$key}}" style="margin-top:5px;">

                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <select class="custom-select mr-sm-2 selectMediaPen" id="penutup_media" data-index="{{$no+1}}">
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
                    <div class="tampil_penutup_media indexS" data-index="{{$key}}" style="margin-top:5px;">

                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control text-center waktu_{{$no+1}} input" name="waktu[]"  id="waktu{{$no+1}}" placeholder="0" value="">
                        <small id="waktu_{{$no+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-danger btn-block" id="submit_form">Next</button>
            {{ csrf_field() }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

        //menampilkan data metode otomatis
        var o = 0;
        var list_mtd = $('.fetch_metode');
        list_mtd.each(function(l){
          o++;
          l++;

          var index  = $('#tampil_met'+o).attr('data-index');
          var token   = $('input[name=_token]').val();

          $.ajax({
            method: 'POST',
            url: "{{route('rppmd.metode')}}",
            data: {index:index,token:token},
            success: function(data){
              if(data.id == index){
                $('#tampil_met'+l).html(data.isi);
              }
            }
          });
        });

        //pendahuluan fasilitator
        var fx = 1;
        $(document).on('click', '#addPendaFasilitas', function(){
          fx++;

          var val   = $('textarea[name="fasilitor"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kosong!',
              'info'
            );
          }else{
            $('#tampil_penda_fasilitas').append('<li style="list-style:decimal;" id="circle_f_'+fx+'">'+val+' <input type="hidden" name="fasilitaspenda[]" value="'+val+'"> <input type="hidden" name="keyfasilitaspenda[]" value="0"> <a href="#" class="text-danger close btn-remove-fas close_f_'+fx+'" id="'+fx+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="fasilitor"]').val("");
          }
        });
        $(document).on('click', '.btn-remove-fas', function(e){
          e.preventDefault();

          // var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle_f_'+ids).remove();
          $(this).remove();
        });

        //penutup fasilitator
        var pf = 1;
        $(document).on('click', '#addPenutupFasilitator', function(){
          pf++;

          var val   = $('textarea[name="fasilitor_p"]').val();
          var id    = $(this).attr('data-index');
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kosong!',
              'info'
            );
          }else{
            $('#tampil_penutup_fasilitas').append('<li style="list-style:decimal;" id="circle_pf_'+pf+'">'+val+' <input type="hidden" name="fasilitaspenutup[]" value="'+val+'"> <input type="hidden" name="keyfasilitaspenutup[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-pen-fas close_pf_'+pf+'" id="'+pf+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="fasilitor_p"]').val("");
          }
        });
        $(document).on('click', '.btn-remove-pen-fas', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle_pf_'+ids).remove();
          $(this).remove();
        });

        //pendahuluan peserta
        var fp = 1;
        $(document).on('click', '#addPendPeserta', function(){
          fp++;

          var val   = $('textarea[name="peserta"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kosong!',
              'info'
            );
          }else{
            $('#tampil_penda_peserta').append('<li style="list-style:decimal;" id="circle_p_'+fp+'">'+val+' <input type="hidden" name="pesertapenda[]" value="'+val+'"> <input type="hidden" name="keypesertapenda[]" value="0"> <a href="#" class="text-danger close btn-remove-pes close_p_'+fp+'" id="'+fp+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="peserta"]').val("");
          }
        });
        $(document).on('click', '.btn-remove-pes', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle_p_'+ids).remove();
          $(this).remove();
        });

        //penutup peserta
        var pp = 1;
        $(document).on('click', '#addPenutupPeserta', function(){
          pp++;

          var val   = $('textarea[name="peserta_p"]').val();
          var id    = $(this).attr('data-index');
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Tidak boleh kosong!',
              'info'
            );
          }else{
            $('#tampil_penutup_peserta').append('<li style="list-style:decimal;" id="circle_pp'+pp+'">'+val+' <input type="hidden" name="pesertapenutup[]" value="'+val+'"> <input type="hidden" name="keypesertapenutup[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-pen-pess closes_pp'+pp+'" id="'+pp+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="peserta_p"]').val("");
          }
        });
        $(document).on('click', '.btn-remove-pen-pess', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle_pp'+ids).remove();
          $(this).remove();
        });

        //select dropdown pendahuluan metode
        var idm = 1;
        $(document).on('change', '#penda_metode', function(){
          idm++;

          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penda_metode').append('<li class="list-group-item" id="circle'+idm+'">'+val+' <input type="hidden" name="metodependa[]" value="'+val+'"> <input type="hidden" name="keymetodependa[]" value="0"> <a href="#" class="text-danger close btn-remove-metode closes_'+idm+'" id="'+idm+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '.btn-remove-metode', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle'+ids).remove();
          $(this).remove();
        });

        //select dropdown penutup metode
        var ipm = 1;
        $(document).on('change', '#penutup_metode', function(){
          ipm++;

          var val   = $(this).val();
          var id    = $(this).attr('data-index');
          var token = $('input[name=_token]').val();

          $('.tampil_penutup_metode').append('<li class="list-group-item text-left" id="circle'+ipm+'">'+val+' <input type="hidden" name="metodepenutup[]" value="'+val+'"> <input type="hidden" name="keymetodepenutup[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-penutup-metode close_p_m'+ipm+'" id="'+ipm+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '.btn-remove-penutup-metode', function(e){
          e.preventDefault();

          // var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle'+ids).remove();
          $(this).remove();
        });

        //menampilkan data media otomatis
        var q = 0;
        var list_mda = $('.fetch_media');
        list_mda.each(function(p){
          q++;
          p++;

          var index = $('#tampil_med'+q).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.media')}}",
            data: {index:index,token:token},
            success: function(data){
              if(data.id == index){
                $('#tampil_med'+p).html(data.isi);
              }
            }
          });
        });

        //select dropdown pendahuluan media
        var id_m = 1;
        $(document).on('change', '#penda_media', function(){
          id_m++;

          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penda_media').append('<li class="list-group-item" id="circles'+id_m+'">'+val+' <input type="hidden" name="mediapenda[]" value="'+val+'"> <input type="hidden" name="keymediapenda[]" value="0"> <a href="#" class="text-danger close btn-remove-media closess_'+id_m+'" id="'+id_m+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '.btn-remove-media', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circles'+ids).remove();
          $(this).remove();
        });

        //select dropdown penutup media
        var ipd = 1;
        $(document).on('change', '#penutup_media', function(){
          ipd++;

          var val   = $(this).val();
          var id    = $(this).attr('data-index');
          var token = $('input[name=_token]').val();

          $('.tampil_penutup_media').append('<li class="list-group-item text-left" id="circle'+ipd+'">'+val+' <input type="hidden" name="mediapenutup[]" value="'+val+'"> <input type="hidden" name="keymediapenutup[]" value="'+id+'"> <a href="#" class="text-danger close btn-remove-penutup-media close_'+ipd+'" id="'+ipd+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '.btn-remove-penutup-media', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#circle'+ids).remove();
          $(this).remove();
        });

        //button fasilitator
        var i       = 1;
        var index_f = $('.index_fasilitator');
        index_f.each(function(a){
          a++;
          $('#addFasilitator_'+a).click(function(){
            i++;

            var val   = $('textarea[name="fasilitor_'+a+'[]"]').val();
            var id    = $(this).attr('data-rows');
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Tidak boleh kosong!',
                'info'
              );
            }else{
              $('#dynamic_fasilitas_'+a).append('<li class="" id="rowFasilitas'+i+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="fasilitas[]" value="'+val+'"> <input type="hidden" name="keyfasilitas[]" value="'+id+'"> <a href="#" class="text-danger close removeFasilitas remove_f_'+i+'" id="'+i+'" style="margin-top:-1px;">x</a></li>');
              $('textarea[name="fasilitor_'+a+'[]"]').val("");
            }
          });
          $(document).on('click', '.removeFasilitas', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowFasilitas'+id).remove();
            $(this).remove();
          });
        });

        //button peserta
        var j       = 1;
        var index_p = $('.index_peserta');
        index_p.each(function(b){
          b++;
          $('#addPeserta_'+b).click(function(){
            j++;

            var val   = $('textarea[name="peserta_'+b+'"]').val();
            var id    = $(this).attr('data-rows');
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Tidak boleh kosong!',
                'info'
              );
            }else{
              $('#dynamic_peserta_'+b).append('<li class="" id="rowPeserta'+j+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="peserta[]" value="'+val+'"> <input type="hidden" name="keypeserta[]" value="'+id+'"> <a href="#" class="text-danger close removePeserta remove_p_'+j+'" id="'+j+'" style="margin-top:-1px;">x</a></li>');
              $('textarea[name="peserta_'+b+'"]').val("");
            }
          });
          $(document).on('click', '.removePeserta', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowPeserta'+id).remove();
            $(this).remove();
          });
        });

        //button metode
        var v = 1;
        var index_m = $('.index_metode');
        index_m.each(function(c){
          c++;
          $('#addMetode_'+c).click(function(){
            v++;

            var val   = $('input[name="lainMetode_'+c+'"]').val();
            var id    = $(this).attr('data-rows');
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Tidak boleh kosong!',
                'info'
              );
            }else{
              $('#tampil_met'+c).append('<li class="list-group-item" id="rowMetodeFirst_'+v+'">'+val+' <input type="hidden" name="metode[]" value="'+val+'"> <input type="hidden" name="keymetode[]" value="'+id+'"> <a href="#" class="text-danger close removeMetodeFirst remove_m_'+v+'" id="'+v+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="lainMetode_'+c+'"]').val("");
            }
          });
          $(document).on('click', '.removeMetodeFirst', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowMetodeFirst_'+id).remove();
            $(this).remove();
          });
        });

        //button media
        var z = 1;
        var index_md = $('.index_media');
        index_md.each(function(d){
          d++;
          $('#addMedia_'+d).click(function(){
            z++;

            var val = $('input[name="lainMedia_'+d+'"]').val();
            var id      = $(this).attr('data-rows');
            var token   = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Tidak boleh kosong!',
                'info'
              );
            }else{
              //$('#dynamic_media_'+d).append('<input type="text" name="lainMedia_'+d+'[]" class="form-control col-md-10 col-sm-10" id="rowMedia'+z+'" placeholder="Lain - Lain..." style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-2 col-sm-2 removeMedia" id="'+z+'" style="margin-top:5px;">x</button>')
              $('#tampil_med'+d).append('<li class="list-group-item" id="rowMediaFirst_'+z+'">'+val+' <input type="hidden" name="media[]" value="'+val+'"> <input type="hidden" name="keymedia[]" value="'+id+'"> <a href="#" class="text-danger close removeMediaFirst remove_md_'+z+'" id="'+z+'" style="margin-top:-1px;">x</a></li>')
              $('input[name="lainMedia_'+d+'"]').val("");
            }
          });
          $(document).on('click', '.removeMediaFirst', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowMediaFirst_'+id).remove();
            $(this).remove();
          });
        });

        //submit form
        $(document).on('click', '#submit_form', function(e){
          $(this).attr('disabled', 'disabled');
          $(this).text('inisialisasi');

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
              $('#submit_form').removeAttr('disabled');
              $('#submit_form').text('Next');
            }
          }).then((result) => {
            if (result.value) {
              $.ajax({
                method: "POST",
                url: "{{route('rppmd.next')}}",
                data: $('#form_rp_lanjut').serialize(),
                beforeSend: function(){
                  beforesendrequest();
                  $('.input').each(function(key, val){
                    id = $(this).attr('id');
                    $('#'+id).removeClass('is-invalid');
                  })
                },
                success: function(data){
                  $('#submit_form').attr('disabled','disabled');
                  $('#submit_form').text('Next');
                  Swal({
                    position: 'center',
                    type: 'success',
                    title: 'Ok!',
                    showConfirmButton: false,
                    timer: 800,
                    onClose: () => {
                      window.location.href = "{{route('rppmd.submit.next')}}";
                    }
                  });
                },
                error: function(res){
                  $('#submit_form').removeAttr('disabled');
                  $('#submit_form').text('Next');
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
              $('#submit_form').removeAttr('disabled');
              $('#submit_form').text('Next');
              swal(
                'Batal !!',
                'Silahkan Periksa Kembali Data Anda. :)',
                'warning'
              )
            }
          });
          e.preventDefault();
        });
      });
    </script>
