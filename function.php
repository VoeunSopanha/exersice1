<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
    $connection = new mysqli('localhost','root','','db_etec') ;
    function add_product(){
        global $connection; //make connection as global variable
        if(isset($_POST['btn_add'])){
            $name     = $_POST['_name'];
            $category = $_POST['_category'];
            $price    = $_POST['_price'];
            if(!empty($name) && !empty($price) && !empty($category)){
                $sql_insert = "
                                INSERT INTO `tbproduct` (`name`,`categories`,`price`)
                                VALUES                  ('$name' ,'$category' ,'$price');
                              ";
                $result = $connection -> query($sql_insert);

                if($result){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Data Inserted",
                                    text: "You inserted product",
                                    icon: "success",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
                }
                else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Something went wrong",
                                    text: "Cannot Insert Product",
                                    icon: "error",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
                }
            }
            else{
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Invalid Data Insertion",
                                    text: "All Field Must be Filled ",
                                    icon: "error",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
            }
        }
    }
    add_product();
    function show_product(){
        global $connection;
        $sql_show = "   
                        SELECT * FROM `tbproduct` WHERE `is_deleted` = 0 ORDER BY `id` DESC ;  
                    ";
        $result   = $connection -> query($sql_show);
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['categories'].'</td>
                    <td>'.$row['price'].'</td>
                    <form method="post">
                        <td>
                            <input name="remove_id" type="hidden" value='.$row['id'].'>
                            <button id="open_edit" class="btn btn-outline-warning " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
                            <button name="btn_delete" type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Delete</button>
                        </td>
                    </form>
                </tr>
            ';
        }
        
    }
    function edit_product(){
        global $connection;

        if(isset($_POST['btn_update'])){
            $updated_id = $_POST['_id'];
            $name     = $_POST['_name'];
            $category = $_POST['_category'];
            $price    = $_POST['_price'];

            if(!empty($name) && !empty($price) && !empty($category)){
                $sql_edit = "
                                UPDATE `tbproduct` 
                                SET `name` = '$name' ,`categories` = '$category' , `price`='$price' 
                                WHERE `id` = '$updated_id'
                            ";
                $result   = $connection -> query($sql_edit);

                if($result){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Data Edited",
                                    text: "You edited product",
                                    icon: "success",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
                }
                else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Something went wrong",
                                    text: "Cannot Edit Product",
                                    icon: "error",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
                }
            }
            else{
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Invalid Data Insertion",
                                    text: "All Field Must be Filled ",
                                    icon: "error",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
            }
        }
    }
    edit_product();
    function remove_product(){
        global $connection;
        if(isset($_POST['btn_delete'])){
            $remove_id = $_POST['remove_id'];
            $sql_remove = "
                            UPDATE `tbproduct` 
                            SET `is_deleted` = 1 
                            WHERE `id` = '$remove_id'
                          ";
            $result = $connection -> query($sql_remove);
        }
    }
    remove_product();
    function backup_data(){
        global $connection;
        $sql_backup = "
                        SELECT *FROM `tbproduct` WHERE `is_deleted` = 1;
                    ";
        $result = $connection -> query($sql_backup);
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['categories'].'</td>
                    <td>'.$row['price'].'</td>
                    <form method="post">
                        <td>
                            <input type="hidden" name="restore_id" value='.$row['id'].'>
                            <button type="submit" name="btn_restore" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Restore</button>
                        </td>
                    </form>
                </tr>
                ';
        }
    }
    function restore_data(){
        global $connection;
        if(isset($_POST['btn_restore'])){
            $restore_id = $_POST['restore_id'];
            $sql_resotre = "
                            UPDATE `tbproduct` SET `is_deleted` = 0 WHERE `id` = '$restore_id'
                            ";
            $result = $connection -> query($sql_resotre);
        }
        if($result){
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Data Restored",
                            text: "You restored product",
                            icon: "success",
                            button: "Confirm",
                        });
                    })
                </script>
            ';
        }
    }
    restore_data();
    function empty_data(){
        global $connection;
        if(isset($_POST['btn_empty'])){
            $sql_remove_data = " DELETE FROM `tbproduct` WHERE `is_deleted` = 1";
            $result = $connection -> query($sql_remove_data);
        }
        if($result){
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "All Data Removed",
                            text: "You removed product",
                            icon: "success",
                            button: "Confirm",
                        });
                    })
                </script>
            ';
        }
    }
    empty_data();