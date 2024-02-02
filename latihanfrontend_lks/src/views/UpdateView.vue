<template>
    
<div class="container">
  <form class="mt-5" @submit.prevent="saveSociety">
  <div class="mb-3">
        <label for="id_card_number" class="form-label">ID Card Number</label>
        <input type="text" id_card_number="id_card_number" id="id_card_number" class="form-control" v-model="society.id_card_number">
        <div v-if="errors !== null && errors.id_card_number" class="text-red-500 text-sm">{{ errors.id_card_number[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" password="password" id="password" class="form-control" v-model="society.password">
        <div v-if="errors.password" class="text-red-500 text-sm">{{ errors.password[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" v-model="society.name">
        <div v-if="errors.name" class="text-red-500 text-sm">{{ errors.name[0] }}</div>
      </div>
      <div class="mb-3">
        <label for="born_date" class="form-label">Birth Date</label>
        <input type="text" name="born_date" id="born_date" class="form-control" v-model="society.born_date">
        <small class="text-muted">Format: YYYY-MM-DD</small>
        <div v-if="errors.born_date" class="text-red-500 text-sm">{{ errors.born_date[0] }}</div>
      </div>
      <div class="mb-3">
      <label class="form-label">Gender</label>
        <select class="form-select" aria-label="Default select example" v-model="society.gender">
        <option value="">Open this select menu</option>
        <option :value="row" v-for="row in genders" v-bind:key="row.index">{{ row }}</option>
        </select>
        <div class="form-text text-danger" v-if="errors.gender">
        {{ errors.gender[0] }}
        </div>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" address="address" id="address" class="form-control" v-model="society.address">
        <div v-if="errors.address" class="text-red-500 text-sm">{{ errors.address[0] }}</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Regional Id</label>
        <select class="form-select" aria-label="Default select example" v-model="society.regional_id">
          <option value="">Open this select menu</option>
          <option :value="row.id" v-for="row in regionals" v-bind:key="row.index">
          {{ row.province }} - {{ row.district }}
          </option>
        </select>
        <div class="form-text text-danger" v-if="errors.regional_id">
        {{ errors.regional_id[0] }}
        </div>
      </div>
      <div class="mb-3">
        <input type="button" class="btn mr-1" value="cancel" @click="batal" />
        <button type="submit" class="btn btn-primary">save</button>
        <!-- <input type="button" class="btn btn-primary" value="Save Data" @click="simpan" /> -->
      </div>
</form>
</div>
</template>
 
<script setup>
import useSocieties from '../compossable/societies'
import useRegionals from '../compossable/regionals'
import { onMounted,ref } from 'vue'
 
const { errors, society,updateSocieties, getSociety} = useSocieties()

const genders = ref(['male', 'female'])
const props = defineProps({
  id_society: {
    required: true,
    type: String
  }
})

const { regionals, getRegionalLists} = useRegionals()
 
onMounted(async () => {
    await Promise.all([getSociety(props.id_society), getRegionalLists()])
  }
) 

const saveSociety = async () => {
    await updateSocieties(props.id_society, society.value)
}

// import { ref, reactive, watch } from 'vue'
// import { useRouter, useRoute } from 'vue-router'
// import useSocieties from '../compossable/societies'
// import useRegionals from '../compossable/regionals'

// const genders = ref(['male', 'female'])
// const { errors, society, updateSocieties, getSociety } = useSocieties()
// const { regionals, getRegionalLists } = useRegionals()

// const form = reactive({
//   id_card_number: '',
//   name: '',
//   password: '',
//   born_date: '',
//   gender: '',
//   address: '',
//   regional_id: ''
// })

// const router = useRouter()
// const route = useRoute()

// watch(
//   () => route.params.id_society,
//   async (newValue) => {
//     await getRegionalLists()
//     await getSociety(newValue)
//     Object.assign(form, society.value)
//   },
//   { immediate: true }
// )

// const batal = () => {
//   router.push({ name: 'crud' })
// }

// const simpan = async () => {
//   console.log('Society ID:', society.value.id);
//   console.log('Society Data:', society.value);

//   if (society.value.id) {
//     try {
//       await updateSocieties(society.value.id, society.value);
//     } catch (error) {
//       console.error('Error in simpan', error);
//     }
//   }
//   router.push({ name: 'crud' });
// };
</script>