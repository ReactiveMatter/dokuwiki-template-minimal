<?php
/**
 * DokuWiki Minimal Template
 *
 * @link     http://dokuwiki.org/template:minimal
 * @author   Reactive Matter <reactivematter@protonmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

@require_once(dirname(__FILE__).'/template_plugin.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );
$showSidebar = page_findnearest($conf['sidebar']) && ($ACT=='show');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<?php 

?>
<body class="<?=tpl_minimal_classes()?>">
<div id="dokuwiki__top"></div>
<navbar id="navbar" class="container" role="navigation" aria-label="Main navigation">
        <?php 
        if(!$showSidebar){$s1 = "style=visibility:hidden";}
        else {$s1="";}
        ?>
        <div id='showhidesidemenu' class="mobile icon" <?=$s1?>>
            <div class="button"></div>
        </div>
        <div class="left-column">
        <a class="site-name" href="<?=DOKU_BASE?>">
        <div class="site-logo">
            <img src="<?=tpl_getMediaFile(array(':wiki:logo.png', ':wiki:logo.svg', ':wiki:logo.jpeg',':wiki:logo.jpg',  ':logo.png', ':logo.svg', ':logo.jpeg',':logo.jpg', 'images/logo.png', ':wiki:dokuwiki.svg'), false)?>">
        </div>
        <div class="site-title">
            <?=$conf['title']?>
        </div>
        </a>
        </div>
        <?php if($showTools || actionOK('search')):?>
        <div class="right-column">
        <?php if($showTools):?>
        <div class="options">
            <?php if(sizeof((new \dokuwiki\Menu\PageMenu())->getItems())>0):?>
            <div class="page-menu menu">
                <div class="button"><span><?=tpl_getLang('page')?></span></div>
                  <div class="list">
                <?=(new \dokuwiki\Menu\PageMenu())->getListItems()?>
                </div>
            </div>
            <?php endif?>
            <?php if(sizeof((new \dokuwiki\Menu\SiteMenu())->getItems())>0):?>
            <div class="site-menu menu">
                <div class="button"><span><?=tpl_getLang('site')?></span></div>
                  <div class="list">
                  <?=(new \dokuwiki\Menu\SiteMenu())->getListItems()?>    
                </div>
            </div>
            <?php endif?>
            <?php if(sizeof((new \dokuwiki\Menu\UserMenu())->getItems())>0):?>
            <div class="user-menu menu">
            <div class="button"><span><?=tpl_getLang('user')?></span></div>
            <div class="list">
                <?php if($USERINFO):?>
                <div class="user-name"><?=$USERINFO['name']?></div>
                <?php endif?>
                <?=(new \dokuwiki\Menu\UserMenu())->getListItems()?>
            </div>  
            </div>
            <?php endif?>
            <div class="mobile-menu menu">
            <?php 

            if(sizeof((new \dokuwiki\Menu\PageMenu())->getItems())>0)
                {
                    echo '<div class="list"><p>'.tpl_getLang('page').' '.tpl_getLang('tools').'</p>'.
                    (new \dokuwiki\Menu\PageMenu())->getListItems()
                    .'</div>';
                }
  
               if(sizeof((new \dokuwiki\Menu\SiteMenu())->getItems())>0)
               {
                    echo '<div class="list"><p>'.tpl_getLang('site').' '.tpl_getLang('tools').'</p>'.
                    (new \dokuwiki\Menu\SiteMenu())->getListItems()
                    .'</div>';
               }

               if(sizeof((new \dokuwiki\Menu\UserMenu())->getItems())>0)
               {
                   echo '<div class="list"><p>'.tpl_getLang('user').' '.tpl_getLang('tools').'</p>'.
                   (new \dokuwiki\Menu\UserMenu())->getListItems()
                   .'</div>';
               }

               if($USERINFO){
                 echo '<div class="user-name"><p>Username: '.$USERINFO['name'].'</p></div>';
               }
                
            ?>
            </div>
        </div>
        <?php endif?>
        <?php if(actionOK('search')):?>
        <div class="search">
            <?php tpl_searchform(true,false) ?>
        </div>
        <?php endif?>
        </div>
        <?php 
        if(!$showTools){$s2 = "style=visibility:hidden";}
        else {$s2="";}
        ?>
        <div id='showhideappoptions' class="mobile icon" <?=$s2?>>
            <div class="button"></div>
        </div>
     <?php endif?>
    </navbar>
    
    <?php if(($conf['youarehere'] || $conf['breadcrumbs'] || (page_exists("header") && auth_quickaclcheck("header")) ) && tpl_getConf('siteHeaderPosition')=='Top'):?>
    <div class="site-header">
    <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
    <!-- ********** Notice ********** -->
    <?php 
        if(page_exists("header") && auth_quickaclcheck("header"))
        {
            echo '<div class="site-header-content">';
            tpl_include_page('header');
            echo '</div>';
        }
    ?>

    <?php if($conf['youarehere'] || $conf['breadcrumbs']):?>
    
    <div class="site-navigation">
        <!-- BREADCRUMBS -->
        <?php if($conf['youarehere']){ ?>
            <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
        <?php } ?>
        <?php if($conf['breadcrumbs']){ ?>
            <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
        <?php } ?>
    </div>
    <?php endif?>
    </div>
    <?php endif?>

<div id="main">
        
        <?php if ($showSidebar): ?>
            <div id="sidebar" class="left-column" aria-label="<?php echo $lang['sidebar'] ?>">
                <div class="sidebar-content">
                <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
            </div>
            </div>
        <?php endif; ?>


        <div id="view" class="right-column">

                <?php if(($conf['youarehere'] || $conf['breadcrumbs'] || (page_exists("header") && auth_quickaclcheck("header"))) && tpl_getConf('siteHeaderPosition')=='Above page'):?>
                <div class="site-header">
                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
                <!-- ********** Notice ********** -->
                <?php 
                    if(page_exists("header") && auth_quickaclcheck("header"))
                    {
                        echo '<div class="site-header-content">';
                        tpl_include_page('header');
                        echo '</div>';
                    }
                ?>

                <?php if($conf['youarehere'] || $conf['breadcrumbs']):?>
                
                <div class="site-navigation">
                    <!-- BREADCRUMBS -->
                    <?php if($conf['youarehere']){ ?>
                        <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
                    <?php } ?>
                    <?php if($conf['breadcrumbs']){ ?>
                        <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
                    <?php } ?>
                </div>
                <?php endif?>
                </div>
                <?php endif?>

        <article id="content">
            <?php tpl_flush(); ?> 
            <?php tpl_content();?>
            <?php tpl_flush(); ?>
        </article>


        <?php if(tpl_getConf('showPageInfo') ):?>
         <div class="page-info">
                <?php tpl_pageinfo() /* 'Last modified' etc */ ?>
                    
        </div>
        <?php endif; ?>

                 
        <?php 
        if((page_exists("footer") && auth_quickaclcheck("footer")) && tpl_getConf('siteFooterPosition')=='Below page')
        {
            echo '<footer id="footer">';
            tpl_include_page('footer');
            echo '</footer>';
        }
        ?>
        <!-- /footer -->
        <div style="display: none;"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    </div>
    </div>
        <?php 
    if((page_exists("footer") && auth_quickaclcheck("footer")) && tpl_getConf('siteFooterPosition')=='Bottom')
    {
        echo '<footer id="footer">';
        tpl_include_page('footer');
        echo '</footer>';
    }
    ?>
</body>
</html>
