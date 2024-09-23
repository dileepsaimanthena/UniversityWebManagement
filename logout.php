<?php
  session_start();
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gajraj One">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
  <link rel="stylesheet" href="index-styles.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    button{
      width: 150px;
      height: 40px;
      background-color: #A5D7E8;
      border: none;
      border-radius: 20px;
      font-family: "Josefin Sans";
      font-weight: bold;
      transition: transform 0.2s ease;
      cursor: pointer;
    }
    h1{
      font-family: "Josefin Sans" ;
    }
    div{
      width: max-content;
      margin: auto;
      background-color: #f2f2f2;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 30px;
      border-radius: 10px;
      margin-top: 100px;
    }
  </style>
</head>
<body>
  <div>
    <h1>You have been logged out successfully!</h1>
    <a href="index.html"><button>Login to UNIWEB</button></a>
  </div>
</body>
</html>