@extends('admin.index')

@section('content')
    <div class="row w-50">
        <form action="{{route('product.edit', $product->id)}}" class="w-25">
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
        <form action="{{route('product.delete', $product->id)}}" class="w-25" method="post">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Обложка</th>
            <th scope="col">Название</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Размер</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><img src="{{asset('storage/'.$product->cover)}}" alt="" width="100" height="70"></td>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>
            <table>
                @foreach($product->categories as $cat)
                <tr>
                    <td>
                        {{$cat->title .', '}}
                    </td>
                </tr>
                @endforeach
            </table>
            </td>
            <td>{{$product->size}}</td>
        </tr>
        </tbody>
    </table>
@endsection
