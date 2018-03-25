<script>
    $(document).ready(function () {

        // Le calendrier peut être charger dans la page :

        $('#calendar').fullCalendar({

            minTime: "00:00:00",

            maxTime: "24:00:00",

            contentHeight: "auto",

            events: [


                <?php
                foreach ($event_list as $events) {
                    echo "{";
                    if (!empty($events['id'])) {
                        echo 'id : "' . $events['id'] . '",';
                    }
                    if (!empty($events['nom'])) {
                        echo 'title : "' . $events['nom'] . '",';
                    }
                    if (!empty($events['description'])) {
                        echo 'description : "' . $events['description'] . '",';
                    }
                    if (!empty($events['type'])) {
                        echo 'type : "' . $events['type'] . '",';
                    }
                    if (!empty($events['start'])) {
                        echo 'start : "' . $events['start'] . 'T'.$events['start_hour'].'",';
                    }
                    if (!empty($events['end'])) {
                        echo 'end : "' . $events['end'] . 'T'.$events['end_hour'].'",';
                    }
                    echo "},";
                }
                ?>
            ],

            navLinks: true,
            navLinkWeekClick: 'agendaDay',
            navLinkDayClick: 'agendaDay',
            eventClick: function (event) {
                if (event.description) {
                    alert("event : " + event.title + "description : " + event.description);
                }
                else {
                    alert("event : " + event.title);
                }
            },
            editable: true,
            eventDrop: function (event, delta, revertFunc) {
                if (!confirm(event.title + " commence maintenant à : " + event.start.format() + " êtes-vous sûr de ce changement? ")) {
                    revertFunc();
                } else {

                }
            },

            customButtons: {
                Mois: {
                    text: 'Mois',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'month')
                    }
                },
                Semaine: {
                    text: 'Semaine',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'agendaWeek')
                    }

                },
                Jour: {
                    text: 'Jour',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'agendaDay')
                    }
                },
                Agenda: {
                    text: 'Agenda',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'listWeek')
                    }
                }

            },

            header: {
                right: 'Mois,Semaine,Jour,Agenda',
                center: 'title',
                left: 'prev,next,today'
            }

        });
    });
</script>

<div class="ac-main-header" id="mainHeader">

    <div class="fa fa-envelope-o ac-main-header-invitation" onclick="afficheNav()" id="enveloppe">

        <span class="ac-main-header-invitation-notif">
            <?php echo count($pending_invitation_list); ?>
        </span>

    </div >

    <div id="bouttonCreeGroup" type="submit" class="material-icons ac-main-header-createGroup">
        group_add
    </div>

    <a id="bouttonVoirAllGroup" type="submit" class="fa fa-group ac-main-header-allGroup" href="index.php?list_group">

    </a>

    <a id="bouttonVoirAllEvent" type="submit" class="material-icons ac-main-header-allEvent" href="index.php?list_event">
        event
    </a>

    <a href="index.php?logout" type="submit" class="fa fa-power-off ac-main-header-logout">

    </a>

</div>

<div class="ac-listEvent" id="listEvent">

    <div class="ac-listEvent-header">

        <a href="index.php" class="ac-listEvent-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <div class="ac-listEvent-header-title">
            Liste des évènements :
        </div>

    </div>

    <div class="ac-listEvent-body">

        <?php
        foreach ($event_list as $events) {
            echo"<div class='ac-listEvent-body-block'>";

                echo"<ul>";

                if (!empty($events['nom'])) {
                    echo '<li class="ac-listEvent-body-block-item ac-listEvent-body-block-item-nom">' . $events['nom'] . '</li>';
                }
                if (!empty($events['description'])) {
                    echo '<li class="ac-listEvent-body-block-item ac-listEvent-body-block-item-description">' . $events['description'] . '</li>';
                }
                if (!empty($events['type'])) {
                    echo '<li class="ac-listEvent-body-block-item">' . $events['type'] . '</li>';
                }
                if (!empty($events['start'])) {
                    echo '<li class="ac-listEvent-body-block-item">' . $events['start'] . '</li>';
                }
                if (!empty($events['start_hour'])) {
                    echo '<li class="ac-listEvent-body-block-item">' . $events['start_hour'] . '</li>';
                }
                if (!empty($events['end'])) {
                    echo '<li class="ac-listEvent-body-block-item">' . $events['end'] . '</li>';
                }
                if (!empty($events['end_hour'])) {
                    echo '<li class="ac-listEvent-body-block-item">' . $events['end_hour'] . '</li>';
                }
                    echo'<li class="ac-listEvent-body-block-item ac-listEvent-body-block-item-boutton">';
                    echo'<form  action="index.php" method="post">
                            <button type="submit" class="ac-listEvent-body-block-item-boutton-link" id="saveGroup"  name="view" value="set_event">
                                Modifier
                            </button>
                            <input type="hidden" value="'.$events['id_event'].'" name="id_event">
                        </form>';
                    echo'</li>';

                echo"</ul>";


            echo"</div>";



        }
        ?>

    </div>

</div>

