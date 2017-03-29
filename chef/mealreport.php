<?php 
  include ('validateChef.php');
?>

<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2>Select your meals</h2>
        <select style="width:45%;min-height: 50%;" id="sbOne" multiple="multiple">
            <option class="op" value="1">Option 1</option>
            <option class="op" value="2">Option 2</option>
            <option class="op" value="3">Option 4</option>
            <option class="op" value="4">Option 6</option>
            <option class="op" value="5">Option 7</option>
        </select>

        <select style="width:45%;min-height: 50%;" id="sbTwo" multiple="multiple">
        	
        </select>

        <br />
        <div style="margin:auto; width:28.7%;" class="btn-group" role="group">
          <button onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">></button>
          <button type="button" class="btn btn-default" id="left" value="<">>></button>
          <button onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<"><</button>
          <button type="button" class="btn btn-default" id="left" value="<"><<</button>
        </div>
    </div>
    
  </html>