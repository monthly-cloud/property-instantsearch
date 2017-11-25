<template>
    <div class="hit col-sm-4">
        <div class="pictures-wrapper">
            <img class="picture" :src="result.thumbnail_url">
        </div>

        <div class="infos">
            <h4 class="media-heading">
                {{ result.name }}
            </h4>
            <p>{{ result.city }}, {{ result.country }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['result']
    }
</script>
