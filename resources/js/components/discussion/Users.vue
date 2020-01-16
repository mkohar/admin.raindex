<template>
   <div>
      <div>
         <p class="text-sm mt-2 mb-0 pb-0">Team online
            <div v-for="userOnline in usersOnline" :key="userOnline.id">
               <b class="d-block">{{ userOnline.name }} <span class="dot-online"></span></b>
            </div>
         </p>
      </div>
   </div>
</template>

<script>
   import Bus from '../../bus'

   export default {
      data() {
         return {
            usersOnline: []
         }
      },
      props: [
         'url',
      ],
      mounted() {
         this.loadData();

         Bus.$on('chat.here', (users) => {
            this.usersOnline = users
         }).$on('chat.joining', (user) => {
            this.usersOnline.push(user)
         }).$on('chat.leaving', (user) => {
            this.usersOnline = this.usersOnline.filter((u) => {
               return u.id !== user.id
            })
         })
      },
      methods:{
         loadData:function(){
            axios.get(this.url).then(response=>{
               if(response.status==200){
                  this.users=response.data
               }
            }).catch(err=>{
                  console.log(err)
            });
         }         
      }
   }
</script>

<style lang="scss">
   .dot-online {
      height: 10px;
      width: 10px;
      background-color: #28a745;
      border-radius: 50%;
      display: inline-block;
   }
   .dot-offline {
      height: 10px;
      width: 10px;
      background-color: #868e96;
      border-radius: 50%;
      display: inline-block;
   }
</style>
