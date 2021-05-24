// action types
export const UPDATE_PERSONAL_INFO = "updateUserPersonalInfo";
export const UPDATE_ACCOUNT_INFO = "updateUserAccountInfo";

// mutation types
export const SET_PERSONAL_INFO = "setPersonalInfo";
export const SET_ACCOUNT_INFO = "setAccountInfo";

const state = {
  user_personal_info: {
    photo: "media/users/300_21.jpg",
    name: "Jessy",
    surname: "Ralph",
    company_name: "JooMedia",
    job: "CEO/Blogger",
    email: "jessyralph@mail.com",
    phone: "0801198765467",
    company_site: "joomedia.com"
  },
  user_account_info: {
    username: "jooma",
    email: "admin@joomedia.com",
    language: "English",
    time_zone: "(GMT+01:00) West Central Africa",
    communication: {
      email: true,
      sms: true,
      phone: false
    },
    verification: true
  }
};

const getters = {
  currentUserPersonalInfo(state) {
    return state.user_personal_info;
  },

  currentUserAccountInfo(state) {
    return state.user_account_info;
  },

  currentUserPhoto(state) {
    return state.user_personal_info.photo;
  }
};

const actions = {
  [UPDATE_PERSONAL_INFO](context, payload) {
    context.commit(SET_PERSONAL_INFO, payload);
  },
  [UPDATE_ACCOUNT_INFO](context, payload) {
    context.commit(SET_ACCOUNT_INFO, payload);
  }
};

const mutations = {
  [SET_PERSONAL_INFO](state, user_personal_info) {
    state.user_personal_info = user_personal_info;
  },
  [SET_ACCOUNT_INFO](state, user_account_info) {
    state.user_account_info = user_account_info;
  }
};

export default {
  state,
  actions,
  mutations,
  getters
};
