<?php
debug($out);
/*
*Класс для создания объекта по пути
*/
/*$a = ['one', 'two', 'tree'];

$arr = ['one'=>
          ['two'=>
              ['tree'=>154]
          ],
        'two'=>
          ['tree'=>
              ['four'=>5],
          ]
    ];

function createPathObject($value='', $array=[], $set = false)
{
    $b = $value;
    krsort($array);
    foreach ($array as $k => $v) {
        $b='{"' .$v. '":' .$b. '}';
    }
    return json_decode($b, $set);
}

$obj = createPathObject(0, $a, true);

debug($obj);



$object = json_decode(json_encode($arr), true);
debug($object);
$output = array_replace($object, $obj);
debug($output);*/

/*function mergingArrays($a1 = [],$a2 = []){
  if (!empty($a1) && !empty($a2)) {
    $output_array = $a1;
    foreach ($a1 as $day_en => $v1) {
      foreach ($v1 as $day_ru => $v2) {
        foreach ($v2 as $k1 => $v3) {
          /*Замена пустых значения в первом массиве на значения из второго
          if (!($a1[$day_en][$day_ru][$k1]) && !empty($a2[$day_en][$day_ru][$k1])) {        
            $output_array[$day_en][$day_ru][$k1] = $a2[$day_en][$day_ru][$k1];
          }
          /*Дополнение значений первого массива значениями из второго
          if (!empty($a1[$day_en][$day_ru][$k1]) && !empty($a2[$day_en][$day_ru][$k1])) {
            $output_array[$day_en][$day_ru][$k1] = [$a1[$day_en][$day_ru][$k1], $a2[$day_en][$day_ru][$k1]];
          }
        }      
      }
    }
  } else {
    empty($a1) ? debug($a2) : debug($a1);
  }
  return $output_array;
}*/

/*$a1 = json_decode(file_get_contents(DATA . "schedule/inf.json"), true);
$a2 = json_decode(file_get_contents(DATA . "schedule/fiz.json"), true);

$data = mergingArrays($a1, $a2);
debug($data);*/
/*debug(json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
*/

?>
