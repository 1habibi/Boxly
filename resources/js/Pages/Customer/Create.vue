<script>
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import {Link} from '@inertiajs/vue3'
import FooterLayout from "@/Layouts/FooterLayout.vue";

export default {
    components: {FooterLayout, HeaderLayout, Link},
    data(){
        return{
            name: '',
            surname: '',
            patronymic: '',
            phone_number: '',
            city: '',
            house: '',
            apartment: '',
            post_index: '',
        }
    },
    name: "Index",
    methods: {
        store(){
            this.$inertia.post('/profile/customer',{
                name: this.name,
                surname: this.surname,
                patronymic: this.patronymic,
                phone_number: this.phone_number,
                city: this.city,
                street: this.street,
                house: this.house,
                apartment: this.apartment,
                post_index: this.post_index,
            })
        }
    },
    props: [
        'errors'
    ]
}
</script>

<template>
    <HeaderLayout>
        <div class="container mx-auto mt-5">
            <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                Ваши реквизиты
            </div>
            <div class="flex justify-center container">
                <form @submit.prevent="store" class="mt-10">
                    <div class="">
                        <input class="rounded-md text-4xl" v-model="name" type="text" placeholder="Имя">
                        <div v-if="errors.name" class="text-red-600 text-sm">
                            {{ errors.name }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="surname" type="text" placeholder="Фамилия">
                        <div v-if="errors.surname" class="text-red-600 text-sm">
                            {{ errors.surname }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="patronymic" type="text" placeholder="Отчество">
                        <div v-if="errors.patronymic" class="text-red-600 text-sm">
                            {{ errors.patronymic }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="phone_number" type="text" placeholder="Номер телефона">
                        <div v-if="errors.phone_number" class="text-red-600 text-sm">
                            {{ errors.phone_number }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="city" type="text" placeholder="Город">
                        <div v-if="errors.city" class="text-red-600 text-sm">
                            {{ errors.city }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="street" type="text" placeholder="Улица">
                        <div v-if="errors.street" class="text-red-600 text-sm">
                            {{ errors.street }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="house" type="text" placeholder="Дом">
                        <div v-if="errors.house" class="text-red-600 text-sm">
                            {{ errors.house }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="apartment" type="text" placeholder="Квартира">
                        <div v-if="errors.apartment" class="text-red-600 text-sm">
                            {{ errors.apartment }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="post_index" type="text" placeholder="Почтовый индекс">
                        <div v-if="errors.post_index" class="text-red-600 text-sm">
                            {{ errors.post_index }}
                        </div>
                    </div>
                    <div>
                        <button class="mt-5 mb-10 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </HeaderLayout>
    <FooterLayout class="mt-0">

    </FooterLayout>
</template>

<style>

</style>
