<template>
  <div>
    <the-top-nav-bar/>
    <router-view></router-view>
  </div>
</template>

<script setup>
  import TheTopNavBar from './components/TheTopNavBar.vue'
</script>