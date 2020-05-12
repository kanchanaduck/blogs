<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        <p>Give your question...</p>
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Topic</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Detail</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option v-for="p in people">{{ p.}}</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Send</button>
                        </form>
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
                people: null
            }
        },
        mounted() {
            axios
                .get('/api/authors')
                .then(response => (this.people = response.data))
        }
    }
</script>
