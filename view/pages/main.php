<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel='stylesheet' href='lib/fullcalendar.css' />
    <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script>
    <script src='lib/fullcalendar.js'></script>
    <div class="ac-header-home">

        <h1 class="ac-header-home-title">Agenda Collaboratif</h1>

    </div>


    <script>$(document).ready(function() {

            // Le calendrier peut être charger dans la page :

            $('#calendar').fullCalendar({

                minTime : "06:00:00",

                maxTime : "19:00:00",

                contentHeight: 600,

                events: [
                    {
                        title  : 'event1',
                        start  : '2018-02-01',
                        type : 'public'
                    },
                    {
                        title  : 'event2',
                        start  : '2018-02-05T08:00:00',
                        end    : '2018-02-05T10:00:00',
                        type : 'private'
                    },
                    {
                        title  : 'event3',
                        start  : '2018-02-09T12:30:00',
                        default: '02:00:00'
                    },
                    {
                        title  : 'event4',
                        start  : '2018-02-06T08:00:00',
                        end    : '2018-02-06T10:00:00',
                        description : "c'est dla balle"
                    },
                    {
                        title  : 'event5',
                        start  : '2018-02-09T08:00:00',
                        end    : '2018-02-009T10:00:00'
                    },
                    {
                        title  : 'event6',
                        start  : '2018-02-10T08:00:00',
                        end    : '2018-02-10T10:00:00'
                    }
                ],

                navLinks: true,
                navLinkWeekClick:'agendaDay',
                navLinkDayClick:'agendaDay',

                editable: true,
                eventDrop: function(event, delta, revertFunc) {
                    if (!confirm(event.title + " commence maitenant a : " + event.start.format() + " ete vous sure de ce changement? ")) {
                        revertFunc();
                    } else {
                        document.location.href="test2.html";
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

