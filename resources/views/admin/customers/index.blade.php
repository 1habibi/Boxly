@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                Заказчики {{ $customers }}
            </h1>
        </div>
        <div class="flex container mb-3">
            <div class="container flex justify-center">
                <form class="flex mr-3" action="{{ route('admin.customers.index') }}" method="get">
                    @csrf
                    <div class="mr-3">
                        <input placeholder="Фамилия" class="mb-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="surname" >
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Поиск</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left ">
                                <thead class="border-b font-medium">
                                <tr class="text-lg">
                                    <th scope="col" class="px-6 py-4">id</th>
                                    <th scope="col" class="px-6 py-4">user_id</th>
                                    <th scope="col" class="px-6 py-4">name</th>
                                    <th scope="col" class="px-6 py-4">surname</th>
                                    <th scope="col" class="px-6 py-4">patronymic</th>
                                    <th scope="col" class="px-6 py-4">phone_number</th>
                                    <th scope="col" class="px-6 py-4">address</th>
                                    <th scope="col" class="px-6 py-4">post_index</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr class="border-b">
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $customer->id }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->surname }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->patronymic }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->phone_number }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">г.{{ $customer->city }} ул.{{ $customer->street }} д.{{ $customer->house }} кв.{{ $customer->apartment }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->post_index }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{ $customers->withQueryString()->links() }}
        </div>
    </div>
@endsection
