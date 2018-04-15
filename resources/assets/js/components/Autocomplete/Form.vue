<template>
    <div>
         <autocomplete :placeholder="placeholder" @change="redirect"></autocomplete>
    </div>
</template>
 
<script>
export default {
    props: {
        'href': { required: true },
        'placeholder': { default: 'Where are we going ?'}
    },
    methods: {
        redirect(suggestion) {
            if (suggestion.latlng) {
                window.location.href = this.href + '?lat='+suggestion.latlng.lat+'&lng='+suggestion.latlng.lng;
            }
        },
    },
}
</script>