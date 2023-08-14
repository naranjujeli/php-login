<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/signup.css" />
    
    <title>Sign Up</title>
</head>
<body>
    <main>
        <h1>Sign Up</h1>
        <form action="/pages/post-signup.php" method="POST">
            <input required id="username" type="text" name="username" placeholder="Username"/>
            <input required id="password" type="password" name="password" placeholder="Password"/>
            <input required id="confirm-password" type="password" name="confirm-password" placeholder="Repeat password"/>
            <input id="submit" type="submit" />
        </form>
        <a href="/pages/login.php">Log In</a>
    </main>
</body>
</html>