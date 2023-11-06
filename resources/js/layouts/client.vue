<template>
    <div id="layout">
        <Navbar></Navbar>
        <RightSidebar></RightSidebar>
        <LeftSidebar></LeftSidebar>
        <router-view></router-view>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
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
        return {};
    },
    mounted() {
        // Sử dụng `this.$nextTick` để đảm bảo toàn bộ template đã được tải xong trước khi thực hiện tác vụ trong `mounted`
        this.$nextTick(() => {
       // Lấy URL hiện tại
            var currentProtocol = window.location.protocol;
            var currentDomain = window.location.hostname;
            var domain = currentProtocol + '//' + currentDomain;
            console.log(domain);
            const appendScript = (src) => {
                const script = document.createElement('script');
                if (src.startsWith('http') || src.startsWith('https')) {
                    script.src = src;
                } else {
                    script.src = domain + src;
                }
                document.head.appendChild(script);
            };

            const scriptUrls = [
                'https://code.jquery.com/jquery-3.6.0.min.js',
                '/assets/bundles/libscripts.bundle.js',
                '/assets/bundles/vendorscripts.bundle.js',
                '/assets/bundles/mainscripts.bundle.js',
            ];

            scriptUrls.forEach((url) => {
                appendScript(url);
            });
        });
    },
    methods: {},
});
</script>

<style scoped>
</style>
