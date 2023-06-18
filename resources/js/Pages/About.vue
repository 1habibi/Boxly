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
    <Head title="Welcome"/>
    <div class="bg-body-grey">
        <HeaderLayout :can-login="canLogin" :can-register="canRegister">
            <!-- BODY PART START -->
            <div class="container mx-auto mt-5">
                <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                    Кто мы? 0_о
                </div>
                <div class="flex items-center">
                    <div class="w-6/12 text-3xl text-center">
                        Мы являемся новым игроком на рынке доставки товаров из интернет-магазинов, но за короткое время смогли завоевать доверие и уважение наших клиентов благодаря высокому качеству услуг и индивидуальному подходу к каждому заказчику.
                    </div>
                    <div class="w-6/12">
                        <img src="img/About/about1.svg">
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-6/12">
                        <img src="img/About/about2.svg">
                    </div>
                    <div class="w-6/12 text-3xl text-center ">
                        Миссия нашей компании заключается в том, чтобы обеспечить максимальный комфорт и удобство для наших клиентов при покупке товаров в интернете. Мы знаем, как важно получить свою покупку вовремя и в целости и сохранности, поэтому мы делаем все возможное, чтобы доставка была быстрой, надежной и безопасной.
                    </div>
                </div>
                <div class="flex items-center mt-5">
                    <div class="text-3xl text-center ">
                        <div class="mt-3">Мы гордимся тем, что наша команда состоит из профессионалов своего дела, которые любят свою работу и всегда готовы помочь нашим клиентам в любых вопросах.</div>
                        <div class="mt-3">Мы стремимся к постоянному совершенствованию наших услуг и расширению географии доставки, чтобы вы могли получать товары из любой точки мира.</div>
                        <div class="mt-3">Если у вас возникли вопросы или предложения, пожалуйста, свяжитесь с нами по телефону или электронной почте, и мы с радостью поможем вам.</div>
                        <div class="mt-3">Спасибо, что выбрали Boxly! Мы будем рады стать вашим надежным партнером в доставке товаров из интернета.</div>
                    </div>
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
