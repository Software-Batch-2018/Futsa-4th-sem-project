<?php 
   session_start();
   require '../../database/db.php';
?>

<?php 
if(isset($_POST['register'])){

    $name = $_POST['fullName'];
    $password =md5($_POST['password']);
    $email = $_POST['email'];
    $add = $_POST['address'];
    $phone = $_POST['phonenum'];
    $futsalName = $_POST['futsalname'];
    $file =$_FILES['image'];

   //print_r($file);
   $filename = $file['name'];
   $filepath = $file['tmp_name'];
   $fileerror = $file['error'];
   if($fileerror == 0 ){
       $destfile = '/futsa/upload/'.$filename;
        move_uploaded_file($filepath , $destfile);


     $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
     $result = mysqli_query($conn, $user_check_query);
     $user = mysqli_fetch_assoc($result);
     
     //if user doesn't exists
     if(!$user){
        $query = "INSERT INTO user Values ('','$name' , '$email' , '$password' ,  '$add' , '$phone', 'owner')";
        $result = mysqli_query($conn , $query);
        if($result){
            $query2 = "INSERT INTO futsal Values ('','$futsalName' , '$name' , '$add' ,  '$phone' , '$destfile')";
            $result2 = mysqli_query($conn , $query2);
            $_SESSION['success'] = 'Your account is created.';
            header('Location: /futsa/login/userLogin/userLoginView.php');
        }
     } else {
         
         echo('Email already exists');
     }

   }
}   
?>