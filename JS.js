
 // Computer choice
function game(id){ 
var userChoice =id;
var computerChoice = Math.random();
if (computerChoice < 0.34) {
    computerChoice = "rock";
        } else if(computerChoice <= 0.67) {
            computerChoice = "paper";
        } else {
            computerChoice = "scissors";
        }

// Compare user choice vs computer choice
var compare = function(choice1,choice2) {
    if (choice1 === choice2) {
    return "It's a tie!";
    }
    if (choice1 === "rock") {
        if (choice2 === "scissors") {
        // rock wins
        return "You win!";
        } else {
        // paper wins
        return "You lose! Try again.";
        }
    }
    if (choice1 === "paper") {
        if (choice2 === "rock") {
    // paper wins
        return "You win!";
        } else {
    // scissors wins
        return "You lose! Try again.";
        }
    }
    if (choice1 === "scissors") {
        if (choice2 === "rock") {
    // rock wins
        return "You lose! Try again.";
        } else {
    // scissors wins
        return "You win!";
        }
    }
};
// Run the compare function
var results = compare(userChoice,computerChoice);
// Display results
document.getElementById("computerChoice").innerHTML = "Computer selected:" + " " + computerChoice;
document.getElementById("userChoice").innerHTML = "You've selected:" + " " + userChoice;
document.getElementById("results").innerHTML = results;
}