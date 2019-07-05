<template>
  <div>
    <div class="d-flex justify-content-start mb-4">
      <div class="img_cont_msg">
        <img src class="rounded-circle user_img_msg" />
        <span>{{ user }}</span>
      </div>
      <div class="msg_cotainer">
        <slot></slot>
        <span class="msg_time">Today</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"]
};
</script>