<script setup>
defineProps({
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "text",
  },
  modelValue: {
    type: [String, Number],
    default: "",
  },
  message: {
    type: String,
    default: "",
  },
});

const emit = defineEmits(["update:modelValue"]);
</script>

<template>
  <div class="mb-3">
    <label>{{ name }}</label>
    <input
      :type="type"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="{'!ring-red-500': message}"
      class="form-input"
    />
    <small class="text-red-900" v-if="message">{{ message }}</small>
  </div>
</template>

<style scoped>
.form-input {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}
</style>
