<template>
    <div class="row mb-2">
        <div class="col-md-6" v-for="post in posts" :key="post.id">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{ post.category?.name }}</strong>
                    <h3 class="mb-0">{{ post.title }}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">{{ post.content }}</p>
                    <a href="#" class="stretched-link">Continua a leggere</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="bd-placeholder-img" width="200" src="https://www.ionos.it/digitalguide/fileadmin/DigitalGuide/Teaser/internet-programmiersprachen-t.jpg" :alt="post.title">
                </div>
                <div class="mb-2">
                    <span class="badge bg-warning text-dark" v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</span>
                </div>
            </div>
        </div>
        <!-- start pagination -->
        <component-pagination :currentPage="currentPage" :lastPage="lastPage" @numPage="getPosts"></component-pagination>
        <!-- end pagination -->
    </div>
</template>

<script>
export default {
    name: 'Index',
    props: {
        url: String
    },
    data() {
        return {
            posts: undefined,
            currentPage: 1,
            lastPage: undefined
        }
    },
    mounted(){
        this.getPosts();
    },
    methods: {
        async getPosts(page = this.currentPage){
            try{
                let response = await axios.get(this.url, { params: { page } });
                //console.log(response.data.results);
                this.currentPage = page;
                this.lastPage = response.data.results.last_page;
                this.posts = response.data.results.data;
            } catch(err){
                console.log(err);
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>