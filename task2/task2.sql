--------------------TASK 2--------------------
/* Поскольку условием задания является хранение только авторов и книг, база данных будет состоять
из одной таблицы с аттрибутами author_name и book_name, где имя одного автора будет повторяться столько раз,
сколько книг он написал, а название книги - столько раз, сколько авторов участвовали в ее написании.
Для проверки правильности решения, пусть в базе данных будет 3 автора, один из которых написал 7 или больше книг */

create table authors_n_books (author_name varchar(20), book_name varchar(100));

-- Тестовые данные хранятся в файле library.csv
copy authors_n_books from 'library.csv' delimiter ',' csv header;
select * from authors_n_books;

/*  Поскольку имя автора в таблице повторяется столько раз, сколько книг он написал, для выполнения задания необходимо будет 
вывести имена авторов, которые повторяются в таблице меньше 7 раз.
Автор 'A' написал 7 книг, то есть результатом запроса, указанного в задании, должны быть 2 строки: имена авторов 'B' и 'C' */ 

select author_name from 
(select author_name, count(author_name) as n_of_books from authors_n_books group by author_name) as book_count 
where n_of_books<7;
