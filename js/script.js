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
    $("#peopleInvolved").text(Math.floor(Math.random() * 11));
  });
});
