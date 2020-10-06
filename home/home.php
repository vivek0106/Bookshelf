
<div class="homePage">
    <section>
        <div class="cover">
            <h1>A room without a book is like a body without a soul</h1>
            <h3>-Cicero</h3>
        </div>
    </section>
    <section class="container">
            <div class="row align-items-center recommended" style="justify-content:space-between;">
            <div class="col-12">
                <h3 class="text-center font-weight-bold">Featured Books</h3>
            </div>
                <div class="col-12 d-flex align-items-center recomItemWrapper" >
                    <div class="arrow recPre">
                        <i class="fa fa-angle-left" id="recPrevBtn"></i>
                    </div>
                    <div class="recomItem d-flex">
                        <?php 
                            include "../connection.php"; 
                            $query = "select image,bookID from books where featured='yes'";
                            $res=mysqli_query($con,$query);
                            mysqli_close($con);
                            if(mysqli_num_rows($res) > 0){
                                while($row = mysqli_fetch_array($res)){
                                    ?>                                    
                                    <a href="../product/product.php?id=<?php echo $row['bookID'];?>"><img src="<?php echo $row['image'];?>" alt="one" class='img-fluid'></a>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="arrow recNxt">
                        <i class="fa fa-angle-right" id="recNextBtn"></i>
                    </div>
                </div>
            </div>
    </section>
    <section class="genres">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center font-weight-bold">Genres</h3>
                </div>
            </div>
            <div class="row space-between align-items-center">
               <div class="arrow genPre">
                    <i class="fa fa-angle-left genre"></i>
               </div>
                <div class="genreItemWrapper">
                    <?php 
                            include "../connection.php"; 
                            $query = "select genreName,genreID from genres";
                            $res=mysqli_query($con,$query);
                            mysqli_close($con);
                            if(mysqli_num_rows($res) > 0){
                                while($row = mysqli_fetch_array($res)){
                                    ?>                                    
                                    <div class="genreItem"><a href="../search/search.php?genre=<?php echo $row[1];?>"><?php echo $row[0]; ?></a></div>
                                    <?php
                                }
                            }
                        ?>
                    <!-- <div class="genreItem">Fiction</div>
                    <div class="genreItem">Romance</div>
                    <div class="genreItem">Horror</div>
                    <div class="genreItem">Self-Help</div>
                    <div class="genreItem">Novels</div>
                    <div class="genreItem">Mythology</div> -->
                </div>
                <div class="arrow genNxt">
                    <i class="fa fa-angle-right genre"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="series">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center font-weight-bold ">Series</h3>
                </div>
            </div>
            <div class="row space-between align-items-center">
                <div class="arrow serPre">
                    <i class="fa fa-angle-left series"></i>
                </div>
                <div class="seriesItemWrapper">
                    <?php 
                            include "../connection.php"; 
                            $query = "select bookName,bookID from books where genre=6";
                            $res=mysqli_query($con,$query);
                            mysqli_close($con);
                            if(mysqli_num_rows($res) > 0){
                                while($row = mysqli_fetch_array($res)){
                                    ?>                                    
                                    <div class="seriesItem"><a href="../product/product.php?id=<?php echo $row[1];?>"><?php echo $row[0]; ?></a></div>
                                    <?php
                                }
                            }
                        ?>
                    <!-- <div class="seriesItem">Harry Potter</div>
                    <div class="seriesItem">Fantastic Beast</div>
                    <div class="seriesItem">Sherlock Homes</div>
                    <div class="seriesItem">Fifty Shades of Grey</div>
                    <div class="seriesItem">Amish Mythology</div>
                    <div class="seriesItem">Game of Thrones</div> -->
                </div>
                <div class="arrow serNxt">
                    <i class="fa fa-angle-right series"></i>
                </div>
            </div>
        </div>
    </section>

</div>
