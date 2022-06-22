<%-- 
    Document   : main
    Created on : 01/06/2022, 13:25:38
    Author     : G401
--%>

<%@page import="com.mongodb.util.JSON"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>Hardware Store</title>
</head>
<body> 
<form action="process.jsp" method="put">
    Id item:
    <input type="text" name="idItem">
    <br/><br/><br/>
    Name:
    <input type="text" name="name">
    <br/><br/><br/>
    Item Brand:
    <input type="text" name="itemBrand">
    <br/><br/><br/>
    Description:
    <input type="text" name="description"> 
    <br/><br/><br/>
    Price:
    <input type="text" name="price">
    <br/><br/><br/>
    Stock:
    <input type="text" name="inStock">
    <br/><br/><br/>
    <p><input type="submit" value="Insertar"></p>
   
</form> 
</body>
</html>
