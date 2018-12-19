<?php

	@session_start();

?>
<i class="fal fa-times fa-2x t-clr2" onClick="closeModal()" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
<div class="centralizarX" style="padding: 50px 0px 50px 0px; width: 500px;">
	<img src="https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=<?= $_SESSION['aluno']["matricula"]?>" alt="qrcode">
</div>