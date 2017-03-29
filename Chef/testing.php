<?php
                require('../connect.php');

                $setPath = pg_query("Set search_path='foobox';");

                $ings = pg_query("select id,count from ingredient");

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
                        //echo $ingrow[0];
                        //echo "</br>";
                        //echo print_r($ids);
                        //echo "</br>";
                        if (in_array($ingrow[0], $ids)){
                            $indx = array_search($ingrow[0], $ids);
                            if( ($count-$amt[$indx]) >0 ){
                                $count = $count-$amt[$indx];
                                //echo into
                                $idOfMeal = $row["mealsid"];
                                $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$idOfMeal;"));
                                echo '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                            }else{
                                //echo insufficient
                                $idOfMeal = $row["mealsid"];
                                $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$idOfMeal;"));
                                echo '<option class="op2" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                            }
                        }
                    }
                }
?>