CREATE USER 'admin'@'172.25.0.6' IDENTIFIED BY 'test';
GRANT ALL ON *.* TO 'admin'@'172.25.0.6';
FLUSH PRIVILEGES;

create table practice
(
    id      int unsigned auto_increment
        primary key,
    `index` varchar(191) null,
    comment text         null
)
    collate = utf8mb4_unicode_520_ci;


INSERT INTO app.practice (id, `index`, comment) VALUES (28, 'Content --- 1', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (29, 'PHP Best Practices To Follow in 2020  --- 2', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (30, 'SQL Practice --- 3', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (31, '1. Always Use PSR- 12 recommendations For Error-Free Coding', 'I have always used PSR-12 (PHP Standard Recommendations) instead of the WordPress coding standard. It is one of the most substantial standards that is also used by the PHP frameworks Symfony and Laravel. It covers everything from parentheses to control structures, methods, indentation, line length, and coding rules about how many gaps a programmer can leave between different code structures.
This is mainly because WordPress standards are obsolete and don&#039;t support any of the newer language features. Using modern PHP PSR-2 features is also a good practice.
');
INSERT INTO app.practice (id, `index`, comment) VALUES (32, '2. Make Your Code Concise and Readable With the Twig Template', 'Twig is the best example of a PHP template engine. It is used by Symfony. In Twig, the code is more concise and readable, and it supports output escaping and template extension using inheritance and blocks. Twig is also great performance-wise, as it compiles to PHP templates and has no overhead. It is limited to templating only. It allows you to remove business logic from templates and enforces separation of concerns.

It&rsquo;s really easy to learn for developers because Twig doesn&rsquo;t have many functions, and the base code is HTML. So if you know HTML, you just need a few more functions and you&rsquo;re good to go with Twig template.

Twig has a clever mechanism of template assembly. It compiles templates into simple PHP classes and stores the result in the cache files. Thus, Twig does not parse templates twice.

Twig is so flexible that it can easily be extended according to your choice. It allows you to edit the tags, use parentheses instead of curly braces, redefine the class, add a new filter, function, or test, etc.');
INSERT INTO app.practice (id, `index`, comment) VALUES (33, '4. Use &#039;Namespaces&#039; To Avoid Name Collision', 'WordPress uses a global namespace. This means that any classes or functions declared globally are visible anywhere in the whole codebase. Naming conflicts lead to errors, and we don&#039;t want that.
For example, naming collisions happen when you declare a function with a name that already exists. So instead of using simple Class names like Order, I can make it something like:

Syncrasy_Get_My_Plugin_Order

where &ldquo;Syncrasy&rdquo; is the unique prefix that I just made up.

Namespaces help to organize code and avoid name collision. You can also use complex namespaces, for example, those separated with a slash.

My example
class Syncrasy_Get_My_Plugin_Order

would be Syncrasy\\_Plugin\\Order if done using namespaces. Here syncrasy and Get_My_Plugin are sub-namespaces and Order is the class name. You can add a use statement and use only the class name afterward.

See how it looks:
use Syncrasy\\Get_My_Plugin\\Order;

$a = new Order;');
INSERT INTO app.practice (id, `index`, comment) VALUES (34, '5. Always Use the Autoloader Function in PHP', 'In my development project, most PHP workflows form by using require or include statements. But I need to add more require statements in the main plugin file.

An autoloader is a function that automatically includes files and does so only when needed. The main benefit is there is no need to add any require statements manually anymore.

With an autoloader function, you know in which file your classes and functions live. For that, you can work on the PHP-FIG and PSR-4 autoloader tool.');
INSERT INTO app.practice (id, `index`, comment) VALUES (35, '6. Use Arrow Functions For Better &amp; Cleaner One-Liner Functions', 'Functions in PHP tend to be lengthy, even when performing simple operations. This is due to a large amount of syntactic boilerplate, and because you need to manually import used variables. This makes PHP code that uses simple closures confusing to read and even harder to understand.

If you use arrow function syntax, you can have a variety of functions such as variadics, default values, parameter and return types, as well as by-reference passing and returning. All while maintaining clean, readable code.');
INSERT INTO app.practice (id, `index`, comment) VALUES (36, '7. Foreign Function Interface: a Simple Way to Call Native Functions', 'One of the best and most long-awaited features of PHP 7.4 is FFI (Foreign Function Interface) support.
PHP 7.4 FFI comes along with TLS 1.3 (Transport Layer Security) for OpenSSL streams, a preload feature, PHP FPM system (Fast Process Manager) for better optimization of codes, and so on.

What&#039;s New in TLS 1.3?

Transportation Layer Security (TLS) 1.3 protocol provides better privacy and performance standards compared to previous versions of TLS.

TLS 1.3 reduces latency, optimizes code performance and security of your encrypted connections using OpenSSL streams. The rapid adoption of Cloudflare TLS 1.3 in all modern browsers for e.g., Microsoft Edge started supporting TLS 1.3 with version 76 and draft version of TLS 1.3 was enabled in Firefox 52 that allow building a safer and faster web and also influencing the web development standards.
&zwnj;
What&#039;s New in PHP FPM?

The primary benefit of using PHP-FPM in your coding task is having more efficient &laquo;PHP handling&raquo; and the ability to use &laquo;opcode caching&raquo; for PHP scripts.

PHP-FPM&rsquo;s is built on an event-driven framework that allows PHP scripts to use as much of the server&rsquo;s resources without using the additional overhead that comes from running them inside of web server processes.

PHP-FPM can reuse worker processes repeatedly instead of having to create and terminate them for every single PHP request. PHP-FPM can serve more traffic than traditional PHP handlers while creating greater resource efficiency.

Let&#039;s Continue with FFI Best Practices

If you use PHP FFI moving forward you should have less of a need to write new PHP modules for interfacing with C libraries/programs. This can now can be done using the foreign function interface.

If you need to run resource-intensive code, you can use a foreign function interface for the task &mdash; extensive parsing, number crunching, complex rendering, etc. You can &laquo;glue&raquo; two code bases together inside a single program without using two entirely different programs. Programmers can have a good C-ABI library readily available with FFI extension. It will save your time, as you don&#039;t need to rewrite code in PHP.

FFI also provides performance boosts to your coding task. Python has become one of the most popular languages for machine learning because of FFI because it makes Python codes relatively simple to load and allows using powerful C-ABI libraries in Python using FFI extension.');
INSERT INTO app.practice (id, `index`, comment) VALUES (37, 'Q1. Please select all the information of persons table that the name starts with A', '
  SELECT *
  FROM
  [Person].[Person]
  WHERE [FirstName] LIKE &#039;a%&#039;');
INSERT INTO app.practice (id, `index`, comment) VALUES (38, 'Q2. Create a store procedure that receives the first name of the person table as input and the last name as output.', 'ALTER PROCEDURE GetLastName
  @firstname varchar(50),
  @lastname varchar(50) OUTPUT
AS
BEGIN
  SELECT @lastname=lastname
  FROM [Person].[Person]
  WHERE FirstName = @firstname
END');
INSERT INTO app.practice (id, `index`, comment) VALUES (39, 'Q3. Which query would you execute to delete all the rows from the person table with minimal bulk-logged activity?', 'A3. The truncate table sentence removes data without logging individual row deletions. It is the most efficient way to remove all the data. The delete command, on the other hand, logs a lot of data if we have multiple rows and can consume a lot of space in the transaction log files. So, the code will be the following:

Truncate table person.person
');
INSERT INTO app.practice (id, `index`, comment) VALUES (40, 'Q4. Create a query to show the account number and customerid from the customer table for the customer without sales orders', ' SELECT c.[AccountNumber],c.CustomerID
  FROM
  [Sales].[Customer] c
  LEFT JOIN [Sales].[SalesOrderHeader] s
  ON c.customerid=s.customerid
  WHERE s.salesorderid IS NULL');

create table practice_tag
(
    id          int unsigned auto_increment
        primary key,
    tag_id      int unsigned null,
    practice_id int unsigned null,
    constraint UQ_03cbdd6d5afce1d7856f32878d04f093255c68ef
        unique (practice_id, tag_id),
    constraint c_fk_practice_tag_practice_id
        foreign key (practice_id) references practice (id)
            on update cascade on delete cascade,
    constraint c_fk_practice_tag_tag_id
        foreign key (tag_id) references tag (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_520_ci;

create index index_foreignkey_practice_tag_practice
    on practice_tag (practice_id);

create index index_foreignkey_practice_tag_tag
    on practice_tag (tag_id);

INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (1, 1, 28);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (2, 1, 29);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (3, 1, 30);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (4, 5, 31);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (5, 5, 32);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (6, 5, 33);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (7, 5, 34);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (8, 5, 35);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (9, 5, 36);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (10, 6, 37);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (11, 6, 38);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (12, 6, 39);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (13, 6, 40);

create table tag
(
    id     int unsigned auto_increment
        primary key,
    themes varchar(191) null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.tag (id, themes) VALUES (1, 'Content');
INSERT INTO app.tag (id, themes) VALUES (2, 'Basic PHP');
INSERT INTO app.tag (id, themes) VALUES (3, 'Intermediate PHP');
INSERT INTO app.tag (id, themes) VALUES (4, 'Advanced PHP');
INSERT INTO app.tag (id, themes) VALUES (5, 'PHP Best Practices To Follow in 2020');
INSERT INTO app.tag (id, themes) VALUES (6, 'SQL Practice');

create table tag_theory
(
    id        int unsigned auto_increment
        primary key,
    tag_id    int unsigned null,
    theory_id int unsigned null,
    constraint UQ_b1b30391a8fce2086b2ee41f46e0aa414aa9ae87
        unique (tag_id, theory_id),
    constraint c_fk_tag_theory_tag_id
        foreign key (tag_id) references tag (id)
            on update cascade on delete cascade,
    constraint c_fk_tag_theory_theory_id
        foreign key (theory_id) references theory (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_520_ci;

create index index_foreignkey_tag_theory_tag
    on tag_theory (tag_id);

create index index_foreignkey_tag_theory_theory
    on tag_theory (theory_id);

INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (1, 1, 1);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (2, 1, 2);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (3, 1, 3);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (4, 1, 4);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (5, 2, 5);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (6, 2, 6);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (7, 2, 7);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (8, 2, 8);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (9, 2, 9);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (10, 2, 10);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (11, 2, 11);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (12, 2, 12);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (13, 2, 13);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (14, 2, 14);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (15, 2, 15);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (16, 2, 16);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (17, 2, 17);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (18, 2, 18);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (19, 2, 19);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (20, 2, 20);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (21, 2, 21);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (22, 2, 22);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (23, 3, 23);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (24, 3, 24);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (25, 3, 25);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (26, 3, 26);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (27, 3, 27);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (28, 3, 28);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (29, 3, 29);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (30, 3, 30);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (31, 3, 31);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (32, 3, 32);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (33, 3, 33);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (34, 3, 34);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (35, 3, 35);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (36, 3, 36);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (37, 3, 37);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (38, 4, 38);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (39, 4, 39);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (40, 4, 40);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (41, 4, 41);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (42, 4, 42);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (43, 4, 43);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (44, 4, 44);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (45, 4, 45);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (46, 4, 46);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (47, 4, 47);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (48, 4, 48);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (49, 4, 49);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (50, 4, 50);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (51, 4, 51);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (52, 4, 52);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (53, 4, 53);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (54, 4, 54);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (55, 4, 55);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (56, 4, 56);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (57, 4, 57);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (58, 4, 58);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (59, 4, 59);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (60, 4, 60);

create table theory
(
    id      int unsigned auto_increment
        primary key,
    `index` varchar(191) null,
    comment text         null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.theory (id, `index`, comment) VALUES (1, 'Content --- 1', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (2, 'Basic PHP --- 2', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (3, ' Intermediate PHP --- 3', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (4, 'Advanced PHP --- 4', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (5, '1. Differentiate between static and dynamic websites.', 'Static Website: The content cannot be manipulated after the script is executed. No way to change the content as it is predefined
Dynamic Website: The content can be changed even at the runtime. The content can be changed easily by manipulation and reloading');
INSERT INTO app.theory (id, `index`, comment) VALUES (6, '2. What is PHP most used for?', 'PHP has a plethora of uses for developers. Following are some of the most widely used concepts that PHP offers:

With PHP, it becomes very easy to provide restricted access to the required content of the website.
It allows users to access individual cookies and set them as per requirement.
Database manipulation operations, such as addition, deletion, and modification, can be done easily.
Form handling, alongside features that involve file handling concepts and email integration, is used widely.
The system module allows users to perform a variety of system functions such as open, read, write, etc.');
INSERT INTO app.theory (id, `index`, comment) VALUES (7, '3. Is PHP a case-sensitive scripting language?', 'The answer to this is both yes and no. Variables and their declaration in PHP are completely case sensitive while function names are not.

For example, user-defined functions in PHP can be defined in uppercase but later referred to in lowercase, and it would still function normally.

Next up on these PHP interview questions for freshers, you need to understand what PEAR is.

');
INSERT INTO app.theory (id, `index`, comment) VALUES (8, '4. What is the meaning of PEAR in PHP?', 'PEAR stands for PHP Extension and Application Repository. It is one of the frameworks and acting repositories that host all of the reusable PHP components. Alongside containing some of the PHP libraries, it also provides you with a simple interface to automatically install packages.');
INSERT INTO app.theory (id, `index`, comment) VALUES (9, '5. How is a PHP script executed?', 'PHP scripts can be easily executed from the command-line interface (CLI). The syntax is as follows:

php filename.php

Here, filename refers to the file that contains scripts. The extension .php is needed alongside the filename.');
INSERT INTO app.theory (id, `index`, comment) VALUES (10, '6. What are the types of variables present in PHP?', 'There are eight primary data types in PHP as shown below:

Array: A named and ordered collection of data
Boolean: A logical value (True or False)
Double: Floating point numbers such as 5.1525
Integer: Whole numbers without a floating point
Object: An instance of classes, containing data and functions
NULL: A special data type, supporting only the NULL data
Resource: Special variables that hold references to external resources
String: A sequence of characters such as, &ldquo;Hello learners!&rdquo;');
INSERT INTO app.theory (id, `index`, comment) VALUES (11, '7. What are the variable-naming rules you should follow in PHP?', 'There are two main rules that you have to follow when naming a variable in PHP. They are as follows:

a) Variables can only begin with letters or underscores.
b) Special characters such as +, %, -, &amp;, etc. cannot be used.
');
INSERT INTO app.theory (id, `index`, comment) VALUES (12, '8. What are the main characteristics of a PHP variable?', 'Following are some of the most important aspects of the usage of variables in PHP:

Variables can be declared before the value assignment.
A variable value assignment happens using the &lsquo;=&rsquo; operator.
Every variable in PHP is denoted with a $ (dollar) sign.
The value of a variable depends on its latest assigned value.
PHP variables are not intrinsic. There is no explicit declaration.
Next up on these PHP interview questions for freshers, you need to understand what NULL is.');
INSERT INTO app.theory (id, `index`, comment) VALUES (13, '9. What is NULL in PHP?', 'NULL is a special data type in PHP used to denote the presence of only one value, NULL. You cannot assign any other value to it.

NULL is not case sensitive in PHP and can be declared in two ways as shown below:

$var = NULL:
Or

$var = null;
Both of the above syntaxes work fine in PHP.

');
INSERT INTO app.theory (id, `index`, comment) VALUES (14, '10. How are constants defined in PHP?', 'Constants can be defined easily in PHP by making use of the define() function. This function is used to define and pull out the values of the constants easily.

Constants, as the name suggests, cannot be changed after definition. They do not require the PHP syntax of starting with the conventional $ sign.');
INSERT INTO app.theory (id, `index`, comment) VALUES (15, '11. What is the use of the constant() function in PHP?', 'The constant() function is used to retrieve the values predefined in a constant variable. It is used especially when you do not know the name of the variable.

');
INSERT INTO app.theory (id, `index`, comment) VALUES (16, '12. What are the various constants predefined in PHP?', 'PHP consists of many constants, and following are some of the widely used ones:

_METHOD_: Represents the class name
_CLASS_: Returns the class name
_FUNCTION_: Denotes the function name
_LINE_: Denotes the working line number
_FILE_: Represents the path and the file name');
INSERT INTO app.theory (id, `index`, comment) VALUES (17, '13. Differentiate between variables and constants in PHP.', 'Variable: Variables can have changed paths. The default scope is the current access scope. The $ assignment is used for definition.Compulsory usage of the $ sign at the start.
Constant: Constants cannot be changed. Constants can be accessed throughout without any scoping rules. Constants are defined using the define() function. No need for the $ sign for constants.');
INSERT INTO app.theory (id, `index`, comment) VALUES (18, '14. What does the phrase &lsquo;PHP escape&rsquo; mean?', 'PHP escape is a mechanism that is used to tell the PHP parser that certain code elements are different from PHP code. This provides the basic means to differentiate a piece of PHP code from the other aspects of the program.');
INSERT INTO app.theory (id, `index`, comment) VALUES (19, '15. How are two objects compared in PHP?', 'HP provides you with the &lsquo;==&rsquo; operator, which is used to compare two objects at a time. This is used to check if there is a common presence of attributes and values between the objects in comparison.

The &lsquo;===&rsquo; operator is also used to compare if both objects in consideration are referencing to the same class.

Next up on these PHP interview questions, you need to understand a fundamental concept.');
INSERT INTO app.theory (id, `index`, comment) VALUES (20, '16. What is the meaning of break and continue statements in PHP?', 'Break: This statement is used in a looping construct to terminate the execution of the iteration and to immediately execute the next snippet of code outside the block of the looping construct.

Continue: This statement is used to skip the current iteration of the loop and continue to execute the next iteration until the looping construct is exited.');
INSERT INTO app.theory (id, `index`, comment) VALUES (21, '17.  What are some of the popular frameworks in PHP?', 'There are many frameworks in PHP that are known for their usage. Following are some of them:

CodeIgniter
CakePHP
Laravel
Zend
Phalcon
Yii 2');
INSERT INTO app.theory (id, `index`, comment) VALUES (22, '18. What is the use of the final class and the final method in PHP?', 'The &lsquo;final&rsquo; keyword, if present in a declaration, denotes that the current method does not support overriding by other classes. This is used when there is a requirement to create an immutable class.

Note: Properties cannot be declared as final. It is only methods and classes that get to be final.');
INSERT INTO app.theory (id, `index`, comment) VALUES (23, '1. How does JavaScript interact with PHP?', 'JavaScript is a client-side programming language, while PHP is a server-side scripting language. PHP has the ability to generate JavaScript variables, and this can be executed easily in the browser, thereby making it possible to pass variables to PHP using a simple URL.');
INSERT INTO app.theory (id, `index`, comment) VALUES (24, '2. Does PHP interact with HTML?', 'Yes, HTML and PHP interaction is the core of what makes PHP what it is. PHP scripts have the ability to generate HTML mode and move around information very easily.

PHP is a server-side scripting language, while HTML is a client-side language. This interaction helps bridge the gaps and use the best of both languages.

');
INSERT INTO app.theory (id, `index`, comment) VALUES (25, '3. What are the types of arrays supported by PHP?', 'There are three main types of arrays that are used in PHP.

Indexed arrays: These are arrays that contain numerical data. Data access and storage are linear.
Associative arrays: There are arrays that contain strings for indexing elements.
Multidimensional arrays: These are arrays that contain more than one index and dimension.
');
INSERT INTO app.theory (id, `index`, comment) VALUES (26, '4. How does the &lsquo;foreach&rsquo; loop work in PHP?', 'The foreach statement is a looping construct used in PHP to iterate and loop through the array data type. The working of foreach is simple; with every single pass of the value, elements get assigned a value and pointers are incremented. This process is repeated until the end of the array.

The following is the syntax for using the foreach statement in PHP:

foreach(array)
{
Code inside the loop;
}');
INSERT INTO app.theory (id, `index`, comment) VALUES (27, '5. Differentiate between require() and require_once() functions.', 'require(): The inclusion and evaluation of files. Preferred for files with fewer functions.
require_once(): Includes files if they are not included before. Preferred when there are a lot of functions');
INSERT INTO app.theory (id, `index`, comment) VALUES (28, '6. What are the data types present in PHP?', 'Scalar Data Types:  Boolean,   Integer&lt;&gt;,  Float, String.
Compound Data Types:  Array, Object.
Special Data Types:  NULL, Resource.');
INSERT INTO app.theory (id, `index`, comment) VALUES (29, '7. How can a text be printed using PHP?', 'A text can be output onto the working environment using the following methods:

Echo
Print');
INSERT INTO app.theory (id, `index`, comment) VALUES (30, '8. Is it possible to set infinite execution time in PHP?', 'Yes, it is possible to have an infinite execution time in PHP for a script by adding the set_time_limit(0) function to the beginning of a script.

This can also be executed in the php.ini file if not at the beginning of the script.');
INSERT INTO app.theory (id, `index`, comment) VALUES (31, '9. What is the use of constructors and destructors in PHP?', 'Constructors are used in PHP as they allow you to pass parameters when creating a new object easily. This is used to initialize the variables for the particular object in consideration.

Destructors are methods used to destroy an object. Both of these are special methods provided in PHP for you to perform complex procedures using a single step.');
INSERT INTO app.theory (id, `index`, comment) VALUES (32, '10. What are some of the top Content Management Systems (CMS) used in PHP?', 'There are many CMS that are used in PHP. The popular ones are as mentioned below:

WordPress,
Joomla,
Magneto,
Drupal.');
INSERT INTO app.theory (id, `index`, comment) VALUES (33, '11. How are comments used in PHP?', 'There are two ways to use comments in PHP. They are single-line comments and multi-line comments.

Single-line comments can be used using the conventional &lsquo;#&rsquo; sign.

Example:

&lt;?php
# This is a comment
echo &quot;Single-line comment&quot;;
?&gt;
Multi-line comments can be denoted using &lsquo;/* */&rsquo; in PHP.
Example:

&lt;?php
/*
This is
a
Multi-line
Comment
In PHP;
*/
echo &quot;Multi-line comment&quot;;
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (34, '12. What is the most used method for hashing passwords in PHP?', 'The crypt() function is widely used for this functionality as it provides a large amount of hashing algorithms that can be used. These algorithms include md5, sha1 or sha256.');
INSERT INTO app.theory (id, `index`, comment) VALUES (35, '13. Differentiate between an indexed array and an associative array.', 'Indexed arrays have elements that contain a numerical index value.

Example: $color=array(&quot;red&quot;,&quot;green&quot;,&quot;blue&quot;);
Here, red is at index 0, green at 1, and blue at 2.

Associative arrays, on the other hand, hold elements with string indices as shown below:

Example: $salary=array(&quot;Jacob&quot;=&gt;&quot;20000&quot;,&quot;John&quot;=&gt;&quot;44000&quot;,&quot;Josh&quot;=&gt;&quot;60000&quot;);');
INSERT INTO app.theory (id, `index`, comment) VALUES (36, '14. What is the difference between ASP.NET and PHP?', 'ASP.NET: A programming framework. Compiled and executed. Designed for use on Windows.
PHP: A scripting language. Interpreted mode of execution. Platform independent.');
INSERT INTO app.theory (id, `index`, comment) VALUES (37, '15. What are sessions and cookies in PHP?', 'Sessions are global variables that are stored on the server in the architecture. Every single session is tagged with a unique server ID that is later used to work with the storage and retrieval of values.

Cookies are entities used to identify unique users in the architecture. It is a small file that the server plants into the client system. This is done to get useful information from the client for the development of various aspects of the server.');
INSERT INTO app.theory (id, `index`, comment) VALUES (38, '1. Is typecasting supported in PHP?', 'Yes, typecasting is supported by PHP and can be done very easily. Following are the types that can be cast in PHP:

(int), (integer): Cast to integer,
(bool), (boolean): Cast to boolean,
(float), (double), (real): Cast to float,
(string): Cast to string,
(array): Cast to array,
(object): Cast to object.');
INSERT INTO app.theory (id, `index`, comment) VALUES (39, '2. Can a form be submitted in PHP without making use of a submit button?', 'Yes, a form can be submitted without the explicit use of a button. This is done by making use of the JavaScript submit() function easily.');
INSERT INTO app.theory (id, `index`, comment) VALUES (40, '3. Does PHP support variable length argument functions?', 'Yes, PHP supports the use of variable length argument functions. This simply means that you can pass any number of arguments to a function. The syntax simply involves using three dots before the argument name as shown in the following example:

&lt;?php
function add(...$num) {
$sum = 0;
foreach ($num as $n) {
$sum += $n;
}
return $sum;
}
echo add(5, 6, 7, 8);
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (41, '4. What is the use of session_start() and session_destroy() functions?', 'In PHP, the session_start() function is used to start a new session. However, it can also resume an existing session if it is stopped. In this case, the return will be the current session if resumed.

Syntax:

session_start();

The session_destroy() function is mostly used to destroy all of the session variables as shown below:

&lt;?php
session_start();
session_destroy();
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (42, '5. How can you open a file in PHP?', 'PHP supports file operations by providing users with a plethora of file-related functions.

In the case of opening a file, the fopen() function is used. This function can open a file or a URL as per requirement. It takes two arguments: $filename and $mode.');
INSERT INTO app.theory (id, `index`, comment) VALUES (43, '6. What are the different types of PHP errors?', 'There are three main types of errors in PHP. They are as follows:

Notice: A notice is a non-critical error that is not displayed to the user.
Warning: A warning is an error that is displayed to the user while the script is running.
Fatal error: This is the most critical type of error. A fatal error will cause immediate termination of the script.');
INSERT INTO app.theory (id, `index`, comment) VALUES (44, '7. How can you get the IP address of a client in PHP?', 'The IP address of a client, who is connected, can be obtained easily in PHP by making use of the following syntax:

$_SERVER[&quot;REMOTE_ADDR&quot;];');
INSERT INTO app.theory (id, `index`, comment) VALUES (45, '8. What is the use of $message and $$message in PHP?', 'Both $message and $$message are variables in PHP. The difference lies in the name. While $message is a variable with a fixed name, $$message is a variable with a name that is actually stored in $message.

Consider the following example:

If $message consists of &lsquo;var&rsquo;, then $$message is nothing but &lsquo;$var&rsquo;.');
INSERT INTO app.theory (id, `index`, comment) VALUES (46, '9. Differentiate between GET and POST methods in PHP.', 'GET Method: The GET method can only send a maximum of 1024 characters simultaneously. GET does not support sending binary data. QUERY_STRING env variable is used to access the data that is sent. The $_GET associative array is used to access the sent information.
POST Method: There is no restriction on the data size. POST supports binary data as well as ASCII. The HTTP protocol and the header are used to push the data. The $_POST associative array is used to access the sent information here.');
INSERT INTO app.theory (id, `index`, comment) VALUES (47, '10. What is the use of lambda functions in PHP?', 'Being an anonymous function, the lambda function is used to first store data into a variable and then to pass it as arguments for the usage in other methods or functions.

Consider the following example:

$input = array(2, 5, 10);
$output = array_filter($input, function ($x) { return $x &gt; 2; });
The lambda function definition here:

function ($x) { return $x &gt; 2; });
This is used further to store data into a variable, and then you can use it when required without the requirement of defining it again.');
INSERT INTO app.theory (id, `index`, comment) VALUES (48, '11. Differentiate between compile-time exception and runtime exception in PHP.', 'As the name suggests, if there is an occurrence of any sort of exception while the script is being compiled, it is called a compile-time exception. The FileNotFoundException is a good example of a compile-time exception.

An exception that interrupts the script while running is called a runtime exception. The ArrayIndexOutOfBoundException is an example of a runtime exception.');
INSERT INTO app.theory (id, `index`, comment) VALUES (49, '12. What is the meaning of type hinting in PHP?', 'Type hinting is used in PHP when there is a requirement to explicitly define the data type of an argument when passing it through a function.

When this function is first called, PHP will run a quick check to analyze the presence of all the data types that are specified. If it is different, then the runtime will stop as an exception will be raised.');
INSERT INTO app.theory (id, `index`, comment) VALUES (50, '13. How is a URL connected to PHP?', 'Any URL can be connected to PHP easily by making use of the library called cURL. This comes as a default library with the standard installation of PHP.

The term &lsquo;cURL&rsquo; stands for client-side URL, allowing users to connect to a URL and pick up information from that page to display.');
INSERT INTO app.theory (id, `index`, comment) VALUES (51, '14. What are the steps to create a new database using MySQL and PHP?', 'There are four basic steps that are used to create a new MySQL database in PHP. They are as follows:

First, a connection is established to the MySQL server using the PHP script.
Second, the connection is validated. If the connection is successful, then you can write a sample query to verify.
Queries that create the database are input and later stored into a string variable.
Then, the created queries are executed one after the other.');
INSERT INTO app.theory (id, `index`, comment) VALUES (52, '15. How does string concatenation work in PHP?', 'String concatenation is done easily in PHP by making use of the dot(.) operator. Consider the following example:

&lt;?php $string1=&quot;Welcome&quot;; $string2=&quot;to Intellipaat&quot;; echo $string1 . &quot; &quot; . $string2; ?&gt;
Output: Welcome to Intellipaat

');
INSERT INTO app.theory (id, `index`, comment) VALUES (53, '16. Do you have any certification to boost your candidature for this PHP Developer role?', 'With this question, the interviewer is trying to assess if you have any exposure to real-time projects and hands-on experience. This is usually provided by a good certification program, and this gives an impression to the interviewer that you are serious about the career path you are aspiring for. If you do have any relevant experience, make sure to explain about what you learned and implemented during the certification course.');
INSERT INTO app.theory (id, `index`, comment) VALUES (54, '17. Compare PHP and Java.', 'Criteria: Deployment area, Language type, Providing a rich set of APIs.
PHP: Server-side scripting, Dynamically typed, No.
Java: General-purpose programming, Statically typed, Yes.');
INSERT INTO app.theory (id, `index`, comment) VALUES (55, '18. How can we encrypt a password using PHP?', 'The crypt () function is used to create one-way encryption. It takes one input string and one optional parameter. The function is defined as:

crypt (input_string, salt)
where input_string consists of the string that has to be encrypted and salt is an optional parameter. PHP uses DES for encryption.');
INSERT INTO app.theory (id, `index`, comment) VALUES (56, '19. Explain how to submit a form without a submit button.', 'A form can be posted or submitted without the button in the following ways:

On the OnClick event of a label in the form, a JavaScript function can be called to submit the form.
Example:
document.form_name.submit()
Using a Hyperlink: On clicking the link, a JavaScript function can be called.
Example:

Q5 php IQA code
A form can be submitted in the following ways as well without using the submit button:
Submitting a form by clicking a link
Submitting a form by selecting an option from the drop-down box with the invocation of an onChange event
Using JavaScript:
document.form.submit();
Using header(&ldquo;location:page.php&rdquo;);');
INSERT INTO app.theory (id, `index`, comment) VALUES (57, '20. How can we increase the execution time of a PHP script?', 'The default time allowed for a PHP script to execute is 30 seconds mentioned in the php.ini file. The function used is set_time_limit(int sec). If the value passed is &lsquo;0&rsquo;, it takes unlimited time. It should be noted that if the default timer is set to 30 seconds and 20 seconds is specified in set_time_limit(), the script will run for 45 seconds.
This time can be increased by modifying max_execution_time in seconds. The time must be changed keeping the environment of the server. This is because modifying the execution time will affect all the sites hosted by the server.
The script execution time can be increased by:
Using the sleep() function in the PHP script
Using the set_time_limit() function
The default limit is 30 seconds. The time limit can be set to zero to impose no time limit');
INSERT INTO app.theory (id, `index`, comment) VALUES (58, '21. What is Zend Engine?', 'Zend Engine is used internally by PHP as a compiler and runtime engine. PHP Scripts are loaded into memory and compiled into Zend OPCodes.

These OPCodes are executed and the HTML generated is sent to the client.

The Zend Engine provides memory and resource management and other standard services for the PHP language. Its performance, reliability, and extensibility have played a significant role in PHP&rsquo;s increasing popularity.');
INSERT INTO app.theory (id, `index`, comment) VALUES (59, '22. What are the new features introduced in PHP7?', 'Zend Engine 3 performance improvements and 64-bit integer support on Windows
Uniform variable syntax
AST-based compilation process
Added Closure::call()
Bitwise shift consistency across platforms
(Null coalesce) operator
Unicode codepoint escape syntax
Return type declarations
Scalar type (integer, float, string, and Boolean) declarationsv');
INSERT INTO app.theory (id, `index`, comment) VALUES (60, '23. What is htaccess? Why do we use it and where?', 'The .htaccess files are configuration files of Apache Server that provide a way to make configuration changes on a per-directory basis. A file, containing one or more configuration directives, is placed in a particular document directory; the directives apply to that directory and all subdirectories thereof.

These .htaccess files are used to change the functionality and features of the Apache web server.

For instance:

The .htaccess file is used for URL rewrite.
It is used to make the site password-protected.
It can restrict some IP addresses so that on these restricted IP addresses, the site will not open.
');


create table user
(
    id       int unsigned auto_increment
        primary key,
    email    varchar(191) null,
    password varchar(191) null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.user (id, email, password) VALUES (1, 'test@example.com', '$2y$10$K0uEsXMvya1Rw8qNaKEMaO.pwvdP9jVCkwrihvi5yStNsI3eJxaSO');
