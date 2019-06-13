<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

// Pagination

if (isset($_SESSION['allAvailableBundle']['totalPages'])) {

    ?>
    <nav>
        <ul>
            <!-- -->
            <a href="?controller=sponsor&action=findAllAvailableBundle&page=<?php
            echo ($_GET['page'] > 1) ? $_GET['page'] - 1 : 1;
            ?>">
                <li>Prev</li>
            </a>
            <!-- -->
            <?php
            $totalPages = $_SESSION['allAvailableBundle']['totalPages'];

            $actualPage = $_SESSION['allAvailableBundle']['actualPage'];

            $beginPagination = 0;

            if ($actualPage - 3 > 0) {

                $beginPagination = $actualPage - 3;
            }

            $endPagination = $totalPages;

            if ($actualPage + 3 < $totalPages) {

                $endPagination = $actualPage + 3;
            }

            for ($i = $beginPagination; $i < $endPagination; $i++) {

                $active = (int)$_GET['page'] === $i + 1 ? 'active' : '';

                echo '<a href="?controller=sponsor&action=findAllAvailableBundle&page=' . ($i + 1) . '">';
                echo "<li class='$active'>";
                echo($i + 1);
                echo '</li>';
                echo '</a>';

            }
            ?>
            <!-- -->
            <a href="?controller=sponsor&action=findAllAvailableBundle&page=<?php
            echo ($_GET['page'] < $totalPages) ? $_GET['page'] + 1 : $totalPages;
            ?>">
                <li>Next</li>
            </a>
            <!-- -->
        </ul>
    </nav>
    <?php
} // End If $totalPages
?>
<!-- END Pagination -->
