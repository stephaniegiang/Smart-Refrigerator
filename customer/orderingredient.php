<html>
	<script language="JavaScript" type="text/javascript" src="../../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Select your ingredients</h2>
        <select style="width:45%; min-height:50%;" id="sbOne" multiple="multiple">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 4</option>
            <option value="4">Option 6</option>
            <option value="5">Option 7</option>
        </select>

        <select style="width:45%; min-height:50%;" id="sbTwo" multiple="multiple">
            <option value="6">Option 3</option>
            <option value="7">Option 5</option>
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