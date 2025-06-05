<?php function login_admin($url_panel){
//$url_panel='http://localhost/controlpanel/';
$mostrar='ertetertertertreterterte

	<form id="form1" name="form1" method="post" action="'.$url_panel.'">
	
	<!-- ************************************************JAVA ****************************************** -->	
	<input type="hidden" name="smartforms_rules" value="
usuario password : empty;
usuario : len >= 4;
password : len >= 6;
user password : chnum_;
correo: email;
Membership : select 0;
Year : > 1900;
Year Month Day : date;
Sex : radio;
Details: len <= 20;
Categories[] Newsletters[] : cnt >= 2;
Agree : terms;
" />
<input type="hidden" name="smartforms_behaviours" value="
Details : count details_count 20 black red;
Year : next 4;
Month Day : next 2;
Month Day : prev;
" />
<!--	****************************************************************************************** 	-->


	<table width="226" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td width="73">Usuario</td>
        <td>
          <label>
            <input type="text" name="usuario" id="usuario" accesskey="u" />
            </label></td>
        </tr>
      <tr>
        <td>Password</td>
        <td><label>
          <input type="password" name="password" id="password" accesskey="p" />
        </label></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="Submit" value="Enviar" />
        </label></td>
        </tr>
      <tr>
        <td colspan="2" align="center"><p>

		 <input name="url_panel" type="hidden" id="url" value="'.$url_panel.'" />

          Recuperar contrase&ntilde;a </p>
        </td>
      </tr>
    </table>
	</form>
	<script src="'.$url_panel.'smartforms.js">
</script
	';
	echo $mostrar;
	}
	
	/*
	
			 <input name="url" type="hidden" id="url" value="'.$url.'" />
		 <input name="codigo" type="hidden" id="codigo" value="'.$codigo.'" />
		          <input name="carpeta" type="hidden" id="carpeta" value="'.$carpeta.'" />
	*/
	?>