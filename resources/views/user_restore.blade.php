@extends('layouts.app')
@section('main')
<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="flex flex-col ">
                <div class="overflow-hidden">
                    <table class="min-w-full ">

                        <thead class="border-b">

                            <tr class="text-center">
                                <th >
                                    ID</th>
                                <th >
                                    name</th>
                                <th >
                                    email</th>
                                <th >
                                    rôle
                                </th>

                                <th >
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center bg-white">
                                @foreach ($members as $membre)

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
                                        @if ($membre->admin == Null)
                                        <span>utilisateur</span>
                                       
                
                                        @elseif ($membre->admin == 1)
                                          <span>administrateur</span>
                                        @else
                                        <span>non identifier</span>
                                        
                                       @endif
                                        
                                    </td>
                                    <td class="border-b">
                                        <form method="get" action="{{ route('user.restore', $membre->id) }}">


                                            <button type="submit" name="restore"
                                                class="justify-center px-3 py-1 font-semibold text-white bg-black rounded ">restore</button>

                                    </td>
                                    </form>
                                    @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
