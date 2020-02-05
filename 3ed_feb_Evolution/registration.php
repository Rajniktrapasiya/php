<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <?php
    session_start();
    include_once "validation.php";
    ?>
    <form action="registration.php" method="POST">
        <div class="user-details">
            <h3>REGISTRATION</h3>
            <div name="user-prefix">
                <?php $prifixValue=["Mr","Miss","Ms","Mrs","Dr"];?>
                <label>Prefix</label>
                <select name="user[prefix]">
                    <?php foreach($prifixValue as $key => $value): ?>
                        <option value="<?php echo $value?>"><?php echo $value?>
                    <?php endforeach ?>
                </select>
            </div>
            <div name="user-firstName">
                <?php $firstName = "user[firstName]"?>
                <label>First Name:-</label>
                <input type="text" name="<?php echo $firstName; ?>" value="<?php echo getValue("user","firstName"); ?>" placeholder="First Name">
                <span class="error"><?php echo isset($firstNameErr) ? $firstNameErr : ""; ?></span>
            </div>
            <div name="user-lastName">
                <?php $lastName = "user[lastName]"?>    
                <label>Last Name:-</label>
                <input type="text" name="<?php echo $lastName; ?>" placeholder="Last Name" value="<?php echo getValue("user","lastName"); ?>">
                <span class="error"><?php echo isset($lastNameErr) ? $lastNameErr : ""; ?></span>
            </div>
            <div name="user-email">
                <?php $email = "user[email]"?>    
                <label>Email:-</label>
                <input type="email" name="<?php echo $email; ?>" value="<?php echo getValue("user","email"); ?>">
                <span class="error"><?php echo isset($emailErr) ? $emailErr : ""; ?></span>
            </div>
            <div name="user-phone">
                <?php $phone = "user[phoneNumber]"?>    
                <label>Mobile number:-</label>
                <input type="number" name="<?php echo $phone; ?>" value="<?php echo getValue("user","phoneNumber"); ?>">
                <span class="error"><?php echo isset($phoneErr) ? $phoneErr : ""; ?></span>
            </div>
            <div name="user-password">
                <?php $password = "user[password]"?>    
                <label>PassWord:-</label>
                <input type="password" name="<?php echo $password; ?>" value="<?php echo getValue("user","password"); ?>">
            </div>
            <div name="user-confirmPassword">
                <?php $confirmPassword = "user[confirmPassword]"?>    
                <label>ConfirmPassWord:-</label>
                <input type="password" name="<?php echo $confirmPassword; ?>" value="<?php echo getValue("user","confirmPassword"); ?>">
                <span class="error"><?php echo isset($confirmPassWordErr) ? $confirmPassWordErr : ""; ?></span>
            </div>
            <div name="user-information">
                <label>INFORMATION</label>
                <input type="text" name="user[information]" value="<?php echo getValue("user","information"); ?>" style="height: 30px;">
            </div>
        </div>
        <input type="checkbox" name="user[termCondition]"><label>Heaberly,accept term and condition</label><span><?php echo isset($acceptTermErr) ? $acceptTermErr : ""; ?></span>
        <br>
        <input type="submit" name="registrationPageSubmit" >
    </form>
</body>
</html>