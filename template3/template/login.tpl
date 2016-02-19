{% extends "winetable.tpl" %}
{# this is a comment. BodyBlock will be overridden #}

{% block LOGIN %}
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">

</head>
<body>
<div class="table table-striped table-hover" style="     text-align:center;">

<!--    <i class="fa fa-home">&nbsp; </i><i  class="fa" ><b>Inventory</b></i>-->
</div>
<div style="margin-left:40%; margin-top:10%;">
<form method="POST" action="page1.php">
<h3>Login to use system</h3>
<h5><i>Username for admin is admin and password is test</i></h5>
<h5><i>Username for regular user is regular and password is test</i></h5>
Username :<input type="text" size="30" name="username"><br> 
Password :<input type="password" size="30" name="pword"><br>
<input style="margin-left:30%;" type="submit" value="page1">
</div>

{% endblock %}