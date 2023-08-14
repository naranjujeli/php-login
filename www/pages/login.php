<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/css/main.css" />
        <link rel="stylesheet" href="/css/login.css" />

        <title>Log In</title>
    </head>
    <body>
        <main>
            <h1>Log In</h1>
            <form action="/pages/post-login.php" method="POST">
                <input required id="username" type="text" name="username" placeholder="Username"/>
                <input required id="password" type="password" name="password" placeholder="Password"/>
                <input id="submit" type="submit" />
            </form>
            <a href="/pages/signup.php">Sign Up</a>
        </main>
    </body>
</html>
