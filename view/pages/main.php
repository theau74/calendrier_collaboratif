<script>
$(document).ready(function() {

    // Le calendrier peut être charger dans la page :

    $('#calendar').fullCalendar({

        minTime : "06:00:00",

        maxTime : "19:00:00",

        contentHeight: "auto",

        events: [


                    <?php
                    foreach ($event_list as $events){
                        echo"{";
                        if(!empty($events['id'])){
                            echo'id : "'.$events['id'].'",';
                        }if(!empty($events['nom'])){
                            echo'title : "'.$events['nom'].'",';
                        }if(!empty($events['description'])){
                            echo'description : "'.$events['description'].'",';
                        }if(!empty($events['type'])){
                            echo'type : "'.$events['type'].'",';
                        }if(!empty($events['start'])){
                            echo'start : "'.$events['start'].'",';
                        }if(!empty($events['end'])){
                            echo'end : "'.$events['end'].'",';
                        }
                        echo"},";
                    }
                    ?>
                ],

                navLinks: true,
                navLinkWeekClick:'agendaDay',
                navLinkDayClick:'agendaDay',
                eventClick: function(event) {
                    if (event.description) {
                        alert("event : " + event.title + "description : " + event.description);
                    }
                    else{
                        alert("event : " + event.title );
                    }
                },
                editable: true,
                eventDrop: function(event, delta, revertFunc) {
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
                    Agenda: {text: 'Agenda',
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

<div class="ac-main-header">

    <a href="javascript:void(0);" style="font-size:15px;" class="ac-main-header-menue-sandwish" onclick="myFunction()">
        &#9776;
    </a>

    <form action="index.php?logout" method="post">
        <button type="submit" class="ac-main-header-logout" name="logout">
            Déconnexion
        </button>
    </form>

    <form action="index.php?create-event" method="post">
        <button type="submit" class="ac-main-header-create" name="create">
            Créer
        </button>
    </form>

</div>

<div class="ac-main">

    <div class="ac-main-nav">

        <div class="ac-main-nav-miniCalendrier">
            <!--  Mini Calendar  --> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi, architecto asperiores delectus deleniti distinctio eaque earum exercitationem fugiat laborum maxime mollitia neque nihil officiis placeat porro quaerat sed sunt.
        </div>

        <div>

        </div>

        <p>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cumque dicta ex, harum id labore laboriosam minima, nihil obcaecati pariatur provident quasi, reiciendis repellat sit vero! Ex nostrum odit voluptatum!
        </p>

        <div class="ac-main-footer">

            <h2 class="ac-main-footer-title">
                Pimp My CSS
            </h2>

        </div>

    </div>

    <div class="ac-main-calendrier">

        <div id='calendar'></div>

    </div>

</div>
