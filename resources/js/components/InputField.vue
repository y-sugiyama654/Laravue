<template>
    <div class="relative pt-4">
        <label :for="name" class="uppercase text-blue-500 pt-2 text-xs font-bold absolute">{{ label }}</label>
        <input type="text" :id="name" class="pt-8 text-gray-600 w-full border-b pb-2 focus:outline-none focus:border-blue-400" :class="errorClassObject()" :placeholder="placeholder" v-model="value" @input="updateField()">
        <p class="text-red-600 text-sm" v-text="errorMessage()"></p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: [
            'name', 'label', 'placeholder', 'errors', 'data'
        ],
        data: function() {
            return {
                value: ''
            }
        },
        computed: {
            hasError: function() {
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0;
            }
        },
        methods: {
            updateField: function() {
                // エラーメッセージを非表示にする
                this.clearErrors(this.name);
                this.$emit('update:field', this.value)
            },
            errorMessage: function() {
                // エラ〜メッセージを返す
                if (this.hasError) {
                    return this.errors[this.name][0];
                }
            },
            clearErrors: function() {
                // エラーメッセージをクリア
                if (this.hasError) {
                    this.errors[this.name] = null;
                }
            },
            errorClassObject: function() {
                // errorが含まれる時に.error-fieldを付与
                return {
                    'error-field': this.hasError
                }
            }
        },
        watch: {
            data: function (val) {
                this.value = val;
            }
        }
    }
</script>

<style scoped>
    .error-field {
        @apply .border-red-500 .border-b-2
    }
</style>
