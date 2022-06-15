<?php require_once "header.php";  ?>
    <div id="add-car-btn">
        <a id="btnAddAction" href="table.php?action=car-add"><img src="../image/icon-add.png" />Add Car</a>
    </div>
    <div>
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Plate ID</strong></th>
                    <th><strong>Brand</strong></th>
                    <th><strong>Model</strong></th>
                    <th><strong>Colour</strong></th>
                    <th><strong>Year</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
                <tr>
                    <td><?php echo $result[$k]["car_plate_id"]; ?></td>
                    <td><?php echo $result[$k]["car_brand"]; ?></td>
                    <td><?php echo $result[$k]["car_model"]; ?></td>
                    <td><?php echo $result[$k]["car_colour"]; ?></td>
                    <td><?php echo $result[$k]["car_year"]; ?></td>
                    <td><a class="btnEditAction"
                        href="table.php?action=car-edit&id=<?php echo $result[$k]["car_id_number"]; ?>">
                        <img src="../image/icon-edit.png" />
                        </a>
                        <a onclick="return confirm('Confirm Delete Car Record?');" class="btnDeleteAction" 
                        href="table.php?action=car-delete&id=<?php echo $result[$k]["car_id_number"]; ?>">
                        <img src="../image/icon-delete.png" />
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>
            <tbody>
        </table>
    </div>
</body>
</html>