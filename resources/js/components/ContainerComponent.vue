<template>
  <div>
    <span class="text-xs text-gray-500">{{ searchingfor }}</span>
    <search-component @gettag="getImages"></search-component>
    <div class="flex">
      <div
        class="flex-row flex-wrap justify-around"
        v-for="image in images"
        :key="image.id"
      >
        <photo-component :image="image"></photo-component>
      </div>
    </div>
  </div>
</template>

<script>
import PhotoComponent from './PhotoComponent.vue'
import SearchComponent from './SearchComponent.vue'
export default {
  components: { SearchComponent, PhotoComponent },
  data() {
    return {
      images: [],
      searchingfor: null,
      isLoading: false,
    }
  },
  mounted() {
    this.getImages()
  },
  methods: {
    getImages(objTag) {
      const api = objTag ? `/api/photos/${objTag.tag}` : '/api/photos'
      this.searchingfor = `searching for ${objTag.tag}`
      axios
        .get(api)
        .then((response) => {
          this.isLoading = !this.isLoading
          this.images = response.data.photos.photo
        })
        .catch((error) => {})
    },
  },
}
</script>
