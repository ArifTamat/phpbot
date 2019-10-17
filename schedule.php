<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;

$firebase = (new Factory)
    ->withServiceAccount('./secret/key.json')

    ->withDatabaseUri('https://comsci-01.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();

if(isset($_POST['save']))
	{	
       
		$portfolio=$_POST['portfolio'];

		$schedule = $database
        ->getReference('schedule');

	    $schedule->getChild('portfolio')->set($portfolio);
			
	    header("Location: schedule.php");
	}



//อ่าน กำหนดการรับสมัคร
$schedule = $database
    ->getReference('schedule');
?>        


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
              <a class="btn btn-success" href="home.html" role="button">Back</a>
						</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							
						</th>
                        <th>Name</th>
                        
                        <th>Data</th>
                        <th>Actions</th>
                    </tr>
				</thead>
				
                <tbody>
                    <tr>
                      	<th>
							
                          </th>
                        <td>กำหนดการรับสมัคร</td>
                       
									  <td><textarea rows="20" cols="100"><?php
								      echo $schedule->getChild('portfolio')->getValue(); 
									  ?></textarea></td>
                        
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
                    </tr>
                    <tr>
					<tr>                       
           </table>

	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form name="update_user" method="post" action="schedule.php">
					<div class="modal-header">

						<h4 class="modal-title">Edit schedule</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						
						
						<div class="form-group">

							<!-- <td><input type="text" name="portfolio" value=<?php echo $schedule->getChild('portfolio')->getValue();
							?>></td> -->
							
							<td>
							<textarea name="portfolio" rows="20" cols="48"><?php echo $schedule->getChild('portfolio')->getValue();
							?></textarea>
							</td>

			</tr>
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save" value="save" class="btn btn-info" >
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>

                        		                            