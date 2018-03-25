<div class="ac-main-header" id="mainHeader">


    <a href="javascript:void(0);" class="ac-main-header-menue-sandwish" onclick="afficheNav()">
        &#xf003;
    </a>

    <div id="bouttonCreeGroup" type="submit" class="ac-main-header-createGroup">
        &#xe7f0;
    </div>

    <a id="bouttonVoirAllGroup" type="submit" class="ac-main-header-allGroup" href="index.php?list_group">
        &#xf0c0;
    </a>

    <a id="bouttonVoirAllEvent" type="submit" class="ac-main-header-allEvent" href="index.php?list_event">
        &#xe878;
    </a>

    <div href="index.php?logout" type="submit" class="ac-main-header-logout">
        &#xf011;
    </div>


</div>

<div class="ac-listEvent" id="listEvent">

    <div class="ac-listEvent-header">

        <a href="index.php" class="ac-listEvent-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <div class="ac-listEvent-header-title">
        Liste des évènements
        </div>

    </div>

    <div class="ac-listEvent-body">

        <?php
        foreach ($event_list as $events) {
            echo"<h1>liste des events</h1>";
            echo"<ul>";
            if (!empty($events['id_event'])) {
                echo '<li>id : '. $events['id_event'].'</li>';
            }
            if (!empty($events['nom'])) {
                echo '<li>title : '.$events['nom'].'</li>';
            }
            if (!empty($events['description'])) {
                echo '<li>description : ' . $events['description'].'</li>';
            }
            if (!empty($events['type'])) {
                echo '<li>type : ' . $events['type'].'</li>';
            }
            if (!empty($events['start'])) {
                echo '<li>debut : ' . $events['start'].'</li>';
            }
            if (!empty($events['start_hour'])) {
                echo '<li>heure du debut : ' . $events['start_hour'].'</li>';
            }
            if (!empty($events['end'])) {
                echo '<li>fin : ' . $events['end'].'</li>';
            }
            if (!empty($events['end_hour'])) {
                echo '<li>heure de  fin : ' . $events['end_hour'].'</li>';
            }
            echo"</ul>";
            echo'<form  action="index.php" method="post">
                    <button type="submit" class="" id="saveGroup"  name="view" value="set_event">
                        Modifier
                    </button>
                    <input type="hidden" value="'.$events['id_event'].'" name="id_event">
                </form>';
        }
        ?>

    </div>

</div>

