<?php

namespace App\Http\Controllers;

use PDF;
use Hashids;
use App\User;
use Carbon\Carbon;
use App\Models\RP_Model;
use App\Models\RP_2_Model;
use App\Models\RP_3_Model;
use App\Models\RP_4_Model;
use App\Models\RBPMD_Model;
use Illuminate\Http\Request;
use App\Models\RBPMD_3_Model;
use App\Models\RBPMD_4_Model;
use App\Models\RBPMD_5_Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ErrorFormDuplicateRbpmd;

class PelaksanaController extends Controller
{
  public function indexRbpmd(Request $request)
  {
    $db    = RBPMD_Model::count();
    $data  = RBPMD_Model::limit(5)->get();
    $limit = $data->count();

    if ($db > 50) {
      $link  = 8;
    } else if ($db > 10) {
      $link  = 5;
    }else{
      $link = 3;
    }

    $last  = ($db != 0) ? ceil($db / $limit) : 0;
    $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $search = isset($_GET['search']) ? (int) $_GET['search'] : '';

    if($page > $last){
      $page = $last;
    }

    $start     = ($page > 1) ? ($page * $limit) - $limit : 0;
    $row_start = (($page - $link) > 0) ? $page - $link : 1;
    $end       = (($page + $link) < $last) ? $page + $link : $last;

    if($search){
      $rbpmd        = RBPMD_Model::where('nip', 'like', '%'.$request->search.'%')
                                ->orderBy('status', '1')->orderBy('id', 'desc')->offset($start)->limit($limit)
                                ->get();
      $all          = RBPMD_Model::where('nip', 'like', '%'.$request->search.'%')->get();
      $total        = $all->count();
      $last         = ceil($total / $limit);

      if ($page > $last) {
        $page = $last;
      }
      $end          = (($page + $link) < $last) ? $page + $link : $last;
      $current_page = ceil($total / $limit);
    }else{
      $rbpmd        = RBPMD_Model::orderBy('status', '1')->orderBy('id', 'desc')->offset($start)->limit($limit)->get();
      $total        = RBPMD_Model::count();
      //cara mengatasi divizion by zero
      $current_page = ($total != 0) ? ceil($total / $limit) : 0;
    }

    return view('layouts.landingRbpmd', ['data' => $rbpmd, 'page' => $current_page, 'pages' => $page, 'cari' => $request->search, 'total' => $total, 'row_start' => $row_start, 'end' => $end, 'last' => $last]);
  }

  public function indexRppmd(Request $request)
  {
    $db    = RP_Model::count();
    $data  = RP_Model::limit(5)->get();
    $limit = $data->count();

    if ($db > 50) {
      $link  = 5;
    } else if ($db > 10) {
      $link  = 3;
    }else{
      $link = 2;
    }

    $last   = ($db != 0) ? ceil($db / $limit) : 0;//halaman terakhir
    $page   = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $search = isset($_GET['search']) ? (int) $_GET['search'] : '';

    if($page > $last){
      $page = $last;
    }

    $start      = ($page > 1) ? ($page * $limit) - $limit : 0;
    $row_start  = (($page - $link) > 0) ? $page - $link : 1;
    $end        = (($page + $link) < $last) ? $page + $link : $last;

    if($search){
      $rppmd        = RP_Model::where('nip', 'like', '%'.$request->search.'%')
                                ->orderBy('status', '1')->orderBy('id', 'desc')->offset($start)->limit($limit)
                                ->get();
      $all          = RP_Model::where('nip', 'like', '%'.$request->search.'%')->get();
      $total        = $all->count();
      $last         = ceil($total/$limit);

      if ($page > $last) {
        $page = $last;
      }

      $end          = (($page + $link) < $last) ? $page + $link : $last;
      $current_page = ceil($total / $limit);
    }else{
      $rppmd        = RP_Model::orderBy('status', '1')->orderBy('id', 'desc')->offset($start)->limit($limit)->get();
      $total        = RP_Model::count();
      //cara mengatasi divizion by zero
      $current_page = ($total != 0) ? ceil($total / $limit) : 0;
    }

    return view('layouts.landingRppmd', ['data' => $rppmd, 'page' => $current_page, 'pages' => $page, 'cari' => $request->search, 'total' => $total, 'last' => $last, 'row_start' => $row_start, 'end' => $end]);
  }

  public function indexTampilFasilitasPendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db  = RP_Model::orderBy('id', 'desc')->first();
      $db1 = RP_2_Model::where('tb_rp_id', $db->id)
                                  ->where('parent_id', $request->index)
                                  ->get();

      $output = '';
      foreach ($db1 as $key => $value) {
        $output .= '<li class="text-left" style="list-style:decimal;">'.$value->kegiatan_fasilitator.'</li>';
        $id = $value->parent_id;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  public function indexTampilFasilitasRppmd(Request $request)
  {
    if($request->ajax()){
      $db1 = RP_2_Model::where('tb_rp_id', $request->id)
                                  ->where('parent_id', $request->index)
                                  ->get();

      $output = '';
      foreach ($db1 as $key => $value) {
        $output .= '<li class="text-left" style="list-style:decimal;">'.$value->kegiatan_fasilitator.'</li>';
        $id = $value->parent_id;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  public function indexTampilPesertaRppmd(Request $request)
  {
    if($request->ajax()){
      $db1 = RP_3_Model::where('tb_rp_id', $request->id)
                                  ->where('parent_id', $request->index)
                                  ->get();

      $output = '';
      foreach ($db1 as $key => $value) {
        $output .= '<li class="text-left" style="list-style:decimal;">'.$value->kegiatan_peserta.'</li>';
        $id = $value->parent_id;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  //fungsi menampilkan metode secara otomatis
  public function indexTampilMetodeRppmd(Request $request)
  {
    if($request->ajax()){
      $db1 = RBPMD_4_Model::where('tb_rp_id', $request->id)
                                  ->where('parent_id_sub', $request->index)
                                  ->get();

      $output = '';
      foreach ($db1 as $key => $value) {
        $output .= '<li class="list-group-item">'.$value->metode.'</li>';
        $id = $value->parent_id_sub;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  //fungsi menampilkan media secara otomatis
  public function indexTampilMediaRppmd(Request $request)
  {
    if($request->ajax()){
      $db1 = RBPMD_5_Model::where('tb_rp_id', $request->id)
                                  ->where('parent_id_metode', $request->index)
                                  ->get();

      $output = '';
      foreach ($db1 as $key => $value) {
        $output .= '<li class="list-group-item">'.$value->alat_bantu.'</li>';
        $id = $value->parent_id_metode;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  //fungsi dari rencana bangun pembelajaran mata diklat
  public function tampilRbpmd($id)
  {
    $hash = Hashids::decode($id)[0];
    $db = RBPMD_Model::where('id', $hash)->first();
    $indikator = $db->indikator_hasil_belajar;
    $materi    = $db->materi_pokok;
    $waktu     = $db->waktu;
    $catatan   = $db->catatan;
    $pengajar  = $db->pengajar;
    $referensi = $db->referensi;

    $pisah_indi   = explode('|', $indikator);
    $pisah_materi = explode('|', $materi);
    $pisah_waktu  = explode('|', $waktu);
    $pisah_ref    = explode('|', $referensi);
    $total        = collect($pisah_waktu);

    if(Auth::user()){
      if(Auth::user()->status == 1 || Auth::user()->status == 2){
        RBPMD_Model::where('id', $hash)->update(['status' => 0]);
      }
    }

    return view('layouts.homePelaksanaRbpmd', ['indikator' => $pisah_indi, 'materi' => $pisah_materi, 'waktu' => $pisah_waktu, 'catatan' => $catatan, 'id' => $hash, 'pengajar' => $pengajar, 'referensi' => $pisah_ref, 'total' => $total]);
  }

  public function submitFormRbpmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_Model::where('id', $request->id)->update([
        'catatan' => $request->val
      ]);

      if($db){
        return response()->json(['status' => 'Berhasil Disimpan']);
      }
    }
  }

  public function tampilSubMateriRbpmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_3_Model::where('tb_rbpmd_id', $request->id)
                                  ->where('parent_id_materi', $request->index)
                                  ->get();

      $output = '';
      foreach ($db as $key => $value) {
        $output .= '<li class="text-left" style="list-style:decimal;">'.$value->sub_materi_pokok.'</li>';
        $id = $value->parent_id_materi;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  public function tampilMetodeRbpmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::where('tb_rbpmd_id', $request->id)
                                  ->where('parent_id_sub', $request->index)
                                  ->get();

      $output = '';
      foreach ($db as $key => $value) {
        $output .= '<li class="list-group-item">'.$value->metode.'</li>';
        $id = $value->parent_id_sub;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  public function tampilMediaRbpmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_5_Model::where('tb_rbpmd_id', $request->id)
                                  ->where('parent_id_metode', $request->index)
                                  ->get();

      $output = '';
      foreach ($db as $key => $value) {
        $output .= '<li class="list-group-item">'.$value->alat_bantu.'</li>';
        $id = $value->parent_id_metode;
      }

      return response()->json(['isi' => $output, 'id' => $id]);
    }
  }

  //fungsi dari rencana pembelajaran mata diklat
  public function tampilRppmd($id)
  {
    $hash  = Hashids::decode($id)[0];
    $db    = RP_Model::where('id', $hash)->first();
    $catat = $db->catatan;
    $pisah1= explode('|', $db->waktu);
    $list  = explode('|', $db->check_list);
    $head  = head($pisah1);
    $list_h= head($list);
    $last  = last($pisah1);
    $list_l= last($list);

    $pisah = explode('|', $db->materi_pokok);
    $count = count($pisah)+1;

    //menghapus elemen awal array
    $arr1      = array_shift($pisah1);
    $list_arr1 = array_shift($list);
    //menghapus elemen terkahir array
    $arr       = array_pop($pisah1);
    $list_arr  = array_pop($list);

    if(Auth::user()){
      if (Auth::user()->status == 1 || Auth::user()->status == 2) {
        $data = RP_Model::where('id', $hash)->update(['status' => 0]);
      }
    }

    $db2  = RP_2_Model::where('tb_rp_id', $hash)->where('parent_id', 0)->get();
    $db3  = RP_3_Model::where('tb_rp_id', $hash)->where('parent_id', 0)->get();
    $db4  = RBPMD_4_Model::where('tb_rp_id', $hash)->where('parent_id_sub', 0)->get();
    $db5  = RBPMD_5_Model::where('tb_rp_id', $hash)->where('parent_id_metode', 0)->get();

    $db6  = RP_2_Model::where('tb_rp_id', $hash)->where('parent_id', $count)->get();
    $db7  = RP_3_Model::where('tb_rp_id', $hash)->where('parent_id', $count)->get();
    $db8  = RBPMD_4_Model::where('tb_rp_id', $hash)->where('parent_id_sub', $count)->get();
    $db9  = RBPMD_5_Model::where('tb_rp_id', $hash)->where('parent_id_metode', $count)->get();

    return view('layouts.homePelaksanaRppmd',
    [
      'materi' => $pisah,
      'fasilitas' => $db2,
      'peserta' => $db3,
      'metode' => $db4,
      'media' => $db5,
      'fasilitas1' => $db6,
      'peserta1' => $db7,
      'metode1' => $db8,
      'media1' => $db9,
      'waktu_h' => $head,
      'waktu_l' => $last,
      'waktu_a' => $pisah1,
      'catatan' => $catat,
      'check'   => $list,
      'check_h' => $list_h,
      'check_l' => $list_l,
      'id' => $hash,
      'pengajar' => $db->pengajar
    ]);
  }

  public function createFasilitasRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::create([
        'kegiatan_fasilitator' => $request->val,
        'parent_id' => $request->id,
        'tb_rp_id' => $request->ids
      ]);

      if($db){
        $dataDB = RP_2_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteFasilitasRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createPesertaRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::create([
        'kegiatan_peserta' => $request->val,
        'parent_id' => $request->id,
        'tb_rp_id' => $request->ids
      ]);

      if($db){
        $dataDB = RP_3_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deletePesertaRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createLainMetodeRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::create([
        'metode' => $request->val,
        'parent_id_sub' => $request->id,
        'tb_rp_id' => $request->ids
      ]);

      if($db){
        $dataDB = RBPMD_4_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteLainMetodeRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createLainMediaRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_5_Model::create([
        'alat_bantu' => $request->val,
        'parent_id_metode' => $request->id,
        'tb_rp_id' => $request->ids
      ]);

      if($db){
        $dataDB = RBPMD_5_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteLainMediaRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_5_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createFasilitasPendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::create([
        'kegiatan_fasilitator' => $request->val,
        'parent_id' => 0,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RP_2_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteFasilitasPendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::where('id', $request->id)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createPesertaPendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::create([
        'kegiatan_peserta' => $request->val,
        'parent_id' => 0,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RP_3_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deletePesertaPendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createMetodePendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::create([
        'metode' => $request->val,
        'parent_id_sub' => 0,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RBPMD_4_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteMetodePendahuluanRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::where('id', $request->id)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createMediaPendahuluanRppmd(Request $request)
  {
    if ($request->ajax()) {
      $db = RBPMD_5_Model::create([
        'alat_bantu' => $request->val,
        'parent_id_metode' => 0,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RBPMD_5_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteMediaPendahuluanRppmd(Request $request){
    if($request->ajax()){
      $db = RBPMD_5_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createFasilitasPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::create([
        'kegiatan_fasilitator' => $request->val,
        'parent_id' => $request->index,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RP_2_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteFasilitasPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_2_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createPesertaPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::create([
        'kegiatan_peserta' => $request->val,
        'parent_id' => $request->index,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RP_3_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deletePesertaPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RP_3_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createMetodePenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::create([
        'metode' => $request->val,
        'parent_id_sub' => $request->index,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RBPMD_4_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteMetodePenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_4_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function createMediaPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_5_Model::create([
        'alat_bantu' => $request->val,
        'parent_id_metode' => $request->index,
        'tb_rp_id' => $request->id
      ]);

      if($db){
        $dataDB = RBPMD_5_Model::all();
        foreach ($dataDB as $key => $value) {
          $id = $value->id;
        }
        return response()->json([
          'status' => true,
          'id'     => $id
        ]);
      }
    }
  }

  public function deleteMediaPenutupRppmd(Request $request)
  {
    if($request->ajax()){
      $db = RBPMD_5_Model::where('id', $request->ids)->delete();
      return response()->json(['status' => 'berhasil']);
    }
  }

  public function submitFormPelaksana(Request $request)
  {
    if($request->ajax()){
      $waktu = implode('|', $request->waktu);
      $db = RP_Model::where('id', $request->id)->update([
        'waktu'   => $waktu,
        'catatan' => $request->catat
      ]);

      if($db){
        return response()->json(['status' => "Berhasil Disimpan"]);
      }
    }
  }

  public function duplicate($id)
  {
    $hash      = Hashids::decode($id)[0];
    $db        = RBPMD_Model::where('id', $hash)->first();
    $submateri = RBPMD_3_Model::where('tb_rbpmd_id', $hash)->get();
    $metode    = RBPMD_4_Model::where('tb_rbpmd_id', $hash)->get();
    $media     = RBPMD_5_Model::where('tb_rbpmd_id', $hash)->get();
    $indikator = explode('|', $db->indikator_hasil_belajar);
    $materi    = explode('|', $db->materi_pokok);
    $waktu     = explode('|', $db->waktu);
    $pengajar  = $db->pengajar;
    $collect   = collect($waktu);

    return view('layouts.duplicateRbpmd', 
      [
        'id' => $hash,
        'indikator'=>$indikator,
        'materi'=>$materi,
        'submateri'=>$submateri,
        'metode'=>$metode,
        'media'=>$media,
        'waktu'=>$waktu,
        'pengajar'=>$pengajar,
        'total' => $collect
      ]);
  }

  public function duplicatesubmit(ErrorFormDuplicateRbpmd $request)
  {
    if(!$request->ajax()) dd('Woow, Hayo mau ngapain!');
    $user      = RBPMD_Model::where('id', $request->id)->first();
    $indikator = implode('|', $request->indikator);
    $materi    = implode('|', $request->materi);
    $waktu     = implode('|', $request->waktu);

    $duplicate = RBPMD_Model::create([
      'nama_pelatihan' => $user->nama_pelatihan,
      'mata_pelatihan' => $user->mata_pelatihan,
      'alokasi_waktu'  => $user->alokasi_waktu,
      'hasil_belajar'  => $user->hasil_belajar,
      'indikator_hasil_belajar' => $indikator,
      'materi_pokok' => $materi,
      'waktu' => $waktu,
      'referensi' => $user->referensi,
      'deskripsi_singkat' => $user->deskripsi_singkat,
      'nip' => $request->nip,
      'pengajar' => $request->nama,
      'status' => 1,
      'duplicate'=> 1
    ]);

    for($i=0; $i < count($request->submateri); $i++){
      RBPMD_3_Model::create([
        'sub_materi_pokok' => $request->submateri[$i],
        'parent_id_materi' => $request->keysubmateri[$i],
        'tb_rbpmd_id' => $duplicate->id
      ]);
    }

    for($i=0; $i < count($request->metode); $i++){
      RBPMD_4_Model::create([
        'metode' => $request->metode[$i],
        'parent_id_sub' => $request->keymetode[$i],
        'tb_rbpmd_id' => $duplicate->id
      ]);
    }

    for($i=0; $i < count($request->media); $i++){
      RBPMD_5_Model::create([
        'alat_bantu' => $request->media[$i],
        'parent_id_metode' => $request->keymedia[$i],
        'tb_rbpmd_id' => $duplicate->id
      ]);
    }

    if($duplicate){
      return response()->json([
        'status' => true,
        'msg' => 'Berhasil Duplicate'
      ]);
    }
  }

  public function printPdfRbpmd($id)
  {
    $hash = Hashids::decode($id)[0];
    $db = RBPMD_Model::where('id', $hash)->first();
    $namaPelatihan = $db->nama_pelatihan;
    $mataPelatihan = $db->mata_pelatihan;
    $alokasiWaktu  = $db->alokasi_waktu;
    $deskripsi     = $db->deskripsi_singkat;
    $hasilBelajar  = $db->hasil_belajar;
    $indikator     = $db->indikator_hasil_belajar;
    $materi        = $db->materi_pokok;
    $waktu         = $db->waktu;
    $catatan       = $db->catatan;
    $referensi     = $db->referensi;

    $pisah_indi   = explode('|', $indikator);
    $pisah_materi = explode('|', $materi);
    $pisah_waktu  = explode('|', $waktu);
    $pisah_ref    = explode('|', $referensi);
    $collect      = collect($pisah_waktu);

    $db1 = RBPMD_3_Model::where('tb_rbpmd_id', $hash)->get();
    $db2 = RBPMD_4_Model::where('tb_rbpmd_id', $hash)->get();
    $db3 = RBPMD_5_Model::where('tb_rbpmd_id', $hash)->get();
    
    $data = ['indikator' => $pisah_indi, 'materi' => $pisah_materi, 'waktu' => $pisah_waktu, 'catatan' => $catatan, 'id' => $hash, 'nama' => $namaPelatihan, 'mata' => $mataPelatihan, 'alokasi' => $alokasiWaktu, 'deskripsi' => $deskripsi, 'hasil' => $hasilBelajar, 'subMateri' => $db1, 'metode' => $db2, 'media' => $db3, 'referensi' => $pisah_ref, 'total' => $collect];
    $pdf = PDF::loadView('layouts.printPdfRbpmd', $data)->setPaper('a4', 'portrait');
    return $pdf->download('rbpmd_'.Carbon::now()->format('d-m-Y').'.pdf');
    // return $pdf->stream();
    
  }

  public function printPdfRppmd($id)
  {
    setlocale(LC_TIME, 'Indonesian');
    $now   = Carbon::now();
    $date  = $now->formatlocaLized('%d %B %Y');

    $hash  = Hashids::decode($id)[0];
    $db    = RP_Model::where('id', $hash)->first();
    $namaPelatihan = $db->nama_pelatihan;
    $mataPelatihan = $db->mata_pelatihan;
    $waktu         = $db->alokasi_waktu;
    $deskripsi     = $db->deskripsi_singkat;
    $hasil         = $db->hasil_belajar;
    $indikator     = $db->indikator_hasil_belajar;

    $refer = explode('|', $db->referensi);
    $pisah1= explode('|', $db->waktu);
    $check = explode('|', $db->check_list);
    $pisah_indi   = explode('|', $indikator);

    $head      = head($pisah1);
    $headCheck = head($check);
    $last      = last($pisah1);
    $lastCheck = last($check);

    $pisah = explode('|', $db->materi_pokok);
    $count = count($pisah)+1;
    //menghapus elemen awal array
    $arr1      = array_shift($pisah1);
    $arrCheck  = array_shift($check);
    //menghapus elemen terkahir array
    $arr       = array_pop($pisah1);
    $checkArr  = array_pop($check);

    $db_fas = RP_2_Model::where('tb_rp_id', $hash)->get();
    $db_pes = RP_3_Model::where('tb_rp_id', $hash)->get();
    $db_eva = RP_4_Model::where('tb_rp_id', $hash)->get();
    $db_met = RBPMD_4_Model::where('tb_rp_id', $hash)->get();
    $db_med = RBPMD_5_Model::where('tb_rp_id', $hash)->get();
// dd(count($refer));
    if($db_eva->count() != 0){
      $eva = 'true';
    }else{
      $eva = 'false';
    }

    $data = ['materi' => $pisah,
      'fasilitas' => $db_fas,
      'peserta' => $db_pes,
      'metode' => $db_met,
      'media' => $db_med,
      'waktu_a' => $pisah1,
      'waktu_h' => $head,
      'waktu_l' => $last,
      'jumlah' => $count,
      'catatan' => $db->catatan,
      'referensi' => $refer,
      'evaluasi' => $db_eva,
      'checkHead' => $headCheck,
      'checkLast' => $lastCheck,
      'check' => $check,
      'date' => $date,
      'pengajar' => $db->pengajar,
      'nip' => $db->nip,
      'nama' => $namaPelatihan,
      'mata' => $mataPelatihan,
      'alokasi' => $waktu,
      'deskripsi' => $deskripsi,
      'hasil' => $hasil,
      'indikator' => $pisah_indi,
      'validasi' => $eva
    ];

    $pdf = PDF::loadView('layouts.printPdfRppmd', $data)->setPaper('a4', 'portrait');
    return $pdf->download('rppmd_'.Carbon::now()->format('d-m-Y').'.pdf');
    // return $pdf->stream();
  }

  public function notifikasiRBPMD(Request $request)
  {
    if($request->ajax()){
      $data  = RBPMD_Model::where('status', '1')->get();
      $rbpmd = $data->count();

      return response()->json(['total' => $rbpmd]);
    }
  }

  public function notifikasiRPPMD(Request $request)
  {
    if($request->ajax()){
      $data  = RP_Model::where('status', '1')->get();
      $rppmd = $data->count();

      return response()->json(['total' => $rppmd]);
    }
  }
}
