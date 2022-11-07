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

INSERT INTO app.practice (id, `index`, comment) VALUES (1, 'INDEX --- 1', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (2, 'JS basic --- 2', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (3, 'JS number --- 3', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (4, 'JS string --- 4', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (5, 'JS function --- 5', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (6, 'JS array --- 6', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (7, 'JS object --- 7', '.');
INSERT INTO app.practice (id, `index`, comment) VALUES (8, '1) Переменные', '// Переменные это как коробка ты туда помешаешь что хочешь.
// Раньше использовали var но сейчас его зпменили на let
var name = &#039;Vladilen&#039;;
//Это уже устарело, переходим на новый уровень.
let age = 26;   //  Используем let для назначение переменной
const lastName = &#039;Minit&#039;;  // это коннстанта она неименная, ее поменять нельзя
console.log(name); // вывод в консоль
console.log(x = 5,y = 5, z = x + y, &#039;Ответ &#039; + z);  // В консоле можно записавать все через запятую что бы оно выводилось
// пишем какоето выражение и что бы вывести в консол дальше пишем .log и нажимаем на Tab
// x + y.log  дальше нажимаем на Tab и вот что получится
console.log(x + y);


// 2 Мутирование
// console.log(&#039;Имя человека: &#039; + name + &#039;, а возраст: &#039; + age); // все перевелось в строку. Выдает в консоле
// alert(&#039;Эта функция работает только в броузерах&#039;); // Вывод сообшение
// prompt(&#039;Ведите фамилию&#039;); // выдает окошко для вода и выбор действий &quot;ОК&quot; или &quot;ОТМЕНА&quot;

// const lastName1 = prompt(&#039;Ведите фамилию&#039;);  // Выводит табличку на экран и что то надо вести
// const firstName = prompt(&#039;Ведите имя&#039;);      // потом все что вели вложится в переменную
// alert(firstName + &#039; &#039; + lastName1);  //  выводят сообшение на экран в нем два этих слова соединяются с помощю конконцинацией');
INSERT INTO app.practice (id, `index`, comment) VALUES (9, '2) Мутирование', '// console.log(&#039;Имя человека: &#039; + name + &#039;, а возраст: &#039; + age); // все перевелось в строку. Выдает в консоле
// alert(&#039;Эта функция работает только в броузерах&#039;); // Вывод сообшение
// prompt(&#039;Ведите фамилию&#039;); // выдает окошко для вода и выбор действий &quot;ОК&quot; или &quot;ОТМЕНА&quot;

// const lastName1 = prompt(&#039;Ведите фамилию&#039;);  // Выводит табличку на экран и что то надо вести
// const firstName = prompt(&#039;Ведите имя&#039;);      // потом все что вели вложится в переменную
// alert(firstName + &#039; &#039; + lastName1);  //  выводят сообшение на экран в нем два этих слова соединяются с помощю конконцинацией');
INSERT INTO app.practice (id, `index`, comment) VALUES (10, '3) Операторы', 'const currentYear = 2021;
const birthYear = 1989;
const age4 = currentYear - birthYear;
console.log(age4);

const a = 10;
const b = 5;
let Year = 2021;

console.log(a + b);
console.log(a - b);
console.log(a * b);
console.log(a / b);
console.log(5 % 2 ); // 1, остаток от деления 5 на 2
console.log(2 ** 2); // 4  (2 умножено на себя 2 раза) возведение в степень
// Инкремент ++ увеличивает переменную на 1:
console.log(Year++);
console.log(Year);
// Декремент -- уменьшает переменную на 1:
console.log(Year--);
console.log(Year);
// Но если мы поставим обратно то сначало он сделает арихметические действие потом вывод на экран
console.log(Year); // ответ выведит 2021
console.log(--Year); // ответ выведит 2020
console.log(--Year); // ответ выведит 2019
// так же самое можно записать сокрашенные опираторов
let c = 10;
let z = 2;
// c = c + z;
// c = c - z;
// c = c * z;
// c = c / z;
c += z;
c -= z;
c *= z;
c /= z;
console.log(c);');
INSERT INTO app.practice (id, `index`, comment) VALUES (11, '4) Есть 8 основных тип данных в js, Первые три это основные, далее второстеменные', 'let name1 = &#039;Vasa&#039;;  // string
let age1 = 20;  // number
const isProgrammer = true; // boolean
const bigInt = 1234567890123456789012345678901234567890n; // В JavaScript тип &laquo;number&raquo; не может содержать числа больше, чем (253-1) (т. е. 9007199254740991), или меньше, чем -(253-1) для отрицательных чисел.
let age2 = null; // В JavaScript null не является &laquo;ссылкой на несуществующий объект&raquo; или &laquo;нулевым указателем&raquo;, это пусто, нечего нет итд
let age3 = undefined; // Оно означает, что &laquo;значение не было присвоено&raquo;.
//object для более сложных структур данных.
// symbol для уникальных идентификаторов.
console.log(typeof age1);  // Узнать тип данных');
INSERT INTO app.practice (id, `index`, comment) VALUES (12, '5) Приоритеты операторов', '// https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Operators/Operator_Precedence
//Есть таблици и смотрим что первее будет то и будет первым вышитыватся
let x = 10 + 5 &gt;= 14;
console.log(x); // выдаст ответ true
// операторы сравнение  &gt; &lt; &gt;= &lt;= == === != !==
//      больше, меньше, больше или равно, меньше или равно, равно, строгое равенство , не равно , строгое неравенство
// 6) Условные операторы
const courseStatus = &#039;pending&#039;;

if (courseStatus === &#039;ready&#039;) {
    console.log(&#039;coure redy and you can learn&#039;);
} else if (courseStatus === &#039;pending&#039;) {
    console.log(&#039;course is not ready&#039;);
} else {
    console.log(&#039;coure not completed&#039;);
}

// Если нам нужен тру или фолс то тогда пишем такой вариант работы
const isReady = true;
if (isReady) {
    console.log(&#039;all ok&#039;);
} else {
    console.log(&#039;not ready&#039;);
}
// эту запись можно сократить в одну строку использовая тернальные операторы !!!
isReady ? console.log(&#039;all ok&#039;) : console.log(&#039;not ready&#039;);

// 7) Булевая логика


// Следующий код демонстрирует примеры использования оператора &amp;&amp; (логическое И).
//
// var a1 =  true &amp;&amp; true;     // t &amp;&amp; t возвращает true
// var a2 =  true &amp;&amp; false;    // t &amp;&amp; f возвращает false
// var a3 = false &amp;&amp; true;     // f &amp;&amp; t возвращает false
// var a4 = false &amp;&amp; (3 == 4); // f &amp;&amp; f возвращает false
// var a5 = &quot;Cat&quot; &amp;&amp; &quot;Dog&quot;;    // t &amp;&amp; t возвращает Dog
// var a6 = false &amp;&amp; &quot;Cat&quot;;    // f &amp;&amp; t возвращает false
// var a7 = &quot;Cat&quot; &amp;&amp; false;    // t &amp;&amp; f возвращает false
// Copy to Clipboard
// Следующий код демонстрирует примеры использования оператора || (логическое ИЛИ).
//
// var o1 =  true || true;     // t || t возвращает true
// var o2 = false || true;     // f || t возвращает true
// var o3 =  true || false;    // t || f возвращает true
// var o4 = false || (3 == 4); // f || f возвращает false
// var o5 = &quot;Cat&quot; || &quot;Dog&quot;;    // t || t возвращает Cat
// var o6 = false || &quot;Cat&quot;;    // f || t возвращает Cat
// var o7 = &quot;Cat&quot; || false;    // t || f возвращает Cat
// Copy to Clipboard
// Следующий код демонстрирует примеры использования оператора ! (логическое НЕ).
//
// var n1 = !true;  // !t возвращает false
// var n2 = !false; // !f возвращает true
// var n3 = !&quot;Cat&quot;; // !t возвращает false');
INSERT INTO app.practice (id, `index`, comment) VALUES (13, '8) функции', 'function calculateAge(year) {
    return 2020- year;
}
const myAge = calculateAge(1993);
console.log(myAge);
// можно записать все в одну строку
console.log(calculateAge(1989));
// Так же самое мы можем писать функцию в функции
function logInfoAbout(name, year) {
    const age = calculateAge(year);
    if (age &gt; 0) {
        console.log(&#039;Man name is &#039; + name + &#039; and his age &#039; + age);
    } else {
        console.log(&#039;It\\&#039;s fuechers man&#039; );
    }

}
// Так вызываем функцию
logInfoAbout(&#039;Pasha&#039;, 1989);
logInfoAbout(&#039;Toma&#039;, 1987);
logInfoAbout(&#039;Toma&#039;, 2022);

//Понятие что такое методы и функции мы можем расмотреть в двнном примере
// Function
function addFunction() {
    //...
}
// Method
cars.push();');
INSERT INTO app.practice (id, `index`, comment) VALUES (14, '9) Массивы', '// Стандартная запись
const cars = [&#039;mazda&#039;, &#039;mersedes&#039;, &#039;ford&#039;];
// Проверить длину
console.log(cars.length);
// Вызов масива в консоль
console.log(cars[0]);
console.log(cars[1]);
console.log(cars[2]);
// переназначить масив
cars[0] = &#039;Porshe&#039;;
// добавить масив мататически
cars[3] = &#039;Mazda&#039;;
//добавить динамически
cars[cars.length] = &#039;fiat&#039;;
console.log(cars);');
INSERT INTO app.practice (id, `index`, comment) VALUES (15, '10) Циклы', '//у нас есть цикл и мы будем его переберать
const cars1 = [&#039;mazda&#039;, &#039;mersedes&#039;, &#039;ford&#039;];
// ставим начальное число, далее проверяем i больше длины масива, если нет то увеличиваем i на 1
for (let i = 0; i &lt; cars1.length; i++) {
    // Затем это все помешаем в переменную car и выводим в консоль и так повторяем до тех пор пока условия невыполнится
    const car = cars1[i];
    console.log(car);
}

// Это все можно записать более сокрашенном цикле
for (let car of cars1) {
    console.log(car);
}');
INSERT INTO app.practice (id, `index`, comment) VALUES (16, '11) Обьекты', 'const person = {
    firstName: &#039;Vlad&#039;,
    lastName: &#039;Mini&#039;,
    year: 1993,
    languages: [&#039;ru&#039;, &#039;en&#039;, &#039;de&#039;],
    hasWife: false,
    greet: function () {
        console.log(&#039;greet from person&#039;);
    }
}
// Как обрашатся к обьектам
person.greet();
//далее что бы видно было все то смотрим через консоль. Стати консоль это тоже обьект
console.log(person.firstName);
console.log(person[&#039;lastName&#039;]);
// мы можем в переменную вложить ключь и затем вызвать его
const key = &#039;year&#039;;
console.log(person[key]);
//Менять значение
person.hasWife = true;
//Добавить ключ
person.isProgrammer = true;
// Посмотреть все слова в обьекты
console.log(person);');
INSERT INTO app.practice (id, `index`, comment) VALUES (17, '1)  Числа number', 'const num = 42; // integer
const float = 42.42; // float
const pow = 10e3;  // 10000
console.log(Number.MAX_SAFE_INTEGER); // 9007199254740991  это максимальное число в integer
console.log(Math.pow(2,53)-1); // ответ будет такойже что бы достить этого числа надо возвести в степень и отнять 1
console.log(Number.MIN_SAFE_INTEGER);  // -9007199254740991
console.log(Number.MAX_VALUE);  // 1.7976931348623157e+308
console.log(Number.MIN_VALUE);  // 5e-324
console.log(Number.POSITIVE_INFINITY);  // ЧИСЛО БЕСКОНЕЧНОСТИ Infinity
console.log(Number.NEGATIVE_INFINITY);  // ЧИСЛО БЕСКОНЕЧНОСТИ -Infinity
console.log(2/0 , 1/0); // в джава можно делить и мы получим Infinity во всех случиях
console.log(Number.NaN); // Not A Number , хотя в консоле выдает что это число  NaN
console.log(typeof NaN); // number
console.log(2 / undefined);  // получим NaN
const weird = 2 / undefined;
console.log(Number.isNaN(weird));  // является ли это число  NaN получим true
console.log(Number.isNaN(42));  // false
console.log(Number.isFinite(Infinity));  // конечна ли бесконечность и мы получим false
console.log(Number.isFinite(42));  // конечна ли число 42 и мы получим true

// пеображение строку в число есть несколько методов перебразить строку в число.
const stringInt = &#039;40&#039;;   // Int - целое число
const stringFloat = &#039;40.42&#039;;   // Float - число с плавующей строчкой
console.log(stringInt + 2);  //  мы получим 402 и это будет строка (string)
console.log(Number.parseInt(stringInt) + 2);  //  это шоб незапутатся в какой функции это пренадлежит
console.log(parseInt(stringInt) + 2);  // обычно это используют часто
console.log(Number(stringInt) + 2); //// Дальше ответ будет 42
console.log(+stringInt + 2);

console.log(Number.parseFloat(stringFloat) + 2); // это функция для число с плавующей точкой
console.log(parseFloat(stringFloat) + 2);  // Дальше ответ будет 42,42
console.log(Number(stringFloat) + 2);
console.log(+stringFloat + 2);

//В js есть проблемы как считать числа мы воспользуемся функцией которое просто убирает цифры после запитой
console.log(0.4 + 0.2); //  0.6000000000000001
console.log(+(0.4 + 0.2).toFixed(4)); // этим методом убрали цифры после запятой но получилось в итоге строка
// и мы поставели плючик что бы перевести все это в число
console.log(parseFloat((0.4 + 0.2).toFixed(4))); // либо можем это все обернуть в функцию  parseFloat');
INSERT INTO app.practice (id, `index`, comment) VALUES (18, '2) BigInt', 'его вели что бы мы могли работать  с большими цифрами больше чем Number.MAX_SAFE_INTEGER это тип данных
console.log(9007199254740991n + 12351513565465465465454n);  // любые вычесление могут только работать BigInt+BigInt
console.log(-12351513565465465465454n);
//console.log(1235151356546546546545.31224n);  //является ошибкой, потому что это только для интовых

//console.log(10n - 4); // error будет ошибкой так как разные типы данных
console.log(parseInt(10n) - 4); // преобразование биг инт в число
console.log(10n - BigInt(4)); // преобразование число в биг инт
console.log(5n / 2n); // мы получим 2n так как это интовое значение');
INSERT INTO app.practice (id, `index`, comment) VALUES (19, '3) Math', '// Объект Math является встроенным объектом, хранящим в своих свойствах и методах различные математические константы и
// функции. Объект Math не является функциональным объектом. Math не работает с числами типа BigInt .
// Все функции тут
// https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Math
console.log(Math.E); // экспанента 2.718281828459045
console.log(Math.PI);  // число пи 3.141592653589793

console.log(Math.sqrt(25));  // возрашает кваадратный корень ответ 5
console.log(Math.pow(5,3));  // возведение в степень 125
console.log(Math.abs(-42));  //переводит в положительное число 42
console.log(Math.max(42, 12, 53, 10, 222));  //какое максимальное число покажет 222
console.log(Math.min(42, 12, 53, 10, 222));  //какое минимальное число покажет 10
console.log(Math.floor(4.9));  //  округляет до ближайшего меньшего целого =  4
console.log(Math.ceil(4.9));  //   округляет до ближайшего большого целого = 5
console.log(Math.round(4.4));  //  возвращает число, округлённое к ближайшему целому =  4
console.log(Math.trunc(4.9));  //  возвращает целую часть числа путём удаления всех дробных знаков = 4
console.log(Math.sin(4));  //  Так же тут есть триконометрические функции синус, косинус, тангенс и т.д.
console.log(Math.random());  // выводит любое рандомное число = 0.5403517008206085

// маленький пример с рандомным числом
// Создаем функцию который входит в себя 2 числа мин и макс
function getRandomBetween(min, max) {
    // В переменную вкладываем мин + рандом (0,25468) умножинаю на сумму числе (макс +1 - мин)
    let rand = min + Math.random() * (max + 1 - min);
    return Math.floor(rand);
}
console.log(getRandomBetween(10, 100));  // вывод в консоль всегда разные числа');
INSERT INTO app.practice (id, `index`, comment) VALUES (20, 'строки string', 'const name = &#039;Паша&#039;;
const age = 32;
function getAge() {
    return age;
}
// Между одинарных и двойных скобок нет разници поэтому ставим одинарыне.
const output1 = &#039;Привет, меня завут &#039; + name + &#039; и мой возраст &#039; + age + &#039; лет.&#039;;
console.log(output1);
// Если в тексте много разных переменных мы можем записывать их без конценации а с помощю такой формы кавычка на букве ё
const output2 = `Привет, меня зовут ${name} и мой возрвст ${getAge()} лет и поэтому у меня ${age &lt; 18 ? &#039;нету&#039; : &#039;есть&#039;} права`;
// тут можно записывать: простые переменные, функцие и тернальные операторы
// скорашаная форма логике : возраст меньше 18 то будет нету если больше есть
console.log(output2);
// и так зачем это нам надо, а что бы в html вставить теги даже если с новой строки это все сохранается
const output3 = `
  &lt;div&gt;This is div&lt;/div&gt;
  &lt;p&gt;this is o&lt;/p&gt;
`;
console.log(output3);

const test = &#039;Тест слово для практике&#039;;

console.log(test.length);  //  узнать длину симболов (пробел тоже симбол
console.log(test.toUpperCase());  // Все с большой буквы
console.log(test.toLowerCase());  // Все с маленькой буквы
console.log(test.charAt(0));  // получить симбол ( отсчет начинается с &quot;0&quot;)
console.log(test.indexOf(&#039;слов&#039;));  // ишит те симболы которые ты укозал в скобках. Выдает число откуда он начинается, если выйдет -1 то такого симбола не сешествует
console.log(test.startsWith(&#039;Тест&#039;));  // стартует ли строка с заданым значением true/false
console.log(test.endsWith(&#039;Тест&#039;));  // заканчивается ли строка с заданными значениями  true/false
console.log(test.repeat(3));  //  Повторять строку n количество раз
const string = &#039;    password    &#039;;
console.log(string.trim());  //  убрать пробелы
console.log(string.trimLeft());  // убрать пробелы слева
console.log(string.trimRight());  //  убрать пробелы справа

function logPerson(s, name, age) {
    if (age &lt; 0) {
        age = &#039;Еше не радился&#039;;
    }
    return `${s[0]}${name}${s[1]}${age}${s[2]}`;
}

const personName = &#039;Паша&#039;;
const personName2 = &#039;Максим&#039;;
const personAge = 32;
const personAge2 = -10;

const out = logPerson `Имя: ${personName}, Возраст: ${personAge}!`;
const out2 = logPerson `Имя: ${personName2}, Возраст: ${personAge2}!`;
console.log(out);
console.log(out2);
');
INSERT INTO app.practice (id, `index`, comment) VALUES (21, '1) Функции', '// Два примера (Function Declaration (Объявление Функции))
function sayHi1() {
  // ...
}
// В первой нету точка с запятой а во второй есть (Function Expression (Функциональное Выражение))
let sayHi = function() {
  // ...
};
// Обьяснение
// Нет необходимости в ; в конце блоков кода и синтаксических конструкций, которые их используют, таких как if { ... },
// for { }, function f { } и т.д.
// Function Expression использует внутри себя инструкции присваивания let sayHi = ...; как значение. Это не блок кода,
// а выражение с присваиванием. Таким образом, точка с запятой не относится непосредственно к Function Expression, она
// лишь завершает инструкцию.

// В чем различия между 2 типами функций  Declaration  vs Expression. В том что в Declaration обрашение функции может
// быть и до и после нее. А в Expression обрашение к этой функции только после нее!!!
// Function Declaration
function greet(name) {
    console.log(&#039;Привет - &#039;, name);
}
// Function Expression
const  greet2 = function greet2 (name) {
    console.log(&#039;Привет 2 - &#039;, name);
};
greet(&quot;Луна&quot;);
greet2(&quot;Луна&quot;);

console.log(typeof greet); // Узнать что за тип переменой
console.dir(greet); // Узнать про функцию более подробно');
INSERT INTO app.practice (id, `index`, comment) VALUES (22, '2) Ананимные функции', '// let counter = 0;
// setInterval(function () {
//     console.log(++counter);
// },1000);
// но можно усовершенствовать нашу функцию

let counter = 0;
const interval = setInterval(function () {
    if (counter === 5 ) {
        clearInterval(interval);
    } else {
        console.log(++counter);
    }
    }, 10)
');
INSERT INTO app.practice (id, `index`, comment) VALUES (23, '3) Стрелочные функции', '// Это обычная функция и ме ее сейчас переделаем в стрелочную
function greet3(name) {
    console.log(&#039;Hi - &#039;, name);
}
// Это стрелочная функция
const arrow = (name) =&gt; {
    console.log(&#039;hi - &#039;, name);
}
// но ее можно сократить в одну строку
const arrow2 = name =&gt; console.log(&#039;hi - &#039;, name);

arrow(&#039;Pasha&#039;);
arrow2(&#039;Toma&#039;);
// стрелочная функция в возведение в степень
const pow2 = num =&gt; num ** 2; // создаем стрелочную функцию которая включает себя num и дальше решение что вот это мы возводим в степень
console.log(pow2(5));');
INSERT INTO app.practice (id, `index`, comment) VALUES (24, '4) Параметры по умолчанию', '// Усли мы создали функцию и в нее внесли параметры то когда на нее сылаясь вели не все параметры выходит NaN
// Что бы небыло такой ошибки можно можно вести заданые параметры. Если их не ведут то они будут стандартные.
const sum = (a = 40, b = a * 2) =&gt; a + b; // тут показано что а = 40 , b= точто будет в но умноженое на 2. а вообше это функция сложение
console.log(sum(41,5)); // видем ответ что мы внесли параметры и он сложил 2 числа
console.log(sum());  // видем ответ что будет если мы нечего не сложем

//  оператор rest обозначается как ...all Этот оператор нужен нам если мы хотим передать в функцию множество разных чисел
function sumAll(...all) {
    console.log(all);
}
sumAll(1, 2, 3, 4, 5);
// он записывает в масив
// и тут мы можем работать с этим как с пасивом.
// Доработаем эту функцию что бы узнать сумму всех элементов
function summAll (...all) {
    let result = 0;
    for (let num of all) {
        result += num;
    }
    return result;
}

const res = summAll(1, 2, 3, 4, 5, 6, 7);
console.log(res);

// Тут наглядно видно что все обернута в масив и можем мы с ним работать дальше
function sumAll3(...all) {
    console.log(all);
}
sumAll3(&#039;Вася&#039;, &#039;Петя&#039;, &#039;Вова&#039;, &#039;Антон&#039;, &#039;Палец&#039;);');
INSERT INTO app.practice (id, `index`, comment) VALUES (25, '5) Замыкание', '// Замыкание это с одной функции возрашаем другую функцию и дальше идет какаета работа
// Больше подходит на приватных переменных.
 function creteMember(name) {     // Создаем функцию и принимаем параметр name
     return function (lastName) {   // возрашаем другую функцию которая принимает параметр lastName
         console.log(name + lastName);  // эта функция выводит в консоль и соеденяет себя  name + lastName
     }
 }

 const logWithLastName = creteMember(&#039;Pasha&#039;);  // вызываем функцию и указываем имя
console.log(logWithLastName(&#039; Mini&#039;));  // и дальше мы можем вызвать в консоле второй слово
console.log(logWithLastName(&#039; Lessy&#039;));');
INSERT INTO app.practice (id, `index`, comment) VALUES (26, 'Масивы', 'const cars = [&#039;Мазда&#039;, &#039;Форд&#039;, &#039;БМВ&#039;, &#039;Мерседес&#039;]; // В масивах мы можем хранить все string
const fib = [1, 1, 2, 3, 5, 12];  // number
const allDamp = [123, &#039;42&#039;, true, {}];  // и даже логику булиан и т.д.
// Сложный масив
const people = [
    {name: &#039;Vladelen&#039;, budget: 4200},
    {name: &#039;Elena&#039;, budget: 3500},
    {name: &#039;Victoria&#039;, budget: 1700}
]

cars.push(&#039;Руно&#039;);  // добовляет в конце масива элимент
cars.unshift(&#039;Volga&#039;);  // Добовлаяет в начало масива элемент
cars.shift(); // Удаление первого элемента с масива и возрашает его
const firstItem = cars.shift();  // мы это видем
console.log(firstItem);
const lastItems = cars.pop(); // Удоляет в конце элемента масива и возрашает его обратно
console.log(lastItems);
console.log(cars);
console.log(cars.reverse()); // Переворачивает и его мутирует

// Задачка 1
// Есть текс, сделать им зеркальное отражение
const text1 = &#039;Привет, мы изучаем JavaScript&#039;;
const reverseText = text1.split(&#039;&#039;).reverse().join(&#039;&#039;);
// .split - разбитие текста на то что в скаобочках и обертывает в масив, .reverse - разварачивает текст,
// .join - соединяет масив в строку в скобках чем соееденить
console.log(reverseText)

// продолжение работы с масивами

const cars1 = [&#039;Мазда&#039;, &#039;Форд&#039;, &#039;БМВ&#039;, &#039;Мерседес&#039;];

const index = cars1.indexOf(&#039;БМВ&#039;); // Поиск по масиву, выдаст 2. Он работает с примитивными даннами
cars1[index] = &#039;Porshe&#039;;  // Тут стати кокрас можем применить это программно
console.log(cars1);

// Поиск по многомерному масиву , обрашаемся к callback функции масива person
const index1 = people.findIndex(function (person) {
    // возрашаем что  person.budget будет строгое равнество на 3500
    return person.budget === 3500;
    });
// если мы посмотрим на index1 в консоле то увидем что нам выдаст 2 элемент и если мы положем его как норме то выдаст строку
console.log(people[index1]);

// Так же само мы можем это реализовать более проше используя метод .find
const person = people.find(function (person) {
    // возрашаем что  person.budget будет строгое равнество на 3500
    return person.budget === 3500;
});
console.log(person); // и мы получим результат вывода обьекта {name: &quot;Elena&quot;, budget: 3500}

// Так же самое мы можем получить этот результат через цикл for
let findedPerson
for (const person of people) {
    if (person.budget == 3500) {
        findedPerson = person;
    }
}
console.log(findedPerson);
// все работает
// А теперь мы можем это все упростить через строчную функцию
const person2 = people.find((person) =&gt; {
    return person.budget === 3500;
    })
console.log(person2);
// это вырожение мы можем написать более проше написать ее в одну строчку
const person3 = people.find(person =&gt; person.budget === 3500);
console.log(person3);

// Продолжение изучение массива
console.log(cars1.includes(&#039;Мазда&#039;));  // Проверяет если элемент в масиве true/false
// .map
// Метод map() создаёт новый массив с результатом вызова указанной функции для каждого элемента массива.
const upperCaseCars = cars1.map(car =&gt;{
    return car.toUpperCase();
})
console.log(upperCaseCars); // и мы получаем все с большой буквы
// оригенал не тронут
const pow2fib = fib.map(num =&gt; num ** 2);
console.log(pow2fib); // видем что все возведено во вторую степень
// метод фильрации берем масив и мы его отсеем вывести на экран все что больше 20
const filteredNumbers = pow2fib.filter(num =&gt; num &gt; 20);
console.log(pow2fib); // не тронутый масив  [1, 1, 4, 9, 25, 144]
console.log(filteredNumbers);  // получен результат  [25, 144]
');
INSERT INTO app.practice (id, `index`, comment) VALUES (27, 'Обьекты', '// Так выглядит структура и что можно туда засовывать в обьекте
const person = {
    name: &#039;Pasha&#039;,
    age: 32,
    isProgrammer: true,
    languages: [&#039;ru&#039;, &#039;en&#039;, &#039;uk&#039;],
    &#039;complex key&#039;: &#039;Complex Value&#039;,
    [&#039;key_&#039; + (1+3)]: &#039;Computed Key&#039;,
    greet() {
        console.log(&#039;greet from person&#039;)
    },
    info() {
        console.log(&#039;this: &#039;, this)
        console.info(&#039;Информация про человека по имени: &#039;, this.name)
    }
}

console.log(person);  // увидем как выглядит масив
// Какими спосабами можно обратится к обьекту
console.log(person.name);
const ageKey = &#039;age&#039;;
console.log(person[ageKey]);
console.log(person[&#039;complex key&#039;]);
person.greet();
// как добавить в обьект
person.age++;
person.languages.push(&#039;by&#039;)
console.log(person);
//удаление ключа
delete person[&#039;key_4&#039;];
console.log(person);


//Деструдеризация - Если мы одьект перемешаем в переменные вот так как внизу, то мы можем сократить запесь в одну строчку
// const name = person.name;
// const age = person.age;
// const languages = person.languages;
// console.log(name, age, languages);
// создав те же самые переменные записав один раз что бы неповторять код. А если нам надо записать переменую под другим именем то ставим
// равно и пишем название другой переменной
const {name, age: personAge, languages} = person;
console.log(name, personAge, languages);
// Иторация по ключам и обьекту
//цикл for in для обьектов опасен, так как может пройтись по Prototype и для этого надо построить логику
for (let key in person) {
    if (person.hasOwnProperty(key)) {
        console.log(&#039;key: &#039;, key);
        console.log(&#039;value: &#039;, person[key]);
    }
}

// есть другой вариант более современый
Object.keys(person).forEach((key) =&gt; {
    console.log(&#039;key: &#039;, key);
    console.log(&#039;value: &#039;, person[key])
})

// Contex
// Создадим мы еше одну переменную в обьекте, и мы хотим что бы мы обрашались к диномическому имени. Используя команду this
// пример
// info() {
//     console.info(&#039;Информация про человека по имени: &#039;, this.name)
// }

// Если мы обратимся к обьекту this то увидем вот это
person.info();
//');

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

INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (1, 1, 1);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (2, 1, 2);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (3, 1, 3);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (4, 1, 4);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (5, 1, 5);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (6, 1, 6);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (7, 1, 7);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (8, 8, 8);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (9, 8, 9);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (10, 8, 10);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (11, 8, 11);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (12, 8, 12);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (13, 8, 13);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (14, 8, 14);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (15, 8, 15);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (16, 8, 16);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (17, 9, 17);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (18, 9, 18);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (19, 9, 19);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (20, 10, 20);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (21, 11, 21);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (22, 11, 22);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (23, 11, 23);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (24, 11, 24);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (25, 11, 25);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (26, 12, 26);
INSERT INTO app.practice_tag (id, tag_id, practice_id) VALUES (27, 13, 27);

create table tag
(
    id     int unsigned auto_increment
        primary key,
    themes varchar(191) null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.tag (id, themes) VALUES (1, 'Содержание');
INSERT INTO app.tag (id, themes) VALUES (2, 'PHP basic');
INSERT INTO app.tag (id, themes) VALUES (3, 'PHP string');
INSERT INTO app.tag (id, themes) VALUES (4, 'PHP cycles');
INSERT INTO app.tag (id, themes) VALUES (5, 'PHP array');
INSERT INTO app.tag (id, themes) VALUES (6, 'PHP functions');
INSERT INTO app.tag (id, themes) VALUES (7, 'PHP Cookie &amp; Сессии');
INSERT INTO app.tag (id, themes) VALUES (8, 'JS basic');
INSERT INTO app.tag (id, themes) VALUES (9, 'JS number');
INSERT INTO app.tag (id, themes) VALUES (10, 'JS string');
INSERT INTO app.tag (id, themes) VALUES (11, 'JS function');
INSERT INTO app.tag (id, themes) VALUES (12, 'JS array');
INSERT INTO app.tag (id, themes) VALUES (13, 'JS object');

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
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (5, 1, 5);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (6, 1, 6);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (7, 1, 7);
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
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (20, 3, 20);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (21, 3, 21);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (22, 4, 22);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (23, 4, 23);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (24, 5, 24);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (25, 5, 25);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (26, 5, 26);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (27, 5, 27);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (28, 5, 28);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (29, 6, 29);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (30, 6, 30);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (31, 6, 31);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (32, 6, 32);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (33, 6, 33);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (34, 6, 34);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (35, 6, 35);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (36, 6, 36);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (37, 6, 37);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (38, 6, 38);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (39, 6, 39);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (40, 7, 40);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (41, 7, 41);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (42, 7, 42);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (43, 7, 43);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (44, 7, 44);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (45, 7, 45);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (46, 7, 46);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (47, 7, 47);
INSERT INTO app.tag_theory (id, tag_id, theory_id) VALUES (48, 7, 48);

create table theory
(
    id      int unsigned auto_increment
        primary key,
    `index` varchar(191) null,
    comment text         null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.theory (id, `index`, comment) VALUES (1, 'INDEX --- 1', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (2, 'PHP basic --- 2', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (3, 'PHP string --- 3', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (4, 'PHP cycles --- 4', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (5, 'PHP array ---5', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (6, 'PHP functions ---6', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (7, 'PHP Cookie &amp; Сессии ---7', '.');
INSERT INTO app.theory (id, `index`, comment) VALUES (8, '1. Что такое HTML и CSS? Для чего они нужны?  ', 'HTML -  расшифровывается как HyperText Markup Language (язык гипертекстовой разметки). Это язык разметки документов во Всемирной паутине (World Wide Web, WWW). HTML &mdash; это стандартизированный язык, позволяющий составлять форматированный текст. Браузер интерпретирует его и отображает на экране элементы веб-страниц.
CSS -  (англ. Cascading Style Sheets) это каскадные таблицы стилей. Этот язык разметки определяет, как HTML-элементы веб-сайта должны отображаться на интерфейсе страницы.
HTML применяется для разметки веб-страниц. Она нужна браузерам, которые преобразуют гипертекст и выводят на экран страницу в удобном для человека формате. А CSS описывает внешний вид HTML-элементов. То есть разработчики с помощью каскадных таблиц стилей определяют, как должен выглядеть тот или иной элемент на странице.');
INSERT INTO app.theory (id, `index`, comment) VALUES (9, '2.   Какие основные HTML теги входят в базисный шаблон?', '&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;ru&quot;&gt;
&lt;head&gt;
  &lt;meta charset=&quot;UTF-8&quot;&gt;
  &lt;title&gt;Моя первая страница&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;/body&gt;
&lt;/html&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (10, '3. 	 ЧТО ТАКОЕ  PHP?', 'PHP (Hypertext Preprocessor) - это скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений.');
INSERT INTO app.theory (id, `index`, comment) VALUES (11, '4.	 ЧТО ТАКОЕ PEAR В PHP?', 'PEAR - это фреймворк и репозиторий для многоразовых компонентов PHP . PEAR расшифровывается как PHP Extension and Application Repository . Он содержит все типы фрагментов и библиотек PHP-кода.
Он также предоставляет интерфейс командной строки для автоматической установки &laquo;пакетов&raquo;.');
INSERT INTO app.theory (id, `index`, comment) VALUES (12, '5.	  КТО ИЗВЕСТЕН КАК ОТЕЦ PHP?', 'Расмус Лердорф');
INSERT INTO app.theory (id, `index`, comment) VALUES (13, '6.	 КАК БЫЛО СТАРОЕ НАЗВАНИЕ PHP?', 'Старое название PHP было Personal Home Page.');
INSERT INTO app.theory (id, `index`, comment) VALUES (14, '7. 	 ОБЪЯСНИТЕ РАЗНИЦУ МЕЖДУ СТАТИЧЕСКИХ И ДИНАМИ-ЧЕСКИХ САЙТОВ?', 'В статических веб - сайтов , содержание не может быть изменен после выполнения сценария. Вы не можете ничего изменить на сайте. Это предопределено.
В динамических веб - сайтов , содержание сценария может быть изменен во время выполнения . Его содержимое обновляется каждый раз при посещении или перезагрузке пользователя. Google, Yahoo и любая поисковая система - это пример динамичного веб-сайта.');
INSERT INTO app.theory (id, `index`, comment) VALUES (15, '8.	 КАК НАЗЫВАЕТСЯ СКРИПТОВЫЙ ДВИЖОК В PHP?', 'Механизм сценариев, на котором работает PHP, называется Zend Engine 2 .');
INSERT INTO app.theory (id, `index`, comment) VALUES (16, '9.	 КАКИЕ ПОПУЛЯРНЫЕ СИСТЕМЫ УПРАВЛЕНИЯ КОНТЕНТОМ (CMS) В PHP?', '&bull;	WordPress - это бесплатная система управления контентом (CMS) с откры-тым исходным кодом, основанная на PHP и MySQL. Он включает в себя архитектуру плагинов и систему шаблонов. Он в основном связан с ведением блогов, но поддержи-вает другой вид веб-контента, содержащий более традиционные списки рассылки и фо-румы, медиа-дисплеи и интернет-магазины.
&bull;	Joomla - это бесплатная система управления контентом с открытым исходным кодом (CMS) для распространения веб-контента, созданная Open Source Matters, Inc. Она основана на структуре веб-приложений модель-представление-контроллер, которую можно использовать независимо от CMS. .
&bull;	Magento - это программа для электронной торговли с открытым исходным ко-дом, разработанная Varien Inc., ценная для онлайн-бизнеса. Он имеет гибкий измери-тельный дизайн и универсален с множеством альтернативных вариантов управления, полезных для клиентов. Magento использует этап электронной торговли, который пред-лагает организацию экстремального электронного бизнеса и обширную сеть поддержки.
&bull;	Drupal - это платформа CMS, разработанная на PHP и распространяемая под GNU (General Public License).');
INSERT INTO app.theory (id, `index`, comment) VALUES (17, '10.	 КАКИЕ ФРЕЙМВОРКИ НАИБОЛЕЕ ПОПУЛЯРНЫ В PHP?', '&bull;	Laravel
&bull;	CakePHP
&bull;	CodeIgniter
&bull;	Yii 2
&bull;	Symfony
&bull;	Zend Framework и т. Д.');
INSERT INTO app.theory (id, `index`, comment) VALUES (18, '11.  НА КАКОЙ ЯЗЫК ПРОГРАММИРОВАНИЯ ПОХОЖ PHP?', 'Синтаксис PHP позаимствован у Perl и C.');
INSERT INTO app.theory (id, `index`, comment) VALUES (19, '12.	 ПЕРЕЧИСЛИТЕ НЕКОТОРЫЕ ОСОБЕННОСТИ PHP7.', '&bull;	Объявления скалярных типов
&bull;	Объявления типа возврата
&bull;	Оператор объединения с нулевым значением (??)
&bull;	Оператор космического корабля   &ldquo;&lt;=&gt;&rdquo;  (spaceship)
&bull;	Постоянные массивы с использованием define ()
&bull;	Анонимные классы
&bull;	Closure :: call метод
&bull;	Объявление группового использования
&bull;	Выражения возврата генератора
&bull;	Делегирование генератора');
INSERT INTO app.theory (id, `index`, comment) VALUES (20, '1.	Есть ли разница между одинарными и двойными кавычками?', 'Переменные заключенные в двойные кавычки парсятся и их содержимое выводится, в то время как в одинарных кавычках просто отобразят название переменной как обычный текст.
Например:
$example = &#039;Unetway&#039;;
echo &quot;$example&quot;; // выведет Unetway
$example = &#039;Unetway&#039;;
echo &#039;$example&#039;; // выведет $example');
INSERT INTO app.theory (id, `index`, comment) VALUES (21, '2.	В чем различия между echo и print?', 'Оба оператора используются для вывода текста. echo() является конструкцией, которая может принимать несколько аргументов и выводить их на экран. print() не совсем функция и может принимать только 1 аргумент, а также писаться без скобок.
Например:
echo $param;
echo &#039;строка&#039;;
echo (&#039;строка 1&#039;, &#039;строка 2&#039;, &#039;строка N&#039;);
print(&#039;строка&#039;);
print &#039;строка&#039;;
Дана строка &quot;Hello world!&quot;. Как перевернуть строку?
Чтобы перевернуть строку, можно использовать функцию strrev()');
INSERT INTO app.theory (id, `index`, comment) VALUES (22, '1.	   Что такое циклы? Какие виды циклов вы знаете?', 'Цикл &mdash; это конструкция языка, которая позволяет выполнить блок кода больше одного раза.
PHP поддерживает три вида циклов:
&bull;	Цикл с предусловием (while);
&bull;	Цикл с постусловием (do-while);
&bull;	Цикл со счетчиком (for);
&bull;	Специальный цикл перебора массивов (foreach).');
INSERT INTO app.theory (id, `index`, comment) VALUES (23, '2.	В чем отличие цикла while от do while?', 'Тело цикла do-while выполнится хотя бы один раз, так как условие проверяется в конце цикла, в то время как в цикле while условие проходит проверку вначале.');
INSERT INTO app.theory (id, `index`, comment) VALUES (24, '1.	   Что такое массив? Какие виды массивов вы знаете, опишите их?', 'Массивы (arrays) - это упорядоченные наборы данных, представляющие собой список однотипных элементов.
Существует два типа массивов, различающиеся по способу идентификации элементов.
1. В массивах первого типа элемент определяется индексом в последовательности. Такие массивы называются простыми массивами.
2. Массивы второго типа имеют ассоциативную природу, и для обращения к элементам используются ключи, логически связанные со значениями. Такие массивы называют ассоциативными массивами.
Массивы могут быть как одномерными, так и многомерными.');
INSERT INTO app.theory (id, `index`, comment) VALUES (25, '2.	Как удалить переменную или элемент из массива?', 'Для удаления переменной или элемента из массива надо использовать функцию unset(). Например:
// удаляем одну переменную
unset($block);

// удаляем один элемент массива
unset($block[&#039;keks&#039;]);

// удаляем несколько переменных
unset($block1, $block2, $block);');
INSERT INTO app.theory (id, `index`, comment) VALUES (26, '3.	Дан массив [1,2,3,4,5,6,7]. Как перевернуть его и получить [7,6,5,4,3,2,1]?', 'Чтобы перевернуть массив, можно использовать функцию array_reverse()');
INSERT INTO app.theory (id, `index`, comment) VALUES (27, '4.	Как получить максимальное значение элемента массива[1,2,3,4,5,10,20,30,40,50,70,100, 10, 30, 50]?', 'Для получения максимального значения массива можно использовать функцию max().
$arr = [1,2,3,4,5,10,20,30,40,50,70,100, 10, 30, 50];
echo max($arr);
Либо сделать это через цикл:
$arr = [1,2,3,4,5,10,20,30,40,50,70,100, 10, 30, 50];
$max = $arr[0];
foreach ($arr as $row) {
if ($max &lt; $row) {
$max = $row;
}
echo $max;
}');
INSERT INTO app.theory (id, `index`, comment) VALUES (28, '5.	 Функции по работе с массивами', '&bull;	array &mdash; Создаёт массив
&bull;	arsort &mdash; Сортирует массив в порядке убывания и поддерживает ассоциацию индексов
&bull;	asort &mdash; Сортирует массив в порядке возрастания и поддерживает ассоциацию индексов
&bull;	compact &mdash; Создаёт массив, содержащий названия переменных и их значения
&bull;	count &mdash; Подсчитывает количество элементов массива или Countable объекте
&bull;	current &mdash; Возвращает текущий элемент массива
&bull;	each &mdash; Возвращает текущую пару ключ/значение из массива и смещает его указатель
&bull;	end &mdash; Устанавливает внутренний указатель массива на его последний элемент
&bull;	extract &mdash; Импортирует переменные из массива в текущую таблицу символов
&bull;	in_array &mdash; Проверяет, присутствует ли в массиве значение
&bull;	sort &mdash; Сортирует массив по возрастанию
&bull;	uasort &mdash; Сортирует массив, используя пользовательскую функцию для сравнения элементов с сохранением ключей
&bull;	array_change_key_case &mdash; Меняет регистр всех ключей в массиве
&bull;	array_chunk &mdash; Разбивает массив на части
&bull;	array_column &mdash; Возвращает массив из значений одного столбца входного массива
&bull;	array_combine &mdash; Создаёт новый массив, используя один массив в качестве ключей, а другой для его значений
&bull;	array_count_values &mdash; Подсчитывает количество всех значений массива
&bull;	array_diff_assoc &mdash; Вычисляет расхождение массивов с дополнительной проверкой индекса
&bull;	array_diff_key &mdash; Вычисляет расхождение массивов, сравнивая ключи
&bull;	array_diff_uassoc &mdash; Вычисляет расхождение массивов с дополнительной проверкой индекса, осуществляемой при помощи callback-функции
&bull;	array_diff_ukey &mdash; Вычисляет расхождение массивов, используя callback-функцию для срав-нения ключей
&bull;	array_diff &mdash; Вычислить расхождение массивов
&bull;	array_fill_keys &mdash; Создаёт массив и заполняет его значениями с определёнными ключами
&bull;	array_fill &mdash; Заполняет массив значениями
&bull;	array_filter &mdash; Фильтрует элементы массива с помощью callback-функции
&bull;	array_flip &mdash; Меняет местами ключи с их значениями в массиве
&bull;	array_intersect_assoc &mdash; Вычисляет схождение массивов с дополнительной проверкой индек-са
&bull;	array_intersect_key &mdash; Вычислить пересечение массивов, сравнивая ключи
&bull;	array_intersect_uassoc &mdash; Вычисляет схождение массивов с дополнительной проверкой ин-декса, осуществляемой при помощи callback-функции
&bull;	array_intersect_ukey &mdash; Вычисляет схождение массивов, используя callback-функцию для сравнения ключей
&bull;	array_intersect &mdash; Вычисляет схождение массивов
&bull;	array_is_list &mdash; Проверяет, является ли данный array списком
&bull;	array_key_exists &mdash; Проверяет, присутствует ли в массиве указанный ключ или индекс
&bull;	array_key_first &mdash; Получает первый ключ массива
&bull;	array_key_last &mdash; Получает последний ключ массива
&bull;	array_keys &mdash; Возвращает все или некоторое подмножество ключей массива
&bull;	array_map &mdash; Применяет callback-функцию ко всем элементам указанных массивов
&bull;	array_merge_recursive &mdash; Рекурсивное слияние одного или более массивов
&bull;	array_merge &mdash; Сливает один или большее количество массивов
&bull;	array_multisort &mdash; Сортирует несколько массивов или многомерные массивы
&bull;	array_pad &mdash; Дополнить массив определённым значением до указанной длины
&bull;	array_pop &mdash; Извлекает последний элемент массива
&bull;	array_product &mdash; Вычислить произведение значений массива
&bull;	array_push &mdash; Добавляет один или несколько элементов в конец массива
&bull;	array_rand &mdash; Выбирает один или несколько случайных ключей из массива
&bull;	array_reduce &mdash; Итеративно уменьшает массив к единственному значению, используя callback-функцию
&bull;	array_replace_recursive &mdash; Рекурсивно заменяет элементы первого массива элементами пе-реданных массивов
&bull;	array_replace &mdash; Заменяет элементы массива элементами других переданных массивов
&bull;	array_reverse &mdash; Возвращает массив с элементами в обратном порядке
&bull;	array_search &mdash; Осуществляет поиск данного значения в массиве и возвращает ключ первого найденного элемента в случае успешного выполнения
&bull;	array_shift &mdash; Извлекает первый элемент массива
&bull;	array_slice &mdash; Выбирает срез массива
&bull;	array_splice &mdash; Удаляет часть массива и заменяет её чем-нибудь ещё
&bull;	array_sum &mdash; Вычисляет сумму значений массива
&bull;	array_udiff_assoc &mdash; Вычисляет расхождение в массивах с дополнительной проверкой индек-сов, используя для сравнения значений callback-функцию
&bull;	array_udiff_uassoc &mdash; Вычисляет расхождение в массивах с дополнительной проверкой ин-дексов, используя для сравнения значений и индексов callback-функцию
&bull;	array_udiff &mdash; Вычисляет расхождение массивов, используя для сравнения callback-функцию
&bull;	array_uintersect_assoc &mdash; Вычисляет пересечение массивов с дополнительной проверкой ин-дексов, используя для сравнения значений callback-функцию
&bull;	array_uintersect_uassoc &mdash; Вычисляет пересечение массивов с дополнительной проверкой индекса, используя для сравнения индексов и значений индивидуальные callback-функции
&bull;	array_uintersect &mdash; Вычисляет пересечение массивов, используя для сравнения значений callback-функцию
&bull;	array_unique &mdash; Убирает повторяющиеся значения из массива
&bull;	array_unshift &mdash; Добавляет один или несколько элементов в начало массива
&bull;	array_values &mdash; Выбирает все значения массива
&bull;	array_walk_recursive &mdash; Рекурсивно применяет пользовательскую функцию к каждому элементу массива
&bull;	array_walk &mdash; Применяет заданную пользователем функцию к каждому элементу массива
&bull;	key_exists &mdash; Псевдоним array_key_exists
&bull;	key &mdash; Выбирает ключ из массива
&bull;	krsort &mdash; Сортирует массив по ключу в порядке убывания
&bull;	ksort &mdash; Сортирует массив по ключу в порядке возрастания
&bull;	list &mdash; Присваивает переменным из списка значения подобно массиву
&bull;	natcasesort &mdash; Сортирует массив, используя алгоритм &quot;natural order&quot; без учёта регистра сим-волов
&bull;	natsort &mdash; Сортирует массив, используя алгоритм &quot;natural order&quot;
&bull;	next &mdash; Перемещает указатель массива вперёд на один элемент
&bull;	pos &mdash; Псевдоним current
&bull;	prev &mdash; Передвигает внутренний указатель массива на одну позицию назад
&bull;	range &mdash; Создаёт массив, содержащий диапазон элементов
&bull;	reset &mdash; Устанавливает внутренний указатель массива на его первый элемент
&bull;	rsort &mdash; Сортирует массив в порядке убывания
&bull;	shuffle &mdash; Перемешивает массив
&bull;	sizeof &mdash; Псевдоним count
&bull;	uksort &mdash; Сортирует массив по ключам, используя пользовательскую функцию для сравнения ключей
&bull;	usort &mdash; Сортирует массив по значениям используя пользовательскую функцию для сравне-ния элементов');
INSERT INTO app.theory (id, `index`, comment) VALUES (29, '1.	Что такое функция?', 'Функция &mdash; это блок кода, который может быть именован и вызван повторно. Иногда функцию ещё называют подпрограммой. Функция начинается с ключевого слова function, за которым следует имя функции, а за ней круглые скобки с передаваемыми параметрами внутрь функции.
Функция. Создав свою функцию и записав туда необходимый код, вы сможете вызывать и использовать его столько раз, сколько необходимо.
Разделяют два типа функций &mdash; встроенные и пользовательские');
INSERT INTO app.theory (id, `index`, comment) VALUES (30, '2.	 Область видимости переменных', 'Область видимости переменных - это контекст, в рамках которого переменная была определена и где к ней можно получить доступ. В PHP имеется две области видимости переменных:
&bull;	Глобальная - к переменным можно получить доступ в любом месте скрипта
&bull;	Локальная - к переменным можно получить доступ только внутри функции, в которой они были определены
Область видимости переменной, а особенно, локальная, существенно облегчает управление кодом. Если бы все переменные были глобальными, то их можно было бы менять в любом месте скрипта. Это привело бы к хаосу и больших скриптах, так как очень часто разные части скрипта используют переменные с одинаковыми именами. Ограничивая область видимости локальным контекстом вы определяете границы кода, который может получить доступ к переменной, что делает код  более устойчивым, модульным и простым в отладке.
Переменные с глобальной областью видимости называются глобальными, а с локальной областью видимости - локальными.
Вот пример того, как работают глобальные и локальные переменные.
	&lt;?php
	$globalName = &quot;Зоя&quot;;
	function sayHello() {
	  $localName = &quot;Гарри&quot;;
	  echo &quot;Привет, $localName!&lt;br&gt;&quot;;
	}
sayHello();
	echo &quot;Значение \\$globalName: &#039;$globalName&#039;&lt;br&gt;&quot;;
	echo &quot;Значение \\$localName : &#039;$localName&#039;&lt;br&gt;&quot;;
	?&gt;
При выполнении скрипт выведет:
	Привет, Гарри!
	Значение $globalName: &#039;Зоя&#039;
Значение $localName : &#039; &#039;');
INSERT INTO app.theory (id, `index`, comment) VALUES (31, '3.	Что такое аргументы функции?', 'Аргументы функции это данные, передаваемые внутрь функции в виде списка параметров. Аргументы разделяются запятыми и вычисляются слева на право.');
INSERT INTO app.theory (id, `index`, comment) VALUES (32, '4.	Какие существуют способы передачи аргументов в функцию?', 'Передача аргументов в функцию осуществляется: по значению (часто используемый), по ссылке, значения по умолчанию.');
INSERT INTO app.theory (id, `index`, comment) VALUES (33, '5.	Как просиходит передача аргументов в функцию по значению?', 'Передача аргументов в функцию по ссылке происходит с помощью указания новых аргументов внутри вызываемой функции.
Например:
&lt;?php
function my_block($text1, $text2, $text3)
{
    return $text1 . $text2 . $text3;
}
// выведет &#039;Съешь этих мягких,французских булок.&#039;
echo my_block(&#039;Съешь этих мягких&#039;, &#039;французских&#039;,  &#039;булок&#039;);
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (34, '6.	Как происходит передача аргументов в функцию по ссылке?', 'Передача аргументов в функцию по ссылке происходит с помощью указания амперсанда (&amp;) перед именем аргумента в описании функции.
Например:
&lt;?php
function my_block(&amp;$text)
{
    $text .= &#039;французских булок.&#039;;
}
$text = &#039;Съешь этих мягких, &#039;;
my_block($text);
echo $text;    // выведет &#039;Съешь этих мягких,французских булок.&#039;
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (35, '7.	Как для функции происходит установка значений по умолчанию?', 'Установка значений по умолчанию для функции просиходит с помощью указания значений для аргументов функции.
Например:
&lt;?php
function my_block($text = &#039;Съешь этих мягких,французских булок.&#039;)
{
    return $text;
}

echo my_block(); // выведет &#039;Съешь этих мягких,французских булок.&#039;
echo my_block(&#039;Французские булки&#039;); // выведет &#039;Французские булки.&#039;
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (36, '8.	Какой оператор производит возврат результата функции?', 'Возрат результата функции производится с помощью оператора return.');
INSERT INTO app.theory (id, `index`, comment) VALUES (37, '9.	Как происходит обращение к функциям через переменные?', 'Обращение к функциям через переменные происходит с помощью присоединения к имени переменной круглых скобок. PHP будет искать функцию с таким именем и пытаться ее выполнить.');
INSERT INTO app.theory (id, `index`, comment) VALUES (38, '10.	Что такое ананимные функции?', 'Анонимная функция, или по другому, замыкания (closures), представляет собой функцию не имеющую имени и используемую для значений callback-параметров.
Например:
&lt;?php
echo preg_replace_callback(&#039;~-([a-z])~&#039;, function ($match) {
    return strtoupper($match[1]);
}, &#039;cookie-down&#039;);
// выведет cookiedown
?&gt;');
INSERT INTO app.theory (id, `index`, comment) VALUES (39, '11.	 Замыкания', 'Замыкания в PHP представляют анонимную функцию, которая может использовать переменные из своего локального окружения. В отличие от обычных анонимных функций замыкания в PHP применяют выражение use.

&lt;?php
$number = 89;
 $showNumber = function() use($number)
{
    echo $number;
};
$showNumber();
?&gt;
Выражение use() получает внешние переменные, которые анонимная функция соби-рается использовать. И теперь при ее выполении браузер выведет значение переменной $number.');
INSERT INTO app.theory (id, `index`, comment) VALUES (40, '1.	 ЧТО ТАКОЕ $ _SESSION В PHP?', 'Сеанс создает файл во временном каталоге на сервере, где хранятся зарегистрированные переменные сеанса и их идентификатор сеанса. Эти данные будут доступны для всех страниц сайта во время этого посещения.
Область временной записи контролируется параметром в документе php.ini, который называется session.save_path.
В момент, когда сеанс начинается, происходят следующие вещи -
1.	Сначала PHP создает две копии уникального идентификатора сеанса для этого конкретного сеанса клиента, который представляет собой произвольную строку из 32 шестнадцатеричных чисел, например 3c7foj34c3jjhkyepop2fc937e3443.
2.	Одна копия уникального идентификатора сеанса автоматически отправляется на компьютер пользователя для будущей синхронизации, а одна копия сохраняется на стороне сервера до запуска сеанса.
3.	Всякий раз, когда вы хотите получить доступ к странице веб-сайта или веб-приложения, идентификатор сеанса текущего пользователя будет связан с заголовком HTTP, и он будет сравниваться с идентификатором сеанса, который поддерживается на сервере. После завершения процесса сравнения вы можете легко получить доступ к странице веб-сайта или веб-приложения.
4.	Сеанс завершается, когда пользователь закрывает браузер или после выхода с сайта сервер завершает сеанс по истечении заданного периода, обычно продолжительностью 30 минут.
');
INSERT INTO app.theory (id, `index`, comment) VALUES (41, '2.	 ЧТО ТАКОЕ PHP-ФУНКЦИИ SESSION_START () И SESSION_DESTROY ()?', 'Функция PHP session_start () используется для запуска сеанса. Он запускает новый или возобновляет текущий сеанс. Он возвращает текущий сеанс, если он уже создан. Если сеанс недоступен, он создает и возвращает новые сеансы.');
INSERT INTO app.theory (id, `index`, comment) VALUES (42, '3.	Что такое сессии и зачем они используются?', 'Сессии - это специальные файлы на сервере для хранения и доступа различных данных. Сессии позволяют хранить данные, к которым через браузер пользователь не может получить доступ, например, как в cookie. Посетителю сайта присваивается уникальный id (идентификатор сессии), который хранится в cookie на стороне пользователя или передается через адресную строку.');
INSERT INTO app.theory (id, `index`, comment) VALUES (43, '4.	 В ЧЕМ РАЗНИЦА МЕЖДУ СЕАНСОМ И ФАЙЛОМ COOKIE?', 'Основное различие между сеансом и файлом cookie заключается в том, что файлы cookie хранятся на компьютере пользователя в формате текстового файла, а сеансы хранятся на стороне сервера.
Файлы cookie не могут содержать несколько переменных, с другой стороны, сеанс может содержать несколько переменных.
Вы можете вручную установить срок действия файла cookie, в то время как сеанс остается активным только до тех пор, пока открыт браузер.');
INSERT INTO app.theory (id, `index`, comment) VALUES (44, '5.	 ЧТО ТАКОЕ ФАЙЛЫ COOKIE? КАК СОЗДАТЬ КУКИ В PHP?', 'Файл cookie используется для идентификации пользователя. Файл cookie - это небольшая запись, которую сервер устанавливает на компьютер клиента. Каждый раз, когда аналогичный компьютер запрашивает страницу с программой, он также отправляет cookie. С помощью PHP вы можете создавать и восстанавливать значение cookie.
Некоторые важные моменты, касающиеся файлов cookie:
1.	Файлы cookie поддерживают идентификатор сеанса, сгенерированный на сервере после проверки личности пользователя в зашифрованном виде, и он должен находиться в браузере компьютера.
2.	Вы можете хранить только строковые значения, а не объект, потому что вы не можете получить доступ к любому объекту на веб-сайте или в веб-приложениях.
3.	Объем: - Несколько страниц.
4.	По умолчанию файлы cookie являются временными, а временные файлы cookie сохраняются только в браузере.
5.	По умолчанию файлы cookie являются конкретными URL-адресами, что означает, что Gmail не поддерживается в Yahoo, и наоборот.
6.	На каждый сайт можно создать 20 файлов cookie на одном веб-сайте или в веб-приложении.
7.	Первоначальный размер файла cookie составляет 50 байт.
Максимальный размер файла cookie составляет 4096 байт.
');
INSERT INTO app.theory (id, `index`, comment) VALUES (45, '6.	Что нельзя хранить в Cookie и почему?', 'В cookie ни в коем случае нельзя хранить конфендициальные данные, например: пароли, номера карт, а также делать проверку подленности пользователя к аккаунтам. Это связано с тем, что содержимое cookie может быть легко просмотрено и изменено через браузер любым пользователем.');
INSERT INTO app.theory (id, `index`, comment) VALUES (46, '7.	Какие есть типы cookie?', 'Есть следующие типы cookie: сессионные, постоянные, защищенные, HTTP-only. Сессионные (временные) - существуют только когда пользователь зашел на сайт, а при закрытии браузера уничтожаются.  Постоянные - существуют все время и удаляются только в установленную дату или промежуток времени. Защищенные - куки могут быть переданы только через шифрованное HTTPS соединение.  HTTP-only  -  к кукам нельзя обращаться из браузера через JavaScript, что устраняет их кражу через кросс-сайтового скриптинга (XSS).');
INSERT INTO app.theory (id, `index`, comment) VALUES (47, '8.	Авторизация', 'Предоставление прав на выполнение определённых действий, а также процесс проверки прав при попытке выполнения этих действий.');
INSERT INTO app.theory (id, `index`, comment) VALUES (48, '9.	Аутентификация&nbsp;', 'Процедура проверки подлинности, например проверка подлинности пользователя путем сравнения введённого им пароля.');

create table user
(
    id       int unsigned auto_increment
        primary key,
    email    varchar(191) null,
    password varchar(191) null
)
    collate = utf8mb4_unicode_520_ci;

INSERT INTO app.user (id, email, password) VALUES (1, 'bob@gmail.com', '$2y$10$OgVfw493KzBbAzM5irI5KutGv2Jc24pyerR2KhY2dCzlbXSIgzAPq');