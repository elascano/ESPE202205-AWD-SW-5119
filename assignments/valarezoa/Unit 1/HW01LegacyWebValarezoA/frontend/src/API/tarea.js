import { BASE_PATH, API_VERSION} from './config'

export function crearApi(data){
  const url = `${BASE_PATH}/${API_VERSION}/crear`
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
    if(result.task){
      return{
        ok: true,
        message: "Tarea creada correctamente"
      };
    }
    return {ok: false, message: result.message};
  }).catch(err =>{
    return {ok: false, message: err.message}
  });
}