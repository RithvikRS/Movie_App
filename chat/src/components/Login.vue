<template>
  <div class="login-container">
    <h1> Welcome to Global Chat of Trailer Box</h1>
    <button @click="loginSubmit">Login with Google</button>
    <a class="a" href="http://localhost/Project/">Go To Home Page</a>
  </div>
</template>

<script>
import firebase from 'firebase'
export default {
  methods: {
    loginSubmit() {
      const provider = new firebase.auth.GoogleAuthProvider()
      firebase.auth().signInWithRedirect(provider)
        .catch(console.log)
    }
  }
}
</script>

<style lang="scss">
  .login-container {
    width: 100%;
    text-align: center;
    padding-top: 50px;
    button {
      width: 50%;
      background-color: #4e37fc;
      color: white;
      font-weight: bold;
      font-size: 18pt;
      padding: 20px;
      border-radius: 15px;
      border: none;
      box-shadow: #00000040 0px 5px 10px;
      cursor: pointer;
      &:hover {
        background-color: #7562ff;
      }
    }
    h1 {
      color: white;
    }
    .a {
      width: 50%;
      text-decoration: none;
      background-color: #4e37fc;
      color: white;
      font-weight: normal;
      font-size: 18pt;
      padding: 20px;
      border-radius: 15px;
      border: none;
      box-shadow: #00000040 0px 5px 10px;
      cursor: pointer;
      &:hover {
        background-color: #7562ff;
      }
    }

  }
</style>
