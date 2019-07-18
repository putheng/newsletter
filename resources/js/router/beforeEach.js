import store from '../vuex'

const beforeEach = ((to, from, next) => {
    store.dispatch('clearValidationErrors')
    store.commit('clearMessage')

    next()
})

export default beforeEach