<template>
  <div>
    <input type="text" v-model="keyword">
    <div class="result-view">
      <ul>
        <li v-for="(listing, key) in listings" :key="key">
          {{ listing.title }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: "",
      listings: {}
    }
  },
  methods: {
    search() {
      // axios.get('/api/listings?title=' + this.keyword)
      axios.get('/listings?title=' + this.keyword)
        .then(res => {
          this.listings = res.data;
        })
        .catch(error => {
          console.log('データの取得に失敗しました。');
        });
    }
  },
  watch: {
    keyword() {
      this.search();
    }
  },
}
</script>