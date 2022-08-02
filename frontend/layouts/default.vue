<template>
  <div class="main-wrapper">
    <div class="content">
      <Menu />
      <div class="container">
        <Nuxt />
      </div>
    </div>
    <Footer />
  </div>
</template>
<script>
import Menu from '~/components/Menu'
import Footer from "../components/Footer";
export default {
  components: {
    Footer,
    Menu
  }
}
</script>
