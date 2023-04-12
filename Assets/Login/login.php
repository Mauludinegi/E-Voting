<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Login to your account</h1>
        </header>
        
        <div class="hero"></div>
        
        <main>
            <div class="content">
                <form method="post">
                    <div class="formgroup formgroup-1">
                        <input type="text" id="nama" class="formcontrol formcontrol-1" name="nim" placeholder="NIM" autocomplete="off" autofocus>
                    </div>
                    <div class="formgroup formgroup-2">
                        <input type="password" id="email" class="formcontrol formcontrol-2" name="password" placeholder="Password" autocomplete="off" >
                    </div>
                    <div class="formgroup kotak">
                        <input class="box" type="checkbox">
                        <label>Ingat Username</label>
                    </div>
                    <div class="tombol">
                        <button class="button-satu" type="submit" name="submit"><a>Masuk</a></button>
                        <label class="label" for="Pesan">Login with your Account</label>
                        <button class="button-dua"type="submit"><img src="./images/Grooj.png" alt="Grooj"><a href="">Login with Google</a></button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>