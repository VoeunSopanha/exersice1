<?php 
    include('../function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link bootstrap -->
    <?php
    include ('../link/style.php');
    include '../link/icon.php';
    ?>
    <!-- link icon -->
    
    <!-- link css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Product Menagement</title>
</head>
<body>
    <div class="container d-flex justify-content-between madimi-one-regular p-4 border border-3 mt-4">
    <h2>Recycle Bin</h2>
        <form method="post">
            <button type="submit" name="btn_empty" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash-can"></i>  Empty Recycle Bin</button>
        </form>
    </div>
    <div class="container mt-4">
         <button class="btn btn-outline-secondary"><a href="showresult.php">Back to view</a></button>
     </div>
    <div class="container">
        <table class="table align-middle" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cagetory</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php 
                backup_data();
            ?>
        </table>
    </div>
</body>
</html>
