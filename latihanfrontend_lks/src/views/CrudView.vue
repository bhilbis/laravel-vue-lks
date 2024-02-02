<template>
    <div>
      <div class="container">
        <div class="items-center">Ini halaman CRUD</div>
        <br>
        <div><button type="button" class="btn btn-primary" @click="addSociety">Create</button></div>
        <br>
        <div class="alert alert-success" v-if="successMessage">{{ successMessage }}</div>
        <div class="alert alert-danger" v-if="errorMessage">{{ errorMessage }}</div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">birth Date</th>
      <th scope="col">Gender</th>
      <th scope="col">Regional</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(row, index) in societies" :key="row.id_society">
      <th scope="row">{{ index + 1 }}</th>
      <td>{{ row.name }}</td>
      <td>{{ row.born_date}}</td>
      <td v-if="row.gender === 'male'">L</td>
      <td v-else>p</td>
      <td>{{ row.regional_id }}</td>
      <td>
        <router-link :to="{ name: 'crud-update', params: { id_society: row.id_society} }"
        class="btn btn-primary mx-2">Edit</router-link> 
        
        <button @click="deleteSocieties(row.id_society)" class="btn btn-danger">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';
    import useSocieties from '../compossable/societies'

    const { societies, getSocieties, destroySocieties,  } = useSocieties()
    const router = useRouter()

    const successMessage = ref('')
    const errorMessage = ref('')

    const isAuthenticated = '';
    onMounted(async () => {
    if (isAuthenticated) {
    await getSocieties();
  } else {
    // Redirect to the login page if not authenticated
    router.push('/auth/login');
  }
});

    const deleteSocieties = async (id) => {
    if (!window.confirm('Are you sure you want to delete this data?')) {
    // Show alert for cancellation
    errorMessage.value = 'Deletion cancelled.'
    return
  } try {

    await destroySocieties (id)
    await getSocieties()

    // Show alert for successful deletion
    successMessage.value = 'Data deleted successfully.'

    setTimeout(() => {
        successMessage.value = ''
        errorMessage.value = ''
      }, 3000);

  } catch (e) {
    console.error('Error deleting society:', e)

    // Show alert for failure
    errorMessage.value = 'Failed to delete the record. Please try again.'
  }
} 

    const addSociety = () => {
    router.push({ name: 'crud-add' });
    }

    onMounted( () => {
        getSocieties()
    })
</script>