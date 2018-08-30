<?php include("includes/header.php"); ?>

    <h1 class="pageHeadingBig">Shred On!</h1>
    <div class="gridViewContainer">
        <?php 
            // $con is the connection to db
            $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 3");
                // store all albums in $row
            while($row = mysqli_fetch_array($albumQuery)) {
                // . is used to append strings in php
                echo 
                    '<div class="gridViewItem">
                        <img src="' . $row['artworkPath'] .'" alt="albums">

                        <div class="gridViewInfo">'
                            . $row['title'] .
                        '</div>
                    </div>';
            }
        ?>
    </div>
<?php include("includes/footer.php"); ?>