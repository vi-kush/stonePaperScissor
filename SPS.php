<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<?php
 //Compare Results [player][against]
 // 0 => Tie , 1 => Win , -1 => Lose
	$result=Array("stone" => Array("stone" => 0, "paper" => -1, "scissor"=> 1),
		  			    "paper" => Array("stone" => 1, "paper" => 0, "scissor" => -1),
		  			    "scissor" => Array("stone" => -1, "paper" => 1, "scissor" => 0));

 //To accumulate Wins [of_player][against_player]
	$totalScore = Array("player1" => Array("player1" => '-',"player2" => 0,"player3" => 0,"player4" => 0),	
							"player2" => Array("player1" => 0,"player2" => '-',"player3" => 0,"player4" => 0),
							"player3" => Array("player1" => 0,"player2" => 0,"player3" => '-',"player4" => 0),
							"player4" => Array("player1" => 0,"player2" => 0,"player3" => 0,"player4" => '-'));					


 //Create choices and Player Array to take generated values 
  $choices = Array( "stone" , "paper" , "scissor" );
	$indexToPlayer = Array("player1" , "player2" , "player3" , "player4"); 
	$player = Array();
	
	$iteration = 0;
	
	while($iteration <50){
		
		//Generate Random Choices
		for ($i=0 ; $i < 4 ; $i++){
	    $player[$i] = $choices[rand(0,2)];
		}

		echo '<div class="text-center"><h3>Iteration: '.($iteration+1).'</h3></div>
    <table class="table text-center">
    <thead class="" style="background-color: rgb(255, 230, 197)">
      <tr>
        <th scope="col">Player 1</th>
        <th scope="col">Player 2</th>
        <th scope="col">Player 3</th>
        <th scope="col">Player 4</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>'.$player[0].'</td>
      <td>'.$player[1].'</td>
      <td>'.$player[2].'</td>
      <td>'.$player[3].'</td>
    </tr>
  </tbody>
</table>';

		for ($play=0 ; $play < 4 ; ++$play){
			for ($opp=0 ; $opp < 4 ; ++$opp){
				if( $result[$player[$play]][$player[$opp]] > 0 && $play != $opp){
					$totalScore[$indexToPlayer[$play]][$indexToPlayer[$opp]] += $result[$player[$play]][$player[$opp]];  
				}
			}	
		}

		echo '
    <table class="table text-center table-bordered " style="width: 80%; margin-left: 10%  ;">
    <thead class="">
      <tr>
        <th scope="col" colspan="6" >Against</th>
      </tr>
      <tr style="background-color: rgb(255, 230, 197)">
        <th scope="col" colspan="2" style="background-color: rgb(255, 255, 255)"> </th>
        <th scope="col">Player 1 </th>
        <th scope="col">Player 2 </th>
        <th scope="col">Player 3 </th>
        <th scope="col">Player 4 </th>
      </tr>
    </thead>
    <tbody>';
    
    for($k=1 ; $k<5 ; ++$k){
    echo '<tr>';
    if ($k==1) {
      echo '<th scope="row" rowspan="5">Wins</th>';
    }
    echo '
        <th Scope="row" style="background-color: rgb(255, 230, 197)">Player '.$k.'</th>
        <td>'.$totalScore['player'.$k]['player1'].'</td>
        <td>'.$totalScore['player'.$k]['player2'].'</td>
        <td>'.$totalScore['player'.$k]['player3'].'</td>
        <td>'.$totalScore['player'.$k]['player4'].'</td>
      </tr>';
    }
    echo '</table><br><hr>';
		$iteration++;
	}	

?>

</body>
</html>