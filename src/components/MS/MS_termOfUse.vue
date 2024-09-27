<template>
    <div class="template">
        <div class="menu">
            <a href="#section1"><h4>會員註冊</h4></a>
            <a href="#section2"><h4>購物流程</h4></a>
            <a href="#section3"><h4>配送及配送政策</h4></a>
            <a href="#section4"><h4>退換貨政策</h4></a>
            <a href="#section5"><h4>會員積分制度</h4></a>
            <a href="#section6"><h4>聯絡我們</h4></a>
        </div>
        <main>
            <div class="top">
                <MS_com_title mode="four"
                mainTitle="使用條款" 
                subTitle="TERM OF USE"
                />
            </div>
            <div id="section1" class="section">
                <h4>一、會員註冊</h4>
                <h6>首先感謝您造訪我們的網站<br><br>
                    幻浸實驗室是採用會員制的品牌<br><br>
                    在您使用幻浸實驗室的服務時，請確保處於登入狀態。<br><br>
                    您可以透過電子郵件、帳號或手機號碼以及密碼來建立帳戶。<br><br>
                    非必要的資訊，幻浸實驗室並不會強迫您輸入。<br><br>
                    登入後，您將享受會員以及折扣活動</h6>
            </div>
            <div id="section2" class="section">
                <h4>二、購物流程</h4>
                <h6>1.您能透過商品分類或是搜索功能來找尋您感興趣的商品。<br><br>
                    2.點擊商品圖片進入詳情頁面，查看商品信息。<br><br>
                    3.選擇您喜歡的顏色、尺寸等選項後，將商品加入購物車。<br><br>
                    4.在您結帳前，可以繼續查找商品。<br><br>
                    5.結帳時，請填寫收件地址，並選擇配送方式與付款方式<br><br>
                    6.依照提示完成付款，您將收到訂單確認電子郵件。<br><br>
                    7.我們將在商品抵達前持續為您更新配送資訊。</h6>
            </div>
            <div id="section3" class="section">
                <h4>三、配送及配送政策</h4>
                <h6>配送公司：TibaMe 緯育物流<br><br>
                    配送範圍：台澎金馬<br><br>
                    配送運費：60元（消費滿1000元免運費）<br><br>
                    配送時間：1至7天</h6>
            </div>
            <div id="section4" class="section">
                <h4>四、退換貨政策</h4>
                <h6>購買前請仔細檢查顏色與尺碼，謹慎購買。<br><br>
                    商品到貨後七日內，不滿意的商品您可以換貨與退貨。<br><br>
                    不符合退貨政策的商品會有標註，請務必留意。<br><br>
                    商品內容瑕疵或是錯誤，幻浸實驗室將會提供免費換退貨服務。<br><br>
                    若商品內容沒有錯誤，退換貨費用由客人承擔。<br><br>
                    我們將在收到您的退換貨申請後進行處理，並通過電子郵件通知您相關信息。</h6>

            </div>
            <div id="section5" class="section">
                <h4>五、會員積分制度</h4>
                <h6>您每次購物可根據訂單金額獲得相應積分。<br><br>
                    特定活動期間，購物可享受雙倍或更多積分獎勵。<br><br>
                    積分可在結帳時抵扣部分金額，具體使用方式請參閱積分政策。<br><br>
                    註冊滿六個月且會員達白金階級，我們將在您的生日為您送上好禮。</h6>
            </div>
            <div id="section6" class="section">
                <h4>六、聯絡我們</h4>
                <h6>如有任何問題，請隨時通過電子郵件（illusionLab@gmail.com）或電話(TID)102-11-8939聯絡我們。<br><br>
                    感謝您選擇 幻浸實驗室，祝您購物愉快！</h6>
            </div>
        </main>
        <img src="" alt="">
    </div>

</template>

<script setup>
import { onMounted } from 'vue';
import MS_com_title from '@/components/MS/MS_com_title.vue';

onMounted(() => {
  const menuLinks = document.querySelectorAll('.menu a');

  menuLinks.forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      const targetId = link.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop,
          behavior: 'smooth' // 平滑滾動
        });
      }
    });
  });
});
</script>

<style lang="scss" scoped>
  @import "../../assets/SASS/component/ms";
  h1,h2,h3,h4,h5,h6,p{
    color: #FFFFFF !important;
    font-family: "Noto Sans TC";
  }
  
  .top{
    padding-bottom: 30px;
  }
  
    .template{
        position: relative;
        background: linear-gradient(146deg, #22247A 1.3%, #7976BB 98.32%);
    }
    .menu{
        position: fixed;
        left: 10vw;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .top{
        gap: 0;
    }
    main{
        margin-left: 10vw;
        gap: 0;
    }
    h4,h6{
        text-align: left;
    }
    .section{
        display: flex;
        flex-direction: column;
        gap: 40px;
        height: 100vh;
        padding-top: 80px;
        border-top: 1px solid #FFFFFF;
    }
</style>