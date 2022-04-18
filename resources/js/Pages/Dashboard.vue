<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Импорт товаров в базу данных
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-4">
                        <div v-if="success !== ''" role="alert" class="bg-green-500 text-white p-2 mb-4">
                            {{ success }}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <span class="pr-2">Файл для импорта:</span>
                            <input type="file" class="form-control" v-on:change="onFileChange">
                            <button class="p-3 bg-gray-200">Импортировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

export default {
    data() {
        return {
            file: null,
            success: ''
        };
    },
    methods: {
        onFileChange(e){
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
        },
        async formSubmit(e) {
            e.preventDefault();
            let currentObj = this;
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            let formData = new FormData();
            formData.append('file', this.file);
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/api/import', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                    console.log(error);
                });
        }
    }
}

</script>
