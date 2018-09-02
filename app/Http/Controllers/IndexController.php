<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\URLFile;
use Illuminate\Support\Facades\DB;

use App\File;

class IndexController extends Controller
{
    //+
    public function show(){
        return view('default.template');
    }
    //+
    public function testfrontend(){
        return view('default.frontend');
    }

    //+
    public function addfile(Request $request){
        //dump($request);
        $file = $request->file('file');
        $file_size_mb=$file->getSize()/ 1048576;
        if(($file_size_mb>150)||($file_size_mb<100)) {
            //echo "Мин. размер файла 150Мб, мак 200Мб";
            return response()->json(['msg' => 'Мин. размер файла 150Мб, мак 200Мб']);
        }
        $upload_folder = 'public/upload';
        $filename = $request->file('file')->getClientOriginalName();
//        if (Storage::putFileAs($upload_folder, $file, $filename)) {
//            echo "OK";
//        }

            $file_name = Storage::putFile($upload_folder, $file);
            if ($file_name) {
                $model = new File();
                $model->email = $request->email;
                $model->description = $request->description;
                $model->name_file = $file_name;
                $model->hash_user = hash('md5', $request->email);
                $model->hash_file = hash('md5', $file_name);
                $model->save();
                //Mail::to($model->email)->send(new URLFile($model->hash_user,$model->hash_file));
                return response()->json(['msg' => 'Данные успешно добавлены'],200);


            }
//        echo $request->email."<br>";
//        echo $request->description."<br>";
//        echo $file->getSize()/ 1048576,2;

    }
    //+
    public function addfiletest(Request $request){
        //print_r($request->email);
        //print_r($request->description);
        $file = $request->file('file');
        //print_r($file->getSize());
        return response()->json(['msg' => 'Данные успешно добавлены'],400);

    }


    //+
    public function index(){
        $file_model = File::all();

        foreach ($file_model as $record) {
            echo $record->id."<br>";
            echo $record->email."<br>";
            echo $record->description."<br>";
            echo $record->name_file."<br>";
            echo $record->hash_user."<br>";
            echo $record->hash_file."<br>";
            echo public_path($record->name_file);
            //if (hash('md5',$record->name_file) == $record->name_file ){echo '11';}
            echo hash('md5',$record->name_file);
//            $contents = Storage::get($record->name_file);
//            echo $contents;
            //return Storage::download($record->name_file);
            //Mail::to('alexqd@ya.ru')->send(new URLFile($record->hash_user,$record->hash_file));
        }
    }

    //++
    public function download($hash_user, $hash_file) {
        //echo $hash_user." ".$hash_file;
        $model = File::where('hash_user',$hash_user)->where('hash_file',$hash_file)->get();
        //dump($model);
        //echo $model[0]->name_file."<br>";
        return Storage::download($model[0]->name_file);
    }

    public function admin(){
        //$file_model = DB::table('files')->paginate(2);
        $file_model = File::paginate(20);

        return view('default.admin',['data'=>$file_model]);
    }
    //+
    public function edit($id){
        $model = File::where('id',$id)->get();

        return view('default.adminEdit',['data'=>$model]);
    }

    public function update(Request $request){
        $model =File::find($request->id);
        $model->email = $request->email;
        $model->description = $request->description;
        if ($model->save()) {
            echo "Изменения применены";
            return redirect()->back()->with('error', 'Данные изменены');
        }else{
            return redirect()->back()->with('error', 'Ошибка изменения данных');
        }

    }

    public function delete(){

    }
}
