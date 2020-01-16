import Bus from './bus'

Echo.join('channel-discussion')

   .here((users) => {
      Bus.$emit('chat.here', users)
   })
   
   .joining((user) => {
      Bus.$emit('chat.joining', user)
   })

   .leaving((user) => {
      Bus.$emit('chat.leaving', user)
   })


   // Chat
   .listen('DiscussionSent', (e) => {
      console.log('====== berhasil ======')
      // console.log(e)
      Bus.$emit('chat.sent', e.message)
   })