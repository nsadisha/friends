<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends | Register</title>
    <style>
      *{
        padding: 0;
        margin: 0;
      }
      .form-div{
        border: solid 2px grey;
        border-radius: 10px;
        padding: 1rem;
        position: absolute;
        text-align: center;
        width: 25%;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .form-div h1{
        margin-bottom: 2rem;
      }
      .form-div form .input-group{
        width: 100%;
        margin-bottom: 0.3rem;
        display: grid;
        text-align: start;
      }
      .form-div form .input-group label{
        font-weight: 600;
      }
      .form-div form .input-group input{
        padding: 0.5rem;
        border: solid 1px rgba(0,0,0,0.5);
        border-radius: 5px;
      }
      .form-div form .input-group input[type=submit]{
        margin-top: 1rem;
        cursor: pointer;
      }
    </style>
</head>
<body>
  <div class="form-div">
    <h1>Register</h1>
    <form action="php/new.php" method="post">
      <div class="input-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
      </div>
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" id="submit" value="Register" min="8">
      </div>
    </form>
  </div>
</body>
</html>