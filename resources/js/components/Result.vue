<template>
  <div class="MyHome">
    <h1>test</h1>
        <div class="form_category">
            <div>
              <input v-model="name" id="name" type="text" >
            </div> 
            <div>
              <input v-model="phone" id="phone" type="text" >
            </div>
            <div>
              <input v-model="email" id="email" type="text" >
            </div>
            <div>
              <textarea v-model="comment" id="comment" name="comment"></textarea>
            </div>
        </div>
      <button type="button" @click="goSave">등록하기</button>
      <button type="button" @click="modify">수정하기</button>
      <button type="button" @click="del">삭제하기</button>
  </div>
</template>

<script>
import axios from 'axios';
import router from '../router.js';
export default {
    data() {
        return{
            id : router.id,
            dataArr : {}
        }
        
    },
    mounted(){
      console.log('id : ' + this.id);
      this.getInfo();
    },
    methods:{
      
      getInfo(){
        axios.get('/api/test/' + this.id)
        .then(res => {
          console.log('res.date : ' + JSON.stringify(res.data));
          this.dataArr = res.data;
        })
        .catch(err=>{
          if (err.message.indexOf('Network Error') > -1) {
            alert('네트워크가 원활하지 않습니다.\n잠시 후 다시 시도해주세요.')
          }else if(err.response && err.response.status === 500){
            alert('error');
          }else if(err.response && err.response.status === 403){
            alert('권한이 없습니다. 관리자에게 문의해주세요');
          }
        });
      },
      goSave(){
        router.push('/');
      },
      modify(){
        axios.put('/api/test/' + this.id)
        .then(res => {
          //console.log('res.date : ' + JSON.stringify(res.data));
          this.dataArr = res.data;
          this.getInfo();
        })
        .catch(err=>{
          if (err.message.indexOf('Network Error') > -1) {
            alert('네트워크가 원활하지 않습니다.\n잠시 후 다시 시도해주세요.')
          }else if(err.response && err.response.status === 500){
            alert('error');
          }else if(err.response && err.response.status === 403){
            alert('권한이 없습니다. 관리자에게 문의해주세요');
          }
        });
      },
      del(){
        if (!confirm("삭제하시겠습니까?")) return
        axios.delete('/api/test/' + this.id)
        .then(() => {
            alert('삭제되었습니다.')
            this.getInfo();
        })
        .catch(err=>{
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
}
</script>
