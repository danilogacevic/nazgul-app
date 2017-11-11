<?php require_once "includes/header.php";?>



<?php 

//session_destroy();

    if($session -> is_signed_in()){
        
        redirect("form.php");
        
    }

    if(isset($_POST['create'])){
        
       
        $password = trim($_POST['password']);
    
    

// Metod to check database user
        
    $user_found = User::verify_user($password);


        if($user_found){

            $session -> login($user_found);
            redirect("form.php");
        } else {

            $message = "Your password or username is incorrect";


        }
        
        
    } else if(isset($_POST['view'])) {

            $password = trim($_POST['password']);
            $user_found = User::verify_user($password);


        if($user_found){

            $session -> login($user_found);
            redirect("admin/view_creatures.php");
        } else {

            $message = "Your password or username is incorrect";


        }



    }

    else {
        
        $username = "";
        $password = "";
        $message  = "";
        
    }


?>

<div class="col-md-4 col-md-offset-4">
   
   <h4 class="bg-danger"><?php echo $session->message; ?></h4>
   <h4 class="bg-danger"><?php echo $message; ?></h4>
    
    <form action="" id="login-id" method="post">
        
 
        
        <div class="form-group">
            
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
            
        </div>
        
        <div class="form-group">
           
            <input type="submit" class="btn btn-primary" name="create" value="Create creature">
            <input type="submit" class="btn btn-primary" name="view" value="View creatures">
            
        </div>
        
        
    </form>
    
</div>



