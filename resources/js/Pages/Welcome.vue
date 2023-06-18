<script>
import {Head, Link} from '@inertiajs/vue3';
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import FooterLayout from "@/Layouts/FooterLayout.vue";

export default {
    components: {FooterLayout, HeaderLayout, Head, Link}
}
</script>

<template class="">
    <Head title="Welcome"/>
    <div class="bg-body-grey h-screen">
        <HeaderLayout >
            <!-- BODY PART START -->
            <div class="flex container mx-auto mt-10">
                <div class="w-6/12 flex items-left flex-col justify-center">
                    <div class="text-7xl font-black">
                        Самая быстрая доставка
                    </div>
                    <div class="mt-10 text-3xl ">
                        В вашем городе
                    </div>
                </div>
                <div class="w-6/12">
                    <img class="max-w-3xl ml-auto" src="img/Welcome/hero-pic.svg" alt="pic">
                </div>
            </div>
            <!-- BODY PART END -->
        </HeaderLayout>
    </div>
</template>

<style>

</style>
