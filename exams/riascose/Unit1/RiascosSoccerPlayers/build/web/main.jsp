<%-- 
    Document   : main
    Created on : 01/06/2022, 13:25:38
    Author     : G401
--%>

<%@page import="com.mongodb.util.JSON"%>
<%@page import="soccer.SoccerPlayer"%>
<%@page import="webServices.SoccerPlayerResource"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>SOCCER PLAYERS</title>
</head>
<body> 
<form action="process.jsp" method="post">
    Id:
    <input type="text" name="id">
    <br/><br/><br/>
    Nombre:
    <input type="text" name="name">
    <br/><br/><br/>
    Apellido:
    <input type="text" name="lastName">
    <br/><br/><br/>
    Apodo:
    <input type="text" name="nickName"> 
    <br/><br/><br/>
    Posicion:
    <input type="text" name="position">
    <br/><br/><br/>
    Numero de Jugador:
    <input type="text" name="numPlayer">
    <br/><br/><br/>
    Equipo
    <input type="text" name="soccerTeam"> 
    <br/><br/><br/>
    Nacionalidad:
    <input type="text" name="nationality">
    <br/> <br/><br/>
    <p><input type="submit" value="Insertar"></p>
   
</form> 
</body>
</html>
