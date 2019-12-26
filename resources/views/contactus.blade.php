<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel=”stylesheet” href=” https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/img/map-pointer.png') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 800px;  /* The height is 400 pixels */
        width: 100%; 
         /* The width is the width of the web page */
       }

       * {
            font-family: 'Roboto', sans-serif;
        }

       /* Style the header with a grey background and some padding */
        .header {
          overflow: hidden;
          background-color: transparent;
          padding: 20px 10px;
        }

        /* Style the header links */
        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 8px;
          text-decoration: none;
          font-size: 18px;
          line-height: 25px;
          border-radius: 4px;
          color: white;
        }



        /* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }

        /* Change the background color on mouse-over */
        /*.text-a a:hover {*/
          /*background-color: white;*/
          /*color: white;*/
        /*}*/
        .text-a {
            /*overflow: hidden;*/
          background-color: transparent;
          margin-top: 20px;
        }
        
        .text-a a{
            padding-left: 40px;
        }

        /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
        @media screen and (max-width: 500px) {
          .header a {
            float: none;
            display: block;
            text-align: left;
          }
          .header-right {
            float: none;;
          }

        }

        .first:hover .add,
        .first .addh {
            display: none;
        }
        .first:hover .addh {
            display: inline;
        }

        .second:hover .about,
        .second .aboutus {
            display: none;
        }
        .second:hover .aboutus {
            display: inline;
        }

        .third:hover .contact,
        .third .contactus {
            display: none;
        }
        .third:hover .contactus {
            display: inline;
        }

        .text-center{
            text-align: center;
        }
        
       /**/
    </style>
  </head>
 <body id="body" style="background-image:linear-gradient(-60deg,#2ea1e3,#05d8c3);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="header">
                  <a href="#default" class="logo"><img src="{{ asset('admin/img/map-pointer.png') }}" alt="">Public Toilet Finder</a>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1" style="text-align: center;">
                <div class="text-a">
                    <a  href="#home" class="first">
                        <img src="{{ asset('admin/icons/1-01.svg')}}" alt="" width="70px" class="add" >
                        <img src="{{ asset('admin/icons/1-02.svg')}}" alt="" width="70px" class="addh" >
                    </a>
                    <a href="#contact" class="second">
                        <img src="{{ asset('admin/icons/2-02.svg')}}" alt="" width="70px" class="about">
                        <img src="{{ asset('admin/icons/2-03.svg')}}" alt="" width="70px" class="aboutus">
                    </a>
                    <a href="#about" class="third">
                        <img src="{{ asset('admin/icons/3-03.svg')}}" alt="" width="70px" class="contact">
                        <img src="{{ asset('admin/icons/3-04.svg')}}" alt="" width="70px" class="contactus">
                    </a>
              </div>
          </div>
            <div class="col-md-3"></div>
        </div>
      </div>

</body>
</html>