import Bus from './bus'

Echo.join('channel-discussion')
   .listen('DiscussionSent', (e) => {
      console.log('====== berhasil ======')
      // console.log(e)
      Bus.$emit('chat.sent', e.message)
   })