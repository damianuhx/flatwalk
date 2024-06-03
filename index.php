<?php

$pre='IMG_0';
$post='.JPG';

if (!isset ($_GET['room'])||!isset ($_GET['pos'])){$room='gang1'; $pos=0;}
        
if (isset ($_GET['room'])){$room=$_GET['room'];}
if (isset ($_GET['pos'])){$pos=intval($_GET['pos']);}

        //define places. the array of numbers defines the set and order of pictures when turning around
    $ort=array(
    'kueche'=>array(191, 192, 193, 194, 195, 196, 197, 198),
    'corin'=>array(200, 207, 206, 205, 204, 203, 202, 201),
    'balkon'=>array(221, 209, 211, 212, 213, 216, 219),
    'julia'=>array(230, 229, 228, 227, 236, 225, 224, 232),
    'gang2'=>array(176, 175, 182, 181, 180, 179, 178, 177),
    'gang1'=>array(264, 263, 262, 261, 260, 259, 257, 258),
    'eingang'=>array(272, 271, 270, 269, 268, 267, 266, 265),
    'mati'=>array(281, 280, 279, 278, 277, 276, 275, 274),
    'damian'=>array(256, 247, 248, 249, 251, 253, 254, 255),
    'shpresa'=>array(246, 244, 242, 241, 240, 239, 238, 237),
    'wc'=>array(183, 186, 185, 184),
    'bad'=>array(190, 189, 188, 187)
    );

    if ($_GET['way']=='<<')
        {
            if ($pos>0){$pos--;}
            else {$pos=count($ort[$room])-1;}
        }
        if ($_GET['way']=='>>')
        {   
            if ($pos<count($ort[$room])-1){$pos++;}
            else {$pos=0;}
        }
        if ($_GET['way']=='^')
        {
            $pic=$ort[$room][$pos];
        }
        echo $pic;

        //this array defines what position (i.e. picture number) in the $ort (room) array is taken after the player has moved forward. 
    $pfad1=array(
        175=>0,
        176=>0,
        177=>0,
        178=>0,
        179=>2,
        181=>1,
        182=>7,
        185=>5,
        188=>5,
        195=>3,
        196=>3,
        200=>1,
        201=>1,
        202=>6,
        203=>6,
        204=>2,
        205=>2,
        216=>4,
        225=>7,
        236=>2,
        241=>7,
        242=>7,
        253=>7,
        254=>7,
        257=>0,
        258=>1,
        259=>1,
        261=>1,
        262=>1,
        265=>6,
        263=>7,
        267=>6,
        269=>1,
        277=>4
    );

        //this array defines in which pictures you can move forward to which room
    $pfad2=array(
        175=>'wc',
        176=>'bad',
        177=>'kueche',
        178=>'corin',
        179=>'gang1',
        181=>'damian',
        182=>'shpresa',
        185=>'gang2',
        188=>'gang2',
        195=>'gang2',
        196=>'gang2',
        200=>'balkon',
        201=>'balkon',
        202=>'julia',
        203=>'julia',
        204=>'gang2',
        205=>'gang2',
        216=>'corin',
        225=>'eingang',
        236=>'corin',
        241=>'gang2',
        242=>'gang2',
        253=>'gang2',
        254=>'gang2',
        257=>'gang2',
        258=>'damian',
        259=>'corin',
        261=>'eingang',
        262=>'eingang',
        263=>'mati',
        265=>'gang1',
        267=>'gang1',
        269=>'julia',
        277=>'gang1'
    );
    
    

        if ($_GET['way']=='^')
        {
            if (isset ($pfad2[$pic]) && isset($pfad1[$pic]) )
            {
            $room=$pfad2[$pic];
            $pos=$pfad1[$pic];
            }
        }
       
    $src=$pre.strval($ort[$room][$pos]).$post;

    echo '<img style="height: 95%; text-align: center;" src="'.$src.'">'; 
    echo '<form style="text-align: center;" action="'.$_SERVER['PHP_SELF'].'" method="get">'."\n";
    echo '<input type="hidden" name="room" value="'.$room.'" />'."\n";
    echo '<input type="hidden" name="pos" value="'.$pos.'" />'."\n";
    echo '<input type="submit" name="way" value="<<" />'."\n";
    echo '<input type="submit" name="way" value="^" />'."\n";
    echo '<input type="submit" name="way" value=">>" />'."\n";
    echo '</form>'."\n";
?>
