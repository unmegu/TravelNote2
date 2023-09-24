<script setup>
 import { router } from '@inertiajs/vue3'
 import { Link } from '@inertiajs/vue3'

</script>
<template>
    <!--TODO：中央ぞろえにする-->
       <div class="w-3/4 mx-auto mt-8">
           <h1 class="font-bold text-3xl text-grey-800">Travel Note App へようこそ</h1>

           <div class="w-1/2 mx-auto divide-gray-200 divide-y-2 space-y-4">
                <h2 class="mt-4 font-bold text-xl text-grey-800"> アプリの説明 </h2>
                <!--TODO:説明をDBからとってくるようにしたほうが良い？-->
                <p>hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge...</p>
           </div>
           
           <div>
               <Link href="/login" method="get" as="button">使ってみる</Link>
           </div>
       </div>

</template>