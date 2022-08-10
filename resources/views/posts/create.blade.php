<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .label{
            display: inline-flex;
            width: 100px;
        }
        .main{
            margin-top: 25px
        }
    </style>
</head>
<body >
@include('includes.navbar')
<div class="container">
  <div class="main">
    <form action="{{ route('posts.store') }}" method="post">
  <div class="label">
    title
  </div>
    <input type="text" name="title" id=""><br><br>
    

  <div class="label">
    body</div>
    <textarea type="text" name="body" id="" cols="18"></textarea><br><br>
  
    <div class="label">
    user ID </div>
    <input type="text" name="user_id" id=""><br><br>
   

    <div class="label">
    enabled </div>
    <input type="checkbox" value=""  name="enabled" id="" style="margin-left:50px"><br><br>
  

    <div class="label">
    published at</div>
    <input type="date" name="published_at" id="">


        <br><br>
        <button type="submit" style="background-color: #563d7c;color:white;border:none;border-radius:5px;width:100px">Save</button>
    </form></div>
</div>
</body>
</html>