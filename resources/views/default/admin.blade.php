@extends('layouts.app')

@section('content')

    <div class="starter-template">
        <table border="1">
            <tr>
                <td>#</td>
                <td>Описание</td>
                <td>email</td>
                <td>путь к файлу</td>
                <td>_</td>
                <td>_</td>
            </tr>


            @foreach($data as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->name_file}}</td>
                    <td><a href="{{route('adminEdit',$value->id)}}"><button>редактировать</button></a></td>

                    <td><a href="{{route('adminDelete',$value->id)}}"><button>удалить</button></a></td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
    </div>

@endsection

