@extends('layouts.admin')
@section('content')
    <div>
        <div class="d-flex">
            <div>
                <button class="mr-3 btn btn-info"><a class="text-white" href="{{ route('admin.orders.index') }}">Все</a></button>
            </div>
            <div>
                <button class="mr-3 btn btn-info"><a class="text-white" href="{{ route('admin.orders.query') }}">На ожидании</a></button>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="d-flex justify-content-center">
                <div class="card d-flex flex-row align-items-center" style="width: 50%">
                    <div class="card-body">
                        <div>
                            Заказ № {{ $order->id }}
                        </div>
                        <div>
                            Статус: {{ $order->order_status->discription }}
                        </div>
                        <div>
                            {{ $order->created_at }}
                        </div>
                    </div>
                    <div>
                        <button class="mr-3 btn btn-info"><a class="text-white" href="{{ route('admin.orders.show', $order->id) }}">Подробнее</a></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
