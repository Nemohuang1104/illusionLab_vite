<template>
  <div class="template">
    <div class="top">
      <MS_com_title 
        mainTitle="隱私權政策" 
        subTitle="PRIVACY POLICY"
        intro="
        <span>BELLEU 比露時尚</span>（以下簡稱「我們」）非常重視您的個人資料保護。<br>
        本隱私政策旨在說明我們如何收集、使用、披露、保存及保護您的個人資料。<br>
        請仔細閱讀以下內容，以了解我們對您個人資料的處理方式。
        "/>
    </div>
      <main>
        <div class="the_accordion">
          <div v-for="(section, index) in sections" :key="index">
            <button class="accordion" @click="togglePanel(index)">
              <h4>{{ section.title }}</h4>
            </button>
          <div
            class="panel"
            :style="{ maxHeight: activeIndex === index ? panelHeights[index] : '0px' }"
            ref="panels"
          >
            <h4>{{ section.contentTitle }}</h4>
            <div v-for="(item, idx) in section.content" :key="idx">
              <h4>{{ item.title }}</h4><h4>{{ item.text }}</h4>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
  
<script setup>
  import MS_com_title from '@/components/MS/MS_com_title.vue';

  import { ref, onMounted } from 'vue';

  const sections = [
    {
      title: '一、我們收集的個人資料',
      contentTitle: '當您使用我們的網站、註冊帳戶、購買商品或聯繫客服時，我們可能會收集以下類型的個人資料：',
      content: [
        { title: '1. 基本資料：', text: '如姓名、性別、生日、電子郵件地址、聯絡電話、郵寄地址等。' },
        { title: '2. 帳戶資料：', text: '如使用者名稱、密碼、購物記錄等。' },
        { title: '3. 支付資料：', text: '如信用卡信息、銀行帳戶資料等。' },
        { title: '4. 技術資料：', text: '如IP地址、瀏覽器類型及版本、時區設定、操作系統及平台、訪問記錄等。' },
      ],
    },
    {
      title: '二、我們如何使用您的個人資料',
      contentTitle: '我們將您的個人資料用於以下用途：',
      content: [
        { title: '1. 提供服務：', text: '處理您的註冊、訂單、支付及配送，並提供售後服務。' },
        { title: '2. 改善服務：', text: '分析您的購物習慣及偏好，改進我們的產品及服務。' },
        { title: '3. 行銷活動：', text: '向您發送最新產品資訊、促銷優惠及市場調查等。' },
        { title: '4. 法律需求：', text: '遵守法律規定及配合政府機關調查。' },
      ],
    },
    {
      title: '三、我們如何披露您的個人資料',
      contentTitle: '我們在以下情況下可能會披露您的個人資料：',
      content: [
        { title: '1. 服務提供商：', text: '我們可能會將您的資料提供給協助我們運營網站及提供服務的第三方，如支付處理公司、物流公司等。' },
        { title: '2. 法律要求：', text: '當我們有義務披露您的資料以遵守法律規定或應政府機關要求時。' },
      ],
    },
    {
      title: '四、我們如何保護您的個人資料',
      contentTitle: '我們採取適當的技術和管理措施來保護您的個人資料，防止未經授權的訪問、使用或披露。然而，互聯網上的資料傳輸無法保證絕對安全，因此我們無法保證您的資料在傳輸過程中的安全性。',
      content: [],
    },
    {
      title: '五、您的權利',
      contentTitle: '您對於您的個人資料擁有以下權利：',
      content: [
        { title: '1. 查閱權：', text: '您有權查閱我們所持有的您的個人資料。' },
        { title: '2. 更正權：', text: '您有權要求我們更正不準確或不完整的資料。' },
        { title: '3. 刪除權：', text: '在特定情況下，您有權要求我們刪除您的個人資料。' },
        { title: '4. 反對權：', text: '您有權反對我們使用您的個人資料進行直接行銷。' },
      ],
    },
    {
      title: '六、隱私政策的變更',
      contentTitle: '我們保留隨時修改本隱私政策的權利。修改後的政策將在我們的網站上公佈，並自公佈之日起生效。請定期查閱本頁面以了解最新政策。',
      content: [],
    },
    {
      title: '七、聯絡我們',
      contentTitle: '如果您對本隱私政策有任何疑問或希望行使您的權利，請通過以下方式聯繫我們：',
      content: [
        { title: '電子郵件：', text: 'service@belleu.com.tw' },
        { title: '電話：', text: '(TID)102-11-8939。' },
        { title: '地址：', text: '新北市啵啵區嘻嘻路102街11號。' },
      ],
    },
  ];

  const activeIndex = ref(null);
  const panelHeights = ref([]);

  const togglePanel = (index) => {
    activeIndex.value = activeIndex.value === index ? null : index;
  };

  onMounted(() => {
    const panels = document.querySelectorAll('.panel');
    panels.forEach(panel => {
      panelHeights.value.push(panel.scrollHeight + 'px');
    });
  });
</script>
  
<style lang="scss" scoped>
.accordion {
  background-color: #eee;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  font-weight: bold;
}

.active, .accordion:hover {
  background-color: #ccc;
}
.panel > h4{
  padding-top:30px;
} 
.panel {
  padding: 0 18px;
  box-sizing: border-box;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  gap: 20px;
  transition: max-height 0.2s ease-out;
}

h3,h4 {
  text-align: left;
}

.panel > div{
  display: flex;
  flex-direction: row;
  align-items: center;
}
.panel > div:last-child{
  margin-bottom: 30px;
}
.the_accordion {
  margin-top: 50px;
}

@media screen and (max-width: 950px) {
  main {
    padding: 60px 20px;
  }
}
.template{
  gap: 40px;
}
</style>
