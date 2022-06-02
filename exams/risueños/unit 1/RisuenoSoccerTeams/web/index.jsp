<%-- 
    Document   : index
    Created on : Jun 1, 2022, 2:48:11 PM
    Author     : santy
--%>
<%@page import="com.mongodb.util.JSON"%>
<%@page import="ec.edu.espe.soccerteams.model.SoccerTeam"%>
<%@page import="soccerservices.SoccerteamsResource"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>SOCCER PLAYERS</title>
</head>
<body> 
<form action="proceso.jsp" method="get">
    Id:
    <input type="text" name="id">
    <br/><br/><br/>
    Nombre:
    <input type="text" name="name">
    <br/><br/><br/>
    Numero de jugadores:
    <input type="text" name="numberPlayers">
    <br/><br/><br/>
    Ranking del equipo:
    <input type="text" name="rankTeam"> 
    <br/><br/><br/>
    Region:
    <input type="text" name="region">
    <br/><br/><br/>
    Categoría:
    <input type="text" name="category">
    <br/><br/><br/>
    Numero de extranjeros:
    <input type="text" name="numberForeigners"> 
    <br/><br/><br/>
    Costo de la plantilla:
    <input type="text" name="templateCost">
    <br/> <br/><br/>
    <p><input type="submit" value="Insertar"></p>
   
</form> 
</body>
</html>
