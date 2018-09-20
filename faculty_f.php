<style type="text/css">
<!--
.style1 {
	color: #CC3300;
	font-weight: bold;
}
.alert-info {
color: #3a87ad;
background-color: #d9edf7;
border-color: #bce8f1;
}
.alert {
padding: 8px 35px 8px 14px;
margin-bottom: 18px;
color: #c09853;
text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
background-color: #fcf8e3;
border: 1px solid #fbeed5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
-->
</style>
  <script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("tr:odd").css("background-color","#bbf");
    $("tr:even").css("background-color","#eee");

});
</script>
<style type="text/css">
body
{
background-color:#CCCCCC;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
table tr td
{
font-family:Arial, Helvetica, sans-serif;
font-size:10px;
padding:3px;
}
.style7 {color: #666666; font-weight: bold; font-size: 14px; }
</style>
<h2>Faculty Feedback</h2>
<?php 
include("../class.database.php");

$db=new database();
	$db->connect();

	 $sql="select f.EMP_ID,BRANCH,NAME,PIC,score  from feedback_faculty as ff join faculty as f where ff.EMP_ID=f.EMP_ID and f.BRANCH='$_GET[branch]'  ;" ;
	$result = mysql_query($sql);
	
	while($row=mysql_fetch_array($result))
		{
		$pic1=$row['PIC'];
 if($pic1=='')
{
$pic='profile/faculty_pic/blank-profile.jpg';
}
else
{
$pic='profile/faculty_pic/'.$pic1;
}

		?>
		<div align="left" style="padding:5px;margin:15px;background-color:#EDF7F8;box-shadow:5px 5px 5px 0px #000;border-radius:10px;width:300px;float:left;height:320px;">
		<div style="font-weight:bold;color:#CC6600;border-bottom:1px dotted #CC3300">
		<?php echo "<img src='../pic.php?file=".$pic."&size=60' align=left /"; ?>
<br/>
		<?php echo $row['NAME']."<br/>"; ?>
		 <?php echo $row['BRANCH']."<br/>"; ?>
		  
		</div><br/>
		<?php
	 $type="Current Industrial Relevance of Course,Interest of the students,National importance of the Course,Inational importance of the Course,Scope of Higher Studies,Availability of sufficient course materials,Relevance of course with the programme";

		$ty_1=explode(",",$type); 
		$per_1=explode(",",$row[score]);
		$point="4,4,3,3,3,4,4";
				$point=explode(",",$point);

		 $size=sizeof($ty_1);
		 $i=0;
		 
		 $col[5]='#339900';
			 $col[4]='#ADC620';
		 $col[3]='#D56928';
		 $col[2]='#cc0000';
	 		 $col[1]='#630';

		 echo "<table width=100% cellspacing=0px>";
		 
		
		  while($i<$size)
		 {
		 $total=0;
		 if($per_1[$i]=="5")
{
$grade="Very Strong";
}
else if($per_1[$i]==4 )
{
$grade="Strong";
}
else if($per_1[$i]==3 )
{
$grade="Average";
}else if($per_1[$i]==2 )
{
$grade="Weak";
}
else 
{
$grade="Poor";
}

		
		 echo "<tr><td >".$ty_1[$i]."(".$point[$i].")"."</td><td width=60%><div style='float:left;width:".($per_1[$i]*20)."%;background-color:".$col[$per_1[$i]].";height:14px;' ></div></td><td>"
		 
		 
		 .$grade."</td></tr>";
		 
		 $total=$per_1[$i]*$point[$i];
		  $total_1=$total_1+$total;
		$i++;
		 }
		  $total_s=round($total_1/25,2);
		
		// echo "<tr><td colspan=2>Comment:</td></tr>";
		 		// echo "<tr><td colspan=2><strong>".$row['comment']."</strong></td></tr>";
		 		 echo "<tr align=center><td colspan=11><div align=center style='width:200px;border:2px solid #cc0000;background-color:#fff;padding:4px;font-size:16px;color:#cc3333;font-weight:bolder'>Total Score=".$total_s."</div></td></tr>";

		 echo "</table>";
		?>
		</div>
		<?php
		$total_1='0';
		}
		?>
		