CREATE DATABASE IF NOT Exists oyaki;
USE oyaki;

DROP TABLE IF EXISTS post;
CREATE TABLE IF NOT EXISTS post(
    no SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    topic VARCHAR(50),
    category VARCHAR(50),
    content TEXT NOT NULL,
    post_date TIMESTAMP
);

DROP TABLE IF EXISTS comment;
CREATE TABLE IF NOT EXISTS comment(
    no SERIAL PRIMARY KEY,
    post_no INT,
    name varchar(50),
    content TEXT,
    time TIMESTAMP
);


TRUNCATE TABLE post;
INSERT INTO post(no, title, content, post_date) VALUES
(1, 'Updated the homepage', 
'Lorem ipsum dolor sit amet, mel viderer veritus et. 
Id his ullum dicam adipisci, ei tritani apeirian his, singulis sadipscing sit eu. 
Vocent gubergren ius eu, quo cetero feugait no, ius eu quaeque omittam iudicabit. 
Eos nullam consequat democritum eu, esse imperdiet pri cu. 
Sit veritus persecuti at, id eum appetere urbanitas, at pro natum necessitatibus.',
"2018-07-02 00:00:00"),
(2, 'Gift for mum!', 'Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', "2018-06-03 00:00:00")
;

INSERT INTO comment(no, post_no, name, content) VALUES
(1, 1, 'Taro', 'This is a comment for article 1'),
(2, 1, 'Hanako', 'This is a comment for article 1')
;