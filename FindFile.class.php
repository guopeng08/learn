<?php
/**遍历文件夹及文件类
*Date:   2013-03-21
*Author: fdipzone
*Ver:    1.0
*/
class FindFile{

    public $files = array();    // 存储遍历的文件
    protected $maxdepth;        // 搜寻深度,0表示没有限制

    /*  遍历文件及文件夹
    *   @param String $spath     文件夹路径
    *   @param int    $maxdepth  搜寻深度,默认搜寻全部
    */
    public function process($spath, $maxdepth=0){
        if(isset($maxdepth) && is_numeric($maxdepth) && $maxdepth>0){
            $this->maxdepth = $maxdepth;
        }else{
            $this->maxdepth = 0;
        }
        $this->files = array();
        $this->traversing($spath); // 遍历
    }

    /*  遍历文件及文件夹
    *   @param String $spath 文件夹路径
    *   @param int    $depth 当前文件夹深度
    */
    private function traversing($spath, $depth=1){
        if($handle = opendir($spath)){
            while(($file=readdir($handle))!==false){
                if($file!='.' && $file!='..'){
                    $curfile = $spath.'/'.$file;

                    if(is_dir($curfile)){ // dir
                        if($this->maxdepth==0 || $depth<$this->maxdepth){ // 判断深度
                            $this->traversing($curfile, $depth+1);
                        }
                    }else{  // file
                        $this->handle($curfile);
                    }

                }
            }
            closedir($handle);
        }
    }

    /**处理文件方法
    *  @param String $file 文件路径
    */
    protected function handle($file){
        array_push($this->files, $file);
    }

}
// UnsetBom.class.php用于清除utf8+bom文件的bom，即头三个字节 0xEF 0xBB 0xBF，继承FindFile类 

/**遍历所有文件，清除utf8+bom 0xEF 0xBB 0xBF
*Date:   2013-03-21
*Author: fdipzone
*Ver:    1.0
*/
class UnsetBom extends FindFile{

    private $filetype = array(); // 需要处理的文件类型

    // 初始化
    public function __construct($filetype=array()){
        if($filetype){
            $this->filetype = $filetype;
        }
    }

    /**重写FindFile handle方法
    *   @param  String $file 文件路径
    */
    protected function handle($file){
        if($this->check_ext($file) && $this->check_utf8bom($file)){ // utf8+bom
            $this->clear_utf8bom($file);        // clear
            array_push($this->files, $file);    // save log
        }
    }

    /**检查文件是否utf8+bom
    *   @param  String $file 文件路径
    *   @return boolean
    */
    private function check_utf8bom($file){
        $content = file_get_contents($file);
        return ord(substr($content,0,1))===0xEF && ord(substr($content,1,1))===0xBB && ord(substr($content,2,1))===0xBF;
    }

    /**清除utf8+bom
    *   @param String $file 文件路径
    */
    private function clear_utf8bom($file){
        $content = file_get_contents($file);
        file_put_contents($file, substr($content,3), true); // 去掉头三个字节
    }

    /**检查文件类型
    *   @param  String $file 文件路径
    *   @return boolean
    */
    private function check_ext($file){
        $file_ext = strtolower(array_pop(explode('.',basename($file))));
        if(in_array($file_ext, $this->filetype)){
            return true;
        }else{
            return false;
        }
    }

}

$folder = dirname(__FILE__);

$obj = new UnsetBom(array('php','css','js')); // 文件类型
$obj->process($folder);

print_r($obj->files);



?>