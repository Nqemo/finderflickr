<template>
  <div class="mb-2 md:w-1/2 md:mx-4 border rounded shadow-xl">
    <img class="rounded" :src="imgurl" />
    <!-- src="https://live.staticflickr.com/65535/51549563335_880c68506f_c.jpg" -->
    <div class="px-4 py-4">
      <div
        class="
          font-semibold
          leading-tight
          text-2xl text-gray-800
          hover:text-gray-800
        "
      >
        {{ image.title }}
      </div>
      <hr
        class="border-gray-200 my-1 border-bottom-none"
        style="border-top-width: 0"
      />
      <div class="flex text-gray-700 text-sm">
        <div class="pr-3">Tag:</div>
        <div>Posted by <span class="text-red-400">Admin</span></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    image: {
      type: Object,
      default() {
        return {}
      },
    },
    loading: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    imgurl() {
      return `https://live.staticflickr.com/${this.image.server}/${this.image.id}_${this.image.secret}.jpg`
    },
  },
}
</script>
