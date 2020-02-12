<template>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Додати статтю</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">

                                <form role="form" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Категорія</label>
                                        <select v-model="category_id" class="form-control">
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
                                        <input v-model="title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Текст</label>
                                        <textarea v-model="text" class="form-control" rows="3"></textarea>
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
                                        <img v-if="image" style="margin-top: 20px" class="prewiewImg" :src="image">
                                    </div>

                                    <div>
                                        <label>Теги</label><br>
                                        <div v-for="(tag, index) in tags" :key="tag.tag_id" class="badge tag">
                                            <a :href="tag.url" target="_blank">#{{ tag.name }}</a>
                                            <span @click="delTag(tag.tag_id, index)" class="delete-tag">X</span>
                                        </div>
                                        <span @click="isAddTag = !isAddTag" class="badge add-tag">Додати тег +</span>
                                        <div v-if="isAddTag" class="form-group">
                                            <br>
                                            <input v-model="tag" style="width: 200px;float:left;margin-right:5px" class="form-control">
                                            <button type="button" @click="addTag" class="btn btn-default">+</button>
                                            <div v-show="tag != ''">
                                                <div class="tag-item" v-for="(tag, index) in filteredTag" :key="index" @click="setTag(tag)">{{ tag.name }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

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
                image: '',
                categories: [],
                category_id: 1,
                title: '',
                text: '',
                isAddTag: true,
                tag: '',
                tags: [],
                allTags: []
            }
        },
        created() {
            this.getCategories();
            this.getTags();
        },
        computed: {
            filteredTag() {
                return this.allTags.filter(tag => {
                    return tag.name.toLowerCase().includes(this.tag.toLowerCase())
                })
            },
        },
        methods: {
			previewFiles(event) {
				var input = event.target;
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = (e) => {
						this.image = e.target.result;
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
            getTags() {
                axios.get('/api/tags')
                .then((response) => {
                    this.allTags = response.data;
                })
            },
            save() {
                var form = new FormData;
                form.append('category_id', this.category_id);
                form.append('title', this.title);
                form.append('text', this.text);
                form.append('img', this.$refs.image.files[0]);
                form.append('tags', JSON.stringify(this.tags));
                axios.post('/api/article', form)
                    .then((response) => {
                        console.log(response.data)
                    })
            },
            addTag(index) {
                axios.post('/api/tags', {
                    name: this.tag
                })
                .then((response) => {
                    this.tags.push(response.data);
                    this.tag = '';
                })
            },
            delTag(id, index) {
                axios.delete('/api/tags/'+id).then(() => {
                    this.tags.splice(index, 1);
                })
            },
            setTag(tag) {
                if(this.tags.indexOf(tag) == -1) {
                    this.tags.push(tag);
                }
            }
        }
    }
</script>
<style lang="css" scoped>
    .prewiewImg {
        width: 300px;
    }
    .prewiewImg img {
        width: 100%;
    }
    .tag {
        display: inline;
        padding: 5px 10px;
        margin-right: 5px;
    }
    .tag a {
        color:#fff;
        text-decoration: none;
    }
    .add-tag {
        background: blue; 
        padding: 5px 10px;
        cursor: pointer;
    }
    .delete-tag {
        margin-left: 5px;
        cursor: pointer;
    }
    .tag-item {
        border: 1px solid silver;
        padding: 10px;
        width: 200px;
        margin-top: 5px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
