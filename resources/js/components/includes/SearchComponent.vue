<template>
    <div class="card my-4">
        <h5 class="card-header">Пошук</h5>
        <div class="card-body">
            <div class="input-group">
                <input v-model="search" type="text" class="form-control" placeholder="Пошук...">
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['articles', 'filteredList'],
    data() {
        return {
            search: ''
        }
    },
    computed: {
        filteredList() {
            return this.$props.articles.filter(article => {
                return article.title.toLowerCase().includes(this.search.toLowerCase())
            })
        },
    },
}
</script>
