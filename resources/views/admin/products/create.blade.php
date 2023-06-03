@extends('admin.index')

@section('content')
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <h1>Категория</h1>
        <div class="mb-3">
            <label class="form-label">Обложка</label>
            <input type="file" class="form-control w-25 @error('cover') is-invalid @enderror" name="cover" value="{{old('cover')}}">
            @error('cover')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка(и)</label>
            <input type="file" class="form-control w-25 @error('images') is-invalid @enderror" name="images[]" value="{{old('images')}}" multiple>
            @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" class="form-control w-25 @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input type="number" min="1" class="form-control w-25 @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <input type="text" class="form-control w-25 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Размер</label>
            <input type="text" class="form-control w-25 @error('size') is-invalid @enderror" name="size" value="{{old('size')}}">
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

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
