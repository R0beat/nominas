<?php
	//Utilizamos un  navbar pen donde tendra un link para destruir la sesión
	$header = '   <header>
				      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				         <div class="collapse navbar-collapse" id="navbarColor01">
				            <ul class="navbar-nav mr-auto">
				               <li class="nav-item active">
				                 <a class="nav-link" style="font-size: 20px;"><i class="fad fa-user-circle"></i> </a>
				               </li>
				            </ul>
				            <form class="form-inline my-2 my-lg-0">
				               <ul class="navbar-nav mr-auto">
				                  <li class="nav-item active justify-content-right">
				                     <a class="nav-link" ><i class="fad fa-envelope-square"></i> </a>
				                  </li>
				                  <li class="nav-item active float-right">
				                     <a class="nav-link" href="cierre.php"><i class="fad fa-sign-out-alt"> </i> CERRAR SESIÓN</a>
				                  </li> 
				               </ul>
				            </form>
				         </div>
				      </nav>
				   </header>';
	echo $header;

 ?>