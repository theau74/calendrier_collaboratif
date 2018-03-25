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
                    if (!empty($events['start'])) {
                        echo 'Estart : "' . $events['start'] . 'T'.$events['start_hour'].'",';
                    }
                    if (!empty($events['end'])) {
                        echo 'end : "' . $events['end'] . 'T'.$events['end_hour'].'",';
                    }
                    if (!empty($events['end'])) {
                        echo 'Eend : "' . $events['end'] . 'T'.$events['end_hour'].'",';
                    }
                    echo "},";
                }
                ?>
            ],

            navLinks: true,
            navLinkWeekClick: 'agendaDay',
            navLinkDayClick: 'agendaDay',
            eventClick: function (event) {
                display_event_popup(event.id);
            },
            editable: true,
            eventDrop: function (event, delta, revertFunc) {
                if (confirm(event.title + " commence maintenant à : " + event.start.format() + " êtes-vous sûr de ce changement? ")) {
                    moove_event_by_id(event.id, event.start.format(), event.end.format())

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

<div class="ac-main-nav" style="display: none;" id="nav-bar">

    <div class="ac-main-nav-invit">

        <?php

        foreach ($pending_invitation_list as $invitation) {
            echo "<div class='ac-main-nav-invit-item'>";
            echo "<ul class='ac-main-nav-invit-item-description'>";
            if (!empty($invitation['event_name'])) {
                echo "<li class='ac-main-nav-invit-item-description-name'>" . $invitation['event_name'] . '</li>';
            }
            if (!empty($invitation['start'])) {
                echo "<li class='ac-main-nav-invit-item-description-jourStart'>" . $invitation['start'] . '</li>';
            }
            if (!empty($invitation['start_hour'])) {
                echo "<li class='ac-main-nav-invit-item-description-heureStart'>" . $invitation['start_hour'] . '</li>';
            }
            if (!empty($invitation['end'])) {
                echo "<li class='ac-main-nav-invit-item-description-jourFin'>" . $invitation['end'] . '</li>';
            }
            if (!empty($invitation['end_hour'])) {
                echo "<li class='ac-main-nav-invit-item-description-heureFin'>" . $invitation['end_hour'] . '</li>';
            }
            if (!empty($invitation['description'])) {
                echo "<li class='ac-main-nav-invit-item-description-descript'>" . $invitation['description'] . '</li>';
            }
            echo "</ul>";

            echo "<div class='ac-main-nav-invit-item-boutton'>";

            echo '<form  action="index.php" method="post">
                                <button type="submit" class="ac-main-nav-invit-item-boutton-valider" id="saveEvent"  name="action" value="valid_event_invit">
                                    &#xf00c;
                                </button>
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="true" name="response">
                            </form>';

            echo '<form  action="index.php" method="post">
                                <button type="submit" class="ac-main-nav-invit-item-boutton-refuser" id="saveEvent"  name="action" value="deny_event_invit">
                                    &#xf00d;
                                </button>
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="false" name="response">
                            </form>';

            echo "</div>";

            echo "</div>";
        }
        ?>

    </div>

    <div class="ac-main-footer">

        <h2 class="ac-main-footer-title">
            Pimp My CSS
        </h2>

    </div>

</div>
