<template>
  <div id="app">
    <ContactCard></ContactCard>
  </div>
</template>

<script>
import ContactCard from './components/ContactCard.vue'

export default {
  name: 'app',
  components: {
    ContactCard: ContactCard
  },
}
</script>