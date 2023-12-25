<?php

$conn= mysqli_connect('localhost','root','','sql_practice');
if (!$conn)
{
  die('could not connect mysql:' .msql_error());
}

if (isset($_POST['save'])) 
{
  
  $name = $_POST['name'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $edu = implode(",",$_POST['edu']);
  $year = $_POST['year'];

  $sql = "INSERT INTO cruddetails (name,address,gender,edu,year) VALUES ('$name','$address','$gender','$edu','$year')";
  if (mysqli_query($conn,$sql)) 
  {
    
          echo "<script>alert('Insert successfully');</script>";
          echo "<script>window.location.href='insert.html'</script>";
  }
  else 
  {
    echo "error: ". $sql .";
    " . mysqli_error($conn);
  }
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Records</title>
</head>
<body>
  
  <h1><a href="index.php">All Records</a></h1>
<form action="" method="POST">
NAME: <input type="text" name="name"><br>
Address: <textarea name="address" cols="20" rows="5"></textarea><br>
Gender: <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female<br>
Education: <input type="checkbox" name="edu[]" value="BE">BE
           <input type="checkbox" name="edu[]" value="DE">DE
           <input type="checkbox" name="edu[]" value="MCA">MCA<br>
Year: <select name="year">
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
</select><br>

<input type="submit" name="save">
</form>


</body>
</html>