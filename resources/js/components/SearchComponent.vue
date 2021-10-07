<template>
  <div>
    <div class="text-base">
      <input
        type="text"
        placeholder="type tag to search..."
        v-model="tag"
        class="py-2 px-1 rounded-md mr-4"
      />
      <button
        type="submit"
        class="
          bg-white-mondo
          hover:bg-green2-mondo
          text-grey-mondo
          hover:text-white-mondo
          font-bold
          py-2
          px-5
          rounded-md
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
