<script>
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import {Link, useForm} from '@inertiajs/vue3'
import FooterLayout from "@/Layouts/FooterLayout.vue";
export default {
    components: {FooterLayout, HeaderLayout, Link},
    // props: [
    //     'errors',
    //     'customer',
    // ],
    // data(){
    //     return{
    //         name: this.customer.name,
    //         surname: this.customer.surname,
    //         patronymic: this.customer.patronymic,
    //         phone_number: this.customer.phone_number,
    //         city: this.customer.city,
    //         street: this.customer.street,
    //         house: this.customer.street,
    //         apartment: this.customer.house,
    //         post_index: this.customer.apartment,
    //     }
    // },
    // name: "Index",
    // methods: {
    //     update(){
    //         this.$inertia.patch(`/profile/customer`,{
    //             name: this.name,
    //             surname: this.surname,
    //             patronymic: this.patronymic,
    //             phone_number: this.phone_number,
    //             city: this.city,
    //             street: this.street,
    //             house: this.house,
    //             apartment: this.apartment,
    //             post_index: this.post_index,
    //         })
    //     }
    // },
    props:{
        customer: Object,
    },
    setup(props){
        const form = useForm({
            name: props.customer.name,
            surname: props.customer.surname,
            patronymic: props.customer.patronymic,
            phone_number: props.customer.phone_number,
            city: props.customer.city,
            street: props.customer.street,
            house: props.customer.street,
            apartment: props.customer.house,
            post_index: props.customer.apartment,
        });

        function update(){
            form.patch(route('customer.update', props.customer.id))
        }

        return{form, update};
    }
}
</script>

<template>
    <HeaderLayout>
        <div class="container mx-auto mt-5">
            <div class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                Ваши реквизиты
            </div>
            <div class="flex justify-center container">
                <form @submit.prevent="update" class="mt-10">
                    <div class="">
                        <input class="rounded-md text-4xl" v-model="form.name" type="text" placeholder="Имя">
                        <div v-if="form.errors.name" class="text-red-600 text-sm">
                            {{ form.errors.name }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.surname" type="text" placeholder="Фамилия">
                        <div v-if="form.errors.surname" class="text-red-600 text-sm">
                            {{ form.errors.surname }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.patronymic" type="text" placeholder="Отчество">
                        <div v-if="form.errors.patronymic" class="text-red-600 text-sm">
                            {{ form.errors.patronymic }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.phone_number" type="text" placeholder="Номер телефона">
                        <div v-if="form.errors.phone_number" class="text-red-600 text-sm">
                            {{ form.errors.phone_number }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.city" type="text" placeholder="Город">
                        <div v-if="form.errors.city" class="text-red-600 text-sm">
                            {{ form.errors.city }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.street" type="text" placeholder="Улица">
                        <div v-if="form.errors.street" class="text-red-600 text-sm">
                            {{ form.errors.street }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.house" type="text" placeholder="Дом">
                        <div v-if="form.errors.house" class="text-red-600 text-sm">
                            {{ form.errors.house }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.apartment" type="text" placeholder="Квартира">
                        <div v-if="form.errors.apartment" class="text-red-600 text-sm">
                            {{ form.errors.apartment }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="rounded-md text-4xl" v-model="form.post_index" type="text" placeholder="Почтовый индекс">
                        <div v-if="form.errors.post_index" class="text-red-600 text-sm">
                            {{ form.errors.post_index }}
                        </div>
                    </div>
                    <div>
                        <button class="mt-5 mb-10 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full" type="submit">Обновить</button>
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
