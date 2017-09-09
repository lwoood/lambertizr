<?php

    include('../../slots.php');

    header("Content-type: text/javascript");
?>

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

//var playerCount = <?=$_GET['playerCount']?>;
//var videoId = '<?=$_GET['id']?>';

<?php $counter = 0; ?>
<?php foreach($slots as $slot) : ?>
    var player<?=$counter?>;
    <?php $counter++; ?>
<?php endforeach; ?>

var global_error = new Array('', <?php for($i = 0; $i < count($slots); $i++):?>0,<?php endfor; ?>);
var tab_start = new Array('', <?php for($i = 0; $i < count($slots); $i++):?>1,<?php endfor; ?>);
var playerArray = new Array();

var limit = 7;

var playerVars = {
        'autoplay': 0,
        'controls': 0,
        'disablekb': 1,
        //'enablejsapi': 1,
        'fs': 0,
        'iv_load_policy': 3,
        'modestbranding': 1,
        'rel': 0,
        'showinfo': 0,
        'start': 0,
};

function onYouTubeIframeAPIReady() {

    function onPlayerStateChange(event) {
        var player_id = event.target.a.id;
        //console.log(player_id + ":" + event.data + ":" + event.target.getVideoLoadedFraction());

        if (event.data == YT.PlayerState.BUFFERING) {
            event.target.mute();
        } else if (event.data == YT.PlayerState.PLAYING) {               
            play();
        } else if (event.data == YT.PlayerState.PAUSED) {
            pause();
            event.target.unMute();
        } else if (event.data == YT.PlayerState.ENDED) {
            //rewind();
        } else if (event.data == YT.PlayerState.CUED) {
            event.target.unMute();
        }
    }

    function onPlayerReady(event) {
        event.target.setPlaybackQuality('tiny');
        event.target.seekTo(1);
        
        buffer();

        //event.target.pauseVideo();
    }

    function onPlaybackQualityChange(event) {

    }

    <?php $counter = 0; ?>
    <?php foreach($slots as $slot) : ?>
        player<?=$counter?> = new YT.Player('player<?=$counter?>', {
            videoId: '<?=$slot['youtube_id']?>',
            playerVars: playerVars,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange,
                'onPlaybackQualityChange': onPlaybackQualityChange,
            }
        });
        playerArray.push(player<?=$counter?>);
        <?php $counter++; ?>
    <?php endforeach; ?>
    
}

function buffer() {
    var tab_etat = new Array();
    var tab_charge = new Array();
    var tab_duree = new Array();
    var etat_perso = "null";
    var progress_buffer = 0;
    var timer = 0;
    var tab_temps_charge = new Array( <?php for($i = 0; $i < count($slots); $i++):?>8,<?php endfor; ?>);
    var tab_nom_player = new Array("", <?php for($i = 0; $i < count($slots); $i++):?>player<?=$i?>,<?php endfor; ?>);

    tab_etat[0] = tab_charge[0] = tab_duree[0] = "";
    document.getElementById('overlay-box').innerHTML = "";
    
    for (var i = 1; i <= <?=count($slots)?>; i++) {
        //console.log(i);
        tab_charge[i] = tab_nom_player[i].getVideoLoadedFraction();
        tab_duree[i] = tab_nom_player[i].getDuration();

        if ((tab_duree[i] == 0) || (global_error[i] == 1)) {
            tab_temps_charge[i] = 8;
        } else if (tab_start[i] != 0) {
            tab_temps_charge[i] = (tab_duree[i] * tab_charge[i]) - tab_start[i];
        } else {
            tab_temps_charge[i] = tab_duree[i] * tab_charge[i];
        }
       
        var duree_petite = tab_duree[i] - tab_start[i];
        if (duree_petite < 7) {
            var buffer_max = duree_petite;
        } else {
            var buffer_max = 7;
        }

        if (tab_temps_charge[i] >= buffer_max) {
            etat_perso = "<span style=\"color: #40CE42;\">Bereit</span>";
            tab_temps_charge[i] = 8;
        } else if (tab_temps_charge[i] > 0) {
            etat_perso = "<span style=\"color: #e1a22f;\">Buffering...</span>";
        } else {
            etat_perso = "<span style=\"color: #c04773;\">Initiere...</span>";
        }

        progress_buffer = Math.ceil(tab_temps_charge[i] * 100 / buffer_max);

        if (progress_buffer > 100) {
            progress_buffer = 100;
        } else if (progress_buffer < 0) {
            progress_buffer = "00";
        } else {
            progress_buffer = progress_buffer.toString().replace(/^(\d)$/, '0$1');
        }

        if ((tab_duree[i] == 0) || (global_error[i] == 1)) {
            progress_buffer = "XX";
        }

        /*
        document.getElementById('overlay-box').innerHTML += "Youtube " + i + ": ";
        document.getElementById('overlay-box').innerHTML += progress_buffer + "% | ";
        document.getElementById('overlay-box').innerHTML += etat_perso + "<br />";
        */

        if (progress_buffer == '100') {
            $('#player' + (i-1)).show();
            $('#preloader' + (i-1)).hide();

            $('#loading').hide();
            $('#loaded').show();

            //stop();

        } else {
            $('#preloader' + (i-1)).html(etat_perso);
            $('#loading').show();
            $('#loaded').hide();
        }
        
    }
    
    if ((tab_temps_charge[1] > 7) && (tab_temps_charge[2] > 7) && (tab_temps_charge[3] > 7) && (tab_temps_charge[4] > 7) && (tab_temps_charge[5] > 7) && (tab_temps_charge[6] > 7) && (tab_temps_charge[7] > 7) && (tab_temps_charge[8] > 7)) {
        clearTimeout(timer);
        for (var j = 1; j <= <?=count($slots)?>; j++) {
            tab_nom_player[j].seekTo(tab_start[j], true);
            tab_nom_player[j].pauseVideo();
        }
    } else {
        timer = setTimeout(buffer, 100);
    }
}

/*
function buffer() {

    //pause();

    for (var i = 0; i < playerArray.length; i++) {
        playerArray[i].mute();
        playerArray[i].seekTo(1, true);
        playerArray[i].playVideo(1);

    }

    return false;
}
*/

function rewind() {
    
    pause();

    for (var i = 0; i < playerArray.length; i++) {
        if (i >= limit) break;
        playerArray[i].seekTo(1);
    }

    //play();

    return false;
}

function play() {

    for (var i = 0; i < playerArray.length; i++) {
        if (i >= limit) break;
        playerArray[i].playVideo(1);
    }

    $('#pauseButton').show();
    $('#playButton').hide();

    return false;
}

function stop() {

    for (var i = 0; i < playerArray.length; i++) {
        if (i >= limit) break;
        playerArray[i].stopVideo(1);    
    }

    return false;
}

function pause() {

    for (var i = 0; i < playerArray.length; i++) {
        if (i >= limit) break;
        playerArray[i].pauseVideo(1);
    }

    $('#pauseButton').hide();
    $('#playButton').show();

    return false;
}