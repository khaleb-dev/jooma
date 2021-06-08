import ApiService from './api.service'
// import { StorageService } from './storage.service'

class AppRequestError extends Error {
    constructor(errorCode, message) {
        super(message)
        this.name = this.constructor.name
        this.message = message
        this.errorCode = errorCode
    }
}

const AppRequestService = {
    BASE_URL: process.env.VUE_APP_BASE_URL,
    
    /**
     * Fetch All tags
     * 
     * @returns 
     */
    fetchAllTags: async function() {
        try {
            const response = await ApiService.get(`${this.BASE_URL}/tags`)
            return response.data
        }
        catch (error) {
            throw new AppRequestError(error.response.status, error.response.data.detail)
        }
    },

    /**
     * Fetch tag by id
     * 
     * @param {*} id 
     * @returns 
     */
    fetchTagById: async function(id) {
        try {
            const response = await ApiService.get(`${this.BASE_URL}/tag/${id}`)
            return response.data
        }
        catch (error) {
            throw new AppRequestError(error.response.status, error.response.data.detail)
        }
    }
    
}

export { AppRequestService, AppRequestError }