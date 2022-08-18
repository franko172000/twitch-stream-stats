import store from 'store'
import { notification } from 'ant-design-vue'
const getUrl = window.location;
const baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ;

const apiClient = axios.create({
  baseURL: baseUrl+'api/',
})

apiClient.interceptors.request.use(request => {
  const accessToken = store.get('accessToken')
  if (accessToken) {
    request.headers.Authorization = `Bearer ${accessToken}`
    request.headers.AccessToken = accessToken
  }
  return request
})

apiClient.interceptors.response.use(undefined, error => {
  const { response } = error
  const { data } = response
  if (response.status === 401) {
      store.remove('accessToken');
      window.location.href = '/auth/login';
      notification.error({
          message: data.errors ? processError(data.errors) : data.message,
      })
  }
  return Promise.reject(error)
})

const processError = (errors)=>{

  let message = "";
  errors.map(val=>{
    message+= Object.values(val)[0] + "\n";
  })

  return message;
}

export default apiClient
