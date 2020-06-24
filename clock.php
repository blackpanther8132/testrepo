<?php 
    $connection=mysqli_connect('localhost','root','','clock');
    if(isset($_POST['submit']))             
    {
        $edate=$_POST['edate'];
        $ename=$_POST['ename'];
      	$rand=mt_rand(10000,99999);
        $check="SELECT *FROM addevent WHERE edate = '$edate'";
        $rs = mysqli_query($connection,$check);
        if(mysqli_num_rows($rs)>0)
        {

            echo "<script type='text/javascript'>alert('You will add only one event per day');</script>";            
        }
        else
        {
        $sql="insert into addevent values('$rand','$edate','$ename')";
        $result=mysqli_query($connection,$sql);
                 
         
        }


    }
   

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

   <link href="css/custom_style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>

</head>
<body onload="startTime()">
    <br>
    
    <div class="row showtime">

      
    <div class="col-md-4 time" id="time"></div>
      
        <div class="col-md-5 evnt" > 
        <?php
        		 $sql = "select *from addevent";
			 $result = mysqli_query($connection, $sql);
			 ?>
         <script>
             var count=0;
             </script>

         <?php
            if(mysqli_num_rows($result)>0){
                
            while ($row=mysqli_fetch_array($result)) {
                
                
                    $evname = $row['ename'];
                    $evdate = $row['edate'];
                    $evid    = $row['eid'];
                   
             ?>
        <script>
                    var sdate = '<?php echo $evdate ?>';
                    var sname = '<?php echo $evname ?>';
                    
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();
            


                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    
                    today = yyyy + '-' + mm + '-' + dd;

                  if(today == sdate)
                  {
                    document.write('<p style="font-size:35px";>' + '<?php echo $evname ?>' + '</p>');
                    count++;
                  }
       
                 
     </script>	

            <?php
            }
            ?>
<script>
if(count == 0){
    document.write('<p style="font-size:35px";>Wel-Come <span style="font-size:15px;position:relative; left: 30px; top: 20px;"> You did not have any events today</span></p>');
                  
}        
</script>

     <?php
            }
            else
            {
    
                echo 
                "<p style='color:black;font-size:35px';>Wel-Come <span style='font-size:15px;position:relative; left: 30px; top: 20px;'> You did not have any events today</span></p>";            
            }
         
			
        ?>
 </div>
        
         <div class="col-md-3 stop"> 
            <button class="btn2" onclick="location.href = 'stopwatch.php';"> <span>Stopwatch </span></button>
        </div>
    </div>
    <hr>
<div class="row">
        <div class="col-md-1" > </div>
<div class="col-md-2 container">
    <h3><i class="fa fa-clock-o" aria-hidden="true"></i><u>Alaram</u></h1>
<br>
 <div class="dropdown">
    <button type="button" class=" btn1 dropdown-toggle" data-toggle="dropdown">
     Select Timings
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item"  onclick="setTimeout(makesound, 5000);" href="#">5 seconds</a>
      <a class="dropdown-item" onclick="setTimeout(makesound, 60000);"	href="#" >1 minute</a>
      <a class="dropdown-item" onclick="setTimeout(makesound, 300000);" href="#">5 minutes</a>
      <a class="dropdown-item" onclick="setTimeout(makesound, 1800000);"href="#">30 minutes</a>
      <a class="dropdown-item" onclick="setTimeout(makesound, 3600000);"href="#">1 hour</a>
      <a class="dropdown-item" onclick="setTimeout(makesound, 7200000);"href="#">2 hours</a>
       <a class="dropdown-item" onclick="setTimeout(makesound, 18000000);"href="#">5 hours</a>
    </div><!-- drop downmenu-->
  </div><!-- dropdown-->
</div><!-- container-->

<div class="vl1 col-md-1">   </div>

<div class="eventreminder col-md-7" >
    <h3 style="text-align:left; position: relative ; left:150px;  "><i class="fa fa-calendar" aria-hidden="true"></i>
<u> Event Reminder </u> </h1>
    <br/>

<div class="row">

    <div class="col-md-5" > 
        
        <button class="btn1 " onclick="func1()">Add event</button>

        <form  id="addevent" method="post" onsubmit="return formvalidation()">
        <br>
                        
                    Event: <input type=text id="ename" name="ename" size="10px" required><br>
					  <span id="enameerror" class="text-danger "></span>
						       
					<br>
                   
					Date: <input type="date" id="edate" name="edate" required><br/>
					   <span id="edateerror" class="text-danger "></span>
					<br/>
					         
                                  	<input type="submit" value="Submit" name="submit" class="button buttonBlue">
				                
                            </form>

    </div>
    <div class="vl col-md-1">   </div>

    <div class="col-md-*" > 
    
    <button class="btn1" onclick="func2()">Saved events</button>

        <form id="savedevents" action="">
        
        
        
        <?php
        		 $sql = "select *from addevent";
			 $result = mysqli_query($connection, $sql);
			 
			 
            if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)) {
               
                    $evname = $row['ename'];
                    $evdate = $row['edate'];
                    $evid    = $row['eid'];
 			echo "
			<br>
			<p style='font-weight:bold';> $evname / <span style='color:red';> date:</span>$evdate / <a href='delete.php?id=$evid'>Delete</a></p>
			
			";					
        
			}
			}
			
        ?>
            </form>
</div>
    

</div>

</div><!-- eventreminder-->

  <div class="col-md-1" > </div>

</div><!-- starting div-->
<br/>
<script>
     function formvalidation()
       {
       var date = document.getElementById('edate').value
       var name = document.getElementById('ename').value
      var regname = /([a-zA-Z]){3,30}/;
       var today = new Date();
       var dd = today.getDate();
       var mm = today.getMonth() + 1;
       var yyyy = today.getFullYear();
       
       if (dd < 10) {
         dd = '0' + dd;
       }
       
       if (mm < 10) {
         mm = '0' + mm;
       }
       
       today = yyyy + '-' + mm + '-' + dd;
      
       
    
       if(regname.test(name))
            {
            document.getElementById('enameerror').innerHTML ="";
            }
            else{
            	document.getElementById('enameerror').innerHTML ='<p style="font-size:13px";> **Event name must be in between 3-30 char</p>';
            	return false;
            }

            if(date >= today)
            {
            document.getElementById('edaterror').innerHTML ="";}
            else{
            	document.getElementById('edateerror').innerHTML = '<p style="font-size:13px";> **Date must be greater than today date</p>';
            	return false;
            }


       }
    </script>
</body>
</html>
