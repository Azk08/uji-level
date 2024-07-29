<?php include "header.php"; ?>

<body class="form">
    <center>
        <div class="login">
            <br>
            <br>
            <h1>Register</h1>
            <form action="back_end/clearregister.php" method="post">
                <input type="text" name="username" id="username" placeholder="username" required maxlength="50">
                <input type="password" name="password" id="password" placeholder="password" required maxlength="255">
                <input type="email" name="email" id="email" placeholder="email" required maxlength="100">
                <input type="submit" value="Create">
                <br>
                <br>
                <a href="admin.php">Login if you have already account</a>
            </form>
        </div>
    </center>
</body>