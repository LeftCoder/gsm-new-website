<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected static $mainFolder = 'photos';
  public $folder = '';
  
  public function __construct($folder) {
    $this->folder = $folder;
    
    if(! $this->folderExists()) $this->makeFolder();
  }
  
  public function path() {
    return '/'. self::$mainFolder. '/'.$this->folder;
  }
  
  public function images() {
    return \File::allFiles(public_path($this->path()));
  }
  
  public function countImages() {
    return count($this->images());
  }
  
  public function getFilenames() {
    return array_map(function($elem) {
      return $elem->getFilename();
    }, $this->images());
  }
  
  public function getFilesPath() {
    return array_map(function($value) { 
      return '/'.self::$mainFolder.'/'.$this->folder.'/'.$value; 
    }, $this->getFilenames());
  }
  
  public function folderExists() {
    return \File::exists(public_path().$this->path());
  }
  
  public function makeFolder() {
    return \File::makeDirectory(public_path().$this->path(), 0755, true);
  }

  public function getProperFileNames() {
      
    return array_map(function($value) {
      return setProperName($value);
    }, $this->getFileNames());
  }

  public static function photoCounter() {
    $galleries = \File::directories(self::$mainFolder);
    $total = 0;
    
    foreach($galleries as $folder) {
      $total += count(\File::allFiles(public_path('/'.$folder)));
    }
    
    return $total;
  }

}
