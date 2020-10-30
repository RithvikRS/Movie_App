  import Vue from 'vue'
  import App from './App.vue'
  import firebase from 'firebase'

  Vue.config.productionTip = false

  const firebaseConfig = {

      /*Add your firebase SDK config*/
  };

  firebase.initializeApp(firebaseConfig)

  firebase.auth().onAuthStateChanged(() => new Vue({
      render: h => h(App),
  }).$mount('#app'))