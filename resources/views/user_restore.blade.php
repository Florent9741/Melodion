@extends('layouts.app')
@section ('main')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <title>User</title>
</head>
    <body class="justify-center">
    </body>


        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">

                            <thead class="border-b">

                                <tr>
                                    <th class="m-20">
                                        ID</th>
                                    <th class="m-20">
                                        name</th>
                                    <th class="m-20">
                                        email</th>
                                    <th class="m-20">
                                        admin
                                    </th>

                                    <th class="m-20">
                                        Action</th>
                                </tr>
                            </thead>
                            @foreach ($members as $membre)
                                <tbody class="text-center bg-white">

                                    <tr>
                                        <td class="px-1 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div>
                                                <p>{{ $membre->id }}</p>
                                            </div>

                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                <p>{{ $membre->name }}</p>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <p>{{ $membre->email }}</p>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <span>null</span>
                                        </td>
                                        <td class="border-b">
                                            <form method="get" action="{{ route('user.restore', $membre->id) }}">


                                                <button type="submit" name="restore"
                                                    class="justify-center px-3 py-1 font-semibold text-white bg-black rounded ">restore</button>

                                        </td>
                                        </form>
                    </div>
                    @endforeach

    </body>
@endsection
