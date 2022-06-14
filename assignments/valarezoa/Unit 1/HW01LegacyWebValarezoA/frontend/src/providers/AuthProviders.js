import { useState, useEffect, createContext} from "react";
import {
  getAccessTokenApi,
  getRefreshTokenApi,
  refreshAccessTokenApi,
  logout
} from "../API/auth";

import jwtDecode from "jwt-decode";

export const AuthContext = createContext();

export default function AuthProvider(){
  const [user, setUser] = useState({
    user: null,
    isLoading: true
  });

  useEffect(() => {
      checkUserLogin(setUser);
  }, [])

  console.log(user);

  return user;
}

function checkUserLogin(setUser){
  const accessToken = getAccessTokenApi();
  
  if(!accessToken){
    const refreshToken = getRefreshTokenApi();
    if(!refreshToken){
      logout();
      setUser({
        user: null,
        isLoading: false
      });
    }else{
      refreshAccessTokenApi(refreshToken);
    }
  }else{
    setUser({
      isLoading: false,
      user: jwtDecode(accessToken)
    });
  }

}