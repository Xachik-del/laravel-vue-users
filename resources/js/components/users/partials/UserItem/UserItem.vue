<template>
  <v-card :title="user.name" variant="tonal">
    <v-container>
      <v-chip-group>
        <v-chip v-for="skill in user.description.split(', ')" :key="skill">{{skill}}</v-chip>
      </v-chip-group>
    </v-container>
  </v-card>
</template>

<script setup>
defineProps({
  user: {
    id: Number,
    name: String,
    skills: Array
  }
})

</script>

<style lang="scss" src="./style.scss"></style>
