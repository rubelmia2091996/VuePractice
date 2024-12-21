<script setup>
defineProps({
  users: Object,
  executionTime: String,
});
</script>

<template>
  <div>
    <h1>User List</h1>
    <table>
      <thead>
        <tr>
          <th>SL</th>
          <th>Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id">
          <td>{{ key }}</td>
          <img 
              :src="user.avatar ? '/storage/avatars/' + user.avatar : '/storage/avatars/default.png'" 
              alt="Avatar"
              class="w-10 h-10 rounded-full"
            />
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.created_at }}</td>
        </tr>
      </tbody>
    </table>

    <!-- <p><strong>Execution Time:</strong> {{ executionTime }} seconds</p> -->
  </div>
</template>
