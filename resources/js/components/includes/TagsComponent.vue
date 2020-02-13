<template>
    <div>
        <div class="card my-4">
            <h5 class="card-header">Теги</h5>
            <div class="card-body">
                <span v-for="(tag, index) in tags" :key="index"><a :href="'/tag/'+tag.url">#{{ tag.name }}</a>&nbsp</span>
            </div>
        </div>

        <div class="card my-4">
            <h5 class="card-header">Соціальні мережі</h5>
            <div class="card-body">
                <a class="social" :href="social.url" target="_blank" v-for="(social, index) in socials" :key="index"><img :src="social.logo" :title="social.name"></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tags: [],
            socials: []
        }
    },
    created() {
        this.getTags();
        this.getSocial();
    },
    methods: {
        getTags() {
            axios.get('/api/tags')
            .then((response) => {
                this.tags = response.data;
            })
        },
        getSocial() {
            axios.get('/api/socials')
            .then((response) => {
                this.socials = response.data;
            })
        },
    }
}
</script>

<style lang="css">
    .social {
        margin-right: 15px;
    }
    .social img {
        width: 30px;
    }
</style>
