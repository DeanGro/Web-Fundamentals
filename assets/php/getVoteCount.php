<?php
    // get total votes
    $sql = 'SELECT count(votedHouseId) as votes FROM vote
    WHERE vote.votedUserId = '.$toVoteUserId.'';
    $result = $connection->query($sql);
    $totalVotes = $result->fetch_assoc()['votes'];
    echo '<script>houseVotes["total"] = '.$totalVotes.'</script>';
    // get count of votes for each house
    $sql = 'SELECT votedHouseId, count(votedHouseId) as votes FROM vote
    LEFT JOIN votes ON vote.id = votes.voteId
    WHERE vote.VoteduserId = '.$toVoteUserId.'
    GROUP by votedHouseId';
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($totalVotes) {
                $percentage = $row['votes']/$totalVotes*100;
            } else {
                $percentage = 25;
            }
            echo '<script>houseVotes["'.$row['votedHouseId'].'"] = '.$row['votes'].'</script>';
            ?>
            <script>
                updateFields();
            </script>
            <?php
        }
    } else {
        echo 'no votes on this user';
    }
?>