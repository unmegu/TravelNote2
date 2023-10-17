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
 
 onMounted(()=>{
    console.log('onMounted')
     const loader = new Loader({
    apiKey: import.meta.env.VITE_GOOGLE_ACCESS_KEY,
    version: "weekly",
    });
    loader.load().then((google) => {
    console.log( import.meta.env.VITE_GOOGLE_ACCESS_KEY)
    // const { Map } = google.maps.importLibrary("maps");
    /*TODO: centerを位置情報に修正*/
    const hogehoge = new google.maps.Map(document.getElementById("map"), { //←下のdivクラスのidを指したい．
        center: { lat:35.660838968038846, lng: 139.69518336849038 },
        zoom: 8,
      });
});
})
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

        <div class="w-1/2 mx-auto divide-y-2 space-y-4" style="display: grid; row-gap: 20px;">

               <div v-for="post in posts"
                    class="space-y-5 p-3">
                   
                   
                     <div class="w-3/4 max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <div>
                                <img :src="post.image_url" alt="画像が読み込めません。"/>
                            </div>
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    <Link :href="route('post.show', { id: post.id })" >
                                        {{post.title}}
                                    </Link>
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{post.body}}</p>
                            
                        </div>
                        
                            <div>
                                <button
                                   class="inline-flex items-center px-3 py-2 ml-2  mb-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800"
                                   @click="destroy(post)"
                                   >削除
                               </button>
                            </div>
                            
                        </div>
               </div>

           </div>
       </div>
   </Authenticated>

</template>