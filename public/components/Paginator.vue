<!-- Paginator.vue -->
<template>
    <div class="pagination">
      <a v-for="page in totalPages" :key="page" @click="changePage(page)" :class="{ 'page-link': true, 'active': page === currentPage }">{{ page }}</a>
    </div>
  </template>
  
  <script>
  export default {
    props: ['currentPage', 'totalPages'],
    methods: {
      changePage(page) {
        this.$emit('page-changed', page);
      }
    }
  };
  </script>
  
  <style scoped>
  .pagination {
    margin-top: 20px;
  }
  
  .page-link {
    display: inline-block;
    padding: 8px;
    margin: 0 5px;
    cursor: pointer;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
    border-radius: 5px;
  }
  
  .page-link:hover {
    background-color: #f2f2f2;
  }
  
  .active {
    background-color: #007bff;
    color: #fff;
  }
  </style>
  