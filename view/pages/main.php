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
                        echo 'start : "' . $events['start'] . '",';
                    }
                    if (!empty($events['end'])) {
                        echo 'end : "' . $events['end'] . '",';
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
                if (!confirm(event.title + " commence maitenant a : " + event.start.format() + " ete vous sure de ce changement? ")) {
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

    <a href="javascript:void(0);" class="ac-main-header-menue-sandwish" onclick="afficheNav()">
        &#9776;
    </a>

    <button id="bouttonCreeGroup" type="submit" class="ac-main-header-createGroup"  name="action" value="create-event">
        &#xe7f0;
    </button>

    <form action="index.php?logout" method="post">

        <button type="submit" class="ac-main-header-logout" name="logout">
            Déconnexion
        </button>

    </form>

</div>

<div class="ac-main">

    <div class="ac-createEvent" style="display:none;" id="createEvent">
        <form action="index.php" method="post">
            <div class="ac-createEvent-header">

                <div class="ac-createEvent-header-close" id="closeEvent">
                    &#xf00d;
                </div>


                <button type="submit" class="ac-createEvent-header-save" id="saveEvent"  name="action" value="create-event">
                    enregistrer
                </button>

                <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement ..."  name="nom" required>

            </div>

            <div class="ac-createEvent-body">

                <div class="ac-createEvent-body-creneaux">

                    <label class="container">

                        <p id="checkbox-container">
                            Toute la journée
                        </p>

                        <input type="checkbox">

                        <span class="checkmark">

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
                    <input class="ac-createEvent-body-description-input" type="text" placeholder="Description"
                           name="description" required>
                </div>

                <?php
                foreach ($users_list as $user) {
                    echo '<label class="container">';
                    echo '<span class="name">' . $user['Fname'] . '</span>';
                    echo '<span class="lname">' . $user['Lname'] . '</span>';
                    echo '<input class="" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                    echo '<span class="checkmark"></span>';
                    echo "</label>";
                }
                foreach ($groups_list as $group) {
                    echo '<label class="container">';
                    echo '<span class="name">' . $group['nom'] . '</span>';
                    echo '<span class="lname">' . $group['description'] . '</span>';
                    echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                    echo '<span class="checkmark"></span>';
                    echo '</label>';
                }
                ?>

            </div>
        </form>
    </div>

    <div class="ac-createEvent-popUp" style="display: none" id="createEvent-Deskstop">
        <form action="index.php" method="post">
            <div class="ac-createEvent-popUp-content">

                <div class="ac-createEvent-header">

                    <div class="ac-createEvent-popUp-header-close" id="closePopup">
                        &#xf00d;
                    </div>

                    <button type="submit" class="ac-createEvent-header-save" id="savePopup"  name="action" value="create-event">
                        Enregistrer
                    </button>

                    <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement... " name="nom" required>

                </div>

                <div class="ac-createEvent-popUp-body">

                    <div class="ac-createEvent-body-creneaux">

                        <label class="container">

                            <p id="checkbox-container">
                                Toute la journée
                            </p>

                            <input type="checkbox">

                            <span class="checkmark">

                            </span>

                        </label>

                        <div class="ac-createEvent-body-creneaux-first">

                            <i class="ac-createEvent-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="start_date" required>

                            <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type"
                                   name="start_time" required>

                        </div>

                        <div class="ac-createEvent-body-creneaux-second">

                            <i class="ac-createEvent-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="end_date" required>

                            <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type
                                   name="end_time" required>

                        </div>

                    </div>


                </div>

                <div class="ac-createEvent-body-description">
                    <input class="ac-createEvent-body-description-input" type="text" placeholder="Description"
                           name="description" required>
                </div>

                <?php
                foreach ($users_list as $user) {
                    echo '<label class="container">';
                    echo '<span class="name">' . $user['Fname'] . '</span>';
                    echo '<span class="lname">' . $user['Lname'] . '</span>';
                    echo '<input class="" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                    echo '<span class="checkmark"></span>';
                    echo "</label>";
                }
                foreach ($groups_list as $group) {
                    echo '<label class="container">';
                    echo '<span class="name">' . $group['nom'] . '</span>';
                    echo '<span class="lname">' . $group['description'] . '</span>';
                    echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                    echo '<span class="checkmark"></span>';
                    echo '</label>';
                }
                ?>

            </div>
        </form>
    </div>

    <div class="ac-createGroup" style="display:none;" id="createGroup">
        <form action="index.php" method="post">
            <div class="ac-createEvent-header">

                <div class="ac-createEvent-header-close" id="closeGroup">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="saveGroup"  name="action" value="create-event">
                    Enregistrer
                </button>

                <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement ..."  name="nom" required>

            </div>

            <div class="ac-createEvent-body">

                <div class="ac-createEvent-body-creneaux">

                    <label class="container">

                        <p id="checkbox-container">
                            Toute la journée
                        </p>

                        <input type="checkbox">

                        <span class="checkmark">

                        </span>

                    </label>

                    <div class="ac-createEvent-body-creneaux-first">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date">

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type"
                               name="start_time">

                    </div>

                    <div class="ac-createEvent-body-creneaux-second">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date">

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time">

                    </div>

                </div>

                <div class="ac-createEvent-body-description">
                    <input class="ac-createEvent-body-description-input" type="text" placeholder="Description"
                           name="description">
                </div>


                <label class="container">

                    <p id="checkbox-container">
                        Meeting
                    </p>

                    <input type="checkbox">

                    <span class="checkmark">

                        </span>

                </label>

                <label class="container">

                    <p id="checkbox-container">
                        Brainstorming
                    </p>

                    <input type="checkbox">

                    <span class="checkmark">

                        </span>

                </label>

                <label class="container">

                    <p id="checkbox-container">
                        Panel
                    </p>

                    <input type="checkbox">

                    <span class="checkmark">

                        </span>

                </label>


            </div>

    </div>

    <div class="ac-fontGris" id="fondGris">

    </div>

    <div class="ac-main-nav" id="nav-bar">

        <div class="ac-main-nav-invit" style="overflow-y: scroll;">

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
                if (!empty($invitation['group_name'])) {
                    echo "<li class='ac-main-nav-invit-item-description-nonGroupe'>" . $invitation['group_name'] . '</li>';
                }
                echo "</ul>";

                echo "<div class='ac-main-nav-invit-item-boutton'>";

                echo '<form  action="index.php" method="post">
                                <input class="ac-main-nav-invit-item-boutton-valider" type="submit"  name="action" value="valid-invit">
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="true" name="response">
                            </form>';

                echo '<form  action="index.php" method="post">
                                <input class="ac-main-nav-invit-item-boutton-refuser" type="submit"  name="action" value="deny-invit" >
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="false" name="response">
                            </form>';

                echo "</div>";

                echo "</div>";
            }
            ?>

        </div>

        <div class="ac-main-nav-showEv" style="overflow-y: scroll;">

            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

        </div>

        <div class="ac-main-nav-accDec" style="overflow-y: scroll;">


        </div>

        <div class="ac-main-footer">

            <h2 class="ac-main-footer-title">
                Pimp My CSS
            </h2>

        </div>

    </div>

    <div class="ac-main-calendrier" id="cal">

        <div id="calendar">

        </div>

        <button id="bouttonCreeEvent" type="submit" class="ac-main-calendrier-createEvent"  name="action" value="create-event">
            +
        </button>

    </div>
</div>