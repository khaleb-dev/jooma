import { TagsService, TagsError } from '../services/tags.service'

const state = {
    tags: [],
    tag: {},
    loading: false,
    currentPage: 1,
    total: 0,
    pages: 0,
    serverResponse: null,
}

const getters = {
    tags: (state) => {
        return state.tags
    },

    tag: (state) => {
        return state.tag
    },

    loading: (state) => {
        return state.loading
    },

    currentPage: (state) => {
        return state.currentPage
    },

    total: (state) => {
        return state.total
    },

    pages: (state) => {
        return state.pages
    },

    serverResponse: (state) => {
        return state.serverResponse
    },
}

const actions = {
    async fetchAllTags({ commit }) {
        commit('startRequest')
        try {
            const response = await TagsService.fetchAllTags()
            console.log(response);
            if (response.hasOwnProperty('messages')) {                
                commit('fetchAllTagsSuccess', response)

                return true
            } else {
                commit('requestError', response)
                
                return false
            }
        } catch (e) {
            if (e instanceof TagsError) {
                commit('requestError', {status: e.errorCode, message: e.message})
            }

            return false
        }
    }
}

const mutations = {
    startRequest(state) {
        state.loading = true;
    },

    fetchAllTagsSuccess(state, response){
        state.mediaTypes = response.tags
        state.loading = false
    },

    fetchTagSuccess(state, response){
        state.mediaTypes = response.tag
        state.loading = false
    },

    stopRequest(state) {
        state.loading = false
    },

    requestError(state, response) {
        state.loading = false
        state.serverResponse = response
    },
}

export const tags = {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}