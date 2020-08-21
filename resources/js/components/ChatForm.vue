<template>
    <div class="input-group">
        <!-- <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage"> -->
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keydown="typing"  @keyup.enter="sendMessage">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
        <br>
        <hr>
       
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            },
            typing() {
            let channel = Echo.private('chat');
          
                setTimeout(function() {
                channel.whisper('isTyping', {
                    user: Laravel.user,
                    typing: true
                });
            }, 300);
          }
        //     notTyping() {
        //     let channel = Echo.private('chat');
          
        //         setTimeout(function() {
        //         channel.whisper('isTyping', {
        //             user: Laravel.user,
        //             typing: false
        //         });
        //     }, 1200);
        //   }
        }    
    }
</script>