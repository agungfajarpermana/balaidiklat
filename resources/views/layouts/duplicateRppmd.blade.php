<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/xeditable.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="icon" type="image/png" href="{{asset('image/PU.jpg')}}">

    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white back" href="{{route('rppmd.showdata')}}">Back</a>
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
            <table class="table table-bordered table-condensed">
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
              <tbody id="data-rpmp">
                <tr class="text-center">
                  <th>1</th>
                  <td style="width:300px !important;">
                    Pendahuluan
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left fecth_penda_fasilitas" id="tampil_penda_fasilitas" data-id="{{$id}}" style="padding-left:15px;">
                      <div class="">
                        @foreach ($fasilitas as $key => $value)
                          @if ($value->parent_id == 0)
                            <li class="text-left li_fasilitas_pendahuluan" data-id="{{$value->id}}" style="list-style:decimal;">
                              <span data-type="textarea" data-pk="{{$key}}" data-title="Kegiatan Fasilitator" id="fasilitas_penda_{{$value->id}}">{{$value->kegiatan_fasilitator}}</span>
                              <input type="hidden" name="fasilitas_penda[]" id="ks_{{$value->id}}" value="{{$value->kegiatan_fasilitator}}">
                              <input type="hidden" name="keyfasilitas[]" value="0">
                            </li>
                          @endif
                        @endforeach
                      </div>
                    </ul>
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left fecth_penda_peserta" id="tampil_penda_peserta" data-id="" style="padding-left:15px;">
                      <div class="">
                        @foreach ($peserta as $key => $value)
                          @if ($value->parent_id == 0)
                            <li class="text-left li_kegiatan_peserta_pendahuluan" data-id="{{$value->id}}" style="list-style:decimal;">
                              <span data-type="textarea" data-pk="{{$key}}" data-title="Kegiatan Peserta" id="kegiatan_peserta_pendahuluan_{{$value->id}}">{{$value->kegiatan_peserta}}</span>
                              <input type="hidden" name="peserta_penda[]" id="kg_{{$value->id}}" value="{{$value->kegiatan_peserta}}">
                              <input type="hidden" name="keypeserta[]" value="0">
                            </li>
                          @endif
                        @endforeach
                      </div>
                    </ul>
                  </td>
                  <td style="width:300px !important;">
                    <div class="text-left" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <select class="custom-select mr-sm-2 selectMetodePenda" id="pilih_metode_penda" data-row="0"style="margin-bottom:5px;">
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
                          <div class="card tampil_penda_metode" id="tampil_penda_metode0">
                            <div class="">
                              @foreach($metode as $key => $value)
                                @if($value->parent_id_sub == 0)
                                  <li class="list-group-item li_metode_pendahuluan" data-id="{{$value->id}}">
                                    <span data-type="select" data-placement="bottom" data-title="Metode" id="metode_pendahuluan_{{$value->id}}">{{$value->metode}}</span>
                                    <input type="hidden" name="metode_penda[]" id="mp_{{$value->id}}" value="{{$value->metode}}">
                                    <input type="hidden" name="keymetodependa[]" value="0">
                                  </li>
                                @endif
                              @endforeach
                            </div>
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_metode_penda">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetodePenda" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_metode" id="addMetodePenda" data-row="0">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <div class="text-left" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <select class="custom-select mr-sm-2 selectMediaPenda" id="pilih_media_penda" data-row="0" style="margin-bottom:5px;">
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
                          <div class="card tampil_penda_media" id="tampil_penda_media0">
                            <div class="">
                              @foreach ($media as $key => $value)
                                @if ($value->parent_id_metode == 0)
                                  <li class="list-group-item li_media_pendahuluan" data-id="{{$value->id}}">
                                    <span data-type="select" data-placement="bottom" data-title="Media/Alat Bantu" id="media_pendahuluan_{{$value->id}}">{{$value->alat_bantu}}</span>
                                    <input type="hidden" name="media_penda[]" id="md_{{$value->id}}" value="{{$value->alat_bantu}}">
                                    <input type="hidden" name="keymediapenda[]" value="0">
                                  </li>
                                @endif
                              @endforeach
                            </div>
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_media_penda">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMediaPenda" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_media" id="addMediaPenda" data-row="0">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control waktu_0 input text-center" name="waktu[]"  id="waktu0" placeholder="" value="{{$waktu_h}}">
                        <small id="waktu_0" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                </tr>

                @for ($i=0; $i < count($materi); $i++)
                  <tr class="text-center" data-index="{{$i+1}}">
                    <th>{{$i+2}}</th>
                    <td class="core_tahapan" data-id="{{$i}}" style="width:300px !important;">
                      <span data-type="textarea" data-title="Tahapan Kegiatan" id="tahapan_{{$i}}">{{$materi[$i]}}</span>
                      <input type="hidden" name="materi[]" id="val_tahapan_{{$i}}" value="{{$materi[$i]}}">
                      <input type="hidden" name="keymateri[]" value="{{$i+1}}">
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark fetch_fasilitas" id="dynamic_fasilitas" style="padding-left:15px;">
                        <div class="">
                          @foreach ($fasilitas as $key => $value)
                            @if ($value->parent_id == $i+1)
                              <li class="text-left core_fasilitas" data-id="{{$value->id}}" style="list-style:decimal;">
                                <span data-type="textarea" data-title="Kegiatan Fasilitator" id="fasilitas_{{$value->id}}">{{$value->kegiatan_fasilitator}}</span>
                                <input type="hidden" name="fasilitas[]" id="val_fasilitas_{{$value->id}}" value="{{$value->kegiatan_fasilitator}}">
                                <input type="hidden" name="keyfasilitas[]" value="{{$i+1}}">
                              </li>
                            @endif
                          @endforeach
                        </div>
                      </ul>
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify fetch_peserta" id="dynamic_peserta" data-index="" data-id="" style="padding-left:15px;">
                        <div class="">
                          @foreach ($peserta as $key => $value)
                            @if ($value->parent_id == $i+1)
                              <li class="text-left core_peserta" data-id="{{$value->id}}" style="list-style:decimal;">
                                <span data-type="textarea" data-title="Kegiatan Peserta" id="peserta_{{$value->id}}">{{$value->kegiatan_peserta}}</span>
                                <input type="hidden" name="peserta[]" id="val_peserta_{{$value->id}}" value="{{$value->kegiatan_peserta}}">
                                <input type="hidden" name="keypeserta[]" value="{{$i+1}}">
                              </li>
                            @endif
                          @endforeach
                        </div>
                      </ul>
                    </td>
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_metode">
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
                          <div class="card c_metode" id='tampil_met{{$i+1}}' data-index="">
                            @foreach ($metode as $key => $value)
                              @if ($value->parent_id_sub == $i+1)
                                <li class="list-group-item core_metode" data-id="{{$value->id}}">
                                  <span data-type="select" data-placement="bottom" data-title="Metode" id="metode_{{$value->id}}">{{$value->metode}}</span>
                                  <input type="hidden" name="metode[]" id="val_metode_{{$value->id}}" value="{{$value->metode}}">
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
                    <td style="width:50px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_media">
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
                          <div class="card c_media" id='tampil_med{{$i+1}}' data-index="">
                            @foreach ($media as $key => $value)
                              @if ($value->parent_id_metode == $i+1)
                                <li class="list-group-item core_media" data-id="{{$value->id}}">
                                  <span data-type="select" data-placement="bottom" data-title="Media/Alat Bantu" id="media_{{$value->id}}">{{$value->alat_bantu}}</span>
                                  <input type="hidden" name="media[]" id="val_media_{{$value->id}}" value="{{$value->alat_bantu}}">
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
                    <td>
                      <div class="form-group">
                        <div class="" id="dynamic_first">
                          <input type="text" class="form-control waktu_{{$i+1}} input text-center" name="waktu[]"  id="waktu{{$i+1}}" placeholder="" value="{{$waktu_a[$i]}}" data-index="{{$i+1}}">
                          <small id="waktu_{{$i+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                          </small>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endfor

                <tr class="text-center">
                  <th>{{$jumlah+1}}</th>
                  <td style="width:300px !important;">
                    Penutup
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_fasilitas" style="padding-left:15px;">
                      <div class="">
                        @foreach ($fasilitas as $key => $value)
                          @if ($value->parent_id == $jumlah)
                            <li class="text-left fasilitas_penutup" data-id="{{$value->id}}" style="list-style:decimal;">
                              <span data-type="textarea" data-title="Kegiatan Fasilitator" id="fasilitas_penutup_{{$value->id}}">{{$value->kegiatan_fasilitator}}</span>
                              <input type="hidden" name="fasilitas_penutup[]" id="val_penutup_fasilitas_{{$value->id}}" value="{{$value->kegiatan_fasilitator}}">
                              <input type="hidden" name="keyfasilitas[]" value="{{$i+1}}">
                            </li>
                          @endif
                        @endforeach
                      </div>
                    </ul>
                  </td>
                  <td style="width:300px !important;">
                    <ul class="list-group list-group-flush text-dark text-left" id="tampil_penutup_peserta" style="padding-left:15px;">
                      <div class="">
                        @foreach ($peserta as $key => $value)
                          @if ($value->parent_id == $jumlah)
                            <li class="text-left peserta_penutup" data-id="{{$value->id}}" style="list-style:decimal;">
                              <span data-type="textarea" data-title="Kegiatan Peserta" id="peserta_penutup_{{$value->id}}">{{$value->kegiatan_peserta}}</span>
                              <input type="hidden" name="peserta_penutup[]" id="val_pen_peserta_{{$value->id}}" value="{{$value->kegiatan_peserta}}">
                              <input type="hidden" name="keypeserta[]" value="{{$i+1}}">
                            </li>
                          @endif
                        @endforeach
                      </div>
                    </ul>
                  </td>
                  <td style="width:300px !important;">
                    <div class="indexS" data-index="" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify fetch_metode_penutup">
                        <div class="collapse show" id="collapseExample">
                          <select class="custom-select mr-sm-2 selectMetodePenutup" id="pilih_metode_penutup" data-row="{{$i+1}}" style="margin-bottom:5px;">
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
                          <div class="card tampil_penutup_metode" id="tampil_penutup_metode{{$i+1}}">
                            <div class="">
                              @foreach ($metode as $key => $value)
                                @if ($value->parent_id_sub == $jumlah)
                                  <li class="list-group-item metode_penutup_{{$i+1}}" data-id="{{$value->id}}">
                                    <span data-type="select" data-placement="bottom" data-title="Metode" id="metode_penutup_{{$value->id}}">{{$value->metode}}</span>
                                    <input type="hidden" name="metode_penutup[]" id="val_pen_metode_{{$value->id}}" value="{{$value->metode}}">
                                    <input type="hidden" name="keymetodepenutup[]" value="{{$i+1}}">
                                  </li>
                                @endif
                              @endforeach
                            </div>
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_metode_penutup">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMetodePenutup" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_metode" id="addMetodePenutup" data-rows="{{$i+1}}">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td style="width:300px !important;">
                    <div class="indexS" style="margin-top:5px;">
                      <ul class="list-group list-group-flush text-justify">
                        <div class="collapse show" id="collapseExample">
                          <select class="custom-select mr-sm-2 selectMediaPenutup" id="pilih_media_penutup" data-row="{{$i+1}}" style="margin-bottom:5px;">
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
                          <div class="card tampil_penutup_media" id="tampil_penutup_media{{$i+1}}">
                            <div class="">
                              @foreach ($media as $key => $value)
                                @if ($value->parent_id_metode == $jumlah)
                                  <li class="list-group-item media_penutup" data-id="{{$value->id}}">
                                    <span data-type="select" data-placement="bottom" data-title="Media/Alat Bantu" id="media_penutup_{{$value->id}}">{{$value->alat_bantu}}</span>
                                    <input type="hidden" name="media_penutup[]" id="val_pen_media_{{$value->id}}" value="{{$value->alat_bantu}}">
                                    <input type="hidden" name="keymediapenutup[]" value="{{$i+1}}">
                                  </li>
                                @endif
                              @endforeach
                            </div>
                          </div>
                          <div class="form-group" style="margin-top:5px;">
                            <div class="form-inline" id="lain_media_penutup">
                              <input type="text" class="form-control col-md-10 col-sm-10" name="lainMediaPenutup" placeholder="Lain - Lain...">
                              <button type="button" class="btn btn-outline-success col-md-2 col-sm-2 index_media" id="addMediaPenutup" data-rows="{{$i+1}}">+</button>
                            </div>
                          </div>
                        </div>
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="" id="dynamic_first">
                        <input type="text" class="form-control waktu_{{$i+1}} input text-center" name="waktu[]"  id="waktu{{$i+1}}" placeholder="" value="{{$waktu_l}}">
                        <small id="waktu_{{$i+1}}" class="invalid-feedback text-danger text-lg-left">
                            
                        </small>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Referensi</h6>
                @foreach ($referensi as $key => $value)
                  <ul>
                    <li class="referensi" data-id="{{$key}}">
                      <span data-type="textarea" data-placement="top" data-title="Referensi" id="referensi_{{$key}}">{{$value}}</span>
                      <input type="hidden" name="ref[]" id="val_referensi_{{$key}}" value="{{$value}}">
                    </li>
                  </ul>
                @endforeach
              </div>
            </div>
            <br>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/xeditable.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $.fn.editable.defaults.mode = 'popup'; 

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
        
        // pendahuluan paparan
        $(document).on('click', '.li_fasilitas_pendahuluan', function(){
          let key = $(this).attr('data-id');
          $('#fasilitas_penda_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#ks_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.li_kegiatan_peserta_pendahuluan', function(){
          let key = $(this).attr('data-id');
          $('#kegiatan_peserta_pendahuluan_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#kg_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.li_metode_pendahuluan', function(){
          let key = $(this).attr('data-id');
          $('#metode_pendahuluan_'+key).editable({
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
              $('#mp_'+key).val(newValue);
            }
          });
        });

        let rowmetodependa = 0;
        $(document).on('change', '#pilih_metode_penda', function(e){
          rowmetodependa++;
          
          let i = $(this).attr('data-row');
          let val = $(this).val();
          $('#tampil_penda_metode'+i+'').append('<li class="list-group-item text-left" id="selectMetodePenda'+i+'_'+rowmetodependa+'">'+val+' <input type="hidden" name="metode_penda[]" value="'+val+'"><input type="hidden" name="keymetodependa[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMetodePenda" id="'+i+'_'+rowmetodependa+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '#addMetodePenda', function(e){
          rowmetodependa++;

          let i = $(this).attr('data-row');
          let val = $('input[name="lainMetodePenda"]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Metode Tidak Boleh Kosong!',
              'info'
            );
          }else{
            $('#tampil_penda_metode'+i+'').append('<li class="list-group-item text-left" id="addMetodePenda'+i+'_'+rowmetodependa+'">'+val+' <input type="hidden" name="metode_penda[]" value="'+val+'"><input type="hidden" name="keymetodependa[]" value="'+i+'"><a href="#" class="text-danger close removeAddMetodePenda" id="'+i+'_'+rowmetodependa+'" style="margin-top:-1px;">x</a></li>');
            $('input[name="lainMetodePenda"]').val("");
          }
        });
        $(document).on('click', '.removeAddMetodePenda', function(e){
          let id = $(this).attr('id');
          $('#addMetodePenda'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMetodePenda', function(e){
          let id = $(this).attr('id');
          $('#selectMetodePenda'+id).remove();

          e.preventDefault();
        });

        $(document).on('click', '.li_media_pendahuluan', function(){
          let key = $(this).attr('data-id');
          $('#media_pendahuluan_'+key).editable({
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
              $('#md_'+key).val(newValue);
            }
          });
        });

        let rowmediapenda = 0;
        $(document).on('change', '#pilih_media_penda', function(e){
          rowmediapenda++;
          
          let i = $(this).attr('data-row');
          let val = $(this).val();
          $('#tampil_penda_media'+i+'').append('<li class="list-group-item text-left" id="selectMediaPenda'+i+'_'+rowmediapenda+'">'+val+' <input type="hidden" name="media_penda[]" value="'+val+'"><input type="hidden" name="keymediapenda[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMediaPenda" id="'+i+'_'+rowmediapenda+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '#addMediaPenda', function(e){
          rowmetodependa++;

          let i = $(this).attr('data-row');
          let val = $('input[name="lainMediaPenda"]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Media Tidak Boleh Kosong!',
              'info'
            );
          }else{
            $('#tampil_penda_media'+i+'').append('<li class="list-group-item text-left" id="addMediaPenda'+i+'_'+rowmediapenda+'">'+val+' <input type="hidden" name="media_penda[]" value="'+val+'"><input type="hidden" name="keymediapenda[]" value="'+i+'"><a href="#" class="text-danger close removeAddMediaPenda" id="'+i+'_'+rowmediapenda+'" style="margin-top:-1px;">x</a></li>');
            $('input[name="lainMediaPenda"]').val("");
          }
        });
        $(document).on('click', '.removeAddMediaPenda', function(e){
          let id = $(this).attr('id');
          $('#addMediaPenda'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMediaPenda', function(e){
          let id = $(this).attr('id');
          $('#selectMediaPenda'+id).remove();

          e.preventDefault();
        });
        
        // core paparan
        $(document).on('click', '.core_tahapan', function(){
          let key = $(this).attr('data-id');
          $('#tahapan_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_tahapan_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.core_fasilitas', function(){
          let key = $(this).attr('data-id');
          $('#fasilitas_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_fasilitas_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.core_peserta', function(){
          let key = $(this).attr('data-id');
          $('#peserta_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_peserta_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.core_metode', function(){
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
              $('#val_metode_'+key).val(newValue);
            }
          });
        });

        let rowmetode = 0;
        let lainmetode = $('.fetch_metode');
        lainmetode.each(function(i){
          i++; rowmetode++;
          
          // select metode duplicate
          $(document).on('change', '#pilih_metode'+i, function(e){
            let val = $(this).val();
            $('#tampil_met'+i+'').append('<li class="list-group-item text-left" id="selectMetode'+i+'_'+rowmetode+'">'+val+' <input type="hidden" name="metode[]" value="'+val+'"><input type="hidden" name="keymetode[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMetode" id="'+i+'_'+rowmetode+'" style="margin-top:-1px;">x</a></li>');
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
              $('#tampil_met'+i+'').append('<li class="list-group-item text-left" id="addMetode'+i+'_'+rowmetode+'">'+val+' <input type="hidden" name="metode[]" value="'+val+'"><input type="hidden" name="keymetode[]" value="'+i+'"><a href="#" class="text-danger close removeAddMetode" id="'+i+'_'+rowmetode+'" style="margin-top:-1px;">x</a></li>');
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

        $(document).on('click', '.core_media', function(){
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
              $('#val_media_'+key).val(newValue);
            }
          });
        });

        let rowmedia = 0;
        let lainmedia = $('.fetch_media');
        lainmedia.each(function(i){
          i++; rowmedia++;
          
          // select metode duplicate
          $(document).on('change', '#pilih_media'+i, function(e){
            let val = $(this).val();
            $('#tampil_med'+i+'').append('<li class="list-group-item text-left" id="selectMedia'+i+'_'+rowmedia+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="media[]" value="'+val+'"><input type="hidden" name="keymedia[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMedia" id="'+i+'_'+rowmedia+'" style="margin-top:-1px;">x</a></li>');
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
              $('#tampil_med'+i+'').append('<li class="list-group-item text-left" id="addMedia'+i+'_'+rowmedia+'" style="list-style:decimal;margin-bottom:5px;">'+val+' <input type="hidden" name="media[]" value="'+val+'"><input type="hidden" name="keymedia[]" value="'+i+'"><a href="#" class="text-danger close removeAddMedia" id="'+i+'_'+rowmedia+'" style="margin-top:-1px;">x</a></li>');
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

        // penutup paparan
        $(document).on('click', '.fasilitas_penutup', function(){
          let key = $(this).attr('data-id');
          $('#fasilitas_penutup_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_penutup_fasilitas_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.peserta_penutup', function(){
          let key = $(this).attr('data-id');
          $('#peserta_penutup_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_pen_peserta_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '.metode_penutup', function(){
          let key = $(this).attr('data-id');
          $('#metode_penutup_'+key).editable({
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
              $('#val_pen_metode_'+key).val(newValue);
            }
          });
        });
        
        let rowmetodepenutup = 0;
        $(document).on('change', '#pilih_metode_penutup', function(e){
          rowmetodepenutup++;
          
          let i = $(this).attr('data-row');
          let val = $(this).val();
          $('#tampil_penutup_metode'+i+'').append('<li class="list-group-item text-left" id="selectMetodePen'+i+'_'+rowmetodepenutup+'">'+val+' <input type="hidden" name="metode_penutup[]" value="'+val+'"><input type="hidden" name="keymetodepenutup[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMetodePenutup" id="'+i+'_'+rowmetodepenutup+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '#addMetodePenutup', function(e){
          rowmetodepenutup++;

          let i = $(this).attr('data-rows');
          let val = $('input[name="lainMetodePenutup"]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Metode Tidak Boleh Kosong!',
              'info'
            );
          }else{
            $('#tampil_penutup_metode'+i+'').append('<li class="list-group-item text-left" id="addMetodePen'+i+'_'+rowmetodepenutup+'">'+val+' <input type="hidden" name="metode_penutup[]" value="'+val+'"><input type="hidden" name="keymetodepenutup[]" value="'+i+'"><a href="#" class="text-danger close removeAddMetodePenutup" id="'+i+'_'+rowmetodepenutup+'" style="margin-top:-1px;">x</a></li>');
            $('input[name="lainMetodePenutup"]').val("");
          }
        });
        $(document).on('click', '.removeAddMetodePenutup', function(e){
          let id = $(this).attr('id');
          $('#addMetodePen'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMetodePenutup', function(e){
          let id = $(this).attr('id');
          $('#selectMetodePen'+id).remove();

          e.preventDefault();
        });

        $(document).on('click', '.media_penutup', function(){
          let key = $(this).attr('data-id');
          $('#media_penutup_'+key).editable({
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
              $('#val_pen_media_'+key).val(newValue);
            }
          });
        });

        let rowmediapenutup = 0;
        $(document).on('change', '#pilih_media_penutup', function(e){
          rowmediapenutup++;
          
          let i = $(this).attr('data-row');
          let val = $(this).val();
          $('#tampil_penutup_media'+i+'').append('<li class="list-group-item text-left" id="selectMediaPen'+i+'_'+rowmediapenutup+'">'+val+' <input type="hidden" name="media_penutup[]" value="'+val+'"><input type="hidden" name="keymediapenutup[]" value="'+i+'"><a href="#" class="text-danger close removeSelectMediaPenutup" id="'+i+'_'+rowmediapenutup+'" style="margin-top:-1px;">x</a></li>');
        });
        $(document).on('click', '#addMediaPenutup', function(e){
          rowmetodepenutup++;

          let i = $(this).attr('data-rows');
          let val = $('input[name="lainMediaPenutup"]').val();

          if(val == ''){
            swal(
              'Oops!!',
              'Media Tidak Boleh Kosong!',
              'info'
            );
          }else{
            $('#tampil_penutup_media'+i+'').append('<li class="list-group-item text-left" id="addMediaPen'+i+'_'+rowmediapenutup+'">'+val+' <input type="hidden" name="media_penutup[]" value="'+val+'"><input type="hidden" name="keymediapenutup[]" value="'+i+'"><a href="#" class="text-danger close removeAddMediaPenutup" id="'+i+'_'+rowmediapenutup+'" style="margin-top:-1px;">x</a></li>');
            $('input[name="lainMediaPenutup"]').val("");
          }
        });
        $(document).on('click', '.removeAddMediaPenutup', function(e){
          let id = $(this).attr('id');
          $('#addMediaPen'+id).remove();

          e.preventDefault();
        });
        $(document).on('click', '.removeSelectMediaPenutup', function(e){
          let id = $(this).attr('id');
          $('#selectMediaPen'+id).remove();

          e.preventDefault();
        });

        $(document).on('click', '.referensi', function(){
          let key = $(this).attr('data-id');
          $('#referensi_'+key).editable({
            validate: function(value){
              if($.trim(value) == '') return 'Tidak Boleh Kosong';
            },
            success: function(response, newValue){
              $('#val_referensi_'+key).val(newValue);
            }
          });
        });

        $(document).on('click', '#duplicate', function(e){
          $('.back').addClass('disabled');
          $(this).attr('disabled', 'disabled');
          $(this).text('Inisialisasi');

          $.ajax({
            method: "POST",
            url: "{{route('rppmd.duplicate.create')}}",
            data: $('#form_submit').serialize(),
            beforeSend: function(){
              beforesendrequest();
              $('.input').each(function(){
                id = $(this).attr('id');
                $('#'+id).removeClass('is-invalid');
                $('#nips').removeClass('is-invalid');
                $('#namas').removeClass('is-invalid');
              })
            },
            success: function(data){
              $('.back').removeClass('disabled');
              $('#duplicate').text('Duplicate');
              if(data.status == true){
                swal({
                  position: 'top-right',
                  type: 'success',
                  title: 'Berhasil Duplicate',
                  showConfirmButton: false,
                  timer: 1000,
                  onClose: () => {
                    window.location.href = "{{route('rppmd.showdata')}}"
                  }
                });
              }else{
                $('.back').removeClass('disabled');
                $('#duplicate').removeAttr('disabled');
                $('#duplicate').text('Duplicate');
                swal(
                  'Oops !!',
                  data.msg,
                  'error'
                )
              }
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
