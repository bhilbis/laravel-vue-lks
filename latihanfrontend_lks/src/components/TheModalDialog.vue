<template>
    <div
      v-if="show"
      class="modal fade show"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="display: block"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tagline</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="close"
            ></button>
          </div>
          <div class="modal-body">
            <label for="">Input Name</label>
            <input type="text" v-model="modal.name" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-light" @click="close">Close</button>
            <button type="button" class="btn btn-outline-primary" @click="simpanData">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue'
  defineProps({
    show: Boolean
  })
  const emit = defineEmits(['closeModal', 'simpan'])
  
  const modal = reactive({
    name: ''
  })
  
  const close = () => emit('closeModal', false)
  const simpanData = () => {
    emit('simpan', modal.name)
    emit('closeModal', false)
  }
  
//   const close = () => (props.show = false)
  </script>