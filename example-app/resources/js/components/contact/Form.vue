<script src="./form.js"></script>

<template>
    <Form @submit="onSubmit" :validation-schema="schema">
        <!-- First name -->
        <Field name="firstName" type="text" />
        <!-- Last name -->
        <Field name="lastName" type="text" />
        <!-- Email -->
        <Field name="email" type="email" />
        <!-- Telephone -->
        <Field name="telephone" type="text" />
        <button>Create</button>
    </Form>
</template>