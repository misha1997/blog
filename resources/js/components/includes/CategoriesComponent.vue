<template>
    <div class="card my-4">
        <h5 class="card-header">Категорії</h5>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <li v-for="category in categories" :key="category.category_id">
                        <a :href="category.url">{{ category.name }}</a>
                        <!-- <router-link :to="{ name: 'category', params: { name: category.url } }">{{ category.name }}</router-link> -->
                    </li>
                </ul>
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
        }
    },
    created() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/categories')
            .then((response) => {
                this.categories = response.data;
            })
        },
    }
}
</script>
