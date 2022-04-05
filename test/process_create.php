<?php
$conn = mysqli_connect('localhost', 'root', '111111','opentutorials'); #접속정보를 담고 있는 변수

    $sql= "
        INSERT INTO topic (title, description, author, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['description']}',
            '{$_POST['author']}',
            NOW()
        )
    ";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn)); #아파치 에러로그에 기록
}
echo $sql;
?>