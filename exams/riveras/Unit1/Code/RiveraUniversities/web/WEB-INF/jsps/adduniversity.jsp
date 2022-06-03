<%-- 
    Document   : adduniversities
    Created on : Jul 01, 2022, 13:30:51 PM
    Author     : Stalin Rivera
--%>

<%@page import="ec.espe.edu.controller.UniversitiesController"%>
<%@page import="ec.espe.edu.model.Universities"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Topic for your company</title>
    </head>
    <body>
        <h1>Hello Universities from Stalin!</h1>
        <hr>
        <br>
        <%
            String idUniversities;
            String name;
            String address;
            String telephone;
            String mail;
            String type;
            String date;
            idUniversities = request.getParameter("UniversitiesId");
            name = request.getParameter("name");
            address = request.getParameter("address");
            telephone = request.getParameter("telephone");
            mail = request.getParameter("mail");
            type = request.getParameter("type");
            date = request.getParameter("date");
            Universities universities = new Universities(idUniversities, name, address,telephone,mail,type,date);
            UniversitiesController emController = new UniversitiesController(universities);
            //Save to MongoDB 
            out.println(emController.insertEmployeeMongo(universities.getIdUniversities(), universities.getName(), universities.getAddress(), universities.getTelephone(), universities.getMail(), universities.getType(), universities.getDate()));
        %>
    </body>
</html>
