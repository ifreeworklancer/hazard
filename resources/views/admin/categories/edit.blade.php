@extends('layouts.admin', ['page_title' => $category->title])

@section('content')


        <form action="{{ route('admin.categories.update', $category) }}" method="post">
            @csrf
            @method('patch')

            <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $category->title }}"
                       required>
                @if($errors->has('title'))
                    <div class="mt-1 text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>


@endsection