<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:radial-gradient(circle at top,#1b1f3b,#0b0e23);
    font-family:Poppins,sans-serif;
    color:#fff;
}
.auth-box{
    width:420px;
    padding:40px;
    border:2px solid #00e5ff;
    box-shadow:0 0 25px #00e5ff;
    background:#141735;
}
h2{text-align:center;margin-bottom:30px;}
.input-group{
    position:relative;
    margin-bottom:30px;
}
.input-group input{
    width:100%;
    border:none;
    border-bottom:2px solid #fff;
    background:transparent;
    outline:none;
    color:#fff;
    padding:10px 35px 10px 5px;
}
.input-group label{
    position:absolute;
    left:5px;
    top:50%;
    transform:translateY(-50%);
    color:#bbb;
    transition:.3s;
}
.input-group i{
    position:absolute;
    right:5px;
    top:50%;
    transform:translateY(-50%);
}
.input-group input:focus+label,
.input-group input:not(:placeholder-shown)+label{
    top:-8px;
    font-size:12px;
    color:#00e5ff;
}
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:30px;
    background:linear-gradient(90deg,#00e5ff,#00bcd4);
    font-size:16px;
    cursor:pointer;
}
.switch{
    margin-top:20px;
    text-align:center;
}
.switch a{color:#00e5ff;text-decoration:none;}
</style>
</head>

<body>
<div class="auth-box">
<h2>Register</h2>

<form method="POST" action="/register">
@csrf

<div class="input-group">
<input type="text" name="name" required placeholder=" ">
<label>Username</label>
<i class="fa fa-user"></i>
</div>

<div class="input-group">
<input type="email" name="email" required placeholder=" ">
<label>Email</label>
<i class="fa fa-envelope"></i>
</div>

<div class="input-group">
<input type="password" name="password" required placeholder=" ">
<label>Password</label>
<i class="fa fa-lock"></i>
</div>

<button type="submit">Register</button>

<div class="switch">
Already have an account?
<a href="/login">Sign In</a>
</div>
</form>
</div>
</body>
</html>


