<!doctype html>
<html class="no-js" lang="de">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <title>LAMBERT reloaded - Bewirb Dich jetzt!</title>
    
    <meta name="author" content="LAMBERT">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="assets/img/favicons/favicon.ico">

    <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400" rel="stylesheet">

    <?php // Foundation ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />

    <?php // Fontawesome ?>
    <link rel="stylesheet" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css" integrity="sha256-C4J6NW3obn7eEgdECI2D1pMBTve41JFWQs0UTboJSTg=" crossorigin="anonymous" />

    <?php // jQuery ?>
    <script integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <?php // Custom Formats ?>
    <link href="assets/css/format.css" rel="stylesheet">
  
</head>
<body id="top" name="top">
<main>

    <header>
        <div class="row">
            <div class="columns large-offset-4 large-4 text-center">
               LAMBERT RELOADED 2017 LOGO
            </div>
            <div class="columns large-4 medium-6 text-center">
                <a class="button" href="//www.facebook.com/lambertband"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a class="button" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
            </div>
        </div> 
        <div class="row">
            <div class="columns text-center">
                <h2>Bewerben. Abliefern. Dabei sein.</h2>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="columns text-center large-4 large-offset-4">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="GET"> 
                    <div class="row collapse">
                        <div class="columns large-1">
                            <label>
                                <select name="count">
                                    <?php $index = 0; ?>
                                    <?php foreach($slots as $slot) :?>
                                        <?php $index++; ?>
                                        <option value="<?=$index?>" <?php if($_GET['count'] == $index): echo 'selected'; endif; ?>><?=$index?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                        <div class="columns large-1">
                            <div style="padding-top: 0.3rem;">X</div>
                        </div>
                        <div class="columns large-4">
                            <label>
                                <input type="text" name="id" value="<?=$_GET['id']?>" placeholder="YouTube-ID" />
                            </label>
                        </div>
                        <div class="columns large-3">
                            <label>                               
                                <select name="q">
                                    <option value="tiny" <?php if($_GET['q'] == "tiny"): echo 'selected'; endif; ?>>144p</option>
                                    <option value="small" <?php if($_GET['q'] == "small"): echo 'selected'; endif; ?>>240p</option>
                                    <option value="medium" <?php if($_GET['q'] == "medium"): echo 'selected'; endif; ?>>360p</option>
                                    <option value="large" <?php if($_GET['q'] == "large"): echo 'selected'; endif; ?>>480p</option>
                                    <option value="hd720" <?php if($_GET['q'] == "hd720"): echo 'selected'; endif; ?>>720p</option>
                                </select>
                            </label>
                        </div>
                        <div class="columns large-2">
                            <input class="button" type="submit" name="Teste" value="Teste Einstellungen" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        -->
    </header>