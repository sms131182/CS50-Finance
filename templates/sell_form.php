<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
		<option selected disabled value="">Symbol</option>
		    <?php

        		foreach ($rows as $row)
        		{
	    		print("<option value=\"{$row["symbol"]}\">{$row["symbol"]}</option>");
        		}
    		    ?>	
	    </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>

