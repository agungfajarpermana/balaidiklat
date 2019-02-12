<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Modul_Model;
use Illuminate\Http\Request;

class ModulPembelajaranController extends Controller
{
    public function index()
    {
        $modul = Modul_Model::orderBy('id', 'desc')->paginate(3);
        return view('layouts.modul', ['moduls'=>$modul]);
    }

    public function indexOwner()
    {
        $modul = Modul_Model::orderBy('id', 'desc')->paginate(15);
        return view('layouts.modul_owner', ['moduls'=>$modul]);
    }

    public function showmodulall()
    {
        $output = '';
        $moduls = Modul_Model::orderBy('id', 'desc')->paginate(15);

        foreach($moduls as $key => $modul){
            $output .= '<div class="col-sm-4 mb-3 list" id="modul'.$modul->id.'">
                            <div class="media">
                            <img class="mr-3 rounded" src="'.($modul->extensi == 'docx' ? asset('image/word.png') : ($modul->extensi == 'pdf' ? asset('image/pdflong.png') : asset('image/word.png'))).'" alt="Modul" width="80" height="80">
                            <div class="media-body">
                                <h6 class="mt-0">
                                <i>Modul '.$modul->judul.'</i>
                                </h6>
                                <a href="'.route('download', $modul->id).'" class="btn btn-sm btn-outline-success download'.$modul->id.'" id="download" data-id="'.$modul->id.'">Download</a>
                                </div>
                            </div>
                        </div>';
        }

        return response()->json([
            'output'=>$output, 
            'page'=>$moduls->currentPage(),
            'total' => $moduls->count(),
            'last'=>$moduls->lastPage(), 
            'data'=>$moduls->total(), 
            'next'=>$moduls->nextPageUrl(), 
            'previous'=>$moduls->previousPageUrl()
        ]);
    }

    public function showmodulowner()
    {
        $output = '';
        $moduls = Modul_Model::orderBy('id', 'desc')->paginate(15);

        foreach($moduls as $key => $modul){
            $output .= '<div class="col-sm-4 mb-3 list" id="modul'.$modul->id.'">
                            <div class="media">
                            <img class="mr-3 rounded" src="'.($modul->extensi == 'docx' ? asset('image/word.png') : ($modul->extensi == 'pdf' ? asset('image/pdflong.png') : asset('image/word.png'))).'" alt="Modul" width="80" height="80">
                            <div class="media-body">
                                <h6 class="mt-0">
                                <i>'.$modul->judul.'</i>
                                </h6>
                                <a href="'.route('download', $modul->id).'" class="btn btn-sm btn-outline-success download'.$modul->id.'" id="download" data-id="'.$modul->id.'">Download</a>
                                <a href="#" class="btn btn-sm btn-outline-danger delete'.$modul->id.'" id="delete" data-id="'.$modul->id.'">Delete</a>
                            </div>
                            </div>
                        </div>';
        }

        return response()->json([
            'output'=>$output, 
            'page'=>$moduls->currentPage(),
            'total' => $moduls->count(), 
            'last'=>$moduls->lastPage(), 
            'data'=>$moduls->total(), 
            'next'=>$moduls->nextPageUrl(), 
            'previous'=>$moduls->previousPageUrl()
        ]);
    }

    public function searchModul(Request $request)
    {
        if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $output = '';
        $moduls = Modul_Model::where('judul', 'like','%'.$request->search.'%')->paginate(15);
        
        foreach($moduls as $key => $modul){
            $output .= '<div class="col-sm-4 mb-3 list" id="modul'.$modul->id.'">
                            <div class="media">
                            <img class="mr-3 rounded" src="'.($modul->extensi == 'docx' ? asset('image/word.png') : ($modul->extensi == 'pdf' ? asset('image/pdflong.png') : asset('image/word.png'))).'" alt="Modul" width="80" height="80">
                            <div class="media-body">
                                <h6 class="mt-0">
                                <i>'.$modul->judul.'</i>
                                </h6>
                                <a href="'.route('download', $modul->id).'" class="btn btn-sm btn-outline-success download'.$modul->id.'" id="download" data-id="'.$modul->id.'">Download</a>';
                                if(Auth::user()){
                                    if(Auth::user()->status == 2){
                                        $output .= '<a href="#" class="btn btn-sm btn-outline-danger delete'.$modul->id.'" id="delete" data-id="'.$modul->id.'">Delete</a>';
                                    }
                                }
                    $output .= '</div>
                            </div>
                        </div>';
        }

        return response()->json([
            'output'=>$output, 
            'page'=>$moduls->currentPage(),
            'total' => $moduls->count(), 
            'last'=>$moduls->lastPage(), 
            'data'=>$moduls->total(), 
            'next'=>$moduls->nextPageUrl(), 
            'previous'=>$moduls->previousPageUrl()
        ]);
    }

    public function searchModulOwner(Request $request)
    {
        if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $output = '';
        $moduls = Modul_Model::where('judul', 'like','%'.$request->search.'%')->paginate(15);
        
        foreach($moduls as $key => $modul){
            $output .= '<div class="col-sm-4 mb-3 list" id="modul'.$modul->id.'">
                            <div class="media">
                            <img class="mr-3 rounded" src="'.($modul->extensi == 'docx' ? asset('image/word.png') : ($modul->extensi == 'pdf' ? asset('image/pdflong.png') : asset('image/word.png'))).'" alt="Modul" width="80" height="80">
                            <div class="media-body">
                                <h6 class="mt-0">
                                <i>'.$modul->judul.'</i>
                                </h6>
                                <a href="'.route('download', $modul->id).'" class="btn btn-sm btn-outline-success download'.$modul->id.'" id="download" data-id="'.$modul->id.'">Download</a>
                                <a href="#" class="btn btn-sm btn-outline-danger delete'.$modul->id.'" id="delete" data-id="'.$modul->id.'">Delete</a>
                                </div>
                            </div>
                        </div>';
        }

        return response()->json([
            'output'=>$output, 
            'page'=>$moduls->currentPage(),
            'total' => $moduls->count(), 
            'last'=>$moduls->lastPage(), 
            'data'=>$moduls->total(), 
            'next'=>$moduls->nextPageUrl(), 
            'previous'=>$moduls->previousPageUrl()
        ]);
    }

    public function uploadFile(Request $request)
    {
        if(!$request->ajax()) dd('Wow, hayo mau ngapain!');

        $image = $request->file('file');
        if($request->hasFile('file')){
            $filename = explode('.',$image->getClientOriginalName())[0];
            $title    = preg_replace(['/_/','/-/','/,/'], [' ',' ',' '], $filename);
            $path     = str_replace(' ','_',$title.'_'.time());
            $basename = $path.'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('upload'), $basename);
            Modul_Model::create([
                'judul' => $title,
                'file'  => $path,
                'extensi' => $image->getClientOriginalExtension()
            ]);
        }
    }

    public function downloadFile($id)
    {
        // if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $modul = Modul_Model::findOrFail($id);
        return response()->download(public_path('upload/'.$modul->file.'.'.$modul->extensi));
    }

    public function deleteFile(Request $request)
    {
        if(!$request->ajax()) dd('Woow, hayo mau ngapain!');

        $image = Modul_Model::findOrFail($request->id);

        if(file_exists(public_path('upload/'.$image->file.'.'.$image->extensi))){
            unlink(public_path('upload/'.$image->file.'.'.$image->extensi));
            $delete = $image->delete();

            if($delete){
                return response()->json(['status'=>true,'msg'=>'Berhasil dihapus!']);
            }
        }else{
            $delete = $image->delete();
            return response()->json(['status'=>true,'msg'=>'Berhasil dihapus!']);
        }
    }
}
