@extends('admin.index')

@section('content')
    <form action="{{route('product.create')}}">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
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
        @foreach($products as $product)

            <tr>
                <td><img src="{{asset('storage/'.$product->cover)}}" alt="{{$product->title}}" width="100" height="70"></td>
                <td><a class="link-primary text-decoration-none" href="{{route('product.show', $product->id)}}">{{$product->title}}</a></td>
                <td>{{$product->price}}.руб</td>
                <td>{{$product->description}}</td>
                <td>
                    <table>
                        <tbody>
                        @foreach($product->categories as $item)
                        <tr>
                            <td>
                                {{$item->title . ', '}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
                <td>{{$product->size}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
