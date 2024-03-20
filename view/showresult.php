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
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-between madimi-one-regular p-4 border border-3 mt-4">
        <h2>Product's Information</h2>
        <button id="open_add" type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i></button>
    </div>
    <div class="container mt-4">
         <button class="btn btn-outline-secondary"><a href="backup.php">Recycle Bin</a></button>
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
            <!-- <tr>
                <td>1001</td>
                <td>Coca</td>
                <td>Drink</td>
                <td>0.5$</td>
                <td>
                <button type="button" class="btn btn-outline-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>1002</td>
                <td>Red Bull</td>
                <td>Energy-Drink</td>
                <td>1$</td>
                <td>
                <button type="button" class="btn btn-outline-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr> -->
            <?php 
                show_product();
            ?>
        </table>
    </div>
    <?php
    include 'modal.php';
    ?>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#open_add").click(function(){
            $("#accept_update").hide();
            $("#accept_add").show();
        })
        $("body").on("click","#open_edit",function(){
            $("#accept_add").hide();
            $("#accept_update").show();

            var id       = $(this).parents('tr').find('td').eq(0).text();
            var name     = $(this).parents('tr').find('td').eq(1).text();
            var category = $(this).parents('tr').find('td').eq(2).text();
            var price    = $(this).parents('tr').find('td').eq(3).text();

            $("#id").val(id);
            $("#name").val(name);
            $("#category").val(category);
            $("#price").val(price);
        })
    })
</script>