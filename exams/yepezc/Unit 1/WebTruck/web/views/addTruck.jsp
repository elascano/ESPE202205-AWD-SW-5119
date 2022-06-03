<%-- 
    Document   : addProduct
    Created on : May 31, 2022, 5:36:37 PM
    Author     : yepec
--%>


<%@page import="ec.edu.espe.webtruck.model.TruckResource"%>
<%@page import="ec.edu.espe.webtruck.controler.TruckDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<jsp:useBean id="truck" class="ec.edu.espe.webtruck.model.Truck"></jsp:useBean>  
<jsp:setProperty property="*" name="truck"/>  
  
<%  
    TruckResource truckResource = new TruckResource();
    truckResource.postJson(truck);
    response.sendRedirect("addTruckForm.jsp");
%>  
