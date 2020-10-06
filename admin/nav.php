<div class="row adminNav">
    <div class="col-sm-10 offset-sm-1">        
    <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bookshelf.in</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars text-white"></span>
                </button>
                <div class="searchBar">
                    <div class="search">
                       <form action="search.php">
                            <input type="text" placeholder="Explore" id="search" name="searchBook">
                            <button class="navSeacrhBtn" type="submit"> Search</button>
                       </form>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="admin.php" id="navHome">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#addProduct">Add Product</a>
                        <a class="nav-item nav-link" href="newOrder.php" id="navOrders">New Orders</a>
                        <a class="nav-item nav-link" href="stats.php" id="navStats">Stats</a>
                        <a class="nav-item nav-link" href="#"> <form action="adminLogout.php" method="post"><button type="submit" style="border:0px;background-color:unset;outline:none" name="adminLogoutBtn"> <i class="fa fa-power-off fa-lg text-light"></i> </button></form> </a>
                        <a class="nav-item nav-link" href="#"><i class='fa fa-bell text-light fa-lg'> </i> </a>
                        
                    </div>
                </div>
            </div>
          </nav>
    </div>
</div>

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-span class="label"ledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Books</h5>
                            <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form enctype="multipart/form-data" id="addProductForm">
                        <div class="modal-body">
                            <div class="container-fluid">
                                
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="label" for="isbn">ISBN :</span>
                                            <input type="text" name="isbn" class="form-control" id="addIsbn">
                                        </div>
                                        <div class="col-6">
                                            <span class="label" for="bname">Book Name :</span>
                                            <input type="text" name="bname" class="form-control" id="addBookName">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="label" for="image">Book Image :</label>
                                            <input type="file" name="image" id="addImage">
                                        </div>
                                        <div class="col-6 mt-4">
                                            <span class="label" for="addGenreId">Genre :</span>
                                        <select name="genreId" id="addGenreId" class="form-control" selected="none">
                                            <option value=1>Fiction</option>
                                            <option value=2>Novel</option>
                                            <option value=3>Mythology</option>
                                            <option value=4>Biography</option>
                                            <option value=5>Crime/Thriller/Mystery</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="label" for="pages">No. of Pages :</span>
                                            <input type="number" name="pages" class="form-control" id="addPages">
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="label" for="author">Author :</span>
                                            <input type="text" name="author" class="form-control" id="addAuthor">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="label" for="publication">Publication :</span>
                                            <input type="text" name="publication" class="form-control" id="addPublication">
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="label" for="year">Year of Publish :</span>
                                            <input type="text" name="year" class="form-control" id="addYear">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="label" for="description">Description :</span>
                                            <textarea name="description" class="form-control" id="addDescription" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="label" for="stock">Stock :</span>
                                            <input type="text" name="quantity" class="form-control" id="addStock">
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="label" for="price">Price :</span>
                                            <input type="text" name="price" class="form-control" id="addPrice">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="label" for="tag">Tags :</span>
                                            <input type="text" name="tag" class="form-control" id="addTag">
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="label" for="tag">Featured :</span>
                                            <select class="form-control" name="featured" id="addFeatured">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="addProductError d-none mt-2"></p>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary addBook" name="addBook" id="addBook">
                                    <i class="loading-icon fa fa-spinner fa-spin hide"></i>
                                    <span class="btnText">Add</span>
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>