<?php
global $config_sys;
?>

<script type="text/javascript" src="<?php echo $config_sys['site_url']._DS; ?>extensions<?php echo _DS; ?>syntaxhighlighter<?php echo _DS; ?>scripts<?php echo _DS; ?>shCore.js"></script>
<script type="text/javascript" src="<?php echo $config_sys['site_url']._DS; ?>extensions<?php echo _DS; ?>syntaxhighlighter<?php echo _DS; ?>scripts<?php echo _DS; ?>shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $config_sys['site_url']._DS; ?>extensions<?php echo _DS; ?>syntaxhighlighter<?php echo _DS; ?>styles<?php echo _DS; ?>shCoreDefault.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $config_sys['site_url']._DS; ?>extensions<?php echo _DS; ?>syntaxhighlighter<?php echo _DS; ?>styles<?php echo _DS; ?>shThemeEclipse.css"/>

<script type="text/javascript">
	SyntaxHighlighter.config.toolbar = false;
	SyntaxHighlighter.all();
</script>