<?php
require("conf.php");
require("abifunktsioonid.php");

$heroesList = getHeroes();

if (isSet($_POST["delete"])) {
    deleteHero($_REQUEST["id"]);
    echo '<div style="background: #90EE90; margin: 10px">Hero is deleted, you will be redirected to heroes page after 5 seconds</div>';
    header("refresh:5;url=kangelased.php");
}
?>
<?php include('_header.php') ?>
<main class="main">
    <div class="container">
        <a style="margin: 10px" href="kangelased.php">Back</a>
        <div class="row">
            <div class="col-3 fleft box">
                <div class="table-wrapper">
                    <table class="heros">
                        <form action="?" method="post">
                            <thead>
                            <tr>
                                <th>Superhero name</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <select name="id">
                                        <?php foreach ($heroesList as $hero) : ?>
                                            <option value=<?= $hero->id ?>><?= $hero->realName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="delete" value="DELETE">
                                </td>
                            </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('_footer.php') ?>
