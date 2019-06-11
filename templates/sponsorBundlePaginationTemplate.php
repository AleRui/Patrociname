<?php
?>
<!-- Pagination -->
<?php
if ( isset($_SESSION['allAvailableBundle']['totalPages']) ) {
    //echo 'existe: $_SESSION[\'allAvailableBundle\'][\'totalPages\']';
    //
    ?>
    <nav>
        <ul>
            <a href="?controller=sponsor&action=findAllAvailableBundle&page=<?php
                echo ( $_GET['page'] > 1 ) ? $_GET['page']-1 : 1;
                ?>"><li>Prev</li></a>

            <!-- -->
            <?php
            $totalPages = $_SESSION['allAvailableBundle']['totalPages'];
            //echo '$totalPages: '.$totalPages.'<br>';
            //
            $actualPage = $_SESSION['allAvailableBundle']['actualPage'];
            //echo '$actualPage: '.$actualPage.'<br>';
            //
            $beginPagination = 0;
            //
            if ( $actualPage-3 > 0 ) {
                //echo 'Pagina actual -2'.($actualPage-2).'<br>';
                $beginPagination = $actualPage-3;
            }
            //
            $endPagination = $totalPages;
            //
            if ( $actualPage+3 < $totalPages ) {
                //echo 'Pagina actual +2'.($actualPage+2).'<br>';
                $endPagination = $actualPage+3;
            }
            //
            for ($i = $beginPagination; $i < $endPagination; $i++) {
                $active = (int)$_GET['page'] === $i+1 ? 'active' : '';
                echo '<a href="?controller=sponsor&action=findAllAvailableBundle&page=' . ($i + 1) . '">';
                echo "<li class='$active'>";
                echo  ($i + 1);
                echo '</li>';
                echo '</a>';
            }
            ?>
            <!-- -->
            <a href="?controller=sponsor&action=findAllAvailableBundle&page=<?php
                echo ( $_GET['page'] < $totalPages ) ? $_GET['page']+1 : $totalPages;
                ?>"><li>Next</li>
            </a>

        </ul>
    </nav>
    <?php
} // End If $totalPages
?>
<!-- END Pagination -->