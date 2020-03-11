@extends('layouts.admin',  ['page_title' => 'Категории'])

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Количество товаров</th>
                                <th scope="col">Опции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-capitalize">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.categories.show', $category) }}" class="text-capitalize">
                                            {{ $category->products->count() }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                              id="delete-form-{{ $category->id }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <p class="mb-0">
                                                <button class="btn btn-primary">Удалить</button>
                                            </p>

                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $categories->links(); ?>

@endsection