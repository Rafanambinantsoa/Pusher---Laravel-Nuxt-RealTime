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
    mounted() {
        this.$echo.channel('my-channel')
            .listen('.my-event', (data) => {
                this.messages.push(JSON.stringify(data.message));
            });
    },
};
</script>