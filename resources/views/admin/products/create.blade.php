@extends('admin.index')

@section('content')
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        <h1>Категория</h1>
        <div class="mb-3">
            <label class="form-label">Обложка</label>
            <input type="file" class="form-control w-25 @error('cover') is-invalid @enderror" name="cover">
            @error('cover')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка(и)</label>
            <input type="file" class="form-control w-25 @error('images') is-invalid @enderror" name="images[]">
            @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" class="form-control w-25 @error('title') is-invalid @enderror" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input type="number" min="1" class="form-control w-25 @error('price') is-invalid @enderror" name="price">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <input type="text" class="form-control w-25 @error('description') is-invalid @enderror" name="description">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Размер</label>
            <input type="text" class="form-control w-25 @error('size') is-invalid @enderror" name="size">
            @error('size')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Категории</label>
            <select name="categories[]" class="selectpicker @error('category') is-invalid @enderror" multiple="multiple">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('categories')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
