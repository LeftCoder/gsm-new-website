<?php

function slugify($value) {
  return \Illuminate\Support\Str::slug($value);  
}

function setProperName($value) {
  $value = substr($value, 0, strrpos($value, "."));
  if(strrpos($value, "_")) $value = substr($value, 0, strrpos($value, "_"));
  
  return $value;
}