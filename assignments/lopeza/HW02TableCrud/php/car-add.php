<?php require_once "header.php";  ?>

<form name="frmAdd" method="post" action="" id="frmAdd">
    <div>
        <label style="padding-top: 20px;">Plate ID</label> <span
            id="plate-info"></span><br /> <input type="text"
            name="plate_id" id="plate_id">
    </div>
    <div>
        <label>Brand</label> <span id="brand-info"></span><br /> 
        <input type="text" name="brand" id="brand">
    </div>
    <div>
        <label>Model</label> <span id="model-info"></span><br />
        <input type="text" name="model" id="model">
    </div>
    <div>
        <label>Colour</label> <span id="colour-info"></span><br />
        <input type="text" name="colour" id="colour">
    </div>
    <div>
        <label>Year</label> <span id="year-info"></span><br />
        <input type="number" name="year" id="year" min="1885" max="2022">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Save" />
        <input type="button" onclick="history.back()" id="btn" name="back" value="Back">
    </div>
    </div>
</form>
</body>
</html>