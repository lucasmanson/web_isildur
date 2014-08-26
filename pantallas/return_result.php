<?php
	$errors = array(); //To store errors
	$form_data = array(); //Pass back the data to `form.php`

	if (empty($_POST['nombre'])) { //Name cannot be empty
		$errors['nombre'] = 'Name cannot be blank';
	}

	if (!empty($errors)) { //If errors in validation
		$form_data['success'] = false;
		$form_data['errors']  = $errors;
	} else { //If not, process the form, and return true on success
		$form_data['success'] = true;
		$form_data['posted'] = 'Data Was Posted Successfully';
	}
		
	$salida = shell_exec('ls -lrt 2>&1');
	echo "<p>$salida</p>";
	echo $_POST['clave'];
	
//Return the data back to form.php
	echo json_encode($form_data);
?>