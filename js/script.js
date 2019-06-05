$(function() {
  var answerArray = [
    "Avalanche",
    "Human attack",
    "Animal attack",
    "Storm",
    "Fire",
    "Stealing",
    "Hostage situation",
    "Lost",
    "Sickness"
  ];
    
function randomSituationGenerator() {
    $("#answerDiv").text(
	answerArray[Math.floor(Math.random() * answerArray.length)]
	);
	peopleCount = Math.floor(Math.random() * 11 + 1);
	$("#peopleInvolved").text(peopleCount);
    
}
randomSituationGenerator();
    
function automaticSituation(){
    setInterval(function(){ 
		randomSituationGenerator();
		}, 5000);
}
    
document.getElementById("savingButton").style.display = "inline-block";
automaticSituation();    

  $("#generate-situation").on("click", function(e) {
    e.preventDefault();
    randomSituationGenerator();
    document.getElementById("savingButton").style.display = "inline-block";
  });

  $(".hero--toggle").on("click", function() {
    $(this)
      .closest(".hero-item")
      .find(".hero-item__body")
      .slideToggle(200);
    $(this).toggleClass("open");
  });
});

function savingPeople(peopleCount) {
  var hero = $("#heroSelect option:selected").val();
  var saved = peopleCount - Math.round(Math.random() * peopleCount);

  if (hero == "default") {
    $("#selectedHero").text("Please select Hero first!");
  } else {
    document.getElementById("savingButton").style.display = "none";
    $("#selectedHero").text(hero + " saved: " + saved);
  }
}
