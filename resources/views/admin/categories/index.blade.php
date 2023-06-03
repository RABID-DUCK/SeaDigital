@extends('admin.index')

@section('content')
    <form action="{{route('category.create')}}">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td><a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-decoration-none" href="{{route('category.show', $category->id)}}">{{$category->title}}</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
