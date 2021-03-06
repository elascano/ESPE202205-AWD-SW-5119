import {useContext} from "react";
import {AuthContext} from "../providers/AuthProviders";

const useAuth = () => (useContext(AuthContext));

export default useAuth;