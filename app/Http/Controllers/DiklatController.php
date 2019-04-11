<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrorFormRbpmd1;
use App\Http\Requests\ErrorFormRbpmd2;
use App\Models\RBPMD_5_Model;
use App\Models\RBPMD_4_Model;
use App\Models\RBPMD_3_Model;
use App\Models\RBPMD_2_Model;
use Illuminate\Http\Request;
use App\Models\RBPMD_Model;
use App\Models\RP_Model;
use App\Models\NM_Model;
use App\Models\MT_Model;
use App\Models\AW_Model;
use DB;

class DiklatController extends Controller
{
    public function index()
    {
      //model nama pelatihan
      $data = NM_Model::all();
      return view('layouts/home', ['n_pelatihan' => $data]);
    }

    public function storeMataPelatihan(Request $request)
    {
      if($request->ajax()){
        //dynamic dropdown
        $nama_pelatihan = $request->namaPelatihan;
        $data = MT_Model::where('id_nama_pelatihan', $nama_pelatihan)->get();

        $output = '<option value="" selected disabled>PILIH</option>';
        foreach ($data as $datas) {
          $output .= '<option value="'.$datas->id_mata_pelatihan.'">'.$datas->mata_pelatihan.'</option>';
        }

        return response()->json($output);
      }
    }

    public function storeAlokasiWaktu(Request $request)
    {
      if($request->ajax()){
        //dynamic dropdown
        $mata_pelatihan = $request->mataPelatihan;
        $data = AW_Model::where('id_mata_pelatihan', $mata_pelatihan)->get();

        $output = '<option value="" selected disabled>PILIH</option>';
        foreach ($data as $datas) {
          $output .= '<option value="'.$datas->id_alokasi_waktu.'">'.$datas->alokasi_waktu.'</option>';
        }

        return response()->json($output);
      }
    }

    public function createSubmitFormRbpmd(ErrorFormRbpmd1 $request)
    {
      if($request->ajax()){
        $indikator       = collect([$request->indikator])->flatten();
        $materi          = collect([$request->materi])->flatten();

        if($indikator->count() == $materi->count()){
          $dataNamaPelatihan = NM_model::where('id_nama_pelatihan', $request->nama_pelatihan)->first();
          $dataMataPelatihan = MT_model::where('id_mata_pelatihan', $request->mata_pelatihan)->first();
          $dataAlokasiWaktu  = AW_model::where('id_alokasi_waktu', $request->alokasi_waktu)->first();

          //set session
          $request->session()->put('nama_pelatihan', $dataNamaPelatihan->nama_pelatihan);
          $request->session()->put('mata_pelatihan', $dataMataPelatihan->mata_pelatihan);
          $request->session()->put('alokasi_waktu', $dataAlokasiWaktu->alokasi_waktu);
          $request->session()->put('deskripsi', $request->deskripsi);
          $request->session()->put('hasil', $request->hasil);
          $request->session()->put('indikator', $indikator);
          $request->session()->put('materi', $materi);

          return response()->json(['status' => true]);
        }else{
          return response()->json([
            'status' => false,
            'msg'    => 'jumlah "Indikator Hasil Belajar" harus sama dengan jumlah "Materi Pokok"'
          ]);
        }
      }
    }

    public function indexFormRbpmd2(Request $request)
    {
      if(!$request->session()->get('indikator')) return redirect('/diklat');
      //store session
      $indikator      = $request->session()->get('indikator');
      $materi         = $request->session()->get('materi');

      return view('layouts/homeSecond', ['indikator' => $indikator, 'materi' => $materi]);
    }

    // public function arrayMetodeFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $count = count($request->metode);
    //     $metode = [];
    //     for ($i=0; $i < $count; $i++) {
    //       $metode[]    = $request->metode[$i];
    //       $arrayMetode = array_prepend($metode, $request->metode[$i]);
    //     }
    //     $db = RBPMD_4_Model::create([
    //       'metode'         => $arrayMetode[$i],
    //       'parent_id_sub'  => $request->id,
    //       'tb_rbpmd_id'    => $request->session()->get('id_db')
    //     ]);

    //     if($db){
    //       $dataDB = RBPMD_4_Model::all();
    //       foreach ($dataDB as $key => $value) {
    //         $id = $value->id;
    //       }
    //       return response()->json([
    //         'status' => true,
    //         'id'     => $id
    //       ]);
    //     }
    //   }
    // }

    // public function arrayMediaFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $count = count($request->media);
    //     $media = [];
    //     for ($i=0; $i < $count; $i++) {
    //       $media[]    = $request->media[$i];
    //       $arrayMedia = array_prepend($media, $request->media[$i]);
    //     }
    //     $db = RBPMD_5_Model::create([
    //       'alat_bantu'        => $arrayMedia[$i],
    //       'parent_id_metode'  => $request->id,
    //       'tb_rbpmd_id'       => $request->session()->get('id_db')
    //     ]);

    //     if($db){
    //       $dataDB = RBPMD_5_Model::all();
    //       foreach ($dataDB as $key => $value) {
    //         $id = $value->id;
    //       }
    //       return response()->json([
    //         'status' => true,
    //         'id'     => $id
    //       ]);
    //     }
    //     dd($db);
    //   }
    // }

    // public function arraySubMateriFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $db = RBPMD_3_Model::create([
    //       'sub_materi_pokok'  => $request->val,
    //       'parent_id_materi'  => $request->id,
    //       'tb_rbpmd_id'       => $request->session()->get('id_db')
    //     ]);

    //     if($db){
    //       $db1 = RBPMD_3_Model::all();
    //       foreach ($db1 as $key => $value) {
    //         $id = $value->id;
    //       }

    //       return response()->json(['id' => $id]);
    //     }
    //   }
    // }

    // public function arraySubMateriDeleteFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $db = RBPMD_3_Model::where('id', $request->ids)->delete();
    //     return response()->json(['status' => 'berhasil']);
    //   }
    // }

    // public function arrayDeleteMetodeFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $db = RBPMD_4_Model::where('id', $request->id_close)->delete();
    //     return response()->json([
    //       'status' => true,
    //     ]);
    //   }
    // }

    // public function arrayDeleteMediaFormRbpmd2(Request $request)
    // {
    //   if($request->ajax()){
    //     $db = RBPMD_5_Model::where('id', $request->id_close)->delete();
    //     return response()->json([
    //       'status' => true,
    //     ]);
    //   }
    // }

    public function createSubmitFormRbpmd2(ErrorFormRbpmd2 $request)
    {
      //ErrorFormRbpmd2
      if($request->ajax()){
        try {
          DB::connection()->getPdo();
          DB::beginTransaction();
          try {
            $indikator        = collect([$request->session()->get('indikator')])->flatten()->implode('|');
            $materi           = collect([$request->session()->get('materi')])->flatten()->implode('|');
            $submateri        = collect([$request->submateri])->flatten();
            $metode           = collect([$request->metode])->flatten();
            $media            = collect([$request->media])->flatten();
            $waktu            = collect([$request->total])->flatten()->implode('|');
            $referensi        = collect([$request->ref])->flatten();
            
            if($referensi[0] == null){
              $referensi = collect()->flatten();
            }else{
              $referensi->implode('|');
            }
            //database
            $data = RBPMD_Model::create([
              'nama_pelatihan'          => $request->session()->get('nama_pelatihan'),
              'mata_pelatihan'          => $request->session()->get('mata_pelatihan'),
              'alokasi_waktu'           => $request->session()->get('alokasi_waktu'),
              'hasil_belajar'           => $request->session()->get('hasil'),
              'indikator_hasil_belajar' => $indikator,
              'materi_pokok'            => $materi,
              'waktu'                   => $waktu,
              'referensi'               => $referensi,
              'deskripsi_singkat'       => $request->session()->get('deskripsi'),
              'pengajar'                => $request->nama,
              'nip'                     => $request->nip,
              'status'                  => 1,
              'created'                 => 1
            ]);

            for($i=0; $i < $submateri->count(); $i++){
              RBPMD_3_Model::create([
                'sub_materi_pokok' => $submateri[$i],
                'parent_id_materi' => $request->indexsubmateri[$i],
                'tb_rbpmd_id' => $data->id
              ]);
            }

            for($i=0; $i < $metode->count(); $i++){
              RBPMD_4_Model::create([
                'metode' => $metode[$i],
                'parent_id_sub' => $request->indexmetode[$i],
                'tb_rbpmd_id' => $data->id
              ]);
            }

            for($i=0; $i < $media->count(); $i++){
              RBPMD_5_Model::create([
                'alat_bantu' => $media[$i],
                'parent_id_metode' => $request->indexmedia[$i],
                'tb_rbpmd_id' => $data->id
              ]);
            }

            if($data){
              //delete session
              $request->session()->forget([
                'nama_pelatihan',
                'mata_pelatihan',
                'alokasi_waktu',
                'deskripsi',
                'hasil',
                'indikator',
                'materi'
              ]);

              DB::commit();
              return response()->json([
                'status' => true,
                'msg'    => 'Berhasil Disimpan...'
              ]);
            }
          } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false,'mag'=>'Ada masalah saat memasukan data RBPMD','error'=>$e->getMessage()]);
          }
        } catch (\Exception $e) {
          return response()->json(['status'=>false,'msg'=>'Koneksi Ke Database Terputus!','error'=>$e->getMessage()]);
        }
      }
    }

    public function storeFormRbpmd()
    {
      $data = RBPMD_Model::orderBy('id', 'desc')->first();
      //$data = RBPMD_Model::all();
      $datas = explode("|", $data->materi_pokok);

      //for ($i=0; $i < count($datas); $i++) {
      //  $value = $datas[$i].'<br>';
      //  echo $value;
      //}

      return view('layouts/tampilRbpmd', ['value' => $datas]);
    }
}
