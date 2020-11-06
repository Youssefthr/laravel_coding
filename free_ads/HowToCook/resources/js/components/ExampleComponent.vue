<template>
        <div>
            <input type="text" placeholder="Search cooking lesson" v-model="query">        
            <ul v-if="results.length > 0 && query">
                <li v-for="result in results.slice(0,10)" :key="result.id">
                <a :href="result.url">
                    <div v-text="result.title"></div>
                </a>
                </li>
            </ul>
        </div>
</template>

<script>
    data() {
  return {
    query: null,
    results: []
  };
},
watch: {
  query(after, before) {
    this.searchPosts();
  }
},
methods: {
  searchPosts() {
    axios.get('post/search', { params: { query: this.query } })
    .then(response => this.results = response.data)
    .catch(error => {});
  }
}
</script>
