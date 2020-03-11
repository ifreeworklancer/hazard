@extends('layouts.admin', ['page_title' => $category->title ])

@section('content')

    <h2>Список товара категории {{ $category->title }}</h2>

    @forelse($category->products as $product)
        <ol>
            <a href="{{ route('admin.products.edit', $product) }}" class="text-capitalize">
                {{ $product->title }}
            </a>
        </ol>
    @empty
        <p>Нет товара</p>
    @endforelse


@endsection