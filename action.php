
<?php
    
if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'insert':
                insert();
                break;
            case 'select':
                select();
                break;
        }
    }

    function select() {
        echo "The select function is called.";
        exit;
    }

    function insert() {
        echo "The insert function is called.";
        exit;
    }
/*
require_once("includes/config.php"); 
if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'insert':
                insert();
                break;
            case 'select':
                select();
                break;
        }
    }

function select() {
    echo "The select function is called.";
	exit;
}

function insert() {
    echo "The insert function is called.";
    exit;
}

$input = filter_input_array(INPUT_POST);
$name = mysqli_real_escape_string($db_connect, $input["name"]);
$email = mysqli_real_escape_string($db_connect, $input["email"]);
$phone = mysqli_real_escape_string($db_connect, $input["phone"]);
$birthday = mysqli_real_escape_string($db_connect, $input["birthday"]);

if($input["action"] === 'edit'){
	$query = "
	UPDATE members
	SET name = '".$name."', 
	email = '".$email."',
	phone = '".$phone."',
	birthday = '".$birthday."' 
	WHERE id = '".$input["id"]."'
	";
	mysqli_query($db_connect, $query);
}

*/
echo "404 Not Found";

?>
