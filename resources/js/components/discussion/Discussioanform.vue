<template>
   <div>
      <form action="#">
         <div class="form-group mt-4">
            <textarea class="form-control" id="message" rows="3" v-model="body" @keyup.enter="handleInput" placeholder="Tipe chat here ..."></textarea>
         </div>
      </form>
   </div>
   
</template>

<script>
   import Bus from '../../bus'
   import Moment from 'moment'

   export default { 
      data() {
         return {
            body: null
         }
      },

      props: [
         'url',
      ],

      methods: {
         handleInput:function(e){
            if(e.keyCode === 13 && !e.shiftKey) {
               e.preventDefault()
               this.submit()
            }
         },
         submit:function() {
            if (!this.body || this.body.trim() === '') {
               return
            }

            let newChat = {
               subject: this.body.trim(),
               created_at: Moment().utc(0).format('YYYY-MM-DD HH:mm:ss'),
               // created_at: 'YYYY-MM-DD HH:mm:ss',
               user: {
                  name: Laravel.user.name
               }
            }

            axios.post(this.url, {subject: this.body.trim()}).then(response => {
               Bus.$emit('chat.sent', newChat)
               this.body = ''
            })
         }
      }
   }
</script>

<style lang="scss">
   .textarea {
      border: none;
   }
</style>

