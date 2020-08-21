<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
                <span v-if="message.user.name == user.name" style="float:right;color:red;cursor:poinnter;"  @click="removeMessage(message)">Delete Message</span>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages','user'],
    methods: {
        removeMessage(message) {
             axios.post('/delete', message).then(response => {
              console.log(response.data);
              this.messages.pop(message);
              let channel = Echo.private('chat');
                channel.whisper('messageRemoved', {
                    message: message
                });
            });
        }
    }
  };
</script>