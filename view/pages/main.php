  <h1 class="ac-header-home-title">Agenda Collaboratif</h1>

    </div>


    <script>$(document).ready(function() {

            // Le calendrier peut être charger dans la page :

            $('#calendar').fullCalendar({

                minTime : "06:00:00",

                maxTime : "19:00:00",

                contentHeight: 600,

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

</head>
<body>

<div class="ac-main-header">
    <!--  HEADER  -->
</div>

<div class="ac-main-nav">
    <div class="ac-main-nav-miniCalendrier">
        <!--  Mini Calendar  --> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi, architecto asperiores delectus deleniti distinctio eaque earum exercitationem fugiat laborum maxime mollitia neque nihil officiis placeat porro quaerat sed sunt.
    </div>

    <div>

    </div>

    <p>

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cumque dicta ex, harum id labore laboriosam minima, nihil obcaecati pariatur provident quasi, reiciendis repellat sit vero! Ex nostrum odit voluptatum!
    </p>

    <footer class="ac-footer">

        <h2 class="ac-footer-title">
            Agenda Collaboratif
        </h2>

        <h3 class="ac-footer-subtitle">
            © Pimp My CSS
        </h3>

    </footer>
</div>

<div class="ac-main-calendrier">

    <div id='calendar'></div>

</div>




</body>


<?php

