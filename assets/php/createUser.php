<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">
<?php
include_once '../db/database.php';

if (isset($_POST['submit'])) {
    // get user values
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $interests = $_POST['interests'];
    $telephone = $_POST['telephone'];

    // add into user table
    $sql = "INSERT INTO user (`firstName`, `lastName`, `age`, `interests`, `telephone`) 
    VALUES ('$firstName', '$lastName', '$age', '$interests', '$telephone')";
    if (mysqli_query($connection, $sql)) {
        echo '<div class="row justify-content-center" style="display:block; height:300px;">New user has been added successfully!</div>';
        $id = mysqli_insert_id($connection);
        echo '<div class="row text-center"><a href="/assets/php/getVote.php?id=' . $id . '"><input type="button" value="Vote on users"></a></div>';
    } else {
        echo 'Error: ' . $sql . ':-' . mysqli_query($connection, $sql);
    }
    mysqli_close($connection);
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>