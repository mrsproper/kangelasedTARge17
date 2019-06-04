<?php
require("conf.php");

function getHeroes()
{
    global $connection;
    $query = $connection->prepare("SELECT * FROM heroes");
//echo $connection->error;
    $query->bind_result($id, $name, $real_name, $location, $is_real_hero, $state, $score, $thumb);
    $query->execute();
    $heroes = array();
    while ($query->fetch()) {
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
    $query->close();
    return $heroes;
}

function addScore($heroName) {
    global $connection;
    $query = $connection->prepare("UPDATE heroes SET score = score + 1 WHERE heroes.name = ?");
    $query->bind_param("s", $heroName);
    echo $connection->error;
    $query->execute();

}

function addNewHero($name, $realName, $location, $isSuperHero, $status, $thumb)
{
    global $connection;

    $query = $connection->prepare("INSERT INTO heroes (name, real_name, location, is_real_hero, state, thumb)
       VALUES (?, ?, ?, ?, ?, ?)");
    echo $connection->error;
    $query->bind_param("ssssss", $name, $realName, $location, $isSuperHero, $status, $thumb);
    $query->execute();
}

function deleteHero($id)
{
    global $connection;
    $query = $connection->prepare("DELETE FROM heroes WHERE id=?");
//    echo $connection->error;
    $query->bind_param("i", $id);
    $query->execute();
}

//---------------
/*if (array_pop(explode("/", $_SERVER["PHP_SELF"])) == "abifunktsioonid.php"):
    ?>
    <pre>
<?php
print_r(getHeroes());
?>
</pre>
<?php endif ?>*/