@extends('admin.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" name="title" value="{{ $product->title ?? old('title') }}">
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea class="form-control" name="description" cols="10" rows="5">{{ $product->description ?? old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label>Обложка</label>
                    <div class="input-group">
                        <input type="file" class="form-control w-25 @error('cover') is-invalid @enderror" name="cover" value="{{old('cover')}}">
                    </div>
                    <img src="{{asset('storage/'.$product->cover)}}" width="250" height="100">
                </div>
                <div class="form-group">
                    <label>Картинки</label>
                    <div class="input-group">
                        <input type="file" class="form-control w-25 @error('images') is-invalid @enderror" name="images[]" value="{{old('images')}}" multiple>
                    </div>
                    @foreach($product->images as $image)
                    <div data-key="{{$image->id}}" class="block-images">
                        <img src="{{asset('storage/'.$image->file_path)}}" width="250" height="100">
                        <span>{{$image->file_path}}</span>
                        <i class="delete-image">X</i>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price ?? old('price') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Категории</label>
                    <select name="categories[]" class="selectpicker @error('category') is-invalid @enderror" multiple="multiple">
                        @foreach($product->categories as $category)
                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                        @endforeach

                            @foreach($categories as $category)
                                @if(!$product->categories->contains('id', $category->id))
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Редактировать">
                </div>
            </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
