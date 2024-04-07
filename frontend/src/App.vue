<template>
  <div id="app">
    <div class="logo">Client Hub</div>
    <a href="#/">Home</a> |
    <a href="#/clients">Clients</a> |
    <component :is="currentView" />
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import ClientsComponent from './components/ClientsComponent.vue';
import ClientCreateForm from './components/ClientCreateForm.vue';

const routes = {
  '/': ClientCreateForm,
  '/clients': ClientsComponent,
};

const currentPath = ref(window.location.hash);

window.addEventListener('hashchange', () => {
  currentPath.value = window.location.hash;
});

const currentView = computed(() => {
  return routes[currentPath.value.slice(1) || '/'];
});
</script>

<style>
.logo {
  font-family: 'Arial', sans-serif;
  font-size: 36px;
  font-weight: bold;
  color: #333;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
  padding: 10px;
  border-radius: 5px;
  background-color: #f8f9fa;
  display: inline-block;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>