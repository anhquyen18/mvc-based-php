Create Table posts(
    id int (11) not null auto_increment,
    title varchar(128) not null,
    content text not null,
    created_at timestamp not null default current_timestamp,
    primary key (id),
    key created_at (created_at)
) engine=innoDB default charset=utf8;

insert into posts (title,content) values
('First post', 'This is a really interesting post.'),
('Second post', 'This is a really interesting post 2.'),
('Third post', 'This is a really interesting post 3.');