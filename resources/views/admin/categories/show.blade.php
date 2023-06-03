@extends('admin.index')

@section('content')
    <div class="row w-50">
        <form action="{{route('category.edit', $category->id)}}" class="w-25">
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
        <form action="{{route('category.delete', $category->id)}}" class="w-25" method="post">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td><b href="{{route('category.show', $category->id)}}">{{$category->title}}</b></td>
        </tr>
        </tbody>
    </table>
@endsection
