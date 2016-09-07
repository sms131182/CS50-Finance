<div id="middle">
<table class = "table table-striped">
    <thead>
    <tr>
    <th>Date</th>
    <th>Transaction</th>
    <th>Symbol</th>
    <th>Shares</th>
    <th>Prise</th>   
    </tr>
    </thead>

    <tbody>
    <?php

        foreach ($histories as $history)
        {
            print("<tr>");
	    print("<td>{$history["date"]}</td>");
            print("<td>{$history["transaction"]}</td>");
            print("<td>{$history["symbol"]}</td>");
            print("<td>{$history["shares"]}</td>");
            print("<td>{$history["price"]}</td>");
            print("</tr>");
        }

    ?>
    </tbody>
</table>
</div>
