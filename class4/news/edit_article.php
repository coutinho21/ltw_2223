<!DOCTYPE html>
<html lang="en-US">
<head>  
    <title>Super Legit News</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="action_edit_news.php">
        <label>Title</label>
        <input type="text" name="title">
        <br/> <br/>
        <label>Introduction</label>
        <textarea name="introduction" rows="5" cols="40"></textarea>
        <br/> <br/>
        <label>Fulltext</label>
        <textarea name="fulltext" rows="10" cols="40"></textarea>
        <br/> <br/>
        <input hidden name="id" value="<?=$_GET['id']?>">
        <button type="submit">Submit</button>
    </form>
</body>
</html>