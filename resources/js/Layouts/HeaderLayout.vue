<script setup>
import { ref } from 'vue';
import {Link, router} from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    auth: {
        type: Boolean,
    },
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-body-grey">
            <!-- HEADER PART START -->
            <div class="flex container mx-auto ">
                <div class="flex w-full max-h-[150px] justify-between ">
                    <!-- LOGO -->
                    <div class="w-3/12">
                        <Link :href="route('welcome')">
                            <img class="max-h-full self-center" src="/img/logo.png">
                        </Link>
                    </div>
                    <div class="w-6/12 self-center">
                        <nav class="flex space-x-16 text-xl">

                            <Link class="relative font-bold after:block after:content after:bg-pr-green after:h-1 after:w-0 after:left-1/2 after:absolute after:transition-{width} after:duration-300 after:webkit-translate-x-[-50%] after:moz-translate-x-[-50%] after:translate-x-[-50%] hover:after:w-full"
                                  :href="route('welcome')">Главная</Link>

                            <Link class="relative font-bold after:block after:content after:bg-pr-green after:h-1 after:w-0 after:left-1/2 after:absolute after:transition-{width} after:duration-300 after:webkit-translate-x-[-50%] after:moz-translate-x-[-50%] after:translate-x-[-50%] hover:after:w-full"
                                  :href="route('about')">О нас</Link>

                            <Link class="relative font-bold after:block after:content after:bg-pr-green after:h-1 after:w-0 after:left-1/2 after:absolute after:transition-{width} after:duration-300 after:webkit-translate-x-[-50%] after:moz-translate-x-[-50%] after:translate-x-[-50%] hover:after:w-full"
                                    :href="route('qa')">
                                Вопросы и ответы</Link>

                            <Link class="relative font-bold after:block after:content after:bg-pr-green after:h-1 after:w-0 after:left-1/2 after:absolute after:transition-{width} after:duration-300 after:webkit-translate-x-[-50%] after:moz-translate-x-[-50%] after:translate-x-[-50%] hover:after:w-full text-pr-green"
                                  v-if="$page.props.auth.user" :href="route('orders.index')">Мои заказы</Link>
                        </nav>
                    </div>
                    <div class="w-3/12 self-center flex justify-end space-x-3" >
                        <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                            <Link v-if="$page.props.auth.user" :href="route('profile.edit')">Профиль</Link>
                            <Link v-else :href="route('login')">Войти</Link>
                        </button>
                        <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                            <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button">Выход</Link>
                            <Link v-else :href="route('register')">Регистрация</Link>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
