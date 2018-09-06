@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <form action="{{route('adminUpdate')}}" method="post" style="margin-top: 100px;" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="text" placeholder="Email" name="email"
                               value="{{old('email', $data[0]->email)}}"><br>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Описание">{{old('description', $data[0]->description)}}</textarea><br>
                        <input type="submit" value="редактировать"><br>
                    </form>
                    <div>{{session('msg')}}</div>

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            </div>
        </div>
    </div>
@endsection
