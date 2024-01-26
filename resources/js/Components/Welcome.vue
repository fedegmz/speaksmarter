<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <button v-if="$page.props.user.permissions.includes('create roles')">Create Roles</button>
        <button v-if="$page.props.user.permissions.includes('create lessons')">Create New Lesson</button>
    </div>
</template>

<style>
    button { 
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
    }
</style>

