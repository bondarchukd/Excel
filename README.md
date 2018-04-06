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

Step 1 realized in input.php file.
Step 2 realized in upload.php.
Step 3 - I researched github and found some popular libraries for handling Excel files in PHP. I choose PHPExcel library because of very detailed guide and big community around this. This step realized in upload.php.
Step 4 - I just output multidimensional array. I tried to cut it to few arrays based on amount of clients and calculate sum of each array, but I didn't get right result.