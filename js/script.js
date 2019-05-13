var answerArray = new Array("Avalanche", "Human attack", "Animal attack", "Storm", "Fire", "Stealing", "Hostage situation", "Lost", "Sickness");

function getAnswer() {
    document.getElementById('answerDiv').innerHTML = "<p>" +
    answerArray[Math.floor(Math.random() * answerArray.length)] + " <br>People involved: " + Math.floor(Math.random() * 11) + "</p>";
}