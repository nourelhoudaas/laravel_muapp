<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Departement;
use App\Models\Employe;
use App\Models\Fichier;
use App\Models\Stocke;
use App\Models\Dossier;
class UploadFile extends Controller
{
    //
    public function uploadFile(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'id_nin'=>'required|integer',
        ]);
        $id=$request->get('id_nin');
        $sous_dir=$request->get('sous');
        $directory = "public/employees/Em_{$id}/{$sous_dir}";

        // Check if the directory exists, and create it if it doesn't
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        $file = $request->file('file');
        $path = $file->storeAs($directory, $file->getClientOriginalName());

/** Converting size */ 
 
$units = ['B', 'KB', 'MB', 'GB', 'TB'];
$size=$file->getSize();
for ($i = 0; $size >= 1024 && $i < count($units) - 1; $i++) {
    $size /= 1024;
}

$sizeR=round($size, 2) . ' ' . $units[$i];

/** ---- */

        return response()->json([
            'message'=>'success',
            'status'=> 200,
            'data'=>['ref_d'=>'Em_'.$id,
                     'sous_d'=>$sous_dir,
                     'filename'=>$file->getClientOriginalName(),
                     'filenext'=>$file->getClientOriginalExtension(),
                     'filesize'=>$sizeR
                    ]
        ]);
    }
    public function cree_dos_sous(Request $request)
    {
        // Define the main directory path
        $request->validate([
            'id_nin'=>'required|integer',
        ]);
        $id=$request->get('id_nin');
       // $sous_dir=$request->get('sous');
        $mainDirectoryPath = storage_path('app/public/employees/Em_'.$id);

        // Define the subdirectory path inside the main directory
       /* $dossier=new Dossier([
            'ref_Dossier'=>'Em_'.$id,
        ]);
        if(!$dossier->save())
        {
            return view(404,'Abort');
        }*/
        $folder=['Admin','Niveaux','Congé','Social','Contonsion','Promotion','Maladie','Personnel'];
        for($i=0;$i<count($folder);$i++)
        {
        $subDirectoryPath[$i] = $mainDirectoryPath . '/'.$folder[$i];
        }

        // Create the main directory if it doesn't exist
        if (!File::exists($mainDirectoryPath)) {
            File::makeDirectory($mainDirectoryPath, 0777, true);
            echo "Main directory created successfully.<br>";
        } else {
            echo "Main directory already exists.<br>";
        }

        // Create the subdirectory inside the main directory
        for($i=0;$i<count($subDirectoryPath);$i++)
        {
        if (!File::exists($subDirectoryPath[$i])) {
            File::makeDirectory($subDirectoryPath[$i], 0777, true);
            echo "Subdirectory created successfully.";
        } else {
            echo "Subdirectory already exists.";
        }
     }
    }

    public function getFiles($id)
    {
        $empdepart=Departement::get();
        $employe=Employe::where('id_nin',$id)->firstOrFail();
       
        $files = [];
        $empdoss='employees/Em_'.$id;
        $directory = storage_path('app/public/employees/Em_'.$id);
        foreach (File::directories($directory) as $subDir) {
            $subDirName = basename($subDir);
            $filesEm = File::files($subDir);
            $fileNames = array_map(function($file) {
                return basename($file);
            }, $filesEm);

            $files[$subDirName] = $fileNames;
        }
        
        return view('BioTemplate.file_Index',compact('files','empdoss','empdepart','employe'));
    }
    public function live_File($directory,$subdir,$filename)
    {
        $path =$directory .'/'.$subdir. '/' . $filename;
         dd($path);
        if (Storage::disk('public')->exists($path)) {
            $file = Storage::disk('public')->path($path);
            $mimeType = Storage::disk('public')->mimeType($path);

            return response()->file($file, [
                'Content-Type' => $mimeType
            ]);
        } else {
            return abort(404, 'File not found');
        }
    }
    public function savedb(Request $request)
    {  
       
        $file=$request->get('fichier');
        
        $date=Carbon::now();
       // dd($request);
        $hash= Str::random(40) . '.' . $request->get('fichierext');
        $fich=Fichier::select('id_fichier')->where('nom_fichier',$request->get('fichier'))->get();
        $doss=Dossier::select('ref_Dossier')->where('ref_Dossier',$request->get('ref_d'))->get();
        $save=false;
        //dd($fich);
        if($fich->count() < 1){
        $save=new Fichier(['nom_fichier'=>$file,
                                              'hash_fichier'=>$hash,
                                              'date_cree_fichier'=>$date,
                                              'type_fichier'=>$request->get('fichierext'),
                                              'taille_fichier'=>$request->get('Tfichier')
                                            ]);
        $sdoss=new Dossier(['ref_Dossier'=> $request->get('ref_d')]);
       

        $fsta=$save-> save();
        $dsta=$sdoss->save();
        if($doss->count() < 1)
        {
            $dsta=$sdoss->save();
        }
        dd($sdoss);
        if(!$dsta || !$fsta)
        {
            return response()->json([
                'message'=> 'unsuccess of creation Files',
                'status'=>302
            ]);
        }
        }
        else 
        {
           
          $output = [];
          $mac='notfound';
          exec('getmac', $output);
      
          // Search for the MAC address
          foreach ($output as $line) {
            if (preg_match('/([0-9A-F]{2}[-:]){5}([0-9A-F]{2})/i', $line, $matches)) {
                $mac=$matches[0];
            }
            }
            $stock=new Stocke([
                               'id'=>$request->get('id'),
                               'ref_Dossier'=>$request->get('ref_d'),
                               'sous_d'=>$request->get('sous_d'),
                                'id_fichier'=>$fich[0]->id_fichier,
                                'date_insertion'=>$date,
                                'mac'=>$mac,
                        
        ]);
        //dd($stock);
        if($stock->save())
        {
            return response()->json([
                'message'=>'success'.$mac,
                'status'=>200
            ]);

        }else
        {
            return response()->json([
                'message'=>'unsuccess',
                'status'=>302
            ]);
        }
        }
        /*else
        {
            return response()->json([
                'message'=>'unsuccess file insert',
                'status'=>404
            ]);
        }*/
    }
}
