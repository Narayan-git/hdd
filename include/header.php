<html>
<head>
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <script src="bootstrap\js\bootstrap.js"></script>
    <script src="bootstrap\js\bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">

    <style>
            .banner{
                background-image:url('static/images/baner.jpg');
                min-height: 200px;
                max-height:20vw;
                display : flex;
                /* justify-content : space-evenly; */
                flex-direction : row;
                background-color:magenta;
                background-blend-mode :screen;

            }
            #brand{
                margin-right: 10%;
                height :15vw;
                width :15vw;
                display : flex;
                /* padding:auto; */
                float: left; 
                margin: 5px;
            }
            .hed{
                /* text-align: justify; */
                margin-top:5%;
            }
            .message{
                background: rgb(63,94,251);
                background: radial-gradient(circle, rgba(63,94,251,1) 26%, rgba(170,70,159,1) 77%, rgba(252,70,107,1) 100%);
                color :#00FF2A;
                /* padding:3px; */
                font-family: Arial, Helvetica, sans-serif;
                font-size:1.5vw;
                text-align:center;
                text-transform: uppercase;
            }
            .navbar{
                background: rgb(238,174,202);
                background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            }
            body{
                background: rgb(238,174,202);
                background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(92,216,236,1) 90%);
            }
        
        </style>
    </head>
<body>
    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12 sticky-top">
        <div class="row nav banner">
                <div class=" col col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                <a target='blank' href="static/images/logo/cross.png"><img id='brand' src="static/images/logo/cross.png" alt="HDD"></a>
                </div>
                <div class="hed col col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <p class="h1 col-lg-10 col-md-10 col-sm-10 col-xs-10" style="font-size:3vw;">Health Disease Detection</p>
                    <p class="h2 col-lg-10 col-md-10 col-sm-10 col-xs-10" style="font-size:2vw;">Healthy citizens are the greatest asset any country can have</p>            
                </div>
                
        </div>
        <div class="message text-center">
            <marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                If COVID-19 is spreading in your community, stay safe by taking some simple precautions,
                such as physical distancing, wearing a mask, keeping rooms well ventilated, avoiding crowds, cleaning your hands, and
                coughing
                into a bent elbow or tissue. Check local advice where you live and work. Do it all!
            </marquee>
        </div>
    </div>
</body>
</html>