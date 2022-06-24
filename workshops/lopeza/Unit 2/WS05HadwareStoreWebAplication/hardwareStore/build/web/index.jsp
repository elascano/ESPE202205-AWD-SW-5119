<%-- 
    Document   : index
    Created on : 20 jun. 2022, 13:04:50
    Author     : HP PC
--%>
<%@page import="java.util.Iterator"%>
<%@page import="java.util.List"%>
<%@page import="ec.edu.espe.model.Hardware"%>
<%@page import="ec.edu.espe.controller.ControllerDB"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
         <div class="container">
            <h1>lIST OF Hardware</h1>
            <table border="1" class="table table-dark">
                <thead>
                    <tr>
                        <th>idItem</th>
                        <th>Name</th>
                        <th>ItemBrand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>InStock</th>
                    </tr>
                </thead>
                <%
                    ControllerDB data= new ControllerDB();
                    List<Hardware> list=data.readList();
                    Iterator<Hardware> iter=list.iterator();
                    Hardware hardware=null;

                    while(iter.hasNext()){
                        hardware=iter.next();

                %> 

                <tbody>
                    <tr>
                        <!-- <td> out.print(appliance.getItem()); </td> -->
                        <td><%= hardware.getItemBrand() %></td>
                        <td><%= hardware.getName() %></td>
                        <td><%= hardware.getItemBrand() %></td>
                        <td><%= hardware.getDescription() %></td>
                        <td><%= hardware.getPrice() %></td>
                        <td><%= hardware.getInStock() %></td>
                    </tr>
                <%}%>

                </tbody>
            </table>
            <script src="js/bootstrap.min.js"></script> 
        </div>
        
        
    </body>
</html>
