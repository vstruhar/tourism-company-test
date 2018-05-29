<template>
    <div class="overlay">
        <i class="fa fa-circle-notch fa-spin"></i>
    </div>
</template>

<script>
    export default {
        name: "Preloader"
    }
</script>

<style lang="scss" scoped>
    .overlay {
        background: rgba(0,0,0, 0.3);
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        text-align: center;
        padding-top: 20%;

        i.fa {
            color: #fff;
            top: 50%;
            font-size: 4rem;
        }
    }
</style>