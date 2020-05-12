<template>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <p>Topic: </p>
                <div class="card">
                    <div class="card-header"><h2>{{ articles.data.attributes.title }}</h2></div>
                    <div class="card-body">
                        <p>{{ articles.data.attributes.detail }}</p>
                        <p>Post by: <a >{{ articles.data.relationships.author.data.type }}</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <p>Comments: </p>
            </div>
        </div>

        <div class="row justify-content-center" v-for="(item, index) in articles.data.relationships.comments.data">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h2>{{ index+1 }}</h2></div>
                    <div class="card-body">
                        <p>{{ item.type }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                articles: null,
                api: window.location.href.split("/").pop()
            }
        },
        mounted() {
            console.log(this.api)
            axios
                .get('/api/articles/'+this.api)
                .then(response => (this.articles = response.data))
        }
    }
</script>
