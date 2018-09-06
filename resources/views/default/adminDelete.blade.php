@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Запись удалена</p>
                <a  href="{{ route('admin')}}">Вернуться назад</a>
            </div>
        </div>
    </div>
@endsection
