<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        <a class="btn btn-success float-right mb-2" href="articles/create"><i class="fas fa-plus"></i> Create new articles</a>
                        <table v-if="articles.data.length" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">#</td>
                                    <td class="text-center">Title</td>
                                    <td class="text-center">Go</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(article, index) in articles.data">
                                    <td class="text-center">{{ index+1 }}</td>
                                    <td>{{ article.attributes.title }}</td>
                                    <td class="text-center"><a v-bind:href="article.links.self"><i class="fas fa-search"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <p v-else>No article available</p>
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
                articles: null
            }
        },
        mounted() {
            axios
                .get('/api/articles')
                .then(response => (this.articles = response.data))
        }
    }
</script>
