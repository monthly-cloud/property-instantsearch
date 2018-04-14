<template>
        <div>
            <datepicker :name="name" v-model="value" @selected="update"></datepicker>
        </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import { Component } from 'vue-instantsearch'
    export default {
        components: {
            Datepicker
        },
        mixins: [Component],
        props: {
            'name': { required: true },
            'operator': { default: "<=" },
            'label': { default: false },
            'required': { default: false }
        },
        data() {
            return {
                value: '',
            };
        },
        methods: {
            dateToTimestamp(date) {
                return date.getTime() / 1000;
            },
            append(value) {
                this.value = value;
            },
            update(date) {
                this.searchStore.stop();
                this.searchStore.removeNumericRefinement(this.name, this.operator);
                this.searchStore.addNumericRefinement(this.name, this.operator, this.dateToTimestamp(date));
                this.searchStore.start();
                this.searchStore.refresh();
            }
        }
    }
</script>
