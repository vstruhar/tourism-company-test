<template>
    <li class="list-group-item">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text"
                       :name="'name_'+guest.key"
                       v-validate="'required|alpha_spaces|min:3'"
                       data-vv-as="name"
                       class="form-control"
                       :class="{'has-error': errors.has('name_'+guest.key) }"
                       :value="guest.name"
                       @input="$emit('update:name', $event.target.value)">

                <span class="text-danger">{{ errors.first('name_'+guest.key) }}</span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-9">
                <input type="text"
                       :name="'phone_'+guest.key"
                       v-validate="'required|phoneNumber'"
                       data-vv-as="phone"
                       class="form-control"
                       :class="{'has-error': errors.has('phone_'+guest.key) }"
                       :value="guest.phone"
                       @input="$emit('update:phone', $event.target.value)">

                <span class="text-danger">{{ errors.first('phone_'+guest.key) }}</span>
            </div>
        </div>

        <button class="btn btn-danger delete-btn" :class="{ disabled: !deletable }" @click="deleteGuest(index)">
            <i class="fas fa-times"></i>
        </button>
    </li>
</template>

<script>
    export default {
        name: 'guest-form-item',
        props: ['guest', 'index', 'deletable'],
        inject: ['$validator'],
        methods: {
            deleteGuest(index) {
                if( this.deletable ) {
                    this.$emit('delete', index);
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    li.list-group-item {
        border-radius: 0;
        border-left: none;
        border-right: none;
        padding-top: 25px;
        padding-bottom: 15px;
    }
    button.delete-btn {
        position: absolute;
        top: 25px;
        right: 20px;
    }
    input.has-error {
        border: 1px solid var(--red);
    }
    .list-group-item {
        transition: all 0.3s;
        display: inline-block;
    }
    .guests-list-enter, .guests-list-leave-to {
        opacity: 0;
    }
</style>