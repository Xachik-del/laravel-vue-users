<template>
    <v-sheet class="mx-auto" width="500">
      <v-form @submit.prevent="submitForm">
        <v-text-field
          v-model="name"
          :rules="rules.nameRules"
          label="Name"
        ></v-text-field>
        <v-btn type="submit" block :disabled="name && !formIsValid">Submit</v-btn>
      </v-form>
        {{name}}
    </v-sheet>
</template>

<script setup>
import {useUserForm} from "./core";

const emits = defineEmits(['add-user']);

const {name, rules, formIsValid, submitForm} = useUserForm(emits);
</script>

<style lang="scss" src="./style.scss"></style>
