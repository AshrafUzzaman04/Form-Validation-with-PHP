<?php
include_once("./header.php");

 $connet=  mysqli_connect("localhost","root","","data_base");


  if(isset($_POST['sub123'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $date_of_birth = $_POST['date_of_birth'];
    
    // user name 
    if(empty($name)){
        $errorName = "<span class='text-danger'>Enter your name.</span>";   
    }elseif(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errorName = "<span class='text-danger'>Invalid Username.</span>";
    }else{
        $correctName = $name;
    }
    
    // email
    if(empty($email)){
        $errorEmail = "<span class='text-danger'>Enter your email address.</span>";   
    }elseif(!filter_var(FILTER_VALIDATE_EMAIL)){
        $errorEmail = "<span class='text-danger'>Invalid email address.</span>";
    }else{
        $correctEmail = $email;
    }

    // password
    if(empty($password)){
        $errorPassword = "<span class='text-danger'>Enter email password.</span>";   
    }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z]).{8,}$/',$password)){
        $errorPassword = "<span class='text-danger'>Enter a strong password.</span>";
    }else{
        $correctPassword = $password;
    }
    
    // city
    if(empty($city)){
        $errorCity = "<span class='text-danger'>Select your town.</span>";   
    }else{
        $correctCity = $city;
    }
    
    // date_of_birth
    if(empty($date_of_birth)){
        $errordate_of_birth = "<span class='text-danger'>Enter your birthday.</span>";   
    }else{
        $correctdate_of_birth = $date_of_birth;
    }
    

    if(!empty($correctName) && !empty($correctEmail)  && !empty($correctPassword) && !empty($gender) && !empty($correctCity) && !empty($correctdate_of_birth)){
        $insert_query = "INSERT INTO `user_data`( `name`, `email`, `password`, `gender`,  `city`,`date_of_birth`) VALUES ('$name','$email','$password' ,'$gender','$city','$date_of_birth')";
        $insert = $connet->query($insert_query);

        if($insert){
            echo "<script>alert('Register Succsessully.');location.href='./read.php?'</script>
";
}


}


}

?>

<div class="container">
    <div class="row min-vh-100">
        <div class="col-11 col-md-5 col-lg-4 m-auto border shadow rounded px-2 px-md-4 pt-2">
            <div class="mb-3">
                <h2 class="text-center text-primary">Register</h2>
            </div>

            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="name" placeholder="User Name"
                        class="form-control <?= isset($errorName) ? "is-invalid" : null ?> <?= isset($correctName) ? "is-valid" : null ?>"
                        value="<?= $correctName ?? null ?>">
                    <?= $errorName ?? null ?>
                </div>
                <div class="mb-3">
                    <input type="text" name="email" placeholder="Email*"
                        class="form-control <?= isset($errorEmail) ? "is-invalid" : null ?> <?= isset($correctEmail) ? "is-valid" : null ?>"
                        value="<?= $correctEmail ?? null ?>">
                    <?= $errorEmail ?? null ?>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password*"
                        class="form-control <?= isset($errorPassword) ? "is-invalid" : null ?> <?= isset($correctPassword) ? "is-valid" : null ?>"
                        value="<?= $correctPassword ?? null ?>">
                    <?= $errorPassword ?? null ?>
                </div>
                <div class="mb-3">
                    Gender :
                    <input type="radio" name="gender" id="male" value="Male" checked>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female">Female</label>
                </div>
                <div class="row">
                    <div class="mb-3 col-8 col-md-5">
                        <span>Your Town :</span>
                        <select name="city" class="form-select <?= isset($errorCity) ? "is-invalid" : null ?>">
                            <option value="">-- Select Area --</option>
                            <option value="Dhaka">Dhaka
                            </option>
                            <option value="Rajsahi">Rajsahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Shylet">Shylet</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Bagura">Bagura</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Lalbag">Lalbag</option>
                            <option value="Narayanganj">Narayanganj</option>
                        </select>
                        <?= $errorCity ?? null ?>
                    </div>
                    <div class="mb-3 col-8 col-md-5">
                        <label for="birthday">Birthday :</label>
                        <input type="date" id="birthday" name="date_of_birth"
                            class="form-control <?= isset($errorName) ? "is-invalid" : null ?> <?= isset($correctName) ? "is-valid" : null ?>"
                            value="<?= $correctdate_of_birth ?? null ?>">
                        <?= $errordate_of_birth ?? null ?>
                    </div>
                </div>

                <div class="mb-4 mt-2 shadow-sm">
                    <input type="submit" name="sub123" class="btn btn-primary col-12" value="Register">
                </div>

            </form>
        </div>
    </div>
</div>



<?php
include_once("./footer.php");
?>