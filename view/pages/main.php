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


    <a href="javascript:void(0);" class="ac-main-header-menue-sandwish" onclick="afficheNav()">
        &#9776;
    </a>

    <div id="bouttonCreeGroup" type="submit" class="ac-main-header-createGroup"  name="action" value="create-grp">
        &#xe7f0;
    </div>

    <div id="bouttonVoirAllGroup" type="submit" class="ac-main-header-allGroup"  name="action" value="voir-grp">
        &#xf0c0;
    </div>

    <div id="bouttonVoirAllEvent" type="submit" class="ac-main-header-allEvent" name="logout">
        &#xe878;
    </div>

    <div href="index.php?logout" type="submit" class="ac-main-header-logout" name="logout">
        &#xf011;
    </div>


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

                <ul>

                    <?php
                    foreach ($users_list as $user) {
                        echo"<li class='ac-createGroup-body-item'>";

                        echo "<p class='ac-createGroup-body-item-name'>" . $user['Fname'] . "</p>";
                        echo "<p class='ac-createGroup-body-item-lname'>" . $user['Lname'] . "</p>";
                        echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
                                 <option value='3'>Utilisateur</option>
                                 <option value='2'>Administrateur</option>
                            </select>";
                        echo '<input class="ac-createGroup-body-item-checkbox" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';

                        echo "</li>";
                    }
                    ?>

                    <li class="ac-createGroup-body-item">
                        <input type="text" class="ac-createGroup-body-item-descriptionGroup" name="description" placeholder="description">
                    </li>

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
                    <h1 class="ac-createGroup-popUp-body-addTitle">Ajouter des membres</h1>
                    <ul class="ac-createGroup-popUp-body-ul">
                        <li class="ac-createGroup-popUp-body-columns">
                            <h2 class="ac-createGroup-popUp-body-h2">Prénom</h2>
                            <h2 class="ac-createGroup-popUp-body-h2">Nom</h2>
                            <h2 class="ac-createGroup-popUp-body-h2">Rang</h2>
                        </li>
                        <?php
                        foreach ($users_list as $user) {
                            echo"<li class='ac-createGroup-body-item'>";
                            echo "<p class='ac-createGroup-popUp-body-item-name'>" . $user['Fname'] . "</p>";
                            echo "<p class='ac-createGroup-popUp-body-item-lname'>" . $user['Lname'] . "</p>";
                            echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
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

                        <li class="ac-createGroup-body-item">
                            <input type="text" class="ac-createGroup-body-item-descriptionGroup" name="description" placeholder="description">
                        </li>

                    </ul>

                </div>
            </div>
        </form>

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

        <div class="ac-main-nav-showEv" style="overflow-y: scroll;">

            <label class="ac-main-nav-showEv-container">
                <input type="checkbox">
                <span class="ac-main-nav-showEv-checkmark"></span>
                <p id="checkbox-container">Meeting</p>
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