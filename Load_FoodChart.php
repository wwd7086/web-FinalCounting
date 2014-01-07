 <?php
                $con = mysql_connect("127.0.0.1","FoodCounting","foodcounting")
                        or die('Connection Error!');
                
                //select databse
                mysql_select_db("FoodCounting")
                    or die ('Database Error!');
                
                //Fetch
                $query_1 = "SELECT * FROM food where place = 'real' ";
                $query_2 = "SELECT * FROM food where place = 'aldi' ";
                
                //Execute
                $result_1 = mysql_query($query_1);
                $result_2 = mysql_query($query_2);
                
                if(!$result_1 || !$result_2){
                    die ('Query Error!');
                }
                
                //result counter
                $price_1 = 0;//@real
                $price_2 = 0;//@aldi
                
                //counter for number
                $number_1 = 0;
                $number_2 = 0;
                
                //print in JSON
                            
                while ($row = mysql_fetch_array($result_1)){
                    $number_1 = $number_1 + 1;
                    $price_1 = $price_1 + $row['price'];
                }
                
                while ($row = mysql_fetch_array($result_2)){
                    $number_2 = $number_2 + 1;
                    $price_2 = $price_2 + $row['price'];
                }
                    
                    $prefix = '';
                    
                    echo '[{"place":'.' "Real" '.','.' "value": '.$number_1.','.' "price": '.$price_1.'},'
                            . '{"place":'.' "Aldi" '.','.' "value": '.$number_2.','.' "price": '.$price_2.'}]';
                 
                // Close the connection
                mysql_close($con);
                
       ?> 