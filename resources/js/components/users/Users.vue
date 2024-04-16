<template>
  <v-container class="fill-height">

    <UserForm @add-user="addUser"/>

    <v-container fluid>
      <v-row dense>
        <v-col
          v-for="user in users"
          :key="user.id"
          cols="12"
        >
          <UserItem :user="user"/>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script setup>

import {useUsers} from "./core";
import UserForm from "../users/partials/UserForm/UserForm.vue";
import UserItem from "../users/partials/UserItem/UserItem.vue";

const {users, addUser} = useUsers()

</script>

<style lang="scss" src="./style.scss"></style>
