<template>
  <div>
    <button class="btn btn-blue" @click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import axios from "axios";

const props = defineProps({
  userId: {
    type: Number,
    required: true,
  },
  follows: {
    type: Boolean,
    required: true,
  },
});

// Reactive data
const status = ref(props.follows);

// Computed property
const buttonText = computed(() => (status.value ? "Unfollow" : "Follow"));

// Methods
function followUser() {
  axios
    .post(`/follow/${props.userId}`)
    .then((res) => {
      status.value = !status.value;
      console.log(res.data);
    })
    .catch((error) => {
      if (error.response.status === 401) {
        window.location("/login");
      }
    });
}
</script>

<style scoped>
.btn {
  @apply font-bold py-2 px-4 rounded;
}

.btn-blue {
  @apply bg-blue-500 text-white;
}

.btn-blue:hover {
  @apply bg-blue-700;
}
</style>
