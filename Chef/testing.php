            <?php
                require('../connect.php');

                $setPath = pg_query("Set search_path='foobox';");

                $ings = pg_query("select id,count from ingredient");
                $cantcomplete =[];
                $all = [];

                while($ingrow = pg_fetch_array($ings)){
                    $getOrders = pg_query("Select * from queue where completed=false;");
                    echo "new ingredient.".$ingrow[0]." ";
                    echo "</br>";
                    $count = $ingrow[1];
                    while($row = pg_fetch_array($getOrders)){
                    	$tmp=$row[0];
                        $result= pg_query("
                            select ingredientid, numberofingredients
                            from relations
                            where mealid= $tmp;
                            ");
                        echo "meal ".$tmp;
                        echo "</br>";
                        echo print_r(pg_fetch_all($result));
                        echo "</br>";
                        $amt = pg_fetch_all_columns($result,1);
                        $ids = pg_fetch_all_columns($result,0);
                        if (in_array($ingrow[0], $ids)){
                            $indx = array_search($ingrow[0], $ids);
                            $idOfMeal = $row["mealsid"];
                            $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$idOfMeal;"));
                            array_push($all,'<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>' );
                            if( ($count-$amt[$indx]) >0 ){
                                $count = $count-$amt[$indx];
                                //echo into
                                //echo '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                            }else{
                                //echo insufficient
                               // echo '<option class="op2" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                                //echo "\n";
                                array_push($cantcomplete, '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>');
                            }
                        }
                    }
                }
                for ($i=0; $i < sizeof($all) ; $i++) { 
                	//echo $all[$i];
                	if (! in_array($all[$i], $cantcomplete)){
                		//echo $all[$i];
                		//echo "\n";
                	}
                }
?>