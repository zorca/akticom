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
                        <table class="table-auto border">
                            <thead class="border-b">
                                <tr>
                                    <th>Код</th>
                                    <th>Название</th>
                                    <th>Категории</th>
                                    <th>Цена</th>
                                    <th>Цена СП</th>
                                    <th>Количество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="entity in entities">
                                    <td class="p-2 border-r">{{ entity.code }}</td>
                                    <td class="p-2 border-r">{{ entity.name }}</td>
                                    <td class="p-2 border-r">{{ entity.level1 }} , {{ entity.level2 }} , {{ entity.level3 }}</td>
                                    <td class="p-2 border-r">{{ entity.price }}</td>
                                    <td class="p-2 border-r">{{ entity.price_sp }}</td>
                                    <td class="p-2 border-r">{ entity.amount }}</td>
                                    <td class="p-2 border-r">{ entity.amount }}</td>
                                    <td class="p-2 border-r">{ entity.amount }}</td>
                                    <td class="p-2 border-r">{ entity.amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    props: {
        entities: Array,
    },
}
</script>
