<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\URLFile;

use App\File;

class FileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('default.frontend');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $file_size_mb=$file->getSize()/ 1048576;
        if(($file_size_mb>150)||($file_size_mb<100)) {
            return response()->json(['msg' => 'Мин. размер файла 150Мб, мак 200Мб']);
        }
        $upload_folder = 'public/upload';
        $file_name = Storage::putFile($upload_folder, $file);
        if ($file_name) {
            $model = new File();
            $model->email = $request->email;
            $model->description = $request->description;
            $model->name_file = $file_name;
            $model->hash_user = hash('md5', $request->email);
            $model->hash_file = hash('md5', $file_name);
            $model->save();
            Mail::to($model->email)->send(new URLFile($model->hash_user,$model->hash_file));
            return response()->json(['msg' => 'файл успешно загружен, в скором времени вы получите email сообщение с сылкой на файл'],200);


        }else{
            return response()->json(['msg' => 'Произошла ошибка добавления в БД'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = File::where('id',$id)->get();
        return view('default.adminEdit',['data'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
           'email'=>'required|email',
            'description' => 'required'
        ]);
        $model =File::find($request->id);
        $model->email = $request->email;
        $model->description = $request->description;
        if ($model->save()) {
            echo "Изменения применены";
            return redirect()->back()->with('msg', 'Данные изменены');
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model =File::find($id);
        if($model->delete()){
            return view('default.adminDelete');
        }

    }

    public function download($hash_user, $hash_file)
    {
            $model = File::where('hash_user', $hash_user)->where('hash_file', $hash_file)->get();
            if(!$model->isEmpty()){
                return Storage::download($model[0]->name_file);
            }
            return response(redirect(url('/')), 404);

    }

    public function admin(){
        $file_model = File::paginate(20);

        return view('default.admin',['data'=>$file_model]);
    }
}
