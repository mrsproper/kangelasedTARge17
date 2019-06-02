<?php
require("conf.php");
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New hero</title>
    <style media="screen">
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .row:after {
            display: block;
            content: '';
            clear: both;
        }

        .col-7 {
            width: 70%;
            padding: 0 10px;
        }

        .col-3 {
            width: 30%;
            padding: 0 10px;
        }

        .fleft {
            float: left;
        }

        .box {
            box-sizing: border-box;
        }

        table th, table td {
            padding: 10px 5px;
        }

        table th {
            text-align: left;
            padding-left: 0;
        }

        table td {
            text-align: left;
        }

        h1 {
            color: #99C3FA;
        }

        .thumbnail {
            display: block;
            float: left;
            padding: 10px 5px;
        }

        .thumbnail img {
            display: block;
            max-width: 100px;
            height: 100px;
            width: auto;
            background: #C4FFE3;
        }

        .large-image {
            padding: 5px;
        }

        .large-image img {
            display: block;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-kangelased.css"/>
</head>
<body>

<section class="container">
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
</section>

</body>
</html>
