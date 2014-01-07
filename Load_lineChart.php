 <?php
                $con = mysql_connect("127.0.0.1","FoodCounting","foodcounting")
                        or die('Connection Error!');
                
                //select databse
                mysql_select_db("FoodCounting")
                    or die ('Database Error!');
                
                //Fetch
                $query_1 = "SELECT * FROM purchase where Date BETWEEN '2013-11-01' AND '2013-11-08'";
                $query_2 = "SELECT * FROM purchase where Date BETWEEN '2013-11-09' AND '2013-11-16'";
                $query_3 = "SELECT * FROM purchase where Date BETWEEN '2013-11-17' AND '2013-11-24'";
                $query_4 = "SELECT * FROM purchase where Date BETWEEN '2013-11-25' AND '2013-11-30'";
                
                //Execute
                $result_1 = mysql_query($query_1);
                $result_2 = mysql_query($query_2);
                $result_3 = mysql_query($query_3);
                $result_4 = mysql_query($query_4);
               
                
                if(!$result_1 ){
                    die ('Query Error!');
                }
                
                //counter for number
                $number_1 = 0;
                $number_2 = 0;
                $number_3 = 0;
                $number_4 = 0;
                
                
                //print in JSON
                            
                while ($row = mysql_fetch_array($result_1)){
                    $number_1 = $number_1 + 1;
                }
                
                while ($row = mysql_fetch_array($result_2)){
                    $number_2 = $number_2 + 1;
                }
                
                while ($row = mysql_fetch_array($result_3)){
                    $number_3 = $number_3 + 1;
                }
                
                while ($row = mysql_fetch_array($result_4)){
                    $number_4 = $number_4 + 1;
                }
                    $prefix = '';
                   
                    echo '[{"date":'.' "08" '.','.' "value": '.$number_1.'},'
                            . '{"date":'.' "16" '.','.' "value": '.$number_2.'},'
                            . '{"date":'.' "24" '.','.' "value": '.$number_3.'},'
                            . '{"date":'.' "30" '.','.' "value": '.$number_4.'}]';
                 
                // Close the connection
                mysql_close($con);
                
       ?> 