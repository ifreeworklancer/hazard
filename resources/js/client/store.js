import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        basket: {
            items: [],
            amount: null
        }
    },

    mutations: {
        setBasket(state, {items}) {
            state.basket.items = items;

            state.basket.amount = state.basket.items.reduce((t, i) => {
                return t + (i.price * i.quantity);
            }, 0)
        },
    },

    actions: {
        async getBasket({commit}) {
            await axios.get('/basket').then(({data}) => commit('setBasket', data));
        },

        async updateBasketItem({commit, state}, item) {
            await axios.patch(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
        },

        async deleteBasketItem({commit, state}, item) {
            await axios.delete(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
        },
    }
})