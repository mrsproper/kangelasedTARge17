<?php
require("conf.php");
require("abifunktsioonid.php");

$heroesList = getHeroes();

if (isSet($_POST["rescue"])) {
    addScore($_REQUEST["personName"]);
    header("Location: kangelased.php");
}

if (isset($_REQUEST["vaatamisid"])) {
    header("Location: vaatamine.php?vaatamisid=" + $_REQUEST["vaatamisid"]);
}

if (isset($_REQUEST["muutmisid"])) {
    header("Location: muutmine.php?muutmisid=" + $_REQUEST["muutmisid"]);
}

if (isSet($_REQUEST["kustutusid"])) {
    kustutaLoom($_REQUEST["kustutusid"]);
    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Superheroes!</title>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-kangelased.css"/>
</head>
<body>
<header>
    <div class="header-images">
        <img src="pildid/spiderman_xs.png"/>
        <img src="pildid/kapow.png"/>
        <img src="pildid/winniepooh.png"/>
        <img src="pildid/boom.png"/>
        <img src="pildid/joker_xs.png"/>
    </div>
</header>
<main class="main">
    <div class="container">
        <h1>SUPERHEROES</h1>
        <form action="?" method="post">
            <div class="situation-generator">

                <div class="situation">
                    <a href="#" id="generate-situation">Generate a dangerous situation</a>
                    <p>Situation: <span id="answerDiv"></span></p>
                    <p>People involved: <span id="peopleInvolved"></span></p>
                    <input id="savingButton" type="submit" name="rescue" value="Rescue people!"
                           onclick="savingPeople(peopleCount)"/>
                    <p id="selectedHero"><span id="peopleSaved"></span></p>
                </div>
                <div class="situation-hero">
                    <select name="personName" id="heroSelect">
                        <option disabled selected value="default">Choose a hero!</option>
                        <?php foreach ($heroesList as $person) : ?>
                            <option value="<?= $person->name ?>" name="personName"><?= $person->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
        </form>
        <div class="table-wrapper">
            <table class="heros">
                <thead>
                <tr>
                    <th>Superhero name</th>
                    <th>Real name</th>
                    <th>Location</th>
                    <th>Real superhero?</th>
                    <th>Good/Bad</th>
                    <th>Score</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($heroesList as $hero) : ?>
                    <tr>
                        <td><?= $hero->name ?></td>
                        <td><?= $hero->realName ?></td>
                        <td><?= $hero->location ?></td>
                        <td><?= $hero->isRealHero ?></td>
                        <td><?= $hero->state ?></td>
                        <td><?= $hero->score ?></td>
                        <td><?php echo "<a data-fancybox=\"gallery\" href=\"" . $hero->thumb . "\" class=\"thumbnail\"><img src = " . $hero->thumb . "></a>" ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="form-buttons">
            <form>
                <input type="button" value="Add hero">
            </form>
            <form>
                <input type="button" value="Delete hero">
            </form>
        </div>
    </div>
</main>
<footer>
    <img src="pildid/batman_xs.png"/>
    <div class="footer-info">
        <h1>Superheroes</h1>
        <p>Visit us on</p>
        <a href="/">www.superheroes.com</a>
    </div>
    <img src="pildid/deadpool.png"/>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
