@extends('layouts.app')
<body>

@section('content')
<div class="wrapper">
        <div class="about-title"> About 
            <small style="font-size: 18px">  <a href="{{route('music')}}" style="color: #828282"> /       main </a>
            </small>
           
        </div>
       
        <div class="about">
        

         <div class="img-about">
            <img src="img/mainpic.PNG " alt="Los Angeles" style="width: 100%">   
         </div>

             <p class="about-text">
          
                                This is the website is dedicated for true music lovers.Here you can listen to your favorite music, as well as share with your friends in chats and groups. 
                    Whatever song you look for, you can easily type and search. On the main page, there can be seen two blocks, Top new release and Popular. List of fresh and recently released songs is published in former. While list of most popular and most loved songs is published in latter. Website is updated and enriched with new releases every day. Moreover, you can also like the songs that you prefer most, and after signing up, they will occur in your favorite list. The next advantage is that in genres page, all songs are sorted respectively with the genres. There are big variety of genres – starting from classical music till hard rock.
                    All in all, for people who adore and relax with the music our website is invaluable source to find and listen.
                          </p>     
        </div>
    <div id="map"></div>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1TByF6dZvQcieuZeFGbszqZQ4HeewwbI&callback=initMap">
    </script>
</div>
   @endsection

</body>
</html>
