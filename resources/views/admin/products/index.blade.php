@extends('layouts.admin', ['page_title' => 'Товары'])

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
                                <th scope="col">Категория</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Опции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-capitalize">
                                            {{ $product->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($product->category)
                                        <a href="{{ route('admin.categories.show', $product->category) }}" class="text-capitalize">
                                            {{ $product->category->title }}
                                        </a>
                                        @else
                                            <a href="#" class="text-capitalize"> - </a>
                                        @endif
                                    </td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <p class="mb-0">
                                            <a href="{{ route('admin.products.destroy', $product) }}"
                                               class="btn btn-sm btn-danger">
                                                Удалить
                                            </a>
                                        </p>
                                        <form action="{{ route('admin.products.destroy', $product) }}"
                                              id="delete-form-{{ $product->id }}" method="post" style="display: none;">
                                            @csrf
                                            @method('delete')
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

    <?php echo $products->links(); ?>

@endsection