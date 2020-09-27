<?php
    $link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'project1');

    $filtered = array(
        'title' => mysqli_real_escape_string($link, $_POST['title']),
        'date'=> mysqli_real_escape_string($link, $_POST['date'])
    );
    $query = "
        INSERT INTO album
            (title, date)
            VALUES(
                '{$filtered['title']}',
                '{$filtered['date']}'
            )
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: album.php');
    }
?>
