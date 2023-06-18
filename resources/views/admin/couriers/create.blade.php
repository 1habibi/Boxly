@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                Новый курьер
            </h1>
        </div>
        <div class="flex flex-col fk mb-3">
            <form action="{{ route('admin.couriers.store') }}" method="post">
                @csrf
                <div class="mt-6">
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Имя</label>
                    <input value="{{ old('name') }}" name="name" id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Введите имя">
                    @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="surname" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Фамилия</label>
                    <textarea value="{{ old('surname') }}" name="surname" id="surname" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Введите фамилию"></textarea>
                    @error('surname')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="patronymic" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Отчество</label>
                    <input value="{{ old('patronymic') }}" name="patronymic" id="patronymic" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Введите отчество">
                    @error('patronymic')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="phone_number" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Номер телефона</label>
                    <input value="{{ old('phone_number') }}" name="phone_number" id="phone_number" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Введите номер телефона">
                    @error('phone_number')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить</button>
            </form>
        </div>
    </div>
@endsection
