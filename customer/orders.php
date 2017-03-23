<html>
	<script language="JavaScript" type="text/javascript" src="../../js/select.js"	></script>
	<div style="margin-top:50px;margin-bottom:100px;">
		<h2>Your Orders</h2>
		<div class="col-md-6"style="">
        <select style="min-width:100%; min-height:50%;" id="sbOne" multiple="multiple">
            <option class="op" value="1">Test Option</option>
            <option class="op" value="2">Test Option</option>
            <option class="op" value="3">Option 4</option>
            <option class="op" value="4">Option 6</option>
            <option class="op" value="5">Option 7</option>
        </select>
       </div>
		<div class="col-md-6" style="">
          <button onclick="removeElement()"type="button" class="btn btn-default" id="left" value="remove">Remove</button></br>
          <button onclick="<?php //DB QUERY TO APPLY CHANGES GOES HERE?>type="button" class="btn btn-default" id="left" value="apply">Apply Changes</button>
		</div>
		<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
</html>        