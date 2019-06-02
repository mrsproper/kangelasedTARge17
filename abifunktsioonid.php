<?php
require("conf.php");

/*
function getHeroes($looma_id)
{
    global $yhendus;
//    echo $looma_id;
    $kask = $yhendus->prepare("SELECT loomad.nimi, liik.nimi, vanus, ster_kastr, valimus, sugu, leitud, varjupaigas, karantiinis FROM loomad, liik
WHERE loomad.id=? AND loomad.liik_id=liik.id");
    $kask->bind_param("i", $looma_id);
    $kask->execute();
    $kask->store_result();
    $num_of_rows = $kask->num_rows;
//    echo $yhendus->error;
    $kask->bind_result($nimi, $liik, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis);
    $kask->execute();
    $hoidla = array();
    while ($kask->fetch()) {
        $loomad = new stdClass();
        $loomad->nimi = htmlspecialchars($nimi);
        $loomad->vanus = htmlspecialchars($liik);
        $loomad->ster_kastr = htmlspecialchars($vanus);
        $loomad->valimus = htmlspecialchars($valimus);
        $loomad->sugu = htmlspecialchars($sugu);
        $loomad->leitud = htmlspecialchars($leitud);
        $loomad->varjupaigas = htmlspecialchars($varjupaigas);
        $loomad->karantiinis = htmlspecialchars($karantiinis);
        array_push($hoidla, $loomad);
    }
    return $hoidla;
}
*/

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


function looRippMenyy($liigid, $valikunimi, $valitudid = "")
{
    $tulemus = "<select name='$valikunimi'>";
    foreach ($liigid as $item) {
        $lisand = "";
        $array = get_object_vars($item);
        $id = array_values($array)[0];
        $liik = array_values($array)[1];
        if ($id == $valitudid) {
            $lisand = " selected='selected'";
        }
        $tulemus .= "<option value='$id' $lisand >$liik</option>";
    }
    $tulemus .= "</select>";
    return $tulemus;
}

function lisaLiik($liik)
{
    global $yhendus;
    $kask = $yhendus->prepare("INSERT INTO liik (nimi) VALUES (?)");
    $kask->bind_param("s", $liik);
    $kask->execute();
}

function lisaLoom($nimi, $liik_id, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis, $pilt, $thumb1, $thumb2, $thumb3)
{
    global $yhendus;
    if ($pilt['tmp_name']) {
        $tmp_img = $pilt['tmp_name'];
        $file = mysqli_real_escape_string($yhendus, file_get_contents($tmp_img));
    } else {
        $file = " ";
    }

    $kask = $yhendus->prepare("INSERT INTO
       loomad (nimi, liik_id, vanus, ster_kastr, valimus, sugu, leitud, varjupaigas, karantiinis, pilt, thumb1, thumb2, thumb3)
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '$file', ?, ?, ?)");
    echo $yhendus->error;
    $kask->bind_param("siisssssssss", $nimi, $liik_id, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis, $thumb1, $thumb2, $thumb3);
    $kask->execute();
}

function kustutaLoom($looma_id)
{
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM loomad WHERE id=?");
//    echo $yhendus->error;
    $kask->bind_param("i", $looma_id);
    $kask->execute();
}

function muudaLoom($looma_id, $nimi, $liik_id, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis, $pilt, $thumb1, $thumb2, $thumb3)
{
    global $yhendus;
    if (!empty($pilt['tmp_name'])) {
        $tmp_img = $pilt['tmp_name'];
        $file = mysqli_real_escape_string($yhendus, file_get_contents($tmp_img));
        $kask = $yhendus->prepare("UPDATE loomad SET nimi=?, liik_id=?, vanus=?, ster_kastr=?, valimus=?, sugu=?, leitud=?, varjupaigas=?, karantiinis=?,
                     pilt='" . $file . "', thumb1=?, thumb2=?, thumb3=? WHERE loomad.id=?");
        echo $yhendus->error;
        $kask->bind_param("siisssssssssi", $nimi, $liik_id, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis, $thumb1, $thumb2, $thumb3, $looma_id);
        $kask->execute();
    } else {
        $kask = $yhendus->prepare("UPDATE loomad SET nimi=?, liik_id=?, vanus=?, ster_kastr=?, valimus=?, sugu=?, leitud=?, varjupaigas=?, karantiinis=?,
                     thumb1=?, thumb2=?, thumb3=? WHERE loomad.id=?");
//        echo $yhendus->error;
        $kask->bind_param("siisssssssssi", $nimi, $liik_id, $vanus, $ster_kastr, $valimus, $sugu, $leitud, $varjupaigas, $karantiinis, $thumb1, $thumb2, $thumb3, $looma_id);
        $kask->execute();
    }
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