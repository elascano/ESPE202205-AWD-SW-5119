<%-- 
    Document   : index
    Created on : Jun 1, 2022, 12:45:58 PM
    Author     : yepec
--%>

<%@page import="ec.edu.espe.webtruck.model.TruckResource"%>
<%@page import="ec.edu.espe.webtruck.controler.TruckDao"%>
<%@page import="ec.edu.espe.webtruck.model.Truck"%>
<%@page import="java.util.List"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>  
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
        <title>Truck Page</title>
    </head>
  <body>
        <header>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="nav-item m-2" href="views/addTruckForm.jsp">Add Truck</a>  
            <a class="nav-item m-2"  href="index.jsp">View Trucks</a>   
               </nav>          
            </div>
        </header>
        <div class="container-fluid">
            
           <h1>Truck List</h1>
           
             <%  
         TruckResource truckResource = new TruckResource();
        List<Truck> list = truckResource.getAllJson();      
        request.setAttribute("list",list);  
        %>  
        
            <table class="table table-dark table-hover" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>primary Color</th>
                        <th>secondary Color</th>
                        <th>year Of Realease</th>
                        <th>price</th>
                        <th>is Available</th>
                    </tr>
                </thead>
                <tbody>
                    <c:forEach items="${list}" var="truck">
                    <tr>
                        <td>${truck.getId()}</td>
                        <td>${truck.getName()}</td>
                        <td>${truck.getBrand()}</td>
                        <td>${truck.getPrimaryColor()}</td>
                        <td>${truck.getSecondaryColor()}</td>
                        <td>${truck.getYearOfRealease()}</td>
                        <td>${truck.getPrice()}</td>
                        <td>${truck.isIsAvailable()}</td>
                    </tr>
                    </c:forEach>  
                </tbody>
            </table>
        </div>
    </body>    
</html>
