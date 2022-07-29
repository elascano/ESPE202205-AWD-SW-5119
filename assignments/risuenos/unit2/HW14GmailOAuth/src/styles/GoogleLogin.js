
import { GoogleLogin } from 'react-google-login';
 
const clientId= "950967429564-sqlg8jb6sqjpnograejcqdmnhu5kadpu.apps.googleusercontent.com"

function GoogleLogIn() {

  const onSuccess = (res) => {
    console.log("LOGIN SUCCESS! Current User", res.profileObj);
  }

  const onFailure = (res) => {
    console.log("LOGIN FAILED! res: ", res);
  }

  return(
    <div id="signInButton">
      <GoogleLogin
        clientId={clientId}
        buttonText="Login"
        onSuccess={onSuccess}
        onFailure={onFailure}
        cookiePolicy={'single_host_origin'}
        inSignedIn={true}
        />

      
    </div>
  )
}

export default GoogleLogIn;