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
                var view = $('#calendar').fullCalendar('getView');
                alert("The view's title is " + view.title);
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

    <div class="ac-createGroup" style="display:none;" id="createGroup">

        <form action="index.php" method="post">

            <div class="ac-createGroup-header">

                <div class="ac-createGroup-header-close" id="closeGroup">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="saveGroup"  name="action" value="create-group">
                    Enregistrer
                </button>

                <input type="text" class="ac-createGroup-header-title" name="nom" placeholder="Nom du Groupe :" required>

            </div>

            <div class="ac-createGroup-body">

                <h1 class="ac-createGroup-body-addTitle">
                    Crez un groupe et ajoutez-y des membres
                </h1>

                <div class="ac-createGroup-body-item">
                    <input type="text" class="ac-createGroup-body-description-input" name="description" placeholder="Description">
                </div>

                <ul class="ac-createGroup-body-ul">

                    <li class="ac-createGroup-body-columns">

                        <h2 class="ac-createGroup-body-h2">
                            Prénom
                        </h2>

                        <h2 class="ac-createGroup-body-h2">
                            Nom
                        </h2>

                        <h2 class="ac-createGroup-body-h2">
                            Rang
                        </h2>

                    </li>

                    <?php
                    foreach ($users_list as $user) {
                        echo"<li class='ac-createGroup-body-item'>";

                        echo "<p class='ac-createGroup-body-item-name'>" . $user['Fname'] . "</p>";
                        echo "<p class='ac-createGroup-body-item-lname'>" . $user['Lname'] . "</p>";
                        echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
                                 <option value='3'>Utilisateur</option>
                                 <option value='2'>Administrateur</option>
                            </select>";
                        echo "<label class='ac-createGroup-popUp-checkbox-container'>";
                        echo '<input class="ac-container ac-createGroup-body-item-checkbox" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                        echo "<span class='ac-createGroup-popUp-checkbox-container-checkmark'></span>";
                        echo "</label>";

                        echo "</li>";
                    }
                    ?>

                </ul>



            </div>

        </form>

    </div>

    <div class="ac-createGroup-popUp" style="display:none;" id="createGroup-popUp">

        <form action="index.php" method="post">

            <div class="ac-createGroup-popUp-content">

                <div class="ac-createGroup-header">

                    <div class="ac-createGroup-header-close" id="closeGroup-popUp">
                        &#xf00d;
                    </div>

                    <button type="submit" class="ac-createEvent-header-save" id="saveGroup"  name="action" value="create-group">
                        Enregistrer
                    </button>

                    <input type="text" class="ac-createGroup-header-title" name="nom" placeholder="Nom du Groupe ..." required>

                </div>

                <div class="ac-createGroup-popUp-body">

                    <h1 class="ac-createGroup-popUp-body-addTitle">
                        Ajouter des membres
                    </h1>

                    <ul class="ac-createGroup-popUp-body-ul">

                        <li class="ac-createGroup-popUp-body-columns">

                            <h2 class="ac-createGroup-popUp-body-h2">
                                Prénom
                            </h2>

                            <h2 class="ac-createGroup-popUp-body-h2">
                                Nom
                            </h2>

                            <h2 class="ac-createGroup-popUp-body-h2">
                                Rang
                            </h2>

                        </li>

                        <?php
                        foreach ($users_list as $user) {
                            echo"<li class='ac-createGroup-body-item'>";
                            echo "<p class='ac-createGroup-popUp-body-item-name'>" . $user['Fname'] . "</p>";
                            echo "<p class='ac-createGroup-popUp-body-item-lname'>" . $user['Lname'] . "</p>";
                            echo"<select class='ac-createGroup-popUp-body-item-select' name='user_right[]'>
                                     <option value='3'>Utilisateur</option>
                                     <option value='2'>Administrateur</option>
                                </select>";
                            echo "<label class='ac-createGroup-popUp-checkbox-container'>";
                            echo '<input class="ac-container" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                            echo "<span class='ac-createGroup-popUp-checkbox-container-checkmark'></span>";
                            echo "</label>";
                            echo "</li>";
                        }
                        ?>

                    </ul>

                </div>

                <div class="ac-createGroup-popUp-body-description">
                    <input type="text" class="ac-createGroup-popUp-body-description-input" name="description" placeholder="Description ...">
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