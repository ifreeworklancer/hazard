@extends('layouts.admin',  ['page_title' => 'Новая категория'])

@section('content')

    <section class="container">
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Название категории</label>
                <input type="text" id="title" class="form-control form-control-lg" name="title"
                       value="{{ old('title') }}" placeholder="название">
            </div>

            <div class="form-group">
                <label for="name">Порядок отображения</label>
                <input type="text" id="order" class="form-control form-control-lg" name="order"
                       value="{{ old('order') }}" placeholder="порядок">
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </section>

@endsection