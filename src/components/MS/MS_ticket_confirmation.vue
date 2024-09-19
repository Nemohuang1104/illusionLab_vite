<template>
    <div class="template_mobang" :class=holyShitBGI>
        <div class="top">
            <MS_com_title 
            :mode="modeSelect"  
            mainTitle="資料確認" 
            subTitle="Information Confirmation"/>
        </div>
        <main :style="{ borderColor: MobangColor }">
            <div class="confirmTitle" :style="{ borderColor: MobangColor }">
                <h3 :style="{color: MobangColor }">確認你的資料。</h3>
                <h4 :style="{color: MobangColor }">如你在選擇時間時安排有誤，還請自行承擔負責。</h4>
            </div>
            
            <div class="eventInfo">
                <h4 :style="{color: MobangColor }">{{ guestNumber }}人</h4>
                <h4 :style="{color: MobangColor }">日期：{{ date }}</h4>
                <h4 :style="{color: MobangColor }">時段：{{ time }}</h4>
            </div>
            <div class="memberInfo">
                <h4 :style="{color: MobangColor }">姓名：{{ name }}</h4>
                <h4 :style="{color: MobangColor }">電話：{{ phone }}</h4>
                <h4 :style="{color: MobangColor }">電子郵件：{{ email }}</h4>
                <h4 :style="{color: MobangColor }">統一編號：{{ taxID }}</h4>
                <h4 :style="{ color: MobangColor }">公司名稱：{{ companyName }}</h4>
                <h4 :style="{ color: MobangColor }">備註：{{ comments }}</h4>
            </div>
            
        </main>
        <div class="thereAreSoManyShitThatIHaveToCheck">
            <label for=""><h4 :style="{color: MobangColor }">折扣碼：</h4><input type="text"></label>
            <label for=""><h4 :style="{color: MobangColor }">總金額：</h4><h3 :style="{color: MobangColor }">2200</h3><h4 :style="{color: MobangColor }">老鐵真牛幣。</h4></label>
            
            <label for=""><input type="checkbox" name="" id=""><h4 :style="{color: MobangColor }">已了解隱私條款</h4></label>
            <label for=""><input type="checkbox" name="" id=""><h4 :style="{color: MobangColor }">已了解入場需知</h4></label>
            <p :style="{color: MobangColor }">即將跳轉離開網站，進入結帳流程，完成付款。<br>
                完成付款後，Email信箱中會收到訂單QRCODE與客製票卷連結，請前往確認。<br>
                活動當天請持訂單QRCODE至櫃台月換實體票卷</p>
        </div>
    <!-- <MS_com_buttons 
      :mode="currentMode" :currentStep="currentStep"
        mode="two1" :step="modeSelect"
    /> -->
    </div>
</template>
<script>
export default {

  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
  },
  computed: {
    holyShitBGI(){
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
  },
};
</script>
<script setup>
   import { computed } from 'vue';
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store

    const ticketStore = useTicketStore();

    const guestNumber = computed(() => ticketStore.guestNumber);
    const date = computed(() => ticketStore.date);
    const time = computed(() => ticketStore.time);
    const name = computed(() => ticketStore.name);
    const phone = computed(() => ticketStore.phone);
    const email = computed(() => ticketStore.email);
    const taxID = computed(() => ticketStore.taxID);
    const companyName = computed(() => ticketStore.companyName);
    const comments = computed(() => ticketStore.comments);

   
</script>

<style lang="scss" scoped>
.noto-sans-tc-regular {
    font-family: "Noto Sans TC", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    h1{font-size: 30px;}
    h2{font-size: 28px;}
    h3{font-size: 18px;}
    h4{font-size: 16px;}
    h5{font-size: 14px;}
    h6{font-size: 16px;}
     p{font-size: 14px;}

    a{
        text-decoration: none;
    }

    h1,h2,h3,h4,h5,h6,p{
        font-family:'Noto Sans TC';
        color: #855F49;
        font-weight: bold;
        text-align: center;
        line-height: 150%;
    }

    .template_mobang{
        display: flex;
        padding: 150px 200px;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .top{
        display: flex;
        flex-direction: column;
        gap: 0;

    }
    main{
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    .options{
        box-sizing: border-box;
        margin: 0 auto;
        width: 40vw;
        display: flex;
        padding:15px 20px  ;
        background: transparent;
        justify-content: flex-end;
        align-items: center;
        border-radius: 40px;
        border: 2px solid #855F49;
        
    }
    .selection{
        width: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .selections{
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    select{
        appearance: none
    }
    .options{
        text-align: center;
    }
    .template_mobangOne{
        // background-image: url('../src/ms/modeBGI1.png');
        background-size:contain;  
    }
    .template_mobangTwo{
        // background-image: url('../src/ms/modeBGI2.png');

    }
    .template_mobangThree{
        background-image: url('../src/ms/modeBGI3.jpg');
    }

    .confirmTitle{
    padding-bottom: 20px;
    border-bottom:2px solid #855F49;
}
.eventInfo > h4, .memberInfo > h4{
    text-align: left !important;
    line-height: 180% !important;
}
.eventInfo , .memberInfo{
    padding: 0 60px;
}
main{
    box-sizing: border-box;
    border: 3px solid #855F49 ;
    border-radius: 20px;
    padding: 40px 50px;
    width: 50vw;
}
.thereAreSoManyShitThatIHaveToCheck > label{
    display: flex;
    flex-direction: row;
    align-items:center;

}

.thereAreSoManyShitThatIHaveToCheck{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.thereAreSoManyShitThatIHaveToCheck > p{
    text-align: left;
    line-height: 240%;
}
</style>