import React from 'react'
import styled from 'styled-components'
import FacebookOutlinedIcon from '@mui/icons-material/FacebookOutlined';
import InstagramIcon from '@mui/icons-material/Instagram';
import logo from '../imgs/logo.png'
import TwitterIcon from '@mui/icons-material/Twitter';
import MapIcon from '@mui/icons-material/Map';
import PhoneIcon from '@mui/icons-material/Phone';
import MailIcon from '@mui/icons-material/Mail';

const Container = styled.div`
    display: flex;
    background-color: #191919;
    color: #C7D6D5;
`
const Left = styled.div`
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
`

const Logo = styled.img`
    height: 150px;
    margin: 0px 0px;
`

const Desc = styled.p`
    margin: 10px 20px;
    text-align: justify;
    text-justify: inter-word;
`
const SocialContainer = styled.div`
    display: flex;
    margin-bottom: 20px;
`
const SocialIcon = styled.div`
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #${props=>props.color};
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0px 20px;
`

const Center = styled.div`
    flex: 1;
    padding: 40px;
`
const Title = styled.h3`
    margin-bottom: 30px;
`;

const List = styled.ul`
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
`
const ListItem = styled.li`
    width: 50%;
    margin-bottom: 10px;
    cursor: pointer;
`

const Right = styled.div`
    flex: 1;
    padding: 40px;
`
const ContactItem = styled.div`
   margin-bottom: 20px;
   display: flex;
   align-items: center;
   
`
const Payment = styled.img`
   width: 50%;
`

const Footer = () => {
    return (
        <Container>
            <Left>
                <Logo src = {logo}/>
                <Desc>
                A través del deporte, tenemos el poder de cambiar vidas. Los deportes nos mantienen en forma, nos mantienen atentos y lo más importante, nos unen. ProSkin es el hogar del corredor, el jugador de baloncesto, el niño de fútbol, el entusiasta del fitness.
                </Desc>
                <SocialContainer>
                    <SocialIcon color="3B5999"><FacebookOutlinedIcon/></SocialIcon>
                    <SocialIcon color="E4405F"><InstagramIcon/></SocialIcon>
                    <SocialIcon color="55ACEE"><TwitterIcon/></SocialIcon>
                </SocialContainer>
            </Left>
            <Center>
                <Title>Links Utiles</Title>
                <List>
                    <ListItem>Página principal</ListItem>
                    <ListItem>Carrito</ListItem>
                    <ListItem>Ropa de hombre</ListItem>
                    <ListItem>Ropa de mujer</ListItem>
                    <ListItem>Accesorios</ListItem>
                    <ListItem>Mi cuenta</ListItem>
                    <ListItem>Seguir orden</ListItem>
                    <ListItem>Lista de deseos</ListItem>
                    <ListItem>Terminos y condiciones</ListItem>
                </List>
            </Center>
            <Right>
                <Title>Contactos</Title>
                <ContactItem>
                    <MapIcon style={{marginRight:"10px"}}/>Jorge Piedra Oe4-76 y Av. La Prensa
                </ContactItem>
                <ContactItem>
                    <PhoneIcon style={{marginRight:"10px"}}/>+593 98 370 3370
                </ContactItem>
                <ContactItem>
                    <MailIcon style={{marginRight:"10px"}}/>contacto@proskin.net
                </ContactItem>

                <Payment src = "https://i.ibb.co/Qfvn4z6/payment.png"/>
            </Right>
        </Container>
    )
}

export default Footer
