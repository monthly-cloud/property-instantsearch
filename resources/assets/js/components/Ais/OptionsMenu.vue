<template>
        <div>
            <select  class="form-control" :disabled="disabled" :name="name" v-model="value" @keyup="update()" @change="update()">
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
        created() {
            this.searchStore.addFacet(this.name);
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
                this.searchStore.clearRefinements(this.name);
                if (this.value.length>0) {
                    this.searchStore.addFacetRefinement(this.name, this.value);
                }
                this.searchStore.start();
                this.searchStore.refresh();
            }
        }
    }
</script>
