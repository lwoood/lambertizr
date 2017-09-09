<?php
    include('snippets/header.php');
    include('slots.php');
?>

    <section>
        <div class="row">
            <div class="columns text-center">
                <div style="display: block;" id="loading">
                    <i class="fa fa-circle-o-notch fa-spin fa-5x fa-fw"></i>
                </div>

                <div style="display: none;" id="loaded">
                    <div class="row">
                        <div class="columns small-4 medium-5 large-5 play-controlls text-right">
                            <a id="rewindButton" href="#" onclick="return rewind()">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-fast-backward fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div>
                        <div class="columns small-4 medium-2 large-2 ">                            
                            <a id="playButton" href="#" onclick="return play();"><i class="fa fa-play-circle fa-5x faa-pulse animated " aria-hidden="true"></i></a>
                            <a id="pauseButton" href="#" onclick="return pause();"><i class="fa fa-pause-circle fa-5x faa-pulse animated " aria-hidden="true"></i></a>
                        </div>
                        <div class="columns small-4 medium-5 large-5 play-controlls text-left">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-random fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    </div>                
                </div>

            </div>
        </div>
    </section>

    <div id="overlay-box"></div>

    <section>
        <div class="row collapse">

            <?php $index = 0; ?>
            <?php foreach($slots as $slot) :?>
                
                <div class="reveal" id="slot<?=$index?>" data-reveal>
                    <a class="close-button" data-close aria-label="Fenster schliessen"><span aria-hidden="true">&times;</span></a>
                    <div class="row">
                        <div class="columns large-3">
                            <div class="face shadow" style="background-image: url(<?=$slot['image']?>)">&nbsp;</div>
                        </div>
                        <div class="columns large-9">
                            <h3><?=$slot['position']?></h3>
                            <h2><?=$slot['name']?></h2>
                            <p>Durchschnittliche Bewertung: <strong>4/5</strong></p>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>

                <div class="columns large-3 medium-6 text-center end">
                    <div class="slot faa-parent animated-hover" style="background-image: url(https://img.youtube.com/vi/<?=$slot['youtube_id']?>/hqdefault.jpg);">
                        <div class="selection">
                            <select>
                                <?php foreach($slots as $person) :?>
                                    <option style="background-image:url(<?=$person['image']?>);" <?php if($slot['name'] == $person['name']):?> selected="selected"<?php endif; ?>><?=$person['position']?> - <?=$person['name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <a data-open="slot<?=$index?>"><div class="face shadow" style="background-image: url(<?=$slot['image']?>)">&nbsp;</div></a>
                        
                        <!-- PLAYER -->
                        <div class="responsive-embed widescreen">
                            <div style="display: none;" id="player<?=$index?>"></div>
                            <div class="preloader" style="display: block;" id="preloader<?=$index?>"></div>
                        </div>

                        <div class="row controlls collapse">
                            <div class="columns small-1">
                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                            </div>
                            <div class="columns small-6 medium-5 large-5">
                                <input type="range">
                            </div>
                            <div class="columns small-5 medium-6 large-6">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $index++; ?>

            <?php endforeach; ?>
           
        </div>
    </section>

    <section id="best">
        <div class="row">
            <div class="columns text-center">
                <h2>Bestes Kollektiv:</h2>
                <p></p>
            </div>
        </div>
        <div class="row">
            <hr />
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Gesang</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-1/p160x160/20032073_10213355838074381_1208217404505045179_n.jpg?oh=6d74934616c7f616090af804570478c3&oe=5A3961DD)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Keys</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/11149560_10204177688662550_8299272863714289814_n.jpg?oh=7f8bdb7de39d8260eb97b5d8d08e7192&oe=5A17E0D6)">&nbsp;</div>

                    <div class="face shadow" style="opacity: 0.3; background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-1/c40.0.160.160/p160x160/39053_1327267871575_6391654_n.jpg?oh=db35381ad529c16a76eef84878a57495&oe=5A2B795D)">&nbsp;</div>

                    <div class="face shadow" style="opacity: 0.1; background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/20620753_10213207619246944_8387943976927958960_n.jpg?oh=8ac1afd8b6ebaa131e1b08b15ed95257&oe=5A36B2F0)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Gitarre</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/547323_101831236685777_85551954_n.jpg?oh=323c795b246da9b7f3365f2a4f14c98f&oe=5A26D277)">&nbsp;</div>

                    <div class="face shadow" style="opacity: 0.3; background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-1/c37.37.459.459/s160x160/188512_100414010127367_1013515095_n.jpg?oh=c4349a70922f850aa5f75b0af7472905&oe=5A1B6BE2)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Bass</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-1/p160x160/20264558_10155489260967836_7014727505024047179_n.jpg?oh=a982824c75dcaeb06015f9356e2ba569&oe=5A174820)">&nbsp;</div>

                    <div class="face shadow" style="opacity: 0.3; background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/16508850_1400538599964462_1941221405642739521_n.jpg?oh=8f16c95b8c8fddc85d27ca4c3cd275e7&oe=5A370834)">&nbsp;</div>
                </div>                
            </div>

            <div class="clearfix hide-for-medium">&nbsp;</div>

            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Drums</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-1/c79.28.356.356/s100x100/295810_10150306629451868_1498586298_n.jpg?oh=2f5e9c03ffd0de24091f8ff09d0b4b87&oe=5A388EC4)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Perkussion</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/13682_4307600294441_584194532_n.jpg?oh=8d7da69b2fb8c82e4128af41dc86834e&oe=5A358BBD)">&nbsp;</div>
                </div>                
            </div>

            <div class="clearfix show-for-medium-only">&nbsp;</div>

            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Backings</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/59296_106721552723186_6123420_n.jpg?oh=03ec3f37e7ccd1c022cbbd8850e4d109&oe=5A1F02A6)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>Brass</h3>
                    <div class="face shadow" style="background-image: url(https://scontent.ftxl1-1.fna.fbcdn.net/v/t1.0-9/13434825_902638809859621_2377294391229527337_n.jpg?oh=9fff521d9496e2b219cfaee1fc8109ac&oe=5A359859)">&nbsp;</div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>&nbsp;</h3>
                    <div class="face shadow"><i class="fa fa-3x fa-plus-circle faa-pulse faa-pulse" aria-hidden="true"></i></div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>&nbsp;</h3>
                    <div class="face shadow"><i class="fa fa-3x fa-plus-circle faa-pulse faa-pulse" aria-hidden="true"></i></div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>&nbsp;</h3>
                    <div class="face shadow"><i class="fa fa-3x fa-plus-circle faa-pulse faa-pulse" aria-hidden="true"></i></div>
                </div>                
            </div>
            <div class="columns small-3 medium-2 large-1 end">
                <div class="rotated">
                    <h3>&nbsp;</h3>
                    <div class="face shadow"><i class="fa fa-3x fa-plus-circle faa-pulse faa-pulse" aria-hidden="true"></i></div>
                </div>                
            </div>
        </div>
        
    </section>

    <hr  />

    <section>
        <div class="row">
            <div class="columns text-center">
                <h2>So machst Du mit:</h2>
            </div>
        </div>
        <div class="row">
            <div class="columns large-10 large-offset-1 end">
                <ol>
                    <li>Hier ist Dein <a download="freunde_click_120bpm.wav" href="downloads/freunde_click_120bpm.wav">Playalong</a>. Hier ist Dein <a href="">Leadsheet</a>.</li>
                    <li>Übe das Stück, bis es sitzt.</li>
                    <li>Nimm' Deine Performance auf Video auf. Hier die <a href="">Specs</a>.</li>
                    <li>Lade das Video bei YouTube hoch. Hier die <a href="">Specs</a>.</li>
                    <li>Klicke in Deinem Wunsch-Slot auf "Jetzt bewerben".</li>
                    <li>Füge die YouTube Adresse zum Video ein und sende ab.</li>
                </ol>
            </div>
        </div>
    </section>
    
    <hr />

    <section>
        <div class="row">
            <div class="columns text-center">
                <h2>LAMBERT Manifest:</h2>
            </div>
        </div>
        <div class="row">
            <div class="columns large-10 large-offset-1 end">
                <ol>
                    <li>LAMBERT ist ein Gefühl und kein Projekt.</li>
                    <li>LAMBERT ist meine Band. Es gibt keine andere.</li>
                    <li>Wir stellen alles in Frage.</li>
                    <li>Wir machen alles grundsäzlich anders.</li>
                    <li>Zuerst kommt die Arbeit, dann das Vergnügen.</li>
                    <li>Proben und Auftritte sind das Vergnügen.</li>
                    <li>Arbeit ist alles, was dazwischen passiert.</li>
                    <li>Basis-Demokratie in einer Band ist scheiße.</li>
                    <li>Kompromisse sind scheiße.</li>
                    <li>Ideen sind ohne Umsetzung nichts wert.</li>
                    <li>Gage steht der Band zu. Nicht den Musikern.</li>
                    <li>Wer bis hierhin gelesen hat, ist willkommen.</li>
                </ol>
            </div>
        </div>
    </section>

    <hr />

    <footer>
        <div class="row">
            <div class="columns text-center">
                <p>LAMBERT sucht Freunde. Nach wie vor. Auch in  <?=date('Y')?>.</p>
            </div>
        </div>
    </footer>
</main>

<?php // Youtube Player JS ?>
<script type="text/javascript" src="assets/js/player.js.php?playerCount=<?=$_GET['count']?>&id=<?=$_GET['id']?>&q=<?=$_GET['q']?>"></script>


<?php
    include('snippets/footer.php');
?>