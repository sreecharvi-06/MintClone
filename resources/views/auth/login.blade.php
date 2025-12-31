 <!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
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
<h2>Login</h2>

<form method="POST" action="/login">
@csrf

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

<button type="submit">Login</button>

<div class="switch">
Don’t have an account?
<a href="/register">Register</a>
</div>
</form>
</div>
</body>
</html> 


 -->




 <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0B1220] flex items-center justify-center h-screen text-white">

<form method="POST" action="/login" class="bg-[#111827] p-8 rounded-xl w-96">
    @csrf

    <h2 class="text-2xl mb-6 font-bold">Login</h2>

    <input type="email" name="email" placeholder="Email"
        class="w-full mb-4 p-3 bg-transparent border rounded" required>

    <input type="password" name="password" placeholder="Password"
        class="w-full mb-4 p-3 bg-transparent border rounded" required>

    <button type="submit"
        class="w-full bg-green-500 text-black py-2 rounded font-semibold">
        Login
    </button>

    <p class="mt-4 text-sm text-center">
        No account?
        <a href="/register" class="text-green-400">Register</a>
    </p>
</form>

</body>
</html>
