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
INSERT INTO app.practice (id, `index`, comment) VALUES (8, '1) ÐŸÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ðµ', '// ÐŸÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ðµ ÑÑ‚Ð¾ ÐºÐ°Ðº ÐºÐ¾Ñ€Ð¾Ð±ÐºÐ° Ñ‚Ñ‹ Ñ‚ÑƒÐ´Ð° Ð¿Ð¾Ð¼ÐµÑˆÐ°ÐµÑˆÑŒ Ñ‡Ñ‚Ð¾ Ñ…Ð¾Ñ‡ÐµÑˆÑŒ.
// Ð Ð°Ð½ÑŒÑˆÐµ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð»Ð¸ var Ð½Ð¾ ÑÐµÐ¹Ñ‡Ð°Ñ ÐµÐ³Ð¾ Ð·Ð¿Ð¼ÐµÐ½Ð¸Ð»Ð¸ Ð½Ð° let
var name = &#039;Vladilen&#039;;
//Ð­Ñ‚Ð¾ ÑƒÐ¶Ðµ ÑƒÑÑ‚Ð°Ñ€ÐµÐ»Ð¾, Ð¿ÐµÑ€ÐµÑ…Ð¾Ð´Ð¸Ð¼ Ð½Ð° Ð½Ð¾Ð²Ñ‹Ð¹ ÑƒÑ€Ð¾Ð²ÐµÐ½ÑŒ.
let age = 26;   //  Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÐ¼ let Ð´Ð»Ñ Ð½Ð°Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ð¾Ð¹
const lastName = &#039;Minit&#039;;  // ÑÑ‚Ð¾ ÐºÐ¾Ð½Ð½ÑÑ‚Ð°Ð½Ñ‚Ð° Ð¾Ð½Ð° Ð½ÐµÐ¸Ð¼ÐµÐ½Ð½Ð°Ñ, ÐµÐµ Ð¿Ð¾Ð¼ÐµÐ½ÑÑ‚ÑŒ Ð½ÐµÐ»ÑŒÐ·Ñ
console.log(name); // Ð²Ñ‹Ð²Ð¾Ð´ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ
console.log(x = 5,y = 5, z = x + y, &#039;ÐžÑ‚Ð²ÐµÑ‚ &#039; + z);  // Ð’ ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ Ð¼Ð¾Ð¶Ð½Ð¾ Ð·Ð°Ð¿Ð¸ÑÐ°Ð²Ð°Ñ‚ÑŒ Ð²ÑÐµ Ñ‡ÐµÑ€ÐµÐ· Ð·Ð°Ð¿ÑÑ‚ÑƒÑŽ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð¾Ð½Ð¾ Ð²Ñ‹Ð²Ð¾Ð´Ð¸Ð»Ð¾ÑÑŒ
// Ð¿Ð¸ÑˆÐµÐ¼ ÐºÐ°ÐºÐ¾ÐµÑ‚Ð¾ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ Ð¸ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð²Ñ‹Ð²ÐµÑÑ‚Ð¸ Ð² ÐºÐ¾Ð½ÑÐ¾Ð» Ð´Ð°Ð»ÑŒÑˆÐµ Ð¿Ð¸ÑˆÐµÐ¼ .log Ð¸ Ð½Ð°Ð¶Ð¸Ð¼Ð°ÐµÐ¼ Ð½Ð° Tab
// x + y.log  Ð´Ð°Ð»ÑŒÑˆÐµ Ð½Ð°Ð¶Ð¸Ð¼Ð°ÐµÐ¼ Ð½Ð° Tab Ð¸ Ð²Ð¾Ñ‚ Ñ‡Ñ‚Ð¾ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ñ‚ÑÑ
console.log(x + y);


// 2 ÐœÑƒÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ
// console.log(&#039;Ð˜Ð¼Ñ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐºÐ°: &#039; + name + &#039;, Ð° Ð²Ð¾Ð·Ñ€Ð°ÑÑ‚: &#039; + age); // Ð²ÑÐµ Ð¿ÐµÑ€ÐµÐ²ÐµÐ»Ð¾ÑÑŒ Ð² ÑÑ‚Ñ€Ð¾ÐºÑƒ. Ð’Ñ‹Ð´Ð°ÐµÑ‚ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ
// alert(&#039;Ð­Ñ‚Ð° Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð² Ð±Ñ€Ð¾ÑƒÐ·ÐµÑ€Ð°Ñ…&#039;); // Ð’Ñ‹Ð²Ð¾Ð´ ÑÐ¾Ð¾Ð±ÑˆÐµÐ½Ð¸Ðµ
// prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ñ„Ð°Ð¼Ð¸Ð»Ð¸ÑŽ&#039;); // Ð²Ñ‹Ð´Ð°ÐµÑ‚ Ð¾ÐºÐ¾ÑˆÐºÐ¾ Ð´Ð»Ñ Ð²Ð¾Ð´Ð° Ð¸ Ð²Ñ‹Ð±Ð¾Ñ€ Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ð¹ &quot;ÐžÐš&quot; Ð¸Ð»Ð¸ &quot;ÐžÐ¢ÐœÐ•ÐÐ&quot;

// const lastName1 = prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ñ„Ð°Ð¼Ð¸Ð»Ð¸ÑŽ&#039;);  // Ð’Ñ‹Ð²Ð¾Ð´Ð¸Ñ‚ Ñ‚Ð°Ð±Ð»Ð¸Ñ‡ÐºÑƒ Ð½Ð° ÑÐºÑ€Ð°Ð½ Ð¸ Ñ‡Ñ‚Ð¾ Ñ‚Ð¾ Ð½Ð°Ð´Ð¾ Ð²ÐµÑÑ‚Ð¸
// const firstName = prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð¼Ñ&#039;);      // Ð¿Ð¾Ñ‚Ð¾Ð¼ Ð²ÑÐµ Ñ‡Ñ‚Ð¾ Ð²ÐµÐ»Ð¸ Ð²Ð»Ð¾Ð¶Ð¸Ñ‚ÑÑ Ð² Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ
// alert(firstName + &#039; &#039; + lastName1);  //  Ð²Ñ‹Ð²Ð¾Ð´ÑÑ‚ ÑÐ¾Ð¾Ð±ÑˆÐµÐ½Ð¸Ðµ Ð½Ð° ÑÐºÑ€Ð°Ð½ Ð² Ð½ÐµÐ¼ Ð´Ð²Ð° ÑÑ‚Ð¸Ñ… ÑÐ»Ð¾Ð²Ð° ÑÐ¾ÐµÐ´Ð¸Ð½ÑÑŽÑ‚ÑÑ Ñ Ð¿Ð¾Ð¼Ð¾Ñ‰ÑŽ ÐºÐ¾Ð½ÐºÐ¾Ð½Ñ†Ð¸Ð½Ð°Ñ†Ð¸ÐµÐ¹');
INSERT INTO app.practice (id, `index`, comment) VALUES (9, '2) ÐœÑƒÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ', '// console.log(&#039;Ð˜Ð¼Ñ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐºÐ°: &#039; + name + &#039;, Ð° Ð²Ð¾Ð·Ñ€Ð°ÑÑ‚: &#039; + age); // Ð²ÑÐµ Ð¿ÐµÑ€ÐµÐ²ÐµÐ»Ð¾ÑÑŒ Ð² ÑÑ‚Ñ€Ð¾ÐºÑƒ. Ð’Ñ‹Ð´Ð°ÐµÑ‚ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ
// alert(&#039;Ð­Ñ‚Ð° Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð² Ð±Ñ€Ð¾ÑƒÐ·ÐµÑ€Ð°Ñ…&#039;); // Ð’Ñ‹Ð²Ð¾Ð´ ÑÐ¾Ð¾Ð±ÑˆÐµÐ½Ð¸Ðµ
// prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ñ„Ð°Ð¼Ð¸Ð»Ð¸ÑŽ&#039;); // Ð²Ñ‹Ð´Ð°ÐµÑ‚ Ð¾ÐºÐ¾ÑˆÐºÐ¾ Ð´Ð»Ñ Ð²Ð¾Ð´Ð° Ð¸ Ð²Ñ‹Ð±Ð¾Ñ€ Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ð¹ &quot;ÐžÐš&quot; Ð¸Ð»Ð¸ &quot;ÐžÐ¢ÐœÐ•ÐÐ&quot;

// const lastName1 = prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ñ„Ð°Ð¼Ð¸Ð»Ð¸ÑŽ&#039;);  // Ð’Ñ‹Ð²Ð¾Ð´Ð¸Ñ‚ Ñ‚Ð°Ð±Ð»Ð¸Ñ‡ÐºÑƒ Ð½Ð° ÑÐºÑ€Ð°Ð½ Ð¸ Ñ‡Ñ‚Ð¾ Ñ‚Ð¾ Ð½Ð°Ð´Ð¾ Ð²ÐµÑÑ‚Ð¸
// const firstName = prompt(&#039;Ð’ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð¼Ñ&#039;);      // Ð¿Ð¾Ñ‚Ð¾Ð¼ Ð²ÑÐµ Ñ‡Ñ‚Ð¾ Ð²ÐµÐ»Ð¸ Ð²Ð»Ð¾Ð¶Ð¸Ñ‚ÑÑ Ð² Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ
// alert(firstName + &#039; &#039; + lastName1);  //  Ð²Ñ‹Ð²Ð¾Ð´ÑÑ‚ ÑÐ¾Ð¾Ð±ÑˆÐµÐ½Ð¸Ðµ Ð½Ð° ÑÐºÑ€Ð°Ð½ Ð² Ð½ÐµÐ¼ Ð´Ð²Ð° ÑÑ‚Ð¸Ñ… ÑÐ»Ð¾Ð²Ð° ÑÐ¾ÐµÐ´Ð¸Ð½ÑÑŽÑ‚ÑÑ Ñ Ð¿Ð¾Ð¼Ð¾Ñ‰ÑŽ ÐºÐ¾Ð½ÐºÐ¾Ð½Ñ†Ð¸Ð½Ð°Ñ†Ð¸ÐµÐ¹');
INSERT INTO app.practice (id, `index`, comment) VALUES (10, '3) ÐžÐ¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ñ‹', 'const currentYear = 2021;
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
console.log(5 % 2 ); // 1, Ð¾ÑÑ‚Ð°Ñ‚Ð¾Ðº Ð¾Ñ‚ Ð´ÐµÐ»ÐµÐ½Ð¸Ñ 5 Ð½Ð° 2
console.log(2 ** 2); // 4  (2 ÑƒÐ¼Ð½Ð¾Ð¶ÐµÐ½Ð¾ Ð½Ð° ÑÐµÐ±Ñ 2 Ñ€Ð°Ð·Ð°) Ð²Ð¾Ð·Ð²ÐµÐ´ÐµÐ½Ð¸Ðµ Ð² ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ
// Ð˜Ð½ÐºÑ€ÐµÐ¼ÐµÐ½Ñ‚ ++ ÑƒÐ²ÐµÐ»Ð¸Ñ‡Ð¸Ð²Ð°ÐµÑ‚ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ Ð½Ð° 1:
console.log(Year++);
console.log(Year);
// Ð”ÐµÐºÑ€ÐµÐ¼ÐµÐ½Ñ‚ -- ÑƒÐ¼ÐµÐ½ÑŒÑˆÐ°ÐµÑ‚ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ Ð½Ð° 1:
console.log(Year--);
console.log(Year);
// ÐÐ¾ ÐµÑÐ»Ð¸ Ð¼Ñ‹ Ð¿Ð¾ÑÑ‚Ð°Ð²Ð¸Ð¼ Ð¾Ð±Ñ€Ð°Ñ‚Ð½Ð¾ Ñ‚Ð¾ ÑÐ½Ð°Ñ‡Ð°Ð»Ð¾ Ð¾Ð½ ÑÐ´ÐµÐ»Ð°ÐµÑ‚ Ð°Ñ€Ð¸Ñ…Ð¼ÐµÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ðµ Ð¿Ð¾Ñ‚Ð¾Ð¼ Ð²Ñ‹Ð²Ð¾Ð´ Ð½Ð° ÑÐºÑ€Ð°Ð½
console.log(Year); // Ð¾Ñ‚Ð²ÐµÑ‚ Ð²Ñ‹Ð²ÐµÐ´Ð¸Ñ‚ 2021
console.log(--Year); // Ð¾Ñ‚Ð²ÐµÑ‚ Ð²Ñ‹Ð²ÐµÐ´Ð¸Ñ‚ 2020
console.log(--Year); // Ð¾Ñ‚Ð²ÐµÑ‚ Ð²Ñ‹Ð²ÐµÐ´Ð¸Ñ‚ 2019
// Ñ‚Ð°Ðº Ð¶Ðµ ÑÐ°Ð¼Ð¾Ðµ Ð¼Ð¾Ð¶Ð½Ð¾ Ð·Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ ÑÐ¾ÐºÑ€Ð°ÑˆÐµÐ½Ð½Ñ‹Ðµ Ð¾Ð¿Ð¸Ñ€Ð°Ñ‚Ð¾Ñ€Ð¾Ð²
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
INSERT INTO app.practice (id, `index`, comment) VALUES (11, '4) Ð•ÑÑ‚ÑŒ 8 Ð¾ÑÐ½Ð¾Ð²Ð½Ñ‹Ñ… Ñ‚Ð¸Ð¿ Ð´Ð°Ð½Ð½Ñ‹Ñ… Ð² js, ÐŸÐµÑ€Ð²Ñ‹Ðµ Ñ‚Ñ€Ð¸ ÑÑ‚Ð¾ Ð¾ÑÐ½Ð¾Ð²Ð½Ñ‹Ðµ, Ð´Ð°Ð»ÐµÐµ Ð²Ñ‚Ð¾Ñ€Ð¾ÑÑ‚ÐµÐ¼ÐµÐ½Ð½Ñ‹Ðµ', 'let name1 = &#039;Vasa&#039;;  // string
let age1 = 20;  // number
const isProgrammer = true; // boolean
const bigInt = 1234567890123456789012345678901234567890n; // Ð’ JavaScript Ñ‚Ð¸Ð¿ &laquo;number&raquo; Ð½Ðµ Ð¼Ð¾Ð¶ÐµÑ‚ ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ñ‚ÑŒ Ñ‡Ð¸ÑÐ»Ð° Ð±Ð¾Ð»ÑŒÑˆÐµ, Ñ‡ÐµÐ¼ (253-1) (Ñ‚. Ðµ. 9007199254740991), Ð¸Ð»Ð¸ Ð¼ÐµÐ½ÑŒÑˆÐµ, Ñ‡ÐµÐ¼ -(253-1) Ð´Ð»Ñ Ð¾Ñ‚Ñ€Ð¸Ñ†Ð°Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ñ… Ñ‡Ð¸ÑÐµÐ».
let age2 = null; // Ð’ JavaScript null Ð½Ðµ ÑÐ²Ð»ÑÐµÑ‚ÑÑ &laquo;ÑÑÑ‹Ð»ÐºÐ¾Ð¹ Ð½Ð° Ð½ÐµÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÑŽÑ‰Ð¸Ð¹ Ð¾Ð±ÑŠÐµÐºÑ‚&raquo; Ð¸Ð»Ð¸ &laquo;Ð½ÑƒÐ»ÐµÐ²Ñ‹Ð¼ ÑƒÐºÐ°Ð·Ð°Ñ‚ÐµÐ»ÐµÐ¼&raquo;, ÑÑ‚Ð¾ Ð¿ÑƒÑÑ‚Ð¾, Ð½ÐµÑ‡ÐµÐ³Ð¾ Ð½ÐµÑ‚ Ð¸Ñ‚Ð´
let age3 = undefined; // ÐžÐ½Ð¾ Ð¾Ð·Ð½Ð°Ñ‡Ð°ÐµÑ‚, Ñ‡Ñ‚Ð¾ &laquo;Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ Ð½Ðµ Ð±Ñ‹Ð»Ð¾ Ð¿Ñ€Ð¸ÑÐ²Ð¾ÐµÐ½Ð¾&raquo;.
//object Ð´Ð»Ñ Ð±Ð¾Ð»ÐµÐµ ÑÐ»Ð¾Ð¶Ð½Ñ‹Ñ… ÑÑ‚Ñ€ÑƒÐºÑ‚ÑƒÑ€ Ð´Ð°Ð½Ð½Ñ‹Ñ….
// symbol Ð´Ð»Ñ ÑƒÐ½Ð¸ÐºÐ°Ð»ÑŒÐ½Ñ‹Ñ… Ð¸Ð´ÐµÐ½Ñ‚Ð¸Ñ„Ð¸ÐºÐ°Ñ‚Ð¾Ñ€Ð¾Ð².
console.log(typeof age1);  // Ð£Ð·Ð½Ð°Ñ‚ÑŒ Ñ‚Ð¸Ð¿ Ð´Ð°Ð½Ð½Ñ‹Ñ…');
INSERT INTO app.practice (id, `index`, comment) VALUES (12, '5) ÐŸÑ€Ð¸Ð¾Ñ€Ð¸Ñ‚ÐµÑ‚Ñ‹ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð¾Ð²', '// https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Operators/Operator_Precedence
//Ð•ÑÑ‚ÑŒ Ñ‚Ð°Ð±Ð»Ð¸Ñ†Ð¸ Ð¸ ÑÐ¼Ð¾Ñ‚Ñ€Ð¸Ð¼ Ñ‡Ñ‚Ð¾ Ð¿ÐµÑ€Ð²ÐµÐµ Ð±ÑƒÐ´ÐµÑ‚ Ñ‚Ð¾ Ð¸ Ð±ÑƒÐ´ÐµÑ‚ Ð¿ÐµÑ€Ð²Ñ‹Ð¼ Ð²Ñ‹ÑˆÐ¸Ñ‚Ñ‹Ð²Ð°Ñ‚ÑÑ
let x = 10 + 5 &gt;= 14;
console.log(x); // Ð²Ñ‹Ð´Ð°ÑÑ‚ Ð¾Ñ‚Ð²ÐµÑ‚ true
// Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ñ‹ ÑÑ€Ð°Ð²Ð½ÐµÐ½Ð¸Ðµ  &gt; &lt; &gt;= &lt;= == === != !==
//      Ð±Ð¾Ð»ÑŒÑˆÐµ, Ð¼ÐµÐ½ÑŒÑˆÐµ, Ð±Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð»Ð¸ Ñ€Ð°Ð²Ð½Ð¾, Ð¼ÐµÐ½ÑŒÑˆÐµ Ð¸Ð»Ð¸ Ñ€Ð°Ð²Ð½Ð¾, Ñ€Ð°Ð²Ð½Ð¾, ÑÑ‚Ñ€Ð¾Ð³Ð¾Ðµ Ñ€Ð°Ð²ÐµÐ½ÑÑ‚Ð²Ð¾ , Ð½Ðµ Ñ€Ð°Ð²Ð½Ð¾ , ÑÑ‚Ñ€Ð¾Ð³Ð¾Ðµ Ð½ÐµÑ€Ð°Ð²ÐµÐ½ÑÑ‚Ð²Ð¾
// 6) Ð£ÑÐ»Ð¾Ð²Ð½Ñ‹Ðµ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ñ‹
const courseStatus = &#039;pending&#039;;

if (courseStatus === &#039;ready&#039;) {
    console.log(&#039;coure redy and you can learn&#039;);
} else if (courseStatus === &#039;pending&#039;) {
    console.log(&#039;course is not ready&#039;);
} else {
    console.log(&#039;coure not completed&#039;);
}

// Ð•ÑÐ»Ð¸ Ð½Ð°Ð¼ Ð½ÑƒÐ¶ÐµÐ½ Ñ‚Ñ€Ñƒ Ð¸Ð»Ð¸ Ñ„Ð¾Ð»Ñ Ñ‚Ð¾ Ñ‚Ð¾Ð³Ð´Ð° Ð¿Ð¸ÑˆÐµÐ¼ Ñ‚Ð°ÐºÐ¾Ð¹ Ð²Ð°Ñ€Ð¸Ð°Ð½Ñ‚ Ñ€Ð°Ð±Ð¾Ñ‚Ñ‹
const isReady = true;
if (isReady) {
    console.log(&#039;all ok&#039;);
} else {
    console.log(&#039;not ready&#039;);
}
// ÑÑ‚Ñƒ Ð·Ð°Ð¿Ð¸ÑÑŒ Ð¼Ð¾Ð¶Ð½Ð¾ ÑÐ¾ÐºÑ€Ð°Ñ‚Ð¸Ñ‚ÑŒ Ð² Ð¾Ð´Ð½Ñƒ ÑÑ‚Ñ€Ð¾ÐºÑƒ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ Ñ‚ÐµÑ€Ð½Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ñ‹ !!!
isReady ? console.log(&#039;all ok&#039;) : console.log(&#039;not ready&#039;);

// 7) Ð‘ÑƒÐ»ÐµÐ²Ð°Ñ Ð»Ð¾Ð³Ð¸ÐºÐ°


// Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ð¹ ÐºÐ¾Ð´ Ð´ÐµÐ¼Ð¾Ð½ÑÑ‚Ñ€Ð¸Ñ€ÑƒÐµÑ‚ Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ñ‹ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð½Ð¸Ñ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð° &amp;&amp; (Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ Ð˜).
//
// var a1 =  true &amp;&amp; true;     // t &amp;&amp; t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ true
// var a2 =  true &amp;&amp; false;    // t &amp;&amp; f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var a3 = false &amp;&amp; true;     // f &amp;&amp; t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var a4 = false &amp;&amp; (3 == 4); // f &amp;&amp; f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var a5 = &quot;Cat&quot; &amp;&amp; &quot;Dog&quot;;    // t &amp;&amp; t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Dog
// var a6 = false &amp;&amp; &quot;Cat&quot;;    // f &amp;&amp; t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var a7 = &quot;Cat&quot; &amp;&amp; false;    // t &amp;&amp; f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// Copy to Clipboard
// Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ð¹ ÐºÐ¾Ð´ Ð´ÐµÐ¼Ð¾Ð½ÑÑ‚Ñ€Ð¸Ñ€ÑƒÐµÑ‚ Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ñ‹ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð½Ð¸Ñ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð° || (Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ Ð˜Ð›Ð˜).
//
// var o1 =  true || true;     // t || t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ true
// var o2 = false || true;     // f || t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ true
// var o3 =  true || false;    // t || f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ true
// var o4 = false || (3 == 4); // f || f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var o5 = &quot;Cat&quot; || &quot;Dog&quot;;    // t || t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Cat
// var o6 = false || &quot;Cat&quot;;    // f || t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Cat
// var o7 = &quot;Cat&quot; || false;    // t || f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Cat
// Copy to Clipboard
// Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ð¹ ÐºÐ¾Ð´ Ð´ÐµÐ¼Ð¾Ð½ÑÑ‚Ñ€Ð¸Ñ€ÑƒÐµÑ‚ Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ñ‹ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð½Ð¸Ñ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð° ! (Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ ÐÐ•).
//
// var n1 = !true;  // !t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false
// var n2 = !false; // !f Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ true
// var n3 = !&quot;Cat&quot;; // !t Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ false');
INSERT INTO app.practice (id, `index`, comment) VALUES (13, '8) Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸', 'function calculateAge(year) {
    return 2020- year;
}
const myAge = calculateAge(1993);
console.log(myAge);
// Ð¼Ð¾Ð¶Ð½Ð¾ Ð·Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ð²ÑÐµ Ð² Ð¾Ð´Ð½Ñƒ ÑÑ‚Ñ€Ð¾ÐºÑƒ
console.log(calculateAge(1989));
// Ð¢Ð°Ðº Ð¶Ðµ ÑÐ°Ð¼Ð¾Ðµ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð² Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸
function logInfoAbout(name, year) {
    const age = calculateAge(year);
    if (age &gt; 0) {
        console.log(&#039;Man name is &#039; + name + &#039; and his age &#039; + age);
    } else {
        console.log(&#039;It\\&#039;s fuechers man&#039; );
    }

}
// Ð¢Ð°Ðº Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ
logInfoAbout(&#039;Pasha&#039;, 1989);
logInfoAbout(&#039;Toma&#039;, 1987);
logInfoAbout(&#039;Toma&#039;, 2022);

//ÐŸÐ¾Ð½ÑÑ‚Ð¸Ðµ Ñ‡Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ðµ Ð¼ÐµÑ‚Ð¾Ð´Ñ‹ Ð¸ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ñ€Ð°ÑÐ¼Ð¾Ñ‚Ñ€ÐµÑ‚ÑŒ Ð² Ð´Ð²Ð½Ð½Ð¾Ð¼ Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ðµ
// Function
function addFunction() {
    //...
}
// Method
cars.push();');
INSERT INTO app.practice (id, `index`, comment) VALUES (14, '9) ÐœÐ°ÑÑÐ¸Ð²Ñ‹', '// Ð¡Ñ‚Ð°Ð½Ð´Ð°Ñ€Ñ‚Ð½Ð°Ñ Ð·Ð°Ð¿Ð¸ÑÑŒ
const cars = [&#039;mazda&#039;, &#039;mersedes&#039;, &#039;ford&#039;];
// ÐŸÑ€Ð¾Ð²ÐµÑ€Ð¸Ñ‚ÑŒ Ð´Ð»Ð¸Ð½Ñƒ
console.log(cars.length);
// Ð’Ñ‹Ð·Ð¾Ð² Ð¼Ð°ÑÐ¸Ð²Ð° Ð² ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ
console.log(cars[0]);
console.log(cars[1]);
console.log(cars[2]);
// Ð¿ÐµÑ€ÐµÐ½Ð°Ð·Ð½Ð°Ñ‡Ð¸Ñ‚ÑŒ Ð¼Ð°ÑÐ¸Ð²
cars[0] = &#039;Porshe&#039;;
// Ð´Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð¼Ð°ÑÐ¸Ð² Ð¼Ð°Ñ‚Ð°Ñ‚Ð¸Ñ‡ÐµÑÐºÐ¸
cars[3] = &#039;Mazda&#039;;
//Ð´Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð´Ð¸Ð½Ð°Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸
cars[cars.length] = &#039;fiat&#039;;
console.log(cars);');
INSERT INTO app.practice (id, `index`, comment) VALUES (15, '10) Ð¦Ð¸ÐºÐ»Ñ‹', '//Ñƒ Ð½Ð°Ñ ÐµÑÑ‚ÑŒ Ñ†Ð¸ÐºÐ» Ð¸ Ð¼Ñ‹ Ð±ÑƒÐ´ÐµÐ¼ ÐµÐ³Ð¾ Ð¿ÐµÑ€ÐµÐ±ÐµÑ€Ð°Ñ‚ÑŒ
const cars1 = [&#039;mazda&#039;, &#039;mersedes&#039;, &#039;ford&#039;];
// ÑÑ‚Ð°Ð²Ð¸Ð¼ Ð½Ð°Ñ‡Ð°Ð»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾, Ð´Ð°Ð»ÐµÐµ Ð¿Ñ€Ð¾Ð²ÐµÑ€ÑÐµÐ¼ i Ð±Ð¾Ð»ÑŒÑˆÐµ Ð´Ð»Ð¸Ð½Ñ‹ Ð¼Ð°ÑÐ¸Ð²Ð°, ÐµÑÐ»Ð¸ Ð½ÐµÑ‚ Ñ‚Ð¾ ÑƒÐ²ÐµÐ»Ð¸Ñ‡Ð¸Ð²Ð°ÐµÐ¼ i Ð½Ð° 1
for (let i = 0; i &lt; cars1.length; i++) {
    // Ð—Ð°Ñ‚ÐµÐ¼ ÑÑ‚Ð¾ Ð²ÑÐµ Ð¿Ð¾Ð¼ÐµÑˆÐ°ÐµÐ¼ Ð² Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ car Ð¸ Ð²Ñ‹Ð²Ð¾Ð´Ð¸Ð¼ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ Ð¸ Ñ‚Ð°Ðº Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÐµÐ¼ Ð´Ð¾ Ñ‚ÐµÑ… Ð¿Ð¾Ñ€ Ð¿Ð¾ÐºÐ° ÑƒÑÐ»Ð¾Ð²Ð¸Ñ Ð½ÐµÐ²Ñ‹Ð¿Ð¾Ð»Ð½Ð¸Ñ‚ÑÑ
    const car = cars1[i];
    console.log(car);
}

// Ð­Ñ‚Ð¾ Ð²ÑÐµ Ð¼Ð¾Ð¶Ð½Ð¾ Ð·Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ð±Ð¾Ð»ÐµÐµ ÑÐ¾ÐºÑ€Ð°ÑˆÐµÐ½Ð½Ð¾Ð¼ Ñ†Ð¸ÐºÐ»Ðµ
for (let car of cars1) {
    console.log(car);
}');
INSERT INTO app.practice (id, `index`, comment) VALUES (16, '11) ÐžÐ±ÑŒÐµÐºÑ‚Ñ‹', 'const person = {
    firstName: &#039;Vlad&#039;,
    lastName: &#039;Mini&#039;,
    year: 1993,
    languages: [&#039;ru&#039;, &#039;en&#039;, &#039;de&#039;],
    hasWife: false,
    greet: function () {
        console.log(&#039;greet from person&#039;);
    }
}
// ÐšÐ°Ðº Ð¾Ð±Ñ€Ð°ÑˆÐ°Ñ‚ÑÑ Ðº Ð¾Ð±ÑŒÐµÐºÑ‚Ð°Ð¼
person.greet();
//Ð´Ð°Ð»ÐµÐµ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð²Ð¸Ð´Ð½Ð¾ Ð±Ñ‹Ð»Ð¾ Ð²ÑÐµ Ñ‚Ð¾ ÑÐ¼Ð¾Ñ‚Ñ€Ð¸Ð¼ Ñ‡ÐµÑ€ÐµÐ· ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ. Ð¡Ñ‚Ð°Ñ‚Ð¸ ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ ÑÑ‚Ð¾ Ñ‚Ð¾Ð¶Ðµ Ð¾Ð±ÑŒÐµÐºÑ‚
console.log(person.firstName);
console.log(person[&#039;lastName&#039;]);
// Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð² Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ Ð²Ð»Ð¾Ð¶Ð¸Ñ‚ÑŒ ÐºÐ»ÑŽÑ‡ÑŒ Ð¸ Ð·Ð°Ñ‚ÐµÐ¼ Ð²Ñ‹Ð·Ð²Ð°Ñ‚ÑŒ ÐµÐ³Ð¾
const key = &#039;year&#039;;
console.log(person[key]);
//ÐœÐµÐ½ÑÑ‚ÑŒ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ
person.hasWife = true;
//Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ ÐºÐ»ÑŽÑ‡
person.isProgrammer = true;
// ÐŸÐ¾ÑÐ¼Ð¾Ñ‚Ñ€ÐµÑ‚ÑŒ Ð²ÑÐµ ÑÐ»Ð¾Ð²Ð° Ð² Ð¾Ð±ÑŒÐµÐºÑ‚Ñ‹
console.log(person);');
INSERT INTO app.practice (id, `index`, comment) VALUES (17, '1)  Ð§Ð¸ÑÐ»Ð° number', 'const num = 42; // integer
const float = 42.42; // float
const pow = 10e3;  // 10000
console.log(Number.MAX_SAFE_INTEGER); // 9007199254740991  ÑÑ‚Ð¾ Ð¼Ð°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ð² integer
console.log(Math.pow(2,53)-1); // Ð¾Ñ‚Ð²ÐµÑ‚ Ð±ÑƒÐ´ÐµÑ‚ Ñ‚Ð°ÐºÐ¾Ð¹Ð¶Ðµ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð´Ð¾ÑÑ‚Ð¸Ñ‚ÑŒ ÑÑ‚Ð¾Ð³Ð¾ Ñ‡Ð¸ÑÐ»Ð° Ð½Ð°Ð´Ð¾ Ð²Ð¾Ð·Ð²ÐµÑÑ‚Ð¸ Ð² ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¸ Ð¾Ñ‚Ð½ÑÑ‚ÑŒ 1
console.log(Number.MIN_SAFE_INTEGER);  // -9007199254740991
console.log(Number.MAX_VALUE);  // 1.7976931348623157e+308
console.log(Number.MIN_VALUE);  // 5e-324
console.log(Number.POSITIVE_INFINITY);  // Ð§Ð˜Ð¡Ð›Ðž Ð‘Ð•Ð¡ÐšÐžÐÐ•Ð§ÐÐžÐ¡Ð¢Ð˜ Infinity
console.log(Number.NEGATIVE_INFINITY);  // Ð§Ð˜Ð¡Ð›Ðž Ð‘Ð•Ð¡ÐšÐžÐÐ•Ð§ÐÐžÐ¡Ð¢Ð˜ -Infinity
console.log(2/0 , 1/0); // Ð² Ð´Ð¶Ð°Ð²Ð° Ð¼Ð¾Ð¶Ð½Ð¾ Ð´ÐµÐ»Ð¸Ñ‚ÑŒ Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ Infinity Ð²Ð¾ Ð²ÑÐµÑ… ÑÐ»ÑƒÑ‡Ð¸ÑÑ…
console.log(Number.NaN); // Not A Number , Ñ…Ð¾Ñ‚Ñ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ Ð²Ñ‹Ð´Ð°ÐµÑ‚ Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ñ‡Ð¸ÑÐ»Ð¾  NaN
console.log(typeof NaN); // number
console.log(2 / undefined);  // Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ NaN
const weird = 2 / undefined;
console.log(Number.isNaN(weird));  // ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ð»Ð¸ ÑÑ‚Ð¾ Ñ‡Ð¸ÑÐ»Ð¾  NaN Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ true
console.log(Number.isNaN(42));  // false
console.log(Number.isFinite(Infinity));  // ÐºÐ¾Ð½ÐµÑ‡Ð½Ð° Ð»Ð¸ Ð±ÐµÑÐºÐ¾Ð½ÐµÑ‡Ð½Ð¾ÑÑ‚ÑŒ Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ false
console.log(Number.isFinite(42));  // ÐºÐ¾Ð½ÐµÑ‡Ð½Ð° Ð»Ð¸ Ñ‡Ð¸ÑÐ»Ð¾ 42 Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ true

// Ð¿ÐµÐ¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ ÑÑ‚Ñ€Ð¾ÐºÑƒ Ð² Ñ‡Ð¸ÑÐ»Ð¾ ÐµÑÑ‚ÑŒ Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ Ð¼ÐµÑ‚Ð¾Ð´Ð¾Ð² Ð¿ÐµÑ€ÐµÐ±Ñ€Ð°Ð·Ð¸Ñ‚ÑŒ ÑÑ‚Ñ€Ð¾ÐºÑƒ Ð² Ñ‡Ð¸ÑÐ»Ð¾.
const stringInt = &#039;40&#039;;   // Int - Ñ†ÐµÐ»Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾
const stringFloat = &#039;40.42&#039;;   // Float - Ñ‡Ð¸ÑÐ»Ð¾ Ñ Ð¿Ð»Ð°Ð²ÑƒÑŽÑ‰ÐµÐ¹ ÑÑ‚Ñ€Ð¾Ñ‡ÐºÐ¾Ð¹
console.log(stringInt + 2);  //  Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ 402 Ð¸ ÑÑ‚Ð¾ Ð±ÑƒÐ´ÐµÑ‚ ÑÑ‚Ñ€Ð¾ÐºÐ° (string)
console.log(Number.parseInt(stringInt) + 2);  //  ÑÑ‚Ð¾ ÑˆÐ¾Ð± Ð½ÐµÐ·Ð°Ð¿ÑƒÑ‚Ð°Ñ‚ÑÑ Ð² ÐºÐ°ÐºÐ¾Ð¹ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ ÑÑ‚Ð¾ Ð¿Ñ€ÐµÐ½Ð°Ð´Ð»ÐµÐ¶Ð¸Ñ‚
console.log(parseInt(stringInt) + 2);  // Ð¾Ð±Ñ‹Ñ‡Ð½Ð¾ ÑÑ‚Ð¾ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÑŽÑ‚ Ñ‡Ð°ÑÑ‚Ð¾
console.log(Number(stringInt) + 2); //// Ð”Ð°Ð»ÑŒÑˆÐµ Ð¾Ñ‚Ð²ÐµÑ‚ Ð±ÑƒÐ´ÐµÑ‚ 42
console.log(+stringInt + 2);

console.log(Number.parseFloat(stringFloat) + 2); // ÑÑ‚Ð¾ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð´Ð»Ñ Ñ‡Ð¸ÑÐ»Ð¾ Ñ Ð¿Ð»Ð°Ð²ÑƒÑŽÑ‰ÐµÐ¹ Ñ‚Ð¾Ñ‡ÐºÐ¾Ð¹
console.log(parseFloat(stringFloat) + 2);  // Ð”Ð°Ð»ÑŒÑˆÐµ Ð¾Ñ‚Ð²ÐµÑ‚ Ð±ÑƒÐ´ÐµÑ‚ 42,42
console.log(Number(stringFloat) + 2);
console.log(+stringFloat + 2);

//Ð’ js ÐµÑÑ‚ÑŒ Ð¿Ñ€Ð¾Ð±Ð»ÐµÐ¼Ñ‹ ÐºÐ°Ðº ÑÑ‡Ð¸Ñ‚Ð°Ñ‚ÑŒ Ñ‡Ð¸ÑÐ»Ð° Ð¼Ñ‹ Ð²Ð¾ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÐ¼ÑÑ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÐµÐ¹ ÐºÐ¾Ñ‚Ð¾Ñ€Ð¾Ðµ Ð¿Ñ€Ð¾ÑÑ‚Ð¾ ÑƒÐ±Ð¸Ñ€Ð°ÐµÑ‚ Ñ†Ð¸Ñ„Ñ€Ñ‹ Ð¿Ð¾ÑÐ»Ðµ Ð·Ð°Ð¿Ð¸Ñ‚Ð¾Ð¹
console.log(0.4 + 0.2); //  0.6000000000000001
console.log(+(0.4 + 0.2).toFixed(4)); // ÑÑ‚Ð¸Ð¼ Ð¼ÐµÑ‚Ð¾Ð´Ð¾Ð¼ ÑƒÐ±Ñ€Ð°Ð»Ð¸ Ñ†Ð¸Ñ„Ñ€Ñ‹ Ð¿Ð¾ÑÐ»Ðµ Ð·Ð°Ð¿ÑÑ‚Ð¾Ð¹ Ð½Ð¾ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð»Ð¾ÑÑŒ Ð² Ð¸Ñ‚Ð¾Ð³Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ°
// Ð¸ Ð¼Ñ‹ Ð¿Ð¾ÑÑ‚Ð°Ð²ÐµÐ»Ð¸ Ð¿Ð»ÑŽÑ‡Ð¸Ðº Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð¿ÐµÑ€ÐµÐ²ÐµÑÑ‚Ð¸ Ð²ÑÐµ ÑÑ‚Ð¾ Ð² Ñ‡Ð¸ÑÐ»Ð¾
console.log(parseFloat((0.4 + 0.2).toFixed(4))); // Ð»Ð¸Ð±Ð¾ Ð¼Ð¾Ð¶ÐµÐ¼ ÑÑ‚Ð¾ Ð²ÑÐµ Ð¾Ð±ÐµÑ€Ð½ÑƒÑ‚ÑŒ Ð² Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ  parseFloat');
INSERT INTO app.practice (id, `index`, comment) VALUES (18, '2) BigInt', 'ÐµÐ³Ð¾ Ð²ÐµÐ»Ð¸ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð¼Ñ‹ Ð¼Ð¾Ð³Ð»Ð¸ Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ñ‚ÑŒ  Ñ Ð±Ð¾Ð»ÑŒÑˆÐ¸Ð¼Ð¸ Ñ†Ð¸Ñ„Ñ€Ð°Ð¼Ð¸ Ð±Ð¾Ð»ÑŒÑˆÐµ Ñ‡ÐµÐ¼ Number.MAX_SAFE_INTEGER ÑÑ‚Ð¾ Ñ‚Ð¸Ð¿ Ð´Ð°Ð½Ð½Ñ‹Ñ…
console.log(9007199254740991n + 12351513565465465465454n);  // Ð»ÑŽÐ±Ñ‹Ðµ Ð²Ñ‹Ñ‡ÐµÑÐ»ÐµÐ½Ð¸Ðµ Ð¼Ð¾Ð³ÑƒÑ‚ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ñ‚ÑŒ BigInt+BigInt
console.log(-12351513565465465465454n);
//console.log(1235151356546546546545.31224n);  //ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ð¾ÑˆÐ¸Ð±ÐºÐ¾Ð¹, Ð¿Ð¾Ñ‚Ð¾Ð¼Ñƒ Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð´Ð»Ñ Ð¸Ð½Ñ‚Ð¾Ð²Ñ‹Ñ…

//console.log(10n - 4); // error Ð±ÑƒÐ´ÐµÑ‚ Ð¾ÑˆÐ¸Ð±ÐºÐ¾Ð¹ Ñ‚Ð°Ðº ÐºÐ°Ðº Ñ€Ð°Ð·Ð½Ñ‹Ðµ Ñ‚Ð¸Ð¿Ñ‹ Ð´Ð°Ð½Ð½Ñ‹Ñ…
console.log(parseInt(10n) - 4); // Ð¿Ñ€ÐµÐ¾Ð±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð±Ð¸Ð³ Ð¸Ð½Ñ‚ Ð² Ñ‡Ð¸ÑÐ»Ð¾
console.log(10n - BigInt(4)); // Ð¿Ñ€ÐµÐ¾Ð±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ð² Ð±Ð¸Ð³ Ð¸Ð½Ñ‚
console.log(5n / 2n); // Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ 2n Ñ‚Ð°Ðº ÐºÐ°Ðº ÑÑ‚Ð¾ Ð¸Ð½Ñ‚Ð¾Ð²Ð¾Ðµ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ');
INSERT INTO app.practice (id, `index`, comment) VALUES (19, '3) Math', '// ÐžÐ±ÑŠÐµÐºÑ‚ Math ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ð²ÑÑ‚Ñ€Ð¾ÐµÐ½Ð½Ñ‹Ð¼ Ð¾Ð±ÑŠÐµÐºÑ‚Ð¾Ð¼, Ñ…Ñ€Ð°Ð½ÑÑ‰Ð¸Ð¼ Ð² ÑÐ²Ð¾Ð¸Ñ… ÑÐ²Ð¾Ð¹ÑÑ‚Ð²Ð°Ñ… Ð¸ Ð¼ÐµÑ‚Ð¾Ð´Ð°Ñ… Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð½Ñ‹Ðµ Ð¼Ð°Ñ‚ÐµÐ¼Ð°Ñ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ ÐºÐ¾Ð½ÑÑ‚Ð°Ð½Ñ‚Ñ‹ Ð¸
// Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸. ÐžÐ±ÑŠÐµÐºÑ‚ Math Ð½Ðµ ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¾Ð½Ð°Ð»ÑŒÐ½Ñ‹Ð¼ Ð¾Ð±ÑŠÐµÐºÑ‚Ð¾Ð¼. Math Ð½Ðµ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚ Ñ Ñ‡Ð¸ÑÐ»Ð°Ð¼Ð¸ Ñ‚Ð¸Ð¿Ð° BigInt .
// Ð’ÑÐµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ñ‚ÑƒÑ‚
// https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Math
console.log(Math.E); // ÑÐºÑÐ¿Ð°Ð½ÐµÐ½Ñ‚Ð° 2.718281828459045
console.log(Math.PI);  // Ñ‡Ð¸ÑÐ»Ð¾ Ð¿Ð¸ 3.141592653589793

console.log(Math.sqrt(25));  // Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÑ‚ ÐºÐ²Ð°Ð°Ð´Ñ€Ð°Ñ‚Ð½Ñ‹Ð¹ ÐºÐ¾Ñ€ÐµÐ½ÑŒ Ð¾Ñ‚Ð²ÐµÑ‚ 5
console.log(Math.pow(5,3));  // Ð²Ð¾Ð·Ð²ÐµÐ´ÐµÐ½Ð¸Ðµ Ð² ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ 125
console.log(Math.abs(-42));  //Ð¿ÐµÑ€ÐµÐ²Ð¾Ð´Ð¸Ñ‚ Ð² Ð¿Ð¾Ð»Ð¾Ð¶Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ 42
console.log(Math.max(42, 12, 53, 10, 222));  //ÐºÐ°ÐºÐ¾Ðµ Ð¼Ð°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ð¿Ð¾ÐºÐ°Ð¶ÐµÑ‚ 222
console.log(Math.min(42, 12, 53, 10, 222));  //ÐºÐ°ÐºÐ¾Ðµ Ð¼Ð¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ð¿Ð¾ÐºÐ°Ð¶ÐµÑ‚ 10
console.log(Math.floor(4.9));  //  Ð¾ÐºÑ€ÑƒÐ³Ð»ÑÐµÑ‚ Ð´Ð¾ Ð±Ð»Ð¸Ð¶Ð°Ð¹ÑˆÐµÐ³Ð¾ Ð¼ÐµÐ½ÑŒÑˆÐµÐ³Ð¾ Ñ†ÐµÐ»Ð¾Ð³Ð¾ =  4
console.log(Math.ceil(4.9));  //   Ð¾ÐºÑ€ÑƒÐ³Ð»ÑÐµÑ‚ Ð´Ð¾ Ð±Ð»Ð¸Ð¶Ð°Ð¹ÑˆÐµÐ³Ð¾ Ð±Ð¾Ð»ÑŒÑˆÐ¾Ð³Ð¾ Ñ†ÐµÐ»Ð¾Ð³Ð¾ = 5
console.log(Math.round(4.4));  //  Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Ñ‡Ð¸ÑÐ»Ð¾, Ð¾ÐºÑ€ÑƒÐ³Ð»Ñ‘Ð½Ð½Ð¾Ðµ Ðº Ð±Ð»Ð¸Ð¶Ð°Ð¹ÑˆÐµÐ¼Ñƒ Ñ†ÐµÐ»Ð¾Ð¼Ñƒ =  4
console.log(Math.trunc(4.9));  //  Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ Ñ†ÐµÐ»ÑƒÑŽ Ñ‡Ð°ÑÑ‚ÑŒ Ñ‡Ð¸ÑÐ»Ð° Ð¿ÑƒÑ‚Ñ‘Ð¼ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð²ÑÐµÑ… Ð´Ñ€Ð¾Ð±Ð½Ñ‹Ñ… Ð·Ð½Ð°ÐºÐ¾Ð² = 4
console.log(Math.sin(4));  //  Ð¢Ð°Ðº Ð¶Ðµ Ñ‚ÑƒÑ‚ ÐµÑÑ‚ÑŒ Ñ‚Ñ€Ð¸ÐºÐ¾Ð½Ð¾Ð¼ÐµÑ‚Ñ€Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ ÑÐ¸Ð½ÑƒÑ, ÐºÐ¾ÑÐ¸Ð½ÑƒÑ, Ñ‚Ð°Ð½Ð³ÐµÐ½Ñ Ð¸ Ñ‚.Ð´.
console.log(Math.random());  // Ð²Ñ‹Ð²Ð¾Ð´Ð¸Ñ‚ Ð»ÑŽÐ±Ð¾Ðµ Ñ€Ð°Ð½Ð´Ð¾Ð¼Ð½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ = 0.5403517008206085

// Ð¼Ð°Ð»ÐµÐ½ÑŒÐºÐ¸Ð¹ Ð¿Ñ€Ð¸Ð¼ÐµÑ€ Ñ Ñ€Ð°Ð½Ð´Ð¾Ð¼Ð½Ñ‹Ð¼ Ñ‡Ð¸ÑÐ»Ð¾Ð¼
// Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ð¹ Ð²Ñ…Ð¾Ð´Ð¸Ñ‚ Ð² ÑÐµÐ±Ñ 2 Ñ‡Ð¸ÑÐ»Ð° Ð¼Ð¸Ð½ Ð¸ Ð¼Ð°ÐºÑ
function getRandomBetween(min, max) {
    // Ð’ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½ÑƒÑŽ Ð²ÐºÐ»Ð°Ð´Ñ‹Ð²Ð°ÐµÐ¼ Ð¼Ð¸Ð½ + Ñ€Ð°Ð½Ð´Ð¾Ð¼ (0,25468) ÑƒÐ¼Ð½Ð¾Ð¶Ð¸Ð½Ð°ÑŽ Ð½Ð° ÑÑƒÐ¼Ð¼Ñƒ Ñ‡Ð¸ÑÐ»Ðµ (Ð¼Ð°ÐºÑ +1 - Ð¼Ð¸Ð½)
    let rand = min + Math.random() * (max + 1 - min);
    return Math.floor(rand);
}
console.log(getRandomBetween(10, 100));  // Ð²Ñ‹Ð²Ð¾Ð´ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ Ð²ÑÐµÐ³Ð´Ð° Ñ€Ð°Ð·Ð½Ñ‹Ðµ Ñ‡Ð¸ÑÐ»Ð°');
INSERT INTO app.practice (id, `index`, comment) VALUES (20, 'ÑÑ‚Ñ€Ð¾ÐºÐ¸ string', 'const name = &#039;ÐŸÐ°ÑˆÐ°&#039;;
const age = 32;
function getAge() {
    return age;
}
// ÐœÐµÐ¶Ð´Ñƒ Ð¾Ð´Ð¸Ð½Ð°Ñ€Ð½Ñ‹Ñ… Ð¸ Ð´Ð²Ð¾Ð¹Ð½Ñ‹Ñ… ÑÐºÐ¾Ð±Ð¾Ðº Ð½ÐµÑ‚ Ñ€Ð°Ð·Ð½Ð¸Ñ†Ð¸ Ð¿Ð¾ÑÑ‚Ð¾Ð¼Ñƒ ÑÑ‚Ð°Ð²Ð¸Ð¼ Ð¾Ð´Ð¸Ð½Ð°Ñ€Ñ‹Ð½Ðµ.
const output1 = &#039;ÐŸÑ€Ð¸Ð²ÐµÑ‚, Ð¼ÐµÐ½Ñ Ð·Ð°Ð²ÑƒÑ‚ &#039; + name + &#039; Ð¸ Ð¼Ð¾Ð¹ Ð²Ð¾Ð·Ñ€Ð°ÑÑ‚ &#039; + age + &#039; Ð»ÐµÑ‚.&#039;;
console.log(output1);
// Ð•ÑÐ»Ð¸ Ð² Ñ‚ÐµÐºÑÑ‚Ðµ Ð¼Ð½Ð¾Ð³Ð¾ Ñ€Ð°Ð·Ð½Ñ‹Ñ… Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ñ… Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð·Ð°Ð¿Ð¸ÑÑ‹Ð²Ð°Ñ‚ÑŒ Ð¸Ñ… Ð±ÐµÐ· ÐºÐ¾Ð½Ñ†ÐµÐ½Ð°Ñ†Ð¸Ð¸ Ð° Ñ Ð¿Ð¾Ð¼Ð¾Ñ‰ÑŽ Ñ‚Ð°ÐºÐ¾Ð¹ Ñ„Ð¾Ñ€Ð¼Ñ‹ ÐºÐ°Ð²Ñ‹Ñ‡ÐºÐ° Ð½Ð° Ð±ÑƒÐºÐ²Ðµ Ñ‘
const output2 = `ÐŸÑ€Ð¸Ð²ÐµÑ‚, Ð¼ÐµÐ½Ñ Ð·Ð¾Ð²ÑƒÑ‚ ${name} Ð¸ Ð¼Ð¾Ð¹ Ð²Ð¾Ð·Ñ€Ð²ÑÑ‚ ${getAge()} Ð»ÐµÑ‚ Ð¸ Ð¿Ð¾ÑÑ‚Ð¾Ð¼Ñƒ Ñƒ Ð¼ÐµÐ½Ñ ${age &lt; 18 ? &#039;Ð½ÐµÑ‚Ñƒ&#039; : &#039;ÐµÑÑ‚ÑŒ&#039;} Ð¿Ñ€Ð°Ð²Ð°`;
// Ñ‚ÑƒÑ‚ Ð¼Ð¾Ð¶Ð½Ð¾ Ð·Ð°Ð¿Ð¸ÑÑ‹Ð²Ð°Ñ‚ÑŒ: Ð¿Ñ€Ð¾ÑÑ‚Ñ‹Ðµ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ðµ, Ñ„ÑƒÐ½ÐºÑ†Ð¸Ðµ Ð¸ Ñ‚ÐµÑ€Ð½Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ñ‹
// ÑÐºÐ¾Ñ€Ð°ÑˆÐ°Ð½Ð°Ñ Ñ„Ð¾Ñ€Ð¼Ð° Ð»Ð¾Ð³Ð¸ÐºÐµ : Ð²Ð¾Ð·Ñ€Ð°ÑÑ‚ Ð¼ÐµÐ½ÑŒÑˆÐµ 18 Ñ‚Ð¾ Ð±ÑƒÐ´ÐµÑ‚ Ð½ÐµÑ‚Ñƒ ÐµÑÐ»Ð¸ Ð±Ð¾Ð»ÑŒÑˆÐµ ÐµÑÑ‚ÑŒ
console.log(output2);
// Ð¸ Ñ‚Ð°Ðº Ð·Ð°Ñ‡ÐµÐ¼ ÑÑ‚Ð¾ Ð½Ð°Ð¼ Ð½Ð°Ð´Ð¾, Ð° Ñ‡Ñ‚Ð¾ Ð±Ñ‹ Ð² html Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ Ñ‚ÐµÐ³Ð¸ Ð´Ð°Ð¶Ðµ ÐµÑÐ»Ð¸ Ñ Ð½Ð¾Ð²Ð¾Ð¹ ÑÑ‚Ñ€Ð¾ÐºÐ¸ ÑÑ‚Ð¾ Ð²ÑÐµ ÑÐ¾Ñ…Ñ€Ð°Ð½Ð°ÐµÑ‚ÑÑ
const output3 = `
  &lt;div&gt;This is div&lt;/div&gt;
  &lt;p&gt;this is o&lt;/p&gt;
`;
console.log(output3);

const test = &#039;Ð¢ÐµÑÑ‚ ÑÐ»Ð¾Ð²Ð¾ Ð´Ð»Ñ Ð¿Ñ€Ð°ÐºÑ‚Ð¸ÐºÐµ&#039;;

console.log(test.length);  //  ÑƒÐ·Ð½Ð°Ñ‚ÑŒ Ð´Ð»Ð¸Ð½Ñƒ ÑÐ¸Ð¼Ð±Ð¾Ð»Ð¾Ð² (Ð¿Ñ€Ð¾Ð±ÐµÐ» Ñ‚Ð¾Ð¶Ðµ ÑÐ¸Ð¼Ð±Ð¾Ð»
console.log(test.toUpperCase());  // Ð’ÑÐµ Ñ Ð±Ð¾Ð»ÑŒÑˆÐ¾Ð¹ Ð±ÑƒÐºÐ²Ñ‹
console.log(test.toLowerCase());  // Ð’ÑÐµ Ñ Ð¼Ð°Ð»ÐµÐ½ÑŒÐºÐ¾Ð¹ Ð±ÑƒÐºÐ²Ñ‹
console.log(test.charAt(0));  // Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ñ‚ÑŒ ÑÐ¸Ð¼Ð±Ð¾Ð» ( Ð¾Ñ‚ÑÑ‡ÐµÑ‚ Ð½Ð°Ñ‡Ð¸Ð½Ð°ÐµÑ‚ÑÑ Ñ &quot;0&quot;)
console.log(test.indexOf(&#039;ÑÐ»Ð¾Ð²&#039;));  // Ð¸ÑˆÐ¸Ñ‚ Ñ‚Ðµ ÑÐ¸Ð¼Ð±Ð¾Ð»Ñ‹ ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ñ‚Ñ‹ ÑƒÐºÐ¾Ð·Ð°Ð» Ð² ÑÐºÐ¾Ð±ÐºÐ°Ñ…. Ð’Ñ‹Ð´Ð°ÐµÑ‚ Ñ‡Ð¸ÑÐ»Ð¾ Ð¾Ñ‚ÐºÑƒÐ´Ð° Ð¾Ð½ Ð½Ð°Ñ‡Ð¸Ð½Ð°ÐµÑ‚ÑÑ, ÐµÑÐ»Ð¸ Ð²Ñ‹Ð¹Ð´ÐµÑ‚ -1 Ñ‚Ð¾ Ñ‚Ð°ÐºÐ¾Ð³Ð¾ ÑÐ¸Ð¼Ð±Ð¾Ð»Ð° Ð½Ðµ ÑÐµÑˆÐµÑÑ‚Ð²ÑƒÐµÑ‚
console.log(test.startsWith(&#039;Ð¢ÐµÑÑ‚&#039;));  // ÑÑ‚Ð°Ñ€Ñ‚ÑƒÐµÑ‚ Ð»Ð¸ ÑÑ‚Ñ€Ð¾ÐºÐ° Ñ Ð·Ð°Ð´Ð°Ð½Ñ‹Ð¼ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸ÐµÐ¼ true/false
console.log(test.endsWith(&#039;Ð¢ÐµÑÑ‚&#039;));  // Ð·Ð°ÐºÐ°Ð½Ñ‡Ð¸Ð²Ð°ÐµÑ‚ÑÑ Ð»Ð¸ ÑÑ‚Ñ€Ð¾ÐºÐ° Ñ Ð·Ð°Ð´Ð°Ð½Ð½Ñ‹Ð¼Ð¸ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸ÑÐ¼Ð¸  true/false
console.log(test.repeat(3));  //  ÐŸÐ¾Ð²Ñ‚Ð¾Ñ€ÑÑ‚ÑŒ ÑÑ‚Ñ€Ð¾ÐºÑƒ n ÐºÐ¾Ð»Ð¸Ñ‡ÐµÑÑ‚Ð²Ð¾ Ñ€Ð°Ð·
const string = &#039;    password    &#039;;
console.log(string.trim());  //  ÑƒÐ±Ñ€Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹
console.log(string.trimLeft());  // ÑƒÐ±Ñ€Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ ÑÐ»ÐµÐ²Ð°
console.log(string.trimRight());  //  ÑƒÐ±Ñ€Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ ÑÐ¿Ñ€Ð°Ð²Ð°

function logPerson(s, name, age) {
    if (age &lt; 0) {
        age = &#039;Ð•ÑˆÐµ Ð½Ðµ Ñ€Ð°Ð´Ð¸Ð»ÑÑ&#039;;
    }
    return `${s[0]}${name}${s[1]}${age}${s[2]}`;
}

const personName = &#039;ÐŸÐ°ÑˆÐ°&#039;;
const personName2 = &#039;ÐœÐ°ÐºÑÐ¸Ð¼&#039;;
const personAge = 32;
const personAge2 = -10;

const out = logPerson `Ð˜Ð¼Ñ: ${personName}, Ð’Ð¾Ð·Ñ€Ð°ÑÑ‚: ${personAge}!`;
const out2 = logPerson `Ð˜Ð¼Ñ: ${personName2}, Ð’Ð¾Ð·Ñ€Ð°ÑÑ‚: ${personAge2}!`;
console.log(out);
console.log(out2);
');
INSERT INTO app.practice (id, `index`, comment) VALUES (21, '1) Ð¤ÑƒÐ½ÐºÑ†Ð¸Ð¸', '// Ð”Ð²Ð° Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ð° (Function Declaration (ÐžÐ±ÑŠÑÐ²Ð»ÐµÐ½Ð¸Ðµ Ð¤ÑƒÐ½ÐºÑ†Ð¸Ð¸))
function sayHi1() {
  // ...
}
// Ð’ Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ð½ÐµÑ‚Ñƒ Ñ‚Ð¾Ñ‡ÐºÐ° Ñ Ð·Ð°Ð¿ÑÑ‚Ð¾Ð¹ Ð° Ð²Ð¾ Ð²Ñ‚Ð¾Ñ€Ð¾Ð¹ ÐµÑÑ‚ÑŒ (Function Expression (Ð¤ÑƒÐ½ÐºÑ†Ð¸Ð¾Ð½Ð°Ð»ÑŒÐ½Ð¾Ðµ Ð’Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ))
let sayHi = function() {
  // ...
};
// ÐžÐ±ÑŒÑÑÐ½ÐµÐ½Ð¸Ðµ
// ÐÐµÑ‚ Ð½ÐµÐ¾Ð±Ñ…Ð¾Ð´Ð¸Ð¼Ð¾ÑÑ‚Ð¸ Ð² ; Ð² ÐºÐ¾Ð½Ñ†Ðµ Ð±Ð»Ð¾ÐºÐ¾Ð² ÐºÐ¾Ð´Ð° Ð¸ ÑÐ¸Ð½Ñ‚Ð°ÐºÑÐ¸Ñ‡ÐµÑÐºÐ¸Ñ… ÐºÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ†Ð¸Ð¹, ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¸Ñ… Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÑŽÑ‚, Ñ‚Ð°ÐºÐ¸Ñ… ÐºÐ°Ðº if { ... },
// for { }, function f { } Ð¸ Ñ‚.Ð´.
// Function Expression Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐµÑ‚ Ð²Ð½ÑƒÑ‚Ñ€Ð¸ ÑÐµÐ±Ñ Ð¸Ð½ÑÑ‚Ñ€ÑƒÐºÑ†Ð¸Ð¸ Ð¿Ñ€Ð¸ÑÐ²Ð°Ð¸Ð²Ð°Ð½Ð¸Ñ let sayHi = ...; ÐºÐ°Ðº Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ. Ð­Ñ‚Ð¾ Ð½Ðµ Ð±Ð»Ð¾Ðº ÐºÐ¾Ð´Ð°,
// Ð° Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ Ñ Ð¿Ñ€Ð¸ÑÐ²Ð°Ð¸Ð²Ð°Ð½Ð¸ÐµÐ¼. Ð¢Ð°ÐºÐ¸Ð¼ Ð¾Ð±Ñ€Ð°Ð·Ð¾Ð¼, Ñ‚Ð¾Ñ‡ÐºÐ° Ñ Ð·Ð°Ð¿ÑÑ‚Ð¾Ð¹ Ð½Ðµ Ð¾Ñ‚Ð½Ð¾ÑÐ¸Ñ‚ÑÑ Ð½ÐµÐ¿Ð¾ÑÑ€ÐµÐ´ÑÑ‚Ð²ÐµÐ½Ð½Ð¾ Ðº Function Expression, Ð¾Ð½Ð°
// Ð»Ð¸ÑˆÑŒ Ð·Ð°Ð²ÐµÑ€ÑˆÐ°ÐµÑ‚ Ð¸Ð½ÑÑ‚Ñ€ÑƒÐºÑ†Ð¸ÑŽ.

// Ð’ Ñ‡ÐµÐ¼ Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ 2 Ñ‚Ð¸Ð¿Ð°Ð¼Ð¸ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹  Declaration  vs Expression. Ð’ Ñ‚Ð¾Ð¼ Ñ‡Ñ‚Ð¾ Ð² Declaration Ð¾Ð±Ñ€Ð°ÑˆÐµÐ½Ð¸Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð¼Ð¾Ð¶ÐµÑ‚
// Ð±Ñ‹Ñ‚ÑŒ Ð¸ Ð´Ð¾ Ð¸ Ð¿Ð¾ÑÐ»Ðµ Ð½ÐµÐµ. Ð Ð² Expression Ð¾Ð±Ñ€Ð°ÑˆÐµÐ½Ð¸Ðµ Ðº ÑÑ‚Ð¾Ð¹ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð¿Ð¾ÑÐ»Ðµ Ð½ÐµÐµ!!!
// Function Declaration
function greet(name) {
    console.log(&#039;ÐŸÑ€Ð¸Ð²ÐµÑ‚ - &#039;, name);
}
// Function Expression
const  greet2 = function greet2 (name) {
    console.log(&#039;ÐŸÑ€Ð¸Ð²ÐµÑ‚ 2 - &#039;, name);
};
greet(&quot;Ð›ÑƒÐ½Ð°&quot;);
greet2(&quot;Ð›ÑƒÐ½Ð°&quot;);

console.log(typeof greet); // Ð£Ð·Ð½Ð°Ñ‚ÑŒ Ñ‡Ñ‚Ð¾ Ð·Ð° Ñ‚Ð¸Ð¿ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð¾Ð¹
console.dir(greet); // Ð£Ð·Ð½Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð±Ð¾Ð»ÐµÐµ Ð¿Ð¾Ð´Ñ€Ð¾Ð±Ð½Ð¾');
INSERT INTO app.practice (id, `index`, comment) VALUES (22, '2) ÐÐ½Ð°Ð½Ð¸Ð¼Ð½Ñ‹Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸', '// let counter = 0;
// setInterval(function () {
//     console.log(++counter);
// },1000);
// Ð½Ð¾ Ð¼Ð¾Ð¶Ð½Ð¾ ÑƒÑÐ¾Ð²ÐµÑ€ÑˆÐµÐ½ÑÑ‚Ð²Ð¾Ð²Ð°Ñ‚ÑŒ Ð½Ð°ÑˆÑƒ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ

let counter = 0;
const interval = setInterval(function () {
    if (counter === 5 ) {
        clearInterval(interval);
    } else {
        console.log(++counter);
    }
    }, 10)
');
INSERT INTO app.practice (id, `index`, comment) VALUES (23, '3) Ð¡Ñ‚Ñ€ÐµÐ»Ð¾Ñ‡Ð½Ñ‹Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸', '// Ð­Ñ‚Ð¾ Ð¾Ð±Ñ‹Ñ‡Ð½Ð°Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð¸ Ð¼Ðµ ÐµÐµ ÑÐµÐ¹Ñ‡Ð°Ñ Ð¿ÐµÑ€ÐµÐ´ÐµÐ»Ð°ÐµÐ¼ Ð² ÑÑ‚Ñ€ÐµÐ»Ð¾Ñ‡Ð½ÑƒÑŽ
function greet3(name) {
    console.log(&#039;Hi - &#039;, name);
}
// Ð­Ñ‚Ð¾ ÑÑ‚Ñ€ÐµÐ»Ð¾Ñ‡Ð½Ð°Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ
const arrow = (name) =&gt; {
    console.log(&#039;hi - &#039;, name);
}
// Ð½Ð¾ ÐµÐµ Ð¼Ð¾Ð¶Ð½Ð¾ ÑÐ¾ÐºÑ€Ð°Ñ‚Ð¸Ñ‚ÑŒ Ð² Ð¾Ð´Ð½Ñƒ ÑÑ‚Ñ€Ð¾ÐºÑƒ
const arrow2 = name =&gt; console.log(&#039;hi - &#039;, name);

arrow(&#039;Pasha&#039;);
arrow2(&#039;Toma&#039;);
// ÑÑ‚Ñ€ÐµÐ»Ð¾Ñ‡Ð½Ð°Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð² Ð²Ð¾Ð·Ð²ÐµÐ´ÐµÐ½Ð¸Ðµ Ð² ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ
const pow2 = num =&gt; num ** 2; // ÑÐ¾Ð·Ð´Ð°ÐµÐ¼ ÑÑ‚Ñ€ÐµÐ»Ð¾Ñ‡Ð½ÑƒÑŽ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ ÐºÐ¾Ñ‚Ð¾Ñ€Ð°Ñ Ð²ÐºÐ»ÑŽÑ‡Ð°ÐµÑ‚ ÑÐµÐ±Ñ num Ð¸ Ð´Ð°Ð»ÑŒÑˆÐµ Ñ€ÐµÑˆÐµÐ½Ð¸Ðµ Ñ‡Ñ‚Ð¾ Ð²Ð¾Ñ‚ ÑÑ‚Ð¾ Ð¼Ñ‹ Ð²Ð¾Ð·Ð²Ð¾Ð´Ð¸Ð¼ Ð² ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ
console.log(pow2(5));');
INSERT INTO app.practice (id, `index`, comment) VALUES (24, '4) ÐŸÐ°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ñ‹ Ð¿Ð¾ ÑƒÐ¼Ð¾Ð»Ñ‡Ð°Ð½Ð¸ÑŽ', '// Ð£ÑÐ»Ð¸ Ð¼Ñ‹ ÑÐ¾Ð·Ð´Ð°Ð»Ð¸ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð¸ Ð² Ð½ÐµÐµ Ð²Ð½ÐµÑÐ»Ð¸ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ñ‹ Ñ‚Ð¾ ÐºÐ¾Ð³Ð´Ð° Ð½Ð° Ð½ÐµÐµ ÑÑ‹Ð»Ð°ÑÑÑŒ Ð²ÐµÐ»Ð¸ Ð½Ðµ Ð²ÑÐµ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ñ‹ Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ñ‚ NaN
// Ð§Ñ‚Ð¾ Ð±Ñ‹ Ð½ÐµÐ±Ñ‹Ð»Ð¾ Ñ‚Ð°ÐºÐ¾Ð¹ Ð¾ÑˆÐ¸Ð±ÐºÐ¸ Ð¼Ð¾Ð¶Ð½Ð¾ Ð¼Ð¾Ð¶Ð½Ð¾ Ð²ÐµÑÑ‚Ð¸ Ð·Ð°Ð´Ð°Ð½Ñ‹Ðµ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ñ‹. Ð•ÑÐ»Ð¸ Ð¸Ñ… Ð½Ðµ Ð²ÐµÐ´ÑƒÑ‚ Ñ‚Ð¾ Ð¾Ð½Ð¸ Ð±ÑƒÐ´ÑƒÑ‚ ÑÑ‚Ð°Ð½Ð´Ð°Ñ€Ñ‚Ð½Ñ‹Ðµ.
const sum = (a = 40, b = a * 2) =&gt; a + b; // Ñ‚ÑƒÑ‚ Ð¿Ð¾ÐºÐ°Ð·Ð°Ð½Ð¾ Ñ‡Ñ‚Ð¾ Ð° = 40 , b= Ñ‚Ð¾Ñ‡Ñ‚Ð¾ Ð±ÑƒÐ´ÐµÑ‚ Ð² Ð½Ð¾ ÑƒÐ¼Ð½Ð¾Ð¶ÐµÐ½Ð¾Ðµ Ð½Ð° 2. Ð° Ð²Ð¾Ð¾Ð±ÑˆÐµ ÑÑ‚Ð¾ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ ÑÐ»Ð¾Ð¶ÐµÐ½Ð¸Ðµ
console.log(sum(41,5)); // Ð²Ð¸Ð´ÐµÐ¼ Ð¾Ñ‚Ð²ÐµÑ‚ Ñ‡Ñ‚Ð¾ Ð¼Ñ‹ Ð²Ð½ÐµÑÐ»Ð¸ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ñ‹ Ð¸ Ð¾Ð½ ÑÐ»Ð¾Ð¶Ð¸Ð» 2 Ñ‡Ð¸ÑÐ»Ð°
console.log(sum());  // Ð²Ð¸Ð´ÐµÐ¼ Ð¾Ñ‚Ð²ÐµÑ‚ Ñ‡Ñ‚Ð¾ Ð±ÑƒÐ´ÐµÑ‚ ÐµÑÐ»Ð¸ Ð¼Ñ‹ Ð½ÐµÑ‡ÐµÐ³Ð¾ Ð½Ðµ ÑÐ»Ð¾Ð¶ÐµÐ¼

//  Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€ rest Ð¾Ð±Ð¾Ð·Ð½Ð°Ñ‡Ð°ÐµÑ‚ÑÑ ÐºÐ°Ðº ...all Ð­Ñ‚Ð¾Ñ‚ Ð¾Ð¿ÐµÑ€Ð°Ñ‚Ð¾Ñ€ Ð½ÑƒÐ¶ÐµÐ½ Ð½Ð°Ð¼ ÐµÑÐ»Ð¸ Ð¼Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ð¼ Ð¿ÐµÑ€ÐµÐ´Ð°Ñ‚ÑŒ Ð² Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð¼Ð½Ð¾Ð¶ÐµÑÑ‚Ð²Ð¾ Ñ€Ð°Ð·Ð½Ñ‹Ñ… Ñ‡Ð¸ÑÐµÐ»
function sumAll(...all) {
    console.log(all);
}
sumAll(1, 2, 3, 4, 5);
// Ð¾Ð½ Ð·Ð°Ð¿Ð¸ÑÑ‹Ð²Ð°ÐµÑ‚ Ð² Ð¼Ð°ÑÐ¸Ð²
// Ð¸ Ñ‚ÑƒÑ‚ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ñ‚ÑŒ Ñ ÑÑ‚Ð¸Ð¼ ÐºÐ°Ðº Ñ Ð¿Ð°ÑÐ¸Ð²Ð¾Ð¼.
// Ð”Ð¾Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÐ¼ ÑÑ‚Ñƒ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ñ‡Ñ‚Ð¾ Ð±Ñ‹ ÑƒÐ·Ð½Ð°Ñ‚ÑŒ ÑÑƒÐ¼Ð¼Ñƒ Ð²ÑÐµÑ… ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð¾Ð²
function summAll (...all) {
    let result = 0;
    for (let num of all) {
        result += num;
    }
    return result;
}

const res = summAll(1, 2, 3, 4, 5, 6, 7);
console.log(res);

// Ð¢ÑƒÑ‚ Ð½Ð°Ð³Ð»ÑÐ´Ð½Ð¾ Ð²Ð¸Ð´Ð½Ð¾ Ñ‡Ñ‚Ð¾ Ð²ÑÐµ Ð¾Ð±ÐµÑ€Ð½ÑƒÑ‚Ð° Ð² Ð¼Ð°ÑÐ¸Ð² Ð¸ Ð¼Ð¾Ð¶ÐµÐ¼ Ð¼Ñ‹ Ñ Ð½Ð¸Ð¼ Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ñ‚ÑŒ Ð´Ð°Ð»ÑŒÑˆÐµ
function sumAll3(...all) {
    console.log(all);
}
sumAll3(&#039;Ð’Ð°ÑÑ&#039;, &#039;ÐŸÐµÑ‚Ñ&#039;, &#039;Ð’Ð¾Ð²Ð°&#039;, &#039;ÐÐ½Ñ‚Ð¾Ð½&#039;, &#039;ÐŸÐ°Ð»ÐµÑ†&#039;);');
INSERT INTO app.practice (id, `index`, comment) VALUES (25, '5) Ð—Ð°Ð¼Ñ‹ÐºÐ°Ð½Ð¸Ðµ', '// Ð—Ð°Ð¼Ñ‹ÐºÐ°Ð½Ð¸Ðµ ÑÑ‚Ð¾ Ñ Ð¾Ð´Ð½Ð¾Ð¹ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÐ¼ Ð´Ñ€ÑƒÐ³ÑƒÑŽ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð¸ Ð´Ð°Ð»ÑŒÑˆÐµ Ð¸Ð´ÐµÑ‚ ÐºÐ°ÐºÐ°ÐµÑ‚Ð° Ñ€Ð°Ð±Ð¾Ñ‚Ð°
// Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¿Ð¾Ð´Ñ…Ð¾Ð´Ð¸Ñ‚ Ð½Ð° Ð¿Ñ€Ð¸Ð²Ð°Ñ‚Ð½Ñ‹Ñ… Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ñ….
 function creteMember(name) {     // Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð¸ Ð¿Ñ€Ð¸Ð½Ð¸Ð¼Ð°ÐµÐ¼ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€ name
     return function (lastName) {   // Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÐ¼ Ð´Ñ€ÑƒÐ³ÑƒÑŽ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ ÐºÐ¾Ñ‚Ð¾Ñ€Ð°Ñ Ð¿Ñ€Ð¸Ð½Ð¸Ð¼Ð°ÐµÑ‚ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€ lastName
         console.log(name + lastName);  // ÑÑ‚Ð° Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð²Ñ‹Ð²Ð¾Ð´Ð¸Ñ‚ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒ Ð¸ ÑÐ¾ÐµÐ´ÐµÐ½ÑÐµÑ‚ ÑÐµÐ±Ñ  name + lastName
     }
 }

 const logWithLastName = creteMember(&#039;Pasha&#039;);  // Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ Ð¸ ÑƒÐºÐ°Ð·Ñ‹Ð²Ð°ÐµÐ¼ Ð¸Ð¼Ñ
console.log(logWithLastName(&#039; Mini&#039;));  // Ð¸ Ð´Ð°Ð»ÑŒÑˆÐµ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð²Ñ‹Ð·Ð²Ð°Ñ‚ÑŒ Ð² ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ Ð²Ñ‚Ð¾Ñ€Ð¾Ð¹ ÑÐ»Ð¾Ð²Ð¾
console.log(logWithLastName(&#039; Lessy&#039;));');
INSERT INTO app.practice (id, `index`, comment) VALUES (26, 'ÐœÐ°ÑÐ¸Ð²Ñ‹', 'const cars = [&#039;ÐœÐ°Ð·Ð´Ð°&#039;, &#039;Ð¤Ð¾Ñ€Ð´&#039;, &#039;Ð‘ÐœÐ’&#039;, &#039;ÐœÐµÑ€ÑÐµÐ´ÐµÑ&#039;]; // Ð’ Ð¼Ð°ÑÐ¸Ð²Ð°Ñ… Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ñ…Ñ€Ð°Ð½Ð¸Ñ‚ÑŒ Ð²ÑÐµ string
const fib = [1, 1, 2, 3, 5, 12];  // number
const allDamp = [123, &#039;42&#039;, true, {}];  // Ð¸ Ð´Ð°Ð¶Ðµ Ð»Ð¾Ð³Ð¸ÐºÑƒ Ð±ÑƒÐ»Ð¸Ð°Ð½ Ð¸ Ñ‚.Ð´.
// Ð¡Ð»Ð¾Ð¶Ð½Ñ‹Ð¹ Ð¼Ð°ÑÐ¸Ð²
const people = [
    {name: &#039;Vladelen&#039;, budget: 4200},
    {name: &#039;Elena&#039;, budget: 3500},
    {name: &#039;Victoria&#039;, budget: 1700}
]

cars.push(&#039;Ð ÑƒÐ½Ð¾&#039;);  // Ð´Ð¾Ð±Ð¾Ð²Ð»ÑÐµÑ‚ Ð² ÐºÐ¾Ð½Ñ†Ðµ Ð¼Ð°ÑÐ¸Ð²Ð° ÑÐ»Ð¸Ð¼ÐµÐ½Ñ‚
cars.unshift(&#039;Volga&#039;);  // Ð”Ð¾Ð±Ð¾Ð²Ð»Ð°ÑÐµÑ‚ Ð² Ð½Ð°Ñ‡Ð°Ð»Ð¾ Ð¼Ð°ÑÐ¸Ð²Ð° ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚
cars.shift(); // Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿ÐµÑ€Ð²Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ñ Ð¼Ð°ÑÐ¸Ð²Ð° Ð¸ Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÑ‚ ÐµÐ³Ð¾
const firstItem = cars.shift();  // Ð¼Ñ‹ ÑÑ‚Ð¾ Ð²Ð¸Ð´ÐµÐ¼
console.log(firstItem);
const lastItems = cars.pop(); // Ð£Ð´Ð¾Ð»ÑÐµÑ‚ Ð² ÐºÐ¾Ð½Ñ†Ðµ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð¼Ð°ÑÐ¸Ð²Ð° Ð¸ Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÑ‚ ÐµÐ³Ð¾ Ð¾Ð±Ñ€Ð°Ñ‚Ð½Ð¾
console.log(lastItems);
console.log(cars);
console.log(cars.reverse()); // ÐŸÐµÑ€ÐµÐ²Ð¾Ñ€Ð°Ñ‡Ð¸Ð²Ð°ÐµÑ‚ Ð¸ ÐµÐ³Ð¾ Ð¼ÑƒÑ‚Ð¸Ñ€ÑƒÐµÑ‚

// Ð—Ð°Ð´Ð°Ñ‡ÐºÐ° 1
// Ð•ÑÑ‚ÑŒ Ñ‚ÐµÐºÑ, ÑÐ´ÐµÐ»Ð°Ñ‚ÑŒ Ð¸Ð¼ Ð·ÐµÑ€ÐºÐ°Ð»ÑŒÐ½Ð¾Ðµ Ð¾Ñ‚Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ
const text1 = &#039;ÐŸÑ€Ð¸Ð²ÐµÑ‚, Ð¼Ñ‹ Ð¸Ð·ÑƒÑ‡Ð°ÐµÐ¼ JavaScript&#039;;
const reverseText = text1.split(&#039;&#039;).reverse().join(&#039;&#039;);
// .split - Ñ€Ð°Ð·Ð±Ð¸Ñ‚Ð¸Ðµ Ñ‚ÐµÐºÑÑ‚Ð° Ð½Ð° Ñ‚Ð¾ Ñ‡Ñ‚Ð¾ Ð² ÑÐºÐ°Ð¾Ð±Ð¾Ñ‡ÐºÐ°Ñ… Ð¸ Ð¾Ð±ÐµÑ€Ñ‚Ñ‹Ð²Ð°ÐµÑ‚ Ð² Ð¼Ð°ÑÐ¸Ð², .reverse - Ñ€Ð°Ð·Ð²Ð°Ñ€Ð°Ñ‡Ð¸Ð²Ð°ÐµÑ‚ Ñ‚ÐµÐºÑÑ‚,
// .join - ÑÐ¾ÐµÐ´Ð¸Ð½ÑÐµÑ‚ Ð¼Ð°ÑÐ¸Ð² Ð² ÑÑ‚Ñ€Ð¾ÐºÑƒ Ð² ÑÐºÐ¾Ð±ÐºÐ°Ñ… Ñ‡ÐµÐ¼ ÑÐ¾ÐµÐµÐ´ÐµÐ½Ð¸Ñ‚ÑŒ
console.log(reverseText)

// Ð¿Ñ€Ð¾Ð´Ð¾Ð»Ð¶ÐµÐ½Ð¸Ðµ Ñ€Ð°Ð±Ð¾Ñ‚Ñ‹ Ñ Ð¼Ð°ÑÐ¸Ð²Ð°Ð¼Ð¸

const cars1 = [&#039;ÐœÐ°Ð·Ð´Ð°&#039;, &#039;Ð¤Ð¾Ñ€Ð´&#039;, &#039;Ð‘ÐœÐ’&#039;, &#039;ÐœÐµÑ€ÑÐµÐ´ÐµÑ&#039;];

const index = cars1.indexOf(&#039;Ð‘ÐœÐ’&#039;); // ÐŸÐ¾Ð¸ÑÐº Ð¿Ð¾ Ð¼Ð°ÑÐ¸Ð²Ñƒ, Ð²Ñ‹Ð´Ð°ÑÑ‚ 2. ÐžÐ½ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚ Ñ Ð¿Ñ€Ð¸Ð¼Ð¸Ñ‚Ð¸Ð²Ð½Ñ‹Ð¼Ð¸ Ð´Ð°Ð½Ð½Ð°Ð¼Ð¸
cars1[index] = &#039;Porshe&#039;;  // Ð¢ÑƒÑ‚ ÑÑ‚Ð°Ñ‚Ð¸ ÐºÐ¾ÐºÑ€Ð°Ñ Ð¼Ð¾Ð¶ÐµÐ¼ Ð¿Ñ€Ð¸Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÑÑ‚Ð¾ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾
console.log(cars1);

// ÐŸÐ¾Ð¸ÑÐº Ð¿Ð¾ Ð¼Ð½Ð¾Ð³Ð¾Ð¼ÐµÑ€Ð½Ð¾Ð¼Ñƒ Ð¼Ð°ÑÐ¸Ð²Ñƒ , Ð¾Ð±Ñ€Ð°ÑˆÐ°ÐµÐ¼ÑÑ Ðº callback Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð¼Ð°ÑÐ¸Ð²Ð° person
const index1 = people.findIndex(function (person) {
    // Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÐ¼ Ñ‡Ñ‚Ð¾  person.budget Ð±ÑƒÐ´ÐµÑ‚ ÑÑ‚Ñ€Ð¾Ð³Ð¾Ðµ Ñ€Ð°Ð²Ð½ÐµÑÑ‚Ð²Ð¾ Ð½Ð° 3500
    return person.budget === 3500;
    });
// ÐµÑÐ»Ð¸ Ð¼Ñ‹ Ð¿Ð¾ÑÐ¼Ð¾Ñ‚Ñ€Ð¸Ð¼ Ð½Ð° index1 Ð² ÐºÐ¾Ð½ÑÐ¾Ð»Ðµ Ñ‚Ð¾ ÑƒÐ²Ð¸Ð´ÐµÐ¼ Ñ‡Ñ‚Ð¾ Ð½Ð°Ð¼ Ð²Ñ‹Ð´Ð°ÑÑ‚ 2 ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚ Ð¸ ÐµÑÐ»Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»Ð¾Ð¶ÐµÐ¼ ÐµÐ³Ð¾ ÐºÐ°Ðº Ð½Ð¾Ñ€Ð¼Ðµ Ñ‚Ð¾ Ð²Ñ‹Ð´Ð°ÑÑ‚ ÑÑ‚Ñ€Ð¾ÐºÑƒ
console.log(people[index1]);

// Ð¢Ð°Ðº Ð¶Ðµ ÑÐ°Ð¼Ð¾ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ ÑÑ‚Ð¾ Ñ€ÐµÐ°Ð»Ð¸Ð·Ð¾Ð²Ð°Ñ‚ÑŒ Ð±Ð¾Ð»ÐµÐµ Ð¿Ñ€Ð¾ÑˆÐµ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÑ Ð¼ÐµÑ‚Ð¾Ð´ .find
const person = people.find(function (person) {
    // Ð²Ð¾Ð·Ñ€Ð°ÑˆÐ°ÐµÐ¼ Ñ‡Ñ‚Ð¾  person.budget Ð±ÑƒÐ´ÐµÑ‚ ÑÑ‚Ñ€Ð¾Ð³Ð¾Ðµ Ñ€Ð°Ð²Ð½ÐµÑÑ‚Ð²Ð¾ Ð½Ð° 3500
    return person.budget === 3500;
});
console.log(person); // Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð¼ Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð°Ñ‚ Ð²Ñ‹Ð²Ð¾Ð´Ð° Ð¾Ð±ÑŒÐµÐºÑ‚Ð° {name: &quot;Elena&quot;, budget: 3500}

// Ð¢Ð°Ðº Ð¶Ðµ ÑÐ°Ð¼Ð¾Ðµ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ñ‚ÑŒ ÑÑ‚Ð¾Ñ‚ Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð°Ñ‚ Ñ‡ÐµÑ€ÐµÐ· Ñ†Ð¸ÐºÐ» for
let findedPerson
for (const person of people) {
    if (person.budget == 3500) {
        findedPerson = person;
    }
}
console.log(findedPerson);
// Ð²ÑÐµ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚
// Ð Ñ‚ÐµÐ¿ÐµÑ€ÑŒ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ ÑÑ‚Ð¾ Ð²ÑÐµ ÑƒÐ¿Ñ€Ð¾ÑÑ‚Ð¸Ñ‚ÑŒ Ñ‡ÐµÑ€ÐµÐ· ÑÑ‚Ñ€Ð¾Ñ‡Ð½ÑƒÑŽ Ñ„ÑƒÐ½ÐºÑ†Ð¸ÑŽ
const person2 = people.find((person) =&gt; {
    return person.budget === 3500;
    })
console.log(person2);
// ÑÑ‚Ð¾ Ð²Ñ‹Ñ€Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð¼Ñ‹ Ð¼Ð¾Ð¶ÐµÐ¼ Ð½Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ Ð±Ð¾Ð»ÐµÐµ Ð¿Ñ€Ð¾ÑˆÐµ Ð½Ð°Ð¿Ð¸ÑÐ°Ñ‚ÑŒ ÐµÐµ Ð² Ð¾Ð´Ð½Ñƒ ÑÑ‚Ñ€Ð¾Ñ‡ÐºÑƒ
const person3 = people.find(person =&gt; person.budget === 3500);
console.log(person3);

// ÐŸÑ€Ð¾Ð´Ð¾Ð»Ð¶ÐµÐ½Ð¸Ðµ Ð¸Ð·ÑƒÑ‡ÐµÐ½Ð¸Ðµ Ð¼Ð°ÑÑÐ¸Ð²Ð°
console.log(cars1.includes(&#039;ÐœÐ°Ð·Ð´Ð°&#039;));  // ÐŸÑ€Ð¾Ð²ÐµÑ€ÑÐµÑ‚ ÐµÑÐ»Ð¸ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚ Ð² Ð¼Ð°ÑÐ¸Ð²Ðµ true/false
// .map
// ÐœÐµÑ‚Ð¾Ð´ map() ÑÐ¾Ð·Ð´Ð°Ñ‘Ñ‚ Ð½Ð¾Ð²Ñ‹Ð¹ Ð¼Ð°ÑÑÐ¸Ð² Ñ Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð°Ñ‚Ð¾Ð¼ Ð²Ñ‹Ð·Ð¾Ð²Ð° ÑƒÐºÐ°Ð·Ð°Ð½Ð½Ð¾Ð¹ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð´Ð»Ñ ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð¼Ð°ÑÑÐ¸Ð²Ð°.
const upperCaseCars = cars1.map(car =&gt;{
    return car.toUpperCase();
})
console.log(upperCaseCars); // Ð¸ Ð¼Ñ‹ Ð¿Ð¾Ð»ÑƒÑ‡Ð°ÐµÐ¼ Ð²ÑÐµ Ñ Ð±Ð¾Ð»ÑŒÑˆÐ¾Ð¹ Ð±ÑƒÐºÐ²Ñ‹
// Ð¾Ñ€Ð¸Ð³ÐµÐ½Ð°Ð» Ð½Ðµ Ñ‚Ñ€Ð¾Ð½ÑƒÑ‚
const pow2fib = fib.map(num =&gt; num ** 2);
console.log(pow2fib); // Ð²Ð¸Ð´ÐµÐ¼ Ñ‡Ñ‚Ð¾ Ð²ÑÐµ Ð²Ð¾Ð·Ð²ÐµÐ´ÐµÐ½Ð¾ Ð²Ð¾ Ð²Ñ‚Ð¾Ñ€ÑƒÑŽ ÑÑ‚ÐµÐ¿ÐµÐ½ÑŒ
// Ð¼ÐµÑ‚Ð¾Ð´ Ñ„Ð¸Ð»ÑŒÑ€Ð°Ñ†Ð¸Ð¸ Ð±ÐµÑ€ÐµÐ¼ Ð¼Ð°ÑÐ¸Ð² Ð¸ Ð¼Ñ‹ ÐµÐ³Ð¾ Ð¾Ñ‚ÑÐµÐµÐ¼ Ð²Ñ‹Ð²ÐµÑÑ‚Ð¸ Ð½Ð° ÑÐºÑ€Ð°Ð½ Ð²ÑÐµ Ñ‡Ñ‚Ð¾ Ð±Ð¾Ð»ÑŒÑˆÐµ 20
const filteredNumbers = pow2fib.filter(num =&gt; num &gt; 20);
console.log(pow2fib); // Ð½Ðµ Ñ‚Ñ€Ð¾Ð½ÑƒÑ‚Ñ‹Ð¹ Ð¼Ð°ÑÐ¸Ð²  [1, 1, 4, 9, 25, 144]
console.log(filteredNumbers);  // Ð¿Ð¾Ð»ÑƒÑ‡ÐµÐ½ Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð°Ñ‚  [25, 144]
');
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