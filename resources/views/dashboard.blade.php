@extends('layouts.main')

@section('container')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="card highlight p-2">
                        <a class="card-block stretched-link text-decoration-none" href={{ route('users.index') }}>
                            <h4 class="card-title text-center m-5">USERS</h4>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card highlight p-2">
                        <a class="card-block stretched-link text-decoration-none" href={{ route('schedule.index') }}>
                            <h4 class="card-title text-center m-5">SCHEDULE</h4>

                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card highlight p-2">
                        <a class="card-block stretched-link text-decoration-none" href>
                            <h4 class="card-title text-center m-5">COURSES</h4>

                        </a>
                    </div>
                </div>
            </div>
        </div>



    </x-app-layout>
@endsection
