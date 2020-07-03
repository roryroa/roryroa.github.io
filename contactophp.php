<?php
//Parametros del email
$emaildestinatario = $this->item->extraFields-> mv_email->value;
$nombredestinatario= $this->item->extraFields-> mv_nombreanunciante->value;
$emailenvia = $_POST["rp_email"];
$nombredelqueenvia=$_POST["rp_nombre"];

// Respuesta de seguridad correcta | Si desea puede cambiar ese valor por otra respuesta correcta.
$myAntiSpamAnswer = "2";


?>
<!-- Estilos CSS -->
<style type="text/css">
.incorrecto{
background: #E84141; border-radius: 5px;
color: #FFFBFB; display: block;
font-size: 20px; margin: 20px 0;
padding: 10px; text-align:center;
}
.correcto{
background: #619A26; border-radius: 5px;
color: #FFFBFB; display: block;
font-size: 20px; margin: 20px 0;
padding: 10px; text-align: center;
}
.enviar_consulta{
display:inline-block;
padding:5px 10px;
color:#fff;
font-size: 20px;
font-weight: normal;
line-height: 24px;
padding: 12px 20px;
text-align:center;
vertical-align:middle;
text-decoration:none; 
cursor:pointer;
border:1px solid; 
-webkit-border-radius:3px;
-moz-border-radius:3px;
-ms-border-radius:3px;
-o-border-radius:3px;
border-radius:3px;
background-color: #FF7700;
-webkit-box-shadow:0 1px 0 rgba(255,255,255,0.2) inset,0 1px 2px rgba(0,0,0,0.05);
-moz-box-shadow:0 1px 0 rgba(255,255,255,0.2) inset,0 1px 2px rgba(0,0,0,0.05);
box-shadow:0 1px 0 rgba(255,255,255,0.2) inset,0 1px 2px rgba(0,0,0,0.05);
text-shadow:0 -1px 0 rgba(0,0,0,0.25);
background-size:100%;
background-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(0%,rgba(255,255,255,0.25)),color-stop(100%,rgba(255,255,255,0)));
background-image:-webkit-linear-gradient(top,rgba(255,255,255,0.25),rgba(255,255,255,0)); 
background-image:-moz-linear-gradient(top,rgba(255,255,255,0.25),rgba(255,255,255,0));
background-image:-o-linear-gradient(top,rgba(255,255,255,0.25),rgba(255,255,255,0));
background-image:linear-gradient(top,rgba(255,255,255,0.25),rgba(255,255,255,0));
border-color: transparent; border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
}
.enviar_consulta:hover,
.enviar_consulta:active,
.enviar_consulta:focus{
background:#F58E35;
}
.contactobox{
width: 300px;
}
</style>

<?php

//Url despues de enviar el formulario
$url = JURI::current(); 
$url = htmlentities($url, ENT_COMPAT, "UTF-8");

$myError = '';
$CORRECT_ANTISPAM_ANSWER = '';
$CORRECT_EMAIL = '';
$CORRECT_NOMBRE = '';
$CORRECT_SUBJECT = '';
$CORRECT_MESSAGE = '';

if (isset($_POST["rp_email"])) {
$CORRECT_NOMBRE = htmlentities($_POST["rp_nombre"], ENT_COMPAT, "UTF-8"); 
$CORRECT_MESSAGE = htmlentities($_POST["rp_message"], ENT_COMPAT, "UTF-8");

// Checkear anti-spam
if ($_POST["rp_anti_spam_answer"] != $myAntiSpamAnswer) {
$myError = '<p class="incorrecto">Código Anti-Spam incorrecto</p>';
}
else {
$CORRECT_ANTISPAM_ANSWER = htmlentities($_POST["rp_anti_spam_answer"], ENT_COMPAT, "UTF-8");
}

// Checkear email
if ($_POST["rp_email"] === "") {
$myError = '<p class="incorrecto">Por favor escriba su email.</p>';
}
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", strtolower($_POST["rp_email"]))) {
$myError = '<p class="incorrecto">Por favor escriba un email válido.</p>';
}
else {
$CORRECT_EMAIL = htmlentities($_POST["rp_email"], ENT_COMPAT, "UTF-8");
}

if ($myError == '') {
$mySubject = "Tiene una consulta para su anuncio: ". $this->item->title; //Asunto del email

//Mensaje del email
$myMessage = "Hola ".$nombredestinatario.", \n\n";
$myMessage .= "Página del anuncio: ".$url."\n\n";
$myMessage .= "Nombre: ".$_POST["rp_nombre"]."\n\n";
$myMessage .= "Email: ".$_POST["rp_email"]."\n\n";
$myMessage .= "Mensaje: \n\n";
$myMessage .= $_POST["rp_message"];

$mailSender = &JFactory::getMailer();
$mailSender->addRecipient($emaildestinatario);
$mailSender->setSender(array($emailenvia,$nombredelqueenvia));
$mailSender->addReplyTo(array( $_POST["rp_email"], '' ));

$mailSender->setSubject($mySubject);
$mailSender->setBody($myMessage);

if ($mailSender->Send() !== true) {
$myReplacement = '<p class="incorrecto">Su mensaje no fue enviado. Inténtelo de nuevo.</p>';
print $myReplacement;
}
else {
$myReplacement = '<p class="correcto"> Mensaje enviado correctamente</p>';
print $myReplacement;
}
}
}

// Checkear email
if ($emaildestinatario === "") {
$myReplacement = '<p class="incorrecto">No se ha definido un destinatario</p>';
print $myReplacement;
return true;
}
?>

<div class="contenedor_formulario">
<form action="<?php echo $url ?>" method="post">
<?php
if ($myError != '') {
print $myError;}
?>

<table>
<tr><td>Tu nombre:</td>
<td><input class="contactobox" type="text" name="rp_nombre" size="40" value="<?php echo $CORRECT_NOMBRE; ?>"/></td>
</tr>

<tr><td>Tu email:</td>
<td><input class="contactobox" type="text" name="rp_email" size="40" value="<?php echo $CORRECT_EMAIL; ?>"/></td>
</tr>

<tr><td valign="top">Tu mensaje:</td>
<td><textarea class="contactobox" name="rp_message" cols="38" rows="4"><?php echo $CORRECT_MESSAGE; ?> </textarea></td>
</tr>

<tr><td>¿Cuantos ojos tiene una persona?</td>
<td><input class="contactobox" type="text" name="rp_anti_spam_answer" size="40" value="<?php echo $CORRECT_ANTISPAM_ANSWER; ?>"/></td>
</tr>

<tr><td></td><td><input class="enviar_consulta" type="submit" value="Enviar" style="width:100%"/></td></tr>
</table>
</form>
</div><!-- Fin .contenedor_formulario-->
