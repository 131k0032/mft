<!DOCTYPE html>
<!-- saved from url=(0096)https://bpm.findor.com/results/list?packageType=H&room1=2&checkIn=2017-01-07&checkOut=2017-01-08 -->
<html xmlns:ng="http://angularjs.org" id="ng-app">
    <head>
    <title ng-bind="pageTitle" class="ng-binding">BPM Festival | Official Travel by Findor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="findorClient" content="bpm">
<base href=".">
                <meta name="build.sha" content="adb879a4da93">


                  <meta http-equiv="X-UA-Compatible" content="IE=edge">

                  <link rel="icon" type="image/ico" href="https://bpm.findor.com/static/images/favicon.ico">

                  <!-- Stripe API, it requires to be loaded before angular-stripe -->
                  <script type="text/javascript" src="./index_files/saved_resource(1)"></script>

                  <!-- Vendor scripts, Built Client and Vendor Styels -->
                  <script src="./index_files/vendor-adb879a4da93.js.descarga"></script>
                  <script src="./index_files/findor-client-adb879a4da93.js.descarga" type="text/javascript"></script>
                  <link rel="stylesheet" type="text/css" href="./index_files/vendor-adb879a4da93.css">

                  <!-- AngularJS constants are bundled into findor-client.js during produciton build only, so we load them manually. -->
                  <script src="./index_files/ng-constant.config.js.descarga" type="text/javascript"></script>

                  <link rel="stylesheet" href="./index_files/style.css">

                  <!-- Critical styles -->
                  <style type="text/css">
                    body {
                      display: none;
                    }
                  </style>

  </head>

  <body>






   <div class="ui-view ng-scope">
    <div class="header results-header ng-scope" ng-include="&#39;static/templates/header.view.tpl.html&#39;">
            <div class="container-fluid ng-scope" ng-controller="HeaderCtrl">

    <div class="row header-top padding">
        <div class="col-md-4 col-sm-4 col-xs-2 ng-hide" ng-show="!showHeaderFilter">
            <div class="logo-box">
                <a ng-show="logo &amp;&amp; logo.url" href="http://www.thebpmfestival.com/" class="cell logo" ng-style="logoStyle" style="width: 67px;">
                    <img ng-src="/config/bpm/images/logo-header.png?_type=logo.url" width="52" height="35" class="logo" src="./index_files/logo-header.png">
                </a>
            </div>
        </div>


        <div class="col-md-8 col-sm-12 col-xs-12 filters-box ng-scope" ng-include="&#39;static/templates/results-filter.view.tpl.html&#39;" ng-show="showHeaderFilter">

<style class="ng-scope">


    .input-picker:hover.searchDate {
        color: #fff !important;
    }

    .input-picker:hover::-webkit-input-placeholder {
        opacity: 0.5;
    }

    .input-picker:hover:-moz-placeholder {
        opacity: 0.5;
        /* For Firefox 18- */
    }

    .input-picker:hover::-moz-placeholder {
        opacity: 0.5;
        /* For Firefox 19+ */
    }

    .input-picker:hover:-ms-input-placeholder {
        opacity: 0.5;
    }

    #ui-datepicker-div {
        margin-top: 19px !important;
    }

    #alert-date {
        position: absolute;
        top: 0;
        left: 0;
        width: 490px;
        height: 63px;
        color: #fff;
        background: red;
        font-size: 1.24rem;
        text-align: center;
        padding: 21px;
        border: 1px solid #fff;
        border-radius: 3px;
    }

    #alert-date .close {
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }


    .hover-me {
        cursor: pointer;
    }

    .hover-me:hover {
        color: #5d5757;
    }

    #mobile-date {
        position: absolute;
        top: 60px;
        left: -26px;
        z-index: 3;
    }


    /* Center the loader */

    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 5;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


    ul {
        list-style: none;
    }

    .boxes li,
    .header-right-side li {
        display: inline-block;
        float: left;
        /*padding: 20px 0; */
        height: 60px;
    }

    .boxes li a,
    .header-right-side li a {
        height: 60px;
        display: flex;
        align-items: center
    }

    .centrado {
        height: 60px;
        display: flex;
        align-items: center;
        float: left;
    }

    .check-box {
        display: block;
        width: 17px;
        height: 17px !important;
        border: 1px solid #5d5757;
        border-radius: 3px;
        /*float: left;*/
        text-align: center;
        cursor: pointer;
        transition: all 1s;
        margin-right: 11px;
    }

    #checkin-date {
        position: absolute;
        top: 35px;
        left: 20px;
        z-index: 400;
    }

    .pd-left-35 {
        padding-left: 35px !important;
    }

    .pd-right-35 {
        padding-right: 35px !important;
    }

    .pd-right-7 {
        padding-right: 7px !important;
        ;
    }

    .pd-r-l-7px {
        padding-left: 7px !important;
        ;
        padding-right: 7px !important;
        ;
    }

    .pd-left-7 {
        padding-left: 7px !important;
        ;
    }

    .pd-right-15 {
        padding-right: 15px !important;
        ;
    }

    .pd-top-25 {
        padding-top: 25px !important
    }

    .opaca {
        opacity: 0.5;
        cursor: initial;
    }

    @media all and (max-width:740px) {
        .date-indicat {
            display: none;
            opacity: 0;
        }
    }
</style>
<div class="boxes ng-scope" ng-class="{&#39;open&#39;: toggleFilters}" style="display:block">

    <ul class="hidden-xs">
        <li class="">
            <a ng-click="selectMobileDate()">
                <span class="menu-icon findor-icon-calendar findor-icon" style="margin-right:15px"></span>
            </a>
        </li>
        <li class="ppd-top-25" style="margin-right:10px">
            <a ng-click="selectMobileDate(&#39;in&#39;)" style="font-size:0.9rem">
                <span class="">
                Sat 07 Jan 2017
                <span>
            </span></span></a>
        </li>
        <li style="margin-right:10px">
          <a>
            <span class="menu-icon findor-icon-Right-line"></span>
            </a>
        </li>
        <!--
        <li class="" >
            <a ng-click="selectMobileDate()">
                <span class="menu-icon findor-icon-arrow-right findor-icon" style="margin-right:15px;margin-left:15px"></span>
            </a>
        </li>-->
        <li class="border-right-box pd-right-35 ppd-top-25">
            <a ng-click="selectMobileDate(&#39;out&#39;)" style="font-size:0.9rem">
                <span class="">
                Sun 08 Jan 2017
                </span>
            </a>
        </li>

        <li class="pd-left-35" style="ppadding-top:21px">
            <a class="hidden">
                <span class="check-box hidden" ng-click="setSearchType(&#39;H&#39;)">
                <span class="input-picker-icon findor-icon-check findor-icon" style="font-size:1rem" ng-show="search.types.hotelOnly"></span>
                </span>
            </a>
        </li>
        <li class="ng-hide" ng-click="setSearchType(&#39;H&#39;)" ng-show="!tickets.empty">
            <a class="opaca">
                <span class="findor-icon findor-icon-bed2" style="margin-right:11px"></span>
            </a>
        </li>


        <li style="ppadding-top:21px " ng-show="!tickets.empty " class="ng-hide">
            <a class="hidden ">
                <span class="check-box hidden " ng-click="setSearchType( &#39;T&#39;) ">
                <span class="input-picker-icon findor-icon-check findor-icon  ng-hide" style="font-size:1rem " ng-show="search.types.hotelPlusTicket "></span>
                </span>
            </a>
        </li>
        <li class="ng-hide" ng-click="setSearchType( &#39;T&#39;) " ng-show="!tickets.empty ">
            <a class="">
                <span class="findor-icon-ticket2 menu-icon " style="margin-right:11px "></span>

            </a>
        </li>
        <!--#adadad-->
         <li class="ppd-top-25 bborder-right-box pd-right-35  ng-hide" ng-click="setSearchType( &#39;T&#39;) " ng-show="!tickets.empty ">
            <a style="font-size:0.9rem " class="">
                <span class="ng-scope">Hotel + Admission</span>
            </a>
        </li>

    </ul>



</div>

</div>




        <div class="col-md-4 pull-right" ng-show="showHeaderFilter">
            <a class="expand" ng-click="menuIsOpen = !menuIsOpen"><span class="findor-icon findor-icon-menu"></span></a>
            <div class="menu" ng-class="{&#39;open&#39;: menuIsOpen}">
                <div class="header-right-side">
                    <div>
                        <span class="close-menu" ng-click="menuIsOpen = !menuIsOpen"></span>

                        <ul class="hide-mobile">
                            <li class="border-left-box pd-left-35">
                                <a ng-click="setIteniraryState()">
                                    <i class="findor-icon-user menu-icon"></i>

                                </a>
                            </li>
                            <li class="pd-right-35 ppd-top-25" ng-click="setIteniraryState()">
                                <a style="margin-left:11px;font-size:0.9rem" class="ng-scope">Sign-in</a>
                             </li>
                            <li>
                                <a href="https://bpm.findor.com/help" ng-mouseover="ssethelpSupport() ">
                                    <i class="findor-icon-globe menu-icon "></i>

                                </a>
                            </li>
                            <li class="ppd-top-25 " ng-mouseover="ssethelpSupport() ">
                                 <a href="https://bpm.findor.com/help" style="margin-left:11px;font-size:0.9rem " class="ng-scope">Help &amp; Support</a>
                             </li>
                        </ul>
                        <ul class="show-mobile ">
                            <li class="">
                                <a ng-click="setIteniraryState()" class="ng-scope"><i class="findor-icon-user menu-icon "></i>
                                    Sign-in</a>
                            </li>
                            <li>
                                <a href="https://bpm.findor.com/help" ng-mouseover="ssethelpSupport() " class="ng-scope"><i class="findor-icon-globe menu-icon "></i>
                      Help &amp; Support</a>
                            </li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-4 pull-right  ng-hide" ng-hide="showHeaderFilter ">
            <a class="expand " ng-click="menuIsOpen=! menuIsOpen "><span class="findor-icon findor-icon-menu "></span></a>
            <div class="menu " ng-class="{ &#39;open&#39;: menuIsOpen} ">
                <div class="header-right-side ">
                    <div>
                        <span class="close-menu " ng-click="menuIsOpen=! menuIsOpen "></span>

                         <ul class="show-mobile ">
                            <li class="">
                                <a ng-click="setIteniraryState()">
                                   <i class="findor-icon-user menu-icon  ng-scope"></i>
                                    Sign-in
                                </a>
                            </li>
                            <li>
                                <a href="https://bpm.findor.com/help" ng-mouseover="ssethelpSupport() " class="ng-scope"><i class="findor-icon-globe menu-icon "></i>
                      Help &amp; Support</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row header-bottom padding" ng-show="CONFIG " data-ng-mouseover="hidecalendar()">
        <div class="col-md-12 ">
            <div class="row ">

                <div class="col-lg-8 col-md-8 col-sm-6 pull-left ">
                    <div class="logo-box ">
                        <a ng-show="logo &amp;&amp; logo.url " href="http://www.thebpmfestival.com/" class="cell logo" ng-style="logoStyle " style="width: 67px;">
                            <img ng-src="/config/bpm/images/logo-header.png?_type=logo.url" width="52" height="35" class="logo " src="./index_files/logo-header.png">
                        </a>
                    </div>
                    <h1 class="config-city  ng-binding">Playa del Carmen</h1>
                    <h2 class="config-city-tagline  ng-binding ng-scope" ng-hide="CONFIG.oneDay">21 hotel deals for  BPM Festival from January 6 - 15, 2017</h2>
                    <h2 class="config-city-tagline  ng-binding ng-scope ng-hide" ng-show="CONFIG.oneDay">21 hotel deals for the  BPM Festival on January 15, 2017</h2>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 pull-right" ng-show="CONFIG.map.promo[language.code][1] ">
                    <div class="action-box ">
                        <div class="title action-box-text  ng-binding">UP TO 20% OFF HOTELS</div>
                        <div class="description action-box-text  ng-binding">EARLY BIRD BOOKINGS</div>
                    </div>

                    <div>
                        <p class="action-box-text  ng-binding">ACT FAST! LIMITED TIME OFFER&nbsp;<b class="ng-binding"></b></p>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <style>

        @media all and (min-width:778px){
            .header a.expand {
                right:-20px !important;
            }
        }

        .ui-datepicker {
            background: #fff !important;
        }

    </style>



</div></div>

     <div>
      <iframe src="include-paso1.php" frameborder="0" style="width:100%; height:500px"></iframe>   
     </div>

<footer class="footer results-footer ng-scope" ng-include="&#39;static/templates/footer.view.tpl.html&#39;">
<div data-ng-controller="FooterCtrl" class="container-fluid ng-scope">

  <div class="row">

    <div class="col-md-12">

      <div class="container-fluid with-big-gutter padding">

        <div class="row">

          <div class="col-md-3 col-sm-12 col-xs-12">

            <a class="company-logos" ng-click="showAboutOverlay()" ng-hide="config.powered">
              <span class="footer-logotype"></span>
              <span class="ng-scope">Powered by findor.com</span>
            </a>
            <a class="company-logos ng-hide" ng-href="" ng-show="config.powered">
              <span class="footer-logotype"></span>
              <span class="ng-binding ng-scope">Powered by </span>
            </a>

          </div>
          <div class="col-md-6 hidden-sm hidden-xs">
            <div class="menu" style="text-align:center !important;float:none">
              <a href="http://findor.com/" style="margin-left: 1.5rem;" ng-hide="" class="ng-scope">About</a>
              <a href="https://bpm.findor.com/help" style="margin-left: 1.5rem;" class="ng-scope">Help &amp; Support</a>
              <a href="https://bpm.findor.com/terms-of-service" style="margin-left: 1.5rem;" class="ng-scope">Terms of use</a>
              <a href="https://bpm.findor.com/privacy-policy" style="margin-left: 1.5rem;" class="ng-scope">Privacy Policy</a>
            </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 col-md-offset-1">
            <div class="menu" ng-class="{&#39;open&#39;: menuIsOpen}">
              <div class="cell dropdown top-dropdown" is-open="currencyIsOpen">
                <a class="button dropdown-toggle ng-binding" aria-haspopup="true" aria-expanded="false">USD ($) <span class="sprite header-select"></span></a>
                <ul class="dropdown-menu">
                  <!-- ngRepeat: (key, val) in currencies --><li ng-repeat="(key, val) in currencies" class="ng-scope"><a ng-click="setCurrency(key)" class="ng-binding">CAD ($)</a></li><!-- end ngRepeat: (key, val) in currencies --><li ng-repeat="(key, val) in currencies" class="ng-scope"><a ng-click="setCurrency(key)" class="ng-binding">EUR (€)</a></li><!-- end ngRepeat: (key, val) in currencies --><li ng-repeat="(key, val) in currencies" class="ng-scope"><a ng-click="setCurrency(key)" class="ng-binding">GBP (£)</a></li><!-- end ngRepeat: (key, val) in currencies --><li ng-repeat="(key, val) in currencies" class="ng-scope"><a ng-click="setCurrency(key)" class="ng-binding">USD ($)</a></li><!-- end ngRepeat: (key, val) in currencies -->
                </ul>
              </div>

              <div class="cell dropdown top-dropdown" is-open="languageIsOpen">
                <a class="button dropdown-toggle ng-binding" aria-haspopup="true" aria-expanded="false">English <span class="sprite header-select"></span></a>
                <ul class="dropdown-menu">
                  <!-- ngRepeat: (key, val) in languages --><li ng-repeat="(key, val) in languages" ng-hide="val.optional" class="ng-scope ng-hide"><a ng-click="setLanguage(key)" class="ng-binding">Catalán</a></li><!-- end ngRepeat: (key, val) in languages --><li ng-repeat="(key, val) in languages" ng-hide="val.optional" class="ng-scope"><a ng-click="setLanguage(key)" class="ng-binding">English</a></li><!-- end ngRepeat: (key, val) in languages --><li ng-repeat="(key, val) in languages" ng-hide="val.optional" class="ng-scope"><a ng-click="setLanguage(key)" class="ng-binding">Español</a></li><!-- end ngRepeat: (key, val) in languages --><li ng-repeat="(key, val) in languages" ng-hide="val.optional" class="ng-scope"><a ng-click="setLanguage(key)" class="ng-binding">Français</a></li><!-- end ngRepeat: (key, val) in languages -->
                </ul>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 hidden-md hidden-lg">
            <div class="menu" style="text-align:center;float:none;margin-top:25px">
              <a href="http://findor.com/" style="margin-left: 1.5rem;" class="ng-scope">About</a>
              <a href="https://bpm.findor.com/help" style="margin-left: 1.5rem;" class="ng-scope">Help &amp; Support</a>
              <a href="https://bpm.findor.com/terms-of-service" style="margin-left: 1.5rem;" class="ng-scope">Terms of use</a>
              <a href="https://bpm.findor.com/privacy-policy" style="margin-left: 1.5rem;" class="ng-scope">Privacy Policy</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
</footer>



</div>


    <link type="text/css" rel="stylesheet" href="./index_files/config.css">


</body>
   </html>



