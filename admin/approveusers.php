<?php
    include ('validateAdmin.php');
?>
<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Approve Users</h2>
    	<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getUsers = pg_query("Select username, category from user_account where approve=false and deleted=false;");
            while($row = pg_fetch_array($getUsers)){
              echo '<option class="op" value="'.$row["username"]. '"">' .$row["username"].' (User Type: '.$row["category"].')</option>';
            }
          ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-primary" id="left" value="<">Select User</button>
		</div>
		<div class="col-md-5">
		<form action="submitApprovedUsers.php" method="post">
        <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
        </select>
        <button style="width:100%;" type="submit" class="btn btn-primary" id="left" value="<">APPROVE</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-primary" id="left" value="<">Remove Selected</button>
        
		</div>

    </div>
  </html>