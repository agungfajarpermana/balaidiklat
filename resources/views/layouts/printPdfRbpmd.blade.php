<html>
<head>
	<title>Rbpmd</title>
  <style>
  *{
    margin-top: 0px;
  }
  table { 
    width: 100%;
    table-layout: auto;
    border-collapse: collapse;
  }
  /* Zebra striping */
  tr:nth-of-type(odd) { 
    /* background: #eee;  */
  }
  th { 
    background: #eee; 
    color: black; 
    font-weight: bold; 
    text-align: center;
    font-size: 15px;
  },
  td{
    text-align: left;
  },
  td, th { 
    /* padding: 6px;  */
    font-size: 15px;
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
  },
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
        <th scope="col">Indikator Hasil Belajar</th>
        <th scope="col">Materi Pokok</th>
        <th scope="col">Sub Materi Pokok</th>
        <th scope="col">Metode</th>
        <th scope="col">Media / <br> Alat Bantu</th>
        <th scope="col">Alokasi Waktu (Menit)</th>
        <th scope="col">Daftar Pustaka</th>
      </tr>
    </thead>
    <tbody>
      @for($i=0; $i < count($indikator); $i++)
        <tr>
          <td style="text-align:center;">
            <p style="float:left; margin-top:10px; margin-left:5px;">{{$i+1}}</p>
            <div style="clear:both;"></div>
          </td>
          <td>
            <p style="float:left; margin-top:10px;">{{$indikator[$i]}}</p>
            <div style="clear:both;"></div>
          </td>
          <td>
            <p style="float:left; margin-top:10px;">{{$materi[$i]}}</p>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal;width:80px;margin-top:10px;">
                @foreach ($subMateri as $key => $value)
                  @if ($value->parent_id_materi == $i+1)
                    <li>{{$value->sub_materi_pokok}}</li>
                  @endif
                @endforeach
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type: decimal; margin-top:10px;">
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
              <ul style="list-style-type: decimal; margin-top:10px;">
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
            <p style="float:left;margin-left:20px;margin-top:10px;">{{$waktu[$i]}}</p>
            <div style="clear:both;"></div>
          </td>
          <td>
            <div style="float:left;">
              <ul style="list-style-type:desc;margin-top:10px;">
                @if ($i == 0)
                  @foreach ($referensi as $key => $value)
                    @if ($key != $i || $key == $i)
                      <li>{{$value}}</li>
                    @endif
                  @endforeach
                @endif
              </ul>
            </div>
            <div style="clear:both;"></div>
          </td>
        </tr>
      @endfor
      <tr>
        <td colspan="6">Akumulasi Waktu</td>
        <td style="text-align:center;"><b>{{$total->sum()}}</b></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <br>
  <div>
    <label>Catatan Petugas Piket</label>
    <textarea>{{$catatan}}</textarea>
  </div>
</body>
</html>