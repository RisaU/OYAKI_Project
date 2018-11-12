
/**
 * CREATE TABE
 *  store_categories
 *  store_items
 *  store_item_size
 *  store_item_color
 */
DROP TABLE IF EXISTS store_categories;
CREATE TABLE store_categories (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cat_title VARCHAR(50) UNIQUE,
    cat_desc TEXT
);
DROP TABLE IF EXISTS store_items;
CREATE TABLE store_items (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cat_id INT NOT NULL,
    item_title VARCHAR(75),
    item_price FLOAT(8,2),
    item_desc TEXT,
    item_image VARCHAR(50)
);
/* This is for management inventory*/
DROP TABLE IF EXISTS store_item_stock;
CREATE TABLE store_item_stock (
    item_id INT PRIMARY KEY,
    stock_qty INT NOT NULL,
    update_time DATETIME,
    FOREIGN KEY(item_id) REFERENCES store_items(id)
);


/*
CREATE TABLE store_item_size (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    item_size VARCHAR(25)
);
CREATE TABLE store_item_color(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    item_color VARCHAR(25)
);
*/


/**
 * INSERT DATA
 */
/* store_categories */
INSERT INTO store_categories VALUES
('1', 'Meats', 'A unique blend of African heritage and Australian influences!');
INSERT INTO store_categories VALUES
('2', 'Vegetables', 'Find healthy, delicious vegetable foods.');
INSERT INTO store_categories VALUES
('3', 'Sweets', 'Never feel guilty about eating a little sweet stuff when choosing from this list!');

/* store_items */
INSERT INTO store_items VALUES
('1', '1', 'Beef OYAKI', '12.00', 'Traditional, good for a lunch.', 'beef.jpg');
INSERT INTO store_items VALUES
('2', '1', 'Chichek OYAKI', '52.00', 'Healthy but gut-busting.', 'chicken.jpg');
INSERT INTO store_items VALUES
('3', '1', 'Pork OYAKI', '102.00', 'Good for costumes.', 'pork.jpg');
INSERT INTO store_items VALUES
('4', '2', 'Eggplant OYAKI', '12.00', '100% organic.', 'eggplant.jpg');
INSERT INTO store_items VALUES
('5', '2', 'Pumpkin OYAKI', '15.00', "Good for when you are a little bit hungry.",'pumpkin.jpg');
INSERT INTO store_items VALUES
('6', '2', 'Nozawana-pickles OYAKI', '22.00', 'Traditional taste in Japan.', 'nozawana.jpg');
INSERT INTO store_items VALUES
('7', '3', 'Sweet Beans OYAKI', '12.00', "JTraditional sweet in Japan.", 'sweetbeans.jpg');
INSERT INTO store_items VALUES
('8', '3', 'Nutella and Banana OYAKI', '35.00', 'Collaboration with japan and Australia.', 'nutellaandbanana.jpg');
INSERT INTO store_items VALUES
('9', '3', 'Chicago OYAKI', '9.99', 'Just try it!', 'chicago.jpg');

/* store_item_sotck */
INSERT INTO store_item_stock VALUES
(1, 100, '2018-11-09 12:00:00'),
(2, 98, '2018-11-09 12:00:00'),
(3, 97, '2018-11-09 12:00:00'),
(4, 96, '2018-11-09 12:00:00'),
(5, 95, '2018-11-09 12:00:00'),
(6, 94, '2018-11-09 12:00:00'),
(7, 93, '2018-11-09 12:00:00'),
(8, 92, '2018-11-09 12:00:00'),
(9, 91, '2018-11-09 12:00:00');

/* store_item_size */
-- INSERT INTO store_item_size (item_id, item_size) VALUES (1, 'One Size Fits All');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (2, 'One Size Fits All');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (3, 'One Size Fits All');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (4, 'S');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (4, 'M');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (4, 'L');
-- INSERT INTO store_item_size (item_id, item_size) VALUES (4, 'XL');

/* store_item_color */
-- INSERT INTO store_item_color (item_id, item_color) VALUES (1, 'red');
-- INSERT INTO store_item_color (item_id, item_color) VALUES (1, 'black');
-- INSERT INTO store_item_color (item_id, item_color) VALUES (1, 'blue');



/**
* ** TABLE **
* store_shoppertrack 
* This is the table used to hold items as users add them to their shopping cart.
*
* ** FIELD **
* session_id: identifies the user = PHP session ID
* sel_item_qty: selected quantity of the item
*/
DROP TABLE IF EXISTS store_shoppertrack;
CREATE TABLE store_shoppertrack (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    session_id VARCHAR(32),
    sel_item_id INT,
    sel_item_qty SMALLINT,
    sel_item_size VARCHAR(25),
    sel_item_color VARCHAR(25),
    date_added DATETIME
);
/**
* ** TABLE **
* store_orders 
*
* EMUN型では文字列定数をリスト
*/
DROP TABLE IF EXISTS store_orders;
CREATE TABLE store_orders (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_date DATETIME,
    order_name VARCHAR(100),
    order_address VARCHAR(255),
    order_city VARCHAR(50),
    order_state CHAR(2),
    order_zip VARCHAR(10),
    order_tel VARCHAR(25),
    order_email VARCHAR(100),
    item_total FLOAT(6,2),
    shipping_total FLOAT(6,2),
    authorization VARCHAR(50),
    status ENUM('processed', 'pending')
);
/**
* ** TABLE **
* store_orders_items 
*/
DROP TABLE IF EXISTS store_orders_items;
CREATE TABLE store_orders_items (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    sel_item_id INT,
    sel_item_qty SMALLINT,
    sel_item_size VARCHAR(25),
    sel_item_color VARCHAR(25),
    sel_item_price FLOAT(6,2)
);
