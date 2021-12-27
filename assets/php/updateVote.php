<?php
// get total votes
$sql = 'SELECT count(votedHouseId) as votes FROM vote
WHERE vote.votedUserId = '.$toVoteUserId.'';
$result = $connection->query($sql);
$totalVotes = $result->fetch_assoc()['votes'];

// get votes on each house for first voted user
$sql = 'SELECT house.id, house.name, count(votedHouseId) as votes FROM house
LEFT JOIN vote ON vote.votedHouseId = house.id
GROUP BY house.name, house.id';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo '<div class="votes text-center">';
    while ($row = $result->fetch_assoc()) {
        if ($totalVotes) {
            $percentage = $row['votes']/$totalVotes*100;
        } else {
            $percentage = 25;
        }
        echo '<script>houseInfo.push({ id: '.$row['id'].', name: "'.$row['name'].'" });</script>';
        echo '<form name="updateVote" action="" method="post">';
        echo '<input type="text" name="id" value="' . $row['id'] . '" hidden="true">'; 
        echo '<input type="submit" name="updateVote" id="' . $row['id'] . '"
        value="This is a ' . $row['name'] . '!">';
        echo '</form>';
    }
    echo '</div>';
}

if (isset($_POST['updateVote'])) {
    $sql = 'INSERT INTO vote (`votedUserId`, `votedHouseId`) VALUES ('. $toVoteUserId . ', ' . $_POST["id"] . ')';
    if (mysqli_query($connection, $sql)) {
        $voteId = mysqli_insert_id($connection);
        echo '<a href="/assets/php/getVote.php?id=' . $activeUserId . '">Vote on next user</a>';

        $sql = 'INSERT INTO votes (`voteId`, `userId`) VALUES (' . $voteId . ', ' . $activeUserId . ')';
        if (mysqli_query($connection, $sql)) {
            include_once 'getVoteCount.php';
        } else {
            echo 'Error: ' . $sql . ':-' . mysqli_query($connection, $sql);
        }
    } else {
        echo 'Error: ' . $sql . ':-' . mysqli_query($connection, $sql);
    }
}
?>