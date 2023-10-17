<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
  import { useForm } from '@inertiajs/vue3';

  const form = useForm({
      title: "",
      body: "",
      image: null,
  })
  
  function setImage(event){
    //console.log(event);
    form.image = event.target.files[0]
    //console.log(form.image);
  }

</script>
<template>
  <Authenticated>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                投稿作成ページ
            </h2>
      </template>

      <div class="mt-12 mx-auto w-3/4 p-6 bg-cyan-100 border-2 border-gray-200 flex-col rounded">
          <form @submit.prevent="form.post(route('post.store'))" enctype="multipart/form-data">
              <!-- title-->
              <div class="m-5">
                  <label for="title">タイトル:</label>
                  <input type="text" v-model="form.title" id="title" class="w-full"/>
                  <div class="text-red-700" v-if="form.errors.title">{{ form.errors.title }}</div>
              </div>
              
              <!--画像投稿機能-->
              <div class="image">
                <label for="image">スポットの写真:</label>
                <input type="file" @change="setImage" name="image">
              </div>
              
              <!-- body -->
              <div class="m-5">
                  <label for="body">本文:</label>
                  <input type="text" v-model="form.body" id="body" class="w-full">
                  <div class="text-red-700" v-if="form.errors.body">{{ form.errors.body }}</div>
              </div>
              <!--TODO:位置情報をここで入力&位置情報取得方法を調べる(最低実装：現在位置)-->

              <!-- submit -->
              <button
                  class="ml-auto border-2 border-gray-200 bg-cyan-100 px-2 flex"
                  type="submit"
                  :disabled="form.processing">
                  Create
              </button>
          </form>
      </div>
  </Authenticated>
</template>