@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                {{ $courier->id }}. {{ $courier->surname }} {{ $courier->name }}
            </h1>
        </div>
        <div class="flex flex-col fk mb-3">
            <form action="{{ route('admin.couriers.update', $courier->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Имя</label>
                    <input name="name" id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Имя" value="{{ $courier->name }}">
                </div>
                <div class="mb-6">
                    <label for="surname" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Фамилия</label>
                    <input name="surname" id="surname" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Фамилия" value="{{ $courier->surname }}">
                </div>
                <div class="mb-6">
                    <label for="patronymic" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Отчество</label>
                    <input name="patronymic" id="patronymic" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Image" value="{{ $courier->patronymic }}">
                </div>
                <div class="mb-6">
                    <label for="phone_number" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Номер телефона</label>
                    <input name="phone_number" id="phone_number" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Image" value="{{ $courier->phone_number }}">
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Обновить</button>
            </form>
        </div>
    </div>
@endsection
