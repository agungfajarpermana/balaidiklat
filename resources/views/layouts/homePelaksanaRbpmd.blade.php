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
      <a class="nav-link btn btn-danger text-white" href="{{route('rbpmd.home')}}">Back</a>
      <p class="text-white mb-1">{{$pengajar}}</p>
    </nav>
    <br>
    <div class="container-fluid" style="padding:10px;">
      <div class="card">
        <h5 class="card-header text-center">
          RANCANG BANGUN PEMBELAJARAN MATA PELATIHAN
        </h5>
        <div class="card-body">
          <form action="#" method="post" id="form_submit">
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
                @for ($i=0; $i < count($indikator); $i++)
                  <tr class="text-center">
                    <th>{{$i+1}}</th>
                    <td style="width:250px !important;">
                      {{$indikator[$i]}}
                    </td>
                    <td style="width:250px !important;">
                      {{$materi[$i]}}
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-justify fetch_sub" id="dynamic_sub{{$i+1}}" data-index="{{$i+1}}" data-id="{{$id}}" style="padding:0px 10px 10px 10px;">

                      </ul>
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_metode" id="dynamic_metode{{$i+1}}" data-index="{{$i+1}}" data-id="{{$id}}">
                        <div class="collapse show" id="collapseExample">
                          <div class="card c_metode" id='tampil_met{{$i+1}}'>

                          </div>
                        </div>
                      </ul>
                    </td>
                    <td style="width:250px !important;">
                      <ul class="list-group list-group-flush text-dark text-left fetch_media" id="dynamic_media{{$i+1}}" data-index="{{$i+1}}" data-id="{{$id}}">
                        <div class="collapse show" id="collapseMedia">
                          <div class="card c_media" id='tampil_med{{$i+1}}'>

                          </div>
                        </div>
                      </ul>
                    </td>
                    <td style="width:100px !important;">
                      <div class="form-group">
                        <div class="" id="dynamic_first">
                          <input type="text" class="form-control text-center" name="waktu[]" disabled="disabled" id="alokasi_waktu" placeholder="" value="{{$waktu[$i]}}">
                        </div>
                      </div>
                    </td>
                  </tr>
                @endfor
                <tr>
                  <td colspan="6">Akumulasi Waktu</td>
                  <td class="text-center text-danger"><b>{{$total->sum()}}</b></td>
                </tr>
              </tbody>
            </table>
            <br>
            @if (Auth::user())
              @if (Auth::user()->status == 1 || Auth::user()->status == 2)
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"><b>Catatan Petugas Piket</b></label>
                      <textarea class="form-control" name="catatan" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan">{{$catatan}}</textarea>
                    </div>

                    <button class="btn btn-danger btn-block" id="submit_form" data-id="{{$id}}">Submit</button>
                    {{ csrf_field() }}
                  </div>
                </div>
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

        var i = 0;
        var index = $('.fetch_sub');
        index.each(function(x){
          i++;
          x++;

          var id    = $('#dynamic_sub'+i).attr('data-id');
          var index = $('#dynamic_sub'+i).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rbpmd.submateri')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#dynamic_sub'+x).html(data.isi);
              }
            }
          });
        });

        var y = 0;
        var index = $('.fetch_metode');
        index.each(function(n){
          y++;
          n++;

          var id    = $('#dynamic_metode'+y).attr('data-id');
          var index = $('#dynamic_metode'+y).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rbpmd.metode')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#tampil_met'+n).html(data.isi);
              }
            }
          });
        });

        var f = 0;
        var index = $('.fetch_media');
        index.each(function(g){
          f++;
          g++;

          var id    = $('#dynamic_media'+f).attr('data-id');
          var index = $('#dynamic_media'+f).attr('data-index');
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rbpmd.media')}}",
            data: {id:id,index:index,token:token},
            success: function(data){
              if(index == data.id){
                $('#tampil_med'+g).html(data.isi);
              }
            }
          });
        });

        $(document).on('click', '#submit_form', function(e) {
          e.preventDefault();

          var id    = $(this).attr('data-id');
          var val   = $('textarea[name="catatan"]').val();
          var token = $('input[name=_token]').val();

          $.ajax({
            method: "POST",
            url: "{{route('rbpmd.submit')}}",
            data: {id:id,val:val,token:token},
            beforeSend: function(){
              beforesendrequest();
            },
            success: function(res){
              if(res.status == true){
                swal({
                  position: 'top-right',
                  type: 'success',
                  title: "Good Job!",
                  text: res.msg,
                  showConfirmButton: false,
                  timer: 1000,
                  onClose: () => {
                    window.location.href = '{{route("rbpmd.home")}}';
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
            }
          });
        });
      });
    </script>
  </body>
</html>
