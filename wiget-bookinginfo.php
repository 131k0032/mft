<h4>Booking summary</h4>
<div class="summary">
<div>
<h5>DEPARTURE</h5>
<dl>
  	<dt>Date</dt>
  	<dd><?php echo $_COOKIE["txtdate1"] ?> <?php echo $_COOKIE["txttime1"] ?></dd>
  	<dt>From</dt>
  	<dd><?php echo $_COOKIE["txtorig1"]." ".$_COOKIE["txtotr1"] ?></dd>
  	<dt>To</dt>
  	<dd><?php echo $_COOKIE["txtdest1"]." ".$_COOKIE["txtotr2"] ?></dd>
  	<dt>Vehicle</dt>
  	<dd><?php echo $_COOKIE["txtvehi"] ?></dd>
  	<dt>People</dt>
    <dd><?php echo $_COOKIE["txtadul"] ?> Adult | <?php echo $_COOKIE["txtchil"] ?> Child | <?php echo $_COOKIE["txtenfa"] ?> Enfants </dd>
  	<dt>Amount</dt>
  	<dd>$<?php echo $_COOKIE["txtmont"] ?></dd>
  	<dt>CUPON</dt>
  	<dd><?php echo $_COOKIE["txtcupo"] ?></dd>
</dl>
</div>

<?php if($_COOKIE["txtdate2"] != "" ){   ?>
            <div>
            <h5>RETURN</h5>
            <dl>
            	<dt>Date</dt>
            	<dd><?php echo $_COOKIE["txtdate2"] ?> <?php echo $_COOKIE["txttime2"] ?></dd>
            	<dt>From</dt>
            	<dd><?php echo $_COOKIE["txtorig2"]." ".$_COOKIE["txtotr3"] ?></dd>
            	<dt>To</dt>
            	<dd><?php echo $_COOKIE["txtdest2"]." ".$_COOKIE["txtotr4"] ?></dd>
            	<dt>Vehicle</dt>
            	<dd><?php echo $_COOKIE["txtvehi"] ?></dd>
            	<dt>Amount</dt>
            	<dd>$<?php echo $_COOKIE["txtmont"] ?></dd>

            </dl>
            </div>
     <?php } ?>


<dl class="total">
<dt>Total</dt>
<dd><?php echo $_COOKIE["txttota"] ?> usd</dd>
</dl>
</div>