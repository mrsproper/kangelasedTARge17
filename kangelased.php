<?php
require("../../conf.php");
require("abifunktsioonid.php");

$heroesList = getHeroes();

if (isSet($_POST["rescue"])) {
    addScore($_REQUEST["personName"]);
    header("Location: kangelased.php");
}

?>
<?php include('_header.php') ?>
<main class="main">
    <div class="container">
        <h1>SUPERHEROES</h1>
        <a href="addHero.php">Add new hero</a>
        <br>
        <a href="deleteHero.php">Delete hero</a>
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
        <!-- <div class="table-wrapper">
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
        </div> -->
        <div class="heroes-list">
            <?php foreach($heroesList as $hero): ?>
                <div class="hero-item">
                    <div class="hero-item__header">
                        <?php echo "<a data-fancybox=\"gallery\" href=\"" . $hero->thumb . "\" class=\"thumbnail\"><img src = " . $hero->thumb . "></a>" ?>
                        <p class="hero--name"><?= $hero->name ?></p>
                        <span class="hero--toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="hero-item__body">
                        <p class="hero--real-name"><span>Real Name: </span><?= $hero->realName ?></p>
                        <p class="hero--location"><span>Location: </span><?= $hero->location ?></p>
                        <p><span>Good/Bad: </span><?= $hero->state ?></p>
                        <p><span>Is a real superhero: </span><?= $hero->isRealHero ?></p>
                        <p class="hero--score"><span>Score: </span><?= $hero->score ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>    
</main>
<?php include('_footer.php') ?>
