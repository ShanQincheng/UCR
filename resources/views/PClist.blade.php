
<!DOCTYPE html>

<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</head>




<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a href="indextut6.php" class="navbar-brand">AusWine</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="indextut6.php" class="nav-link">Home</a>
                </li>


                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#myModal" class="nav-link">Registration</a>
                </li>


                <li class="nav-item">
                    <a href="Details.php" class="nav-link">Details</a>
                </li>

                <li class="nav-item">
                    <a href="wines.php" class="nav-link">Wines</a>
                </li>

            </ul>
        </div>
    </div>
</nav>




<!-- Addwines -->


<div class="container mt-5">
    <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add A New Wine</button>


    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"style="color:black">Add A New Wine</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">

                    <form action="addWines.php" method="POST">






                        <div class="form-group">
                            <label style="color:black" for="itemID" class="form-label">ID</label>
                            <input type="text" class="form-control" id="itemID" name="itemID">
                        </div>




                        <div class="form-group">
                            <label style="color:black" for="itemName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="itemName" name="itemName">
                        </div>



                        <div class="form-group">
                            <label style="color:black" for="itemType" class="form-label">Select the type</label>
                            <select class="form-select" id="itemType" name="itemType">
                                <option>Red Wine</option>
                                <option>White Wine</option>
                                <option>Sparkling</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label style="color:black" for="itemQuantity" class="form-label">Quantity</label>
                            <input class="form-control" type="text" id="itemQuantity" name="itemQuantity">
                        </div>


                        <div class="form-group">
                            <label style="color:black" for="itemPrice" class="form-label">Price</label>
                            <input type="text" id="itemPrice" name="itemPrice" class="form-control">
                        </div>


                        <div class="form-group">
                            <label style="color:black" for="itemRegion" class="form-label">Select the region</label>
                            <select class="form-select" id="itemRegion" name="itemRegion">
                                <option>TAS</option>
                                <option>VIC</option>
                                <option>NSW</option>
                                <option>SA</option>
                                <option>QLD</option>
                                <option>NT</option>
                                <option>WA</option>
                            </select>
                        </div>




                        <div class="modal-footer d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary" name="add">Add</button>
                            <a href="wines.php" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>












    <!-- Database Table -->

    <table class="table mt-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Region</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $query ="SELECT * FROM wine_item";

        $stmt = $db->query ($query);

        while($row = $stmt->fetch (PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $row ['itemID']; ?></td>
            <td><?php echo $row ['itemName']; ?></td>
            <td><?php echo $row ['itemType']; ?></td>
            <td><?php echo $row ['itemQuantity']; ?></td>
            <td><?php echo $row ['itemPrice']; ?></td>
            <td><?php echo $row ['itemRegion']; ?></td>






            <!-- Editwines-->

            <td class="d-flex">
                <button class="btn btn-primary m-1" data-toggle="modal" data-target="#editModal<?php echo $row['itemID']; ?>">Edit</button>
                <!-- Deletewines -->
                <a href="deleteWines.php?delete=<?php echo $row['itemID']; ?>" class="btn btn-danger m-1"> Delete</a>
            </td>
        </tr>







        <!-- Editwines Modal-->



        <div class="modal" id="editModal<?php echo $row['itemID']; ?>">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" style="color:black">Update</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>




                    <div class="modal-body">


                        <form id='update' action="editWines.php" method="post">

                            <input type="hidden" name="itemID" id="itemID"value="<?php echo $row['itemID']?>">


                            <div class="form-group">
                                <label style="color:black" for="itemName" class="form-label">Name</label>
                                <input class="form-control" type="text" id="itemName" name="itemName" value="<?php echo $row['itemName']; ?>">
                            </div>



                            <div class="form-group">
                                <label style="color:black" for="itemType" class="form-label">Select the type</label>
                                <select class="form-select" id="itemType" name="itemType">
                                    <option value="Red Wine"<?=$row['itemType'] == 'Red Wine' ? ' selected="selected"' : '';?>>Red Wine </option>
                                    <option value="White Wine"<?=$row['itemType'] == 'White Wine' ? ' selected="selected"' : '';?>>White Wine </option>
                                    <option value="Sparkling"<?=$row['itemType'] == 'Sparkling' ? ' selected="selected"' : '';?>>Sparkling </option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label style="color:black" for="itemQuantity" class="form-label">Quantity</label>
                                <input class="form-control" type="text" id="itemQuantity" name="itemQuantity" value="<?php echo $row['itemQuantity']; ?>">
                            </div>

                            <div class="form-group">
                                <label style="color:black" for="itemPrice" class="form-label">Price</label>
                                <input type="text" id="itemPrice" name="itemPrice" class="form-control" value="<?php echo $row['itemPrice']; ?>">
                            </div>

                            <div class="form-group">
                                <label style="color:black" for="itemRegion" class="form-label">Select the region</label>
                                <select class="form-select" id="itemRegion" name="itemRegion">
                                    <option value="TAS"<?=$row['itemRegion'] == 'TAS' ? ' selected="selected"' : '';?>>TAS</option>
                                    <option value="VIC"<?=$row['itemRegion'] == 'VIC' ? ' selected="selected"' : '';?>>VIC</option>
                                    <option value="NSW"<?=$row['itemRegion'] == 'NSW' ? ' selected="selected"' : '';?>>NSW</option>
                                    <option value="SA"<?=$row['itemRegion'] == 'SA' ? ' selected="selected"' : '';?>>SA</option>
                                    <option value="QLD"<?=$row['itemRegion'] == 'QLD' ? ' selected="selected"' : '';?>>QLD</option>
                                    <option value="NT"<?=$row['itemRegion'] == 'NT' ? ' selected="selected"' : '';?>>NT</option>
                                    <option value="WA"<?=$row['itemRegion'] == 'WA' ? ' selected="selected"' : '';?>>WA</option>
                                </select>
                            </div>



                            <div class="modal-footer d-flex justify-content-start">

                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                <a href="wines.php" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>

                            </div>


                        </form>
                    </div>




                </div>
            </div>
        </div>












        <?php } ?>
        </tbody>
    </table>





</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
