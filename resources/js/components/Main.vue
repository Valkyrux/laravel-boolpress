<template>
    <div class="container">
        <div class="row">
            <div class="col" v-if="posts !== []">
                <Card v-for="(post, index) in posts" :key="'guest-post-' + index" :title="post.title" :content="post.content" :image="post.image" />
            </div>
            <div class="text-center mb-3">
                 <button class="btn" :disabled="!prevPageUrl? true : false" @click="getPosts(prevPageUrl)">precedente</button>
            <button class="btn" :disabled="!nextPageUrl? true : false" @click="getPosts(nextPageUrl)">successiva</button>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
import Card from './Card.vue';

export default {
    name: 'Main',
    data() {
        return {
            posts: [],
            prevPageUrl: null,
            nextPageUrl: null,
        }
    },
    components: {
        Card,
    },
    created() {
        this.getPosts('http://127.0.0.1:8000/api/posts');
        
    }, 
    methods: {
        getPosts(url) {
            if(url){
                Axios.get(url)
                    .then((result) => {
                        this.posts = result.data.result.data;

                        if(result.data.result.prev_page_url) {
                            this.prevPageUrl = result.data.result.prev_page_url;
                        } else {
                            this.prevPageUrl = null;
                        }
                
                        if(result.data.result.next_page_url) {
                            this.nextPageUrl = result.data.result.next_page_url;
                        } else {
                            this.nextPageUrl = null;
                        }
                    }).catch((error) => {console.log(error)});
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>