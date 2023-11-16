<template>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner slider">
            <div class="item active">
                <img src="images/Having-Picnic.png" alt="Chicago">
                <div class="text">
                    <h1>Spend Your Holiday</h1>
                    <p>Spend your time to create more memory</p>
                    <div class="flex1 t1">
                        <a href="#" class="btn btn-success b-slide">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="images/accommodation3.jpg" alt="Chicago">
                <div class="text">
                    <h1>Accommodation Place</h1>
                    <p>Many Accommodation here, beautiful, Health, Attractiv and more options to choose and stay here.</p>
                    <div class="flex1 t1">
                        <a href="#" class="btn btn-success b-slide">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/cammm.jpg" alt="Chicago">
                <div class="text">
                    <h1>Friendship place</h1>
                    <p>Time to make more frineds.</p>
                    <div class="flex1 t1">
                        <a href="#" class="btn btn-success b-slide">Book Now</a>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <img src="images/Having-Picnic.png" alt="Chicago">
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</template>