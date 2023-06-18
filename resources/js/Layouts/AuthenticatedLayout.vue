<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <!-- HEADER PART START -->
            <div class="flex container mx-auto ">
                <div class="flex w-full max-h-[150px] justify-between ">
                    <!-- LOGO -->
                    <div class="w-1/3">
                        <img class="max-h-full self-center" src="img/logo.png">
                    </div>
                    <div class="w-1/3 self-center">
                        <nav class="flex space-x-16 text-xl">
                            <Link class="font-bold" :href="route('welcome')">Главная</Link>
                            <Link class="font-bold" :href="route('about')">О нас</Link>
                            <Link class="font-bold">Вопросы и ответы</Link>
                        </nav>
                    </div>
                    <div class="w-1/3 self-center flex justify-end space-x-3" >
                        <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                            <Link :href="route('profile.edit')">{{ $page.props.auth.user.name }}</Link>
                        </button>
                        <button class="bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full">
                            <Link :href="route('logout')" method="post" as="button">Выход</Link>
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
