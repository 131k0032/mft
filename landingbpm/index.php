
<!DOCTYPE html>
<!-- saved from url=(0096)https://bpm.findor.com/results/list?packageType=H&room1=2&checkIn=2017-01-07&checkOut=2017-01-08 -->
<html xmlns:ng="http://angularjs.org" id="ng-app">
    <head>
    <title ng-bind="pageTitle" class="ng-binding">BPM Festival | Official Transfer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="findorClient" content="bpm">
<base href=".">
                <meta name="build.sha" content="adb879a4da93">

                  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
        <li class="ppd-top-25" style="margin-right:10px">
            <a ng-click="selectMobileDate(&#39;in&#39;)" style="font-size:0.9rem">
                <span class="fa fa-whatsapp">
               </span>&nbsp;&nbsp;  +52 (984) 206 2754  </a>
        </li>
        <li class="border-right-box pd-right-35 ppd-top-25">
            <a ng-click="selectMobileDate(&#39;out&#39;)" style="font-size:0.9rem">
                <span class="fa fa-phone">
                </span>&nbsp;&nbsp;+52 (984) 179 2745
            </a>
        </li>
    </ul>
</div>
</div>
 </div>
    <div class="row header-bottom padding" ng-show="CONFIG " data-ng-mouseover="hidecalendar()">
        <div class="col-md-12 ">
            <div class="row ">

                <div class="col-lg-8 col-md-8 col-sm-6 pull-left ">
                    <div class="logo-box ">
                    <!--
                        <a ng-show="logo &amp;&amp; logo.url " href="./"  class="cell logo" ng-style="logoStyle " style="width: 67px;">
                            <img ng-src="/config/bpm/images/logo-header.png?_type=logo.url" width="52" height="35" class="logo " src="./index_files/logo-header.png">
                        </a>
                    -->
                    </div>
                    <h1 class="config-city  ng-binding" style=" line-height: 80%">TRANSFER <br><span style=" text-transform: lowercase">

                    <a href="./">
                        <img style="height:60px" src="index_files/logo-header.png">
                    </a>

                    </span>

                    Playa del Carmen</h1>
                    <h2 class="config-city-tagline  ng-binding ng-scope" ng-hide="">Transfer deal for  BPM Festival from January 6 - 15, 2017</h2>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 pull-right" ng-show="CONFIG.map.promo[language.code][1] ">
                    <div class="action-box ">
                        <div class="title action-box-text  ng-binding">Transfer deal for BPM </div>
                        <div class="description action-box-text  ng-binding">from January 6 - 15, 2017 </div>
                    </div>

                    <div>
                        <p class="action-box-text  ng-binding">&nbsp;<b class="ng-binding"></b></p>
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

     <div style="background-color:black">
         <iframe src="include-paso1.php" frameborder="0" style="width:100%; " scrolling=no frameborder="0" onload="resizeIframe(this)" ></iframe>
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
              <span class="ng-scope">Powered by Mayan Fantasy Tours</span>
            </a>


          </div>
          <div class="col-md-6 hidden-sm hidden-xs">
            <div class="menu" style="text-align:center !important;float:none">
              <a href="#" style="margin-left: 1.5rem;" ng-hide="" class="ng-scope">About</a>

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


      </div>

    </div>
  </div>
</div>
</footer>



</div>


    <link type="text/css" rel="stylesheet" href="./index_files/config.css">


</body>
   </html>

   <script>
  function resizeIframe(obj) {
    obj.style.height =  '0px';


    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<?php include_once("analyticstracking.php") ?>

<?php include "zoopim.php" ?>
