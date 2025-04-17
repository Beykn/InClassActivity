var names = ["Ben", "Joel", "Judy", "Anne"];
var scores = [88, 98, 77, 88];

var $ = function (id) { return document.getElementById(id); };



window.onload = function () {
	$("display_results").onclick = displayResults;
	$("display_scores").onclick = displayScores;
	$("add").onclick = addScore;
	
	
};

function displayResults() {
    var average = 0;
	// Find the maximum value at the scores list.
    let maxScore = Math.max.apply(null, scores);
	// Find the index of the maximum value. (For find the name of max score)
    let maxIndex = scores.indexOf(maxScore);
	// Find the name of top score
    let topScorer = names[maxIndex];

    for (var i = 0; i < scores.length; i++) {
        average = (average * i + scores[i]) / (i + 1);
    }

    $("results_summary").innerHTML =
        "<h2>Results</h2><br />" +
        "Average score is " + average + "<br />" +
        "Highest score = " + topScorer + " with a score of " + maxScore + "<br />";
}


function displayScores() {
    var output = "<h2 style='color:blue;'>Scores</h2>";

    output += "<span style='display:inline-block; width:100px; font-weight:bold;'>Name</span>" +
              "<span style='display:inline-block; width:50px; font-weight:bold;'>Score</span><br />";

    for (var i = 0; i < scores.length; i++) {
        output += "<span style='display:inline-block; width:100px;'>" + names[i] + "</span>" +
                  "<span style='display:inline-block; width:50px;'>" + scores[i] + "</span><br />";
    }

    $("results_scores").innerHTML = output;
}

// Adding a new score to out list.
function addScore(){
	// tempName and tempScore store the input fields data.
	var tempName = $("name").value;
	var tempScore = parseInt($("score").value);
	
	// Checking the name and score fields are filled or not.
	if(tempName == "" || isNaN(tempScore)){
		alert("Please fill the all fields! (name and score)");
	}else{
		// The score input must be at 0-100 range. input score: [0-100]
		if (tempScore < 0 || tempScore > 100 || isNaN(tempScore)) {
			alert("Please enter a valid score. Score must be : [0-100]");
		}else {
			// Input name and input score added to lists.
			names.push(tempName);
			scores.push(tempScore);
			alert("Score added!");
		}
		
	}
	// Clear the name and the score input fields.
	$("name").value = "";
	$("score").value = "";
}