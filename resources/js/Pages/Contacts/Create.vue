<template>
    <app-layout title="Contacts">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
                </h2>
            </template>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-2 py12">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3">
                <span class="text-indigo-500">
                    Contacts / 
                </span> Create 
            </h1>
            <div class="bg-white px-6 py-8 rounded-lg shadow">
                <jet-validation-errors></jet-validation-errors>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label>
                            First Name
                            <Input v-model="contact.first_name" type="text" class="w-full"/>
                        </label>
                    </div>
                    <div>
                        <label>
                            Last Name
                            <Input v-model="contact.last_name" type="text" class="w-full"/>
                        </label>
                    </div>
                    <div>
                        <label>
                            Organization
                            <select v-model="contact.organization_id" type="select" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                                <option value="" selected disabled>Seleccione una opción</option>
                                <option v-for="organization in organizations" :value="organization.id" :key=" 'organization' + organization.organization_id">
                                    {{organization.name}}
                                </option>
                            </select>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Email
                            <Input v-model="contact.email" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Phone
                            <Input v-model="contact.phone" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Address
                            <Input v-model="contact.address" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            City
                            <Input v-model="contact.city" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            State
                            <Input v-model="contact.state" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Country
                                <select v-model="contact.country_id" type="select" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    <option v-for="country in countries" :value="country.id" :key="'country-' + country.country_id">
                                        {{country.name}}
                                    </option>
                            </select>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Postal Code
                            <Input v-model="contact.postal_code" type="text" class="w-full"/>
                        </label>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3" @click="store"> Crear</button>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "../../Jetstream/Input.vue";
import JetValidationErrors from "../../Jetstream/ValidationErrors.vue";

export default {
    methods:{
        store(){
            this.$inertia.post(this.route('contacts.store'), this.contact);
        }
    },
    components: {
        AppLayout,
        Input,
        JetValidationErrors
    },
    props: {
        organizations: {
            type: Array,
        },
        countries: {
            type: Array
        }
    },
    data(){
        return {
            contact: {
                first_name: '',
                last_name: '',
                organization_id: '',
                email: '',
                phone: '',
                address: '',
                city: '',
                state: '',
                country_id: '',
                postal_code: ''
            }
        }
    }
};
</script>

<style></style>
