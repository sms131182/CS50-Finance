<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // sm
        $rows = query("SELECT * FROM Actions WHERE id=?", $_SESSION ["id"]);
	if ($rows == NULL)
	{
	    apologize("No stock for sale");
	}

	// else render form
        render("sell_form.php", ["title" => "Sell", "rows" => $rows]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
	if (!isset($_POST["symbol"]))
	{
	    apologize("You must select a stock to sell");
	}
	else
	{
	    $row = query("SELECT * FROM Actions WHERE id=? AND symbol=?", $_SESSION ["id"], $_POST["symbol"]);
	    $stock = lookup($_POST["symbol"]);
	    $sold = $row[0]["shares"] * $stock["price"];

	    query("DELETE FROM Actions WHERE id=? AND symbol=?", $_SESSION ["id"], $_POST["symbol"]);
	    query("UPDATE users SET cash = cash + {$sold} WHERE id=?", $_SESSION ["id"]);
	    query("INSERT INTO history (date, transaction, symbol, shares, price, id) VALUES (NOW(), 'SELL', '{$row[0]["symbol"]}', {$row[0]["shares"]}, {$stock["price"]}, {$_SESSION ["id"]})");

	    redirect("index.php");
	}
    }
?>
