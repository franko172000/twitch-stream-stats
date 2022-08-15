import apiClient from "../axios";
export const twitchLogin = async ({code})=>{
    return apiClient.post('auth/twitch/login', {
        code
    });
}

export const authLogout = async ()=>{
    return apiClient.post('auth/logout');
}
