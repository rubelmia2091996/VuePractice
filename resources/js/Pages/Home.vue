<script setup>
defineProps({
  users: Object,
});
</script>

<template>
  <div>
    <h1>Home Page</h1>

    <table border="1" class="w-full text-left">
      <thead>
        <tr>
          <th class="px-4 py-2">Avatar</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Created At</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id">
          <td>
            <img 
                :src="user.avatar ? '/storage/' + user.avatar : '/storage/avatars/default.png'" 
                alt="Avatar"
                class="w-10 h-10 rounded-full"
            />
          </td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ new Date(user.created_at).toLocaleString() }}</td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
      <button 
        :disabled="!users.prev_page_url"
        @click="$inertia.get(users.prev_page_url)"
        class="px-4 py-2 bg-gray-200"
      >
        Previous
      </button>
      <button 
        :disabled="!users.next_page_url"
        @click="$inertia.get(users.next_page_url)"
        class="px-4 py-2 bg-gray-200"
      >
        Next
      </button>
    </div>
  </div>
</template>
