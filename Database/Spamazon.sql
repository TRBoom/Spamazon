
create database spamazon;

use spamazon;

create table book
	(bookNo		varchar(15),
	 title		varchar(255),
	 price		decimal(10,2),
	 subject	varchar(255),
	 publishDate DATE,
	 primary key (bookNo)
	);
create table author
	(authorName		varchar(255),
	 authorNo	varchar(15),
	 bio		varchar(1000), 
	 primary key (authorNo)
	);
create table wroteBy
	(bookNo		varchar(15), 
	 authorNo		varchar(15), 
	 primary key (bookNo, authorNo),
	 foreign key (bookNo) references book(bookNo),
	 foreign key (authorNo) references book(authorNo)
	);
create table users
	(email		varchar(255), 
	 userName		varchar(255), 
	 address		varchar(255),
	 password		varchar(255),
	 paymentInfo		varchar(255), 	 
	 primary key (email)
	);
create table cart
	(bookNo		varchar(15), 
	 email		varchar(255), 	 
	 primary key (email,bookNo),
	 foreign key (bookNo) references book(bookNo),
	 foreign key (email) references users(email)
	);		

