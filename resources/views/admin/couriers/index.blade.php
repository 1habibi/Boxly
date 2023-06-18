@extends('layouts.admin')
@section('content')
    <div class="p-3">
        <div class="mb-3 p-2">
            <h1 class="text-center font-bold text-6xl">
                Курьеры
            </h1>
        </div>
        <div class="flex flex-col fk mb-3">
            <div>
                <button type="submit" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    <a class="text-white no-underline" href="{{ route('admin.couriers.create') }}">Добавить курьера</a>
                </button>
            </div>
            <div>
                @foreach($couriers as $courier)
                    <div class="text-black transition duration-300">
                        <a class="text-xl " href="{{ route('admin.couriers.show', $courier->id) }}">
                            {{ $courier->id }}. {{ $courier->name }} {{ $courier->surname }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
