<?php

//                   /\
//                  /**\
//                 /****\
//                /******\
//               /********\________/\  __/\  ___/\  ______________Exploit________>>>
//               \********/          \/    \/     \/
//                \******/
//                 \****/
//                  \**/
//                   \/

//               |?| ============================================== |?|
//               |?| = [*] Anti Xss Creat By LocalHo3t :)         = |?|
//               |?| = [*] Iranian Hackers -> Exploit(TM) AND TBS = |?|
//               |?| = [*] 2020-09-01                             = |?|
//               |?| = [*] 01:52 AM                               = |?|
//               |?| = [*] V 1.1                                  = |?|
//               |?| ============================================== |?|

//                   /\
//                  /**\
//                 /****\
//                /******\
//               /********\________/\  __/\  ___/\  ______________TBS____________>>>
//               \********/          \/    \/     \/
//                \******/
//                 \****/
//                  \**/
//                   \/

class Anti_XSS
{
    private $ip;
    // DB Function in Ban IP
    public function db($server,$user,$pass,$db,$ip){
        try{
            $dsn = "mysql:host=$server;dbname=$db";
            $cons = new PDO($dsn,$user,$pass);
            $query="INSERT INTO `baner` (`id`, `ip`) VALUES (NULL, ?);";
            $con = $cons->prepare($query);
            $con->bindValue(1,$ip);
            $con->execute();
        }catch(PDOException $error){
            echo "Error Db : ".$error;
        }
    }
    // Master Function
    private final function setUrl($sender,$link,$server,$user,$pass,$db,$ip){
        $sender = htmlspecialchars($sender);
        $op = htmlspecialchars($link);
        @$filter = strchr($sender,">");
        @$filter2 = strchr($sender,")");
        @$filter3 = strchr($sender,"(");
        @$filter9 = strchr($sender,"<");
        @$filter10 = strchr($sender,">alert(");
        @$filter11 = strchr($sender,">aler");
        @$filter4 = strchr($sender,"script");
        @$filter5 = strchr($sender,"alert(");
        @$filter6 = strchr($sender,"@scri");
        @$filter8 = strchr($sender,"@scrip");
        @$filter7 = strchr($sender,">scr");
        
        if($filter || $filter2 || $filter3 || $filter4 || $filter5 || $filter6 || $filter7 || $filter8 || $filter9 || $filter10 || $filter11 ){
            $this->db($server,$user,$pass,$db,$ip);
            header("location: {$op}");
            exit;
        }else{
            echo "ok";
        }
        
    }
    public function __construct($send,$link,$server,$user,$pass,$db,$ip){
        $this->setUrl($send,$link,$server,$user,$pass,$db,$ip);
        
    }

}
