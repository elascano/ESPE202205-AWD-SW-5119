<%-- 
    Document   : proceso
    Created on : 01/06/2022, 14:10:54
    Author     : G401
--%>
<%@page import="ec.edu.espe.hardwareStore.Items"%>
<%@page import="webServices.ItemsResource"%>
<html>
<head>
<title>SOCCER PLAYERS</title>
<style type="text/css" media="screen">
</style>
</head>
<body>
 
<%
 ItemsResource soccerPlayer=new ItemsResource();
 int idItem=Integer.valueOf(request.getParameter("idItem"));
 String name=new String((request.getParameter("name")).getBytes("ISO-8859-1"),"UTF-8");
 String itemBrand=new String((request.getParameter("itemBrand")).getBytes("ISO-8859-1"),"UTF-8");
 String description=new String((request.getParameter("description")).getBytes("ISO-8859-1"),"U)TF-8");
 Double price=Double.valueOf((request.getParameter("price")));
 int inStock=Integer.valueOf(request.getParameter("inStock"));
 
 
 Items item = new Items(idItem,name,itemBrand,description,price,inStock);
 soccerPlayer.updateJson(idItem, item);
 out.print("Actualizado");
 %> 

 
</body>
</html>