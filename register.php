<?php
include 'header.php';
$form_submission = isset($_POST['form_submission']) ? $_POST['form_submission'] : '';
$errors = array();

if ($form_submission === 'yes') :

    // $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    // $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // if (empty($first_name)) {
    //     $errors[] = 'Empty or invalid First Name!';
    // }

    // if (empty($last_name)) {
    //     $errors[] = 'Empty or invalid Last Name!';
    // }

    if (empty($username)) {
        $errors[] = 'Empty or invalid Username!';
    }

    if (empty($email_address)) {
        $errors[] = 'Empty or invalid Email Address!';
    }

    if (empty($password)) {
        $errors[] = 'Empty or invalid Password!';
    }

    // if(empty($errors)){
    //     $ret = empm_user_registration($first_name, $last_name, $username, $email_address, $password);

    //     if (!is_int($ret)) {
    //         $errors[] = $ret;
    //     } else {
    //         header('Location: login.php');
    //     }
    // }

    if(empty($errors)){
        $ret = empm_user_registration($username, $email_address, $password);

        if (!is_int($ret)) {
            $errors[] = $ret;
        } else {
            header('Location: login.php');
        }
    }

endif;

if (empm_current_user_id()){
    header('Location: index.php');
}

?>

<main class="form-signin text-center mt-5">
    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Create an Account</h1>
        <?php if(count($errors) > 0) : foreach ($errors as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endforeach; endif; ?>
        <!-- <div class="row">
            <div class="col-sm-6">
                <div class="form-floating mb-3">
                    <input name="first_name" type="text" class="form-control" id="first_name" placeholder="john">
                    <label for="first_name">First Name</label>
                </div>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
        </div> -->
        <!-- <div class="form-floating mb-3">
            <input name="first_name" type="text" class="form-control" id="first_name" placeholder="john">
            <label for="first_name">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="smith">
            <label for="last_name">Last Name</label>
        </div> -->
        <div class="form-floating mb-3">
            <input name="username" type="text" class="form-control" id="userName" placeholder="john">
            <label for="userName">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input name="email_address" type="email" class="form-control" id="emailAddress" placeholder="name@example.com">
            <label for="emailAddress">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <input type="hidden" name="form_submission" value="yes">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
        <p class="mt-2 mb-2">Already have an account? <a href="login.php">Login</a> Now</p>
        <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
    </form>
</main>

<?php include 'footer.php'; ?>
