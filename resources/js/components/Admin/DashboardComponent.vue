<template>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Категорії</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart2">
                                <div class="row" style="margin-bottom: 10px;" v-for="(category, index) in categories" :key="'category'+index">
                                    <div class="col-lg-9" style="padding-right: 0">
                                        <input
                                            type="text"
                                            name="category"
                                            v-model="category.name"
                                            class="form-control"
                                            :disabled="category.disabled == '' ? category.disabled : true"
                                        >
                                    </div>
                                    <div class="col-lg-3" style="text-align: right;">
                                        <button
                                            v-if="category !== editing && category.disabled != false"
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            @click='editCategory(index, category)'
                                        >
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>

                                        <button
                                            v-else
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            @click='saveCategory(index, category.category_id)'
                                        >
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        </button>

                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            style="margin-left: 5px"
                                            @click="delCategory(index, category.category_id)"
                                        >
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-block mt-2" @click="addCategory()">Додати</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Соціальні мережі</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart2">
                                <div class="row" style="margin-bottom: 10px;" v-for="(social, index) in socials" :key="'social'+index">
                                    <div class="col-lg-4" style="padding-right: 0">
                                        <input
                                            type="text"
                                            name="social"
                                            v-model="social.name"
                                            class="form-control"
                                            placeholder="Назва"
                                            :disabled="social.disabled == '' ? social.disabled : true"
                                        >
                                    </div>
                                    <div class="col-lg-4" style="padding-right: 0">
                                        <input
                                            type="text"
                                            name="social"
                                            v-model="social.url"
                                            class="form-control"
                                            placeholder="Посилання"
                                            :disabled="social.disabled == '' ? social.disabled : true"
                                        >
                                    </div>
                                    <div class="col-lg-1" style="padding-right: 0">
                                    <label class="input-file">
                                        <img :src="social.logo == '' ? '/img/default.jpg' : social.logo " :id="'logo_'+index">
                                        <input :disabled="social.disabled == '' ? social.disabled : true" style="display:none" type="file" class="custom-file-input" @change="preventLogo($event, index)" :name="'logo_'+index" :ref="'logo_'+index" accept="image/*">
                                    </label>
                                    </div>
                                    <div class="col-lg-3" style="text-align: right;">
                                        <button
                                            v-if="social !== editing && social.disabled != false"
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            @click='editSocial(index, social)'
                                        >
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>

                                        <button
                                            v-else
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            @click='saveSocial(index, social.social_id)'
                                        >
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        </button>

                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            style="margin-left: 5px"
                                            @click="delSocial(index, social.social_id)"
                                        >
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-block mt-2" @click="addSocial()">Додати</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Список статтей</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Заголовок</th>
                                        <th scope="col">Дата творення</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(article, index) in articles" :key="article.post_id">
                                        <th style="width:25px; padding:15px 5px" scope="row">{{ index+1 }}</th>
                                        <td style="padding:15px 0">{{ article.title }}</td>
                                        <td style="width:200px; padding:15px 0">{{ article.created_at }}</td>
                                        <td style="width:50px"><button type="button" @click="editArticle(article.post_id)" class="btn btn-default">Редагувати</button></td>
                                        <td style="color:red;width:50px"><button type="button" @click="delArticle(index, article.post_id)" class="btn btn-default">Видалити</button></td>
                                    </tr>
                                </tbody>
                            </table>
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
                editing: {},
                categories: [],
                articles: [],
                socials: []
            }
        },
        created() {
            this.getCategories();
            this.getArticles();
            this.getSocials();
        },
        methods: {
            preventLogo(event, index) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.socials[index].logo = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            },
            getCategories() {
                axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                })
            },
            getArticles() {
                axios.get('/api/articles')
                .then((response) => {
                    this.articles = response.data;
                })
            },
            getSocials() {
                axios.get('/api/socials')
                .then((response) => {
                    this.socials = response.data;
                })
            },
            addCategory() {
                this.categories.push({
                    name: '',
                    disabled: false
                });
            },
            addSocial() {
                this.socials.push({
                    name: '',
                    logo: '',
                    url: '',
                    disabled: false
                });
            },
            editCategory(index, category) {
                this.categories[index].disabled = false;
                this.editing = category;
            },
            editSocial(index, social) {
                this.socials[index].disabled = false;
                this.editing = social;
            },
            saveCategory(index, category_id) {
                if(!category_id) {
                    axios.post('/api/categories', this.categories[index])
                    .then((response) => {
                        this.categories[index].category_id = response.data.category_id;
                    })
                } else {
                    axios.post('/api/categories/'+category_id, this.categories[index])
                    .then((response) => {
                        this.categories[index] = response.data;
                    })
                }
                this.categories[index].disabled = true;
                this.editing = {};
            },
            saveSocial(index, social_id) {
                if(!social_id) {
                    axios.post('/api/social', this.socials[index])
                    .then((response) => {
                        this.socials[index].social_id = response.data.social_id;
                    })
                } else {
                    axios.post('/api/social/'+social_id, this.socials[index])
                    .then((response) => {
                        this.socials[index] = response.data;
                    })
                }
                this.socials[index].disabled = true;
                this.editing = {};
            },
            delCategory(index, category_id) {
                if(category_id) {
                    axios.delete('/api/categories/'+category_id).then(() => {
                        this.categories.splice(index, 1);
                    })
                } else {
                    this.categories.splice(index, 1);
                }
            },
            delSocial(index, social_id) {
                if(social_id) {
                    axios.delete('/api/social/'+social_id).then(() => {
                        this.socials.splice(index, 1);
                    })
                } else {
                    this.socials.splice(index, 1);
                }
            },
            delArticle(index, id) {
                axios.delete('/api/article/'+id).then(() => {
                    this.articles.splice(index, 1);
                })
            },
            editArticle(id) {
                this.$router.push("/admin/article/"+id);
            }
        }
    }
</script>

<style lang="css" scoped>
    .input-file {
        cursor: pointer;
        width: 40px;
        height: 35px;
    }
    .input-file img {
        width: 100%;
    }
</style>
