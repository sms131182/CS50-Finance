<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
	if ($_POST["username"] == false || $_POST["password"] == false)
	{
	    apologize("Enter your username and password");
	}
	else if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($_POST["email"])))
	{
	    apologize("Your email is incorrect");
	}
	else if ($_POST["password"] !== $_POST["confirmation"])
	{
	    apologize("Passwords do not match");
	}
	else
	{
	    $result = query("INSERT INTO users (username, hash, cash, email) VALUES(?, ?, 10000.00, ?)", $_POST["username"], crypt($_POST["password"]), strtolower($_POST["email"]));
	}
	
	if ($result === false)
	{
	    apologize("User with same username already exist");
	}
	else
	{
	    $rows = query("SELECT LAST_INSERT_ID() AS id");
	    $id = $rows[0]["id"];
	    redirect("index.php");
	}
    }
?>
