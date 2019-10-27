<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;

$firebase = (new Factory)
    ->withServiceAccount('./secret/key.json')

    ->withDatabaseUri('https://comsci-01.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();

//อ่าน กำหนดการรับสมัคร
$schedule = $database
    ->getReference('schedule');

if(isset($_POST['save']))
	{	
       //รอบปัจจุบัน
		$current=$_POST['current'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('current')->set($current);
			
		header("Location: schedule.php");
		
		//รอบที่1
	}elseif (isset($_POST['save1'])) {

		$round1=$_POST['round1'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('round1')->set($round1);
			
		header("Location: schedule.php");
		
		//รอบที่2
	}elseif (isset($_POST['save2'])) {

		$round2=$_POST['round2'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('round2')->set($round2);
			
		header("Location: schedule.php");

		//รอบที่3
	}elseif (isset($_POST['save3'])) {

		$round3=$_POST['round3'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('round3')->set($round3);
			
		header("Location: schedule.php");
		
		//รอบที่4
	}elseif (isset($_POST['save4'])) {

		$round4=$_POST['round4'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('round4')->set($round4);
			
		header("Location: schedule.php");
		
	}
?>        


<!DOCTYPE html>
<html lang="en">
<title>Schedule</title>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Schedule</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Schedule (กำหนดการรับสมัคร)</b></h2>
					</div>
					<div class="col-sm-6">
              <a class="btn btn-success" href="home.php" role="button">Back</a>
						</div>
                </div>
			</div>
			
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 19%;">Name</th>                       
                        <th>Data</th>
                        <th>Actions</th>
                    </tr>
				</thead>			

                <tbody>
					
				<!-- รอบรวม -->
                    <tr>
                        <td style="font-weight:bold">กำหนดการรับสมัครรวม</td>
							<td><textarea rows="15" cols="100"><?php 
							echo $schedule->getChild('round1')->getValue();
							echo "\n\n";
							echo $schedule->getChild('round2')->getValue();
							echo "\n\n";
							echo $schedule->getChild('round3')->getValue();
							echo "\n\n";
							echo $schedule->getChild('round4')->getValue();
							?>
							
						  </textarea></td>                       
                           <td>
                            <!-- <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
                           </td>
					</tr>
					
					<!-- รอบปัจจุบัน -->
					<tr>
                        <td style="font-weight:bold">รอบปัจจุบัน</td>
							<td><textarea rows="10" cols="100"> <?php 
							echo $schedule->getChild('current')->getValue();
							?> </textarea></td>                       
                        <td>
                            <a href="#editEmployeeModalCr" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
					</tr>

					<!-- รอบที่1 -->
					<tr>
                        <td style="font-weight:bold">รอบที่ 1</td>
							<td><textarea rows="10" cols="100"><?php echo $schedule->getChild('round1')->getValue(); ?></textarea></td>                       
                        <td>
                            <a href="#editEmployeeModal1" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
					</tr>

					<!-- รอบที่2 -->
					<tr>
                        <td style="font-weight:bold">รอบที่ 2</td>
							<td><textarea rows="10" cols="100"><?php echo $schedule->getChild('round2')->getValue(); ?></textarea></td>                       
                        <td>
                            <a href="#editEmployeeModal2" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
					</tr>

					<!-- รอบที่3 -->
					<tr>
                        <td style="font-weight:bold">รอบที่ 3</td>
							<td><textarea rows="10" cols="100"><?php echo $schedule->getChild('round3')->getValue(); ?></textarea></td>                       
                        <td>
                            <a href="#editEmployeeModal3" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
					</tr>

					<!-- รอบที่4 -->
					<tr>
                        <td style="font-weight:bold">รอบที่ 4</td>
							<td><textarea rows="10" cols="100"><?php echo $schedule->getChild('round4')->getValue(); ?></textarea></td>                       
                        <td>
                            <a href="#editEmployeeModal4" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
					</tr>
                                  
		   </table>
		   

	<!-- Edit Modal HTML -->
	<!-- <div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit schedule</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="portfolio" rows="20" cols="48"><?php echo $schedule->getChild('portfolio')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div> -->

	<!-- Edit รอบปัจจุบัน -->
	<div id="editEmployeeModalCr" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Schedule Current</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="current" rows="20" cols="48"><?php echo $schedule->getChild('current')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div>


	<!-- Edit รอบที่ 1 -->
	<div id="editEmployeeModal1" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Schedule First round</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="round1" rows="20" cols="48"><?php echo $schedule->getChild('round1')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save1" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Edit รอบที่ 2 -->
	<div id="editEmployeeModal2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Schedule Round 2</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="round2" rows="20" cols="48"><?php echo $schedule->getChild('round2')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save2" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Edit รอบที่ 3 -->
	<div id="editEmployeeModal3" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Schedule Round 3</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="round3" rows="20" cols="48"><?php echo $schedule->getChild('round3')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save3" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Edit รอบที่ 4 -->
	<div id="editEmployeeModal4" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Schedule Round 4</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">																
						<div class="form-group">						
							<td>
							<textarea name="round4" rows="20" cols="48"><?php echo $schedule->getChild('round4')->getValue();
							?></textarea>
							</td>
							</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save4" value="save" class="btn btn-info"onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>

			</div>
		</div>
	</div>

	
	
</body>
</html>

                        		                            