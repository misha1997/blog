<template>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Редагування статті</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">

                                <form role="form" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Категорія</label>
                                        <select v-model="article.category_id" class="form-control">
                                            <option
                                                v-for="category in this.categories"
                                                :key="category.category_id"
                                                :value="category.category_id"
                                            >
                                                {{ category.name }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Заголовок</label>
                                        <input v-model="article.title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Текст</label>
                                        <textarea v-model="article.text" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Фото</label>
                                        <input
                                            type="file"
                                            id="image"
                                            name="image"
                                            ref="image"
                                            @change="previewFiles($event)"
                                            accept=".jpg, .jpeg, .png"
                                        >
                                        <img v-if="article.img" style="margin-top: 20px" class="prewiewImg" :src="article.img">
                                    </div>

                                    <button type="button" @click="save" class="btn btn-default">Зберегти</button>
                                    <button type="reset" class="btn btn-default">Очистити</button>
                                </form>
                            </div>
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
                categories: [],
                article: {},
            }
        },
        created() {
            this.getCategories();
            this.getArticle();
        },
        methods: {
            getCategories() {
                axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                })
            },
            getArticle() {
                axios.get('/api/article/'+this.$route.params.id)
                .then((response) => {
                    console.log(response.data)
                    this.article = response.data;
                })
            },
            previewFiles(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.article.img = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            },
            save() {
                var form = new FormData;
                form.append('category_id', this.article.category_id);
                form.append('title', this.article.title);
                form.append('text', this.article.text);
                form.append('img', this.$refs.image.files[0]);
                axios.post('/api/article/'+this.$route.params.id, form)
                    .then((response) => {
                        console.log(response.data)
                    })
            }
        },
    }
</script>
<style lang="css" scoped>
    .prewiewImg {
        width: 300px;
    }
    .prewiewImg img {
        width: 100%;
    }
</style>
