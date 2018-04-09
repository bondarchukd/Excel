Hello!

Here is my learning experience to upload and parse xlsx files by PHP. 
Main goal of excersize was to upload xlsx file then make some calculations with data and output result to the screen.
Any external libraries and frameworks were not allowed except libraries for handling excel files.

What I did:
Сut main goal into little tasks and as result got next steps:
1. Create input to upload file
2. Create code to check format of file according to rules
3. Create parsing of xlsx file
4. Create code for calculate and correct output 

Step 1 realized in input.php file.<br>
Step 2 realized in upload.php.<br>
Step 3 - I researched github and found some popular libraries for handling Excel files in PHP. I choose PHPExcel library because of very detailed guide and big community around this. This step realized in upload.php.<br>
Step 4 - I just output multidimensional array. I tried to cut it to few arrays based on amount of clients and calculate sum of each array, but I didn't get right result.

Original text of task:
Страница с формой для загрузки файла.
Файл можно загружать только с расширение xlsx.
При загрузке файла предполагается, что это excel-файл и в нем 2 листа. Первый называется «first», второй «second»
На первом листе в первой, второй, и третьей колонке id клиента и ФИО клиента, и начальный остаток
На втором листе  в первой и второй колонке  id клиента и вводы/выводы клиента в рублях.
В случае, если не выполняется какое-либо из условий, должно выводиться сообщение об ошибке.
Необходимо реализовать загрузку файла и вывод текущий остаток с учетом вводов/выводов.
Пример файла приложен. Система, разумеется, должна обрабатывать не только этот конкретный файл, а все файлы такого типа (а на  ошибочные  выдавать ошибки).
Задание должно быть выполнено на чистом php, без использования фреймворков. Сторонние модули для работы с excel использовать можно (при необходимости найти самостоятельно).
