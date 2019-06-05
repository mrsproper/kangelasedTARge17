<?php
require("../../conf.php");
require("abifunktsioonid.php");

if (isSet($_POST["add"])) {
    addNewHero(
        $_REQUEST["SuperheroName"],
        $_REQUEST["RealName"],
        $_REQUEST["Location"],
        $_REQUEST["RealSuperhero?"],
        $_REQUEST["Good/Bad"],
        $_REQUEST["Image"]
    );
    echo '<div style="background: #90EE90">Hero is added, you will be redirected to heroes page after 5 seconds</div>';
    header( "refresh:5;url=kangelased.php" );
}
?>
<?php include('_header.php') ?>
<main class="main">
    <div class="container">
        <a style="margin: 10px" href="kangelased.php">Back</a>
        <div class="row">
            <div class="col-3 fleft box">
                <table>
                    <form action="?" method="post" enctype="multipart/form-data">
                        <tr>
                            <th>Superhero name</th>
                            <td><input type="text" name='SuperheroName'></td>
                        </tr>
                        <tr>
                            <th>Real name</th>
                            <td><input type="text" name='RealName'></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td><input type="text" name='Location'></td>
                        </tr>
                        <tr>
                            <th>Real superhero?</th>
                            <td>
                                <select name="RealSuperhero?">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Good/Bad</th>
                            <td>
                                <select name="Good/Bad">
                                    <option value="Good">Good</option>
                                    <option value="Bad">Bad</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><input type="text" name='Image'></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="add" value="ADD">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include('_footer.php') ?>
