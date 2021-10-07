<template>
  <div>
    <img :src="image.media.m" />
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
}
</script>
