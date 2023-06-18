<script setup>
import {Head, Link} from '@inertiajs/vue3';
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import FooterLayout from "@/Layouts/FooterLayout.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template class="bg-body-grey">
    <Head title="Вопросы и ответы"/>
    <div class="bg-body-grey">
        <HeaderLayout :can-login="canLogin" :can-register="canRegister">
            <!-- BODY PART START -->
            <div class="container mx-auto mt-5">
                <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                    Ответы на ваши вопросы
                </div>
                    <div class="mx-auto my-20 w-11/12 drop-shadow rounded-md">
                        <div class="flex items-center">
                            <div class="w-6/12">
                                <!-- The First FAQ -->
                                <details class="bg-pr-green open:bg-pr-purple duration-300 w-full">
                                    <summary class="bg-inherit px-5 py-3 text-5xl text-white font-bold cursor-pointer">Как работает Boxly?</summary>
                                    <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                        <p>Boxly - это сервис по доставке товаров из интернет-магазинов. Вы выбираете товары на сайте продавца, оформляете заказ и указываете адрес доставки в Boxly. Мы получаем ваш заказ и доставляем его в указанный адрес курьером, почтой, или самовывозом</p>
                                    </div>
                                </details>

                                <!-- The Second FAQ -->
                                <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                                    <summary class="bg-inherit px-5 py-3 text-5xl text-white font-bold cursor-pointer">Сколько времени занимает доставка?</summary>
                                    <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                        <p>Скорость доставки зависит от места, откуда и куда отправляется товар. Обычно доставка занимает от 7 до 31 рабочих дней.</p>
                                    </div>
                                </details>

                                <!-- The Third FAQ -->
                                <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                                    <summary class="bg-inherit px-5 py-3 text-5xl text-white font-bold cursor-pointer">Какие товары можно заказать через Boxly?</summary>
                                    <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                        <p>Вы можете заказать любой товар, который продается в интернет-магазинах. Однако, существуют ограничения на заказ определенных видов товаров, таких как оружие, наркотики, алкоголь и т.д. Подробнее ограничения можно узнать у нашей службы поддержки.</p>
                                    </div>
                                </details>

                                <!-- The Fourth FAQ -->
                                <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                                    <summary class="bg-inherit px-5 py-3 text-5xl text-white font-bold cursor-pointer">Какие услуги предоставляет Boxly?</summary>
                                    <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                        <p>Мы предоставляем услуги по приему, хранению, обработке и доставке заказов. Кроме того, мы также предоставляем услуги по упаковке товаров и оформлению документов для доставки в другие страны.</p>
                                    </div>
                                </details>
                            </div>
                            <div class="w-6/12">
                                <img src="img/QA/hero.svg">
                            </div>

                        </div>

                        <!-- The Fifth FAQ -->
                        <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                            <summary class="bg-inherit px-5 py-3 text-3xl text-white font-bold cursor-pointer">Сколько стоит доставка?</summary>
                            <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                <p>Стоимость доставки зависит от многих факторов, таких как вес и размер товара, место отправки и назначения. Узнать стоимость доставки вашего заказа вы сможете после оформления заявки</p>
                            </div>
                        </details>

                        <!-- The Sixth FAQ -->
                        <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                            <summary class="bg-inherit px-5 py-3 text-3xl text-white font-bold cursor-pointer">Как можно оплатить услуги Boxly?</summary>
                            <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                <p>Мы принимаем оплату банковскими картами, электронными платежными системами, а также наличными в городе ... .</p>
                            </div>
                        </details>

                        <!-- The Sixth FAQ -->
                        <details class="bg-pr-green open:bg-pr-purple duration-300 w-full mt-5">
                            <summary class="bg-inherit px-5 py-3 text-3xl text-white font-bold cursor-pointer">Как связаться с Boxly?</summary>
                            <div class="bg-white px-5 py-3 border border-gray-300 text-xl font-light">
                                <p>Мы всегда готовы ответить на ваши вопросы и помочь вам сделать заказ. Вы можете связаться с нами через чат с менеджером на нашем сайте, по электронной почте или по телефону.</p>
                            </div>
                        </details>
                    </div>
                </div>
            <!-- BODY PART END -->
        </HeaderLayout>
        <FooterLayout>

        </FooterLayout>
    </div>
</template>

<style>

</style>
