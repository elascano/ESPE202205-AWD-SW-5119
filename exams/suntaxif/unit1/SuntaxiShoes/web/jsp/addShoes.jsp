<%-- 
    Document   : addShoes
    Created on : 31 may. 2022, 21:18:29
    Author     : HP PC
--%>

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
            <h1>Add Shoes</h1>
            <form action="Controller">
                <div>
                    <div>
                        <label>ID</label>
                        <input type="number" name="id">
                    </div>
                   
                    <div>
                        <label>trademark</label>
                        <input type="text" name="trademark">
                    </div>
                     <div>
                        <label>size</label>
                        <input type="number" name="size">
                    </div>
                    <div>
                        <label>type</label>
                        <input type="text" name="type">
                    </div>
                    <div>
                        <label>color</label>
                        <input type="text" name="color">
                    </div>
                    <div>
                        <label>price</label>
                        <input type="number" name="price" step="0.01">
                    </div>
                    <div>
                        <label>description</label>
                        <input type="text" name="description">
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit" value="Add" name="action">
                            Add
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>
