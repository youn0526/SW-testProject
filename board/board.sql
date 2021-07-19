use sqldb;
show tables;
create table board(
	num     int          auto_increment primary key,
	writer  varchar(12)  not null,
	title   varchar(50)  not null,
	content varchar(4000),
	pwd     varchar(12)  not null,
	hit     int          not null,
	regdate date         not null
);
desc board;
select * from board;

drop table board;