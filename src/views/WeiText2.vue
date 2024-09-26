
// 使用 onMounted 來在組件加載時發送請求
onMounted(async () => {
  try {
    // 假設我們已經有 token，可以從 cookie 或 localStorage 中獲取
    const token = "exampleToken"; // 請根據你的應用替換此 token

    // 發送請求至後端以取得折扣資訊
    const response = await fetch('https://your-api-url/ShowCoupon.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({ token })
    });

    // 解析後端回傳的結果
    const result = await response.json();
    
    if (result.status === "success") {
      // 若優惠券尚未使用，顯示折扣金額
      isDiscountUsed.value = false;
      discountAmount.value = result.data.discount_amount;
    } else {
      // 若優惠券已使用，設置為已使用
      isDiscountUsed.value = true;
    }
  } catch (error) {
    console.error("發送請求時發生錯誤:", error);
  }
});