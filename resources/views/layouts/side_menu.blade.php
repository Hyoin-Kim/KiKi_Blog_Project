<style type="text/css">
    .nav-catergories{
        height: 100%;
    }
    .content-catergory
    {
        min-width: 70px;
        height: 100vh;
        position: fixed;
    }
    .sub-category a {
        display: block;
        width: 130px;
        text-align: left;
        padding: 5px 0px 5px 25px;
        text-decoration: none;
        color: #DEE2E6;
    }
    .main-category a, .main-category a:hover
    {
        text-decoration: none !important;
    }
    .sub-category a:hover{
        text-decoration: none !important;
        color: #92bdff;
    }
    li.active .main-category a, li.active .main-category a:hover
    {
        color: #609FFF;
    }
    .nav-catergories:hover li.active .sub-category, .nav-catergories:hover li .cateogry-name
    {
        display: contents;
    }
    .sub-category, .cateogry-name{
        display: none;
    }
    .main-category{
        text-align: left;
        text-align: left;
        padding: 45px 25px;
        padding-bottom:10px;
    }
    .main-category a{
    	color:#000000!important
    }
    .category-icon{
    	font-size:20px;
    }
    /*.nav-catergories li:active .sub-category{
        display: contents;
    }*/
</style>



<!-- <a href="https://laravel-news.com">News</a> -->
<!-- <a href="https://www.instagram.com">Instagram</a>
<a href="https://www.facebook.com">Facebook</a>
<a href="https://www.kakaocorp.com/service/KakaoTalk">KakaoTalk</a>
<a href="https://vapor.laravel.com">AddFriend</a> -->
<!--<li class="@yield('nav-projects')">
	<div class="main-category">
		<a href="{{ url('/board') }}"><i class="fas fa-clipboard-list category-icon" style="font-size:30px"></i></a>
    </div>
     <div class="sub-category">
        
    </div> 
    <div class="main-category">
        <a href="{{ url('/blog/album') }}"><i class="far fa-images category-icon" style="font-size:30px"></i>
    </div>

     <div class="main-category">
        <a href="{{ url('/blog/friend') }}"><i class="far fa-address-book category-icon" style="font-size:30px"></i>
    </div>

    <div class="main-category">
        <a href="https://www.instagram.com"><i class="fab fa-instagram category-icon" style="font-size:30px"></i></a>
    </div>


    <div class="main-category">
         <a href="https://www.facebook.com"><i class="fab fa-facebook category-icon" style="font-size:30px"></i>
    </div>

    <div class="main-category">
         <a href="https://www.kakaocorp.com/service/KakaoTalk"><i class="fas fa-sms category-icon" style="font-size:30px"></i>
    </div>

    


</li>-->



