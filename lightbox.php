<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LightBox</title>
    <style type="text/css">
        *{
            box-sizing: border-box;
        }
        .row{
            clear: both;
            display: flex;
        }
        .col-2{
            width: 20%;
            float: left;
            padding: 10px;
        }
        .col-2 img {
            width: 100%;
            height: 100%;
        }
        h1{
            color: slategray;
            background-color: lightblue;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .lightbox  {
            position: absolute;
            display: none;         
            left: 25%;
            top: 40%;
            max-width: 50%;
            max-height: 50%;
            border: 2px solid black;
            overflow: hidden;
        }
        .lightbox image{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        #close{
            position: absolute;
            top: -3%;
            right: -1%;
            padding: 6px;
            border-radius: 50%;
        }
        .navButton {
            position: absolute;
            top: 50%;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        #prevButton {
            left: 10px;
        }
        #nextButton {
            right: 10px;
        }
    </style>
</head>
<body>
    <h1 align="center">Select An Image</h1>
    <br>
    <hr>
    <br>

    <div class="row">
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/beautiful-shot-crystal-clear-lake-snowy-mountain-base-during-sunny-day_181624-5459.jpg?size=626&ext=jpg&ga=GA1.1.735520172.1710374400&semt=sph"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/natures-beauty-reflected-tranquil-mountain-waters-generative-ai_188544-7867.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/fantasy-background-hd-8k-wallpaper-stock-photographic-image_853645-48785.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/nature-beauty-reflected-tranquil-mountain-lake-generative-ai_188544-12625.jpg?size=626&ext=jpg&ga=GA1.1.523418798.1710374400&semt=ais"></div>
    </div>

    <div class="row">
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/fire-nature-campfire-night-bonfire-flame-forest-outdoors-generated-by-ai_188544-19860.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/clock-face-glowing-midnight-time-up-generative-ai_188544-9607.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/night-adventure-with-fairy-glowing-object-generative-ai_188544-12605.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-vector/realistic-three-dimensional-arabic-ornamental-background_52683-59086.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/starry-night-lake_68067-618.jpg"></div>
    </div>

    <div class="row">
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/free-photo/vestrahorn-mountains-stokksnes-iceland_335224-667.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1710374400&semt=sph"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/beautiful-landscape-mountain-lake-with-boat_321315-2151.jpg?size=626&ext=jpg&ga=GA1.1.1395880969.1709424000&semt=ais"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/cabin-lake-front-mountain_865967-116927.jpg?size=626&ext=jpg&ga=GA1.1.1700460183.1708041600&semt=ais"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/digital-art-album-art_31965-111377.jpg"></div>
        <div class="col-2"><img onclick="openimg(this)" src="https://img.freepik.com/premium-photo/mountain-landscape-with-moon-sun_823200-170.jpg"></div>
    </div>

    <div align="center" class="lightbox">
        <button id="close" onclick="closeimg()">X</button>
        <button id="prevButton" class="navButton" onclick="prev()">&lt;</button>
        <button id="nextButton" class="navButton" onclick="next()">&gt;</button>
        <img id="lightboxImg" src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg">
    </div>

    <script>
        var row = document.querySelectorAll(".row");
        var lightbox = document.querySelector(".lightbox");
        var image = document.querySelector(".lightbox > img");
        var currentIndex = 0;

        function openimg(obj) {
            currentIndex = Array.from(document.querySelectorAll('.col-2 img')).indexOf(obj);
            image.src = obj.src;
            lightbox.style.display = 'block';
            showHide(0.3);
        }

        function closeimg(){
            lightbox.style.display = 'none';
            showHide(1);
        }

        function showImage(index) {
            image.src = document.querySelectorAll('.col-2 img')[index].src;
        }

        function next() {
            currentIndex++;
            if (currentIndex >= document.querySelectorAll('.col-2 img').length) {
                currentIndex = 0;
            }
            showImage(currentIndex);
        }

        function prev() {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = document.querySelectorAll('.col-2 img').length - 1;
            }
            showImage(currentIndex);
        }

        function showHide(opacity){
            for (var i = 0; i < row.length; i++) {
                row[i].style.opacity = opacity;
            }
        }

        window.onkeyup = function(event){
            if (event.keyCode == 27) {
                closeimg();
            }
            if (event.keyCode == 39) {
                next();
            }
            if (event.keyCode == 37) {
                prev();
            }
        }
    </script>
</body>
</html>