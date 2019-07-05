<div class="output color twoway">
			<div class="wrap">
				<div>
					<p id="txtdate1"><?php echo $_COOKIE["txtdate1"] ?>&nbsp;&nbsp;<?php echo $_COOKIE["txttime1"] ?></p>
					<p ><span id="txtorig1"><?php echo $_COOKIE["txtorig1"]." ".$_COOKIE["txtotr1"] ?></span> <small>to</small>
                        <span id="txtdest1"><?php

                                echo $_COOKIE["txtdest1"]." ".$_COOKIE["txtotr2"]  ?></span></p>
                    <p>
                       <?php echo $_COOKIE["txtadul"] ?><small> Adults</small>
                       <?php echo $_COOKIE["txtchil"] ?><small> Child</small>
                       <?php echo $_COOKIE["txtenfa"] ?><small> Enfants</small>
                    </p>
                    <p>

                    </p>

				</div>

                <?php if($_COOKIE["txttipo"] == "rt" ){   ?>

				<div>
					<p id="txtdate1"><?php echo $_COOKIE["txtdate2"] ?>&nbsp;&nbsp;<?php echo $_COOKIE["txttime2"] ?></p>
					<p><?php echo $_COOKIE["txtorig2"]." ".$_COOKIE["txtotr3"] ?> <small>to</small> <?php echo $_COOKIE["txtdest2"]." ".$_COOKIE["txtotr4"] ?></p>
				</div>

                <?php } ?>

			</div>
		</div>