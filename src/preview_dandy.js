import { createApp } from 'vue';
import MindSpectrum from '@/views/MindSpectrum.vue';
import MS_views_index from '@/views/MS_views_index.vue';
import PP_termOfUse from '@/views/PP_termOfUse.vue';
import PP_privacy_policy from '@/views/PP_privacy_policy.vue';

const app = createApp(MS_views_index);
app.mount('#preview-app');