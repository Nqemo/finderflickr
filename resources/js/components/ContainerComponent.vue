<template>
  <div>
    <!-- block loading -->
    <loading-component :active.sync="isLoading" />
    <!-- end block -->

    <!-- block header -->
    <div class="flex justify-between h-16 bg-green-mondo w-full">
      <div class="m-2 text-3xl font-medium text-white-mondo flex-grow">
        Mondo Flickr Search
      </div>
      <div class="m-2 flex flex-row flex-nowrap flex-grow-0">
        <search-component @gettag="getImages"></search-component>
      </div>
    </div>
    <!-- end block -->

    <!-- block container -->
    <div class="container m-4 flex flex-wrap mx-auto">
      <div
        v-for="image in images"
        :key="image.id"
        class="w-full lg:w-1/4 border border-white-mondo rounded-2xl"
      >
        <photo-component :image="image"></photo-component>
      </div>
    </div>
    <!-- end block -->
  </div>
</template>

<script>
import PhotoComponent from './PhotoComponent.vue'
import SearchComponent from './SearchComponent.vue'
import LoadingComponent from './LoadingComponent.vue'

export default {
  components: { SearchComponent, PhotoComponent, LoadingComponent },
  data() {
    return {
      images: [],
      isLoading: false,
    }
  },
  mounted() {
    this.getImages()
  },
  methods: {
    getImages(objTag) {
      this.isLoading = true
      const api = objTag ? `/api/photos/${objTag.tag}` : '/api/photos'
      axios
        .get(api)
        .then((response) => {
          console.log(response)
          this.isLoading = false
          this.images = response.items

          // TODO: error handler
          switch (response.status) {
            case 200:
              this.images = response.data.items
              break

            default:
              console.log(`problem with API. ${response.data.message}`)
              break
          }
        })
        .catch((error) => {
          console.error(error)
        })
    },
  },
}
</script>
