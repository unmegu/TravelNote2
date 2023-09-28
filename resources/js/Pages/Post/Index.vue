<script setup>
 import Authenticated from '@/Layouts/AuthenticatedLayout.vue'
 import { router } from '@inertiajs/vue3'
 import { Link } from '@inertiajs/vue3'
 import { GoogleMap, Marker } from "vue3-google-map";
 import { defineComponent, onMounted } from "vue";
 import { Loader } from "@googlemaps/js-api-loader"


 const {posts} = defineProps({posts: Array})

 const destroy = ({id}) => {      // 分割代入です
    router.delete(route('post.delete', {id: id}), {
        onBefore: () => confirm('削除しますが、よろしいですか？')
    })
 }
 
/*KEY確認用コード*/
// onMounted(()=>{console.log( import.meta.env.VITE_GOOGLE_ACCESS_KEY)})
 onMounted(()=>{
    console.log('onMounted')
     const loader = new Loader({
    apiKey: import.meta.env.VITE_GOOGLE_ACCESS_KEY,
    version: "weekly",
    });
    loader.load().then((google) => {
    console.log( import.meta.env.VITE_GOOGLE_ACCESS_KEY)
    // const { Map } = google.maps.importLibrary("maps");

    const hogehoge = new google.maps.Map(document.getElementById("map"), { //←下のdivクラスのidを指したい．
        center: { lat:35.660838968038846, lng: 139.69518336849038 },
        zoom: 8,
      });
});
})

// let map;

// async function initMap() {
//   const { Map } = await google.maps.importLibrary("maps");

//   map = new Map(document.getElementById("map"), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8,
//   });
// }
// onMounted(()=>{initMap()})
</script>


<template>
   <Authenticated>
       <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Index
           </h2>
       </template>

       <div class="justify-center w-3/4 mx-auto mt-8">
           <!--地図を表示-->
           <div class="mx-auto w-[80%] aspect-[9/6]" id="map"></div>

           <div class="w-1/2 mx-auto divide-gray-200 divide-y-2 space-y-4">

               <div v-for="post in posts"
                    class="space-y-5 p-3">
                   
                   
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <!--TODO:imageを追加-->
            <!--<a href="#">-->
            <!--    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />-->
            <!--</a>-->
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                     <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>

                   <div class="flex justify-between">
                       
                       <h2 class="mt-4 font-bold text-xl text-grey-800">
                           <Link :href="route('post.show', { id: post.id })" >{{ post.title }}</Link>
                       </h2>
                       
                       <button
                           class="px-3 bg-purple-300 hover:bg-purple-400 rounded-md"
                           @click="destroy(post)"
                       >削除
                       </button>

                   </div>
                   <p>{{ post.body }}</p>
               </div>

           </div>
       </div>
   </Authenticated>

</template>