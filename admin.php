<?php include "header.php";?>

<body class="form">
    <center>
    <div class="login">
        <br>
        <h1>Login</h1>
        <form action="back_end/ceklogin.php" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
            <br>
            <br>
            <a href="register.php">create account if you dont have account</a>
        </form>
    </div>
    </center>

</body>

</html>