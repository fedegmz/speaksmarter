<script>
export default {
  name: 'categoriesIndex',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'


const {categories} = defineProps({
  categories: {
    type: Object,
    required: true,
  },
})


const deleteCategory = async (id) => {
  let $category = document.getElementById('category-'+id);
  if (confirm('Are you sure you want to delete this category?')) {
    const response = await fetch(`/categories/${id}`, {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Content-Type': 'application/json',
      },
    });

    if (!response.ok) {
      const data = await response.json();
      console.error('Error deleting category', data);
    } else {
        console.log(data.message);
      // Actualizar la lista de categorías después de eliminar
        $category.remove();
    }
  }
}
</script>

<template>
  <AppLayout>
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h1>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create categories')">
            <Link :href="route('categories.create')"
              class="px-4 py-2 text-sm text-white bg-indigo-500 rounded hover:bg-indigo-700">
            CREATE CATEGORY
            </Link>
          </div>
          <div class="mt-4">
            <ul role="list" class="divide-y divide-gray-100">
              <li class="flex justify-between gap-x-6 py-5" v-for="category in categories.data" :id="'category-'+category.id">
                <div class="flex min-w-0 gap-x-4">
                  <div class="min-w-0 flex-auto">
                    <p class="text-md font-semibold leading-6 text-gray-900">{{ category.name }}</p>
                  </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                  <p class="text-md leading-6 text-gray-900">
                    <Link :href="route('categories.edit', category.id)" v-if="$page.props.user.permissions.includes('update categories')">Edit</Link>
                    <button @click="deleteCategory(category.id)" v-if="$page.props.user.permissions.includes('delete categories')">Delete</button>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </AppLayout>
</template>