<%-- 
    Document   : index
    Created on : 23 jun. 2022, 19:41:48
    Author     : HP PC
--%>
<%@page import="java.util.List"%>
<%@page import="java.util.Iterator"%>
<%@page import="ec.edu.espe.model.HomeAppliances"%>
<%@page import="java.util.ArrayList"%>
<%@page import="ec.edu.espe.controller.ControllerDB"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home Appliances</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
         <h1>List of Appliances</h1>
        <table border="1" class="table table-dark">
            <thead>
                <tr>
                    <th>id</th>
                    <th>trademark</th>
                    <th>item</th>
                    <th>color</th>
                    <th>price</th>
                </tr>
            </thead>
            <%
                ControllerDB data= new ControllerDB();
                List<HomeAppliances> list=data.readList();
                Iterator<HomeAppliances> iter=list.iterator();
                HomeAppliances appliance=null;
                
                while(iter.hasNext()){
                    appliance=iter.next();
                
            %> 
               
            <tbody>
                <tr>
                    <!-- <td> out.print(appliance.getItem()); </td> -->
                    <td><%= appliance.getId()%></td>
                    <td><%= appliance.getTrademark()%></td>
                    <td><%= appliance.getItem()%></td>
                    <td><%= appliance.getColor()%></td>
                    <td><%= appliance.getPrice()%></td>
                </tr>
            <%}%>
               
            </tbody>
        </table>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>
