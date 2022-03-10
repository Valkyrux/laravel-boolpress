<template>
    <div class="card mb-5">
        <div class="card-img-top" v-if="image">
            <img :src="'storage/' + image" class="w-100" :alt="title">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{content}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: ['title', 'image', 'content'],
}
</script>

<style lang="scss" scoped>

</style>