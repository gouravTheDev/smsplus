<?php 
	$link = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB_BEANSTALKFP);
	$link->set_charset("utf8");

	if(mysqli_connect_error()){
		die("ERROR: UNABLE TO CONNECT: ".mysqli_connect_error());
	}

	if (isset($_POST['submitFeedback']) && isset($_POST['formName']) && $_POST['formName']=="feedbackForm"){

		$courseMaterial = $_POST['courseMaterial'];
		$useful = $_POST['useful'];
		$experience = $_POST['experience'];
		$recommendation = $_POST['recommendation'];
		$suggestion = $_POST['suggestion'];

		$franId = $_SESSION['franId'];

		// CHECK IF THE FRANCHISE HAS ANY PREVIOUS FEEDBACK OR NOT

		$sql = "SELECT * FROM BS_TRAINING_FEEDBACK WHERE FRANCHISE_ID='$franId' ";
		$result = mysqli_query($link, $sql);
		if ($result) {
			if(mysqli_num_rows($result)>0){ // if yes update the table
				echo "Hello";

			}else{ // if not insert the value into table
				$stmt = $link->prepare("INSERT INTO BS_TRAINING_FEEDBACK (`FRANCHISE_ID`, `COURSE_MATERIAL`, `USEFULLNESS`, `EXPERIENCE`, `RECOMMENDATION`, `SUGGESTIONS`)VALUES(?, ?, ?, ?, ?, ?)");

				$stmt->bind_param("ssssss", $franId, $courseMaterial, $useful, $experience, $recommendation, $suggestion);

				$result2 = $stmt->execute();
				if ($result2) {
					// D_js_alert("Successfully Registered IIMTT Student");
					echo '<div class="alert alert-success">Thank you for your feedback! </div>';
				}
			}
		}else{
			echo "Hello";
		}
		
	}

?>