<%-- 
    Document   : addTruckForm
    Created on : Jun 1, 2022, 2:11:19 PM
    Author     : yepec
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<title>Add Truck Form</title>  
</head>  
<body>
        <header>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="nav-item m-2" href="addTruckForm.jsp">Add Truck</a>  
            <a class="nav-item m-2"  href="../index.jsp">View Trucks</a>   
               </nav>          
            </div>
        </header>
        <div class="container">
        <h1>Add Truck</h1>
        
        <form action="addTruck.jsp" method="post">
            <div class="grid"> 
                <div class="row p-2">
                    <label>ID:</label>
                    <input type="number" name="id">
                </div>
                <div class="row p-2">
                    <label>Name: </label>
                    <input type="text" name="name">
                </div>
                <div class="row p-2">
                    <label>Brand: </label>
                    <input type="text" name="brand">
                </div>
                <div class="row p-2">
                    <label>Primary Color: </label>
                    <input type="text" name="primaryColor">
                </div>
                <div class="row p-2">
                    <label>Secondary Color: </label>
                    <input type="text" name="secondaryColor">
                </div>
                <div class="row p-2">
                    <label>Year Of Realease: </label>
                    <input type="number" name="yearOfRealease">
                </div>
                <div class="row p-2">
                    <label>Price: </label>
                    <input type="text" name="price">
                </div>
                <div class="row p-2">
                    <label>Is Available: </label>
                    <input type="text" name="isAvailable">
                </div>
                <div class="row p-2">
                    <input type="submit" value="Add Truck"/>
                </div>
            </div>
            </div>
        </form>
    </body>
</html>  