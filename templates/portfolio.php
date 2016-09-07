<h3>Welcome <?=$user[0]["username"]?>!</h3>
<table class = "table table-striped">
    <thead>
    <tr>
    <th>Symbol</th>
    <th>Name</th>
    <th>Shares</th>
    <th>Prise</th>
    <th>TOTAL</th>
    </tr>
    </thead>

    <tbody>
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
	    print("<td>{$position["symbol"]}</td>");
            print("<td>{$position["name"]}</td>");
            print("<td>{$position["shares"]}</td>");
            print("<td>{$position["price"]}</td>");
            print("<td>{$position["total"]}</td>");
            print("</tr>");
        }

    ?>
    <tr>
    <td colspan="4" style = "text-align:right">CASH:</td>
    <td><?=number_format($user[0]["cash"], 2)?></td>
    </tr>
    </tbody>
</table>
</div>
