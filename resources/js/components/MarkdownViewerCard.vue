<template>
  <div class="nova-markdown" v-html="changelog"></div>
</template>

<script>
export default {

  props: ['card'],

  data() {
    return {
      changelog: null,
    };
  },

  mounted() {
    // this.html = marked(this.card.json.markdown);
  },
  async created() {
    await this.fetch();
  },
  methods: {
    async fetch() {
      this.changelog = (await Nova.request().get("/nova-vendor/nagyist/nova-markdown/index")).data;
    }
  }
};
</script>
