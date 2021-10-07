<template>
  <!-- <div class="mb-2 md:w-1/2 md:mx-4 border rounded shadow-xl"> -->
  <div>
    <img :src="imgurl" />
    <!-- src="https://live.staticflickr.com/65535/51549563335_880c68506f_c.jpg" -->
    <div class="px-2 py-2">
      <div class="truncate font-semibold leading-tight text-xs text-grey-mondo">
        {{ image.title }}
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
  },
  computed: {
    imgurl() {
      return `https://live.staticflickr.com/${this.image.server}/${this.image.id}_${this.image.secret}_c.jpg`
    },
  },
}
</script>
