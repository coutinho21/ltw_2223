<!DOCTYPE html>
<html>

<head>
    <title>Sum 2 numbers</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $sum = $num1 + $num2;
        echo "$num1 + $num2 = $sum\n";
    ?>
    <br/><br/>
    <a href="form2.html">Do another sum.</a>
    
</body>
</html>