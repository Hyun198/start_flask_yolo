<?php
$conn = mysqli_connect('localhost', 'root', '111111','opentutorials'); #접속정보를 담고 있는 변수
$sql = "SELECT *FROM topic";
$result=mysqli_query($conn,$sql);
$list='';
while($row= mysqli_fetch_array($result)){
    //<li><a href=\"index.php?id=\"></a></li>
    $list= $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}
$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);

?>
<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>WEB</title>
    </head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
            <?=$list?>
    </ol>
    <form action="process_create.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p><input type="text" name="author" placeholder="author"></p>
    <input type="submit" value="쓰기">
    </form>
</body>
</html>