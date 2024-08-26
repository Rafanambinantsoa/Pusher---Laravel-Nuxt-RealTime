<template>
    <div>
        <h3> Ajouter une remaques </h3>

        <input type="text" v-model="remarq" placeholder="Entrer vos remarques svp ">

        <button @click="send"> Envoyer ma remaque </button>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    data() {
        return {
            'remarq': ''
        };
    },
    methods: {
        async send() {
            
            let res = await axios.post('http://localhost:8000/api/submit-remarq', { remarq: this.remarq })
            console.log("cliqued");
            console.log(res.data);
            this.remarq = ""
        }
    }
}

</script>