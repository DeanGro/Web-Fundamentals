<html>
<head>
    <script src='../js/script.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<?php
include_once '../db/database.php';
$activeUserId = $_GET['id'];
$votedUsers = [];
$votedUsers[] = $activeUserId;
$returnedUser = false;

// get all votes from active user
$sql = 'SELECT * FROM user
JOIN votes ON user.id = votes.userId
JOIN vote ON votes.voteId = vote.id
WHERE user.id = ' . $activeUserId. '';
$result = $connection->query($sql);

// store voted users in array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $votedUsers[] = $row['votedUserId'];
    }
}

// get first voted user
$sql = 'SELECT * FROM user
WHERE user.id NOT IN (' . implode(", ", $votedUsers) . ')
LIMIT 1';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    // get information from user and display on page
    $row = $result->fetch_assoc();
    $toVoteUserId = $row['id'];
    ?>
        <div class="user"><?php echo $row['firstName'] ?></div>
        <div class="user"><?php echo $row['lastName'] ?></div>
        <div class="user"><?php echo $row['age'] ?></div>
    <?php
    $returnedUser = true;
} else {
    echo 'you have voted on all users';
}

if ($returnedUser) {
    include_once 'updateVote.php';
}

$connection->close();
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>