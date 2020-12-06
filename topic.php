<?php
//topic.php
include 'connect.php';
include 'header.php';

//first select the topic based on $_GET['topic_id']
$sql = "SELECT
        topic_id,
        topic_subject
        FROM
        topics
        WHERE
        topics.topic_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'The topic could not be displayed, please try again later.' . mysqli_error($conn);
} else {
    if (mysqli_num_rows($result) == 0) {
        echo 'This topic does not exist.';
    } else {
        //display category data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<h2 class="posts">' . $row['topic_subject'] . ' </h2>';
        }

        //do a query for the posts
        $sql = "SELECT
                posts.post_id,
                posts.post_topic,
                posts.post_content,
                posts.post_date,
                posts.post_by,
                users.user_id,
                users.user_name
                FROM
                posts
                LEFT JOIN
                users
                ON
                posts.post_by = users.user_id
                WHERE
                posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['id']);

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo 'The topic could not be displayed, please try again later.';
        } else {
            if (mysqli_num_rows($result) == 0) {
                echo 'This topic is empty.';
            } else {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Post</th>
                        <th>Date and user name</th>
                      </tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo $row['post_content'];
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo $row['user_name'];
                    echo "\n";
                    echo '<br>';
                    echo date('d-m-Y H:i:s', strtotime($row['post_date']));
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';

                //echo $_SERVER['QUERY_STRING'];

                echo '<p class="posts">Give information about this topic</p>
                <br><form method="post" action="reply.php?' . $_SERVER['QUERY_STRING'] . '">
                    <textarea name="reply-content" rows="10" cols="50" required></textarea><br>
                    <input class="myButton" type="submit" value="Submit"/>
                </form>';
            }
        }
    }
}
echo '</div>
</div>
<div id="wrapper">
    <div id="footer">
        <p>Created for IT321-S01-2020.1 Cloud Computing Project By Başar Ballıöz, Aykut Güler, Şeyma Yıldız</p>
    </div>
</div>
</body>

</html>';
