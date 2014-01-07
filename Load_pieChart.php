 <?php
                $con = mysql_connect("127.0.0.1","FoodCounting","foodcounting")
                        or die('Connection Error!');
                
                //select databse
                mysql_select_db("FoodCounting")
                    or die ('Database Error!');
                
                //Fetch
                $query_1 = "SELECT * FROM purchase where PID = '0001' ";
                $query_2 = "SELECT * FROM purchase where PID = '0002' ";
                $query_3 = "SELECT * FROM purchase where PID = '0003' ";
                $query_4 = "SELECT * FROM purchase where PID = '0004' ";
                $query_5 = "SELECT * FROM purchase where PID = '0005' ";
                
                //Execute
                $result_1 = mysql_query($query_1);
                $result_2 = mysql_query($query_2);
                $result_3 = mysql_query($query_3);
                $result_4 = mysql_query($query_4);
                $result_5 = mysql_query($query_5);
                
                if(!$result_1 || !$result_2){
                    die ('Query Error!');
                }
                
                //counter for number
                $number_1 = 0;
                $number_2 = 0;
                $number_3 = 0;
                $number_4 = 0;
                $number_5 = 0;
                
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
                
                while ($row = mysql_fetch_array($result_5)){
                    $number_5 = $number_5 + 1;
                }
                    $prefix = '';
                    
                    echo '[{"name":'.' "wang" '.','.' "value": '.$number_1.'},'
                            . '{"name":'.' "wu" '.','.' "value": '.$number_2.'},'
                            . '{"name":'.' "zhou" '.','.' "value": '.$number_3.'},'
                            . '{"name":'.' "xu" '.','.' "value": '.$number_4.'},'
                            . '{"name":'.' "li" '.','.' "value": '.$number_5.'}]';
                 
                // Close the connection
                mysql_close($con);
                
       ?> 