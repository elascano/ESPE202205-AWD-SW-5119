import React from 'react'
import styled from 'styled-components'
import logo from '../imgs/logo.png'
import Badge from '@mui/material/Badge';
import ShoppingCartOutlinedIcon from '@mui/icons-material/ShoppingCartOutlined';
import {Link} from "react-router-dom";
import {shoppingCartItems} from '../data';
import { IconButton } from '@material-ui/core';
import {supabase} from '../supabaseClient'

const Container = styled.div`
    height: 80px; 
    position: sticky;
    top: 0;
    background-color: #191919;
    z-index: 9999;
`   

const Wrapper = styled.div`
    padding: 10px 20px;
    height: 80%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #C7D6D5;
`;

const Left = styled.div`
    flex: 1;
    display: flex;
    align-items: center;
`;


const Right = styled.div`
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: flex-end;
`;

const MenuItem = styled.div`
    font-size: 14px;
    cursor: pointer;
    margin-left: 25px;
`

const Navbar = () => {
    const user = supabase.auth.user();

    async function handleLogout(){
        const { error } = await supabase.auth.signOut()
        if(!error){window.location.reload()}
    }

    return (
        <Container>
            <Wrapper>
                <Left>      
                    <Link to="/">
                        <img src={logo} width="250px" height="200%" alt="our logo"/>    
                    </Link>
                </Left>
           
                <Right>
                    {user === null ? (<MenuItem><Link to="/register">Registrarse</Link></MenuItem>) : null}
                    {user === null ? (<MenuItem><Link to="/login">Iniciar sesión</Link></MenuItem>) : null}
                    {user !== null ? user.email : null}
                    {user !== null ? (<MenuItem onClick={handleLogout}>Cerrar sesión</MenuItem>):null}
                    <MenuItem>
                        <IconButton component={Link} to={"/cart"}>
                            <Badge badgeContent={shoppingCartItems.length} color="primary">
                                <ShoppingCartOutlinedIcon style={{color: "white"}}/>
                            </Badge>
                        </IconButton>
                    </MenuItem>
                </Right>
            </Wrapper>
        </Container>
    );
}

export default Navbar
