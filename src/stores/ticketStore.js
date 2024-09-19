import { defineStore } from 'pinia';

export const useTicketStore = defineStore('ticket', {
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
    agreePrivacyPolicy: false,
    agreeRefundPolicy: false
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
    setAgreePrivacyPolicy(agree) {
      this.agreePrivacyPolicy = agree;
    },
    setAgreeRefundPolicy(agree) {
      this.agreeRefundPolicy = agree;
    }
  }
});
