
<?php 
function notice($type)
{
	if ($type == 1) {
		return "<audio autoplay><source src='../assets/music/success.wav'></audio>";
	} elseif($type == 0) {
		return "<audio autoplay><source src='../assets/music/error.wav'></audio>";
	}
}
?>