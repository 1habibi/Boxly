@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                Заказы
            </h1>
        </div>
        <div class="flex container items-center justify-center mb-3">
            <div class="container">
                <form class="flex mr-3 flex-col justify-center items-center gap-y-2" action="{{ route('admin.orders.index') }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <input placeholder="Введите ID заказчика" class="mb-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="customer_id" >
                        <input placeholder="Введите статус (ID)" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="order_status_id" >
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Поиск</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="d-flex justify-content-center">
                <div class="card d-flex flex-row align-items-center" style="width: 50%">
                    <div class="card-body">
                        <div class="text-lg font-bold">
                            Заказ № {{ $order->id }}
                        </div>
                        <div class="">
                            Статус: {{ $order->order_status->discription }}
                        </div>
                        <div class="text-sm text-gray-400">
                            Создан: {{ $order->created_at }}
                        </div>
                        <div class="text-sm text-gray-400">
                            Последнее обновление: {{ $order->updated_at }}
                        </div>
                    </div>
                    <div>
                        <button class="mr-3 btn btn-info"><a class="text-white" href="{{ route('admin.orders.show', $order->id) }}">Подробнее</a></button>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
@endsection
