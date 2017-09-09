			<div id="theme">
				<label>Thème : </label>
				<select id="adminselector" onchange="themeSelect()" form="selvalform" name="theme" type="submit">
					<option style="color:lightgrey;"  value="null">Sélectionner...</option>
					<option style="color:white; background-color: grey;"  value="1">Iron Shell</option>
					<option style="color:black; background-color: pink"  value="2">Girly Doll</option>
					<option style="color:white; background-color: red"  value="3">Satan's Back</option>
					<option style="color:black; background-color: wheat"  value="4">Sun Heat</option>
					<option style="color:white; background-color: violet"  value="5">Purple Rain</option>
				</select>			
				<form method="post" name="hideform" id="selvalform" action="theme-valide">
					<input id="hide" type="hidden" name="hide" value="1"></input>
					<?php
					echo '<input id="hide2" type="hidden" name="hide2" value="' . $_SESSION['id'] . '"></input>'
					?>
					<button style="    margin-top: 3px;" id="submitheme">VALIDER</button>
					<p style="font-size: 0.8em">En cliquant sur <span id="themeval1" class="themeval">VALIDER</span>, vous devrez vous reconnecter.<br><span id="themeval2" class="themeval">ATTENTION</span><br>Toute donnée non sauvegardée sera perdue.</p>
				</form>
			</div>