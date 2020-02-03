<html>
<head>
<script>
    function Data(num) {
        console.log("calling");
    }
</script>
</head>

<body>

<?php
session_start();

include_once 'databaseConnection.php';
include_once 'practiceDataCleaning.php';
$conn = openCon();

mysqli_select_db($conn , 'customer_portal');
$q = 'SELECT T.customers_id, T.firstName, T.lastName, T.dateOfBirth, T.phoneNumber, T.email, T.passWord, T.addressLine1, T.addressLine2, T.compunyName, T.cityName, T.state, T.country, T.postalCode, MIN(T.discriptionAboutSelf) AS discriptionAboutSelf, MIN(T.uploadImage) AS uploadImage, MIN(T.uploadCertificate) AS uploadCertificate, MIN(T.howLongInBusiness) AS howLongInBusiness, MIN(T.numberOfClients) AS numberOfClients, MIN(T.getInTouch) AS getInTouch, MIN(T.Hobbies) AS Hobbies FROM ( SELECT A.customers_id, A.firstName, A.lastName, A.dateOfBirth, A.phoneNumber, A.email, A.passWord, B.addressLine1, B.addressLine2, B.compunyName, B.cityName, B.state, B.country, B.postalCode, ( CASE WHEN fieldKey = "discriptionAboutSelf" THEN CA.value END ) discriptionAboutSelf, ( CASE WHEN fieldKey = "uploadImage" THEN CA.value END) uploadImage,(CASE WHEN fieldKey = "uploadCertificate" THEN CA.value END) uploadCertificate,(CASE WHEN fieldKey = "howLongInBusiness" THEN CA.value END)howLongInBusiness,(CASE WHEN fieldKey = "numberOfClients" THEN CA.value END) numberOfClients,(CASE WHEN fieldKey = "getInTouch" THEN CA.value END) getInTouch,(CASE WHEN fieldKey = "Hobbies" THEN CA.value END) Hobbies FROM customers A INNER JOIN customer_address B ON A.customers_id = B.customers_id INNER JOIN customer_additional_info CA ON A.customers_id = CA.customers_id) AS T GROUP BY T.customers_id';
$deleteQuery = "DELETE FROM `customers` WHERE 	customers_id = ";
$result = mysqli_query($conn, $q);
print_r($result);

echo "<pre>";
if(isset($_POST["submit"]) || isset($_POST["delete"])) {
    //echo "----------".$_REQUEST["submit"];
    if(isset($_POST["delete"])) {
        IntregrationData($_REQUEST["delete"]);
        //echo "----------".$_REQUEST["delete"];
    } else {
        IntregrationData($_REQUEST["submit"]);
    }
}

function IntregrationData($num){
    global $result,$conn,$deleteQuery;
    $_SESSION["dataBase"] = "Yes";
    foreach($result as $column => $currentRow) {
        if($column == $num) {
            if(isset($_POST["submit"])) {
                $_SESSION['customers_id'] = $currentRow['customers_id'];
                DataIntigration($currentRow);
            } else {
                $deleteQuery .= $currentRow['customers_id'];
                if(mysqli_query($conn,$deleteQuery)) {
                    echo "Data inserted<br>";
                    
                } else {
                    echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
                }
                header("Location:practiceRetriveData.php");
            }
        }
    }
}

?>

<form method="POST" action="practiceRetriveData.php">
    <?php
        echo "<table style='border: 1px solid black'>";
        // print_r($result);
        if ($row = mysqli_num_rows($result) > 0) {
            // output data of each row
            foreach($result as $column => $currentRow) {
                echo "<tr>";
                foreach($currentRow as $field => $VALUE) {
                    if($column == 0) {
                        echo  "<th style='border: 1px solid black'>".$field."</th>";
                    }
                    if($column == 0 && $field == "Hobbies") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach($currentRow as $field => $VALUE) {
                    echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                }
                echo "<td style='border: 1px solid black'><span>Edit:-<input type='submit' name='submit' value='".$column."'></span><span>Delete:-<input type='submit' name='delete' value='".$column."'></span></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
<div class="database"><a href="practice.php">RETURN</a></div>
</body>