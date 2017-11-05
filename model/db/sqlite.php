<?
if(!extension_loaded('sqlite')) {
	dl('sqlite.so');
}
$module = 'sqlite';
$functions = get_extension_funcs($module);
echo "Functions available in the sqlite extension:<br>\n";
foreach($functions as $func) {
    echo $func."<br>\n";
}
?>
