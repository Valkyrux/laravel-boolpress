<template>
    <div class="container">
        <div class="row">
            <div class="col" v-if="posts !== []">
                <div class="card mb-5" v-for="(post, index) in posts" :key="'guest-post-' + index">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{post.title}}</h5>
                        <p class="card-text">{{post.content}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';

export default {
    name: 'Main',
    data() {
        return {
            posts: [],
        }
    },
    created() {
        Axios.get('http://127.0.0.1:8000/api/posts')
        .then((result) => {
            this.posts = result.data.result;
        }).catch((error) => {console.log(error)});
    }
}
</script>

<style lang="scss" scoped>

</style>