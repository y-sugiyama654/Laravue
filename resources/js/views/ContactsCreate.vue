<template>
    <div>
        <form action="">
            <div class="relative">
                <label for="name" class="uppercase text-blue-500 pt-2 text-xs font-bold absolute">Contact Name</label>
                <input type="text" id="name" class="pt-8 text-gray-600 w-full border-b pb-2 focus:outline-none focus:border-blue-400" placeholder="Contact Name">
            </div>
            
            <div class="flex justify-end py-2">
                <button class="border py-2 px-4 rounded text-red-700 mr-4 hover:bg-gray-200">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Add New Contact</button>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        name: "ContactsCreate"
    }
</script>

<style scoped>

</style>
