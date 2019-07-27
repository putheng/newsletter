import axios from 'axios'

export const fetchUser = ({commit}) => {
	return axios.get('/api/admin/profile').then((response) => {
		commit('setUser', response.data.data)

		return Promise.resolve(response)
	})
}

export const fetchNews = ({commit}) => {
	return axios.get('/api/admin/news').then((response) => {
		commit('setNews', response.data.data)

		return Promise.resolve(response)
	})
}