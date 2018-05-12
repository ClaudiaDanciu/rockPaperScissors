
<!DOCTYPE html>
<html>
<head>     
   <link href="rsp.css" rel="stylesheet" type="text/css"/>
   
   <meta charset="UTF-8">
   <title>RSP</title>
   <link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans:400,700" rel="stylesheet">
    
</head>
        <h1>Welcome! Let's play Rock, Paper, Scissors!</h1>
        <br> 
        <fieldset>
            <legend><span class="warning">Please chose one</span></legend>
        <h4>Are you ready to play?</h4>      
        <div id="game">
            
            <img src='Rock.png' alt="Rock" id='rock' class="choice" onclick="game('rock')">
            <img src='Paper.png' alt="Paper" id='paper' class="choice" onclick="game('paper')"> 
            <img src='Scissors.png' alt="Scissors" id='scissors' class="choice" onclick="game('scissors')"> 
             <span id="source"></span>
            <div id="result"></div>
            <br>
            
        </div>
            </fieldset>
    
    <span id="computerChoice"></span><br/>
    <span id="userChoice"></span>
    <h3 id="results"></h3>
   
<script src="JS.js" type="text/javascript"></script>
  
</html>