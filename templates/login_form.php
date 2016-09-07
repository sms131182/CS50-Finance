<form action="login.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
    	
	<input name="changePassword" type="checkbox" id="changePassword"/> 
	<label for="changePassword">Change password</label>

        <div class="form-group" id="show">
            <input class="form-control" name="newpassword" placeholder=" New password" type="password"/>
        </div>
        <div class="form-group" id="show">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
	<div class="form-group" id="show">
            <button type="submit" class="btn btn-default">Change</button>
        </div>

        <div class="form-group" id="hide">
            <button type="submit" class="btn btn-default">Log In</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="register.php">register</a> for an account
</div>
<br/>
<div>
<a href="sendpassword.php">fogot your password?</a>
</div>
