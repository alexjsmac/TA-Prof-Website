<?

function validate_username($username)
{
	return ($username == "") ? "No username was entered<br>": "";
}

function validate_password($password)
{
	if ($password == "") return "No password was entered<br>"
}

function display_error($error)
{
	if($error != null)
	{
		echo '<div class="alert alert-danger" role="alert">
          <p> Error: ' . $error . '</div>';
	}
}