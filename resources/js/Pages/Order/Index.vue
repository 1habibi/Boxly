<script>
import { Head, Link } from '@inertiajs/vue3';
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import Modal from "@/Components/Modal.vue";
import FooterLayout from "@/Layouts/FooterLayout.vue";

export default {
    components: {FooterLayout, Modal, HeaderLayout, Head, Link},
    props: [
        'orders',
        'ordersRes',
        'loyality'
    ],
    data(){
        return{
            isModalVisible: false,
        }
    },
}
</script>

<template>
    <Head title="Заказы" />
    <HeaderLayout>
        <div class="container mx-auto mt-5">
            <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                Ваши заказы
                <div class="mt-4 text-black text-2xl" v-if="loyality === null">
                    <p>Вы еще не учавствуете в программе лояльности</p>
                    <p>Нажмите кнопку ниже для участия!!!</p>
                    <button class="mt-3 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                        <Link method="post" :href="route('loyality.store')">Присоедениться</Link>
                    </button>
                </div>
            </div>
            <div v-if="orders.length === 0" class="flex justify-center flex-col items-center">
                <img class="max-w-xl self-center" src="/img/Orders/not-found.svg">
                <div class="font-bold text-pr-green text-3xl mb-5">
                    <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                        <Link :href="route('orders.create')">Сделать заказ</Link>
                    </button>
                </div>
                <div class="font-bold text-pr-green text-4xl">
                    <p class="text-center"> Вы еще не сделали ни одного заказа. </p>
                    <p class="text-center mt-2"> Пора это исправить! </p>
                </div>
            </div>
            <div v-else class="flex justify-center items-center flex-col">
                <div v-for="(order, index) in orders" :key="index"
                     class="justify-between block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] mt-3 w-3/4 flex">
                    <div>
                        <h5
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            Заказ № {{ order.id }}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            {{ ordersRes[index].created_at }}
                        </p>
                        <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                            <Link :href="route('orders.show', order.id)">Подробнее</Link>
                        </button>
                    </div>
                    <div class="self-end">
                        <div class="self-end text-2xl" v-if="order.order_status.id === 1 ">
                            <p class="font-bold text-blue-500">Статус:  {{ order.order_status.discription }} </p>
                        </div>
                        <div class="self-end text-2xl" v-if="order.order_status.id === 2 ">
                            <p class="font-bold text-pr-purple">Статус:  {{ order.order_status.discription }} </p>
                        </div>
                        <div class="self-end text-2xl" v-if="order.order_status.id=== 3 ">
                            <p class="font-bold text-orange-500">Статус:  {{ order.order_status.discription }} </p>
                        </div>
                        <div class="self-end text-2xl" v-if="order.order_status.id === 4 ">
                            <p class="font-bold text-yellow-600">Статус:  {{ order.order_status.discription }} </p>
                        </div>
                        <div class="self-end text-2xl" v-if="order.order_status.id === 5 ">
                            <p class="font-bold text-pr-green">Статус:  {{ order.order_status.discription }} </p>
                        </div>
                        <p class="text-end text-sm text-neutral-400">
                            {{ ordersRes[index].updated_at }}
                        </p>
                    </div>
                </div>
                <div class="font-bold text-pr-green text-3xl mb-5">
                    <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full mt-10">
                        <Link :href="route('orders.create')">Сделать заказ</Link>
                    </button>
                </div>
            </div>
        </div>
    </HeaderLayout>
    <FooterLayout>

    </FooterLayout>
</template>
