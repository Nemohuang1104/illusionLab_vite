import { defineStore } from 'pinia';


export const useTicketStore = defineStore('ticketStore', {
  state: () => ({
    // 第一頁的資料
    guestNumber: 0,
    date: '',
    time: '',
    
    // 第二頁的資料
    name: '',
    phone: '',
    email: '',
    taxID: '',
    companyName: '',
    comments: '',
    // agreePrivacyPolicy: false,
    // agreeRefundPolicy: false,
    // 新增 Checkbox 的狀態
    // isChecked: false // Checkbox 狀態
    totalAmount: 0,
    eventId: 0,
    eventName: '',
    discountCode: '',
    discount: 0,
    total: 0,
    orderId: null, // 初始化 orderId 為 null
  }),
  actions: {
    // 第一頁的 actions
    setGuestNumber(guestNumber) {
      this.guestNumber = guestNumber;
    },
    setDate(date) {
      this.date = date;
    },
    setTime(time) {
      this.time = time;
    },

    // 第二頁的 actions
    setName(name) {
      this.name = name;
    },
    setPhone(phone) {
      this.phone = phone;
    },
    setEmail(email) {
      this.email = email;
    },
    setTaxID(taxID) {
      this.taxID = taxID;
    },
    setCompanyName(companyName) {
      this.companyName = companyName;
    },
    setComments(comments) {
      this.comments = comments;
    },
    setEventName(eventName) {
      this.eventName = eventName;
    },
    setEventId(eventId) {
      this.eventId = eventId;
    },
    setDiscountCode(discountCode) {
      this.discountCode = discountCode;
    },
    setOrderId(orderId) {
      this.orderId = orderId; // 設置 orderId 的方法
    },
    // setAgreePrivacyPolicy(agreePrivacyPolicy) {
    //   this.agreePrivacyPolicy = agreePrivacyPolicy;
    // },
    // setAgreeRefundPolicy(agreeRefundPolicy) {
    //   this.agreeRefundPolicy = agreeRefundPolicy;
    // },

    // 用來更新 checkbox 狀態的 action
  //   updateChecked(isChecked) {
  //     this.isChecked = isChecked;
  //   }
  },
  persist: {
    enabled: true, // 啟用持久化
    strategies: [
      {
        key: 'ticketStore', // 在 localStorage 中的 key 名稱
        storage: sessionStorage, // 使用 localStorage，也可以選擇 sessionStorage
      },
    ],
  },
});
