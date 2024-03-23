<template>
  <div class="home">
    <h1>First Laravel data test Board</h1>
    <form @submit.prevent="handleSubmit">
        <div class="form_category">
            <div>
              <label for="name">Name : </label>
              <input v-model="name" id="name" type="text" >
            </div> 
            <div>
              <label for="phone">Phone : </label>
              <input v-model="phone" id="phone" type="text" >
            </div>
            <div>
              <label for="email">Email : </label>
              <input v-model="email" id="email" type="text" >
            </div>
            <div>
              <label for="comment">Comment :</label>
              <textarea v-model="comment" id="comment" name="comment"></textarea>
            </div>
        </div>
      <button type="submit">보내기</button> 
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import router from '../router.js';
export default {
  data() {
    return {
      name: '',
      phone: '',
      email: '',
      comment: ''
    };
  },
  methods: {
    handleSubmit() {
      //console.log('name : ' + this.name);
      //console.log('phone : ' + this.phone);
      //console.log('email : ' + this.email);
      //console.log('comment : ' + this.comment);
      axios.post('/api/test', {
        name: this.name,
        phone: this.phone,
        email: this.email,
        comment: this.comment
      })
      .then(res => {
        
        console.log('res.data : ' + JSON.stringify(res.data));
        router.push({
          path: '/result?id=' + res.data.id,
          //query: { id: res.data.id }
        });
      })
      .catch(err => {
        if (err.message.indexOf('Network Error') > -1) {
          alert('네트워크가 원활하지 않습니다.\n잠시 후 다시 시도해주세요.')
        }else if(err.response && err.response.status === 500){
          alert('error');
        }else if(err.response && err.response.status === 403){
          alert('권한이 없습니다. 관리자에게 문의해주세요');
        }
      });
    }
  }
};
</script>

<style scoped>
  input[type="text"],
  textarea {
    width: 30%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  label {
    display: block;
    margin-bottom: 5px; /* 라벨 사이의 간격 조절 */
  }
  

</style>
