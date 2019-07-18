import axios from 'axios'

export const submit = ({commit}, {endpoint, payload, method}) => {
	commit('clearValidationErrors', '', {root:true})
	commit('setLoading', '', {root:true})
	
	return axios({ method: method, url: endpoint, data: payload }).then((response) => {
		commit('clearValidationErrors', '', {root:true})
		
		return Promise.resolve(response)
	})
}

export const setValidationErrors = ({commit}, error) => {
	commit('setValidationErrors', error)
}

export const setErrors = ({commit}, error) => {
	commit('setErrors', error)
}

export const clearErrors = ({commit}) => {
	commit('setErrors')
}

export const resetLoading = ({commit}) => {
	commit('clearLoading')
}

export const clearValidateFor = ({commit}, error) => {
	commit('clearValidateFor', error)
}

export const clearValidationErrors = ({commit}) => {
	commit('clearValidationErrors')
}

export const clearMessage = ({commit}) => {
	commit('clearMessage')
}