<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <?php
                function init_session()
                {
                    session_start();
                    if (count($_SESSION) < 1) {
                        $_SESSION['user'] = "";
                        $_SESSION['errors'] = "";
                    }
                }

                init_session();

                $user = $_SESSION['user'];
                if ($user != "") {
                    echo "
                      <li class=\"nav-item\">
                             <a class=\"nav-link\" href=\"dashboard.php\">Dashboard</a>
                      </li>
                       <li class=\"nav-item\">
                            <a id=\"logout\" class=\"nav-link\" href=''>
                            Logout
                            </a>
                      </li>
                    ";
                } else {
                    echo "
                        <li class=\"nav-item\">
                             <a id=\"logout\" class=\"nav-link\" href='./register/sign-up.php'>Sign Up</a>
                        </li>
                         <li class=\"nav-item\">
                             <a id=\"logout\" class=\"nav-link\" href='./register/login.php'>Login</a>
                        </li>
                    ";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<form style="display: none" id="logout-form" action="./server/logout.php" method="POST">
    <button name="logout" type="submit">Logout</button>
</form>

<script type="text/javascript">
    var logoutBtn = $('#logout');
    logoutBtn.on("click", function (event) {
        // event.preventDefault();
        // window.location.replace("./");
        $.post("./server/logout.php", {logout: true});
    });
</script>