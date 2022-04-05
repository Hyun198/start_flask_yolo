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
$update_link ='';
$delete_link ='';
if(isset($_GET['id'])) {
$sql= "SELECT *FROM topic WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article['title'] = $row['title'];
$article['description'] = $row['description'];

$update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
$delete_link = '
    <form action="process_delete.php" method ="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
    </form>
    
    ';

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
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>

</body>
</html>