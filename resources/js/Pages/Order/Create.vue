<script>
import HeaderLayout from "@/Layouts/HeaderLayout.vue";
import {Link, useForm} from '@inertiajs/vue3'
import FooterLayout from "@/Layouts/FooterLayout.vue";

export default {
    components: {FooterLayout, HeaderLayout, Link},
    props:{
        loyality: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                discount: false,
                products: []
            }),
        }
    },
    methods: {
        addProduct() {
            this.form.products.push({
                url: '',
                count: '',
                note: '',
            })
        },
        removeProduct(index){
            this.form.products.splice(index, 1);
        },
        submit(){
            this.form.post('/orders');
        }
    }
}
</script>

<template>
    <HeaderLayout>
        <div class="container mx-auto mt-5">
            <div
                class="w-5/6 mx-auto text-center w-full text-5xl font-bold text-pr-green pb-12 border-dashed border-b border-gray-400">
                Новый заказ
            </div>
            <div class="flex justify-center container">
                <form @submit.prevent="submit" class="mt-10">
                    <div class="flex justify-center flex-col items-center" v-for="(product, index) in form.products" :key="index">
                            <div class="mt-3">
                                <input class="rounded-md text-4xl" v-model="product.url" type="text"
                                       placeholder="Ссылка" :aria-label="`Ссылка на ${index+1} товар`">
                                <div v-if="form.errors[`product.${index}.url`]" class="text-red-600 text-sm">
                                    {{ form.errors[`product.${index}.url`] }}
                                </div>
                            </div>
                            <div class="mt-3">
                                <input class="rounded-md text-4xl" v-model="product.count" type="text"
                                       placeholder="Количество" :aria-label="`Кол-во ${index+1} товара`">
                                <div v-if="form.errors[`product.${index}.count`]" class="text-red-600 text-sm">
                                    {{ form.errors[`product.${index}.count`] }}
                                </div>
                            </div>
                            <div class="mt-3">
                                <input class="rounded-md text-4xl" v-model="product.note" type="text"
                                       placeholder="Примечание" :aria-label="`Примечание к ${index+1} товару`">
                                <div v-if="form.errors[`product.${index}.note`]" class="text-red-600 text-sm">
                                    {{ form.errors[`product.${index}.note`] }}
                                </div>
                            </div>
                            <button class="mt-2" @click.prevent="removeProduct(index)" type="button">Удалить</button>
                    </div>
                    <div v-if="loyality.orders_count !== 0" class="mt-10 flex items-center justify-center">
                        <label for="discount" class="mr-5 font-bold text-4xl">Использовать скидку?</label>
                        <input class="scale-150" id="discount" type="checkbox" name="discount" v-model="form.discount">
                    </div>
                    <div v-if="loyality.orders_count !== 0" class="mt-2 text-gray-400 text-center mb-0">
                        <p>Текущее количество ваших заказов: {{ loyality.orders_count }} </p>
                        <p>Скидка: {{ loyality.orders_count * 3 }}% </p>
                    </div>
                    <div class="flex items-center justify-center">
                        <button @click.prevent="addProduct"
                                class="text-4xl mr-3 mt-5 mb-10 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full"
                                type="submit">Добавить новый товар
                        </button>
                        <button
                            class="text-4xl mt-5 mb-10 bg-pr-green hover:bg-sec-green text-white font-bold py-2 px-4 rounded-full"
                            type="submit">Создать
                        </button>
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
