<template>
        <div>
            <select  class="form-control" :disabled="disabled" :name="name" :operator="operator" v-model="value" @keyup="update()" @change="update()">
                <slot></slot>
            </select>
        </div>
</template>

<script>
    import { Component } from 'vue-instantsearch'
    export default {
        mixins: [Component],
        props: {
            'name': { required: true },
            'operator': { default: "=" },
            'label': { default: false },
            'required': { default: false }
        },
        data() {
            return {
                value: '',
                disabled: false
            };
        },
        mounted() {
        },
        methods: {
            disableIt() {
                this.disabled = true;
            },
            enableIt() {
                this.disabled = false;
            },
            append(value) {
                this.value = value;
            },
            update() {
                this.searchStore.stop();
                this.searchStore.removeNumericRefinement(this.name, this.operator);
                this.searchStore.addNumericRefinement(this.name, this.operator, this.value);
                this.searchStore.start();
                this.searchStore.refresh();
            }
        }
    }
</script>
