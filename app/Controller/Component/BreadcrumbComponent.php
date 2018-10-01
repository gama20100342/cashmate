<?php    


//class BreadcrumbComponent extends Object{
class BreadcrumbComponent extends Component{

  var $controller;
  var $components = array('Session','Acl');
 
  function startup(&$controller){
    $this->controller =& $controller; 
  }
     
    function setBreadcrumb($url){
        $crumbs = split('/',$url);
        $link = '/';
         
        if($crumbs[0] != 'admin'){
            $breadcrumb[] = array('home', $link);
        }
         
        foreach($crumbs AS $crumb){
            $name = str_replace('_',' ', $crumb);
            $link .= $crumb.'/';
            if($name && !is_numeric($name)){
                $breadcrumb[] = array($name,$link);
            }elseif(is_numeric($name)){
                $key = count($breadcrumb)-1;
                $breadcrumb[$key][1].= $name;
            }
        }
         
        return $breadcrumb;
    }
     
}
