<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
  import {Link} from '@inertiajs/vue3';

  const {post} = defineProps({
      post: Object
  });
</script>

<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ post.title }}の詳細ページ
            </h2>
        </template>

        <div class="w-3/4 mx-auto mt-8 space-y-4">
         
            <div>
                <h1>{{ post.title }}</h1>
                <!--投稿日は表記方法を考えて追加するか検討-->
                <!--<p>{{ post.created_at }}</p>-->
           </div>
           
            <a href="#">
                <!--<div v-if="post.image_url">-->
                <div>
                    <img :src="post.image_url" alt="画像が読み込めません。"/>
                </div>
            </a>

            <div>
                <h3>本文</h3>
                <p>{{ post.body }}</p>
            </div>

            <div>
                <Link href="index">戻る</Link>
                <Link :href="route('post.edit', { id: post.id })">Edit</Link>
            </div>

        </div>
    </Authenticated>
</template>