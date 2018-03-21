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

    <form action="index.php?logout" method="post">

        <button type="submit" class="ac-main-header-logout" name="logout">
            Déconnexion
        </button>

    </form>

</div>

<div class="ac-main">

    <div class="ac-createEvent" style="display: none" id="createEvent">

        <div class="ac-createEvent-header">

            <div class="ac-createEvent-header-close" id="close">
                &#xf00d;
            </div>

            <button type="submit" class="ac-createEvent-header-save" id="save" name="create">
                Enregistrer
            </button>

            <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement ...">

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

    <div id="createEvent-Deskstop" style="display: none" class="ac-createEvent-popUp">
        <div class="ac-createEvent-popUp-content">
            <div class="ac-createEvent-header">
                <div class="ac-createEvent-popUp-header-close" id="close">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="savepopup" name="create">
                    Enregistrer
                </button>

                <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement... ">

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


            </div>
            <div class="ac-createEvent-body-description">
                <input class="ac-createEvent-body-description-input" type="text" placeholder="Description"
                       name="description">
            </div>
            <?php
            foreach ($users_list as $user) {
                echo"<div>";
                echo $user['Fname'];
                echo $user['Lname'];
                echo '<input class="of-main-block-salle-radio" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                echo "</div>";
            }
            foreach ($groups_list as $group) {
                echo"<div>";
                echo $group['nom'];
                echo $group['description'];
                echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                echo "</div>";
            }
            ?>
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
</div>





<div class="ac-fontGris" id="fondGris">

    </div>

    <div class="ac-main-nav" id="nav-bar">

        <div class="ac-main-nav-invit" style="overflow-y: scroll;">
            <?php
            foreach ($pending_invitation_list as $invitation){
                echo "<ul>";
                if(!empty($invitation['id_event'])){
                    echo"<li>id de l'evenement : ".$invitation['id_event'].'</li>';
                }if(!empty($invitation['event_name'])){
                    echo"<li>nom de l'evenement : ".$invitation['event_name'].'</li>';
                }if(!empty($invitation['start'])){
                    echo"<li>debut de l'evenement : ".$invitation['start'].'</li>';
                }if(!empty($invitation['end'])){
                    echo"<li>fin de l'evenement : ".$invitation['end'].'</li>';
                }if(!empty($invitation['group_name'])){
                    echo"<li>nom du groupe : ".$invitation['group_name'].'</li>';
                }
                echo'<form  action="index.php?set_invitation=true" method="post">
                    <input type="submit" value="valider" name="valider">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                </form>';
                echo'<form  action="index.php?set_invitation=false" method="post">
                    <input type="submit" value="refuser" name="refuser">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                 </form>';
                echo"</ul>";
            }
            ?>
            <?php
            foreach ($pending_invitation_list as $invitation){
                echo "<ul>";
                if(!empty($invitation['id_event'])){
                    echo"<li>id de l'evenement : ".$invitation['id_event'].'</li>';
                }if(!empty($invitation['event_name'])){
                    echo"<li>nom de l'evenement : ".$invitation['event_name'].'</li>';
                }if(!empty($invitation['start'])){
                    echo"<li>debut de l'evenement : ".$invitation['start'].'</li>';
                }if(!empty($invitation['end'])){
                    echo"<li>fin de l'evenement : ".$invitation['end'].'</li>';
                }if(!empty($invitation['group_name'])){
                    echo"<li>nom du groupe : ".$invitation['group_name'].'</li>';
                }
                echo'<form  action="index.php?set_invitation=true" method="post">
                    <input type="submit" value="valider" name="valider">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                </form>';
                echo'<form  action="index.php?set_invitation=false" method="post">
                    <input type="submit" value="refuser" name="refuser">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                 </form>';
                echo"</ul>";
            }
            ?>
            <?php
            foreach ($pending_invitation_list as $invitation){
                echo "<ul>";
                if(!empty($invitation['id_event'])){
                    echo"<li>id de l'evenement : ".$invitation['id_event'].'</li>';
                }if(!empty($invitation['event_name'])){
                    echo"<li>nom de l'evenement : ".$invitation['event_name'].'</li>';
                }if(!empty($invitation['start'])){
                    echo"<li>debut de l'evenement : ".$invitation['start'].'</li>';
                }if(!empty($invitation['end'])){
                    echo"<li>fin de l'evenement : ".$invitation['end'].'</li>';
                }if(!empty($invitation['group_name'])){
                    echo"<li>nom du groupe : ".$invitation['group_name'].'</li>';
                }
                echo'<form  action="index.php?set_invitation=true" method="post">
                    <input type="submit" value="valider" name="valider">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                </form>';
                echo'<form  action="index.php?set_invitation=false" method="post">
                    <input type="submit" value="refuser" name="refuser">
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                 </form>';
                echo"</ul>";
            }
            ?>


        </div>

        <div class="ac-main-nav-showEv" style="overflow-y: scroll;">

            <label class="container">
                <p id="checkbox-container">OuiboNjourOrvoirheohooe</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="container">
                <p id="checkbox-container">Meeting</p>
                <input type="checkbox" >
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

        <button id="bouttonCree" type="submit" class="ac-main-calendrier-create" name="create">
            +
        </button>

    </div>

</div>
