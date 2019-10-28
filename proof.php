

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
?> 

<!DOCTYPE html>
<html lang="en">
<title>Evidence</title>
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

</head>
<body>
<?php	

if(isset($_POST['save']))
	{	
		$evidence=$_POST['evidence'];
		$schedule = $database
        ->getReference('schedule');
		$schedule->getChild('evidence')->set($evidence);
		
	    header("Location: proof.php");
	}
?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Evidence of application (หลักฐานการสมัคร)</b></h2>
					</div>
					<div class="col-sm-6">
              <a class="btn btn-success" href="schedule.php" role="button">Back</a>
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
                    <tr>
                        <td style="font-weight:bold">หลักฐานการสมัคร</td>
						<td><?php echo $schedule->getChild('evidence')->getValue(); ?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           </td>
                    </tr>  

                                     
           </table>

	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<form name="update_user" method="post" action="proof.php">
					<div class="modal-header">	

						<h4 class="modal-title">Edit Evidence of application</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						
						
						<div class="form-group">
							<label>Data</label>
							
							<td><textarea name="evidence" rows="20" cols="48"><?php echo $schedule->getChild('evidence')->getValue(); 
							
							?></textarea></td>
			</tr>
						</div>

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="save" value="save" class="btn btn-info" onclick="return confirm('ยืนยันการเปลี่ยนแปลงข้อมูล')" />
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>

                        		                            