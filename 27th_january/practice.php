<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link href="practice.css" rel="stylesheet">
    <script>
        function displayAria(){
            var checkBox = document.getElementById("checkBox");
            var content = document.getElementById("account-otherInformation");

            if(checkBox.checked == true) {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <?php session_start();?>
    <?php include_once 'practiceMain.php'; ?>
    <pre>
        <?php
            // print_r($_POST);
            // print_r($_SESSION);
        ?>
    </pre>
    <form action="practice.php" method="POST">
        <div class="account-details">
            <h3>YOUR ACCOUNT DETAILS</h3>
            <div name="account-prefix">
                <?php $prifixValue=["Mr","Miss","Ms","Mrs","Dr"];?>
                <label>Prefix</label>
                <select name="account[prefix]">
                    <?php foreach($prifixValue as $key => $value): ?>
                        <option value="<?php echo $value?>" <?php echo getValue("account","prefix")==$value ? "SELECTED" : ""; ?>><?php echo $value?>
                    <?php endforeach ?>
                </select>
            </div>
            <div name="account-firstName">
                <?php $firstName = "account[firstName]"?>
                <label>Enter First Name:-</label>
                <input type="text" name="<?php echo $firstName; ?>" value="<?php echo getValue("account","firstName"); ?>" placeholder="First Name">
                <span class="error">*<?php echo $firstNameErr ?></span>
            </div>
            <div name="account-lastName">
                <?php $lastName = "account[lastName]"?>    
                <label>Enter Last Name:-</label>
                <input type="text" name="<?php echo $lastName; ?>" placeholder="Last Name" value="<?php echo getValue("account","lastName"); ?>">
                <span class="error">*<?php echo $lastNameErr ?></span>
            </div>
            <div name="account-dateOfBirth">
                <?php $dateOfBirth = "account[dateOfBirth]"?>    
                <label>Enter Date Of Birth:-</label>
                <input type="date" name="<?php echo $dateOfBirth; ?>" value="<?php echo getValue("account","dateOfBirth"); ?>">
            </div>
            <div name="account-phone">
                <?php $phone = "account[phoneNumber]"?>    
                <label>Enter phone number:-</label>
                <input type="number" name="<?php echo $phone; ?>" value="<?php echo getValue("account","phone"); ?>">
                <span class="error">*<?php echo $phoneErr ?></span>
            </div>
            <div name="account-email">
                <?php $email = "account[email]"?>    
                <label>Enter Email:-</label>
                <input type="email" name="<?php echo $email; ?>" value="<?php echo getValue("account","email"); ?>">
                <span class="error">*<?php echo $emailErr ?></span>
            </div>
            <div name="account-password">
                <?php $password = "account[password]"?>    
                <label>Enter Pass Word:-</label>
                <input type="password" name="<?php echo $password; ?>" value="<?php echo getValue("account","password"); ?>">
            </div>
            <div name="account-confirmPassword">
                <?php $confirmPassword = "account[confirmPassword]"?>    
                <label>Enter Confirm Pass Word:-</label>
                <input type="password" name="<?php echo $confirmPassword; ?>" value="<?php echo getValue("account","confirmPassword"); ?>">
                <span class="error"><?php echo $confirmPassWordErr ?></span>
            </div>
        </div>
        <div class="account-addressInformation">
            <h3>ADDRESS INFORMATION</h3>
            <div name="account-addressLine1">
                <?php $addressLine1 = "account_address[addressLine1]"?>    
                <label>Enter AddressLine 1:-</label>
                <input type="text" name="<?php echo $addressLine1; ?>" value="<?php echo getValue("account_address","addressLine1"); ?>">
                <span class="error">*<?php echo $add1Err ?></span>
            </div>
            <div name="account-addressLine2">
                <?php $addressLine2 = "account_address[addressLine2]"?>    
                <label>Enter AddressLine 2:-</label>
                <input type="text" name="<?php echo $addressLine2; ?>" value="<?php echo getValue("account_address","addressLine2"); ?>">
                <span class="error">*<?php echo $add2Err ?></span>
            </div>
            <div name="account-compunyName">
                <?php $compunyName = "account_address[compunyName]"?>    
                <label>Enter Compuny Name:-</label>
                <input type="text" name="<?php echo $compunyName; ?>" value="<?php echo getValue("account_address","compunyName"); ?>">
            </div>
            <div name="account-cityName">
                <?php $cityName = "account_address[cityName]"?>    
                <label>Enter City Name:-</label>
                <input type="text" name="<?php echo $cityName; ?>" value="<?php echo getValue("account_address","cityName"); ?>">
            </div>
            <div name="account-state">
                <?php $state = "account_address[state]"?>    
                <label>Enter State:-</label>
                <input type="text" name="<?php echo $state; ?>" value="<?php echo getValue("account_address","state"); ?>">
            </div>
            <div name="account-country">
                <?php $country=["India","Canada","Us","Uk","Rasia"];?>
                <label>Choose Country :-</label>
                <select name="account_address[country]">
                    <?php foreach($country as $key => $value): ?>
                        <option value="<?php echo $value?>" <?php echo getValue("account_address","country")==$value ? "SELECTED" : ""; ?> ><?php echo $value?>
                    <?php endforeach ?>
                </select>
                <span class="error">*<?php echo $contryErr ?></span>
            </div>
            <div name="account-postalCode">
                <?php $postalCode = "account_address[postalCode]"?>    
                <label>Enter Postal Code:-</label>
                <input type="number" name="<?php echo $postalCode; ?>" value="<?php echo getValue("account_address","postalCode"); ?>">
                <span class="error">*<?php echo $postalcodeErr ?></span>
            </div>
        </div>
        <label>OTHER INFORMATION<input type="checkbox" id="checkBox" value="" onclick="displayAria()"></label>
        <div class="account-otherInformation" id="account-otherInformation">
            <h3>OTHER INFORMATION</h3>
            <div name="account-discriptionAboutSelf">
                <?php $discriptionAboutSelf = "account_additional_info[discriptionAboutSelf]"?>    
                <label>Discription About Self:-</label>
                <textarea rows="5" cols="50" name="<?php echo $discriptionAboutSelf; ?>"><?php echo getValue("account_additional_info","discriptionAboutSelf");?></textarea>
            </div>
            <div name="account-uploadImage">
                <?php $uploadImage = "account_additional_info[uploadImage]"?>    
                <label>Upload Profile Image:-</label>
                <input type="file" name="<?php echo $uploadImage; ?>">
            </div>
            <div name="account-uploadCertificate">
                <?php $uploadCertificate = "account_additional_info[uploadCertificate]"?>    
                <label>Upload Profile Image:-</label>
                <input type="file" name="<?php echo $uploadCertificate; ?>">
            </div>
            <div name="account-howLongInBusiness">
                <?php $howLongInBusiness=["under1Year","1-2Year","2-5Year","5-10Year","over10Year"];?>
                <label>How long have you been in business? :-</label>
                    <?php foreach($howLongInBusiness as $key => $value): ?>
                        <br><input type="radio" name="account_additional_info[howLongInBusiness]" value="<?php echo $value?>" <?php echo getValue("account_additional_info","howLongInBusiness")==$value ? "CHECKED" : ""; ?> ><?php echo $value;?>
                    <?php endforeach ?>
            </div>
            <div name="account-numbersOfClients">
                <?php $numbersOfClients=["1-5","6-10","11-15","15+"];?>
                <label>Number of unique clients you see each week?  :-</label>
                    <select name="account_additional_info[numberOfClients]">
                    <?php foreach($numbersOfClients as $key => $value): ?>
                        <option value="<?php echo $value;?>" <?php echo getValue("account_additional_info","numberOfClients")==$value ? "SELECTED" : ""; ?> ><?php echo $value;?>
                    <?php endforeach ?>
                    </select>
                    <br>
            </div>
            <div name="account-getInTouch">
                <?php $getInTouch=["post","email","sms","phone"];?>
                
                <label>How do you like us to get in touch with you? :-</label>
                    <br>
                    <?php foreach($getInTouch as $key => $value): ?>
                        <?php $arr = !empty(array_intersect(getValue("account_additional_info","getInTouch",[]),[$value])) ? "CHECKED" : "";?>
                        <input type="checkbox" name="account_additional_info[getInTouch][]" value="<?php echo $value;?>" <?php echo $arr;?>><?php echo $value;?><br>
                    <?php endforeach ?>
            </div>
            <div name="account-Hobbies">
                <?php $hobbies=["music","travelling","blogging","art"];?>
                <label>Hobbies :-</label>
                    <select class="hobbies" name="account_additional_info[Hobbies][]" multiple>
                    <?php foreach($hobbies as $key => $value): ?>
                        <?php $arr = !empty(array_intersect(getValue("account_additional_info","Hobbies",[]),[$value])) ? "SELECTED" : "";?>
                        <option value="<?php echo $value;?>" <?php echo $arr;?>><?php echo $value;?></option>
                    <?php endforeach ?>
                    </select>
            </div>
        </div>
        <br>    
        <input type="submit" name="form[submit]" value="submit">
    </form>
    <div class="database"><a href="practiceRetriveData.php">DATABASE</a></div>
</body>
</html>