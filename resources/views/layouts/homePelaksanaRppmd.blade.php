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
    <link rel="stylesheet" href="{{asset('css/bootstrap2-toggle.min.css')}}">

    <style>
      .slow .toggle-group { transition: left 0.7s; -webkit-transition: left 0.7s; }
    </style>
    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white" href="/diklat/pelaksana-rppmd">Back</a>
      <p class="text-white mb-1">{{$pengajar}}</p>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">
      <div class="card">
        <h5 class="card-header text-center">
          RENCANA PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form action="#" method="post" id="form_submit">
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
                  @if (Auth::user())
                    @if (Auth::user()->status == 2)
                      <th scope="col">Check List</th>
                    @endif
                  @endif
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>1</th>
                  <td style="width:300px !important;">
                    Pendahuluan
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left fecth_penda_fasilitas" id="tampil_penda_fasilitas" style="padding-left:15px;">
                      @foreach ($fasilitas as $key => $value)
                        <li class="text-left" style="list-style:decimal;">{{$value->kegiatan_fasilitator}}</li>
                      @endforeach
                    </ul>
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <div class="form-group">
                          <div class="form-inline" id="dynamic_fasilitas_">
                            <textarea class="form-control col-md-10 col-sm-10" name="fasilitor" id="fasilitor" rows="2"></textarea>
                            <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                            <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPendaFasilitas" data-id="{{$id}}" style="margin-top:-1px;height:62px;">+</button>
                          </div>
                        </div>
                      @endif
                    @endif
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left fecth_penda_peserta" id="tampil_penda_peserta" data-id="{{$id}}" style="padding-left:15px;">
                      @foreach ($peserta as $key => $value)
                        <li class="text-left" style="list-style:decimal;">{{$value->kegiatan_peserta}}</li>
                      @endforeach
                    </ul>
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <div class="form-group">
                          <div class="form-inline" id="dynamic_peserta_">
                            <textarea class="form-control col-md-10 col-sm-10" name="peserta" id="peserta" rows="2"></textarea>
                            <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                            <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPendPeserta" data-id="{{$id}}" style="margin-top:-1px;height:62px;">+</button>
                          </div>
                        </div>
                      @endif
                    @endif
                  </td>
                  <td style="width:300px !important;">
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <select class="custom-select mr-sm-2 selectMetode" id="penda_metode" data-id="{{$id}}">
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
                      @endif
                    @endif
                    <div class="text-left" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <div class="card tampil_penda_metode">
                            @foreach ($metode as $key => $value)
                              <li class="list-group-item">{{$value->metode}}</li>
                            @endforeach
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <select class="custom-select mr-sm-2 selectMedia" id="penda_media" data-id="{{$id}}">
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
                      @endif
                    @endif
                    <div class="text-left" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <div class="card tampil_penda_media">
                            @foreach ($media as $key => $value)
                              <li class="list-group-item">{{$value->alat_bantu}}</li>
                            @endforeach
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control text-center waktu_0 input" {{(Auth::user()) ? '' : 'disabled="disabled"'}} name="waktu[]" id="waktu0" placeholder="" value="{{$waktu_h}}">
                        <small id="waktu_0" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                  @if (Auth::user())
                    @if (Auth::user()->status == 2)
                      <td>
                        <input type="checkbox" name="list[]" id="toggle-event-pendahuluan" {{($check_h == "V") ? 'checked' : ''}} data-toggle="toggle" data-on="On" data-off="Off" data-style="slow" data-onstyle="info" data-offstyle="danger" data-size="normal" data-height="40" data-width="70" value="{{$check_h}}">
                        <input type="hidden" name="check[]" id="check_penda" value="{{$check_h}}">
                      </td>
                    @endif
                  @endif
                </tr>

                @for ($i=0; $i < count($materi); $i++)
                  <tr class="text-center">
                    <th>{{$i+2}}</th>
                    <td style="width:300px !important;">
                      {{$materi[$i]}}
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark fetch_fasilitas" id="dynamic_fasilitas{{$i+1}}" data-index="{{$i+1}}" data-id="{{$id}}" style="padding-left:15px;">

                      </ul>
                      @if (Auth::user())
                        @if (Auth::user()->status == 1)
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline">
                              <textarea class="form-control col-md-10 col-sm-10" name="fasilitor{{$i+1}}" id="fasilitor"></textarea>
                              <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addFasilitator{{$i+1}}" data-rows="{{$i+1}}" style="margin-top:-1px;height:62px;">+</button>
                            </div>
                          </div>
                        @endif
                      @endif
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify fetch_peserta" id="dynamic_peserta{{$i+1}}" data-index="{{$i+1}}" data-id="{{$id}}" style="padding-left:15px;">

                      </ul>
                      @if (Auth::user())
                        @if (Auth::user()->status == 1)
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline">
                              <textarea class="form-control col-md-10 col-sm-10" name="peserta{{$i+1}}" id="peserta" rows="2"></textarea>
                              <!--<input type="text" class="form-control col-md-10 col-sm-10" name="peserta[]"  id="peserta" placeholder="Kegiatan Peserta">-->
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_peserta" id="addPeserta{{$i+1}}" data-rows="{{$i+1}}" style="margin-top:-1px;height:62px;">+</button>
                            </div>
                          </div>
                        @endif
                      @endif
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_metode">
                        <div class="collapse show" id="collapseExample">
                          <div class="card c_metode" id='tampil_met{{$i+1}}' data-id="{{$id}}" data-index="{{$i+1}}">

                          </div>
                        </div>
                      </ul>
                      @if (Auth::user())
                        @if (Auth::user()->status == 1)
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="dynamic_metode">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetode{{$i+1}}" id="sub_materi_pokok" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_metode" id="addMetode{{$i+1}}" data-id="{{$id}}" data-rows="{{$i+1}}">+</button>
                            </div>
                          </div>
                        @endif
                      @endif
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_media">
                        <div class="collapse show" id="collapseMedia">
                          <div class="card c_media" id='tampil_med{{$i+1}}' data-id="{{$id}}" data-index="{{$i+1}}">

                          </div>
                        </div>
                      </ul>
                      @if (Auth::user())
                        @if (Auth::user()->status == 1)
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="dynamic_media">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMedia{{$i+1}}"  id="sub_materi_pokok" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2  index_media" id="addMedia{{$i+1}}" data-id="{{$id}}" data-rows="{{$i+1}}">+</button>
                            </div>
                          </div>
                        @endif
                      @endif
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="" id="dynamic_first">
                          <input type="text" class="form-control text-center waktu_{{$i+1}} input" {{(Auth::user()) ? '' : 'disabled="disabled"'}} name="waktu[]"  id="waktu{{$i+1}}" placeholder="" value="{{$waktu_a[$i]}}">
                          <small id="waktu_{{$i+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                          </small>
                        </div>
                      </div>
                    </td>
                    @if (Auth::user())
                      @if (Auth::user()->status == 2)
                        <td>
                          <input type="checkbox" name="list[]" {{($check[$i] == 'V') ? 'checked' : ''}} class="checkList" id="toggle-event-index{{$i+1}}" data-toggle="toggle" data-on="On" data-off="Off" data-style="slow" data-onstyle="info" data-offstyle="danger" data-size="normal" data-height="40" data-width="70" value="{{$check[$i]}}">
                          <input type="hidden" name="check[]" id="check_{{$i+1}}" value="{{$check[$i]}}">
                        </td>
                      @endif
                    @endif
                  </tr>
                @endfor

                <tr class="text-center">
                  <th>{{count($materi)+2}}</th>
                  <td style="width:300px !important;">
                    Penutup
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_fasilitas" style="padding-left:15px;">
                      @foreach ($fasilitas1 as $key => $value)
                        <li class="text-left" style="list-style:decimal;">{{$value->kegiatan_fasilitator}}</li>
                      @endforeach
                    </ul>
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <div class="form-group">
                          <div class="form-inline" id="dynamic_fasilitas">
                            <textarea class="form-control col-md-10 col-sm-10" name="fasilitor_p" id="fasilitor_p" rows="2"></textarea>
                            <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                            <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_fasilitator" id="addPenutupFasilitator" data-id="{{$id}}" data-index="{{count($materi)+1}}" style="margin-top:-1px;height:62px;">+</button>
                          </div>
                        </div>
                      @endif
                    @endif
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_peserta" style="padding-left:15px;">
                      @foreach ($peserta1 as $key => $value)
                        <li class="text-left" style="list-style:decimal;">{{$value->kegiatan_peserta}}</li>
                      @endforeach
                    </ul>
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <div class="form-group">
                          <div class="form-inline" id="dynamic_fasilitas_">
                            <textarea class="form-control col-md-10 col-sm-10" name="peserta_p" id="peserta" rows="2"></textarea>
                            <!--<input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]" id="fasilitor" placeholder="Kegiatan Fasilitator">-->
                            <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_peserta" id="addPenutupPeserta" data-id="{{$id}}" data-index="{{count($materi)+1}}" style="margin-top:-1px;height:62px;">+</button>
                          </div>
                        </div>
                      @endif
                    @endif
                  </td>
                  <td style="width:150px !important;">
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <select class="custom-select mr-sm-2 selectMetodePen" id="penutup_metode" data-id="{{$id}}" data-index="{{count($materi)+1}}">
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
                      @endif
                    @endif
                    <div class="indexS" data-index="" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <div class="card tampil_penutup_metode">
                            @foreach ($metode1 as $key => $value)
                              <li class="list-group-item">{{$value->metode}}</li>
                            @endforeach
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    @if (Auth::user())
                      @if (Auth::user()->status == 1)
                        <select class="custom-select mr-sm-2 selectMediaPen" id="penutup_media" data-id="{{$id}}" data-index="{{count($materi)+1}}">
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
                      @endif
                    @endif
                    <div class="indexS" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <div class="card tampil_penutup_media">
                            @foreach ($media1 as $key => $value)
                              <li class="list-group-item">{{$value->alat_bantu}}</li>
                            @endforeach
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control text-center waktu_{{$i+1}} input" {{(Auth::user()) ? '' : 'disabled="disabled"'}} name="waktu[]"  id="waktu{{$i+1}}" placeholder="" value="{{$waktu_l}}">
                        <small id="waktu_{{$i+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                  @if (Auth::user())
                    @if (Auth::user()->status == 2)
                      <td>
                        <input type="checkbox" name="list[]" id="toggle-event-penutup" {{($check_l == 'V') ? 'checked' : ''}} data-toggle="toggle" data-on="On" data-off="Off" data-style="slow" data-onstyle="info" data-offstyle="danger" data-size="normal" data-height="40" data-width="70" value="{{$check_l}}">
                        <input type="hidden" name="check[]" id="check_penutup" value="{{$check_l}}">
                      </td>
                    @endif
                  @endif
                </tr>
              </tbody>
            </table>

            @if (Auth::user())
              @if (Auth::user()->status == 1 || Auth::user()->status == 2)
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Catatan Petugas Piket</label>
                  <textarea class="form-control" name="catatan" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan">{{$catatan}}</textarea>
                </div>

                <button class="btn btn-danger btn-block" id="submit_form" data-id="{{$id}}">Submit</button>
                <input type="hidden" name="id" value="{{$id}}">
                {{ csrf_field() }}
              @endif
            @endif

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
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/bootstrap2-toggle.min.js')}}"></script>
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

        $('#toggle-event-pendahuluan').change(function() {
          if($(this).prop('checked') == true){
            $(this).val("V");
            $('#check_penda').val("V");
          }else{
            $(this).val("X");
            $('#check_penda').val("X");
          }
        });

        var il = $('.checkList');
        il.each(function(k){
          k++;

          $('#toggle-event-index'+k).change(function() {
            if($(this).prop('checked') == true){
              $(this).val("V");
            $('#check_'+k).val("V");
            }else{
              $(this).val("X");
            $('#check_'+k).val("X");
            }
          });
        });

        $('#toggle-event-penutup').change(function() {
          if($(this).prop('checked') == true){
            $(this).val("V");
            $('#check_penutup').val("V");
          }else{
            $(this).val("X");
            $('#check_penutup').val("X");
          }
        });

        //menampilkan data fasilitator otomatis
        var z = 0;
        var fasilitas = $('.fetch_fasilitas');
        fasilitas.each(function(l){
          z++;
          l++;

          var id    = $('#dynamic_fasilitas'+z).attr('data-id');
          var index = $('#dynamic_fasilitas'+z).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.showfasilitas')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#dynamic_fasilitas'+l).html(data.isi);
              }
            }
          });
        });

        //menambah dan menghapus data fasilitas pendahuluan
        var pf = 1;
        $(document).on('click', '#addPendaFasilitas', function(){
          pf++;

           var id    = $(this).attr('data-id');
           var val   = $('textarea[name="fasilitor"]').val();
           var token = $('input[name=_token]').val();

           if(val == ''){
             swal(
               'Oops!!',
               'Mohon mengisi data kegiatan fasilitator minimal satu.! :)',
               'info'
             );
           }else{
             $('#tampil_penda_fasilitas').append('<li class="text-left" id="rowFasilitasPenda'+pf+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close btn-remove-penda-fas remove_pf'+pf+'" id="'+pf+'" style="margin-top:-1px;">x</a></li>');
             $('textarea[name="fasilitor"]').val("");

             $.ajax({
               method: "POST",
               url: "{{route('rppmd.create.fasilitas.penda')}}",
               data: {id:id,val:val,token:token},
               success: function(data){
                 $('.remove_pf'+pf+'').attr('data-id', data.id);
               }
             });
          }
        });
        $(document).on('click', '.btn-remove-penda-fas', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#rowFasilitasPenda'+ids).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.fasilitas.penda')}}",
            data: {id:id,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menambah dan menghapus data fasilitas
        var n = 0;
        var fasilitator = $('.fetch_fasilitas');
        fasilitator.each(function(i){
          i++;

          $('#addFasilitator'+i+'').on('click', function(){
            n++;
            var id    = $(this).attr('data-rows');
            var ids   = $('#dynamic_fasilitas'+i).attr('data-id');
            var val   = $('textarea[name="fasilitor'+i+'"]').val();
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Mohon mengisi data kegiatan fasilitator minimal satu.! :)',
                'info'
              );
            }else{
              $('#dynamic_fasilitas'+i).append('<li class="text-left" id="rowFasilitas'+i+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close remove_f_'+i+'" id="'+i+'" style="margin-top:-1px;">x</a></li>');
              $('textarea[name="fasilitor'+i+'"]').val("");

              $.ajax({
                url: "{{route('rppmd.create.fasilitas')}}",
                method: "POST",
                data: {val:val,id:id,ids:ids,token:token},
                success: function(data){
                  $('.remove_f_'+i).attr('data-id', data.id);
                }
              });
            }
          });
          $(document).on('click', '.remove_f_'+i+'', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowFasilitas'+id).remove();
            $(this).remove();

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.delete.fasilitas')}}",
              data: {ids:ids,token:token},
              success: function(data){
                console.log(data.status);
              }
            });
          });
        });

        //menambah dan menghapus data fasilitas penutup
        var penf = 1;
        $(document).on('click', '#addPenutupFasilitator', function(){
          penf++;

          var id    = $(this).attr('data-id');
          var index = $(this).attr('data-index');
          var val   = $('textarea[name="fasilitor_p"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Mohon mengisi data kegiatan fasilitator minimal satu.! :)',
              'info'
            );
          }else{
            $('#tampil_penutup_fasilitas').append('<li class="text-left" id="rowFasilitasPent'+penf+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close btn-remove-pent-fas remove_penf'+penf+'" id="'+penf+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="fasilitor_p"]').val("");

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.create.fasilitas.penutup')}}",
              data: {id:id,val:val,index:index,token:token},
              success: function(data){
                $('.remove_penf'+penf+'').attr('data-id', data.id);
              }
            });
          }
        });
        $(document).on('click', '.btn-remove-pent-fas', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $('#rowFasilitasPent'+id).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.fasilitas.penutup')}}",
            data: {ids:ids,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menampilkan data peserta otomatis
        var s = 0;
        var peserta = $('.fetch_peserta');
        fasilitas.each(function(d){
          s++;
          d++;

          var id    = $('#dynamic_peserta'+s).attr('data-id');
          var index = $('#dynamic_peserta'+s).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.showpeserta')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#dynamic_peserta'+d).html(data.isi);
              }
            }
          });
        });

        //menambah dan menghapus data peserta pendahuluan
        var pp = 1;
        $(document).on('click', '#addPendPeserta', function(){
          pp++;

          var id    = $(this).attr('data-id');
          var val   = $('textarea[name="peserta"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Mohon mengisi data kegiatan peserta minimal satu.! :)',
              'info'
            );
          }else{
            $('#tampil_penda_peserta').append('<li class="text-left" id="rowPesertaPenda'+pp+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close btn-remove-penda-pes remove_pf'+pp+'" id="'+pp+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="peserta"]').val("");

            $.ajax({
              url: "{{route('rppmd.create.peserta.penda')}}",
              method: "POST",
              data: {val:val,id:id,token:token},
              success: function(data){
                $('.remove_pf'+pp).attr('data-id', data.id);
              }
            });
          }
        });
        $(document).on('click', '.btn-remove-penda-pes', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $('#rowPesertaPenda'+id).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.peserta.penda')}}",
            data: {ids:ids,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menambah dan menghapus data peserta
        var pesertas = $('.fetch_peserta');
        pesertas.each(function(k){
          k++;

          $(document).on('click', '#addPeserta'+k+'', function(){

            var id    = $(this).attr('data-rows');
            var ids   = $('#dynamic_peserta'+k+'').attr('data-id');
            var val   = $('textarea[name="peserta'+k+'"]').val();
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Mohon mengisi data kegiatan peserta minimal satu.! :)',
                'info'
              );
            }else{
              $('#dynamic_peserta'+k).append('<li class="text-left" id="rowPeserta'+k+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close remove_p_'+k+'" id="'+k+'" style="margin-top:-1px;">x</a></li>');
              $('textarea[name="peserta'+k+'"]').val("");

              $.ajax({
                method: "POST",
                url: "{{route('rppmd.create.peserta')}}",
                data: {val:val,id:id,ids:ids,token:token},
                success: function(data){
                  $('.remove_p_'+k).attr('data-id', data.id);
                }
              });
            }
          });
          $(document).on('click', '.remove_p_'+k+'', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowPeserta'+id).remove();
            $(this).remove();

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.delete.peserta')}}",
              data: {ids:ids,token:token},
              success: function(data){
                console.log(data.status);
              }
            });
          });
        });

        //menambah dan menghapus data peserta penutup
        var penp = 1;
        $(document).on('click', '#addPenutupPeserta', function(){
          penp++;

          var id    = $(this).attr('data-id');
          var index = $(this).attr('data-index');
          var val   = $('textarea[name="peserta_p"]').val();
          var token = $('input[name=_token]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Mohon mengisi data kegiatan peserta minimal satu.! :)',
              'info'
            );
          }else{
            $('#tampil_penutup_peserta').append('<li class="text-left" id="rowPesertaPent'+penp+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close btn-remove-pent-pes remove_penp'+penp+'" id="'+penp+'" style="margin-top:-1px;">x</a></li>');
            $('textarea[name="peserta_p"]').val("");

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.create.peserta.penutup')}}",
              data: {id:id,val:val,index:index,token:token},
              success: function(data){
                $('.remove_penp'+penp+'').attr('data-id', data.id);
              }
            });
          }
        });
        $(document).on('click', '.btn-remove-pent-pes', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $('#rowPesertaPent'+id).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.peserta.penutup')}}",
            data: {ids:ids,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menampilkan data metode otomatis
        var i = 0;
        var metode = $('.fetch_metode');
        metode.each(function(j){
          i++;
          j++;

          var id    = $('#tampil_met'+i).attr('data-id');
          var index = $('#tampil_met'+i).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.showmetode')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#tampil_met'+j).html(data.isi);
              }
            }
          });
        });

        //menambah dan menghapus data metode pendahuluan
        var pm = 1;
        $(document).on('change', '#penda_metode', function(){
          pm++;

          var id    = $(this).attr('data-id');
          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penda_metode').append('<li class="list-group-item" id="rowMetodePen'+pm+'">'+val+' <a href="#" class="text-danger close btn-remove-metode-pent remove_pm'+pm+'" id="'+pm+'" style="margin-top:-1px;">x</a></li>');

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.create.metode.penda')}}",
            data: {id:id,val:val,token:token},
            success: function(data){
              $('.remove_pm'+pm).attr('data-id', data.id);
            }
          });
        });
        $(document).on('click', '.btn-remove-metode-pent', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#rowMetodePen'+ids).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.metode.penda')}}",
            data: {id:id,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menghapus dan menambah data metode
        var met = $('.fetch_metode');
        met.each(function(n){
          n++;

          $(document).on('click', '#addMetode'+n+'', function(){

            var id    = $(this).attr('data-rows');
            var ids   = $(this).attr('data-id');
            var val   = $('input[name="lainMetode'+n+'"]').val();
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Mohon mengisi data metode minimal satu.! :)',
                'info'
              );
            }else{
              $('#tampil_met'+n+'').append('<li class="list-group-item text-left" id="rowMetode'+n+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close remove_m_'+n+'" id="'+n+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="lainMetode'+n+'"]').val("");

              $.ajax({
                method: "POST",
                url: "{{route('rppmd.create.lainmetode')}}",
                data: {id:id,ids:ids,val:val,token:token},
                success: function(data){
                  $('.remove_m_'+n).attr('data-id', data.id);
                }
              });
            }
          });
          $(document).on('click', '.remove_m_'+n+'', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowMetode'+id).remove();
            $(this).remove();

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.delete.lainmetode')}}",
              data: {ids:ids,token:token},
              success: function(data){
                console.log(data.status);
              }
            });
          });
        });

        //menambah dan menghapus data metode penutup
        var pl = 1;
        $(document).on('change', '#penutup_metode', function(){
          pl++;

          var id    = $(this).attr('data-id');
          var index = $(this).attr('data-index');
          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penutup_metode').append('<li class="list-group-item" id="rowMetodePent'+pl+'">'+val+' <a href="#" class="text-danger close btn-remove-metode-pent remove_pent'+pl+'" id="'+pl+'" style="margin-top:-1px;">x</a></li>');

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.create.metode.penutup')}}",
            data: {id:id,index:index,val:val,token:token},
            success: function(data){
              $('.remove_pent'+pl).attr('data-id', data.id);
            }
          });
        });
        $(document).on('click', '.btn-remove-metode-pent', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#rowMetodePent'+ids).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.metode.penutup')}}",
            data: {id:id,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menampilkan data media/alat bantu otomatis
        var y = 0;
        var media = $('.fetch_media');
        media.each(function(x){
          y++;
          x++;

          var id    = $('#tampil_med'+y).attr('data-id');
          var index = $('#tampil_med'+y).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.showmedia')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#tampil_med'+x).html(data.isi);
              }
            }
          });
        });

        //menambah dan menghapus data media pendahuluan
        var pmd = 1;
        $(document).on('change', '#penda_media', function(){
          pmd++;

          var id    = $(this).attr('data-id');
          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penda_media').append('<li class="list-group-item" id="rowMediaPen'+pmd+'">'+val+' <a href="#" class="text-danger close btn-remove-media-pent remove_pmd'+pmd+'" id="'+pmd+'" style="margin-top:-1px;">x</a></li>');

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.create.media.penda')}}",
            data: {id:id,val:val,token:token},
            success: function(data){
              $('.remove_pmd'+pmd).attr('data-id', data.id);
            }
          });
        });
        $(document).on('click', '.btn-remove-media-pent', function(e){
          e.preventDefault();

          var id    = $(this).attr('id');
          var ids   = $(this).attr('data-id');
          var token = $('input[name=_token]').val();

          $('#rowMediaPen'+id).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.media.penda')}}",
            data: {ids:ids,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        //menambah dan manghapus data media
        var med = $('.fetch_media');
        med.each(function(m){
          m++;

          $(document).on('click', '#addMedia'+m+'', function(){

            var id    = $(this).attr('data-rows');
            var ids   = $(this).attr('data-id');
            var val   = $('input[name="lainMedia'+m+'"]').val();
            var token = $('input[name=_token]').val();

            if(val == ''){
              swal(
                'Oops!!',
                'Mohon mengisi data media minimal satu.! :)',
                'info'
              );
            }else{
              $('#tampil_med'+m+'').append('<li class="list-group-item text-left" id="rowMedia'+m+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <a href="#" class="text-danger close remove_md_'+m+'" id="'+m+'" style="margin-top:-1px;">x</a></li>');
              $('input[name="lainMedia'+m+'"]').val("");

              $.ajax({
                method: "POST",
                url: "{{route('rppmd.create.lainmedia')}}",
                data: {id:id,ids:ids,val:val,token:token},
                success: function(data){
                  $('.remove_md_'+m).attr('data-id', data.id);
                }
              });
            }
          });
          $(document).on('click', '.remove_md_'+m+'', function(e){
            e.preventDefault();

            var id    = $(this).attr('id');
            var ids   = $(this).attr('data-id');
            var token = $('input[name=_token]').val();

            $('#rowMedia'+id).remove();
            $(this).remove();

            $.ajax({
              method: "POST",
              url: "{{route('rppmd.delete.lainmedia')}}",
              data: {ids:ids,token:token},
              success: function(data){
                console.log(data.status);
              }
            });
          });
        });

        //menambah dan menghapus data media penutup
        var pk = 1;
        $(document).on('change', '#penutup_media', function(){
          pk++;

          var id    = $(this).attr('data-id');
          var index = $(this).attr('data-index');
          var val   = $(this).val();
          var token = $('input[name=_token]').val();

          $('.tampil_penutup_media').append('<li class="list-group-item" id="rowMediaPent'+pk+'">'+val+' <a href="#" class="text-danger close btn-remove-media-pent remove_pk'+pk+'" id="'+pk+'" style="margin-top:-1px;">x</a></li>');

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.create.media.penutup')}}",
            data: {id:id,index:index,val:val,token:token},
            success: function(data){
              $('.remove_pk'+pk).attr('data-id', data.id);
            }
          });
        });
        $(document).on('click', '.btn-remove-media-pent', function(e){
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var ids   = $(this).attr('id');
          var token = $('input[name=_token]').val();

          $('#rowMediaPent'+ids).remove();
          $(this).remove();

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.delete.media.penutup')}}",
            data: {id:id,token:token},
            success: function(data){
              console.log(data.status);
            }
          });
        });

        $(document).on('click', '#submit_form', function(e){
          e.preventDefault();

          var list  = [];

          $('input[name="list[]"]').each(function(){
            list.push($(this).val());
          });

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.pelaksana.submit')}}",
            data: $('#form_submit').serialize(),
            beforeSend: function(){
              beforesendrequest();
              $('.input').each(function(){
                id = $(this).attr('id');
                $('#'+id).removeClass('is-invalid');
              });
            },
            success: function(res){
              if(res.status == true){
                $('#submit_form').attr('disabled', 'disabled');
                swal({
                  position: 'top-right',
                  type: 'success',
                  title: "Good Job!",
                  text: res.msg,
                  showConfirmButton: false,
                  timer: 1000,
                  onClose: () => {
                    window.location.href = "{{route('rppmd.showdata')}}";
                  }
                });
                return false;
              }
              swal({
                position: 'center',
                type: 'info',
                title: "Pesan Kesalahan!",
                text: res.msg,
                showConfirmButton: true
              });
            },
            error: function(res){
              $.each(res.responseJSON.errors, function(key,val){
                id = key.replace(/\./g,'_'); // change dot to dashes
                $('.'+id).addClass('is-invalid');
                $('#'+id).text(val[0]);
              });
            }
          });
        });

      });
    </script>
  </body>
</html>
