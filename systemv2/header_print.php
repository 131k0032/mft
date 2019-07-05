<style type="text/css">
.flex-container {
  display: flex;
  /*justify-content: center; */    /* align horizontal */
  align-items: center;         /* align vertical */
  padding-top: 20px;
}

.flex-container>div {
  /*width: 30%;*/
  margin: 10px;
  text-align: left;
/*  line-height: 75px;*/
  font-size: 14px;
   align-items: center;         /* align vertical */ 
}

.flex-container strong {
  font-size: 14px;
}

.firmas-box {
  display: flex;
  flex-direction: row;
  align-items: stretch;
}

.firmas-1 {
  width: 25%;
  overflow: hidden;
  padding-left: 20px;
}

.firmas-2 {
  width: 25%;
  overflow: hidden;
  padding-left: 20px;
}
.firmas-3 {
  width: 25%;
  overflow: hidden;
  padding-left: 20px;
}
.firmas-4 {
  width: 25%;
  overflow: hidden;
   padding-left: 20px;
}




.logo img {
  width: 300px;
  height: auto;
}

@media screen and (max-width: 900px) {
.logo img {
    display: none;
  }


</style>

<header>
	<div class="flex-container">
    <div class="logo">
      <img src="http://www.mft.com.mx/images/transfers.jpg" alt="" />
    </div>
    <div class="firmas-box">
        <div class="firmas-1">
          <p><strong>KI</strong><br>   ___________
              <br>
              <br>
          </p>
          <p><strong>KF</strong><br>   ___________
              <br>
              <br>
          </p>
          <p><strong>KR</strong><br>   ___________
              <br>
              <br>
        </p>
        </div>
        <div class="firmas-2">
           <p><strong>GI</strong><br>   ___________
            <br>
            <br>
          </p>
          <p><strong>LI</strong><br>   ___________
                <br>
                <br>
          </p>
          <p><strong>E</strong><br>   ___________
                <br>
                <br>
          </p>    
        </div>
        <div class="firmas-3">
           <strong>Quien recibio</strong> 
            _____________
            <br><br>
           <strong>Servicios realizados</strong>

            _____________     
        </div>
        <div class="firmas-4">
           <strong>Entrega llave</strong>
            _____________
            <br><br>
           <strong>Recibe llave</strong>

            _____________     
        </div>                
      </div>
      <div>
        CARRETERA FEDERAL MZA 255 LOTE 25 LOCAL 17
        <br>ENTR 11 Y 21 DSUR ,COL EJIDO SUR C.P.: 77712
        <br>MFT050620NG0
      </div>
</div>
</header>