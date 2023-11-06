<template>
    <div id="layout">
            <Navbar></Navbar>
            <RightSidebar></RightSidebar>
            <LeftSidebar></LeftSidebar>
            <router-view></router-view>

    </div>
</template>
<script>

import {defineComponent, ref} from 'vue';
import Navbar from "../components/client/layouts/Navbar.vue";
import RightSidebar from "../components/client/layouts/RightSidebar.vue";
import LeftSidebar from "../components/client/layouts/LeftSidebar.vue";

export default defineComponent({
    components: {
        Navbar,
        RightSidebar,
        LeftSidebar
    },
    data() {
        return {

        }
    },
    mounted() {

        // Function to append a script to the document's head
        const domain = window.location;
        const appendScript = (src) => {
            const script = document.createElement('script');
            if (src.startsWith('http') || src.startsWith('https')) {
                script.src = src;
            } else {
                script.src = domain + src;
            }
            document.head.appendChild(script);
        };

        // Call the appendScript function for each script URL
        const scriptUrls = [
            'https://code.jquery.com/jquery-3.6.0.min.js',
            'assets/bundles/libscripts.bundle.js',
            'assets/bundles/vendorscripts.bundle.js',
            'assets/bundles/mainscripts.bundle.js',
        ];
        setTimeout(scriptUrls.forEach((url) => {
            appendScript(url);
        }) , 3000);
    },
    methods:{
    }
});
</script>

<style scoped>
</style>
