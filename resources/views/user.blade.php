<!DOCTYPE html>
<!-- <title>Laravel</title> -->
<html>
<title>HTML FORM</title>
<body>

<h2>HTML FORM</h2>

<form action="{{url('/')}}/register" method="post">
    @csrf
    <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="name"><br>
  <label for="lname">Gmail:</label><br>
  <input type="email" id="email" name="email" ><br><label for="lname">Password:</label><br>
  <input type="password" id="password" name="password" value=""><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>