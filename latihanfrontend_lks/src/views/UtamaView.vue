<template>
    <div>
      <div class="container">
      <div class="alert alert-primary" role="alert">Alert!</div>
      <h2>status {{ form.open }}</h2>
      <h2>{{ form.title }}</h2>
      <h2 v-if="form.nama.length > 0">Nama saya adalah {{ form.nama }}</h2>
  
      <h3>increment {{ increment }}</h3>
  
      <input type="text" v-model="form.title" />
        <br>
      <div class="mt-2">
      <button @click="tambahIncrement" class="btn btn-outline-success mx-2">tambah increment</button>
      <button @click="kurangIncrement" class="btn btn-outline-success mx-2">kurang increment</button>
      <!-- <button @click="s" class="btn btn-outline-success">Test</button> -->
      <button @click="showModal(true)" class="btn btn-outline-success mx-2">Tampilkan</button>
      <button @click="showModal(false)" class="btn btn-outline-success mx-2">Tutup modal</button>
      <modal-dialog :show="form.open" @closeModal="tutupModal" @simpan="tampilNama" />
    </div>
    </div>
    </div>
  </template>
  
  <script setup>
  import { reactive, ref } from 'vue'
  import ModalDialog from '../components/TheModalDialog.vue'
  
  const form = reactive({
    open: false,
    title: 'ini adalah form',
    nama: ''
  })
  
  const increment = ref(0)
  
  // function tambahIncrement() {
  //   return increment.value
  // }
  
  const tambahIncrement = () => increment.value++
  const kurangIncrement = () => increment.value--
  
  const showModal = (data) => (form.open = data)
  const tutupModal = (data) => {
    console.log(data)
    form.open = data
  }
  const tampilNama = (data) => (form.nama = data)
  </script>