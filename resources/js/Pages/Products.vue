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
                    <div class="p-4 overflow-scroll">
                        <table class="table-auto border">
                            <thead class="border-b">
                                <tr>
                                    <th class="p-2 border-r">Код</th>
                                    <th class="p-2 border-r">Название</th>
                                    <th class="p-2 border-r">Категории</th>
                                    <th class="p-2 border-r">Цена</th>
                                    <th class="p-2 border-r">Цена СП</th>
                                    <th class="p-2 border-r">Количество</th>
                                    <th class="p-2 border-r">Поля свойств</th>
                                    <th class="p-2 border-r">Совместные покупки</th>
                                    <th class="p-2 border-r">Единица измерения</th>
                                    <th class="p-2 border-r">Картинка</th>
                                    <th class="p-2 border-r">Вывод на главной</th>
                                    <th class="p-2">Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="entity in entities">
                                    <td class="p-2 border-r">{{ entity.code }}</td>
                                    <td class="p-2 border-r">{{ entity.name }}</td>
                                    <td class="p-2 border-r">{{ entity.level1 }} , {{ entity.level2 }} , {{ entity.level3 }}</td>
                                    <td class="p-2 border-r">{{ entity.price }}</td>
                                    <td class="p-2 border-r">{{ entity.price_sp }}</td>
                                    <td class="p-2 border-r">{{ entity.amount }}</td>
                                    <td class="p-2 border-r">{{ entity.properties }}</td>
                                    <td class="p-2 border-r">{{ entity.joint_purchase }}</td>
                                    <td class="p-2 border-r">{{ entity.unit }}</td>
                                    <td class="p-2 border-r">{{ entity.picture }}</td>
                                    <td class="p-2 border-r">{{ entity.short_description }}</td>
                                    <td class="p-2 border-r">{{ entity.description }}</td>
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
