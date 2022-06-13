<?php
$connect = mysqli_connect("127.0.0.1","36128270_debuschan","Kanesadebil1","36128270_debuschan");
mysqli_query($connect, "SET CHARSET utf8");
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
if (isset($_POST['submit'])){
    $author = $_POST['author'];
    $section = $_POST['section'];
    $content = $_POST['content'];
    $title = $_POST['title'];
    if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name']))  {
        $imgname = $_FILES['image']['name'];
        $extension = pathinfo($imgname, PATHINFO_EXTENSION);
        $queryimg = "SELECT MAX(id) FROM posts";
        $queryimg2 = mysqli_query($connect, $queryimg);
        $result = mysqli_fetch_row($queryimg2);
        $result2 = intval($result[0]) + 1;
        $rename = $result2 . '.' . $extension;
        $filename = $_FILES['image']['tmp_name'];
        move_uploaded_file($filename, 'images/' . $rename);
        $query = "INSERT INTO posts (author,title,content,section,time,image) VALUES ('$author','$title','$content','$section',CURRENT_TIME(),'$rename')";
        $connect->query($query);
    }
    else{
        $query = "INSERT INTO posts (author,title,content,section,time) VALUES ('$author','$title','$content','$section',CURRENT_TIME())";
        $connect->query($query);
    }

header("location: index.php");
}
?>

<html lang="PL">

<head>
    <meta charset="UTF-8">
    <title>debuschan</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
    <script type="text/javascript" src="js.js"></script>
</head>

<body>
<a href="index.php">
<img src="logo.png" class="logo">
</a>
<div class="sections">
    <a href="index.php">All</a><br>
    <a href="index.php?id=disc">Discussion</a><br>
    <a href="index.php?id=movies">Movies</a><br>
    <a href="index.php?id=gaming">Gaming</a><br>
    <a href="index.php?id=memes">Memes</a><br>
    <a href="index.php?id=politics">Politics</a><br>
    <a href="index.php?id=sport">Sport</a><br>
    <a href="index.php?id=animals">Animals</a><br>
    <a href="index.php?id=news">News</a><br>
    <a href="index.php?id=cooking">Cooking</a><br>
    <a href="index.php?id=cars">Cars</a><br>
    <a href="index.php?id=travel">Travel</a><br>
    <a href="index.php?id=beauty">Beauty</a>
</div>
<?php
if (isset($_GET['id'])) {
    $CURRENT_SECTION = $_GET['id'];
}
?>
<div class="css">

    <div class="form">
<form method="post" action="index.php" name="posts" id="posts" enctype="multipart/form-data"><br>
    <label for="author">Author</label><br>
    <input name="author" required maxlength="30"><br><br>
    <label for="title">Title</label><br>
    <input name="title" required maxlength="50"><br><br>
    <label for="content">Content</label><br>
    <textarea maxlength="1000" name="content" rows="5" cols="30" form="posts" required> </textarea><br><br>
    <input name="image" type="file" accept="image/png, image/jpeg, image/jpg, image/gif" class="fileinput"><br><br>
    <select name="section" class="select">
        <option value="disc">Discussion</option>
        <option value="movies">Movies</option>
        <option value="gaming">Gaming</option>
        <option value="memes">Memes</option>
        <option value="politics">Politics</option>
        <option value="sport">Sport</option>
        <option value="animals">Animals</option>
        <option value="news">News</option>
        <option value="cooking">Cooking</option>
        <option value="cars">Cars</option>
        <option value="travel">Travel</option>
        <option value="beauty">Beauty</option>
    </select>
    <input name="submit" type="submit" value="Post" class="submit">
</form>
    </div>

<div class="posts">
    <?php
    if (isset($_GET['id'])){
        $postquery = "SELECT * FROM posts WHERE section='$CURRENT_SECTION' ORDER BY id DESC";
    }
    else{
    $postquery = "SELECT * FROM posts ORDER BY id DESC";
    }
    $resultofquery = mysqli_query($connect, $postquery);
    if(mysqli_num_rows($resultofquery)>0){
        while($r = mysqli_fetch_assoc($resultofquery)) {
            $comment_counter = "SELECT COUNT(id_posts) FROM comments WHERE id_posts='$r[id]'";
            $comment_counter_query = mysqli_query($connect, $comment_counter);
            $result = mysqli_fetch_row($comment_counter_query);
            if($r['image'] == NULL){

                echo "   
                    <div class='emptycontainer'>
                    <p> 
                        <a class='author'>$r[author]</a> 
                        <a> $r[time]</a> 
                        <a class='section'>at $r[section]</a> 
                        <img class='downvote' src='vote.png'> 
                        <img class='upvote' src='vote.png'> 
                        <a class='vote'>$r[vote]</a>
                    </p>
                    <div class='emptypost_content'>
                    <p>
                        <a class='title'>$r[title]</a>
                    </p>
                    <a class='content'>$r[content]</a>
                    </div>
                    <a class='comment_link' href='post.php?id=$r[id]'> $result[0] Comments </a>
                    </div>
                ";

            }
            else{
                echo "   
                    <div class='container'>
                    <p> 
                        <a class='author'>$r[author]</a> 
                        <a> $r[time]</a> 
                        <a class='section'>at $r[section]</a> 
                        <img class='downvote' src='vote.png'> 
                        <img class='upvote' src='vote.png'> 
                        <a class='vote'>$r[vote]</a>
                    </p>
                    <a href='/images/$r[image]'>
                    <img src='/images/$r[image]' alt='no image' class='image'>
                    </a>
                    <div class='post_content'>
                    <p>
                        <a class='title'>$r[title]</a>
                    </p>
                    
                    <a class='content'>$r[content]</a>
                    </div>
                    <a class='comment_link' href='post.php?id=$r[id]'> $result[0] Comments </a>
                    </div>
                ";
            }
            }
        }

    ?>
</div>
<br>
</div>

</body>