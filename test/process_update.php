<?php
$conn = mysqli_connect('localhost', 'root', '111111','opentutorials'); #접속정보를 담고 있는 변수

settype($_POST['id'], 'integer'); #반드시 정수가 된다.
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author'=>mysqli_real_escape_string($conn, $_POST['author'])
);
    $sql= "
        UPDATE topic 
        SET 
            title= '{$filtered['title']}',
            description= '{$filtered['description']}',
            author= '{$filtered['author']}'
        WHERE
            id = {$filtered['id']}
    ";
        
        
    

$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn)); #아파치 에러로그에 기록
} else {
    echo "성공했습니다. <a href='index.php'>돌아가기</a>";
}
?>