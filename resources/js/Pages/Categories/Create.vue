<script>
export default {
  name: 'CategoriesCreate',
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3'; // esto es para usar el formulario de inertia en vue3 que ya viene con inertia
import AppLayout from '@/Layouts/AppLayout.vue'
import CategoriesForm from '@/components/Categories/Form.vue'

const form = useForm({
  name: '',
});
</script>


<template>
  <AppLayout>
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">Create Categories</h1>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <CategoriesForm :form="form" @submit="form.post(route('categories.store'))" />
          </div>
        </div>
      </div>
    </div>

  </AppLayout>

</template>