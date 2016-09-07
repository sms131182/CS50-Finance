<?php

    // configuration
    require("../includes/config.php");

    // sm
    $rows = query("SELECT * FROM Actions WHERE id=?", $_SESSION ["id"]);

    // sm
    $user = query("SELECT * FROM users WHERE id=?", $_SESSION ["id"]);

    // sm - new arr in which add current price and name company
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            //sm - the total amount of shares
            $total = $row["shares"] * $stock["price"];

            $positions[] = [
            "name" => $stock["name"],
            "price" => number_format($stock["price"], 2),
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "total" => number_format($total, 2)
            ];
        }
    }
    
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "user" => $user]);

?>
