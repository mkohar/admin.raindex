<template>
   <div>
      <div class="discussion-area">
         <div v-for="discussion in discussions" :key="discussion.id" class="discussions">
            <div class="mt-1">
               <span class="username">
                  <strong><a href="#">{{ discussion.user.name}}</a></strong>
               </span>
               <small> - {{ discussion.created_at }}</small>
               <p>
                  {{ discussion.subject }}
               </p>
            </div>
         </div>
      </div>

   </div>
   
</template>

<script>
   import Bus from '../../bus'
   export default {
      data() {
         return {
            discussions: []
         }
      },

      props: [
         'url',
      ],

      mounted() {
         this.loadData();

         Bus.$on('chat.sent', (newChat) => {
            this.discussions.push(newChat)
            this.scrollToBottom()
         }).$on('chat.removed', (newChat) => {
            this.removeChat(newChat.id)
         })
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
         },

         scrollToBottom:function(){
            setTimeout(function() {
               let discussionArea = document.getElementsByClassName('discussion-area')[0]
               discussionArea.scrollTop = discussionArea.scrollHeight
            })
         },

         removeChat:function(id){
            this.discussions = this.discussions.filter((newChat) => {
               return newChat.id !== id
            })
         }

         
      }

      // method: {
      //    getDiscussion() {
      //       axios.get('/project/4/discussion').then(response => {
      //          console.log(response)
      //       })
      //    }
      // }
   }
</script>

<style lang="scss">
   .discussion-area {
      max-height: 300px;
      overflow-y: scroll;
   }

</style>
