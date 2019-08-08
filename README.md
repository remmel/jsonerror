# jsonerror

json_decode cannot decode "[]" or "["Львів (Lviv)"]" string. It throws a "Syntax error" message. Error seems to comes from encoded file which starts with the hex "efbb bf"

Stackoverflow question : https://stackoverflow.com/questions/57409964/json-decode-cannot-decode

```shell script
~/workspace/jsonerror$ php test.php
______ /fine_lviv.json ______
encoding: UTF-8
content: ["Львів (Lviv)"]
Array
(
    [0] => Львів (Lviv)
)
______ /wrong_lviv.json ______
encoding: UTF-8
content: ﻿["Львів (Lviv)"]
PHP Fatal error:  Uncaught JsonException: Syntax error in /home/remmel/workspace/jsonerror/test.php:17
Stack trace:
#0 /home/remmel/workspace/jsonerror/test.php(17): json_decode('\xEF\xBB\xBF["\xD0\x9B\xD1\x8C\xD0\xB2\xD1\x96\xD0\xB2...', false, 512, 4194304)
#1 {main}
  thrown in /home/remmel/workspace/jsonerror/test.php on line 17

```

Same error with "[]" json (fine_empty.json and wrong_empty.json). The wrong file starts with "efbb bf" :

```shell script
~/workspace/jsonerror$ xxd fine_empty.json
00000000: 5b5d                                     []

~/workspace/jsonerror$ xxd wrong_empty.json
00000000: efbb bf5b 5d                             ...[]
```


See the problem by yourself:
```shell script
git clone git@github.com:remmel/jsonerror.git
cd jsonerror
php test.php
```
