<template>
  <div id="app" class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="logo display-4 font-weight-bold text-dark bg-light p-3">Client Hub</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-right">
        <div id="nav">
          <a href="#/">Home</a> |
          <a href="#/clients">Clients</a> |
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="form-container">
          <component :is="currentView" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// Your script setup code here
</script>


<script setup>
import { ref, computed } from 'vue';
import ClientListComponent from './components/ClientListComponent.vue';
import ClientCreateComponent from './components/ClientCreateComponent.vue';

const routes = {
  '/': ClientCreateComponent,
  '/clients': ClientListComponent,
};

const currentPath = ref(window.location.hash);

window.addEventListener('hashchange', () => {
  currentPath.value = window.location.hash;
});

const currentView = computed(() => {
  return routes[currentPath.value.slice(1) || '/'];
});
</script>