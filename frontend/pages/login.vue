<template>
  <form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" v-model="login.username" />
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" v-model="login.password" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      login: {
        username: '',
        password: ''
      }
    }
  },
  methods: {
    async userLogin() {
      try {
        let response = await this.$auth.loginWith('local', { data: this.login })
        console.log(response)
      } catch (err) {
        console.log(err)
      }
    }
  }
}
</script>