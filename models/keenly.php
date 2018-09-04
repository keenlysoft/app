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
    
    
   private static $rootdir =  __DIR__ . DIR . '..' . DIR;
   
   
   private static $current_dir = __DIR__ . DIR; //当前目录
   
   
   private static function file_build_path(...$segments) {
        return  join(DIR, $segments);
   }
   
   
   public static function run(){
       file_put_contents(self::$rootdir . 'keenly.install', 'installed at ' . date('Y-m-d H:i:s'));
       self::unsetFile('keenly.php');
   }
   
   
   
   private function unsetFile($file){
       unlink(self::$current_dir.$file);
   }
   
   
   
}
