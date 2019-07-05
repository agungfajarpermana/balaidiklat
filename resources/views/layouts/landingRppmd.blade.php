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

    <style media="screen">
      .next:hover{
        cursor: no-drop;
      }
    </style>
    <title>Balai Diklat PUPR Wilayah III Jakarta</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-light bg-secondary justify-content-between">
      <a class="nav-link btn btn-danger text-white" href="{{ route('diklat.home') }}">Home</a>
      <form class="form-inline" method="get">
        <input class="form-control mr-sm-3" type="search" name="search" placeholder="Cari dengan nip" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <br>
    <div class="container" style="padding:10px;width:80%;">

      @if ($page != 0)
        @foreach ($data as $key => $rppmd)
          <div class="card" style="margin-bottom:5px;">
            <div class="card-header">
              {{$rppmd->pengajar}} <span class="badge {{(Auth::user()) ? (Auth::user()->status == 1 || Auth::user()->status == 2) ? ($rppmd->status == 0) ? 'badge-primary' : 'badge-danger' : '' : ''}}">{{(Auth::user()) ? (Auth::user()->status == 1 || Auth::user()->status == 2) ? ($rppmd->status == 0) ? 'Read' : 'New' : '' : ''}}</span> <span class="text-right float-right">{{$rppmd->nip}}</span>
            </div>
            <div class="card-body">
              <div class="list-group">
                <a href="{{ route('rppmd.detail', $rppmd->getHashAttribute($rppmd->id)) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$rppmd->nama_pelatihan}}</h5>
                    <small>{{$rppmd->alokasi_waktu}} JP</small>
                  </div>
                  <p class="mb-1">{{$rppmd->deskripsi_singkat}}</p>
                  <small><span class="text-danger">Tag:</span> {{$rppmd->mata_pelatihan}}</small>
                </a>
              </div><br>
              <a href="{{ route('rppmd.duplicate.show', $rppmd->getHashAttribute($rppmd->id)) }}" class="btn btn-outline-danger">Duplicate</a>

              <a href="{{ route('print.rppmd', $rppmd->getHashAttribute($rppmd->id)) }}" class="btn btn-outline-success btn-pdf float-right" id="download">Download PDF</a>

            </div>
            {{ csrf_field() }}
          </div>
        @endforeach
        <br>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">

            @if ($pages == 1)
              <li class="page-item disabled next">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="?page={{($pages > 1) ? $pages-1 : 1}}&search={{$cari}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
            @endif

            @if ($row_start > 1)
              <li class="page-item"><a class="page-link" href="?page=1&search={{$cari}}">1</a></li>
              <li class="page-item disabled next"><a class="page-link">...</a></li>
            @endif

            @for ($i=$row_start; $i <= $end; $i++)
              <li class="page-item {{($pages == $i) ? 'active' : ''}}"><a class="page-link" href="?page={{$i}}&search={{$cari}}">{{$i}}</a></li>
            @endfor

            @if ($end < $last)
              <li class="page-item disabled next"><a class="page-link">...</a></li>
              <li class="page-item"><a class="page-link" href="?page={{$last}}&search={{$cari}}">{{$last}}</a></li>
            @endif

            @if ($pages == $page)
              <li class="page-item disabled next">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="?page={{($pages < $page) ? $pages+1 : $page}}&search={{$cari}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
            @endif

          </ul>
        </nav>
        @else
          <div class="card bg-light border-light" style="margin-bottom:32.7% !important;">
            <div class="card-body">
              <h1 class="text-center">Oopps !!</h1>
              <h1 class="text-center">Maaf, data tidak ditemukan..</h1>
            </div>
          </div>
      @endif

    </div>
    <br><br>
    <ul class="nav justify-content-center bg-secondary fixed-bottom">
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
    <script src="{{asset('js/jquery.printPage.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $(document).on('click', '#download', function(e){
          $(this).addClass('disabled');
          $(this).text('Generate');

          $.ajax({
            method: "GET",
            success: function(res){
              $('#download').removeClass('disabled');
              $('#download').text('Download PDF');
            }
          });
        });
      });
    </script>
