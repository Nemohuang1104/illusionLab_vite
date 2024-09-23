<template>
  <div>
      <!-- <MS_Enter /> -->
      <MS_main />
      <!-- <MS_com_question /> -->
      <!-- <MS_com_parnter /> -->
      <!-- <MS_ticket_into />
      <MS_ticket_reservation mode="three" />
      <MS_ticket_customer_info mode="three" />
      <MS_ticket_confirmation mode="three" /> -->
      <!-- <MS_customization /> -->
      <!-- <MS_ticket_reservation :mode="bangSu" />
      <MS_ticket_customer_info :mode="bangSu" />
      <MS_ticket_confirmation :mode="bangSu" /> -->
  </div>
</template>

<script setup>
    import MS_main from '@/components/MS/MS_main.vue';
    import MS_ticket_into from '@/components/MS/MS_ticket_into.vue';
    import MS_ticket_reservation from '@/components/MS_ticket_reservation.vue';
    import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
    import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
    import MS_customization from '@/components/MS/MS_customization.vue';
    import MS_com_caro from '@/components/MS/MS_com_caro.vue';
    import MS_com_parnter from '@/components/MS/MS_com_parnter.vue';
    import MS_com_marquee from '@/components/MS/MS_com_marquee.vue';
    import MS_termOfUse from '@/components/MS/MS_termOfUse.vue';
    import MS_privacy_policy from '@/components/MS/MS_privacy_policy.vue';
    import MS_Enter from '@/components/MS/MS_Enter.vue';
    import MS_com_question from '@/components/MS/MS_com_question.vue';
</script>

<style lang="scss">
</style>