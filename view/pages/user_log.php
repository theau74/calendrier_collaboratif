<div class="of-container of-main of-main-perso">
    <div class="of-main-1">
        <h2 class="of-main-title-h2">
            Vos réservations :
        </h2 class="of-main-corps">

        <table class="of-main-table-reserv">
            <tr class="of-main-table-reserv-ligne">
                <th class="of-main-table-reserv-ligne-item-th">Date</th>
                <th class="of-main-table-reserv-ligne-item-th">Creneau</th>
                <th class="of-main-table-reserv-ligne-item-th">Formule</th>
                <th class="of-main-table-reserv-ligne-item-th">Prix</th>
            </tr>

            <?php
            foreach ($reservations as $reservation) {
                echo "<tr>";
                echo "<td  class='of-main-table-reserv-ligne-item'>" . $reservation['reservdate'] . "</td>
                      <td  class='of-main-table-reserv-ligne-item'>" . $reservation['creneau'] . "</td>
                      <td  class='of-main-table-reserv-ligne-item'>" . $reservation['formulesname'] . "</td>
                      <td  class='of-main-table-reserv-ligne-item'>" . $reservation['pricetotal'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="of-main-2">

        <h2 class="of-main-title-h2">
            Compte :
        </h2>

        <table class="of-main-table-reserv">

            <?php
            echo "<tr>
                        <th class='tabReserv'>Prénom :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[1] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Nom :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[2] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Email :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[6] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Tel :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[8] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Adresse :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[3] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Code Postal :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[4] . "</td>
                    </tr>";
            echo "<tr>
                        <th class='tabReserv'>Ville :</th>
                        <td class='of-main-table-reserv-ligne-item'>" . $user_infos[5] . "</td>
                    </tr>";


            ?>
        </table>
    </div>

</div>