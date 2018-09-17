<?php
namespace models;
/**
 * This file is part of keenly from.
 * @author brain_yang<qiaopi520@qq.com>
 * (c) brain_yang
 * github: https://github.com/keenlysoft/
 * @time 2018年1月27日
 * For the full copyright and license information, please view the LICENSE
 */
define('DIR', DIRECTORY_SEPARATOR);

class keenly{
    
    
   private static $rootdir =  __DIR__ . DIR . '..' . DIR; //根目录
   
   
   private static $current_dir = __DIR__ . DIR; //当前目录
   
   
   private static function file_build_path(...$segments) {
        return  join(DIR, $segments);
   }
   
   
   public static function run(){
       file_put_contents(self::$rootdir . 'keenly.install', 'installed at ' . date('Y-m-d H:i:s'));
       file_put_contents(self::$rootdir . 'keenly', "<?php require './vendor/keenlysoft/keenly/bin/keenly';");
       self::CreateWeb();
       self::CreartConfig();
       self::unsetFile('keenly.php');
   }
   
   
   
   private static function unsetFile($file){
       unlink(self::$current_dir.$file);
   }
   
   
   private static function CreartConfig(){
       copy(__DIR__ . '/../vendor/keenlysoft/keenly/config/config.tpl', self::$rootdir.'config/'.'config.php');
       copy(__DIR__ . '/../vendor/keenlysoft/keenly/config/database.tpl', self::$rootdir.'config/'.'database.php');
       copy(__DIR__ . '/../vendor/keenlysoft/keenly/config/routes.tpl', self::$rootdir.'config/'.'routes.php');
       copy(__DIR__ . '/../vendor/keenlysoft/keenly/config/session.tpl', self::$rootdir.'config/'.'session.php');
   }
   
   
   
   private static function CreateWeb(){
       $web = self::$rootdir.'web';
       $conf = self::$rootdir.'config';
       @mkdir($web,0755);
       @mkdir($conf,0755);
       $data = <<<'index'
<?php
/**
 * This file is part of keenly from.
 * @author brain_yang<qiaopi520@qq.com>
 * (c) brain_yang
 * github: https://github.com/keenlysoft/
 * @time 2017年1月27日
 * For the full copyright and license information, please view the LICENSE
 */
// Autoload 自动载入
require '../vendor/autoload.php';
// 路由配置
require '../config/routes.php';
index;

       file_put_contents($web.'/index.php', $data);
       
   }
   
}
