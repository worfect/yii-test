<template>
  <h1 class="my-md-5 my-4"> Секрет: {{ secret.text }}</h1>
</template>
<script>
export default {
  data() {
    return {
      secret: {
        text: '',
      }
    }
  },
  methods: {
    async getSecret() {
      this.text = await fetch(
          'http://api:82/secret'
      ).then(res => res.json())
    }
  }
}
</script>