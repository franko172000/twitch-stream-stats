import apiClient from "../axios";
export const twitchLogin = async ({code})=>{
    return apiClient.post('auth/twitch/login', {
        code
    });
}

export const authLogout = async ()=>{
    return apiClient.post('auth/logout');
}

export const streams = async ()=>{
    return apiClient.get('streams');
}

export const topGames = async ()=>{
    return apiClient.get('top-games');
}
export const gameStreams = async ()=>{
    return apiClient.get('game-streams');
}

export const streamsByTime = async ()=>{
    return apiClient.get('streams-by-date');
}
