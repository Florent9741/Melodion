
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<!-- This is an example component -->
<body x-data="imageGallery()" 
      x-init="fetch('https://pixabay.com/api/?key=15819227-ef2d84d1681b9442aaa9755b8&q=woman+girl+food&image_type=all&per_page=52&')
      .then(response => response.json())
      .then(response => { images = response.hits })"
      class="bg-white">

<div class="main">
    <div class="px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">

        <!-- hero -->
        <div class="hero">
            <!-- hero headline -->
            <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
                <h1 class=" font-bold text-3xl text-gray-900">Stunning free images & royalty free stock</h1>
                <p class=" font-base text-base text-gray-600">high quality stock images and videos shared by our talented community.</p>
            </div>

            <!-- image search box -->
            <div class="box pt-6">
                <div class="box-wrapper">

                    <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                      <button @click="getImages()" class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                      <input type="search" name="" id="" @keydown.enter="getImages()" placeholder="search for images" x-model="q" class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                   
                    </div>
                  
                </div>
            </div>

            <section id="photos" class="my-5 grid grid-cols-1 md:grid-cols-4 gap-4">
                <template x-for="image in images" :key="image.id">
                  <a :href="image.largeImageURL" class="hover:opacity-75 " target="_new"><img class="w-full h-64 object-cover" :src="image.largeImageURL" :alt="image.tags" /></a>
                </template>
              </section>

        </div>

       
    </div>
</div>
