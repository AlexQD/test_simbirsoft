@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <form action="{{route('adminUpdate')}}" method="post" style="margin-top: 100px;" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="text" placeholder="Email" name="email" value="{{$data[0]->email}}"><br>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Описание">{{$data[0]->description}}</textarea><br>
                        <input type="submit" value="редактировать"><br>
                    </form>
                    <div>{{session('error')}}</div>

            </div>
        </div>
    </div>
@endsection
