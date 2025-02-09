<?php
session_start();
if(!isset($_SESSION['userdata']))
{
     header("location: ../");
}

$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
$status='<b style="color:red">Not voted</b>';
}
else{
 $status='<b style="color:green">Voted</b>';
}
?>

<html>
<head>
<title ">Online Voting System</title>
<style>
body{
text-align:left;
background-color:#b8e994;
}
#headerSection
{
   padding:5px;
}
#loginbtn{
padding:5px;
border-radius:5px;
background-color:#3498db;
color:white;
}



#backbtn{
padding:5px;
font-size:15px;
border-radius:5px;
background-color:#3498db;
color:white;
float:left;
margin:10px;
}


#logoutbtn{
padding:5px;
border-radius:5px;
background-color:#3498db;
color:white;
float:right;
margin:10px;
}

#votetbtn{
padding:5px;
border-radius:5px;
background-color:#3498db;
color:white;
float:right;
}
#mainpanel{
padding:10px;
}

#profile{
background-color:white;
width:40%;
padding:20px;
float:left;
}
#Group{
background-color:white;
width:45%;
padding:20px;
float:right;
}
#voted
{
padding:5px;
border-radius:5px;
background-color:green;
color:white;
float:right;
}
</style>
</head>
<body>
<div id="mainSection">
     <center>
     <div id="headerSection">
<a href="../Online Voting/index.html">
<button id="backbtn">Back</button></a>
<a href="../api/logout.php/">
<button id="logoutbtn">Logout</button></a>
<h1 style="font-family:Cursive;">Online Voting System</h1>
</div>
</center>
<hr>
<center><h2 style="font-family:Cursive;">SELECT YOUR CR</h2></center>
<div id="mainpanel">
<div id="profile">
<center><img src="../uploads/<?php echo $userdata['photo']?>" heigt="100" width="100"></center><br><br>
<b>Name:</b><?php echo $userdata['name']?><br><br>
<b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
<b>Address:</b><?php echo $userdata['address']?><br><br>
<b>Status:</b><?php echo $status ?><br><br>
</div>
<div id="Group">
   <?php
if($_SESSION['groupsdata']){
for($i=0;$i<count($groupsdata);$i++){
?>
<div>
<img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
<b>Candidate Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
<b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>

<form action="../api/vote.php" method="POST">
<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">

<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
<?php
if($_SESSION['userdata']['status']==0)
{
?>
<input type="submit" name="votebtn" value="vote" id="votebtn">
<?php
}
else
{
?>
<button disabled type="button" name="votebtn" value="vote" id="voted" style="float:left;">Voted</button><br><br>
<?php
}
?>
</form>
</div>
<hr>
<?php
}
}
else{

}
   ?>
</div>
</body>

</html>
