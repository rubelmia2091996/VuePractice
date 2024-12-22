<script setup>
import { ref,watch } from "vue";
import PaginationLinks from "./Components/PaginationLinks.vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
const props = defineProps({
  users: Object,
  executionTime: String,
  searchTerm : String,
  can: Object,
});
const search = ref(props.searchTerm);
watch(search, debounce((q) => {
  router.get('/', { search: q }, { preserveState: true });
}, 500));

const getDate = (date) => 
  new Date(date).toLocaleDateString("en-us", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });


</script>

<template>
  <Head :title="` | ${$page.component}`" />
  <div v-if="$page.props.auth.user">
    <div class="flex justify-end mb-4">
      <div class="w-1/4">
        <input type="search" placeholder="Search" v-model="search">
      </div>

    </div>
    <h1>User List</h1>
    <table>
      <thead>
        <tr>
          <th>SL</th>
          <th>Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th v-if="can.delete_user">Delete</th>
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
          <td>{{ getDate(user.created_at) }}</td>
          <td v-if="can.delete_user">
            <button class="bg-red-500 w-6 h-6 rounded-full"></button>
          </td>
        </tr>
      </tbody>
    </table>
    <div>
      <PaginationLinks :paginator="users" />
    </div>
    <p><strong>Execution Time:</strong> {{ executionTime }} seconds</p>
  </div>
</template>
