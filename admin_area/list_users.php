<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
</head>

<body>
    <h3 class="text-center text-success">All Users</h3>
    <div class='table-responsive'>
        <table class="table table-bordered mt-5">
            <thead class="bg-primary text-center">
                <?php
                $get_user = "Select * from user_table";
                $result = mysqli_query($con, $get_user);
                $row_count = mysqli_num_rows($result);

                if ($row_count == 0) {
                    echo "<h2 class='text-center bg-warning text-danger text-center mt-5'>No users yet</h2>";
                } else {
                    echo "<tr>
                
                <th>SN</th>
                 <th>User_id</th>
                <th>Username</th>
                <th>User email</th>
                <th>User address</th>
                <th>User mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center bg-secondary text-light'>";
                    $number = 0;
                    while ($row_data = mysqli_fetch_assoc($result)) {
                        $user_id = $row_data['user_id'];
                        $username = $row_data['username'];

                        $user_email = $row_data['user_email'];
                        $user_address = $row_data['user_address'];
                        $user_mobile = $row_data['user_mobile'];


                        $number++;
                        echo " <tr>
                <td>$number</td>
               <td> $user_id</td> 
               <td> $username</td> 
                <td>  $user_email</td>
                
                <td> $user_address </td>
                <td>$user_mobile</td>
                <td><a href='index.php?delete_users=<?php echo $user_id ?>' type='button' class=' text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a> </td>";
                    }
                }

                ?>


                </tbody>
        </table>
        <!-- <td> $user_id</td> -->
        <!-- <th>Userid</th> -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4>Are you sure want to delete this</h4>
                    </div>
                    <!-- ? halnu aagadi jastai ?view_brand -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"><a href="./index.php?delete_users=<?php echo $user_id ?>" class="text-light text_decoration-none">Yes</a></button>
                        <button type="button" class="btn btn-primary"><a href="./index.php" class="text-light text_decoration-none">No</a></button>

                    </div>
                </div>
            </div>
        </div>
</body>

</html>