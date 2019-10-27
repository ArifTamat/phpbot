<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;

$firebase = (new Factory)
    ->withServiceAccount('./secret/key.json')
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://comsci-01.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();

//กยศ.
if(isset($_POST['save']))
	{	
		$st_scholarship=$_POST['st_scholarship'];

		$scholarship = $database
		->getReference('scholarship');
		
	    $scholarship->getChild('st_scholarship')->set($st_scholarship);		  
		header("Location: scholarship.php");

		//ทุนอาจารย์ 1
	}elseif (isset($_POST['save1'])) {
		$t_scholarship=$_POST['t_scholarship'];

		$scholarship = $database
		->getReference('scholarship');
		
	    $scholarship->getChild('t_scholarship')->set($t_scholarship);		  
		header("Location: scholarship.php");
		
		//ทุนธนาคาร 2
	}elseif (isset($_POST['save2'])) {
		$b_scholarship=$_POST['b_scholarship'];

		$scholarship = $database
		->getReference('scholarship');
		
	    $scholarship->getChild('b_scholarship')->set($b_scholarship);		  
		header("Location: scholarship.php");
		
		//ทุนบริษัท 3
	}elseif (isset($_POST['save3'])) {
		$co_scholarship=$_POST['co_scholarship'];

		$scholarship = $database
		->getReference('scholarship');
		
	    $scholarship->getChild('co_scholarship')->set($co_scholarship);		  
		header("Location: scholarship.php");
		
		//ทุนอื่นๆ 4
	}elseif (isset($_POST['save4'])) {
		$ot_scholarship=$_POST['ot_scholarship'];

		$scholarship = $database
		->getReference('scholarship');
		
	    $scholarship->getChild('ot_scholarship')->set($ot_scholarship);		  
	    header("Location: scholarship.php");
	}



$scholarship = $database
    ->getReference('scholarship');
?>        


<!DOCTYPE html>
<html lang="en">
<title>Scholarship</title>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

	</style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Scholarships (ทุนการศึกษา)</b></h2>
					</div>
					<div class="col-sm-6">
              <a class="btn btn-success" href="home.php" role="button">Back</a>
						</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 25%;">Name</th>                      
                        <th>Data</th>
                        <th>Actions</th>
                    </tr>
				</thead>
				
                <tbody>
                    <tr>
                        <td style="font-weight:bold">กองทุนเงินให้กู้ยืมเพื่อการศึกษา (กยศ.)</td>
						<td><textarea rows="10" cols="60"><?php echo $scholarship->getChild('st_scholarship')->getValue(); ?></textarea></td>                      
                        <td>
                            <a href="#editEmployeeModalS" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
					</tr> 
					<tr>
                        <td style="font-weight:bold">กองทุนอาจารย์</td>
						<td><textarea rows="10" cols="60"><?php echo $scholarship->getChild('t_scholarship')->getValue(); ?></textarea></td>                      
                        <td>
                            <a href="#editEmployeeModalT" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
					</tr> 
					<tr>
                        <td style="font-weight:bold">กองทุนธนาคาร</td>
						<td><textarea rows="10" cols="60"><?php echo $scholarship->getChild('b_scholarship')->getValue(); ?></textarea></td>                      
                        <td>
                            <a href="#editEmployeeModalB" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
					</tr> 
					<tr>
                        <td style="font-weight:bold">กองทุนบริษัท</td>
						<td><textarea rows="10" cols="60"><?php echo $scholarship->getChild('co_scholarship')->getValue(); ?></textarea></td>                      
                        <td>
                            <a href="#editEmployeeModalCo" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
					</tr> 

					<tr>
                        <td style="font-weight:bold">ทุนการศึกษาอื่น ๆ</td>
						<td><textarea rows="10" cols="60"><?php echo $scholarship->getChild('ot_scholarship')->getValue(); ?></textarea></td>                      
                        <td>
                            <a href="#editEmployeeModalOt" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
					</tr> 
					
           </table>


	<!-- Edit กยศ. -->
	<div id="editEmployeeModalS" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="scholarship.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Student Loan Fund</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">							
							<td>
							<textarea name="st_scholarship" rows="20" cols="48"><?php echo $scholarship->getChild('st_scholarship')->getValue(); 
							?></textarea>
							</td>
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

	<!-- Edit อาจารย์ 1 -->
	<div id="editEmployeeModalT" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="scholarship.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Teacher Scholarships</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">							
							<td>
							<textarea name="t_scholarship" rows="20" cols="48"><?php echo $scholarship->getChild('t_scholarship')->getValue(); 
							?></textarea>
							</td>
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
	
	<!-- Edit ธนาคาร 2-->
	<div id="editEmployeeModalB" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="scholarship.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Bank Scholarships</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">							
							<td>
							<textarea name="b_scholarship" rows="20" cols="48"><?php echo $scholarship->getChild('b_scholarship')->getValue(); 
							?></textarea>
							</td>
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
	
	<!-- Edit บริษัท 3-->
	<div id="editEmployeeModalCo" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="scholarship.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Company Scholarships</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">							
							<td>
							<textarea name="co_scholarship" rows="20" cols="48"><?php echo $scholarship->getChild('co_scholarship')->getValue(); 
							?></textarea>
							</td>
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
	
	<!-- Edit อื่น ๆ 4-->
	<div id="editEmployeeModalOt" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="scholarship.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit Other Scholarships</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">							
							<td>
							<textarea name="ot_scholarship" rows="20" cols="48"><?php echo $scholarship->getChild('ot_scholarship')->getValue(); 
							?></textarea>
							</td>
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

                        		                            