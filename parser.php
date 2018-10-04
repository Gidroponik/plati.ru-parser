$url = 'ссылка после оплаты вида : https://www.digiseller.market/info/buy.asp?id_i=...';

echo '<pre>';
$page = file_get_contents($url);
preg_match_all( '#<a class=link_goods href="(.+?)"#is', $page, $link_keys );
for($i=0;$i<count($link_keys[1]);$i++)
{
	$page_link = file_get_contents('https://www.oplata.info/info/'.$link_keys[1][$i]);
	preg_match_all( '#<span class="paid_items_text">(.+?)</span>#is', $page_link, $key);
	$out = str_replace("&acute;", "'", $key[1][0]);
	echo $out.'<br>';
}
