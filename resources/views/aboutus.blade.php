<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel=”stylesheet” href=” https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 800px;  /* The height is 400 pixels */
        width: 100%; 
         /* The width is the width of the web page */
       }
       a{
          
          padding: 30px;
       }
       
       /**/
    </style>
  </head>
  <body id="body" style="background-image:linear-gradient(-60deg,#2ea1e3,#05d8c3);">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1><a href="{{ route('home') }}" style="color: white">Public Toilet Finder</a></h1>
                <a href="{{ route('add') }}" ><img src="{{ asset('admin/icons/1-01.svg') }}" alt="" width="50px" height="50px"></a>
                <a href="{{ route('aboutus') }}" ><img src="{{ asset('admin/icons/2-02.svg') }}" alt="" width="50px" height="50px"></a>
                <a href="{{ route('contactus') }}" ><img src="{{ asset('admin/icons/3-03.svg') }}" alt="" width="50px" height="50px"></a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h1 style="margin-top: 20px;color: white"><b>Watson Cell</b></h1>
                <br>
                <p >It is a matter of pride and satisfaction that  is continuously communicating and interacting with all stakeholders in Water, Sanitation and Hygiene (WASH) sector to consolidate the data and coordinate their efforts across the province.</p>
            </div>

            <div class="col-md-12">
                <h1 style="margin-top: 20px;color: white"><b>History Of Watson Cell</b></h1>
                <br>
                <p >One day orientaon for the members of Provincial Steering, District Coordinaon commiees and districts administraon on sanitaon up th scaling approaches was organized on 27 July 2016 in Peshawar. The event was inaugurated by Secretary Local Government & Rural Development Department and aended by more than one hundred professionals from government and non-governmental organizaons. Senior Minister Mr. Annayat Ullah Khan graced the event as the Chief Guest. He extended his full support for sanitaon up scaling across the province and stress on more and more on the improvement of sanitaon services.</p>
            </div>

            <div class="col-md-12">
                <h1 style="margin-top: 20px;color: white"><b>Working Area Of Watson Cell</b></h1>
                <br>
                <p >Five Regional trainings with the support of UNICEF and ACF were organized in Swat ,Mardan, Dir Upper, Abbotabad and DI Khan to train the technical staff of 58 vulnerable TMA's on Emergency Preparedness and Response Planning. 86 officials of 45 TMA's were trained including 3 Tehsil Municipal Officer, 13 TOI's/ATOI's, 38 Sub Engineers, and 32 technical staff. The parcipants of the trainings found the training material and methodology very interesng and effectively.</p>
            </div>

            <div class="col-md-12">
                <h1 style="margin-top: 20px;color: white"><b>Organization Connected</b></h1>
                <br>
                <p >WatSan Cell, LG & RDD in collaboraon with WASH Cluster KP/FATA and th UNILIVER Pakistan Ltd commemorated the 9 Global Hand washing th th week from 14 to 20 October 2016 to promote hand washing with soap across the province. Different acvies were carried out with theme for this year “make hand washing a habit” in different parts of the province. Secretary Local Council Board Mr. Khizar Hayat Khan has shown deep interest in the acvies and directed all Tehsil/Town Municipal Officers to commemorate the day with zeal and interest in their jurisdicon. 5040 soap provided by Lifebuoy Pakistan (Uniliver Ltd) were distributed among school children in consultaon with Director Elementary and Secondary Educaon Peshawar.</p>
            </div>

            <div class="col-md-12">
                <h1 style="margin-top: 20px;color: white"><b>Donors</b></h1>
                <br>
                <p > Signing of MOU with Academia 2. Trainings of Verificaon Commiees 3. Development of Sanitaon Road Map for Khyber Pakhtunkhwa 4. Arrangement of Sanitaon Fesval to commemorate World Toilet Day 5. Capacity Building Training of Master Trainers in DI Khan and Bannu Division 6. Preparaon of Sector Strategic Review 7. Launching of Total Sanitaon Database .</p>
            </div>
        </div>
  </div>
</body>
</html>