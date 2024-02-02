<template>

    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>


    <div class="container mt-5">
    <div>ini Halaman Create Society</div> <br>

<form class="mt-5" @submit.prevent="saveSociety">
  <div class="mb-3">
        <label for="id_card_number" class="form-label">ID Card Number</label>
        <input type="text" id_card_number="id_card_number" id="id_card_number" class="form-control" v-model="form.id_card_number">
        <div v-if="errors.id_card_number" class="text-red-500 text-sm">{{ errors.id_card_number[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" v-model="form.name">
        <div v-if="errors.name" class="text-red-500 text-sm">{{ errors.name[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" password="password" id="password" class="form-control" v-model="form.password">
        <div v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="born_date" class="form-label">Birth Date</label>
        <input type="text" name="born_date" id="born_date" class="form-control" v-model="form.born_date">
        <small class="text-muted">Format: YYYY-MM-DD</small>
        <div v-if="errors.born_date" class="text-red-500 text-sm">{{ errors.born_date[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" v-model="form.gender">
          <option selected disabled>Chose Gender</option>
          <option value="male">Laki-laki</option>
          <option value="female">Perempuan</option>
        </select>
        <div v-if="errors.gender" class="text-red-500 text-sm">{{ errors.gender[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" address="address" id="address" class="form-control" v-model="form.address">
        <div v-if="errors.address" class="text-red-500 text-sm">{{ errors.address[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="regional_id" class="form-label">Regional ID</label>
        <input type="number" regional_id="regional_id" id="regional_id" class="form-control" v-model="form.regional_id">
        <div v-if="errors.regional_id" class="text-red-500 text-sm">{{ errors.regional_id[0] }}</div>
      </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>


<script setup>
import useSocieties from '../compossable/societies'
import { reactive } from 'vue'
 
const form = reactive({
    id_card_number: '',
    password: '',
    name: '',
    born_date: '',
    gender: '',  
    address: '',
    regional_id: ''
})
 
const { errors, storeSocieties } = useSocieties()
 
const saveSociety = async () => {
  try {
  await storeSocieties({ ...form });
  form.id_card_number = '';
 form.password = '';
 form.name = '';
 form.born_date = '',
 form.gender = '';
 form.address = '';
 form.regional_id = '';
 } catch (e) {
  console.error('Error Saving Society: ', e);
 }
}
</script>