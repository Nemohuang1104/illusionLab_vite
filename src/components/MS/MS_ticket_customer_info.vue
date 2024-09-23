<template>
  <div class="template_mobang" :class=holyShitBGI>
    <div class="top">
      <MS_com_title :mode="modeSelect" mainTitle="賓客資料" subTitle="Customer Info" :intro="OurIntro" />
    </div>
    <main>
      <form 
      @submit.prevent="handleSubmit"
      class="selections" action="" method="post">
        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 姓名 Name</h4>
          <input 
          v-model="formData.name"
          @input="updateFormData('name', formData.name)"
          class="options" type="text"  :style="{ borderColor: MobangColor }"
          />
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 電話 Phone Number</h4>
          <input 
          @input="updateFormData('phone', formData.phone)"
          v-model="formData.phone"
          class="options" type="number" :style="{ borderColor: MobangColor }"></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 電子信箱 Email（預約登記使用，請確保填寫正確。）</h4>
          <input 
          v-model="formData.email"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('email', formData.email)"
          ></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">統一編號 Company Tax ID（無開立統編發票不須填寫）</h4>
          <input 
          v-model="formData.taxID"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('taxID', formData.taxID)"
          ></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">公司抬頭 Company Name（無開立統編發票不須填寫）</h4>
          <input 
          v-model="formData.companyName"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('companyName', formData.companyName)"></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">其他備註 Other Comments</h4>
          <input 
          v-model="formData.comments"
          class="options" type="textarea" :style="{ borderColor: MobangColor }"
          @input="updateFormData('comments', formData.comments)"></input>
        </div>

        <div class="check">
          <input 
          v-model="formData.agreePrivacyPolicy"
          type="checkbox" :style="{ borderColor: MobangColor }" id="check1">
          <span class="custom-radio-mark"></span>
          <label for="check1">
          <h4 :style="{ color: MobangColor }">我已詳閱並遵守隱私條款。</h4>
        </label>
        </div>

        <div class="check">
          <input 
          v-model="formData.agreeRefundPolicy"
          type="checkbox" :style="{ borderColor: MobangColor }" id="check2">
          <span class="custom-radio-mark"></span>
          <label for="check2">
          <h4 :style="{ color: MobangColor }">我已詳讀並遵守退換票政策係依行政院文化部之定型化契約。</h4>
        </label>
        </div>
      </form>
    </main>
    <!-- <router-link :to="dynamicRoute"> -->
    <!-- <MS_com_buttons 
      :mode="currentMode" :currentStep="currentStep"
        mode="two1" :step="modeSelect" 
    /> -->
    <!-- </router-link> -->
  </div>
</template>

<script setup>
 import { ref, defineEmits } from 'vue';
import MS_com_title from '@/components/MS/MS_com_title.vue';

const props = defineProps();
const emit = defineEmits(['saveData']);



const localFormData = ref({
      formData : {
        phone: '',
        email: '',
        taxID: '',
        companyName: '',
        comments: '',
        agreePrivacyPolicy: false,
        agreeRefundPolicy: false
      },
    });

    const updateFormData = (field, value) => {
      localFormData.value[field] = value;
      emit('update:formData', localFormData.value);
    };

    const handleSubmit = () => {
      // 在提交表單時將數據發送給父組件
      emit('saveData');
    };

</script>

<script>
export default {
  data() {
    return {
      currentMode: 'two1', // 当前的模式
      currentStep: 1,     // 当前的步骤

      formData : {
      phone: '',
      email: '',
      taxID: '',
      companyName: '',
      comments: '',
      agreePrivacyPolicy: false,
      agreeRefundPolicy: false
    },
    };
  },
  components: {
    // MS_com_buttons
  },
  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
  },
  computed: {
    holyShitBGI() {
      if (this.mode === 'one') {
        return 'template_mobangOne';
      } else if (this.mode === 'two') {
        return 'template_mobangTwo';
      } else if (this.mode === 'three') {
        return 'template_mobangThree';
      }
      return 'template_mobangOne';
    },
    modeSelect() {
      if (this.mode === 'one') {
        return 'one';
      } else if (this.mode === 'two') {
        return 'two';
      } else if (this.mode === 'three') {
        return 'three';
      }
      return 'one';
    },
    MobangColor() {
      if (this.mode === 'one' || this.mode === 'two') {
        return '#FFFFFF';
      } else if (this.mode === 'three') {
        return '#855F49';
      }
      return '#FFFFFF';
    },
    mainTitleInput() {
      switch (this.mode) {
        case 'one':
          return '這是 Mode One 的標題';
        case 'two':
          return '這是 Mode Two 的標題';
        case 'three':
          return '這是 Mode Three 的標題';
        default:
          return '未知模式';
      }
    },
    dynamicRoute() {
      if (this.mode === 'one1') {
        return '/LC_Ticket_reservation2';
      } else if (this.mode === 'mode2') {
        return '/page2';
      } else if (this.mode === 'mode3') {
        return '/page3';
      }

    }
  },
};
</script>

<style lang="scss" scoped>
.check {
  display: flex;
  flex-direction: row;
}

.selections {
  display: flex;
  flex-direction: column;
  gap: 60px;
}

.noto-sans-tc-regular {
  font-family: "Noto Sans TC", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
}

h1 {
  font-size: 30px;
}

h2 {
  font-size: 28px;
}

h3 {
  font-size: 18px;
}

h4 {
  font-size: 16px;
}

h5 {
  font-size: 14px;
}

h6 {
  font-size: 16px;
}

p {
  font-size: 14px;
}

a {
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
  font-family: 'Noto Sans TC';
  color: #855F49;
  font-weight: bold;
  text-align: center;
  line-height: 150%;
}

.template_mobang {
  display: flex;
  padding: 150px 200px;
  flex-direction: column;
  align-items: center;
  gap: 50px;
}

.top {
  display: flex;
  flex-direction: column;
  gap: 0;

}

main {
  display: flex;
  flex-direction: column;
  gap: 60px;
}

.options {
  box-sizing: border-box;
  margin: 0 auto;
  width: 40vw;
  display: flex;
  padding: 15px 20px;
  background: transparent;
  justify-content: flex-end;
  align-items: center;
  border-radius: 40px;
  border: 2px solid #855F49;

}

.selection {
  width: auto;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.selections {
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: 40px;
}

select {
  appearance: none
}

.options {
  text-align: center;
}

.template_mobangOne {
  // background-image: url('../src/ms/modeBGI1.png');
  background-size: contain;
}

.template_mobangTwo {
  background-image: url('../src/ms/modeBGI2.png');

}

.template_mobangThree {
  background-image: url('../src/ms/modeBGI3.jpg');
}

</style>