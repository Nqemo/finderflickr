<template>
  <div>
    <div class="text-base">
      <input type="text" placeholder="type tag to search..." v-model="tag" />
      <button
        type="submit"
        class="
          bg-blue-500
          hover:bg-blue-700
          text-white
          font-bold
          py-2
          px-5
          rounded-full
        "
        @click.prevent="searchTag"
      >
        Search
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tag: '',
    }
  },
  methods: {
    searchTag() {
      this.$emit('gettag', { tag: this.tag })
    },
  },
}
</script>
