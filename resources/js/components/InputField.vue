<template>
    <div class="relative pt-4">
        <label :for="name" class="uppercase text-blue-500 pt-2 text-xs font-bold absolute">{{ label }}</label>
        <input type="text" :id="name" class="pt-8 text-gray-600 w-full border-b pb-2 focus:outline-none focus:border-blue-400" :placeholder="placeholder" v-model="value" @input="updateField()">
    </div>
</template>

<script>
    export default {
        name: "InputField",

        props: [
            'name', 'label', 'placeholder'
        ],

        data: function() {
            return {
                value: ''
            }
        },

        methods: {
            updateField: function() {
                this.$emit('update:field', this.value)
            }
        }
    }
</script>

<style scoped>

</style>
