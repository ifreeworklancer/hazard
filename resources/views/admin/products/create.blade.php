@extends('layouts.admin',  ['page_title' => 'Новый продукт'])

@section('content')

    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf

        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @if($errors->has('title'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="form-group{{ $errors->has('price') ? ' is-invalid' : '' }}">
            <label for="title">Цена</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            @if($errors->has('price'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('price') }}
                </div>
            @endif
        </div>

        <div class="row">
            @foreach(\App\Models\Product::$sizes as $size)
                <div class="col-auto">
                    <label>
                        <input type="checkbox" name="size[]" value="{{$size}}">
                        {{ strtoupper($size) }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
            <label for="category">Категория</label>

            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('category_id'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('category_id') }}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('material') ? ' is-invalid' : '' }}">
            <label for="material">Материал</label>
            <editor name="material" class="mb-3"  required></editor>
            @if($errors->has('material'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('material') }}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
            <label for="description">Описание</label>
            <editor name="description" class="mb-3" required></editor>
            @if($errors->has('description'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('description') }}
                </div>
            @endif
        </div>
        <multi-uploader class="mt-4"></multi-uploader>

        <div class="mt-4">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>

@endsection
