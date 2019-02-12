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
      <a class="nav-link btn btn-danger text-white" href="/diklat">Home</a>
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
          <form class="" action="/diklat/rencana-pembelajaran-lanjut-1" method="post">
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
                    Menjelaskan Pokok Materi Menjelaskan Pokok Materi Menjelaskan Pokok Materi
                  </td>
                  <td style="width:50px !important;">
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_fasilitas">
                        <input type="text" class="form-control col-md-10 col-sm-10" name="fasilitor[]"  id="fasilitor" placeholder="Kegiatan Fasilitator">
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2" id="addFasilitator">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:50px !important;">
                    <div class="form-group">
                      <div class="form-inline" id="dynamic_peserta">
                        <input type="text" class="form-control col-md-10 col-sm-10" name="peserta[]"  id="peserta" placeholder="Kegiatan Peserta">
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2" id="addPeserta">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:50px !important;">
                    <ul class="list-group list-group-flush text-dark text-left">
                      <option value="Ceramah">Ceramah</option>
                      <option value="Brainstorming">Brainstorming</option>
                      <option value="Ice Breaking">Ice Breaking</option>
                      <option value="Presentasi">Presentasi</option>
                      <option value="Expositori(paparan vasilitator)">Expositori(paparan vasilitator)</option>
                      <option value="Tanya Jawab">Tanya Jawab</option>
                      <option value="Tayangan Video">Tayangan Video</option>
                      <option value="Simulasi Games">Simulasi Games</option>
                      <option value="Diskusi Kelompok">Diskusi Kelompok</option>
                      <option value="Diskusi/Latihan">Diskusi/Latihan</option>
                      <option value="Curah Pendapat">Curah Pendapat</option>
                      <option value="Studi Kasus">Studi Kasus</option>
                      <option value="Role Play">Role Play</option>
                      <option value="Menyimpulkan">Menyimpulkan</option>
                    </ul>
                    <div class="form-group" style="margin-top:5px;">
                      <div class="form-inline" id="dynamic_metode">
                        <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetode[]"  id="sub_materi_pokok" placeholder="Lain - Lain...">
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2" id="addMetode">+</button>
                      </div>
                    </div>
                  </td>
                  <td style="width:50px !important;">
                    <ul class="list-group list-group-flush text-dark text-left">
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
                    </ul>
                    <div class="form-group" style="margin-top:5px;">
                      <div class="form-inline" id="dynamic_media">
                        <input type="text" class="form-control col-md-10 col-sm-10" name="lainMedia[]"  id="sub_materi_pokok" placeholder="Lain - Lain...">
                        <button type="button" class="btn btn-outline-success col-md-2 col-sm-2" id="addMedia">+</button>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control" name="waktu[]"  id="alokasi_waktu" placeholder="">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <button type="submit" name="submit" class="btn btn-outline-danger btn-block" id="submit">Next</button>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="GET">
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
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        //button fasilitator
        var i = 1;
        $('#addFasilitator').click(function(){
          i++;
          $('#dynamic_fasilitas').append('<input type="text" name="fasilitator[]" class="form-control col-md-10 col-sm-10" id="rowFasilitas'+i+'" placeholder="Kegiatan Fasilitator" style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-2 col-sm-2 remove" id="'+i+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.remove', function(){
          var id = $(this).attr('id');
          $('#rowFasilitas'+id).remove();
          $(this).remove();
        });

        //button peserta
        var j = 1;
        $('#addPeserta').click(function(){
          j++;
          $('#dynamic_peserta').append('<input type="text" name="peserta[]" class="form-control col-md-10 col-sm-10" id="rowPeserta'+j+'" placeholder="Kegiatan Peserta" style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-2 col-sm-2 removePeserta" id="'+j+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.removePeserta', function(){
          var id = $(this).attr('id');
          $('#rowPeserta'+id).remove();
          $(this).remove();
        });

        //button metode
        var v = 1;
        $('#addMetode').click(function(){
          v++;
          $('#dynamic_metode').append('<input type="text" name="lainMetode[]" class="form-control col-md-10 col-sm-10" id="rowMetode'+v+'" placeholder="Lain - Lain..." style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-2 col-sm-2 removeMetode" id="'+v+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.removeMetode', function(){
          var id = $(this).attr('id');
          $('#rowMetode'+id).remove();
          $(this).remove();
        });

        //button media
        var z = 1;
        $('#addMedia').click(function(){
          z++;
          $('#dynamic_media').append('<input type="text" name="lainMedia[]" class="form-control col-md-10 col-sm-10" id="rowMedia'+z+'" placeholder="Lain - Lain..." style="margin-top:5px;"><button type="button" class="btn btn-danger col-md-2 col-sm-2 removeMedia" id="'+z+'" style="margin-top:5px;">x</button>')
        });
        $(document).on('click', '.removeMedia', function(){
          var id = $(this).attr('id');
          $('#rowMedia'+id).remove();
          $(this).remove();
        });
      });
    </script>
