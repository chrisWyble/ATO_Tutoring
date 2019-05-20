<?php include("PHP/connect.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>ATO Tutoring</title>
		<link rel = "stylesheet" type="text/css" href = "CSS/style.css" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="main_ajax.js"></script>
	</head>

	<body>
		<div id="header">
			<h1>Welcome to AT&#x03A9 Tutoring</h1>
		</div>
		
		<div class = "wrapper">	
		
			<div id="main">
				<div id="selM">
					
					<div id ="textMajor">
						<p><strong>Select your major: </strong></p>
					</div>
					
					<div id="Majors">
						<select class="scrollM" id="majorsID" name="Majors" size="3" onchange="chartLoad()">
							<?php
							    $getMajors = $conn->prepare("SELECT major FROM tutors GROUP BY major");
							    $getMajors->execute();
							    
							    while ($major = $getMajors->fetch(PDO::FETCH_OBJ)) {
							        echo '<option value="'.$major->major.'">'.$major->major.'</option>';
							    }
							?>
							<option value='Major Not Listed'>Major Not Listed</option>
						</select>
					</div>
					
				</div>
				<div id="selC">
				
					<div id ="textClass">
						<p><strong>Select the class you need tutoring in: </strong></p>
					</div>
					
					<div id="Classes">
						<select class="scrollC" id="classesID" name="Classes" size="3" onchange="chartLoad()">
							<?php
							    $getClasses = $conn->prepare("SELECT class FROM classes GROUP BY class");
							    $getClasses->execute();
							    
							    while($class =$getClasses->fetch(PDO::FETCH_OBJ)){
							        echo '<option value="'.$class->class.'">'.$class->class.'</option>';
							    }
							?>
							<option value='Class Not Listed'>Class Not Listed</option>
						</select>
					</div>	
				</div>
			</div>	
			
				<div id="mChart">
					<h3>major chart</h3>
					<table id="majorChart">
					    <tr>
					        <th>Name</th>
                            <th>Email</th>
					    </tr>
					</table>    
				</div>
				<div id="cChart">
					<h3>class chart</h3>
					<table id="classChart">
					    <tr>
					        <th>Name</th>
                            <th>Email</th>
					    </tr>
					</table>    
				</div>
			<div id="footer">
				<h6>Copyright &copy; 2019 Chris Wyble.</h6>
			</div>
		</div>

	</body>

</html>