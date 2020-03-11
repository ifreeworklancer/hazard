@extends('layouts.admin', ['page_title' => 'Заказ №' . $order->id])

@section('content')

    <section id="content">
        <h1 class="h3 mb-4">Заказ №{{ $order->id }}</h1>

        <form action="{{ route('admin.orders.update', $order) }}" method="post">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-3">Заказчик</h4>
                    <h5 class="position-relative">
                        <div class="indicator bg-success"></div>
                        <p class="mb-1">
                            {{ $order->user->name }}
                        </p>
                    </h5>
                    <p class="font-weight-bold mb-2">Почта</p>
                    <p>
                        <a class="mb-1 dashed"
                           href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a>
                    </p>
                    <p class="font-weight-bold mb-2">Телефон</p>
                    <p class="mb-1">{{ $order->user->phone }}</p>

                    @if( $order->message)
                        <p class="font-weight-bold mb-2">Коментарий заказчика</p>
                        {{ $order->message }}
                    @endif

                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Товары</h4>

                    @foreach($order->baskets as $basket)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 mr-3">
                                <img src="{{ $basket->product->getFirstMediaUrl('product', 'thumb')}}" alt="">
                            </div>
                            <div class="flex-grow-0 py-2">
                                <h5>
                                    <a href="{{ route('app.catalog.product', $basket->product) }}" class="underline"
                                       target="_blank">
                                        {{ $basket->product->title }}
                                    </a>
                                </h5>

                                <h5>
                                    {{ $basket->quantity }}
                                    &times;
                                    <strong>{{ $basket->price }} грн.</strong>
                                    <small class="text-muted">
                                        <span>({{ $basket->product->price }} грн.)</span>
                                    </small>
                                </h5>
                            </div>
                        </div>
                    @endforeach

                    <h3 class="text-right">
                        Итого:
                        <strong>{{ number_format($order->total, 2, ',', ' ') }} грн.</strong>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-primary">
                        Обновить
                    </button>
                </div>
                <div class="col-auto">
                    <select name="status"
                            class="form-control {{ $order->status == 'declined' ? 'border-danger' : ($order->status == 'completed' ? 'border-success' : '') }}">
                        @foreach(\App\Models\Order::$STATUSES as $status)
                            <option value="{{ $status }}"
                                    {{ $order->status == $status ? 'selected' : '' }}>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </section>

@endsection