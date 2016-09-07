<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sendpassword_form.php", ["title" => "Send password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	    if (empty($_POST["username"]))
	    {
		apologize("Enter your username");
	    }

	    $row = query("SELECT * FROM users WHERE username=?", $_POST["username"]);

	    if (count($row) == 1)
	    {
	        $sent = mail("{$row[0]["email"]}", "CS50 Finance", "text", "From: svidryk@bigmir.net \r\n");

		if(!$sent)
		{
		    apologize("false {$row[0]["email"]}");
		}

	        redirect("login.php");
	    }
	    // else apologize
	    apologize("Invalid username");
    }
?>
