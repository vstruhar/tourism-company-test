<template>
    <div class="card">
        <div class="card-header text-center">
            <slot name="header"></slot>
        </div>

        <alert :type="alert.type" :message="alert.message" v-show="alert.show"></alert>

        <div class="card-body">
            <transition-group name="guests-list" class="list-group" tag="ul">
                <guest-item v-for="(guest, index) in guests"
                            :guest="guest"
                            :index="index"
                            :deletable="guests.length > 1"
                            :key="guest.key"
                            :name.sync="guest.name"
                            :phone.sync="guest.phone"
                            @delete="deleteGuest(index)"></guest-item>
            </transition-group>
        </div>

        <div class="card-footer">
            <button class="btn btn-success float-right" @click="submitData" :class="{ disabled: request_pending }">
                <i class="fas fa-check"></i> Submit
            </button>
            <button class="btn btn-primary float-right" @click="addGuest">
                <i class="fas fa-plus"></i> Add row
            </button>
        </div>

        <preloader v-show="request_pending"></preloader>
    </div>
</template>

<script>
    import GuestItem from './GuestFormItemComponent.vue';
    import Preloader from './Preloader';
    import Alert from './AlertComponent';

    export default {
        name: 'guest-form',
        components: {
            GuestItem,
            Preloader,
            Alert,
        },
        data() {
            return {
                guests: [],
                alert: {
                    show: false,
                    type: 'primary',
                    message: '',
                },
                request_pending: false,
            }
        },
        methods: {
            addGuest() {
                this.guests.push({
                    key: Date.now(),
                    name: '',
                    phone: '',
                });
            },
            deleteGuest(index) {
                this.guests.splice(index, 1);
            },
            submitData() {
                let vm = this;

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        vm.request_pending = true;
                        vm.alert.show = false;

                        window.axios.post(window.ROUTES.api.form.guests, { guests: this.guests })
                            .then( (response) => {
                                vm.request_pending = false;

                                vm.showAlert('Form was successfully submitted!', 'success');
                                vm.clearForm();
                            })
                            .catch( (error) => {
                                vm.request_pending = false;

                                vm.showAlert(error.response.data.message, 'danger');
                            });
                    }
                });
            },
            showAlert(message, type) {
                this.alert.type = type;
                this.alert.message = message;
                this.alert.show = true;
            },
            clearForm() {
                this.guests = [];
                this.addGuest();
            }
        },
        mounted() {
            this.addGuest();
        }
    }
</script>

<style lang="scss" scoped>
    .card {
        margin-top: 20px;
        -webkit-box-shadow: 0 5px 30px rgba(0,0,0, 0.15);
        -moz-box-shadow: 0 5px 30px rgba(0,0,0, 0.15);
        box-shadow: 0 5px 30px rgba(0,0,0, 0.15);
    }
    .card-body {
        padding: 0;
    }
    .card-footer {
        button {
            margin-left: 10px;
        }
    }

</style>
