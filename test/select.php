<?php
$conn = mysqli_connect('localhost', 'root', '111111','opentutorials'); #접속정보를 담고 있는 변수

$sql = "SELECT *FROM topic";  #LIMIT데이터를 개수제한
$result = mysqli_query($conn, $sql);

#print_r(mysqli_fetch_array($result));  #데이터를 php에서 사용할 수 있도록 데이터를 변경해 가져옴 ex)배열

while($row =mysqli_fetch_array($result)){
    echo '<h1>'.$row['title'].'</h1>';
    echo $row['description'];  
}

?>