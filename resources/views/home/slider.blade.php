<style>
    label{
        color: white;
    }
    .book_room {
        background-color: rgba(0, 0, 0, 0.7); /* Transparent white background */

        padding: 20px;
        border-radius: 10px;
    }

    .book_room label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .book_room input[type="text"],
    .book_room input[type="email"],
    .book_room input[type="number"],
    .book_room input[type="date"],
    .book_room input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .book_room input[type="submit"] {
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .book_room input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<section class="banner_main">
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="room/room2_edited2.jpg" alt="First slide">
                <div class="container">
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="room/room3_edited3.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="room/room6_edited6.jpg" alt="Third slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="booking_ocline">
            <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="book_room">
                        
                        <h1>Welcome to the premier <br><br>student apartelle experience.</h1>
                        <br><br>
                        <h1>CampusHive: Elevating <br><br> student living every day.</h1>
                        <br><br>
                        <div style="padding-top: 20px" >
                        <a href="#room"><input type="submit" class="btn btn-primary" value="View Room"></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>