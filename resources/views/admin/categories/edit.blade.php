@extends('admin.index')

@section('content')
    <form action="{{route('category.update', $category->id)}}" method="POST">
        @csrf
        @method('patch')

        <h1>Категория</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input type="text" class="form-control w-25 @error('title') is-invalid @enderror" name="title" value="{{$category->title ?? old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
