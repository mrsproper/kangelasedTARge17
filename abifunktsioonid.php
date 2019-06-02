<?php
require("conf.php");

function getHeroes()
{
    global $yhendus;
    $kask = $yhendus->prepare("SELECT * FROM heroes");
//echo $yhendus->error;
    $kask->bind_result($id, $name, $real_name, $location, $is_real_hero, $state, $score, $thumb);
    $kask->execute();
    $heroes = array();
    while ($kask->fetch()) {
        $hero = new stdClass();
        $hero->id = htmlspecialchars($id);
        $hero->name = htmlspecialchars($name);
        $hero->realName = htmlspecialchars($real_name);
        $hero->location = htmlspecialchars($location);
        $hero->isRealHero = htmlspecialchars($is_real_hero);
        $hero->state = htmlspecialchars($state);
        $hero->score = htmlspecialchars($score);
        $hero->thumb = $thumb;
        array_push($heroes, $hero);
    }
    $kask->close();
    return $heroes;
}

function addScore($heroName) {
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE heroes SET score = score + 1 WHERE heroes.name = ?");
    $kask->bind_param("s", $heroName);
    echo $yhendus->error;
    $kask->execute();

}

function addNewHero($name, $realName, $location, $isSuperHero, $status, $thumb)
{
    global $yhendus;

    $kask = $yhendus->prepare("INSERT INTO heroes (name, real_name, location, is_real_hero, state, thumb)
       VALUES (?, ?, ?, ?, ?, ?)");
    echo $yhendus->error;
    $kask->bind_param("ssssss", $name, $realName, $location, $isSuperHero, $status, $thumb);
    $kask->execute();
}

function deleteHero($id)
{
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM heroes WHERE id=?");
//    echo $yhendus->error;
    $kask->bind_param("i", $id);
    $kask->execute();
}

//---------------
if (array_pop(explode("/", $_SERVER["PHP_SELF"])) == "abifunktsioonid.php"):
    ?>
    <pre>
<?php
print_r(getHeroes());
?>
</pre>
<?php endif ?>