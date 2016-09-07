<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
	// else render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
	if ($_POST["symbol"] === "" || $_POST["shares"] === "")
	{
	    apologize("You must select a stock and shares to buy");
	}
	
	if (!preg_match("/^\d+$/", $_POST["shares"]))
	{
	    apologize("Shares must be positive integer");
	}
	
	$stock = lookup($_POST["symbol"]);
	if ($stock === false)
	{
	    apologize("Symbol not found");
	}

	$bought = $_POST["shares"] * $stock["price"];
	$user_cash = query("SELECT cash FROM users WHERE id=?", $_SESSION ["id"]);

	if ($user_cash[0]["cash"] < $bought)
	{
	    apologize("Not enough CASH = {$user_cash[0]["cash"]}, the amount of the purchase = {$bought}.");
	}

	$stock["symbol"] = strtoupper($stock["symbol"]);

	query("INSERT INTO Actions (id, symbol, shares) VALUES ({$_SESSION ["id"]},'{$stock["symbol"]}',{$_POST["shares"]}) ON DUPLICATE KEY UPDATE shares = shares + {$_POST["shares"]}");

	query("UPDATE users SET cash = cash - {$bought} WHERE id=?", $_SESSION ["id"]);

	query("INSERT INTO history (date, transaction, symbol, shares, price, id) VALUES (NOW(), 'BUY', '{$stock["symbol"]}', {$_POST["shares"]}, {$stock["price"]}, {$_SESSION ["id"]})");

	redirect("index.php");
    }
?>
