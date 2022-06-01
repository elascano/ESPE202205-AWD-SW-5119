<%-- 
    Document   : index
    Created on : 1 jun. 2022, 12:39:08
    Author     : HP PC
--%>

<%@page import="java.util.Iterator"%>
<%@page import="java.util.List"%>
<%@page import="ec.edu.espe.model.Shoes"%>
<%@page import="ec.edu.espe.DB.ControllerDB"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Shoes</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container">
            <h1>lIST OF SHOES</h1>
            <table border="1" class="table table-dark">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>trademark</th>
                        <th>size</th>
                        <th>type</th>
                        <th>color</th>
                        <th>price</th>
                        <th>description</th>
                    </tr>
                </thead>
                <%
                    ControllerDB data= new ControllerDB();
                    List<Shoes> list=data.readList();
                    Iterator<Shoes> iter=list.iterator();
                    Shoes shoes=null;

                    while(iter.hasNext()){
                        shoes=iter.next();

                %> 

                <tbody>
                    <tr>
                        <!-- <td> out.print(appliance.getItem()); </td> -->
                        <td><%= shoes.getId()%></td>
                        <td><%= shoes.getTrademark()%></td>
                        <td><%= shoes.getSize()%></td>
                        <td><%= shoes.getType()%></td>
                        <td><%= shoes.getColor()%></td>
                        <td><%= shoes.getPrice()%></td>
                        <td><%= shoes.getDescription()%></td>                                        

                    </tr>
                <%}%>

                </tbody>
            </table>
            <a href="Controller?action=addShoes">
                <button class="btn btn-success">
                Agregar
                </button>
            </a>
            <script src="js/bootstrap.min.js"></script> 
        </div>
    </body>
</html>
