

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <div x-data="{ modelOpen: false }">
            
            <button @click="modelOpen =!modelOpen"
            <i class=" fa-solid fa-pen-to-square hover:text-blue-700"></i>
            </button>

            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div
                    class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                        <div class="flex items-center justify-between space-x-4">


                            <button @click="modelOpen = false"
                                class="text-gray-600 focus:outline-none hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>


                        <div class="justify-center w-full pl-4 text-center">
                            <div
                                class="flex flex-col items-center w-full text-center lg:flex-grow md:items-start md:text-left">
                                </h1>
                                <div class="relative mb-4">
                                    <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                    <form action="/update/{{$id}}" method="post" class="p-0 m-0">

                                        @csrf
                                        <input type="hidden" name="id_memos" value="{{$memo->id}}">
                                        <textarea id="message" name="contenu" cols="50" rows="15"
                                            class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">{{$memo->contenu}}</textarea>
                                            <input type= "hidden" name="user_id" value= "{{Auth::user()->id}}">
                                        <div class="flex justify-center">
                                            <button type="submit"
                                                class="inline-flex px-6 py-2 text-lg text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-indigo-600">

                                                Enregistrer
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                    </form>
                               
                        

                   



                </div>
            </div>
        </div>
    </div>

</div>
