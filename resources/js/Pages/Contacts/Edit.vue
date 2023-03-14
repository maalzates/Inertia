<template>
    <app-layout title="Contacts">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-2 py12">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3">
                <span class="text-indigo-500">
                    Contacts / 
                </span> Edit 
            </h1>
            <div class="bg-white px-6 py-8 rounded-lg shadow">
                <jet-validation-errors></jet-validation-errors>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label>
                            First Name
                            <Input v-model="form.first_name" type="text" class="w-full"/>
                        </label>
                    </div>
                    <div>
                        <label>
                            Last Name
                            <Input v-model="form.last_name" type="text" class="w-full"/>
                        </label>
                    </div>
                    <div>
                        <label>
                            Organization
                            <select v-model="form.organization_id" type="select" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
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
                            <Input v-model="form.email" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Phone
                            <Input v-model="form.phone" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Address
                            <Input v-model="form.address" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            City
                            <Input v-model="form.city" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            State
                            <Input v-model="form.state" type="text" class="w-full"/>
                        </label>
                    </div>
                                        <div>
                        <label>
                            Country
                                <select v-model="form.country_id" type="select" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                            <Input v-model="form.postal_code" type="text" class="w-full"/>
                        </label>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button  class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 mr-3" @click="destroy"> Eliminar</button>
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3" @click="update"> Actualizar</button>
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
    components: {
        AppLayout,
        Input,
        JetValidationErrors
    },
    props: {
        contact: {
            type: Object,
            required: true,
        },
        organizations: {
            type: Array,
        },
        countries: {
            type: Array
        }
    },
    data(){
        return {
            form: this.contact,
        }
    },
    methods:{
    update(){
        this.$inertia.put(this.route('contacts.update', this.contact), this.form);
    },
    destroy(){
        this.$inertia.delete(this.route('contacts.destroy', this.contact));
    }
},
};
</script>

<style></style>
