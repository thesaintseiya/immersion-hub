<script lang="ts" setup name="FormTextareaField">
import { useVModel, useVModelProps } from '../features/useVModel.js';

const emit = defineEmits(['update:modelValue']);
const props = defineProps({
  ...useVModelProps(),
  field: {
    type: Object,
    required: true,
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  inline: {
    type: Boolean,
    default: true,
  },
  errors: {
    type: String,
    default: null,
  },
});

const { inputValue } = useVModel(props, emit);
</script>

<template>
  <div>
    <label
      class="flex"
      :class="{ 'flex-col space-y-1': !inline }"
      :for="field.name"
    >
      <span class="text-sm min-w-[150px] pt-0.5">
        {{ field.label }}
      </span>
      <div class="w-full">
        <textarea
          class="w-full px-2 py-0.5 text-sm border border-transparent rounded outline-none shadow-input-idle"
          :class="{
            'shadow-red-500': errors,
            'hover:border-violet-500 focus:border-violet-500 hover:shadow-input-hover focus:shadow-input-focus': !errors,
          }"
          v-model="inputValue"
          v-bind="$attrs"
          :id="field.name"
          :rows="field.rows"
          :name="field.name"
          :maxlength="field.maxlength"
          :placeholder="field.placeholder"
          :disabled="disabled"
        />
        <p v-if="errors" class="mt-1 text-xs text-red-500">{{ errors }}</p>
      </div>
    </label>
  </div>
</template>
