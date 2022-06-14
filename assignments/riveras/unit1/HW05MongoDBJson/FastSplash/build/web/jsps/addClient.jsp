<%-- 
    Document   : addClient
    Created on : 25 nov. 2021, 20:07:02
    Author     : Christian Novoa
--%>

<%@page import="ec.espe.edu.fastsplash.controller.ClientController"%>
<%@page import="ec.espe.edu.fastsplash.model.Client"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Adding Clients</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <center><br><h1>Client Addeded</h1></center>
        <%
            Client client;
            client = new Client(request.getParameter("firstName"), request.getParameter("lastName"), request.getParameter("ci"), request.getParameter("email"), request.getParameter("bornDate"));
        %>
        <main class="no-center">
            <div class="content">
                <div class="row2"><% out.println("<span class=\"blue\">Name: </span>  " + client.getFirstName() + " " + client.getLastName()); %></div>
                <div class="row2"><% out.println("<span class=\"blue\">C.I.: </span>  " + client.getCi()); %></div>
                <div class="row2"><% out.println("<span class=\"blue\">Email: </span>  " + client.getEmail()); %></div>
                <div class="row2"><% out.println("<span class=\"blue\">Born date: </span>  " + client.getBornDate());%></div>

                <%
                    ClientController clientController = new ClientController();
                    boolean result = clientController.addClient(client);
                    if(!result){
                        out.println("<div class=\"row2\"><span class=\"red\">Fail saving in MongoDB database</span></div>");
                    } else{
                        out.println("<div class=\"row2\"><span class=\"green\">Succesfully saved in MongoDB database</span></div>");
                    }
                %>
            </div>
        </main>
        <a href="javascript:history.go(-1);" class="return">Return</a>
        <footer class="footer">Christian Novoa</footer>
    </body>
</html>
