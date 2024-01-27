<script>
export default {
  name: 'CategoriesForm',
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

defineProps({
  form: {
    type: Object,
    required: true,
  },

  updating: {
    type: Boolean,
    required: false,
    default: false,
  },
})

defineEmits(['submit']) //los emitis son para emitir eventos, en este caso el evento submit
</script>

<template>
  <!-- Esto es una comunicacion vertical ascendente de componentes, es decir, el componente padre le pasa al hijo los datos que necesita, y el hijo le pasa al padre los datos que necesita, pero no se comunican entre ellos, solo se comunican con el padre y el hijo, pero no entre ellos. -->
  <FormSection @submitted="$emit('submit')">
    <template #title>
      {{ updating ? 'Update Category' : 'Create New Category' }}
    </template>

    <template #description>
      {{ updating ? 'Update The Selected Category.' : 'Create a New category From Scratch.' }}
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-6">
        <InputLabel for="name" value="Name" />
        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
        <!--  -->
        <InputError :message="$page.props.errors.name" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <PrimaryButton type="submit">
        {{ updating ? 'Update' : 'Create' }}
      </PrimaryButton>
    </template>

  </FormSection>
</template>