<?php
/*
########## СТРОКИ ##########
strpos($str, $find); // Ищет в строке $str строку $find
trim( $st [, $charlist] ); удаляет пробелы
ltrim($st [, $charlist]);
chop/rtrim($st [, $charlist]);

strlen();
strpos($where, $what [, $from = 0]);
strrpos($where, $what [, $from = 0]); //не учитывает регистр символов

strcmp($str1, $str2); //сравнивает две строки побайтово
strcasecmp($str, $str2); //при сравнении не учитывает регистр букв

substr($str, $start [, $length]);
str_replace($from, $to, $text [, &$count]);
str_ireplace($form, $to, $text [, &$count]);
substr_replace($str, $to, $start [, $length]);

str_replace( list $from, list $to, mixed $text [, &$count] );

strtr($str, $from, $to); // в строке $str заменяет $from на $to с той позиции на какой и было $from
strtr($str, $array); // в строке $str заменяет элементы в ключе массива на значение этого ключа

// кодирование и декодирование url
urlencode($str);
urldecode($str);
rawurlencode($str); // аналогична urlencode() только только не преобразует пробел в +
rawurldecode($str); // аналогична urldecode() только только не преобразует пробел в +

htmlspecialchars();

addslashes($str); //вставляет слеш перед ', ", \
stripslashes($str); //заменяет в строке $str некоторые предваренные слешем символом их однокодовым эквивалентом

strtolower($str);
strtoupper($str);
ucfirst($str);

setlocale(LC_ALL, 'ru_RU.UTF-8');

sprintf($format [, $args, ...]); //заменяет в строке специальные символы на соотвутствующие переменные
*/
//$percentage = 'I went to Minsk';
//echo sprintf("The percentage was %s%%", $percentage);
/*
printf($format [, $args, ...]); // делает тоже самое что и sprintf() только не возвращает строку а выдает результат сразу в браузер пользователя

number_format($number, $decimals, $dec_point='.', $thousands_sep = ',');

nl2br($str [, $is_xhtml = true]); //заменяет все переносыстрок \n на <br>
worswrap($str [, $width = 75, $break = '\n', $cut = false]);  //разбивает текст так чтобы в строке было не более 75 символов, кадая строка заканчивается \n и если стоит true разрез будет точно по границе

strip_tags($str); // удаляет все html теги и возвращает резудьтат

pack($format [, $args, ...]); // упаковывает заданные аргументы в бинарную строку
unpack($format, $data); //выполняет действие обратное pack()

md5();

flush(); // отправляет данные сразу в браузер в рефльном времени



########## МАССИВЫ ##########

asort( &$array [, $sort_flags] ); //сорттирует в алфавитном или в порядке по возрастанию значения
arsort( &$array [, $sort_flags] ); // не учитывает регистр при сортировке значений

ksort( &$array [, $sort_flags] ); // сорттирует в алфавитном или в порядке по возрастанию ключи
krsort( &$array [, $sort_flags] ); // не учитывает регистр при сортировке ключи

uksort( &$array, $callback ); //пользовательская сортировка ключей

uasort( &$array, $callback ); //пользовательская сортировка значений

array_reverse( $array ); // переворачивает массив сохраняя пару ключ значение

natsort( &$array ); // натуральная сортировка
natcasesort( &$array ); // не уитывает регистр при натуральной сортровке

usort();

array_multisort();

shuffle( &$array ); // перемешивает массив

array_flip( $array ); // меняет местами ключи и значения 
array_keys( $array ); // возвращает список ключей массива
array_values( $array ); // возвращает список значений массива
in_array( $value, $array ); // если $value встречается в $array то возвращает true 
array_count_values( $list ); // подсчитывает сколько раз каждое значение встречается в массиве 

array_merge( $array, $array .... ); // оюъединяет массивы
array:: array_slice( $arr, $offset [,$length] );
list:: array_splice( &$arr, $offset [,$length, $replice] );

array_push();
array_pop();
array_unshift();
array_shift();

compact();
extract();

array_change_key_case();

range(1, 100);

array_intersect( $array1, $array2 [, $array3 ...] ); // возвращает значения $array1 которые встречаются во всех других массивах
array_diff( $array1, $array2 [, $array3 ...] ); // возвращает значения $array1 которые не встречаются во всех других массивах
array_unique();

json_encode();
json_decode();

########## ФАЙЛЫ ##########

file_put_contents();
file_get_contents();

unlink();





property_exists