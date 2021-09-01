<?php include "php/friends.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends | About</title>
    <style>
      body{
        text-align: center;
      }
      code{
        background: rgba(0,0,0,0.1);
        padding: 1px;
        border-radius:5px;
      }
      table{
        position: relative;
        left:50%;
        transform: translateX(-50%);
        margin:1rem 0;
      }
      a{
        padding: 0.5rem 1rem;
        margin: 2rem 0;
        background: rgba(0,0,0,0.2);
        font-size: 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        text-decoration:none;
      }
    </style>
</head>
<body>

  <h1>Friends management system</h1>
  <p>This system was developed as a web application development assignment in University of Kelaniya with php + MySQL + HTML + CSS.</p>
  <hr width="100%">
  <h1>Database schema</h1>
  <p>This system uses only 2 tables. Those are named as <code>users</code> and <code>friends</code>. In users table, it has <code>name</code>, <code>email</code>, <code>username</code>, <code>password</code>, and <code>time</code>.<br>The following table will clearly represent how the table structure is.</p>
  <table width="40%" border="1">
    <caption align="center"><strong>users</strong></caption>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Type</th>
      <th>Default value</th>
      <th>Other</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Name</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>-</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Email</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>PRIMARY KEY</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Username</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>UNIQUE</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Password</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>-</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Time</td>
      <td>TIMESTAMP</td>
      <td>CURRENT_TIMESTAMP </td>
      <td>-</td>
    </tr>
  </table>
  <p>I put the password as a plain text because it increases the complexity of the application.</p>
  <p>And then, the following table will show the structure of friends table in the database.</p>
  <table width="40%" border="1">
    <caption align="center"><strong>friends</strong></caption>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Type</th>
      <th>Default value</th>
      <th>Other</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Email</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>COMPOSITE KEY</td>
    </tr>
    <tr>
      <td>2</td>
      <td>FriendEmail</td>
      <td>TEXT</td>
      <td>NULL</td>
      <td>COMPOSITE KEY</td>
    </tr>
  </table>
  <hr>
  <table width="40%" border="1">
    <caption align="center"><strong>Statistics</strong></caption>
    <tr>
      <th>Number of users</th>
      <th>Total number of connections</th>
    </tr>
    <tr>
      <td><?php echo getAllUsersCount(); ?></td>
      <td><?php echo getTotalConnections(); ?></td>
    </tr>
    <tr>
  </table>
  <a href="index.php">Home</a>
</body>
</html>