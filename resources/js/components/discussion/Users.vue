<template>
   <div class="container">
      
   </div>
</template>

<script>
   export default {
      data() {
         return {
            users: []
         }
      },
      props: [
         'url',
      ],
      mounted() {
         this.loadData();
      },
      methods:{
         loadData:function(){
            axios.get(this.url).then(response=>{
               if(response.status==200){
                  this.discussions=response.data
                  this.scrollToBottom()
               }
            }).catch(err=>{
                  console.log(err)
            });
         }         
      }
   }
</script>
