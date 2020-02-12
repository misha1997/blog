<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <div class="card mb-4" v-for="article in filteredList" :key="article.post_id">
                        <img class="card-img-top" :src="article.img">
                        <div class="card-body">
                            <h2 class="card-title">{{ article.title }}</h2>
                            <p class="card-text">{{ article.text }}</p>
                            <router-link class="btn btn-primary" :to="{ name: 'article', params: {id: article.post_id, category: article.category.url}}">Читати далі &rarr;</router-link>
                        </div>
                        <div class="card-footer text-muted">
                            Опубліковано {{ article.created_at }} | Категорія <router-link :to="{ name: 'category', params: { name: article.category.url } }">{{ article.category.name }}</router-link>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card my-4">
                        <h5 class="card-header">Пошук</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input v-model="search" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <Categories/>

                    <div class="card my-4">
                        <h5 class="card-header">Теги</h5>
                        <div class="card-body">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>

    import Categories from './includes/CategoriesComponent.vue'

    export default {
        components: {
            Categories
        },
        data() {
            return {
                articles: [],
                search: ''
            }
        },
        created() {
            this.getArticles();
        },
        computed: {
            filteredList() {
                return this.articles.filter(article => {
                    return article.title.toLowerCase().includes(this.search.toLowerCase())
                })
            },
        },
        methods: {
            getArticles() {
                axios.get('/api/tag/'+this.$route.params.name)
                .then((response) => {
                    response.data.map(item => {
                        this.articles.push(item.post)
                    })
                    console.log(this.articles)
                })
            }
        }
    }
</script>
