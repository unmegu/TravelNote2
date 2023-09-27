<script setup>
 import Authenticated from '@/Layouts/AuthenticatedLayout.vue'
 import { router } from '@inertiajs/vue3'
 import { Link } from '@inertiajs/vue3'
 import { GoogleMap, Marker } from "vue3-google-map";
 import { defineComponent } from "vue";

 const {posts} = defineProps({posts: Array})

 const destroy = ({id}) => {      // 分割代入です
    router.delete(route('post.delete', {id: id}), {
        onBefore: () => confirm('削除しますが、よろしいですか？')
    })
 }
</script>

<script>
    /*Google Mapのための処理*/ 
    export default defineComponent({
      components: { GoogleMap, Marker },
      setup() {
          /*Todo:ここを現在位置が表示されるようにしておく*/
        const center = { lat:35.660838968038846, lng: 139.69518336849038 };
        return { center };
      },
    });
</script>


<template>
   <Authenticated>
       <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Index
           </h2>
       </template>

       <div class="w-3/4 mx-auto mt-8">
           <h1 class="font-bold text-3xl text-grey-800">Blog Name</h1>
           
           <!--地図表示-->
           <!--FIX:invalid api key (confingに書いてある)-->
           <div class="mx-auto w-3/4">
            <template>
              <GoogleMap api-key=google_key style="width: 100%; height: 500px" :center="center" :zoom="15">
                <Marker :options="{ position: center }" />
              </GoogleMap>
            </template>
                
           </div>

           <div class="w-1/2 mx-auto divide-gray-200 divide-y-2 space-y-4">

               <div v-for="post in posts"
                    class="space-y-5 p-3">
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