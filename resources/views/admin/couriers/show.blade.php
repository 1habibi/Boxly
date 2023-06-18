@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                {{ $courier->id }}. {{ $courier->surname }} {{ $courier->name }}
            </h1>
        </div>
        <div class="flex flex-col fk mb-3">
            <div class="text-xl">
                <div class="mb-3">
                    Имя: {{ $courier->name }}
                </div>
                <div class="mb-3">
                    Фамилия: {{ $courier->surname }}
                </div>
                <div class="mb-3">
                    Отчество: {{ $courier->patronymic }}
                </div>
                <div class="mb-3">
                    Номер телефона: {{ $courier->phone_number }}
                </div>
            </div>
            <div>
                <button type="submit" class="mt-3 mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a class="text-white no-underline" href="{{ route('admin.couriers.edit', $courier->id) }}">Править данные</a>
                </button>
            </div>
            <div>
                <button type="submit" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a class="text-white no-underline" href="{{ route('admin.couriers.index') }}">Назад</a>
                </button>
            </div>
            <div>
                @csrf
                <form action="{{ route('admin.couriers.destroy', $courier->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить">
                </form>
            </div>
        </div>
    </div>
@endsection
