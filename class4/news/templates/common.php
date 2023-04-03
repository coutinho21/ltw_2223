<?php 
    function outputHeader(){ 
        session_start();    
?>
        <!DOCTYPE html>
        <html lang="en-US">

        <head>
        <title>Super Legit News</title>
        <meta charset="UTF-8">
        <meta name="css/viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/comments.css" rel="stylesheet">
        <link href="css/forms.css" rel="stylesheet">
        </head>

        <body>
        <header>
            <h1><a href="index.php">Super Legit News</a></h1>
            <h2><a href="index.php">Where fake news are born!</a></h2>
            <div id="signup">
                <?php if(isset($_SESSION['username'])){ ?> 
                        <a href="action_logout.php">Logout</a>
                <?php } else { ?>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <?php } ?>
            </div>
        </header>
        <nav id="menu">
            <!-- just for the hamburguer menu in responsive layout -->
            <input type="checkbox" id="hamburger">
            <label class="hamburger" for="hamburger"></label>

            <ul>
            <li><a href="index.php">Local</a></li>
            <li><a href="index.php">World</a></li>
            <li><a href="index.php">Politics</a></li>
            <li><a href="index.php">Sports</a></li>
            <li><a href="index.php">Science</a></li>
            <li><a href="index.php">Weather</a></li>
            </ul>
        </nav>
        <aside id="related">
            <article>
            <h1><a href="#">Duis arcu purus</a></h1>
            <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
            </article>
            <article>
            <h1><a href="#">Sed efficitur interdum</a></h1>
            <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
            </article>
            <article>
            <h1><a href="#">Vestibulum congue blandit</a></h1>
            <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
            </article>
        </aside>
<?php } ?>

<?php 
    function outputFooter(){ ?>
                <footer>
                  <p>&copy; Fake News, 2022</p>
                </footer>
            </body>
        </html>
<?php } ?>