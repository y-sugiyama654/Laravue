<template>
    <div></div>
</template>

<script>
    export default {
        name: "ContactsShow.vue",

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response => {
                    this.contact = response.data.data;
                })
                .catch(error => {

                });
        },

        data: function () {
            return {
                contact: null,
            }
        }
    }
</script>

<style scoped>

</style>
