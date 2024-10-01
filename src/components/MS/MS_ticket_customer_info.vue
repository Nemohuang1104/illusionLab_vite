<template>
  <div class="template_mobang" :class=holyShitBGI>
    <div class="top">
      <MS_com_title :mode="modeSelect" mainTitle="賓客資料" subTitle="Customer Info"  />
    </div>
    <main>
      <form 
      class="selections" 
      action="" 
      method="post"
      @submit.prevent="handleSubmit"
      
      >
        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 姓名 Name</h4>
          <input 
          v-model="ticketStore.name"
          @input="updateFormData('name', ticketStore.name)"

          class="options" type="text"  :style="{ borderColor: MobangColor }"
          />
          <h5 class="remind" v-if="errors.name">{{ errors.name }}</h5>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 電話 Phone Number</h4>
          <input 
          type="tel" id="phone" name="phone"
          @input="updateFormData('phone', ticketStore.phone)"

          v-model="ticketStore.phone"
          pattern="[0-9]{10}"
          class="options"  :style="{ borderColor: MobangColor }"></input>
          <h5 class="remind" v-if="errors.phone">{{ errors.phone }}</h5>
          
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">* 電子信箱 Email（預約登記使用，請確保填寫正確。）</h4>
          <input 
          id="emailAddress"
          placeholder="illusionlab@example.com"
          v-model="ticketStore.email"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('email', ticketStore.email)"
          ></input>
          <h5 class="remind" v-if="errors.email">{{ errors.email }}</h5>

        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">統一編號 Company Tax ID（無開立統編發票不須填寫）</h4>
          <input 
          v-model="ticketStore.taxID"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('taxID', ticketStore.taxID)"
          ></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">公司抬頭 Company Name（無開立統編發票不須填寫）</h4>
          <input 
          v-model="ticketStore.companyName"
          class="options" type="email" :style="{ borderColor: MobangColor }"
          @input="updateFormData('companyName', ticketStore.companyName)"></input>
        </div>

        <div class="selection">
          <h4 :style="{ color: MobangColor }">其他備註 Other Comments</h4>
          <input 
          v-model="ticketStore.comments"
          class="options" type="textarea" :style="{ borderColor: MobangColor }"
          @input="updateFormData('comments', ticketStore.comments)"></input>
        </div>
        <div class="check_warp">
        <div class="check">
          <input 
          v-model="ticketStore.agreePrivacyPolicy"
          type="checkbox" :style="{ borderColor: MobangColor }" id="check1"
          @input="updateFormData('agreePrivacyPolicy', ticketStore.agreePrivacyPolicy)">
          <span class="custom-radio-mark"></span>
          <label for="check1">
          <h4 :style="{ color: MobangColor }">我已詳閱並遵守隱私條款。</h4>
          
        </label>
      </div>
      <h5 class="remind remind_agree" v-if="errors.agreePrivacyPolicy">{{ errors.agreePrivacyPolicy }}</h5>
      </div>
      <div class="check_warp">
        <div class="check">
          <input 
          v-model="ticketStore.agreeRefundPolicy"
          type="checkbox" :style="{ borderColor: MobangColor }" id="check2"
          @input="updateFormData('agreeRefundPolicy', ticketStore.agreeRefundPolicy)">
          <span class="custom-radio-mark"></span>
          <label for="check2">
          <h4 :style="{ color: MobangColor }">我已詳讀並遵守退換票政策係依行政院文化部之定型化契約。</h4>
        </label>
        
      </div>
      <h5 class="remind remind_agree" v-if="errors.agreeRefundPolicy">{{ errors.agreeRefundPolicy }}</h5>
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



<script>
import MS_com_title from '@/components/MS/MS_com_title.vue';
import { useTicketStore } from '@/stores/ticketStore';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
  
export default {
  components: {
    MS_com_title
  },
  data() {
    return {
      currentMode: 'two1', // 当前的模式
      currentStep: 1,     // 当前的步骤
      // formData: {
      //   name: '',
      //   phone: '',
      //   email: '',
      //   taxID: '',
      //   companyName: '',
      //   comments: '',
      //   agreePrivacyPolicy: false,
      //   agreeRefundPolicy: false,
      // },
      formErrors: {},
      // isFormComplete: false,
      errors: {
        name: '',
        phone: '',
        email: '',
        taxID: '',
        companyName: '',
        comments: '',
        agreePrivacyPolicy: false,
        agreeRefundPolicy: false,
      },
      errorMessage: '', // 錯誤訊息
      // localFormData: {},
      guestError: false, // 顯示錯誤信息的標誌
      
    };
  },
  props: {
    // formData: Object,
    // errors: Object, // 父層傳遞的錯誤消息
    // 

    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
    // currentStep: {
    //   type: Number,
    //   required: true,
    //   validator: value => ['mode1', 'mode2', 'mode3'].includes(value),
    // },
    
    },
  computed: {
    ticketStore() {
      return useTicketStore();
    },
    // agreePrivacyPolicy() {
    //   return this.ticketStore.agreePrivacyPolicy;
    // },
    // agreeRefundPolicy() {
    //   return this.ticketStore.agreeRefundPolicy;
    // },
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
    },
    isFormComplete() {
      return this.ticketStore.name && this.ticketStore.email && this.ticketStore.phone && this.ticketStore.agreePrivacyPolicy && this.ticketStore.agreeRefundPolicy;
    }
  },
  watch: {
    isFormComplete(newVal) {
      // 當 form 狀態變化時，將 isFormComplete 傳遞給父層
      this.$emit('formCompletionStatus', newVal);
    }
  },
  methods: {
    
    fetchMemberData() {
  // 從 sessionStorage 獲取 Token
  const token = sessionStorage.getItem('token'); // 假設 token 存在這個 key 下
  
  fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/get_member_data.php`, {
    method: 'GET', // 也可以省略，因為 fetch 預設是 GET
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}` // 添加 Authorization 標頭
    }
  })
  .then(response => response.json())
  .then(data => {
    
    if (data.status === 'success') {
      
      // 將資料存入 ticketStore
      this.ticketStore.name = data.data.USER_NAME;
      this.ticketStore.email = data.data.EMAIL;
      this.ticketStore.phone = data.data.PHONE_NUMBER;
    } else {
      console.error(data.message);
    }
  })
  .catch(error => {
    console.error('Error fetching member data:', error);
  });
},


      updateErrors(updatedErrors) {
        this.errors = { ...this.errors, ...updatedErrors };
      },
    // checkFormCompletion() {  
    //   this.isFormComplete =
    //     this.formData.name &&
    //     this.formData.phone &&
    //     this.formData.email &&
    //     this.formData.agreePrivacyPolicy &&
    //     this.formData.agreeRefundPolicy;
    // },
    // updateFormData(data) {
    //   this.formData = data;
    //   this.checkFormCompletion();
    // },
    // 更新表單數據並清除錯誤訊息
  updateFormData(field, value) {
    // 更新特定欄位的值
    this.ticketStore[field] = value;
    
    // 清除該欄位的錯誤訊息
    this.clearError(field);
    
    // 檢查表單是否完成
    this.checkFormCompletion();
  },

  // 清除指定欄位的錯誤訊息
  clearError(field) {
    if (this.errors[field]) {
      this.errors[field] = ''; // 清空該欄位的錯誤訊息
    }
  },

  // 檢查表單是否完成的邏輯
  checkFormCompletion() {
    // 假設檢查每個欄位是否已填寫
    if (this.ticketStore.email && 
        this.ticketStore.name && 
        this.ticketStore.phone &&
        this.ticketStore.agreePrivacyPolicy &&
        this.ticketStore.agreeRefundPolicy) {
      // 假設所有欄位都已填寫，表單完成
      console.log('表單已完成');
    } else {
      // 表單尚未完成
      console.log('表單未完成');
    }
  },
    saveData() {
      if (this.isFormComplete) {
        // const ticketStore = useTicketStore();
        this.ticketStore.setName(this.ticketStore.name);
        this.ticketStore.setPhone(this.ticketStore.phone);
        this.ticketStore.setEmail(this.ticketStore.email);
        this. ticketStore.setTaxID(this.ticketStore.taxID);
        this.ticketStore.setCompanyName(this.ticketStore.companyName);
        this.ticketStore.setComments(this.ticketStore.comments);

        console.log("表單已成功保存到 Pinia");
        this.$emit("form-submitted"); // 通知父層表單已提交
      } else {
        console.warn("表單未完成，無法保存數據");
      }
    },
    validateForm() {
      console.log(this.ticketStore.name);
      
      const errors = {};
      if (!this.ticketStore.name) {
        errors.name = "請填寫姓名";
      }
      if (!this.ticketStore.phone) {
        errors.phone = "請填寫電話";
      }
      if (!this.ticketStore.email) {
        errors.email = "請填寫信箱";
      }
      if (!this.ticketStore.agreePrivacyPolicy) {
        errors.agreePrivacyPolicy = "請同意隱私政策";
      }
      if (!this.ticketStore.agreeRefundPolicy) {
        errors.agreeRefundPolicy = "請同意退款政策";
      }

      if (Object.keys(errors).length > 0) {
        this.updateErrors(errors);
        Swal.fire({
          position: "center",
          icon: "warning",
          title: "尚有欄位未輸入",
          showConfirmButton: false,
          timer: 1500,
        });
        return false; // 停止保存數據
      } else {
        this.saveData();
        return true; // 停止保存數據
      }
    },
    // updateFormData(field, value) {
    //   this.localFormData[field] = value;
    //   // this.$emit('update:formData', this.localFormData);

    //   if (field === 'name' && value) {
    //     this.$emit('update-errors', { name: '' });  
    //   }
    //   if (field === 'phone' && value) {
    //     this.$emit('update-errors', { phone: '' });  
    //   }
    //   if (field === 'email' && value) {
    //     this.$emit('update-errors', { email: '' });  
    //   }
    //   if (field === 'agreePrivacyPolicy' && value) {
    //     this.$emit('update-errors', { agreePrivacyPolicy: '' });  
    //   }
    //   if (field === 'agreeRefundPolicy' && value) {
    //     this.$emit('update-errors', { agreeRefundPolicy: '' });  
    //   }
     
    // },
 
  },
  mounted() {
    // 請求會員資料
    this.fetchMemberData();
  },
};
</script>


<!-- <script setup>
 import { ref, defineEmits } from 'vue';
import MS_com_title from '@/components/MS/MS_com_title.vue';

const props = defineProps();
const emit = defineEmits(['saveData']);



// const localFormData = ref({
//       formData : {
//         phone: '',
//         email: '',
//         taxID: '',
//         companyName: '',
//         comments: '',
//         agreePrivacyPolicy: false,
//         agreeRefundPolicy: false
//       },
//     });

    // const updateFormData = (field, value) => {
    //   localFormData.value[field] = value;
    //   emit('update:formData', localFormData.value);
    // };

    // const handleSubmit = () => {
    //   // 在提交表單時將數據發送給父組件
    //   emit('saveData');
    // };

</script>

<script>
export default {
  data() {
    return {
      currentMode: 'two1', // 当前的模式
      currentStep: 1,     // 当前的步骤

      formData : {
      name:'',
      phone: '',
      email: '',
      taxID: '',
      companyName: '',
      comments: '',
      agreePrivacyPolicy: false,
      agreeRefundPolicy: false
    },
    errors: {
      name:'',
      phone: '',
      email: '',
      taxID: '',
      companyName: '',
      comments: '',
      agreePrivacyPolicy: false,
      agreeRefundPolicy: false
      },
     
      errorMessage: '', // 錯誤訊息
      localFormData: {},
      guestError: false // 顯示錯誤信息的標誌
    };

  },
  components: {
    // MS_com_buttons
  },
  props: {
    errors: Object, // 父層傳遞的錯誤消息
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
    currentStep: {
      type: Number,
      required: true,
      validator: value => ['mode1', 'mode2', 'mode3'].includes(value),
    },
    eventId: {
      type: Number,
      required: true // 父層傳來的活動 ID
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

  methods: {
    updateFormData(field, value) {
      this.localFormData[field] = value;
      this.$emit('update:formData', this.localFormData);

    },
  }
};
</script> -->

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
  // font-family: "Noto Sans TC", sans-serif;
  font-optical-sizing: auto;
  // font-weight: 400;
  font-style: normal;
}

// h1 {
//   font-size: 30px;
// }

// h2 {
//   font-size: 28px;
// }

// h3 {
//   font-size: 18px;
// }

// h4 {
//   font-size: 16px;
// }

// h5 {
//   font-size: 14px;
// }

// h6 {
//   font-size: 16px;
// }

// p {
//   font-size: 14px;
// }

// a {
//   text-decoration: none;
// }

h1,
h2,
h3,
h4,
h5,
h6,
p {
  // font-family: 'Noto Sans TC';
  // color: #855F49;
  font-weight: bold;
  text-align: center;
  line-height: 150%;
}

.template_mobang {
  display: flex;
  padding: 10% 10%;
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
  background-image: url(@/assets/images/ms/modeBGI2.png);

}

.template_mobangThree {
  background-image: url(@/assets/images/ms/modeBGI3.jpg);
}

.remind{
      // color: #f47d52;
      font-weight: 600;
      color: red;
    }

.remind_agree{
  text-align: left;
}

.check_warp{
  display: flex;
  flex-direction: column;
  align-content: flex-start;
  justify-content: flex-start;
}

#check2{
  align-self: flex-start;
    margin-top: 6px;
}

@media screen and (max-width: 820px) {
      .options{
        width: 60vw;
      }
    }

</style>