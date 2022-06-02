<%-- 
    Document   : AddBuilding
    Created on : 1 jun 2022, 22:51:15
    Author     : yulia
--%>

<%@page import="ec.edu.espe.building.controller.DBManager"%>
<%@page import="com.google.gson.Gson"%>
<%@page import="ec.edu.espe.building.model.Building"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Information to insert is:</h1>
        <%
            Building building;
            DBManager dbController;
            Gson gson = new Gson();
            int id = Integer.parseInt(request.getParameter("id"));
            int floorNumber = Integer.parseInt(request.getParameter("floorNumber"));
            String owner = request.getParameter("owner");
            String color = request.getParameter("color");
            String address = request.getParameter("address");
            Float height = Float.parseFloat(request.getParameter("height"));
            Float price = Float.parseFloat(request.getParameter("price"));
            String material = request.getParameter("material");
            building = new Building(id, floorNumber, owner, color, address, material, height, price);
            String employeeJson = gson.toJson(building);
            dbController = new DBManager("Buildings");
            dbController.insert(building);
            out.println(employeeJson);
        %>
    </body>      
</html>
