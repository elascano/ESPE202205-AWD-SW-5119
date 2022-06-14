import { BASE_PATH, API_VERSION} from './config'

export function registroApi(data){
  const url = `${BASE_PATH}/${API_VERSION}/registro`
  const params = {
    method: "POST",
    body: JSON.stringify(data),
    headers:{
      "Content-Type": "application/json"
    }
  };

  return fetch(url, params).then(response => {
    return response.json();
  }).then(result => {
    if(result.user){
      return{
        ok: true,
        message: "Usuario creado correctamente"
      };
    }
    return {ok: false, message: result.message};
  }).catch(err =>{
    return {ok: false, message: err.message}
  });
}

export function iniciarApi(data){
  
  const url = `${BASE_PATH}/${API_VERSION}/iniciar`;
  const params = {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json"
    }
  };

  return fetch(url, params)
  .then( response => {
    return response.json();
  })
  .then(result => {
    localStorage.setItem("email", data.email);
    return result;
  })
  .catch(err => {
    return err.message;
  });
}