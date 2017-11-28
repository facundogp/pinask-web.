$elemento = "tutorial.comentarios";
include("comentarios.php");
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL auto_increment,
  `Nombre` varchar(255) NOT NULL default '',
  `fecha` timestamp(14) NOT NULL,
  `elemento` varchar(50) NOT NULL default '',
  `comentario` text NOT NULL,
  `activo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Comentarios de Artículos y Scripts';
$sql = "SELECT * FROM comentarios where elemento='$elemento' and activo='1' order by id desc";
$sql = "INSERT INTO comentarios ($campos) VALUES ($valores)";
<?
header("Content-Type: image/png");

function rgbColor($fondo)    {
    $red = hexdec(substr($fondo, 0, 2));
    $green = hexdec(substr($fondo, 2, 2));
    $blue = hexdec(substr($fondo, 4, 2));
    return array($red, $green, $blue);
}
// recibimos los datos:
// n = número de estrellas
// max = grosor de cada estrella (altura y anchura)
// fondo = fondo en formato rrggbb
// fondos = en formato r1g1b1-%_anchura-r2g2b2
//    donde:
//        r1g1b1 = color de fondo del color principal en formato rrggbb
//        %_anchura = porcentaje de la anchura del primer color (r1g1b1)
//        r2g2b2 = color de fondo en formato rrggbb

foreach ($_GET as $dato => $cual)    $$dato = $cual;
$_n = (isset($n)) ? (int) $n : 1;
$_tam = (isset($max)) ? $max:30;
$largura = 30 * $_n;
$imagen = imagecreatetruecolor($largura, 30);

if (isset($fondo))    {
    $rgb = rgbColor($fondo);
    $f = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
    imagefill($imagen, 0, 0, $f);
}
elseif (isset($fondos))    {
    list ($fondo1, $ancho, $fondo2) = explode("-", $fondos);
    $largo2 = $largura * $ancho / 100;
    $rgb = rgbColor($fondo1);
    $f = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
    imagefill($imagen, 0, 0, $f);
    $imagen2 = imagecreatetruecolor($largo2, 30);
    $rgb = rgbColor($fondo2);
    $f = imagecolorallocate($imagen2, $rgb[0], $rgb[1], $rgb[2]);
    imagefill($imagen2, 0, 0, $f);
    imagecopy($imagen, $imagen2, 0, 0, 0, 0, $largo2, 30);
    imagedestroy($imagen2);
}
else    {
    $f = imagecolorallocate($imagen, 0, 0, 0);
    imagefill($imagen, 0, 0, $f);
}

$estrella = imagecreatefrompng("estrella.png");
$rrggbb = imagecolorat($estrella, 15, 15);
$rr = ($rrggbb >> 16) & 0xFF;
$gg = ($rrggbb >> 8) & 0xFF;
$bb = $rrggbb & 0xFF;

$color_fondo = imagecolorallocate($estrella, $rr, $gg, $bb);
imagecolortransparent($estrella, $color_fondo);

for($i = 0; $i < $_n; $i ++)
    imagecopy($imagen, $estrella, $i * 30, 0, 0, 0, 30, 30);
imagedestroy($estrella);

$rrggbb = imagecolorat($imagen, 0, 0);
$rr = ($rrggbb >> 16) & 0xFF;
$gg = ($rrggbb >> 8) & 0xFF;
$bb = $rrggbb & 0xFF;
$f = imagecolorallocate($imagen, $rr, $gg, $bb);
imagecolortransparent($imagen, $f);

if ($_tam != 30)    {
    $nueva = imagecreatetruecolor($_tam * $_n, $_tam);
    $transpa = imagecolorallocate($nueva, 255, 255, 255);
    imagefill($nueva, 0, 0, $transpa);
    imagecopyresized($nueva, $imagen, 0, 0, 0, 0, $_tam * $_n, $_tam, $largura, 30);
    $rrggbb = imagecolorat($nueva, 1, 1);
    $rr = ($rrggbb >> 16) & 0xFF;
    $gg = ($rrggbb >> 8) & 0xFF;
    $bb = $rrggbb & 0xFF;
    $color_fondo = imagecolorallocate($nueva, $rr, $gg, $bb);
    imagecolortransparent($nueva, $color_fondo);
    imagepng($nueva);
    imagedestroy($nueva);
}
else    {
    imagepng($imagen);
}
imagedestroy($imagen);
?>

function evalua(que)	{
	for (i = 1; i < 11; i ++)
		document.images["e__" + i].src = (i <= que) ?
			"../comentarios/estrellas.php?n=1&fondo=0000ff&max=20":
			"../comentarios/estrellas.php?n=1&fondo=eeeeee&max=20";
	document.forms.comentario.evaluacion.value = que;
}

<img
	src="estrellas.php?n=1&fondo=eeeeee&max=20"
	name="e__10"
	alt="evaluar"
	onclick="evalua(10)"
	style="margin: 0"
	title="Sobresaliente"
>
$validaCaptcha = ($_SESSION["captcha"] == $_POST["captcha"]);
<?
session_start();
$_captcha = ""; $_ns = "0123456789";
for ($i = 0; $i < 6; $i ++)	$_captcha .= $_ns{rand(0, 9)};
$_SESSION["captcha"] = $_captcha;
// aquí el resto de código y cabecera de la imagen
?><?
session_start();
$_captcha = ""; $_ns = "0123456789";
for ($i = 0; $i < 6; $i ++)	$_captcha .= $_ns{rand(0, 9)};
$_SESSION["captcha"] = $_captcha;
// aquí el resto de código y cabecera de la imagen
?>
<img src="captcha.php" onclick="this.src = 'captcha.php?azar=' + Math.random()" />

<?
function generaClave($id)	{
	$p0 = 'YwrDRSvdpqIa1tcufkEN5V7ZUsK8gxbPTXHFmGCLlji6Q9hAozy2JnBOe0WM';
	$p1 = 'mbPT6uJzWXrNVLwnIyBaA1xZYk7ihvtUFfgRKGjQOscS9q0DoCd2Mlep5H8';
	$p2 = 'lpgSzLVAHGQtTcE6KMfRYj5iw2o1m8qxDnuXOChyZr7dJsBNv9IPkab0FW';
	$p3 = 'wrKE6g5R9pteIy0OodJX8x7PfMnS2hsQumbHzWLGFNZUY1jckVCDATlqB';
	$p4 = 'B9hIPxLWo8rC0zAD1GfdQs6bingeMY7XupNltEKa5wkHjUFJZqSVyORm';
	$p5 = 'BJcRN6lvruOKMStVm5L09bUwz87xahgAq2QpDIZTHnEYFdGWjykeCfi';
	$p6 = 'fa7zlwy9vYjeQsLFMdn6HPR1pxUO2gimItKDqc5VNoCZ0XWkhSJT8b';
	$p7 = '5DwRV1ybhFzaGoYpPKUB98QTMufJiCgLAmxSvcHqZlOdtjIsWe2kE';
	$p8 = 'sjEJFOy9kW0I8Ga7qRQwNUpucPbSHtTVZXfC1MBzdD5vKehnYriA';
	$p9 = 'Hk2xIrzfdOhuY5W86ognFpU09BeqcaNVbm7jlDXvCM1KLSPAZyt';
	$p10 = 'QO762z5cBuhbkvaAqHSWMCLxj8ZeJP9VI1lUitGdoFnrDNsmg0';
	$p11 = 'l2D7IgmhiqZezEpvsMuO5jB8T0SdPQkJtRwHAfLWYXKVyN69n';

	$clave = '';
	$clave .= $p0[$id % strlen($p0)];
	$clave .= $p1[$id % strlen($p1)];
	$clave .= $p2[$id % strlen($p2)];
	$clave .= $p3[$id % strlen($p3)];
	$clave .= $p4[$id % strlen($p4)];
	$clave .= $p5[$id % strlen($p5)];
	$clave .= $p6[$id % strlen($p6)];
	$clave .= $p7[$id % strlen($p7)];
	$clave .= $p8[$id % strlen($p8)];
	$clave .= $p9[$id % strlen($p9)];
	$clave .= $p10[$id % strlen($p10)];
	$clave .= $p11[$id % strlen($p11)];
	return $clave;
}
?>

function generaClave($id)	{
<?
	$letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ12567890abcdefghijklmnopqrstuvwxyz";
	$tamClave = rand(10, 20);
	$arrayLetras = str_split($letras);
	for ($i = 0; $i < $tamClave; $i ++)	{
		shuffle($arrayLetras);
		$p = implode("", $arrayLetras);
		echo "\t$"."p$i = '".substr($p, $i)."';\n";
	}
	
	echo "\n\t$"."clave = '';\n";
	for ($i = 0; $i < $tamClave; $i ++)
		echo "\t$"."clave .= $"."p$i"."[$"."id % strlen($"."p$i)];\n";
?>
	return $clave;
}

select *, datediff(now(), fecha) as transcurridos from comentarios
	where datediff(now(), fecha)>1 and activo=0;
delete from comentarios where datediff(now(), fecha)>1 and activo=0;
