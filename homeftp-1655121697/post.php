<?php
if (isset($_GET['id'])) {
    $CURRENT_POST = $_GET['id'];
}
$connect = mysqli_connect("127.0.0.1","36128270_debuschan","Kanesadebil1","36128270_debuschan");
mysqli_query($connect, "SET CHARSET utf8");
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
if (isset($_POST['submit'])){
    $author = $_POST['author'];
    $content = $_POST['comment'];
    $query = "INSERT INTO comments (author_com,content_com,time_com,id_posts) VALUES ('$author','$content',CURRENT_TIME(),'$CURRENT_POST')";
    $connect->query($query);
    header("location: post.php?id=$CURRENT_POST");
}
?>

<html lang="PL">

<head>
    <meta charset="UTF-8">
    <title>debuschan</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
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
<div class="css">

    <div class="form">
        <form method="post" action="<?php echo"post.php?id=$CURRENT_POST"?>" name="posts" id="posts"><br>
            <label for="author">Author</label><br>
            <input name="author" required maxlength="30"><br><br>
            <label for="comment">Comment</label><br>
            <textarea maxlength="250" name="comment" rows="5" cols="30" form="posts" required> </textarea><br><br>


            <input name="submit" type="submit" value="Post" class="submit">
        </form>
    </div>

    <div class="posts">
        <?php
        if (isset($_GET['id'])){
            $postquery = "SELECT * FROM posts WHERE id='$CURRENT_POST'";
        }
        $resultofquery = mysqli_query($connect, $postquery);
        if(mysqli_num_rows($resultofquery)>0){
            $r = mysqli_fetch_assoc($resultofquery);
        if($r['image'] == NULL) {
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
                    
                    <img src='/images/$r[image]' alt='no image' class='image'>
                    <div class='post_content'>
                    <p>
                        <a class='title'>$r[title]</a>
                    </p>
                    
                    <a class='content'>$r[content]</a>
                    </div>
                    </div>
        ";
        }
        }
        ?>
        <a class="header_com">Comments</a>
        <?php
        if (isset($_GET['id'])){
            $postquery = "SELECT * FROM comments WHERE id_posts='$CURRENT_POST' ORDER BY id DESC";
        }
        $resultofquery = mysqli_query($connect, $postquery);
        if(mysqli_num_rows($resultofquery)>0){
            while($r = mysqli_fetch_assoc($resultofquery)) {

                echo"   
                    <div class='emptycontainer'>
                    <p> 
                        <a class='author'>$r[author_com]</a> 
                        <a> $r[time_com]</a> 
                        <img class='downvote' src='vote.png'> 
                        <img class='upvote' src='vote.png'> 
                        <a class='vote'>$r[vote_com]</a>
                    </p>
                    <a class='content_com'>$r[content_com]</a>
                    </div>
        ";
            }
        }
        ?>
    </div>
    <br>
</div>

</body>