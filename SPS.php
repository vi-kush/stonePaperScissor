<?php
	//Compare Results [player][against]
	// 0 => Tie , 1 => Win , -1 => Lose
	$result=Array("stone" => Array("stone" => 0,
				      									 "paper" => -1,
				      									 "scissor"=> 1),
		  			    "paper" => Array("stone" => 1,
		  			    		  				    "paper" => 0,
						 	    						  "scissor" => -1),
		  			    "scissor" => Array("stone" => -1,
						     	       				  "paper" => 1,
						 	                    "scissor" => 0)
				);

	//To accumulate Wins [of_player][against_player]
	$totalScore = Array( "player1" => Array("player1" => '-',
																				  "player2" => 0,
																				  "player3" => 0,
																				  "player4" => 0),	
    								   "player2" => Array("player1" => 0,
										  										"player2" => '-',
										  										"player3" => 0,
										  										"player4" => 0),
			    					  	"player3" => Array("player1" => 0,
										  									   "player2" => 0,
										  									   "player3" => '-',
										  									   "player4" => 0),
			    					    "player4" => Array("player1" => 0,
											 										 "player2" => 0,
											 										 "player3" => 0,
											 										 "player4" => '-')
			  );					

	//Create choices and Player Array To assign values 
	//Generate Random Choices
	
	$choices = Array( "stone" , "paper" , "scissor" );
	$indexToPlayer = Array("player1" , "player2" , "player3" , "player4"); 
	$player = Array();

	$iteration = 0;

	while($iteration <50){
		
		for ($i=0 ; $i < 4 ; $i++){
						$ch=rand(0,3);
						//echo "<br>".$ch."<br>";
	       		$player[$i] = $choices[rand(0,2)];
		}

		echo "<br>";
		print_r($player);
		echo "<br>";

		for ($play=0 ; $play < 4 ; $play++){
			for ($opp=0 ; $opp < 4 ; $opp++){
				if( $result[$player[$play]][$player[$opp]] > 0 && $play != $opp){
					$totalScore[$indexToPlayer[$play]][$indexToPlayer[$opp]] += $result[$player[$play]][$player[$opp]];  
				}
			}	
		}

		echo "<br>";
		print_r($totalScore);
		echo "<br>";

		$iteration++;
	}	

