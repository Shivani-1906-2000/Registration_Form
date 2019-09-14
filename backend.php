<?php
include "config/config.php";
if(isset($_POST['submit']))
{
    $name=strip_tags($_POST['name']);
    $email=$_POST['email'];
  
    $fname=$_POST['fname'];

    $mname=$_POST['mname'];
 
    $phone=$_POST['phone'];
  
    $city=$_POST['city'];
    $address=$_POST['address'];
    $course=$_POST['course'];
    $fees=$_POST['fees'];

    $target='images/'.basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];

    
    $query="INSERT INTO `student`(`name`, `email`, `fathers name`, `mothers name`, `phone`, `city`, `address`, `course`, `fees`,`image`) VALUES ('$name','$email','$fname','$mname','$phone','$city','$address','$course','$fees','$image')";
    $result= mysqli_query($conn,$query);
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    if($result)
    {
      header("Location: http://localhost/PROJECTS/Project2/index.html");
    }
}

if(isset($_POST['fetch']))
{
    echo "<h1 style='color:white;background-color:#b81237;margin-left:30%;margin-right:20%;text-align:center;
    border-radius:10px;font-size:50px;'>Details of Student's who registerd </h1>";
$query1="SELECT * FROM `student`";
$result1=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($result1))
{
    echo "
    <div style='background-color:#231f20;color:#ceba8e;text-align:center;padding:5px;'>
    <img src='images/".$row['image']."' height='400px' width='300px' alt='Card image cap'>
      <p>NAME: ".$row['name']."</p>
      <p>EMAIL: ".$row['email']."</p>
      <p>COURSE: ".$row['course']."</p>
      <p>FEES PAID: ".$row['fees']."</p>
  </div>";
}
}
?>