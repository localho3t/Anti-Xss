<?php
class xss 
{
/*
    /\
   /**
  /****
 /******
/---------------------------------------
Anti Xss Creat By LocalHo3t :)
[*] Iranian Hackers -> Exploit(TM)
[*] 2020-09-01
[*] 01:52 AM
\---------------------------------------
 \******
  \****
   \**
    \/

 */

    
    private final function setUrl($sender,$link,$session){
        @$filter = strchr($sender,">");
        @$filter2 = strchr($sender,")");
        @$filter3 = strchr($sender,"(");
        @$filter4 = strchr($sender,"script");
        @$filter5 = strchr($sender,"alert(");
        @$filter6 = strchr($sender,"@scri");
        @$filter8 = strchr($sender,"@scrip");
        @$filter7 = strchr($sender,">scr");
        if($filter || $filter2 || $filter3 || $filter4 || $filter5 || $filter6 || $filter7|| $filter8 ){
            unset($_SESSION['{$session}']);
            header("location: {$link}");
            exit;
        }
        
    }
    public function __construct($send , $link , $session){
        $this->setUrl($send , $link,$session);
        
    }

}
