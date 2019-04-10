<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrorFormDuplicatePelaksanaRppmd;
use App\Http\Requests\ErrorFromDuplicateRppmd;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ErrorFormRp2;
use App\Models\RBPMD_5_Model;
use App\Models\RBPMD_4_Model;
use App\Models\RBPMD_3_Model;
use Illuminate\Http\Request;
use App\Models\RBPMD_Model;
use App\Models\RP_2_Model;
use App\Models\RP_3_Model;
use App\Models\RP_4_Model;
use App\Models\RP_Model;
use App\Models\NM_Model;
use App\Models\MT_Model;
use App\Models\AW_Model;
use Hashids;
use DB;

class RencanaPembelajaranController extends Controller
{
    public function index(Request $request)
    {
      $data  = NM_Model::all();
      return view('layouts/homeRencanaPembelajaran', ['datas' => $data]);
    }

    public function ValidasiNip(Request $request)
    {
      if($request->ajax()){
        $user = RBPMD_Model::where('nip', $request->nip)->where('created', 1)->first();
        if($user){
          return response()->json(['status'=>true,'nip'=>$user->nip]);
        }
        return response()->json(['status'=>false]);
      }
    }

    public function storeRencanaPembelajaranNama(Request $request)
    {
      if($request->ajax()){
        $nama_pelatihan = $request->nama_pelatihan;
        $data = MT_Model::where('id_nama_pelatihan', $nama_pelatihan)->get();

        $output = '<option value="" selected disabled>PILIH</option>';
        foreach ($data as $datas) {
          $output .= '<option value="'.$datas->id_mata_pelatihan.'">'.$datas->mata_pelatihan.'</option>';
        }

        return response()->json($output);
      }
    }

    public function storeRencanaPembelajaranMata(Request $request)
    {
      if($request->ajax()){
        $data   = RBPMD_Model::where('nip', $request->nip)->where('created', 1)->first();
        $data_s = RBPMD_3_Model::where('tb_rbpmd_id', $data->id)->get();

        $indikator    = explode('|', $data->indikator_hasil_belajar);
        $materi_pokok = explode('|', $data->materi_pokok);

        if($data){
          return response()->json([
            'alokasi_waktu' => $data->alokasi_waktu,
            'deskripsi'     => $data->deskripsi_singkat,
            'hasil'         => $data->hasil_belajar,
            'indikator'     => $indikator,
            'materi'        => $materi_pokok,
            'subMateri'     => $data_s,
          ]);
        }
      }
    }

    public function sesiRencanaPembelajaran(Request $request)
    {
      //ErrorFormRp1
      if($request->ajax()){

        $data  = RBPMD_Model::where('nip', $request->id)->first();
        $nama_pelatihan = $request->nama_pelatihan;
        $mata_pelatihan = $request->mata_pelatihan;

        $db_nama_pelatihan = NM_Model::where('id_nama_pelatihan', $nama_pelatihan)->first();
        $db_mata_pelatihan = MT_Model::where('id_mata_pelatihan', $mata_pelatihan)->first();

        $request->session()->put('alokasi_waktu',$request->waktu);
        $request->session()->put('deskripsi', $request->deskripsi);
        $request->session()->put('hasil', $request->hasil);
        $request->session()->put('nama_pelatihan', $db_nama_pelatihan->nama_pelatihan);
        $request->session()->put('mata_pelatihan', $db_mata_pelatihan->mata_pelatihan);
        $request->session()->put('indikator', $data->indikator_hasil_belajar);
        $request->session()->put('materi', $data->materi_pokok);
        $request->session()->put('nip', $request->id);
        $request->session()->put('referensi', $data->referensi);

        if($data){
          return response()->json([
            'status' => true,
            'msg'    => 'Berhasil'
          ]);
        }
      }
    }

    public function indexLanjut(Request $request)
    {
      if(!$request->session()->get('nip')) return redirect('/diklat');
      
      $user   = RBPMD_Model::where('nip', $request->session()->get('nip'))->where('created', 1)->first();

      $materi_pokok = $request->session()->get('materi');
      $materi = explode('|', $materi_pokok);
      $count  = collect([$materi])->flatten()->count();

      return view('layouts/homeRencanaPembelajaranLanjut',['data' => $materi, 'no' => $count]);
    }

    public function indexTampilMetode(Request $request)
    {
      if($request->ajax()){
        $db   = RBPMD_Model::where('nip', $request->session()->get('nip'))->where('created', 1)->first();
        $data = RBPMD_4_Model::where('parent_id_sub', $request->index)->where('tb_rbpmd_id', $db->id)->get();
        
        $output = '';
        foreach ($data as $key => $value) {
          $output .= '<li class="list-group-item">'.$value->metode.'</li>';
          $id = $value->parent_id_sub;
        }

        return response()->json(['isi' => $output, 'id' => $id]);
      }
    }

    public function indexTampilMedia(Request $request)
    {
      if($request->ajax()){
        $db   = RBPMD_Model::where('nip', $request->session()->get('nip'))->where('created', 1)->first();
        $data = RBPMD_5_Model::where('parent_id_metode', $request->index)->where('tb_rbpmd_id', $db->id)->get();

        $output = '';
        foreach ($data as $key => $value) {
          $output .= '<li class="list-group-item">'.$value->alat_bantu.'</li>';
          $id = $value->parent_id_metode;
        }

        return response()->json(['isi' => $output, 'id' => $id]);
      }
    }

    public function sesiRencanaPembelajaranLanjut(ErrorFormRp2 $request)
    {
      if(!$request->session()->get('nip')) return redirect('/diklat');
      
      if($request->ajax()){
        $fasilitator = collect([$request->fasilitaspenda,$request->fasilitas,$request->fasilitaspenutup])->flatten();
        $keyfasilitator = collect([$request->keyfasilitaspenda,$request->keyfasilitas,$request->keyfasilitaspenutup])->flatten();
        $peserta     = collect([$request->pesertapenda,$request->peserta,$request->pesertapenutup])->flatten();
        $keypeserta  = collect([$request->keypesertapenda,$request->keypeserta,$request->keypesertapenutup])->flatten();
        $metode      = collect([$request->metodependa,$request->metode,$request->metodepenutup])->flatten();
        $keymetode   = collect([$request->keymetodependa,$request->keymetode,$request->keymetodepenutup])->flatten();
        $media       = collect([$request->mediapenda,$request->media,$request->mediapenutup])->flatten();
        $keymedia    = collect([$request->keymediapenda,$request->keymedia,$request->keymediapenutup])->flatten();
        $alokasi_waktu  = collect([$request->waktu])->flatten();

        // set session
        $request->session()->put('fasilitator', $fasilitator);
        $request->session()->put('keyfasilitator', $keyfasilitator);
        $request->session()->put('peserta', $peserta);
        $request->session()->put('keypeserta', $keypeserta);
        $request->session()->put('metodes', $metode);
        $request->session()->put('keymetodes', $keymetode);
        $request->session()->put('medias', $media);
        $request->session()->put('keymedias', $keymedia);
        $request->session()->put('waktu', $alokasi_waktu);
      }
    }

    public function indexLanjut1(Request $request)
    {
      if(!$request->session()->get('nip')) return redirect('/diklat');

      $db  = RBPMD_Model::where('nip', $request->session()->get('nip'))->where('created', 1)->first();
    
      $request->session()->put('id_rbpmd', $db->id);
      $request->session()->put('pengajar', $db->pengajar);
      $concatMateri    = explode('|', $db->materi_pokok);
      $concatReferensi = explode('|', $db->referensi);

      return view('layouts/homeRencanaPembelajaranLanjuts', ['referensi' => $concatReferensi, 'materi' => $concatMateri]);
    }

    public function subMateriRencanaPembelajaranLanjut1(Request $request)
    {
      if($request->ajax()){
        // $db  = RBPMD_Model::where('nip', $request->session()->get('nip'))->where('created', 1)->first();
        $sub = RBPMD_3_Model::where('parent_id_materi', $request->id)->where('tb_rbpmd_id', $request->session()->get('id_rbpmd'))->get();

        $output = '';
        foreach ($sub as $key => $value) {
          $output .= '<li style="list-style:circle">'.$value->sub_materi_pokok.'</li>';
          $id = $value->parent_id_materi;
        }
        return response()->json(['data' => $output,'id' => $id]);
      }
    }

    public function statusRencanaPembelajaranLanjut1(Request $request)
    {
      if(!$request->session()->get('nip')) return redirect('/diklat');

      if($request->ajax()){
        try {
          DB::connection()->getPdo();
          DB::beginTransaction();
          try {
            $fasilitator   = $request->session()->get('fasilitator');
            $keyfasilitator= $request->session()->get('keyfasilitator');
            $peserta   = $request->session()->get('peserta');
            $keypeserta= $request->session()->get('keypeserta');
            $metode = $request->session()->get('metodes');
            $media  = $request->session()->get('medias');
            $evaluasi  = collect([$request->evalu])->flatten();
            $referensi = collect([$request->session()->get('referensi'),$request->referen])->flatten();
            
            if($evaluasi[0] == null){
              $evaluasi = collect()->flatten();
            }

            if($referensi[0] == null){
              $referensi = collect([$request->referen])->flatten();
            }else if($referensi[1] == null){
              $referensi = collect([$request->session()->get('referensi')])->flatten();
            }

            $x = '';
            $materi = explode('|', $request->session()->get('materi'));
            for ($i=0; $i < $count = count($materi)+2; $i++) {
              $x .= 'X'.'|';
              if($i == $count-2){
                $x .= 'X';
                break;
              }
            }

            $data = RP_Model::create([
              'nama_pelatihan' => $request->session()->get('nama_pelatihan'),
              'mata_pelatihan' => $request->session()->get('mata_pelatihan'),
              'alokasi_waktu'  => $request->session()->get('alokasi_waktu'),
              'hasil_belajar'  => $request->session()->get('hasil'),
              'deskripsi_singkat' => $request->session()->get('deskripsi'),
              'indikator_hasil_belajar' => $request->session()->get('indikator'),
              'materi_pokok'   => $request->session()->get('materi'),
              'waktu'          => $request->session()->get('waktu')->implode('|'),
              'referensi'      => $referensi->implode('|'),
              'nip'            => $request->session()->get('nip'),
              'pengajar'       => $request->session()->get('pengajar'),
              'check_list'     => $x,
              'status'         => 1,
              'tb_rbpmd_id'    => $request->session()->get('id_rbpmd')
            ]);

            for($i=0; $i < $fasilitator->count(); $i++){
              RP_2_Model::create([
                'kegiatan_fasilitator' => $fasilitator[$i],
                'parent_id' => $keyfasilitator[$i],
                'tb_rp_id'  => $data->id
              ]);
            }

            for($i=0; $i < $peserta->count(); $i++){
              RP_3_Model::create([
                'kegiatan_peserta' => $peserta[$i],
                'parent_id' => $keypeserta[$i],
                'tb_rp_id'  => $data->id
              ]);
            }

            for($i=0; $i < $evaluasi->count(); $i++){
              RP_4_model::create([
                'evaluasi' => $evaluasi[$i],
                'tb_rp_id' => $data->id
              ]);
            }

            RBPMD_Model::where('id', $request->session()->get('id_rbpmd'))->update([
              'created' => 2,
              'tb_rp_id' => $data->id
            ]);

            RBPMD_3_Model::where('tb_rbpmd_id', $request->session()->get('id_rbpmd'))->update([
              'tb_rp_id' => $data->id
            ]);

            RBPMD_4_Model::where('tb_rbpmd_id', $request->session()->get('id_rbpmd'))->update([
              'tb_rp_id' => $data->id
            ]);

            RBPMD_5_Model::where('tb_rbpmd_id', $request->session()->get('id_rbpmd'))->update([
              'tb_rp_id' => $data->id
            ]);

            for($i=0; $i < $metode->count(); $i++){
              RBPMD_4_Model::create([
                'metode' => $metode[$i],
                'parent_id_sub' => $request->session()->get('keymetodes')[$i],
                'tb_rbpmd_id' => $request->session()->get('id_rbpmd'),
                'tb_rp_id' => $data->id
              ]);
            }

            for($i=0; $i < $media->count(); $i++){
              RBPMD_5_Model::create([
                'alat_bantu' => $media[$i],
                'parent_id_metode' => $request->session()->get('keymedias')[$i],
                'tb_rbpmd_id' => $request->session()->get('id_rbpmd'),
                'tb_rp_id' => $data->id
              ]);
            }

            DB::commit();
            if($data){
              $request->session()->forget([
                'nama_pelatihan',
                'mata_pelatihan',
                'alokasi_waktu',
                'deskripsi',
                'hasil',
                'indikator',
                'materi',
                'nip',
                'referensi',
                'fasilitator',
                'keyfasilitator',
                'peserta',
                'keypeserta',
                'metodes',
                'keymetodes',
                'medias',
                'keymedias',
                'waktu'
              ]);
              return response()->json(['status'=>true,'msg'=>'Berhasil Disimpan!']);
            }
            
          } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false,'msg'=>'Ada masalah saat ingin melanjutkan ke form RPPMD!','error'=>$e->getMessage()]);
          }
        } catch (\Exception $e) {
          return response()->json(['status'=>false,'msg'=>'Koneksi Ke Database Terputus!','error'=>$e->getMessage()]);
        }
      }
    }

    public function duplicate($id)
    {
      $hash  = Hashids::decode($id)[0];
      $db    = RP_Model::where('id', $hash)->first();
      $refer = explode('|', $db->referensi);
      $pisah1= explode('|', $db->waktu);
      $head  = head($pisah1);
      $last  = last($pisah1);

      $pisah = explode('|', $db->materi_pokok);
      $count = count($pisah)+1;
      //menghapus elemen awal array
      $arr1  = array_shift($pisah1);
      //menghapus elemen terkahir array
      $arr   = array_pop($pisah1);

      $db_fas = RP_2_Model::where('tb_rp_id', $hash)->get();
      $db_pes = RP_3_Model::where('tb_rp_id', $hash)->get();
      $db_met = RBPMD_4_Model::where('tb_rp_id', $hash)->get();
      $db_med = RBPMD_5_Model::where('tb_rp_id', $hash)->get();

      return view('layouts.duplicateRppmd',
      [
        'materi' => $pisah,
        'fasilitas' => $db_fas,
        'peserta' => $db_pes,
        'metode' => $db_met,
        'media' => $db_med,
        'waktu_a' => $pisah1,
        'waktu_h' => $head,
        'waktu_l' => $last,
        'jumlah' => $count,
        'referensi' => $refer,
        'pengajar' => $db->pengajar,
        'id'  => $hash
      ]);
    }

    public function duplicateCreate(ErrorFromDuplicateRppmd $request)
    {
      if($request->ajax()){
        $rppmd  = RP_Model::where('id', $request->id)->first();
        $rbpmd  = RBPMD_Model::where('nip', $request->nip)->where('pengajar', $request->nama)->first();
        $evaluasi = RP_4_Model::where('tb_rp_id', $request->id)->get();
        
        if($rbpmd){
          if($rbpmd->duplicate == 1){
            $materi_all      = collect([$request->materi])->flatten();
            $fasilitas_all   = collect([$request->fasilitas_penda,$request->fasilitas,$request->fasilitas_penutup])->flatten();
            $peserta_all     = collect([$request->peserta_penda,$request->peserta,$request->peserta_penutup])->flatten();
            
            $metode_all      = collect([$request->metode_penda,$request->metode,$request->metode_penutup])->flatten();
            $media_all       = collect([$request->media_penda,$request->media,$request->media_penutup])->flatten();

            $waktu_all       = collect([$request->waktu])->flatten();
            $referensi_all   = collect([$request->ref])->flatten();

            $x = '';
            $materi = explode('|', $rppmd->materi_pokok);
            for ($i=0; $i < $count = count($materi)+2; $i++) {
              $x .= 'X'.'|';
              if($i == $count-2){
                $x .= 'X';
                break;
              }
            }

            $data = RP_Model::create([
              'nama_pelatihan'          => $rppmd->nama_pelatihan,
              'mata_pelatihan'          => $rppmd->mata_pelatihan,
              'alokasi_waktu'           => $rppmd->alokasi_waktu,
              'hasil_belajar'           => $rppmd->hasil_belajar,
              'deskripsi_singkat'       => $rppmd->deskripsi_singkat,
              'indikator_hasil_belajar' => $rppmd->indikator_hasil_belajar,
              'materi_pokok'            => $materi_all->implode('|'),
              'waktu'                   => $waktu_all->implode('|'),
              'referensi'               => $referensi_all->implode('|'),
              'pengajar'                => $request->nama,
              'nip'                     => $request->nip,
              'status'                  => 1,
              'tb_rbpmd_id'             => $rbpmd->id,
              'check_list'              => $x
            ]);

            RBPMD_Model::where('nip', $request->nip)->where('duplicate', 1)->update([
              'duplicate' => 2,
              'tb_rp_id' => $data->id
            ]);

            RBPMD_3_Model::where('tb_rbpmd_id', $rbpmd->id)->update([
              'tb_rp_id' => $data->id
            ]);

            RBPMD_4_Model::where('tb_rbpmd_id', $rbpmd->id)->delete();
            for($i=0; $i < $metode_all->count(); $i++){
              RBPMD_4_Model::create([
                'metode' => $metode_all->all()[$i],
                'parent_id_sub' => collect([$request->keymetodependa,$request->keymetode,$request->keymetodepenutup])->flatten()[$i],
                'tb_rbpmd_id' => $rbpmd->id,
                'tb_rp_id' => $data->id
              ]);
            }

            RBPMD_5_Model::where('tb_rbpmd_id', $rbpmd->id)->delete();
            for($i=0; $i < $media_all->count(); $i++){
              RBPMD_5_Model::create([
                'alat_bantu' => $media_all->all()[$i],
                'parent_id_metode' => collect([$request->keymediapenda,$request->keymedia,$request->keymediapenutup])->flatten()[$i],
                'tb_rbpmd_id' => $rbpmd->id,
                'tb_rp_id' => $data->id
              ]);
            }

            for($i=0; $i < $fasilitas_all->count(); $i++){
              RP_2_Model::create([
                'kegiatan_fasilitator' => $fasilitas_all->all()[$i],
                'parent_id' => collect([$request->keyfasilitas])->flatten()[$i],
                'tb_rp_id' => $data->id
              ]);
            }

            for($i=0; $i < $peserta_all->count(); $i++){
              RP_3_Model::create([
                'kegiatan_peserta' => $peserta_all->all()[$i],
                'parent_id' => collect([$request->keypeserta])->flatten()[$i],
                'tb_rp_id' => $data->id
              ]);
            }

            foreach ($evaluasi as $key => $value) {
              RP_4_Model::create([
                'evaluasi' => $value->evaluasi,
                'tb_rp_id' => $data->id
              ]);
            }
            return response()->json(['status'=>true]);
          }else{
            return response()->json(['status'=>false,'msg'=>'Silahkan Menduplicate Form Rancang Bangun Pembelajaran Mata Pelatihan Terlebih dahulu!']);
          }
        }else{
          return response()->json(['status'=>false,'msg'=>'NIP atau Pengajar Tidak Terdaftar!. Pastikan anda sudah menduplicate data RBPMD terlebih dahulu']);
        }
      }
    }

    public function duplicateSubmitForm(ErrorFormDuplicatePelaksanaRppmd $request)
    {
      if($request->ajax()){
        try {
          DB::connection()->getPdo();
          DB::beginTransaction();
          try {
            $waktu = collect([$request->waktu])->flatten()->implode('|');

            if (Auth::user()->status == 2) {
              $list  = collect([$request->check])->flatten()->implode('|');

              $db = RP_Model::where('id', $request->id)->update([
                'waktu'      => $waktu,
                'catatan'    => $request->catatan,
                'check_list' => $list
              ]);
            }else{
              $db = RP_Model::where('id', $request->id)->update([
                'waktu'      => $waktu,
                'catatan'    => $request->catatan,
              ]);
            }

            $data = RBPMD_Model::where('tb_rp_id', $request->id)->first();

            RBPMD_4_Model::where('tb_rp_id', $request->id)->update([
              'tb_rbpmd_id' => $data->id
            ]);

            RBPMD_5_Model::where('tb_rp_id', $request->id)->update([
              'tb_rbpmd_id' => $data->id
            ]);

            DB::commit();
            return response()->json(['status' => true,'msg'=>'Ok!']);
          } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false,'msg'=>'Ada masalah saat ingin melanjutkan form RPPMD!','error'=>$e->getMessage()]);
          }
        } catch (\Exception $e) {
          return response()->json(['status'=>false,'msg'=>'Koneksi Ke Database Terputus!','error'=>$e->getMessage()]);
        }
      }
    }
}
