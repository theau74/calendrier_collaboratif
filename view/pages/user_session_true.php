<div class="of-container of-header">



    <div class="of-header-nav">
        <form action="index.php?logout" method="post">
            <ul>


                <li class="of-header-nav-item">
                    <a href="index.php?propos" class="of-header-nav-item-href">
                        A propos
                    </a>
                </li>

                <li class="of-header-nav-item of-header-nav-item-title">
                    <?php
                    echo $_SESSION["mail"];
                    ?>
                </li>

                <li class="of-header-nav-item">
                    <a href="index.php?user_log" class="of-header-nav-item-href">
                        Espace perso
                    </a>
                </li>

                <li class="of-header-nav-item of-header-nav-item-left">
                    <button type="submit" class="of-header-nav-item-button" name="logout">
                        Déconnexion
                    </button>
                </li>


            </ul>
        </form>
    </div>

</div>