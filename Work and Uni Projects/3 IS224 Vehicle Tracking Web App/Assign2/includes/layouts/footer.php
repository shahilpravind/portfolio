        
            <?php 
                if ($_SESSION['user_type'] == "Admin")
                {
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>

            </br></br>
            <div id="footer" style="text-align: center;">
                Copyright &copy; <?php echo date("Y"); ?>, Sky University.
            </div>

            <script src="../../includes/bootstrap/js/jquery.min.js"></script>
            <script src="../../includes/bootstrap/js/bootstrap.min.js"></script>

        </div> <!-- container defined in header -->
    </body>
</html>


<?php
    // close database connection
    if ( isset($dbconn) )
        $dbconn->db_disconnect();
?>
