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


    <script>
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                droppable: true,
                dropAccept: '.cool-event',
                drop: function() {
                    alert('dropped!');
                },
                events: [
                    {
                        id : 'test',
                        title  : 'event1',
                        start  : '2018-02-13'
                    },
                    {
                        title  : 'event2',
                        start  : '2018-02-16',
                        end    : '2018-02-17'
                    },
                    {
                        title  : 'event3',
                        start  : '2010-01-09T12:30:00',
                        allDay : false // will make the time show
                    }
                ],


            })

        });
        $('#draggable1').draggable();
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

