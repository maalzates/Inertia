<template>
    <app-layout title="Contacts">
        <h1>Edit View</h1>
        <pre>{{ contact }}</pre>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    components: {
        AppLayout,
    },
    props: {
        contact: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style></style>
