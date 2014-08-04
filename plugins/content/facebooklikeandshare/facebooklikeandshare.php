<?php
/**
 * @version  4.7
 * @Project  Facebook Like And Share Button
 * @author   Compago TLC
 * @package  j2.5-j3.0
 * @copyright Copyright (C) 2013 Compago TLC. All rights reserved.
 * @license  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/
//error_reporting(E_ALL);
// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );
if(!defined('DS')) {
  define( 'DS', DIRECTORY_SEPARATOR );
}
$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html'){
  return;
}
require_once( JPATH_SITE . DS . 'components' . DS . 'com_content' . DS . 'helpers' . DS . 'route.php' );

if(!function_exists('json_decode')) {
  function json_decode($json) {
    $comment = false;
    $x='';
    $out = '$x=';
    for ($i=0; $i<strlen($json); $i++) {
      if (!$comment) {
        if (($json[$i] == '{') || ($json[$i] == '['))
          $out .= ' array(';
        else if (($json[$i] == '}') || ($json[$i] == ']'))
          $out .= ')';
        else if ($json[$i] == ':')
          $out .= '=>';
        else
          $out .= $json[$i];
      } else
        $out .= $json[$i];
      if ($json[$i] == '"' && $json[($i-1)]!="\\")
        $comment = !$comment;
    }
    eval($out . ';');
    return $x;
  }
}
if(!function_exists('json_encode')){
  function json_encode($a=false) {
    // Some basic debugging to ensure we have something returned
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a)) {
      if (is_float($a)) {
        // Always use '.' for floats.
        return floatval(str_replace(',', '.', strval($a)));
      }
      if (is_string($a)) {
        static $jsonReplaces = array(array('\\', '/', "\n", "\t", "\r", '\b', "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); true; $i++) {
      if (key($a) !== $i) {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList) {
      foreach ($a as $v) $result[] = json_encode($v);
      return '[' . join(',', $result) . ']';
    } else {
      foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
      return '{' . join(',', $result) . '}';
    }
  }
}

jimport('joomla.plugin.plugin');
jimport('joomla.environment.browser');

class plgContentfacebooklikeandshare extends JPlugin {
  var $_fb = 0;
  function plgContentfacebooklikeandshare( &$subject,$params ) {
    parent::__construct( $subject,$params );
  }

  function onContentPrepare($context, &$article, &$params, $page=0){
    if ($context == 'com_media.file') return;
    $ignore_pagination = $this->params->get( 'ignore_pagination');
    $view = JRequest::getCmd('view');
    if ((($view == 'article')||($view == 'productdetails'))&&($ignore_pagination==1)) {
      $this->InjectCode($article, $params ,0,$view);
    }
  }
  function onContentBeforeDisplay($context,&$article,&$params,$page=0){
    if ($context == 'com_media.file') return;
    $ignore_pagination = $this->params->get( 'ignore_pagination');
    $view = JRequest::getCmd('view');
    if (($view != 'article')||((($view == 'article')||($view == 'productdetails'))&&($ignore_pagination==0))) {
      $this->InjectCode($article, $params ,1,$view);
    }
  }
  function onBeforeCompileHead(){
    $view = JRequest::getCmd('view');
    $this->InjectHeadCode($view);
  }


  public function onContentAfterSave($context, $article, $isNew) {
    if ($_REQUEST[jform][state]!='1') return;
    if ($_REQUEST[jform][access]!='1') return;
    if ($context == 'com_media.file') return;
    //enabled "com_content.article" (backend) and "com_content.form" (frontend)
    $enable_fb_autopublish      = $this->params->get( 'enable_fb_autopublish');
    //Enable autopublish only on the articles or categories where are rendered the share buttons

    $category_tobe_excluded     = $this->params->get('category_tobe_excluded_buttons', '' );
    $content_tobe_excluded      = $this->params->get('content_tobe_excluded_buttons', '' );
    $excludedContentList        = @explode ( ",", $content_tobe_excluded );
    if ($article->id!=null) {
      if ( in_array ( $article->id, $excludedContentList )) {
        return;
      }
      if (is_array($category_tobe_excluded ) && in_array ( $article->catid, $category_tobe_excluded )) {
        return;
      }
    } else {
      if (is_array($category_tobe_excluded ) && in_array ( JRequest::getCmd('id'), $category_tobe_excluded )) return;
    }
    //Enable autopublish only on "apply" action
    if ($_REQUEST['task']!='apply') {
      return true;
    }
    if ($enable_fb_autopublish &&(!extension_loaded('curl'))) {
      JFactory::getApplication()->enqueueMessage( JText::_('Facebook Autopublish is not possible because CURL extension is not loaded.'), 'error' );
      return true;
    }
    //Facebook autopublish
    if (($context == "com_content.article")&&($enable_fb_autopublish)) {
      if (!class_exists('Facebook', false)) {
        require_once('facebook'.DS.'facebook.php');
      }
      $app_id            = $this->params->get('app_id');
      $fb_secret_key     = $this->params->get('fb_secret_key');
      $fb_extra_params   = $this->params->get('fb_extra_params');
      $fb_ids            = $fb_extra_params->fb_ids;
      $token             = $fb_extra_params->fb_token;

      //if the configuration is complete proceeed with the post on FB walls
      if (($app_id!='')&&($fb_secret_key!='')&&(count($fb_ids)>0)&&($token!='')) {
        $title       = $this->getTitle($article);
        $caption     = '';
        $url         = JUri::root().ContentHelperRoute::getArticleRoute($article->id.':'.$article->alias, $article->catid);
        $router      = JSite::getInstance('site')->getRouter('site');
        $url         = $router->build($url);
        $url         = str_replace('administrator/', '', $url);
        $description = $this->getDescription($article,'article');
        if ($this->params->get('fb_autopublish_image','1')=='1') {
          $images      = $this->getPicture($article,'article');
          if (count($images)>0) { 
            $pic = $images[0];
          } else { 
            $pic = '';
          }
        } else {
          $pic = '';
        }
        if ($isNew) {
          $msg         = $this->params->get('fb_text_new','');
        }  else {
          $msg         = $this->params->get('fb_text_old','Update');
        }
        $facebook = new Facebook(array(
           'appId'  => $app_id,
           'secret' => $fb_secret_key,
           'cookie' => true
        ));
        $ok = true;
        try {
          $info_accounts=$facebook->api('/me/accounts',array('access_token' => $token ));
          $info_groups=$facebook->api('/me/groups',array('access_token' => $token ));
        } catch(FacebookApiException $e) {
          JError::raiseWarning('1', 'Facebook error: ' . $e->getMessage());
          $ok = false;
        }
        if ($ok) {
          $accounts=$info_accounts['data'];
          foreach ($accounts as $account) {
            if (in_array($account['id'],$fb_ids)) {
              $ok = true;
              try {
                $token = $account['access_token'];
                $facebook->api('/'.$account['id'].'/feed','post',
                                         array('access_token' => $token,
                                               'message'      => $msg,
                                               'link'         => $url,
                                               'picture'      => $pic,
                                               'name'         => $title,
                                               'caption'      => $caption,
                                               'description'  => $description,
                                              )
                                        );
              } catch(FacebookApiException $e) {
                JError::raiseWarning('1', 'Facebook error: ' . $e->getMessage());
                $ok = false;
              }
              if ($ok) {
                $info=$facebook->api('/'.$account['id'].'/',array('access_token' => $token ));
                JFactory::getApplication()->enqueueMessage( JText::_('Content published on Facebook: ')."<a href='".$info['link']."'>".$info['name']."</a>", 'message' );
              }
            }
          }
        }
      } else {
        if ($app_id==''){JFactory::getApplication()->enqueueMessage( JText::_('App ID is missing'), 'error' ); }
        if ($fb_secret_key==''){JFactory::getApplication()->enqueueMessage( JText::_('App secret key is missing'), 'error' ); }
        if (count($fb_ids)==0){JFactory::getApplication()->enqueueMessage( JText::_('Must be specified on at least one Facebook account ID where to publish the article'), 'error' ); }
        if ($token==''){JFactory::getApplication()->enqueueMessage( JText::_('Valid access token missing'), 'error' ); }
      }
    }
    return true;
  }

  private function getTinyurl($url) {
    $data = (trim($this->get_url_contents('http://tinyurl.com/api-create.php?url=' . $url)));
    if (!$data)
      return $url;
    return $data;
  }

  private function getProtocol() {
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
      || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
    ) {
      $protocol = 'https://';
    }
    else {
      $protocol = 'http://';
    }
    return $protocol;
  }

  private function getCurrentUrl($mode=0) {
    $protocol = $this->getProtocol();
    $currentUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $parts = parse_url($currentUrl);
    $query = '';
    if (!empty($parts['query'])) {
      // drop known fb params
      $params = explode('&', $parts['query']);
      $retained_params = array();
      foreach ($params as $param) {
          $retained_params[] = $param;
      }
      unset($retained_params['state']);
      unset($retained_params['code']);
      if($mode==1){
        if ($_REQUEST['task']=='apply') {
          $retained_params[] = 'view=article';
        } elseif ($_REQUEST['task']=='save2new') {
          unset($retained_params['id']);
        }
      } else {
        $retained_params[] = 'view=article';
      }
      if (!empty($retained_params)) {
        $query = '?'.implode($retained_params, '&');
      }
    }

    // use port if non default
    $port =
      isset($parts['port']) &&
      (($protocol === 'http://' && $parts['port'] !== 80) ||
       ($protocol === 'https://' && $parts['port'] !== 443))
      ? ':' . $parts['port'] : '';

    // rebuild
    return $protocol . $parts['host'] . $port . $parts['path'] . $query;
  }

  private function SetParams($key,$value) {
    $db=& JFactory::getDBO();
    $db->setQuery("SELECT `params` FROM `#__extensions` WHERE `name`= 'Content - Facebook Like And Share';");
    $contents = $db->loadObject();
    $params = json_decode($contents->params);
    $params->{$key}=$value;
    $params = json_encode($params);
    $db->setQuery("UPDATE `#__extensions` SET ".$db->nameQuote('params')."= '".$db->getEscaped($params)."' WHERE `name`= 'Content - Facebook Like And Share';");
    $result = $db->query();
    $db->freeResult($result);
  }

  private function InjectHeadCode($view){
    $document                 = & JFactory::getDocument();
    $enable_like              = $this->params->get( 'enable_like');
    $enable_share             = $this->params->get( 'enable_share');
    $enable_comments          = $this->params->get( 'enable_comments');

    if (($enable_share==1)||($enable_like==1)||($enable_comments==1)) {
      $config                   =& JFactory::getConfig();
      if (method_exists($config,'getValue')) {
        $site_name                = $config->getValue('config.sitename');
      } else {
        $site_name                = $config->get('config.sitename');
      }
      $description              = $this->params->get('description');
      $enable_admin             = $this->params->get('enable_admin','0');
      $enable_app               = $this->params->get('enable_app','0');
      $admin_id                 = $this->params->get('admin_id');
      $app_id                   = $this->params->get('app_id');
      if ($this->params->get('auto_language')) {
        $language_fb            = str_replace('-', '_', JFactory::getLanguage()->getTag());
      } else {
        $language_fb            = $this->params->get('language_fb');
      }
      $meta                     = "";
      $head_data = array();
      foreach( $document->getHeadData() as $tmpkey=>$tmpval ){
        if(!is_array($tmpval)){
          $head_data[] = $tmpval;
        } else {
          foreach( $tmpval as $tmpval2 ){
            if(!is_array($tmpval2)){
              $head_data[] = $tmpval2;
            }
          }
        }
      }
      $head = implode(',',$head_data);
      if (($description==0)&&(preg_match('/<meta property="og:description"/i',$head)==0)&&($view!='productdetails')){
        $description = $document->getMetaData("description");
        $meta .= "<meta property=\"og:description\" content=\"$description\"/>".PHP_EOL;
      }
      if ($enable_admin==0) { $admin_id=""; }
      else {
        if (preg_match('/<meta property="fb:admins"/i',$head)==0){
          $meta .= "<meta property=\"fb:admins\" content=\"$admin_id\"/>".PHP_EOL;
        }
      }
      if ($enable_app==0) { $app_id=""; }
      else {
        if (preg_match('/<meta property="fb:app_id"/i',$head)==0){
          $meta .= "<meta property=\"fb:app_id\" content=\"$app_id\"/>".PHP_EOL;
        }
      }
      if (preg_match('/<meta property="og:locale"/i',$head)==0){
        $meta .= "<meta property=\"og:locale\" content=\"".$language_fb."\"/>".PHP_EOL;
      }
      if (preg_match('/<meta property="og:site_name"/i',$head)==0){
        $meta .= "<meta property=\"og:site_name\" content=\"$site_name\"/>".PHP_EOL;
      }
      //$document->addCustomTag( "<!-- ".PHP_EOL.$meta.PHP_EOL." //-->" );
      $document->addCustomTag( PHP_EOL.$meta.PHP_EOL);
    }
  }

  private function InjectCode(&$article, &$params, $mode,$view){
    $format=JRequest::getCMD('format');
    if (($format=='pdf')||($format=='feed')) return;
    $document                 = & JFactory::getDocument();
    $position                 = $this->params->get( 'position',  '' );
    $enable_like              = $this->params->get( 'enable_like');
    $enable_share             = $this->params->get( 'enable_share');
    $enable_comments          = $this->params->get( 'enable_comments');
    $app_id                   = $this->params->get( 'app_id');
    $enable_fb_photo          = $this->params->get( 'enable_fb_photo');
    if ($app_id == '') {$enable_fb_photo = '0';}
    $view_article_buttons     = $this->params->get( 'view_article_buttons');
    $view_frontpage_buttons   = $this->params->get( 'view_frontpage_buttons');
    $view_category_buttons    = $this->params->get( 'view_category_buttons');
    $view_article_comments    = $this->params->get( 'view_article_comments');
    $view_frontpage_comments  = $this->params->get( 'view_frontpage_comments');
    $view_category_comments   = $this->params->get( 'view_category_comments');
    $asynchronous_fb          = $this->params->get( 'asynchronous_fb',0);
    $enable_view_comments     = 0;
    $enable_view_buttons      = 0;
    $enable_app               = $this->params->get('enable_app');
    $type                     = $this->params->get('type');
    $directyoutube            = $this->params->get('directyoutube',0);
    $meta                     = "";

    $title    = $this->getTitle($article);
    $url      = $this->getPageUrl($article);
    $basetitle= $document->getTitle();

    if ($view=='category'){
      $baseurl  = $this->getCatUrl($article);
    } else {
      $baseurl  = $document->getBase();
    }
    if (($enable_share==1)||($enable_like==1)||($enable_fb_photo==1)||($enable_comments==1)) {
      $head_data = array();
      foreach( $document->getHeadData() as $tmpkey=>$tmpval ){
        if(!is_array($tmpval)){
          $head_data[] = $tmpval;
        } else {
          foreach( $tmpval as $tmpval2 ){
            if(!is_array($tmpval2)){
              $head_data[] = $tmpval2;
            }
          }
        }
      }
      $head = implode(',',$head_data);
      
      if ((preg_match('/<meta property="og:video"/i',$head)==0)){
        if (isset($article->text)) {
          $text=$article->text;
        } else {
          $text=$article->introtext;
        }
        if ($view == 'article'){
          if (preg_match('%<object.*(?:data|value)=[\\\\"\'](.*?\.(?:flv|swf))["\'].*?</object>%si', $text,$regsu)) {
            if ((preg_match('%<object.*width=["\'](.*?)["\'].*</object>%si', $text,$regsw))&&
                (preg_match('%<object.*height=["\'](.*?)["\'].*</object>%si', $text,$regsh))) {
              if (preg_match('/^http/i',$regsu[1])) {
                $video = $regsu[1];

              } else {
                $video = JURI::root().preg_replace('#^/#','',$regsu[1]);
              }
              $type = "video";
            }
          } elseif (preg_match('%<iframe.*src=["\'](.*?(?:www\.(?:youtube|youtube-nocookie)\.com|vimeo.com)/(?:embed|v)/(?!videoseries).*?)["\'].*?</iframe>%si', $text,$regsu)) {
            if ((preg_match('%<iframe.*width=["\'](.*?)["\'].*</iframe>%si', $text,$regsw))&&
                (preg_match('%<iframe.*height=["\'](.*?)["\'].*</iframe>%si', $text,$regsh))) {
              if ($directyoutube==0) {
                $video = $regsu[1];
              } else {
                $video = preg_replace('%embed/(?!videoseries)%i','v/',$regsu[1]);
              }
              $type = "video";
            }
          }
          if ($type == "video") {
            $meta .= "<meta property=\"og:video\" content=\"$video\"/>".PHP_EOL;
            $meta .= "<meta property=\"og:video:type\" content=\"application/x-shockwave-flash\"/>".PHP_EOL;
            $meta .= "<meta property=\"og:video:width\" content=\"$regsw[1]\">".PHP_EOL;
            $meta .= "<meta property=\"og:video:height\" content=\"$regsh[1]\">".PHP_EOL;
          }
        }         
      }
      if ((preg_match('/<meta property="og:type"/i',$head)==0)&&($enable_app==1)&&($app_id!="")) {
        if (($view == 'article')||($view == 'productdetails')) {
          $meta .= "<meta property=\"og:type\" content=\"$type\"/>".PHP_EOL;
        } else {
          $meta .= "<meta property=\"og:type\" content=\"website\"/>".PHP_EOL;
        }
      }
      $description  = $this->params->get('description');
      if (preg_match('/<meta property="og:description"/i',$head)==0){
        if ($view == 'productdetails') {
          if (isset($article->product_s_desc)) {
            $og_description=htmlentities(strip_tags($article->product_s_desc),ENT_QUOTES, "UTF-8");
          } else {
            $og_description=htmlentities(strip_tags($article->product_desc),ENT_QUOTES, "UTF-8");
          }
        } elseif ($view == 'article') {
          if ($description==3) {
            $og_description=htmlentities(strip_tags($article->introtext),ENT_QUOTES, "UTF-8");	
          } elseif ($description==2) { //first 255 chars
            $og_description = htmlentities(mb_substr(strip_tags($article->text), 0, 251)."... ",ENT_QUOTES, "UTF-8");
          } elseif ($description==1) { //first paragraph
            $content = htmlentities(strip_tags($article->text),ENT_QUOTES, "UTF-8");
            $pos = strpos($content, '.');
            if ($pos === false) {
              $og_description = $content;
            } else {
              $og_description = substr($content, 0, $pos+1);
            }
          } elseif ($description==0) { //meta description
            $og_description = htmlentities(strip_tags($article->metadesc),ENT_QUOTES, "UTF-8");
          }
        } else {
          $og_description = htmlentities(strip_tags($document->getMetaData("description")),ENT_QUOTES, "UTF-8");  
        }
        $meta .= "<meta property=\"og:description\" content=\"".$og_description."\"/>".PHP_EOL;
      }
      if (preg_match('/<meta property="og:image"/i',$head)==0){
        $images = $this->getPicture($article,$view);
        if (count($images) != 0) {
          foreach ($images as $value) {
            $meta .= "<meta property=\"og:image\" content=\"$value\"/>".PHP_EOL;
          }
        }
      }
      if (preg_match('/<meta property="og:url"/i',$head)==0) {
        if (($view == 'article')||($view == 'productdetails')) {
          $meta .= "<meta property=\"og:url\" content=\"$url\"/>".PHP_EOL;
        } else {
          $meta .= "<meta property=\"og:url\" content=\"$baseurl\"/>".PHP_EOL;
        }
      }
      if (preg_match('/<meta property="og:title"/i',$head)==0) {
        if (($view == 'article')||($view == 'productdetails')) {
          $meta .= "<meta property=\"og:title\" content=\"$title\"/>".PHP_EOL;
        } else {
          $meta .= "<meta property=\"og:title\" content=\"$basetitle\"/>".PHP_EOL;
        }
      }
      if (preg_match('/<meta name="my:fb"/i',$head)==0){
        $meta .= "<meta name=\"my:fb\" content=\"on\"/>".PHP_EOL;
        $this->_fb = 1;
      } else {
        $this->_fb = 2;
      }
      if ($meta!="") {
        $document->addCustomTag( PHP_EOL.$meta.PHP_EOL);
      }
    }

    if ((($view == 'article')||($view == 'productdetails'))&&($view_article_buttons)||
        ($view == 'featured')&&($view_frontpage_buttons)||
        ($view == 'category')&&($view_category_buttons)) {
      $enable_view_buttons = 1;
    }
    if ((($view == 'article')||($view == 'productdetails'))&&($view_article_comments)||
        ($view == 'featured')&&($view_frontpage_comments)||
        ($view == 'category')&&($view_category_comments)) {
      $enable_view_comments = 1;
    }

    $category_tobe_excluded_buttons     = $this->params->get('category_tobe_excluded_buttons', '' );
    $content_tobe_excluded_buttons      = $this->params->get('content_tobe_excluded_buttons', '' );
    $excludedContentList_buttons        = @explode ( ",", $content_tobe_excluded_buttons );
    if ($article->id!=null) {
      if ( in_array ( $article->id, $excludedContentList_buttons )) $enable_view_buttons = 0;
      if (is_array($category_tobe_excluded_buttons ) && in_array ( $article->catid, $category_tobe_excluded_buttons )) $enable_view_buttons = 0;
    } else {
      if (is_array($category_tobe_excluded_buttons ) && in_array ( JRequest::getCmd('id'), $category_tobe_excluded_buttons )) $enable_view_buttons = 0;
    }

    $category_tobe_excluded_comments     = $this->params->get('category_tobe_excluded_comments', '' );
    $content_tobe_excluded_comments      = $this->params->get('content_tobe_excluded_comments', '' );
    $excludedContentList_comments        = @explode ( ",", $content_tobe_excluded_comments );
    if ($article->id!=null) {
      if ( in_array ( $article->id, $excludedContentList_comments )) $enable_view_comments = 0;
      if (is_array($category_tobe_excluded_comments ) && in_array ( $article->catid, $category_tobe_excluded_comments )) $enable_view_comments = 0;
    } else {
      if (is_array($category_tobe_excluded_comments ) && in_array ( JRequest::getCmd('id'), $category_tobe_excluded_comments )) $enable_view_comments = 0;
    }

    if (JRequest::getCMD('print')==1) {
      $enable_view_buttons = 0;
      if ($this->params->get('enable_comments_print','0')==0) $enable_view_comments = 0;
    }
    if (($enable_view_buttons != 1)&&($enable_view_comments != 1)){
      return;
    }

    if ((($enable_like==1)||($enable_share==1)||($enable_comments==1)||($enable_fb_photo==1))&&(($enable_view_buttons == 1)||($enable_view_comments == 1))) {
      if ($this->_fb==1) {
        if ($this->params->get('auto_language')) {
          $language_fb            = str_replace('-', '_', JFactory::getLanguage()->getTag());
        } else {
          $language_fb            = $this->params->get('language_fb');
        }
        if ($asynchronous_fb) {
          $FbCode = "
            function AddFbScript(){
              var js,fjs=document.getElementsByTagName('script')[0];
              if (!document.getElementById('facebook-jssdk')) {
                js = document.createElement('script');
                js.id = 'facebook-jssdk';
                js.setAttribute('async', 'true');
           ";
          if ($app_id!='') {
            $FbCode .= "
                js.src = '//connect.facebook.net/".$language_fb."/all.js#xfbml=1&appId=".$app_id."';";
          } else {
            $FbCode .= "
                js.src = '//connect.facebook.net/".$language_fb."/all.js#xfbml=1';";
          }
          $FbCode .= "
                fjs.parentNode.insertBefore(js, fjs);
              }
            }
            window.addEvent('load', function() { AddFbScript() });
          ";
          $document->addScriptDeclaration($FbCode);
        } else {
          if ($app_id!='') {
            $document->addScript("//connect.facebook.net/".$language_fb."/all.js#xfbml=1&appId=".$app_id);
          } else {
            $document->addScript("//connect.facebook.net/".$language_fb."/all.js#xfbml=1");
          }
        }
        if ($enable_fb_photo==1) {
          $FbPhotoCode = "
            function fb_click_photo(imgURL,msg){
              FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                  var uid = response.authResponse.userID;
                  var accessToken = response.authResponse.accessToken;
                  fb_upload_photo(uid,imgURL,msg);
                } else {
                  FB.login(function(response) {
                    if (response.authResponse) {
                      var uid = response.authResponse.userID;
                      fb_upload_photo(uid,imgURL,msg);
                    } 
                  }, {scope: 'user_photos,publish_stream'});
                }
              });
            }

            function fb_upload_photo(id,imgURL,msg){
              FB.api('/'+id+'/photos', 'post', {
                  message:msg,
                  url:imgURL, 
//                  privacy: {value: \"CUSTOM\", friends: \"SELF\"}
                }, function(response){
                  if (!response || response.error) {
                    alert('Error occured uploading the photo to your profile: '+response.error);
                  } else {
                    alert('The photo has been successfully uploaded.' );
                }
              });  
            }  
          ";
          $document->addScriptDeclaration($FbPhotoCode);
          $FbPhotoCss = "
           .cmp_fbp_button {
             display: inline;
             position: absolute;
             -moz-opacity:.50; 
             filter:alpha(opacity=50); 
             opacity:.50; 
             z-index: 20;
           } 
           .cmp_fbp_button:hover { 
             -moz-opacity:1; 
             filter:alpha(opacity=100); 
             opacity:1;
           } 
          "; 
          $document->addStyleDeclaration($FbPhotoCss, 'text/css');
        }
      }
    }
    if (($view=='article')||($view=='productdetails')){
      $tmp=$article->text;     
    } else {
      $tmp=$article->introtext;
    }

    if ((($enable_like==1)||($enable_share==1))&&($enable_view_buttons==1)) {
      $htmlcode=$this->getPlugInButtonsHTML($params, $article, $url, $title);
      if ($position == '1'){
        $tmp = $htmlcode . $tmp;
      }
      if ($position == '2'){
        $tmp = $tmp . $htmlcode;
      }
      if ($position == '3'){
        $tmp = $htmlcode . $tmp . $htmlcode;
      }
    }

    if (($enable_comments==1)&&($enable_view_comments==1)) {
      $tmp = $tmp . $this->getPlugInCommentsHTML($params, $article, $url, $title);
    }

    if (($view=='article')||($view=='productdetails')){
      $article->text=$tmp;     
    } else {
      $article->introtext=$tmp;
    }
  }

  private function getPlugInCommentsHTML($params, $article, $url, $title) {
    $idrnd                       = 'fbcom'.rand();
    $document                    = & JFactory::getDocument();
    $category_tobe_excluded      = $this->params->get('category_tobe_excluded_comments');
    $content_tobe_excluded       = $this->params->get('content_tobe_excluded_comments', '' );
    $excludedContentList         = @explode ( ",", $content_tobe_excluded );
    if ($article->id!=null) {
      if ( in_array ( $article->id, $excludedContentList )) {
        return;
      }
      if (is_array($category_tobe_excluded ) && in_array ( $article->catid, $category_tobe_excluded )) {
        return;
      }
    } else {
      if (is_array($category_tobe_excluded ) && in_array ( JRequest::getCmd('id'), $category_tobe_excluded )) return;
    }
    $htmlCode                    = "";
    $number_comments             = $this->params->get('number_comments');
    $width                       = $this->params->get('width_comments');
    $box_color                   = $this->params->get('box_color');
    $container_comments          = $this->params->get('container_comments','1');
    $css_comments                = $this->params->get('css_comments','border-top-style:solid;border-top-width:1px;padding:10px;text-align:center;');
    if ($css_comments!="") { $css_comments="style=\"$css_comments\""; }
    $enable_comments_count       = $this->params->get('enable_comments_count');
    $container_comments_count    = $this->params->get('container_comments_count','1');
    $css_comments_count          = $this->params->get('css_comments_count');
    $asynchronous_fb             = $this->params->get( 'asynchronous_fb',0);
    $autofit                     = $this->params->get('autofit_comments',0);
    $htmlCode                    = "";

    if ($css_comments_count!="") { $css_comments_count="style=\"$css_comments_count\""; }
    if ($container_comments==1){
      $htmlCode .="<div id=\"".$idrnd."\" class=\"cmp_comments_container\" $css_comments>";
    } elseif ($container_comments==2) {
      $htmlCode .="<p id=\"".$idrnd."\" class=\"cmp_comments_container\" $css_comments>";
    }
    if ($enable_comments_count==1){
      if ($container_comments_count==1){
        $htmlCode .="<div $css_comments_count>";
      } elseif ($container_comments_count==2) {
        $htmlCode .="<p $css_comments_count>";
      }
      $htmlCode .= "<fb:comments-count href=\"$url\"></fb:comments-count> comments";
      if ($container_comments==1){
        $htmlCode .="</div>";
      } elseif ($container_comments==2) {
        $htmlCode .="</p>";
      }
    }
    if ($asynchronous_fb) {
      $tmp = "<script type=\"text/javascript\">".PHP_EOL."//<![CDATA[".PHP_EOL;
      if ($autofit){
        $tmp.= "function getwfbcom() {".PHP_EOL;
        $tmp.= "var efbcom = document.getElementById('".$idrnd."');".PHP_EOL;
        $tmp.= "if (efbcom.currentStyle){".PHP_EOL;
        $tmp.= " var pl=efbcom.currentStyle['paddingLeft'].replace(/px/,'');".PHP_EOL;
        $tmp.= " var pr=efbcom.currentStyle['paddingRight'].replace(/px/,'');".PHP_EOL;
        $tmp.= " return efbcom.offsetWidth-pl-pr;".PHP_EOL;
        $tmp.= "} else {".PHP_EOL;
        $tmp.= " var pl=window.getComputedStyle(efbcom,null).getPropertyValue('padding-left' ).replace(/px/,'');".PHP_EOL;
        $tmp.= " var pr=window.getComputedStyle(efbcom,null).getPropertyValue('padding-right').replace(/px/,'');".PHP_EOL;
        $tmp.= " return efbcom.offsetWidth-pl-pr;";
        $tmp.= "}}".PHP_EOL;
        $tmp.= "var tagfbcom = '<fb:comments href=\"$url\" num_posts=\"$number_comments\" width=\"'+getwfbcom()+'\" colorscheme=\"$box_color\"></fb:comments>';";
      } else {
        $tmp.= "var tagfbcom = '<fb:comments href=\"$url\" num_posts=\"$number_comments\" width=\"$width\" colorscheme=\"$box_color\"></fb:comments>';";
      }
      $tmp.= "document.write(tagfbcom); ".PHP_EOL."//]]> ".PHP_EOL."</script>";
    } else {
      $tmp = "<fb:comments href=\"$url\" num_posts=\"$number_comments\" width=\"$width\" colorscheme=\"$box_color\"></fb:comments>";
      if ($autofit){
        $tmps= "function autofitfbcom() {";
        $tmps.= "var efbcom = document.getElementById('".$idrnd."');";
        $tmps.= "if (efbcom.currentStyle){";
        $tmps.= "var pl=efbcom.currentStyle['paddingLeft'].replace(/px/,'');";
        $tmps.= "var pr=efbcom.currentStyle['paddingRight'].replace(/px/,'');";
        $tmps.= "var wfbcom=efbcom.offsetWidth-pl-pr;";
        $tmps.= "try {efbcom.firstChild.setAttribute('width',wfbcom);}";
        $tmps.= "catch(e) {efbcom.firstChild.width=wfbcom+'px';}";
        $tmps.= "} else {";
        $tmps.= "var pl=window.getComputedStyle(efbcom,null).getPropertyValue('padding-left' ).replace(/px/,'');";
        $tmps.= "var pr=window.getComputedStyle(efbcom,null).getPropertyValue('padding-right').replace(/px/,'');";
        $tmps.= "efbcom.childNodes[0].setAttribute('width',efbcom.offsetWidth-pl-pr);".PHP_EOL;
        $tmps.= "}}";
        $tmps.= "autofitfbcom();";
        $tmp .= "<script type=\"text/javascript\">".PHP_EOL."//<![CDATA[".PHP_EOL.$tmps.PHP_EOL."//]]> ".PHP_EOL."</script>".PHP_EOL;
      }
    }
    $htmlCode .= $tmp;
    if ($container_comments==1){
      $htmlCode .="</div>";
    } elseif ($container_comments==2) {
      $htmlCode .="</p>";
    }
    return $htmlCode;
  }

  private function getPlugInButtonsHTML($params, $article, $url, $title) {
    $idrnd                       = rand();
    $document                    = & JFactory::getDocument();
    $category_tobe_excluded      = $this->params->get('category_tobe_excluded_buttons', '' );
    $content_tobe_excluded       = $this->params->get('content_tobe_excluded_buttons', '' );
    $excludedContentList         = @explode ( ",", $content_tobe_excluded );
    if ($article->id!=null) {
      if ( in_array ( $article->id, $excludedContentList )) {
        return;
      }
      if (is_array($category_tobe_excluded ) && in_array ( $article->catid, $category_tobe_excluded )) {
        return;
      }
    } else {
      if (is_array($category_tobe_excluded ) && in_array ( JRequest::getCmd('id'), $category_tobe_excluded )) return;
    }
    $enable_like                 = $this->params->get( 'enable_like');
    $enable_share                = $this->params->get( 'enable_share');
    $enable_fb_photo             = $this->params->get( 'enable_fb_photo');
    $asynchronous_fb             = $this->params->get( 'asynchronous_fb',0);

    $weight = array(
      'like'    => $this->params->get( 'weight_like'),
      'share'   => $this->params->get( 'weight_share')
    );
    asort($weight);
    $container_buttons           = $this->params->get( 'container_buttons','1');
    $css_buttons                 = $this->params->get( 'css_buttons','height:40px;');
    if ($css_buttons!="") { $css_buttons="style=\"$css_buttons\""; }
    $htmlCode     = '';
    $code_like    = '';
    $code_share   = '';
    $code_fb_photo= '';
    if ($container_buttons==1){
      $htmlCode ="<div class=\"cmp_buttons_container\" $css_buttons>";
    } elseif ($container_buttons==2) {
      $htmlCode ="<p class=\"cmp_buttons_container\" $css_buttons>";
    }
    //FB like button
    if ($enable_like == 1) {
      $layout_style                = $this->params->get( 'layout_style','button_count');
      $show_faces                  = $this->params->get('show_faces');
      if ($show_faces == 1) {
        $show_faces = "true";
      } else {
        $show_faces = "false";
      }
      $width_like                  = $this->params->get( 'width_like');
      $css_like                    = $this->params->get( 'css_like','float:left;margin:10px;');
      if ($css_like!="") { $css_like="style=\"$css_like\""; }
      $container_like              = $this->params->get( 'container_like','1');
      $send                        = $this->params->get( 'send','1');
      if ($send == 2) {
        $standalone=1;
      } else {
        $standalone=0;
        if ($send == 1) {
          $send  = "true";
        } else {
          $send = "false";
        }
      }
      $verb_to_display             = $this->params->get( 'verb_to_display','1');
      if ($verb_to_display == 1) {
        $verb_to_display  = "like";
      } else {
        $verb_to_display = "recommend";
      }
      $font                        = $this->params->get( 'font');
      $color_scheme                = $this->params->get( 'color_scheme','light');
      if ($this->_fb == 1) {
        $code_like .= "<div id=\"fb-root\"></div>";
      }
      if ($standalone==1){
        $tmp = "<fb:send href=\"$url\" font=\"$font\" colorscheme=\"$color_scheme\"></fb:send>";
        if ($container_like==1){
          $code_like .="<div class=\"cmp_send_container\" $css_like>$tmp</div>";
        } elseif ($container_like==2) {
          $code_like .="<p class=\"cmp_send_container\" $css_like>$tmp</p>";
        } else {
          $code_like .=$tmp;
        }
      }
      $tmp = "<fb:like href=\"$url\" layout=\"$layout_style\" show_faces=\"$show_faces\" send=\"$send\" width=\"$width_like\" action=\"$verb_to_display\" font=\"$font\" colorscheme=\"$color_scheme\"></fb:like>";
      if ($asynchronous_fb) {
        $tmp = "<script type=\"text/javascript\">".PHP_EOL."//<![CDATA[".PHP_EOL."document.write('".$tmp."'); ".PHP_EOL."//]]> ".PHP_EOL."</script>";
      } else {
        $tmp = $tmp.PHP_EOL;
      }
      if ($container_like==1){
        $code_like .="<div class=\"cmp_like_container\" $css_like>$tmp</div>";
      } elseif ($container_like==2) {
        $code_like .="<p class=\"cmp_like_container\" $css_like>$tmp</p>";
      } else {
        $code_like .=$tmp;
      }
    }

    //FB share button
    if ($enable_share == 1) {
      $share_button_text           = $this->params->get( 'text_share_button','Share');
      $share_button_style          = $this->params->get( 'share_button_style','icontext');
      $container_share             = $this->params->get( 'container_share','1');
      $css_share                   = $this->params->get( 'css_share','float:right;margin:10px;');
      if ($css_share!="") { $css_share="style=\"$css_share\""; }
      $script  = "<script>"; 
      $script .= "function fbs_click$idrnd() {";
      $script .= "FB.ui({";
      $script .= "    method: \"stream.share\",";
      $script .= "    u: \"".$url."\"";
      $script .= "  } ";
      $script .= "); return false; };";
      $script .= "</script>";
      $tmp  = $script;  
      switch ($share_button_style) {
        case "icontext":
          $tmp .= "<style>a.cmp_shareicontextlink { text-decoration: none !important; line-height: 20px !important;height: 20px !important; color: #3B5998 !important; font-size: 11px !important; font-family: arial, sans-serif !important;  padding:2px 4px 2px 20px !important; border:1px solid #CAD4E7 !important; cursor: pointer !important;  background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important; -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important;} .cmp_shareicontextlink:hover {   background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important;  border-color:#9dacce !important; color: #3B5998 !important;} </style><a class=\"cmp_shareicontextlink\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\">".$share_button_text."</a>";
          break;
        case "text":
          $tmp .= "<style>a.cmp_sharetextlink { text-decoration: none !important; line-height: 20px !important;height: 20px !important; color: #3B5998 !important; font-size: 11px !important; font-family: arial, sans-serif !important;  padding:2px 4px 2px 4px !important; border:1px solid #CAD4E7 !important; cursor: pointer !important;  background-color: #ECEEF5 !important; -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important;} .cmp_sharetextlink:hover {   background-color: #ECEEF5 !important;  border-color:#9dacce !important; color: #3B5998 !important;} </style><a class=\"cmp_sharetextlink\" rel=\"nofollow\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\">".$share_button_text."</a>";
          break;
        case "icon":
          $tmp  .= "<style>.cmp_shareiconlink { text-decoration: none !important; line-height: 20px !important;height: 20px !important; color: #3B5998 !important; font-size: 11px !important; font-family: arial, sans-serif !important;  padding:2px 4px 2px 14px !important; border:1px solid #CAD4E7 !important; cursor: pointer;width: 20px !important;  background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important; -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important;} .cmp_shareiconlink:hover {   background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important;  border-color:#9dacce !important; color: #3B5998 !important;} </style><a class=\"cmp_shareiconlink\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\"></a>";
          break;
      }
      if ($asynchronous_fb) {
        $tmp = "<script type=\"text/javascript\">".PHP_EOL."//<![CDATA[".PHP_EOL."document.write('".preg_replace('/<\/script>/i','<\/script>',$tmp)."'); ".PHP_EOL."//]]> ".PHP_EOL."</script>";
      } else {
        $tmp = $tmp.PHP_EOL;
      }
      if ($container_share==1){
        $code_share .="<div class=\"cmp_share_container\" $css_share>$tmp</div>";
      } elseif ($container_share==2) {
        $code_share .="<p class=\"cmp_share_container\" $css_share>$tmp</p>";
      } else {
        $code_share .=$tmp;
      };
    }  

    //Facebook photo button
    if ($enable_fb_photo == 1) {
      $tmp = '';

      //find images in the text content
      preg_match_all('/(<\s*img)(\s+[^>]*?src\s*=\s*["\'])(.*?)(["\'][^>]*?>)/i', $text, $matches) ; 
      $img = array();
      $fbp = array();
      $pin = array();

      //for every photo fix the url and assign a ID
      foreach ( $matches[3] as $key => &$img) {
        $n=mt_rand(1,10000);
        $pic[]='img'.$n;
        $fbp[]='fbp'.$n;
        if (!preg_match('%^(?://|http://|https://)%',$img)) {
          $img = JURI::root().preg_replace('#^/#','',$img);      
        }
        $matches[5][$key] = $matches[1][$key].' id="img'.$n.'" '.$matches[2][$key].$img.$matches[4][$key];  
      }
      if (count($matches)==6){
        $text=str_replace($matches[0], $matches[5] , $text);
      }

      //add the button code at the end of the text
      $tmp  = '';
      foreach ( $fbp as $key => $id) {
        $tmp .="<span id='".$id."' class='cmp_fbp_button'><img src=\"".JURI::root().'plugins/content/facebooklikeandshare/fb.png'."\" title=\"Add to Facebook\" onclick=\"fb_click_photo('".$matches[3][$key]."','".$title."');\" /></span>".PHP_EOL;       
      }
      $text.=$tmp;
      if (count($pic)>0) {
        $tmp  = '';
        foreach ( $pic as $key => $id) {
          $tmp .= "
                img = document.getElementById('".$id."');
                e = document.getElementById('".$fbp[$key]."');
                if (img.height > 80 && img.width > 80) {
                  pT = img.offsetTop+img.height-35;
                  pL = img.offsetLeft+4;
                  e.style.top=pT+'px';
                  e.style.left=pL+'px';
                } else {
                  e.parentNode.removeChild(e);
                }
               ";
        }
        $n=mt_rand(1,10000);
        $tmp = "function SetFbpButtons".$n."(){ ".PHP_EOL.$tmp.PHP_EOL." }
                window.addEvent('load', function() { SetFbpButtons".$n."() });
               "; 
        $tmp = "<script type=\"text/javascript\">".PHP_EOL."//<![CDATA[".PHP_EOL.$tmp.PHP_EOL."//]]> ".PHP_EOL."</script>";
        $text.=$tmp;
      } 
    }

    foreach ($weight as $key => $val) {
      switch ($key) {
        case "like":
          $htmlCode .= $code_like;
          break;
        case "share":
          $htmlCode .= $code_share;
          break;
      }
    }

    if ($container_buttons==1) {
      $htmlCode .="</div>";
    } elseif ($container_buttons==2) {
      $htmlCode .="</p>";
    }

    return $htmlCode;
  }

  private function getTitle($obj){
    if (JRequest::getCmd('view') == 'productdetails'){
      return htmlentities( $obj->product_name, ENT_QUOTES, "UTF-8");
    } else {
      return htmlentities( $obj->title, ENT_QUOTES, "UTF-8");
    }
  }

  //get meta from editor form
  private function getDescription($obj,$view){
    if ($view == 'productdetails'){
      if (isset($obj->product_s_desc)){
        $description = $obj->product_s_desc;
      } else {
        $description = $obj->product_desc;
      }
      return htmlentities( $description, ENT_QUOTES, "UTF-8");
    }
    $description  = $this->params->get('description');

    if (($description=='1')||($description=='2')||($description=='3')) { //first paragraph or first 255 chars or only intro
      if ($view == 'article') {
        if ($description=='2') { //first 255 chars
          $description = htmlentities(mb_substr(strip_tags($obj->introtext.$obj->fulltext), 0, 251)."... ",ENT_QUOTES, "UTF-8");
        } elseif ($description=='3') { //only intro
          $description = htmlentities(strip_tags($obj->introtext),ENT_QUOTES, "UTF-8");
        } else { //first paragraph
          $content = htmlentities(strip_tags($obj->introtext.$obj->fulltext),ENT_QUOTES, "UTF-8");
          $pos = strpos($content, '.');
          if($pos === false) {
            $description = $content;
          } else {
            $description = substr($content, 0, $pos+1);
          }
        }
      } else {
        $description = stripslashes($_REQUEST['jform']['metadesc']);
      }
    } else { //article meta data
      $description = stripslashes($_REQUEST['jform']['metadesc']);
    }
    return $description;
  }

  private function getPicture($obj,$view){
    $images = array();
    if (($view == 'productdetails')||($_REQUEST['option']=='com_virtuemart')){
      return $images;
    }
    $defaultimage = $this->params->get('defaultimage');
    $onlydefaultimage = $this->params->get('onlydefaultimage');
    if ($onlydefaultimage==1){
      if ($defaultimage=="") {
        $images[] = JURI::root().'plugins/content/facebooklikeandshare/link.png';
      } else {
        if (preg_match('/^http/i',$defaultimage)) {
          $images[] = $defaultimage;
        } else {
          $images[] = JURI::root().preg_replace('#^/#','',$defaultimage);
        }
      }
    } else {
      //joomla 2.5+ content images
      if(property_exists($obj,'images')){
        if ($img=json_decode($obj->images)){
          if ($img->{'image_intro'}!=null) {
            $images[] = JURI::root().$img->{'image_intro'};
          } elseif ($img->{'image_fulltext'}!=null) {
            $images[] = JURI::root().$img->{'image_fulltext'};
          }
        }
      }
      $defaultimage = $this->params->get('defaultimage');
      if (isset($obj->text)) {
        $text=$obj->text;
      } else {
        $text=$obj->introtext;
      }
      if ($view == 'article') {
        $this->find_youtube_images($text,$images);
        $this->find_images($text,$images);
      }
      if (($view != 'article')||(count($images)==0)) {
        if ($defaultimage=="") {
          $images[] = JURI::root().'plugins/content/facebooklikeandshare/link.png';
        } else {
          if (preg_match('/^http/i',$defaultimage)) {
            $images[] = $defaultimage;
          } else {
            $images[] = JURI::root().preg_replace('#^/#','',$defaultimage);
          }
        }
      }
    }
    return $images;
  }

  private function extract_images($obj) {
    $images = array();
    $id = $obj->id;
    $db =& JFactory::getDBO();
    $sql = "SELECT `fulltext`,`introtext`,`images` FROM `#__content` WHERE `id` = ".intval($id);
    $db->setQuery($sql);
    $result=$db->loadObject();
 
    if ($imgs = json_decode($result->images)){
      $image_intro    =JURI::base().trim($imgs->image_intro);
      $image_fulltext =JURI::base().trim($imgs->image_fulltext);
      if (($image_intro)&&(!in_array($image_intro, $images))) { $images[] = $image_intro; };
      if (($image_fulltext)&&(!in_array($image_fulltext, $images))) { $images[] = $image_fulltext; };
    }

    $fulltext = trim($result->fulltext);
    $this->find_youtube_images($fulltext,$images);
    $this->find_images($fulltext,$images);
    $introtext = trim($result->introtext);
    $this->find_youtube_images($introtext,$images);
    $this->find_images($introtext,$images);

    $db->freeResult($result);
    return $images;
  }

  private function find_youtube_images($text,&$images) {
    if (preg_match_all('%(?:http|https)://www\.(?:youtube|youtube-nocookie)\.com/(?:v|embed)/(?!videoseries)(.*?)(?:\?|"|\')%i', $text, $regs)) {
      foreach ($regs[1] as $value) {
        $img = "http://img.youtube.com/vi/$value/0.jpg";
        if(!in_array($img, $images)) { $images[] = $img; };
      }
    }
  }
  private function find_images($text,&$images) {
    if (preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/i', $text, $regs_i)) {
      foreach ($regs_i[1] as $value) {
        if (preg_match('/^http/i',$value)) {
          $img = $value;
        } else {
          $img = JURI::root().preg_replace('#^/#','',$value);
        }
        list($width, $height, $type, $attr) = @getimagesize($img);
        if(($width>=200)&&($height>=200)&&(!in_array($img, $images))) { $images[] = $img; };
      }
    }
  }
  
  private function getCatUrl($obj){
    if (!is_null($obj)&&(!empty($obj->catid))) {
      $url = JRoute::_(ContentHelperRoute::getCategoryRoute($obj->catid));
      $uri = JURI::getInstance();
      $base  = $uri->toString( array('scheme', 'host', 'port'));
      $url = $base . $url;
      $url = JRoute::_($url, true, 0);
      return $url;
    }
  }

  private function getPageUrl($obj){
    if ((!is_null($obj))&&(JRequest::getCmd('view') == 'productdetails')){
      $uri = JURI::getInstance();
      $base  = $uri->toString( array('scheme', 'host', 'port'));
      $url = $base . $obj->link;
      return $url;
    }
    if (!is_null($obj)&&(!empty($obj->catid))) {
      if (empty($obj->catslug)){
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($obj->slug, $obj->catid));
      } else {
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($obj->slug, $obj->catslug));
      }
      $uri = JURI::getInstance();
      $base  = $uri->toString( array('scheme', 'host', 'port'));
      $url = $base . $url;
      $url = JRoute::_($url, true, 0);
      return $url;
    }
  }
  
  private function get_url_contents($url){
    $ch = curl_init();
    $timeout = 5;
    curl_setopt ($ch, CURLOPT_URL,$url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
  }
}
?>