<template>
    <div>
        <h1>Pusher Test</h1>
        <p>
            Publish an event to channel <code>my-channel</code>
            with event name <code>my-event</code>; it will appear below:
        </p>
        <div>
            <ul>
                <li v-for="(message, index) in messages" :key="index">
                    {{ message }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
        };
    },
    async mounted() {
        try {
            const res = await axios.get('http://192.168.0.131:8000/api/messages');
            const messages = res.json()
            this.messages = messages
        } catch (error) {
            console.log(error);
        }

        this.$echo.channel('my-channel')
            .listen('.my-event', (data) => {
                const mess = this.messages.push(JSON.stringify(data.message));

                //insert  the mess in to api 
                axios.post('http://192.168.0.131:8000/api/messages', { content: mess })
                    .then((res) => {
                        console.log(res.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });
    },
};
</script>