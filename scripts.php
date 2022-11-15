<?php
include('database.php');

session_start();

if(isset($_POST['save']))        saveProducts();
if(isset($_POST['login']))        getProducts();
if(isset($_POST['add']))        addProducts();
if(isset($_POST['delete']))        deleteProducts();
if(isset($_POST['openTask']))    getSpecificTask($_POST['openTask']);
if(isset($_POST['update']))      updateProduct();




function saveProducts(){
    $conn = connection();

    $fname = $lname = $email = $password = $pwd = '';

    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = md5($pwd);

    $sql = "INSERT INTO admins (first_name,last_name,email,password) VALUES ('$fname','$lname','$email','$password')";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: log-in.php");
    }
    else
    {
        echo "Error :".$sql;
    }
}


function getProducts(){
    $conn = connection();

    $email = $password = $pwd = '';
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = MD5($pwd);

    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row["id"];
                $email = $row["email"];
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
            }
            header("Location: welcome.php");
        }
        else
        {
            echo "Invalid email or password";
        }

}

function addProducts(){

    $conn = connection();
    //CODE HERE
    $product_name = $_POST['product-name'];
    $product_amount = $_POST['product-amount'];
    $product_date = $_POST['date'];
    $product_price = $_POST['product-price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (`product_name`, `description`, `amount`, `date`, `price`) VALUES ('$product_name','$description','$product_amount','$product_date','$product_price')";
    // $result = mysqli_query($conn, $sql)

    // if($result == true){
    //     echo "data added to your database";
    // }

    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);

    //SQL INSERT
    $_SESSION['message'] = "Task has been added successfully !";
    header('location: welcome.php');
}


function getTasks(){ 
    
    $conn = connection();
    $sql = "SELECT * FROM products";
    
    
    if($result = mysqli_query($conn, $sql)){
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

                echo '
                    <tr style="color: #fff;">
                        <td>
                            <div class="d-flex align-items-center">
                                <img
                                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                    alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"
                                />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">'.$row['product_name'].'</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1 ms-2">'.$row['description'].'</p>
                        </td>
                        <td>
                            <span class="badge badge-success rounded-pill ms-4">'.$row['amount'].'</span>
                        </td>
                        <td class="ms-2">'.$row['date'].'</td>
                        <td class="">'.$row['price'].'</td>
                        <td>
                            <form method="post" action="scripts.php">
                                <button type="button" id="update-btn" onclick="editTask('.$row['id'].')" class="btn bg-success text-white btn-sm btn-rounded mt-2" data-bs-toggle="modal" data-bs-target="#modal-task">
                                     <input type="hidden" name="update-id" value="'.$row['id'].'">
                                     <i class="fa-sharp fa-solid fa-pen-to-square text-white"></i>
                                </button>
                                <button type="submit" name="delete" id="buttonDelete" class="d-none">
                                    <input type="hidden" name="delete-id" value="'.$row['id'].'">
                                </button>
                                <button type="submit" onclick="deleteProduct()" name="delete" class="btn bg-danger text-white btn-sm btn-rounded mt-2 d-none>
                                    <input type="hidden" name="delete-id" value="'.$row['id'].'">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                ';
                
                
            }
            
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "Your dashboard is Empty.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    // Close connection
    mysqli_close($conn);


}

function deleteProducts(){
    $conn = connection();
        $id = $_POST["delete-id"];

        $sql = "DELETE FROM products where id = $id";

        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn);
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: welcome.php');
}


function getSpecificTask($id){
    header('Content-Type: application/json');
    $aResult = [];
    // CODE HERE
    // SQL SELECT
    $conn = connection();

    $sql = "SELECT * FROM products where id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $aResult[0] = $row['product_name'];
                $aResult[1] = $row['amount'];
                $aResult[2] = $row['date'];
                $aResult[3] = $row['price'];
                $aResult[4] = $row['description'];
            }
            // Free result set
            mysqli_free_result($result);
        }
    }

    // Close connection
    mysqli_close($conn);
    echo json_encode($aResult);
}


function updateProduct(){
    //CODE HERE
    //SQL UPDATE
    $conn = connection();
    //CODE HERE
    $update_id = $_POST['product-id'];
    $product_name = $_POST['product-name'];
    $product_amount = $_POST['product-amount'];
    $product_date = $_POST['date'];
    $product_price = $_POST['product-price'];
    $description = $_POST['description'];

    $sql = "UPDATE products  SET `product_name`='$product_name', `amount`='$product_amount', `date`='$product_date', `price`='$product_price', `description`='$description' WHERE id = '$update_id'";

    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);


    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: welcome.php');
}


?>