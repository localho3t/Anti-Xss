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
//               |?| = [*] V 2                                    = |?|
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
    public function db($user,$pass){
        try{
            $dsn = "mysql:host=localhost;dbname=xss;
            $cons = new PDO($dsn,$user,$pass);
            $query="INSERT INTO `baner` (`id`, `ip`) VALUES (NULL, ?);";
            $con = $cons->prepare($query);
            $con->bindValue(1,$_SERVER['REMOTE_ADDR']);
            $con->execute();
        }catch(PDOException $error){
            echo "Error Db : ".$error->getMessage();
        }
    }
    // Master Function
    private final function setUrl($sender,$link,$user,$pass){
        $sender = htmlspecialchars($sender);
        $op = htmlspecialchars($link);
        @$filter = strchr($sender,">");
        @$filter2 = strchr($sender,")");
        @$filter3 = strchr($sender,"(");
        @$filter9 = strchr($sender,"<");
        @$filter10 = strchr($sender,">alert");
        @$filter11 = strchr($sender,">aler");
        @$filter4 = strchr($sender,"script");
        @$filter5 = strchr($sender,"alert(");
        @$filter6 = strchr($sender,"@scri");
        @$filter8 = strchr($sender,"@scrip");
        @$filter7 = strchr($sender,">scr");
        @$filter12 = strchr($sender,"svg onload=");
        @$filter13 = strchr($sender,"</tag><svg onload=alert(");
        @$filter14 = strchr($sender,"'-alert(1)-'");
        @$filter15 = strchr($sender,"\"autofocus onfocus=alert(1");
        @$filter16 = strchr($sender,"'/alert(1)//");
        @$filter17 = strchr($sender,"\'/alert(1)//");
        @$filter18 = strchr($sender,"'}alert('");
        @$filter19 = strchr($sender,");{");
        @$filter20 = strchr($sender,"\${alert(");
        @$filter21 = strchr($sender,"'onload=alert(1)><svg/1='");
        @$filter22 = strchr($sender,"*/alert(1)</script><script>/*");
        @$filter23 = strchr($sender,"'>alert(1)</script><script/1='");
        @$filter24 = strchr($sender,"*/alert(1)\">'onload=\"/*<svg/1='");
        @$filter25 = strchr($sender,"*/alert(1)\">'onload=\"/*<svg/1='");
        @$filter26 = strchr($sender,"`-alert(1)\">'onload=\"`<svg/1='");
        @$filter27 = strchr($sender,"*/</script>'>alert(1)/*<script/1='");
        @$filter28 = strchr($sender,"p=<svg/1='&q='onload=alert(1)>");
        @$filter29 = strchr($sender,"p=<svg 1='&q='onload='/*&r=*/alert(1)'>");
        @$filter30 = strchr($sender,"q=<script/&q=/src=data:&q=alert(1)> ");
        @$filter31 = strchr($sender,"\"><svg onload=alert(1)>.gif");
        @$filter32 = strchr($sender,"$ exiftool -Artist='\"><svg onload=alert(1)>' xss.jpeg");
        @$filter33 = strchr($sender,"<svg xmlns=\"");
        @$filter34 = strchr($sender,"\" onload=\"alert(1)\"/>");
        @$filter35 = strchr($sender,"<img src=1 onerror=alert(");
        @$filter36 = strchr($sender,"<img src=1");
        @$filter37 = strchr($sender,"<img src=1 onerror=");
        @$filter38 = strchr($sender,"onerror=alert(");
        @$filter39 = strchr($sender,"onerror=");
        @$filter40 = strchr($sender,"<iframe");
        @$filter41 = strchr($sender,"src=javascript");
        @$filter42 = strchr($sender,":alert(");
        @$filter43 = strchr($sender,"<details");
        @$filter44 = strchr($sender,"<details open");
        @$filter45 = strchr($sender,"ontoggle=alert(");
        @$filter46 = strchr($sender,"ontoggle=");
        @$filter47 = strchr($sender,"open ontoggle=alert(");
        @$filter48 = strchr($sender,"open ontoggle=");
        @$filter49 = strchr($sender,"<svg><svg");
        @$filter50 = strchr($sender,"<svg><svg onload=");
        @$filter51  = strchr($sender,"=alert(");
        @$filter52  = strchr($sender,"data:text/html");
        @$filter53  = strchr($sender,"data:text/html,<img");
        @$filter54  = strchr($sender,"data:text/html,<img src=1 onerror=alert(");
        @$filter55  = strchr($sender,"data:text");
        @$filter56  = strchr($sender,"data:");
        @$filter57  = strchr($sender,"text/html");
        @$filter58  = strchr($sender,"data:text/html,<iframe src=javascript:alert(");
        @$filter59  = strchr($sender,"<svg onload=alert(");
        @$filter60  = strchr($sender,")>?a=reader");
        @$filter61  = strchr($sender,"[clickme](javascript:alert`");
        @$filter62  = strchr($sender,"<script src=data:,alert(");
        @$filter63  = strchr($sender,"<script src=data:");
        @$filter64  = strchr($sender,"<script src=//");
        @$filter65  = strchr($sender,"<iframe src=TARGET_URL");
        @$filter66  = strchr($sender,"src=TARGET_URL");
        @$filter67  = strchr($sender,"TARGET_URL");
        @$filter68  = strchr($sender,"onload=\"frames[0].postMessage('INJECTION','*')\">");
        @$filter69  = strchr($sender,"\"frames[0].postMessage('INJECTION','*')\">");
        @$filter71  = strchr($sender,"frames[0]");
        @$filter72  = strchr($sender,"postMessage('INJECTION','*')\">");
        @$filter73  = strchr($sender,"postMessage(");
        @$filter74  = strchr($sender,"('INJECTION'>");
        @$filter75  = strchr($sender,"'*')\">");
        @$filter76  = strchr($sender,"<x:script xmlns:x=");
        @$filter77  = strchr($sender,"\">alert(1)</x:script>");
        @$filter78 = strchr($sender,"\"></x:script>");
        @$filter79 = strchr($sender,"{{\$new.constructor('");
        @$filter81  = strchr($sender,"x ng-app>{{\$new.constructor('alert(");
        @$filter82   = strchr($sender,"<p style=overflow:auto;font-size:999px onscroll=alert(");
        @$filter83   = strchr($sender,"<x/id=y></p>#y");
        @$filter84   = strchr($sender,"1<svg onload=alert(");
        @$filter85   = strchr($sender,"1\"><svg onload=alert(");
        @$filter86   = strchr($sender,"<<!--%23set var=\"x\" value=\"svg onload=alert(");
        @$filter87   = strchr($sender,")\"--><!--%23echo var=\"x\"-->>");
        @$filter88   = strchr($sender,"'1<svg onload=alert(");
        @$filter89   = strchr($sender,"//DOMAIN/PATH/;<svg onload=alert(");
        @$filter91   = strchr($sender,"//DOMAIN/PATH/;\"><svg onload=alert(");
        @$filter92   = strchr($sender,"//DOMAIN/PATH/");
        @$filter93   = strchr($sender,");var myObj=");
        @$filter94   = strchr($sender,"myObj=");
        @$filter95   = strchr($sender,");function myFunc(){}");
        @$filter96   = strchr($sender,"myFunc(){}");
        @$filter97   = strchr($sender,"<html data-toggle=tab href=\"<img src=x onerror=alert(");
        @$filter98   = strchr($sender,"new(Notification)(");
        @$filter99   = strchr($sender,"new(");
        @$filter101   = strchr($sender,")(");
        @$filter102   = strchr($sender,"$ curl -H");
        @$filter103   = strchr($sender,"$ curl");
        @$filter104   = strchr($sender,"Vulnerable_Header:");
        @$filter105   = strchr($sender,"TARGET/?dummy_string");
        @$filter106  = strchr($sender,"dummy_string");
        @$filter107  = strchr($sender,"?dummy_string");
        @$filter108  = strchr($sender,"TARGET/");
        @$filter109  = strchr($sender,"TARGET");
        @$filter110   = strchr($sender,"$ curl -H \"Vulnerable_Header: <XSS>\" TARGET/?dummy_string");
        @$filter111   = strchr($sender,"<Svg OnLoad=alert(");
        @$filter112   = strchr($sender,"<Svg");
        @$filter113   = strchr($sender,"OnLoad=alert(");
        @$filter114   = strchr($sender,"<SVG ONLOAD=&#97&#108&#101&#114&#116(");
        @$filter115   = strchr($sender,"<SVG ONLOAD=&#>");
        @$filter116   = strchr($sender,"<SCRIPT SRC=//");
        @$filter117   = strchr($sender,"%253Csvg%2520o%256Eload%253Dalert%25281%2529%253E%2522%253E%253Csvg%2520o%256Eload%253Dalert%2528");
        @$filter118   = strchr($sender,"alert`");
        @$filter119   = strchr($sender,"<svg onload=alert&lpar;");
        @$filter120   = strchr($sender,"&lpar;");
        @$filter121   = strchr($sender,"t&#40;");
        @$filter122   = strchr($sender,"&#41");
        @$filter123   = strchr($sender,"&rpar;");
        @$filter124   = strchr($sender,"[]['\146\151\154\164\145\162']['\143\157\156\163\164\162\165\143\164\157\162']('\141\154\145\162\164\50\61\51')(");
        @$filter125   = strchr($sender,"(alert)(");
        @$filter126   = strchr($sender,"a=alert,a(");
        @$filter127   = strchr($sender,"].find(alert)");
        @$filter128   = strchr($sender,"].find(");
        @$filter129   = strchr($sender,"top[\"al\"+\"ert\"](");
        @$filter130   = strchr($sender,"top['al\145rt'](");
        @$filter131   = strchr($sender,"top[/al/.source+/ert/.source](");
        @$filter132   = strchr($sender,"/al/.source+/ert/.source");
        @$filter133   = strchr($sender,"source+/ert/");
        @$filter134   = strchr($sender,".source");
        @$filter135   = strchr($sender,"top[8680439..toString(30)](");
        @$filter136   = strchr($sender,"8680439..toString");
        @$filter137   = strchr($sender,"toString(30)");
        @$filter138   = strchr($sender,"write`XSSed!`");
        @$filter139   = strchr($sender,"write`<img/src/o&#78error=alert&lpar;");
        @$filter140   = strchr($sender,"&gt;");
        @$filter141   = strchr($sender,"write('\74img/src/o\156error\75alert\50");
        @$filter142   = strchr($sender,"alert\50");
        @$filter143   = strchr($sender,"\74img/src/o\156error");
        @$filter144   = strchr($sender,"\51\76");
        @$filter145   = strchr($sender,"top.open`javas\cript:al\ert\x28");
        @$filter146   = strchr($sender,"\x29");
        @$filter147   = strchr($sender,"top.open`javas\cript");
        @$filter148   = strchr($sender,"al\ert");
        @$filter149   = strchr($sender,"x29${0}0`");
        @$filter150   = strchr($sender,"<svg onload=eval(\" ' \"");
        @$filter151   = strchr($sender,"<svg id=eval onload=top[id](\" '");
        @$filter152   = strchr($sender,".php/'/alert(");
        @$filter153   = strchr($sender,"#'/alert(");
        @$filter154   = strchr($sender,"<svg onload=eval('`//'");
        @$filter155   = strchr($sender,"\"onpointerover=alert(");
        @$filter156   = strchr($sender,"\"autofocus onfocusin=alert(");
        @$filter157   = strchr($sender,"\"o<x>nmouseover=alert<x>(");
        @$filter158   = strchr($sender,"\"o<x>nmouseover=");
        @$filter159   = strchr($sender,"document");
        @$filter160   = strchr($sender,"Document");
        @$filter161   = strchr($sender,"\"autof<x>ocus o<x>nfocus=alert<x>(");
        @$filter100   = strchr($sender,"\"autof<x>ocus o<x>nfocus");
        @$filter90   = strchr($sender,"GIF89a=//<script>");
        @$filter80   = strchr($sender,"GIF89a=");
        @$filter70   = strchr($sender,")//</script>;");


        
        if($filter || $filter2 || $filter3 || $filter4 || $filter5 ||
          $filter6 || $filter7 || $filter8 || $filter9 || $filter10 ||
          $filter11 || $filter12 || $filter13 || $filter14 || $filter15 ||
          $filter16 || $filter17 || $filter18 || $filter19 || $filter20 ||
          $filter21 || $filter22 || $filter23 || $filter24 || $filter25 ||
          $filter26 || $filter27 || $filter28 || $filter29 || $filter30 ||
          $filter31 || $filter32 || $filter33 || $filter34 || $filter35 ||
          $filter36 || $filter37 || $filter38 || $filter39 || $filter40 ||
          $filter41 || $filter42 || $filter43 || $filter44 || $filter45 ||
          $filter46 || $filter47 || $filter48 || $filter49 || $filter50 ||
          $filter51 || $filter52 || $filter53 || $filter54 || $filter55 ||
          $filter56 || $filter57 || $filter58 || $filter59 || $filter60 ||
          $filter61 || $filter62 || $filter63 || $filter64 || $filter65 ||
          $filter66 || $filter67 || $filter68 || $filter69 || $filter70 ||
          $filter71 || $filter72 || $filter73 || $filter74 || $filter75 ||
          $filter76 || $filter77 || $filter78 || $filter79 || $filter80 ||
          $filter81 || $filter82 || $filter83 || $filter84 || $filter85 ||
          $filter86 || $filter87 || $filter88 || $filter89 || $filter90 ||
          $filter91 || $filter92 || $filter93 || $filter94 || $filter95 ||
          $filter96 || $filter97 || $filter98 || $filter99 || $filter100||
          $filter101 || $filter102 || $filter103 || $filter104 || $filter105 ||
          $filter106 || $filter107 || $filter108 || $filter109 || $filter110 ||
          $filter111 || $filter112 || $filter113 || $filter114 || $filter115 ||
          $filter116 || $filter117 || $filter118 || $filter119 || $filter120 ||
          $filter121 || $filter122 || $filter123 || $filter124 || $filter125 ||
          $filter126 || $filter127 || $filter128 || $filter129 || $filter130 ||
          $filter131 || $filter132 || $filter133 || $filter134 || $filter135 ||
          $filter136 || $filter137 || $filter138 || $filter139 || $filter140 ||
          $filter141 || $filter142 || $filter143 || $filter144 || $filter145 ||
          $filter146 || $filter147 || $filter148 || $filter149 || $filter150 ||
          $filter151 || $filter152 || $filter153 || $filter154 || $filter155 ||
          $filter156 || $filter157 || $filter158 || $filter159 || $filter160 ||
          $filter161
          ){
            $this->db($user,$pass);
            header("location: {$op}");
            exit;
          }
        
    }
    public function __construct($send,$link,$user,$pass){
        $this->setUrl($send,$link,$user,$pass);
        
    }

}
