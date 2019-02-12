<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Rppmd</title>
  <style>
  *{
    margin-top: 0px;
  },
  table { 
    width: 100%; 
    border-collapse: collapse;
  },
  /* Zebra striping */
  tr:nth-of-type(odd) { 
    background: #eee;
  },
  th {
    background: #eee; 
    color: black; 
    font-weight: bold; 
    text-align: center;
  },
  td{
    text-align: left;
  },
  td, th { 
    /* padding: 6px;  */
    border: 1px solid #ccc; 
  },
  ul{
    padding-left: 20px;
  },
  textarea{
    height: 80px;
    border-radius: 5px;
  },
  .page-break {
    page-break-after: always;
  }
  </style>
</head>
<body>
  <h4 style="text-align:center;margin-top:10px;">RANCANG BANGUN PEMBELAJARAN MATA PELATIHAN</h4>
  <br>
  <span class="">1.</span> <span>Nama Pelatihan</span> <span style="margin-left:7px;">:</span>
  <span>{{$nama}}</span>
  <br><br>
  <span class="">2.</span> <span>Mata Pelatihan</span> <span style="margin-left:12px;">:</span>
  <span>{{$mata}}</span>
  <br><br>
  <span class="">3.</span> <span>Alokasi Waktu</span> <span style="margin-left:12px;">:</span>
  <span>{{$alokasi}} JP</span>
  <br><br>
  <span class="">4.</span> <span>Deskripsi Singkat</span> <span>:</span>
  <p style="margin-left:25px;text-align:justify;">{{$deskripsi}}</p>
  
  <span class="">5.</span> <span>Tujuan</span> <br> <span style="margin-left:16px;">Pembelajaran</span> <span style="margin-left:27px;">:</span>
  <br><br>
  <span style="margin-left:20px;">1).</span> <span>Hasil Belajar</span> <span style="margin-left:5px;">:</span>
  <p style="margin-left:50px;text-align:justify;">{{$hasil}}</p>
  
  <span style="margin-left:20px;">2).</span> <span>Indikator</span> <br> <span style="margin-left:42px;">Hasil Belajar</span> <span style="margin-left:5px;">:</span>
  <span style="margin-left:5px;">Setelah mengikuti pelatihan ini, peserta dapat :</span> <br>
  @foreach ($indikator as $key => $value)
    <span style="margin-left:160px;">{{$key+1}}. <span>{{$value}}</span> <br> </span>
  @endforeach
  <div style="padding:20px;color:white;">separator</div>
  <table>
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tahapan Kegiatan</th>
        <th scope="col">Kegiatan Fasilitator</th>
        <th scope="col">Kegiatan Peserta</th>
        <th scope="col">Metode</th>
        <th scope="col">Media / <br> Alat Bantu</th>
        <th scope="col">Alokasi Waktu (Menit)</th>
        <th scope="col">Check List</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>
            <p style="float:left;margin-left:5px;">1</p>
          </td>
          <td>
            <p style="float:left;">Pendahuluan</p>
          </td>
          <td>
            <div style="float:left;">
              <ul style="width:80px;list-style-type:decimal;">
                @foreach ($fasilitas as $key => $value)
                  @if ($value->parent_id == 0)
                    <li>{{$value->kegiatan_fasilitator}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type:decimal;">
                @foreach ($peserta as $key => $value)
                  @if ($value->parent_id == 0)
                    <li>{{$value->kegiatan_peserta}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
           <div style="float:left;">
            <ul style="list-style-type:decimal;">
                @foreach ($metode as $key => $value)
                  @if ($value->parent_id_sub == 0)
                    <li>{{$value->metode}}</li>
                  @endif
                @endforeach
              </ul>
           </div>
           <div style="clear:both;"></div>
          </td>
          <td>
           <div style="float:left;">
            <ul style="list-style-type:decimal;">
                @foreach ($media as $key => $value)
                  @if ($value->parent_id_metode == 0)
                    <li>{{$value->alat_bantu}}</li>
                  @endif
                @endforeach
              </ul>
           </div>
           <div style="clear:both;"></div>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$waktu_h}}</p>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$checkHead}}</p>
          </td>
        </tr>

      @for($i=0; $i < count($materi); $i++)
        <tr>
          <td>
            <p style="float:left;margin-left:5px;">{{$i+2}}</p>
          </td>
          <td>
            <p style="float:left;">{{$materi[$i]}}</p>
          </td>
          <td>
            <div style="float:left;">
              <ul style="width:80px;list-style-type:decimal;">
                @foreach ($fasilitas as $key => $value)
                  @if ($value->parent_id == $i+1)
                    <li>{{$value->kegiatan_fasilitator}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($peserta as $key => $value)
                  @if ($value->parent_id == $i+1)
                    <li>{{$value->kegiatan_peserta}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($metode as $key => $value)
                  @if ($value->parent_id_sub == $i+1)
                    <li>{{$value->metode}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($media as $key => $value)
                  @if ($value->parent_id_metode == $i+1)
                    <li>{{$value->alat_bantu}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$waktu_a[$i]}}</p>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$check[$i]}}</p>
          </td>
        </tr>
      @endfor
        <tr>
          <td>
            <p style="float:left;margin-left:5px;">{{$jumlah+1}}</p>
          </td>
          <td>
            <p style="float:left;">Penutup</p>
          </td>
          <td>
            <div style="float:left;">
              <ul style="width:80px;list-style-type: decimal;">
                @foreach ($fasilitas as $key => $value)
                  @if ($value->parent_id == $jumlah)
                    <li>{{$value->kegiatan_fasilitator}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($peserta as $key => $value)
                  @if ($value->parent_id == $jumlah)
                    <li>{{$value->kegiatan_peserta}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($metode as $key => $value)
                  @if ($value->parent_id_sub == $jumlah)
                    <li>{{$value->metode}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;">
                @foreach ($media as $key => $value)
                  @if ($value->parent_id_metode == $jumlah)
                    <li>{{$value->alat_bantu}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$waktu_l}}</p>
          </td>
          <td style="text-align:center;">
            <p style="float:left;margin-left:20px;">{{$checkLast}}</p>
          </td>
        </tr>
    </tbody>
  </table>
  <br>
  <div style="margin-top:10px;">
    <label>Bentuk Evaluasi</label>
    @if($validasi == 'true')
      @foreach ($evaluasi as $key => $value)
        <ul style="margin-left:20px;">
          <li>{{$value->evaluasi}}</li>
        </ul>
      @endforeach
    @else
        <ul style="margin-left:20px;">
          <li>Tidak ada</li>
        </ul>
    @endif
  </div>
  
  @if($evaluasi->count() <= 1)
    <div class="page-break"></div>
  @endif

  <br>
  <div>
    <label>Referensi</label>
    @if(count($referensi) != 0)
      @foreach ($referensi as $key => $value)
        <ul style="margin-left:20px;">
          <li>{{$value}}</li>
        </ul>
      @endforeach
    @else
      <ul style="margin-left:20px;">
          <li>Tidak ada</li>
        </ul>
    @endif
  </div>
  
  <div>
    <label>Catatan Petugas Piket</label>
    <textarea>{{$catatan}}</textarea>
  </div>
  <br><br>
  <div class="card float-right" style="max-width: 20rem; margin-bottom:20px;border:none;float:right;">
    <div class="card-header bg-transparent text-center" style="border:none;">Jakarta, {{$date}}</div>
    <div class="card-body text-success" style="height:80px;">

    </div>
    <div style="border:none;">
      <p>
        <span>{{$pengajar}}</span><br>
        <span style="border-top:1px solid grey;margin-top:3px;">NIP : {{$nip}}</span>
      </p>
    </div>
  </div>
</body>
</html>