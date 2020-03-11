@extends('layouts.admin', ['page_title' => 'Заказы'])

@section('content')

    @forelse($orders as $order)
        <article class="item">
            <div class="item-id">{{ $order->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.orders.edit', $order) }}" class="underline">
                            {{ $order->user->name }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $order->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.orders.edit', $order) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Заказов пока нет!
    @endforelse


@endsection