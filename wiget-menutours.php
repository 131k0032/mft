
<?php

    $archivo_actual = basename($_SERVER["PHP_SELF"]);
  // echo $archivo_actual;



?>


					<div class="widget">
						<ul class="categories">
							<li><a href="./#services">Our Tours</a></li>
							<li     class="<?php if($archivo_actual == "det-tulum.php")  {echo "active"; } ?>" > <a href="tulum-tour-mft">Tulum Reef </a></li>
							<li     class="<?php if($archivo_actual == "det-coba.php")   {echo "active"; } ?>"><a  href="coba-tulum-tour-mft">Coba-Tulum Sunset</a></li>
							<li     class="<?php if($archivo_actual == "det-chichen.php"){echo "active"; } ?>"><a  href="chichen-itza-tour-mft">Chichen Sunrise</a></li>
						</ul>
					</div>