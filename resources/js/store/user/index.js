import router from '../../router'
import store from 'store'
import {authLogout, twitchLogin} from "../../services/requests";
import {notification} from "ant-design-vue";

export default  {
    namespaced: true,
    state: {
        name: '',
        userPhoto: '',
        userEmail: '',
        authorized: false, // false is default value
        loading: false,
        id:''
    },
    mutations: {
        SET_STATE(state, payload) {
            Object.assign(state, {
                ...payload,
            })
        },
    },
    actions: {
        loginUser({ commit, dispatch, rootState }, { payload }) {
            const { code } = payload
            commit('SET_STATE', {
                loading: true,
            })

            twitchLogin({code}).then(res => {
                notification.success({
                    message: 'You have successfully logged in',
                })

                //let data = res.data;
                let user = res.data.data;

                user['id'] = user.id;

                commit('SET_STATE', {
                    ...user,
                    authorized: true,
                })

                store.set('user', user);
                store.set('accessToken', res.data.access_token);

                //redirect to homepage
                const query = router.currentRoute.query;

                if(query?.redirect){
                    router.push(query.redirect)
                }else{
                    router.push({name: 'dashboard'})
                }


            }).catch(err=>{
                commit('SET_STATE', {
                    loading: false,
                })
                console.log(err)
            })
        },

        load_current_account({ commit, rootState }) {
            if(store.get('accessToken')){
                commit('SET_STATE', {
                    loading: true,
                })

                let user = store.get('user');

                commit('SET_STATE', {
                    ...user,
                    authorized: true,
                })

                commit('SET_STATE', {
                    loading: false,
                })
            }

        },
        logout({ commit, rootState }) {
            authLogout().then(() => {
                store.remove('user');
                store.remove('accessToken')
                if(store.get('temp_photos')){
                    store.remove('temp_photos')
                }
                commit('SET_STATE', {
                    name: '',
                    userPhoto: '',
                    userEmail: '',
                    authorized: false,
                    loading: false,
                })
                router.push({
                    name: 'login'
                })
            })
        },
    },
    getters: {
        user: state => state,
    },
}
