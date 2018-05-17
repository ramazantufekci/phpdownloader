<?php
$fp = fopen("linkler.txt","r");
$i = 1;
while(!feof($fp))
{
	$url = fgets($fp);
	/**
	* -o parametresini kullanarak indirilen dosyayı 
	*istediğiniz isimde kayıt edebilirsiniz.
	*/
	exec("wget --no-check-certificate ".$url,$err,$errno);
	if($errno)
	{
		/**
		*
		*basename ile url nin sonundaki dosya uzantısını alabiliyoruz.
		*fakat instagram gibi yerlerde sonu dosya uzantısı olarak bitmediği için 
		*out vermeniz gerekiyor.
		*/
		exec("curl -o ".$i.".jpg ".$url);
	}
	$i++;
}
fclose($fp);
