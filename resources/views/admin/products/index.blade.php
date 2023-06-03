@extends('admin.index')

@section('content')
    <form action="{{route('product.create')}}">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Обложка</th>
            <th scope="col">Изображение</th>
            <th scope="col">Название</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Размер</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->cover}}</td>
                <td>{{$product->image}}</td>
                <td><a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover text-decoration-none" href="{{route('$product.show', $product->id)}}">{{$product->title}}</a></td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->size}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
