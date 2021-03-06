<?php
    include_once('inc/user.inc.php');
    include_once('layout/header.php');

    if (isset($_GET['success']) && $_GET['success']!='') {
    ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
        </div>
    <?php   
    }

?>


<?php
$fnameErr = $lnameErr = $emailErr = $statusErr = $addressErr = "";
$fname = $lname = $email = $status = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "lname is required";
  } else {
    $lname = test_input($_POST["lname"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
 
  if (empty($_POST["status"])) {
    $statusErr = "status is required";
  } else {
    $status = test_input($_POST["status"]);
  }

     
  if (empty($_POST["address"])) {
    $addressErr = " address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

}

function test_input($datas) {
  $datas = trim($datas);
  $datas = stripslashes($datas);
  return $datas;
}
?>


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add New User
    <a class="btn btn-primary float-right" href="user.php">Back</a>
</h1>

<form action="<?php site_url("add_edit_user.php"); ?>" method="post">
    <div class="row">
        <!-- Fields -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    User Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name*</label>
                            <h5 style="color:firebrick;"><?php echo $fnameErr;?></h5>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo (isset($result['first_name']) && $result['first_name']!='' ? $result['first_name'] : '') ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name*</label>
                            <h5 style="color:firebrick;"><?php echo $lnameErr;?></h5>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo (isset($result['last_name']) && $result['last_name']!='' ? $result['last_name'] : '') ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email*</label>
                            <h5 style="color:firebrick;"><?php echo $emailErr;?></h5>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($result['email']) && $result['email']!='' ? $result['email'] : '') ?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo (isset($result['phone_number']) && $result['phone_number']!='' ? $result['phone_number'] : '') ?>">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo (isset($result['age']) && $result['age']!='' ? $result['age'] : '') ?>">
                            </div>
                            <div>
                                <label class="w-100">Status</label>
                                <h5 style="color:firebrick;"><?php echo $statusErr;?></h5>
                                <div class="form-check form-check-inline">
                                    <input <?php echo (isset($result['status']) && $result['status']==1 ? "checked=checked" : '') ?>class="form-check-input" type="radio" name="status" id="status_1" value="1">
                                    <label class="form-check-label" for="status_1">Enable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input <?php echo (isset($result['status']) && $result['status']==0 ? "checked=checked" : '') ?> class="form-check-input" type="radio" name="status" id="status_0" value="0">
                                    <label class="form-check-label" for="status_0">Disable</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="address">Address</label>
                            <h5 style="color:firebrick;"><?php echo $addressErr;?></h5>
                            <textarea name="address" id="address" rows="4" class="form-control"><?php echo (isset($result['address']) && $result['address']!='' ? $result['address'] : '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EOF Fields -->
        <!-- Action -->
        <div class="col-md-3">
        <div class="card">
                <div class="card-header">
                    Action
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                    <button type="reset" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <!-- EOF Action -->
    </div>
    
    <input type="hidden" name="action" value="<?php echo (isset($_GET['action']) && $_GET['action']=="add") ? "add" : "edit" ?>">
</form>

<?php
    include_once('layout/footer.php');
?>



