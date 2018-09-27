# exercise-creator
A simple web based exercise creator, that creates exercises with gaps to be filled by students.
A database on server is required to permanent save your exercises
You have to start with create_ubung.html
1. Write or paste yout text in text area. Lines and paragraphs should end normally. You can resize text area to find out unwanted spaces or lines. Sentences should end with period or other suitable marks. 
2. Press go to step 2 button.
In this step you create the gaps you want. The order doesn't matter. Gaps should not contain commas (,). Make sure that input element is created every time you make a gap. If not you should refresh and check for unconventional line ends as described in step 1.
3. Press go to step 3 to try your exercise or save it permanently in your database. Save should made with blank gaps. A minimal database with 2 columns ex_body and ex_words is tested. Ex_body should be text or varchar big enough to fit the generated paragraph.
4. To test the save procedure open get_ubung_php.php after editing the id part to get the exercise you want.
