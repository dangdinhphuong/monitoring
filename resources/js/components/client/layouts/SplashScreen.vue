<template>
    <div v-if="showSplashScreen" class="splash-screen">
        <img src="https://www.simicart.com/blog/wp-content/uploads/pwa-splash-screen-featured-image.png" alt="Splash Screen Image">
    </div>
</template>

<script>
export default {
    name: 'SplashScreen',
    data() {
        return {
            showSplashScreen: true, // Ban đầu hiển thị splash screen
        };
    },
    mounted() {
        // Đợi một khoảng thời gian hoặc điều kiện khác (ví dụ: khi dữ liệu đã được tải xong)
        setTimeout(() => {
            this.showSplashScreen = false; // Ẩn splash screen
        }, 2000); // Ví dụ: ẩn sau 2 giây
    },
};
</script>

<style scoped>
.splash-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffffff; /* Màu nền của splash screen */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Đảm bảo nó hiển thị phía trên mọi thứ khác */
}
</style>
