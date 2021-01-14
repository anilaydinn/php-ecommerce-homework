<?php include 'header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="index.php">Home</a> &rsaquo; Register</div>
                            <div class="bigtitle">Register</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="./admin/manage/funcs.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Personal Details</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" name="user_name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="user_surname" class="form-control" id="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" name="user_email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="phone" name="user_phone" class="form-control" id="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="title-bg">
                    <div class="title">Account Details</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" name="user_username" class="form-control" id="username-2" placeholder="Username">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="user_passwordone" class="form-control" id="pass" placeholder="Password">
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" name="user_passwordtwo" class="form-control" id="conpass" placeholder="Confirm Password">
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
                <button class="btn btn-default btn-red" type="submit" name="registeruser">Register</button>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Your address</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="user_address" id="address" placeholder="Address">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>

<?php include 'footer.php' ?>