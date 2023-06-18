@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="d-flex">
            <div>
                <button class="mr-3 btn btn-info"><a class="text-white" href="{{ url()->previous() }}">Назад</a></button>
            </div>
            <div class="w-full">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="post" class="flex items-center justify-center flex-col">
                    @csrf
                    @method('patch')
                    <div class="text-center">
                        <h1>Заказ № : {{ $order->id }}</h1>
                        <p>ID заказчика : {{ $order->customer->id }}</p>
                    </div>
                    @foreach($order->order_details as $detail)
                        <div
                            class="w-2/3 mb-3 block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                            <p
                                class="mb-2 text-lg text-base text-neutral-800">
                                <span class="font-medium">Ссылка на товар:</span> {{ $detail->url }}
                            </p>
                            <p class="mb-2 text-lg text-base text-neutral-800">
                                <span class="font-medium">Кол-во:</span> {{ $detail->count }}
                            </p>
                            <p class="mb-2 text-lg text-base text-neutral-800">
                                <span class="font-medium">Примечание:</span> {{ $detail->note }}
                            </p>
                        </div>
                    @endforeach
{{--                    <div class="flex justify-center items-center">--}}
{{--                        <label for="discount" class="block mb-2 text-xl font-medium text-gray-900 mr-3">Скидка</label>--}}
{{--                        <input name="discount" id="discount" type="checkbox">--}}
{{--                    </div>--}}
                    <div class="w-2/3 mb-3 flex justify-center items-center">
                        <div class="mb-3 xl:w-full">
                            <label for="receiving" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Способ доставки</label>
                            <select name="receiving_id" id="receiving" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($receivings as $receiving)
                                    <option {{ $receiving->id === $order->receiving_id ? 'selected' : '' }} value={{ $receiving->id }}>
                                        {{ $receiving->discription }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-2/3 mb-3 flex justify-center items-center">
                        <div class="mb-3 xl:w-full">
                            <label for="courier" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Курьер</label>
                            <select name="courier_id" id="courier" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($couriers as $courier)
                                    <option {{ $courier->id === $order->courier_id ? 'selected' : '' }} value={{ $courier->id }}>
                                        {{ $courier->name }} {{ $courier->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-2/3 mb-3 text-xl">
                        <label for="order_price" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Стоимость заказа</label>
                        <input name="order_price" id="price" type="text" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Сумма заказа" value="{{ $order->order_price }}">
                    </div>
                    <div class="w-2/3 mb-3 flex justify-center items-center">
                        <div class="mb-3 xl:w-full">
                            <label for="category" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Статус</label>
                            <select name="order_status_id" id="order_status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($statuses as $status)
                                    <option {{ $status->id === $order->order_status->id ? 'selected' : '' }} value={{ $status->id }}>
                                        {{ $status->id }}. {{ $status->discription }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-2/3 mb-3 flex">
                        <div class="mb-3 block mb-2 text-xl font-medium text-gray-900 dark:text-white">
                            Скидка: {{ $order->discount === 1 ? "Да" : ($order->discount === 0  ? "Нет" : "undefined") }}
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
