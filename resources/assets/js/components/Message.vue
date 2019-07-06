<template>
  <div>
    <div v-if="user !== this.authUser" class="d-flex justify-content-start align-items-center mb-4">
      <div class="img_cont_msg d-flex flex-column">
        <img
          :src="'https://natsume.site/laravel-chat/public/images/human.png'"
          class="rounded-circle user_img_msg"
        />
        <span class="user_name">{{ user }}</span>
      </div>
      <div class="msg_cotainer d-flex flex-column">
        <slot></slot>
        <span class="msg_time">{{ time }}</span>
      </div>
    </div>
    <div v-else class="d-flex justify-content-end align-items-center mb-4">
      <div class="msg_cotainer_send d-flex flex-column">
        <slot></slot>
        <span class="msg_time_send">{{ time }}</span>
      </div>
      <div class="img_cont_msg d-flex flex-column">
        <img
          :src="'https://natsume.site/laravel-chat/public/images/human.png'"
          class="rounded-circle user_img_msg"
        />
        <span class="user_name">{{ user }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: String
    },
    time: {
      type: String
    }
  },
  data() {
    return {
      authUser: GlobalInfo.user.name
    };
  }
};
</script>