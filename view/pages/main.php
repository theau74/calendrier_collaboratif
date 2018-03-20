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

    <div class="ac-createEvent" id="createEvent">

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

    <div class="ac-fontGris" id="fondGris">

    </div>

    <div class="ac-main-nav" id="nav-bar">

        <div class="ac-main-nav-invit" style="overflow-y: scroll;">



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
