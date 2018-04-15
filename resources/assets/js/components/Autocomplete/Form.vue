<template>
    <div>
        <div class="algolia-autocomplete">
            <h4>Algolia places</h4>
            <autocomplete-places :placeholder="placeholder" @change="redirect"></autocomplete-places>
        </div>
        <div class="google-autocomplete">
            <h4>Google maps</h4>
            <gmap-autocomplete :placeholder="placeholder" @place_changed="redirect"></gmap-autocomplete>
        </div>
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
            var params = '';
            if (suggestion.latlng) {
                // Algolia places
                params = '?lat='+suggestion.latlng.lat+'&lng='+suggestion.latlng.lng;
            } else if (suggestion.geometry) {
                // Google maps
                params = '?lat='+suggestion.geometry.location.lat()+'&lng='+suggestion.geometry.location.lng();
            }
            if (params.length>0) {
                window.location.href = this.href + params;
            }
        },
    },
}
</script>
<style type="text/css">
.google-autocomplete {
    margin-top: 10px;
}
.google-autocomplete input {
  width: 100%;
  padding-right: 35px;
  padding-left: 16px;
  line-height: 40px;
  height: 40px;
  border: 1px solid #CCC;
  border-radius: 3px;
  outline: none;
  font: inherit;
  appearance: none;
  -webkit-appearance: none;
  box-sizing: border-box;
}

.google-autocomplete input::-webkit-search-decoration {
  -webkit-appearance: none;
}

.google-autocomplete input::-ms-clear {
  display: none;
}


</style>