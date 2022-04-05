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

if(isset($_GET['id'])){
$sql= "SELECT *FROM topic WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article['title'] = $row['title'];
$article['description'] = $row['description'];
$article['author'] = $row['author'];
}

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
    <form action="process_update.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
    <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
    <p><input type="text" name="author" placeholder="author" value="<?=$article['author']?>"></p>
    <input type="submit" value="쓰기">
    </form>
</body>
</html>