<?php 
  include ('validateChef.php');
?>

<html>
<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
<div style="margin-top:50px;margin-bottom:100px;">
    <h2> Current Orders</h2>
    <div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
            <?php
                require('../connect.php');

                $setPath = pg_query("Set search_path='foobox';");

                $ings = pg_query("select id,count from ingredient");
                $compare =[];
                $all = [];
                $red=[];

                while($ingrow = pg_fetch_array($ings)){
                    $getOrders = pg_query("Select * from queue where completed=false;");
                    //echo "new ingredient ";
                    $count = $ingrow[1];
                    while($row = pg_fetch_array($getOrders)){
                        $result= pg_query("
                            select ingredientid, numberofingredients
                            from relations
                            where mealid= $row[0];
                            ");
                        $amt = pg_fetch_all_columns($result,1);
                        $ids = pg_fetch_all_columns($result,0);
                        if (in_array($ingrow[0], $ids)){
                            $indx = array_search($ingrow[0], $ids);
                            $idOfMeal = $row["mealsid"];
                            $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$idOfMeal;"));
                            if (! in_array('<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>', $all)){
                                array_push($all,'<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>');
                            }
                            
                            if( ($count-$amt[$indx]) >0 ){
                                $count = $count-$amt[$indx];
                                //echo into
                                //echo '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                            }else{
                                //echo insufficient
                                //echo '<option class="op2" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                                array_push($compare, '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>');
                                array_push($red, '<option class="op2" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>');
                            }
                        }
                    }
                }
                for ($i=0; $i < sizeof($all) ; $i++) { 
                	if (! in_array($all[$i], $compare)){
                		echo $all[$i];
                	}
                }
                for ($i=0; $i < sizeof($red); $i++) { 
                	echo $red[$i];
                }
?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-primary" id="left" value="<">Select Order</button>
    </div>
    <div class="col-md-5">
        <form action="completeOrders.php" method="post">
            <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
            </select>
            <button style="width:100%;" type="submit" class="btn btn-primary" id="left" value="<">ORDER(S) COMPLETED</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-primary" id="left" value="<">Remove Selected</button>

    </div>

</div>
</html>