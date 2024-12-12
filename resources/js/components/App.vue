<template>
    <div>
      <h1>Смена настроек пользователя</h1>
      <form @submit.prevent="updateSetting">
        <input type="text" v-model="setting.key" placeholder="Ключ">
        <input type="text" v-model="setting.value" placeholder="Значение">
        <button type="submit">Сохранить</button>
      </form>
      <p v-if="confirmationCode">Код подтверждения: {{ confirmationCode }}</p>
      <form @submit.prevent="confirmCode">
        <input type="text" v-model="code" placeholder="Код подтверждения">
        <button type="submit">Подтвердить</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        setting: {
          key: '',
          value: ''
        },
        confirmationCode: '',
        code: ''
      }
    },
    methods: {
      updateSetting() {
        axios.post('/settings', this.setting)
          .then(response => {
            this.confirmationCode = response.data.confirmationCode;
          })
          .catch(error => {
            console.error(error);
          });
      },
      confirmCode() {
        axios.post('/confirmations', { code: this.code })
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.error(error);
          });
      }
    }
  }
  </script>
  