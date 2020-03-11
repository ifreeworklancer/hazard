@extends('layouts.admin',  ['page_title' => $page->title ])

@section('content')

    <form action="{{ route('admin.pages.update', $page) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $page->title }}"
                   required>
            @if($errors->has('title'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="form-group{{ $errors->has('body') ? ' is-invalid' : '' }}">
            <label for="body">Текст</label>
            <editor name="body" class="mb-3" content="{{ old('body') ?? $page->body }}" required></editor>
            @if($errors->has('body'))
                <div class="mt-1 text-danger">
                    {{ $errors->first('body') }}
                </div>
            @endif
        </div>
        <multi-uploader class="mt-4"
                        :src="{{ json_encode($page->images_list) }}"></multi-uploader>

        <div class="mt-4">
            <button class="btn btn-primary">Обновить</button>
        </div>
    </form>



@endsection
