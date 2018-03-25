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

