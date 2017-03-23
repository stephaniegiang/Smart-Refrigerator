<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2>Select your meals</h2>
<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
            <option class="op" value="1">Option 1</option>
            <option class="op" value="2">Option 2</option>
            <option class="op" value="3">Option 4</option>
            <option class="op" value="4">Option 6</option>
            <option class="op" value="5">Option 7</option>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">Select Meal</button>
		</div>
		<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
            <option class="op" value="6">Option 3</option>
            <option class="op" value="7">Option 5</option>
        </select>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<">Remove Selected</button>
        <button style="width:100%;"onclick="<?php//STATEMENT TO PLACE ORDER GOES HERE?>"type="button" class="btn btn-default" id="left" value="<">ORDER</button>
		</div>
    </div>
    
  </html>