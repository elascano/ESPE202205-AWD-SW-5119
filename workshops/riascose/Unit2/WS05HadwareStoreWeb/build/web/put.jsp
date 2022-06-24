<%-- 
    Document   : put.jsp
    Created on : 24 jun. 2022, 00:12:09
    Author     : Erick
--%>

<%@page import="ec.espe.edu.hardwareStore.model.Item"%>
<%@page import="ec.espe.edu.hardwareStore.rest.ItemResource"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%
    ItemResource item=new ItemResource();
    Item content;
    int idItem=Integer.valueOf(request.getParameter("id"));
    String name=request.getParameter("name");
    String itemBrand=request.getParameter("brand");
    String description=request.getParameter("description");
    double price=Double.valueOf(request.getParameter("price"));
    int inStock=Integer.valueOf(request.getParameter("stock"));
    content=new Item(idItem,name,itemBrand,description,price,inStock);
    item.putJson(content);
    response.sendRedirect("index.html");
%>
