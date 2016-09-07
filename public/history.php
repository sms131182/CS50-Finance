<?php

    // configuration
    require("../includes/config.php");

    // sm
    $histories = query("SELECT * FROM history WHERE id=?", $_SESSION ["id"]);

    // render 
    render("history_form.php", ["title" => "History", "histories" => $histories]);

?>
