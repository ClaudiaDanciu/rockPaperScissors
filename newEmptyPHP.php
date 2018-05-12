<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])){
    $expected = ['name', 'email', 'time', 'randomNumber'];
    $required = ['name', 'email','randomNumber'];
    $to ='Claudia Danciu <contact@claudiadanciu.com>';
    $subject= 'Monday Schedule';
    $headers=[];
    $headers[]= 'From:claudiadanciu@yahoo.com';
    $headers[]= 'Cc:claudia.borosianu@gmail.com';
    $headers[]='Content-type: text/plain; charset=utf-8';
    $authorized = NULL;
    
require'./includes/process_mail.php';}
    if ($mailsent) {header ('Location: thanks.php');
    header('Location: thanks.php');
    exit;}
?>
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
        <label><input type="radio" name="randomNumber" onclick="playWith('stone')" >Rock<img src='Rock.png' alt="Rock"></label>
        <label><input type="radio" name="randomNumber" onclick="playWith('paper')"> Paper<img src='Paper.png' alt="Paper">
        <label><input type="radio" name="randomNumber" onclick="playWith('scissors')"> Scissors<img src='Scissors.png' alt="Scissors">
        </fieldset>
  <br>
  <?php
$randomNumber = array_rand(['rock', 'paper', 'scissors']);
  
if($randomNumber == 'Rock') {
    echo "Computer chose rock";
} else if($randomNumber == 'Paper') {
    echo "Computer chose paper";
} else {
    echo "Computer chose scissors";
}
?>
  <br>
  
  
  <br>
  <h1>When would you like to speak with Victoria?</h1>
  <?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
  <p class="warning">Sorry, your mail couldn't be sent.</p>
  <?php 
  elseif ($errors || $missing): 
  ?>
  <p class="warning">Please fix this item(s) indicated</p>
  <?php 
  endif;
  ?>
  
  <form method="post" action = "<?= $_SERVER['PHP_SELF']?>;">
  <p>
    <label for="name">Name:
    <?php if ($missing && in_array('name',$missing)) : ?>
    <span class="warning">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input type ="text" name="name" id="name"
    <?php if ($errors || $missing){
    echo 'value="'.htmlentities($name) . '"';
    }
    ?>>
  </p>
  <p> 
     <label for="email">Email:
        <?php if ($missing && in_array('email',$missing)) : ?>
        <span class="warning">Please enter your email</span>
        <?php elseif (isset($errors['email'])) : ?>
        <span class = "warning">Invalid email address</span>
        <?php endif; ?>
        </label>
     <input type ="email" name="email" id="email"
        <?php if ($errors || $missing){
        echo 'value="'.htmlentities($email) . '"';
        }
        ?>>
    
   </p>
   <p>
     <label for="time">Time: </label>
     <input type ="time" name="time" id="time">
     
   </p>
      
   <p>
      <input type="submit" name="send" id="send" value="send">
   </p>
  </form>
 
<script src="JS.js" type="text/javascript"></script>
  
</html>