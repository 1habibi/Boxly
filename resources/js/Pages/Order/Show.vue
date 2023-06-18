<script>
import { Head, Link } from '@inertiajs/vue3';
import HeaderLayout from "@/Layouts/HeaderLayout.vue";

export default {
    components: {HeaderLayout, Head, Link},
    props: [
        'order',
    ],
    methods: {
        deleteOrder(id){
            this.$inertia.delete(`/orders/${id}`);
        },
        updateOrder(id){
            this.$inertia.patch(`/orders/${id}`);
        }
    },
}

</script>

<template>
    <Head title="Новый заказ" />
    <HeaderLayout>
        <div class="container mx-auto mt-5">
            <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-9 border-dashed border-b border-gray-400">
                Заказ № {{ order.id }}
                <div class="mt-5 w-5/6 mx-auto text-center w-full text-3xl font-bold text-pr-green">
                    Статус: {{ order.order_status.discription }}
                </div>
            </div>
            <div class="flex items-center flex-col container mx-auto mt-5">
                <div v-for="(detail, index) in order.order_details" :key="index">
                    <div
                        class="min-w-[500px] mb-5 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:max-w-xl md:flex-row justify-center items-center pl-6 pr-6">
                        <div class="p-5">
                            <p>{{ index + 1 }} товар</p>
                        </div>
                        <div class="flex flex-col justify-start p-6">
                            <h5
                                class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                                Ссылка на товар: {{ detail.url }}
                            </h5>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                Количество: {{ detail.count }}
                            </p>
                            <p class="text-xs text-neutral-500 dark:text-neutral-300">
                                Примечание: {{ detail.note }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center flex-col container mx-auto mt-5"  v-if="order.order_status.id === 2">
                <div class="mb-3 text-3xl"> Заказ ожидает вашего подтверждения!</div>
                <div class="mb-3 text-2xl"> Итоговая сумма заказа: <span class="font-bold">{{ order.order_price }}руб.</span></div>
                <div class="mb-3 text-2xl"> Вы согласны? </div>
                <div class="mb-3">
                    <button class="mr-3 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                        <Link @click="updateOrder(order.id)">Да, перейти к оплате</Link>
                    </button>
                    <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                        <Link @click="deleteOrder(order.id)">Нет, удалить заказ</Link>
                    </button>
                </div>
            </div>
        </div>
    </HeaderLayout>
</template>
