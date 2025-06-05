<?php
function mensaje_error($mensage,$opc){
	echo '<div class="alert alert-danger alert-dismissible fade show">';
		if($opc==''){
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}else{
			
		}
	echo '						<strong><i class="mdi mdi-cancel"></i></strong> '.$mensage.'</div>';
	}
////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_ok($mensage,$opc){
	echo '<div class="alert alert-success alert-dismissible fade show">	';
		if($opc==''){
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			}else{
				
			}					
	echo '<strong><i class="mdi mdi-check-circle"></i></strong> '.$mensage.'</div>';
	}
////////////////////////////////////////////////////////////////////////////////////////	
function mensaje_alert($mensage,$url_img){
	echo '
	<table border="0" align="center" cellpadding="0" cellspacing="0">
  	<tr>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />
	
	<img src="'.$url_img.'alert.png" alt="alert" width="16" height="16" />
	<font color="#0000ff">
	<br />
      '.$mensage.'</font></font> 
	  
	  <br />
	  &nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp; </td>
  	</tr>
	</table>';
	}
///////////////////////////////////////////////////////////////////////////////////////
function mensaje_error_2($mensage,$url_img){
	echo '
	<center>
	<img src="'.$url_img.'error.png" alt="Error" width="16" height="16" align="absmiddle" /><strong>
	<font color="#FF0000">'.$mensage.'
	</font></center>';
	}
//////////////////////////////////////////////////////////////////////////
function mensaje_ok_2($mensage,$url_img){
echo '
<center>
<img src="'.$url_img.'ok.png" alt="OK" width="16" height="16" align="absmiddle" />
<strong><font color="#009900">

  '.$mensage.'</font></strong></font> </center>'
  
 ;
}
?>