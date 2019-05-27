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

  $("#generate-situation").on("click", function(e) {
    e.preventDefault();
    $("#answerDiv").text(
      answerArray[Math.floor(Math.random() * answerArray.length)]
    );
    peopleCount = Math.floor(Math.random() * 11 + 1);
    $("#peopleInvolved").text(peopleCount);
    document.getElementById('savingButton').style.display = "inline-block";
  });
});

function savingPeople(peopleCount) {
  var hero = $("#heroSelect option:selected").val();
  var saved = peopleCount - Math.round(Math.random() * peopleCount);

  if(hero == "default") {
    $("#selectedHero").text("Please select Hero first!");
  } else {
    document.getElementById('savingButton').style.display = "none";
    $("#selectedHero").text(hero + " saved: " + saved);
  }    
}