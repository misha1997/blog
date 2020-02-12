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
                            <div class="form-group">
                                <p class="form-control-static">
                                    <span v-for="(tag, index) in tags" :key="index"><a :href="'/tag/'+tag.tag.url">#{{ tag.tag.name }}</a>&nbsp</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Опубліковано {{ article.created_at }} | Категорія <router-link :to="{ name: 'category', params: { name: article.category.url } }">{{ article.category.name }}</router-link>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">Коментарі</h2>
                            <hr>
                            <div class="form-group">
                                <label>Ваше ім'я</label>
                                <input type="text" v-model="comment.user_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ваш Email</label>
                                <input type="email" v-model="comment.user_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Коментар</label>
                                <textarea v-model="comment.text" class="form-control" rows="3"></textarea>
                            </div>
                            <button :disabled="comment.user_name == '' || comment.user_email == '' || comment.text == ''" type="button" @click="postComment" class="btn btn-primary">Додати коментар</button>
                            <hr>
                            <div class="card mt-4" v-for="comment in article.comments" :key="comment.comment_id">
                                <div class="card-header text-muted">
                                    <b>{{ comment.user_name }}</b> ({{ comment.user_email }}) додано {{ comment.created_at }}
                                </div>
                                <div class="card-body">
                                    {{ comment.text }}
                                </div>
                            </div>
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
                article: {
                    title: '',
                    text: '',
                    img: '',
                    created_at: '',
                    category: {
                        name: '',
                        url: ''
                    },
                    comments: [],
                },
                comment: {
                    user_name: '',
                    user_email: '',
                    text: '',
                    post_id: this.$route.params.id
                },
                tags: []
            }
        },
        created() {
            this.getArticles();
        },
        methods: {
            getArticles() {
                axios.get('/api/article/'+this.$route.params.id)
                .then((response) => {
                    this.tags = response.data.tags;
                    this.article = response.data.data;
                })
            },
            postComment() {
                axios.post('/api/comments', this.comment)
                .then((response) => {
                    this.article.comments.push(response.data);
                })
            }
        }
    }
</script>
<style lang="css" scoped>

</style>
