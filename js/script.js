var answerArray = new Array(
  "Avalanche",
  "Human attack",
  "Animal attack",
  "Storm",
  "Fire",
  "Stealing",
  "Hostage situation",
  "Lost",
  "Sickness"
);

function getAnswer() {
  document.getElementById("answerDiv").innerHTML =
    "<p>" +
    answerArray[Math.floor(Math.random() * answerArray.length)] +
    " <br>People involved: " +
    Math.floor(Math.random() * 11) +
    "</p>";
}

$(function() {
  $(".heros tr:not(.accordion)").hide();
  $(".heros tr:first-child").show();

  $(".heros tr.accordion")
    .click(function() {
      $(this)
        .nextAll("tr")
        .fadeToggle(500);
    })
    .eq(0)
    .trigger("click");
});
