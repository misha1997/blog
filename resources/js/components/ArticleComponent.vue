<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <div class="card mb-4">
                        <img class="card-img-top" :src="article.img">
                        <div class="card-body">
                            <h2 class="card-title">{{ article.title }}</h2>
                            <p class="card-text">{{ article.text }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Опубліковано {{ article.created_at }} | Категорія <a :href="article.category.url">{{ article.category.name }}</a>
                        </div>
                    </div>
                </div>

            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                <h5 class="card-header">Пошук</h5>
                <div class="card-body">
                    <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Пошук</button>
                    </span>
                    </div>
                </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                <h5 class="card-header">Категорії</h5>
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li v-for="category in categories" :key="category.category_id">
                                <a :href="category.url">{{ category.name }}</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
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
    export default {
        data() {
            return {
                article: {},
                categories: [],
            }
        },
        created() {
            this.getArticles();
            this.getCategories();
        },
        methods: {
            getArticles() {
                axios.get('/api/article/'+this.$route.params.id)
                .then((response) => {
                    this.article = response.data;
                })
            },
            getCategories() {
                axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                })
            },
        }
    }
</script>
