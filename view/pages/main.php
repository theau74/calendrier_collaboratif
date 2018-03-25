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
                    if (!empty($events['level'])) {
                        if ($events['level'] == '1' || $events['level'] == '2') {
                            echo 'editable : true,';
                        } else {
                            echo 'editable : false,';
                        }
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
            eventDrop: function (event, delta, revertFunc) {
                if (confirm(event.title + " commence maintenant à : " + event.start.format() + " êtes-vous sûr de ce changement? ")) {
                    moove_event_by_id(event.id, event.start.format(), event.end.format())

                }else{
                    revertFunc();
                }
            },
            eventResize: function (event, delta, revertFunc) {
                if (confirm(event.title + " commence maintenant à : " + event.start.format() + " êtes-vous sûr de ce changement? ")) {
                    moove_event_by_id(event.id, event.start.format(), event.end.format())

                }else{
                    revertFunc();
                }
            },

            customButtons: {
                Mois: {
                    text: 'Mois',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'month');
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },
                Semaine: {
                    text: 'Semaine',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'agendaWeek');
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },next: {
                    text: 'next',
                    click: function () {
                        $('#calendar').fullCalendar( 'next' )
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },prev: {
                    text: 'prev',
                    click: function () {
                        $('#calendar').fullCalendar( 'prev' )
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },today: {
                    text: 'today',
                    click: function () {
                        $('#calendar').fullCalendar( 'today' )
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },
                Jour: {
                    text: 'Jour',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
                    }
                },
                Agenda: {
                    text: 'Agenda',
                    click: function () {
                        $('#calendar').fullCalendar('changeView', 'listWeek');
                        var view = $('#calendar').fullCalendar('getView');
                        cookieName = "start";
                        cookieValue = view.start;
                        document.cookie = cookieName+"="+escape(cookieValue)
                        cookieName = "type";
                        cookieValue = view.type;
                        document.cookie = cookieName+"="+escape(cookieValue)
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
    <?php
    if(isset($_COOKIE['start']) && isset($_COOKIE['type'])) {
        $view_start = explode(" ", $_COOKIE['start']);
        $start_month = DateTime::createFromFormat('M', $view_start[1]);
        if($_COOKIE['type']== "month"){
            $start_month->add(new DateInterval('P1M'));
        }
        $start_month = $start_month->format('m');
        $start = "" . $view_start[3] . "-" . $start_month . "-" . $view_start[2] . "";
        $type = $_COOKIE['type'];
    }else{
        $start = "today";
        $type = "month";
    }
    ?>
    $( window ).ready(function() {
        $('#calendar').fullCalendar( 'changeView', '<?php echo $type;?>', '<?php echo$start; ?>' )
    });
</script>

<form id="moove-event" action="index.php"  method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>

<div class="ac-main">

    <div class="ac-main-calendrier" id="cal">

        <div id="calendar">

        </div>

        <button id="bouttonCreeEvent" type="submit" class="ac-main-calendrier-createEvent"  name="action" value="create-event">
            +
        </button>

    </div>

    <div class="ac-createEvent" style="display:none;" id="createEvent">

        <form action="index.php" method="post">

            <div class="ac-createEvent-header">

                <div class="ac-createEvent-header-close" id="closeEvent">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="saveEvent"  name="action" value="create-event">
                    enregistrer
                </button>

                <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement :"  name="nom" required>

            </div>

            <div class="ac-createEvent-body">

                <div class="ac-createEvent-body-creneaux">

                    <h1 class="ac-createEvent-body-creneaux-title">
                        Date et horaires
                    </h1>

                    <label class="ac-createEvent-body-item">

                        <p class="ac-createEvent-body-item-fullDay" id="checkbox-container">
                            Toute la journée
                        </p>

                        <input type="checkbox">

                        <span class="ac-createEvent-body-item-checkmark">

                        </span>

                    </label>

                    <div class="ac-createEvent-body-creneaux-first">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date" required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type"
                               name="start_time" required>

                    </div>

                    <div class="ac-createEvent-body-creneaux-second">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date" required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time" required>

                    </div>

                </div>

                <div class="ac-createEvent-body-description">
                    <input class="ac-createEvent-body-description-input" type="text" placeholder="Description :"
                           name="description" required>
                </div>

                <div class="ac-createEvent-body-invitation">

                    <h1 class="ac-createEvent-body-invitation-title">
                        Invités
                    </h1>

                    <?php
                    echo '<h2 class="ac-createEvent-body-invitation-users">Utilisateurs</h2>';
                    foreach ($users_list as $user) {
                        echo '<label class="ac-createEvent-body-item">';
                        echo '<span class="ac-createEvent-body-item-name">' . $user['Fname'] . '</span>';
                        echo '<span class="ac-createEvent-body-item-lname">' . $user['Lname'] . '</span>';
                        echo '<input type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                        echo"<select name='user_right[]'>
                             <option value='3'>utilisateur</option>
                             <option value='2'>admin</option>
                        </select>";
                        echo '<span class="ac-createEvent-body-item-checkmark"></span>';
                        echo "</label>";
                    }
                    echo '<h2 class="ac-createEvent-body-invitation-groups">Groupes</h2>';
                    foreach ($groups_list as $group) {
                        echo '<label class="ac-createEvent-body-item">';
                        echo '<span class="ac-createEvent-body-item-name">' . $group['nom'] . '</span>';
                        echo '<span class="ac-createEvent-body-item-lname">' . $group['description'] . '</span>';
                        echo '<input type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                        echo '<span class="ac-createEvent-body-item-checkmark"></span>';
                        echo '</label>';
                    }
                    ?>
                </div>

            </div>

        </form>

    </div>

    <div class="ac-createEvent-popUp" style="display: none" id="createEvent-Deskstop">

        <form action="index.php" method="post">

            <div class="ac-createEvent-popUp-content">

                <div class="ac-createEvent-popUp-header">

                    <div class="ac-createEvent-popUp-header-close" id="closeEventPopUp">
                        &#xf00d;
                    </div>

                    <button type="submit" class="ac-createEvent-popUp-header-save" id="savePopup"  name="action" value="create-event">
                        Enregistrer
                    </button>

                    <input class="ac-createEvent-popUp-header-title" type="text" placeholder="Titre de l'événement... " name="nom" required>

                </div>

                <div class="ac-createEvent-popUp-body">

                    <div class="ac-createEvent-popUp-body-creneaux">

                        <h1 class="ac-createEvent-popUp-body-creneaux-title">
                            Date et horaires
                        </h1>

                        <div class="ac-createEvent-popUp-body-creneaux-first">

                            <i class="ac-createEvent-popUp-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-popUp-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="start_date" required>

                            <input class="ac-createEvent-popUp-body-creneaux-hoursEv" type="time" placeholder="type"
                                   name="start_time" required>

                        </div>

                        <div class="ac-createEvent-popUp-body-creneaux-second">

                            <i class="ac-createEvent-popUp-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-popUp-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="end_date" required>

                            <input class="ac-createEvent-popUp-body-creneaux-hoursEv" type="time" placeholder=type
                                   name="end_time" required>

                        </div>

                        <label class="ac-createEvent-popUp-creneaux-checkbox-container">

                            <p id="ac-createEvent-popUp-creneaux-checkbox-container-name">
                                Toute la journée
                            </p>

                            <input type="checkbox">

                            <span class="ac-createEvent-popUp-creneaux-checkbox-container-checkmark">

                            </span>

                        </label>

                    </div>
                    <div class="ac-createEvent-popUp-body-invitation">

                        <h1 class="ac-createEvent-popUp-body-invitation-title">
                            Invités
                        </h1>

                        <?php
                        echo '<h2 class="ac-createEvent-popUp-body-invitation-users">Utilisateurs</h2>';
                        foreach ($users_list as $user) {
                            echo '<label class="ac-createEvent-popUp-checkbox-container">';
                            echo '<span class="name">' . $user['Fname'] . '</span>';
                            echo '<span class="lname">' . $user['Lname'] . '</span>';
                            echo '<input class="" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                            echo"<select name='user_right[]'>
                             <option value='3'>utilisateur</option>
                             <option value='2'>admin</option>
                        </select>";
                            echo '<span class="ac-createEvent-popUp-checkbox-container-checkmark"></span>';
                            echo "</label>";
                        }
                        echo '<h2 class="ac-createEvent-popUp-body-invitation-groups">Groupes</h2>';
                        foreach ($groups_list as $group) {
                            echo '<label class="ac-createEvent-popUp-checkbox-container">';
                            echo '<span class="name">' . $group['nom'] . '</span>';
                            echo '<span class="lname">' . $group['description'] . '</span>';
                            echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                            echo '<span class="ac-createEvent-popUp-checkbox-container-checkmark"></span>';
                            echo '</label>';
                        }
                        ?>
                    </div>

                </div>

                <div class="ac-createEvent-popUp-body-description">
                    <input class="ac-createEvent-popUp-body-description-input" type="text" placeholder="Description ..."
                           name="description" required>
                </div>

            </div>

        </form>

    </div>

    <div class="ac-popUpEvent" id="popup_event" style="display: none;">

        <input type="hidden" value="hide" id="popup_stat">

        <div class="ac-popUpEvent-content">

            <?php
            foreach ($event_list as $events) {
                echo '<div class="ac-popUpEvent-header event_popup" id="event_'.$events['id'].'" style="display: none">';
                echo '<ul>';
                if (!empty($events['nom'])) {
                    echo '<li class="ac-popUpEvent-header-item ac-popUpEvent-header-item-nom">' . $events['nom'] . '</li>';
                }
                if (!empty($events['type'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['type'] . '</li>';
                }
                if (!empty($events['start'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['start'] . ' ' . $events['start_hour'] . '</li>';
                }
                if (!empty($events['end'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['end'] . ' ' . $events['end_hour'] . '</li>';
                }
                if (!empty($events['description'])) {
                    echo '<li class="ac-popUpEvent-header-item ac-popUpEvent-header-item-description">' . $events['description'] . '</li>';
                }
                echo '</ul>';
                echo '<input type="button" class="ac-popUpEvent-header-close" id="closeFail" onclick="hide_envent_popup(' . $events['id'] . ')" value="Retour">';
                echo '</div>';

            }
            ?>

        </div>

    </div>

    <div class="ac-fontGris" id="fondGris"></div>

</div>