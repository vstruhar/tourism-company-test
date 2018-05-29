<template>
    <div class="alert alert-dismissible fade show" :class="'alert-'+type" role="alert">

        <h5 v-if="type==='danger'" class="font-weight-bold">Whoops:</h5>
        <h5 v-if="type==='success'" class="font-weight-bold">Success:</h5>

        {{ message }}
    </div>
</template>

<script>
    export default {
        name: "alert-component",
        props: {
            type: {
                type: String,
                default: 'primary',
                validator: (value) => {
                    return ['success', 'warning', 'danger', 'primary'].indexOf(value) !== -1
                },
            },
            message: {
                type: String,
                required: true,
            }
        }
    }
</script>

<style lang="scss" scoped>
    .alert {
        margin-bottom: 0;
        border-radius: 0;
    }
</style>