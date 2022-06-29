
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
@include('layouts.header')
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
                <h1 class=" font-bold text-3xl text-gray-900">MELODION</h1>
               
            </div>

            <!-- image search box -->
            <div class="box pt-6">
                <div class="box-wrapper">

                    <div class=" bg-white rounded flex items-center mx-auto mt-7 w-3/5 p-4 shadow-sm border border-black ">
                      <button @click="getImages()" class="outline-none focus:outline-none"><svg class=" w-5 text-black-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                      <input type="search" name="" id="" @keydown.enter="getImages()" placeholder="Entrez l’URL de votre video youtube ici.. " x-model="q" class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                   
                    </div>
                  
                </div>
            </div>

            <section id="photos" class="my-5 grid grid-cols-1 md:grid-cols-4 gap-4">
                <template x-for="image in images" :key="image.id">
                  <a :href="image.largeImageURL" class="hover:opacity-75 " target="_new"><img class="w-full h-64 object-cover" :src="image.largeImageURL" :alt="image.tags" /></a>
                </template>
              </section>

        </div>
        <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
            <h1 class=" font-bold text-2xl text-red-900">Suggestion</h1>
           
        </div>
        <div class="container px-5 py-20 mx-auto">
            <div class="flex flex-wrap -m-4">
  <!--start here-->
  <div class="p-4 md:w-1/3" >
      <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
         
          
        
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/blog.jpg?alt=media&token=271cb624-94d4-468d-a14d-455377ba75c2" alt="blog cover"/>
        
        <div class="p-4">
          <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase ">bob jackson</h2>
          <h1 class="title-font text-lg font-medium text-gray-900 mb-3">From paradise</h1>
          <div class="flex items-center flex-wrap ">
            <a href="/" class="text-green-800  md:mb-2 lg:mb-0">
              <p class="inline-flex items-center"> Voir la video
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </p>
            </a>
            <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
              <svg class="w-4 h-4 mr-1"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
              </svg>
              24
            </span>
           
          </div>
          
          
        </div>
      </div>
    </div>

   
  <!--End here-->
            </div>
          </div>
    </div>
    
</div>
