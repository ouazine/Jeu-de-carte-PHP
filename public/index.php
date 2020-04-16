<?php
include_once "../Classes/Main.php";
      $main = new Main();
      $arrayCouleurs = $main->getColors();
      $arrayValeurs = $main->getValues();
      $main->shuffleCards();
      $CartesNonTriees = $main->tireCards(10);
      $main->sortCards();
      $CartesTriees = $main->tireCards(10);
      asort($CartesTriees);
      ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Jeux de carte PHP - Youssef EL OUAZINE</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css" media="screen" />
    <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="cards-ie.css" media="screen" />
    <![endif]-->
    <!--[if IE 9]>
        <link rel="stylesheet" type="text/css" href="cards-ie9.css" media="screen" />
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.options').addClass('active');
        $('.toggle li').click(function(){
            $('.playingCards').toggleClass($(this).text());
        });
        $('.lang li').click(function(){
            $('html').attr('lang', $(this).text());
            $('html').attr('xml:lang', $(this).text());
        });
    });
    //--></script>
    <style type="text/css">
        body {
            margin: 2em 20%;
        }
        .options.active {
            position: fixed;
            top: 1em;
            right: 1em;
            background: #ddd;
            padding: .5em;
        }
        .options.active h3 {
            font-size: 1.2em;
        }
        .options.active ul {
            padding: 0;
        }
        .options.active li {
            color: #00c;
            text-decoration: underline;
            margin-left: 1.5em;
            cursor: pointer;
        }
        .options.active li:hover {
            text-decoration: none;
        }
        div.clear {
            clear: both;
            height: 0;
            line-height: 0;
            font-size: 1px;
            visibility: hidden;
        }
    --></style>
</head>
<body>
<a href="" class="lien">Tirer une main</a>
<div class="playingCards fourColours rotateHand">
    <h3>Tire d'une main de 10 cartes</h3>
    

    <ul class="hand">
    <?php foreach($CartesNonTriees as $card): ?>
        <li>
            <a class="card rank-<?= $arrayValeurs[$card[1]]?> <?=  $arrayCouleurs[$card[0]] ?>" href="#">
                <span class="rank"><?= $arrayValeurs[$card[1]]?></span>
                <span class="suit">&<?=  $arrayCouleurs[$card[0]] ?>;</span>
            </a>
        </li>
    <?php endforeach;?>
    </ul>
    <div class="clear"></div>

    <h2 id="full">Carte triées par couleur et valeur</h2>

    <ul class="table">
    <?php foreach($CartesTriees as $card): ?>
        <li>
            <div class="card rank-<?= $arrayValeurs[$card[1]]?> <?=  $arrayCouleurs[$card[0]] ?>"><span class="rank"><?= $arrayValeurs[$card[1]]?></span><span class="suit">&<?=  $arrayCouleurs[$card[0]] ?>;</span></div>
        </li>
    <?php endforeach;?>   
    </ul>
</div>

</body>
</html>
