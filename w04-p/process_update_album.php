<?php
    $link = mysqli_connect('localhost:3307', 'root', 'mina8244', 'project1');
    settype($_POST['id'], 'integer');
    $filtered = array(
      'id' => mysqli_real_escape_string($link, $_POST['id']),
      'title'=> mysqli_real_escape_string($link, $_POST['title']),
      'date'=> mysqli_real_escape_string($link, $_POST['date'])
    );
    $query = "
        UPDATE album
            SET
                title = '{$filtered['title']}',
                date = '{$filtered['date']}'
            WHERE
                id = '{$filtered['id']}'
    ";

    $result = mysqli_query($link, $query);
    if( $result == false ){
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: album.php');
    }
?>
