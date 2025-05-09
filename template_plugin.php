<?php
/**
 * Minimal Template Helper Plugin (for common tasks)
 *
 * @link     http://dokuwiki.org/template:minimal
 * @author   Reactive Matter <reactivematter@protonmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

function tpl_minimal_classes()
{	
	global $conf, $ACT;
	$theme = '';
	if(tpl_getConf('theme')!='Default')
	{
	    $theme = ' theme-'.strtolower(tpl_getConf('theme'));
	}

	$toc = tpl_getConf('stickyToc')?' stoc':'';
	$width = tpl_getConf('fullWidthSite')?' full-width':'';
	$sidebar = (page_findnearest($conf['sidebar']) && ($ACT=='show')) ? ' sidebar' : '';
	return tpl_classes().$toc.$width.$sidebar.$theme;
}


