create table if not exists attribute (
	attribute_id	INT				not null 	auto_increment,
	name			VARCHAR(100)	not null,
	primary key(attribute_id)	
) engine=MyISAM;

insert into attribute (attribute_id, name) 
values
	(1, 'Size'), (2, 'Color');

create table attribute_value ( 
	attribute_value_id		INT				not null	auto_increment,
	attribute_id			INT				not null,
	value					VARCHAR(100)	not null,
	primary key(attribute_value_id), 
	key	idx_attribute_value_attribute_id(attribute_id)
) engine=MyISAM;

insert into attribute_value (attribute_value_id, attribute_id, value)
values (1, 1, 'S'), (2, 1, 'M'), (3, 1, 'L'), (4, 1, 'XL'), (5, 1, 'XXL'),
	(6, 2, 'White'), (7, 2, 'Black'), (8, 2, 'Red'), (9, 2, 'Orange'),
	(10, 2, 'Yellow'), (11, 2, 'Green'), (12, 2, 'Blue'),
	(13, 2, 'Indigo'), (14, 2, 'Purple');

create table product_attribute (
	product_id			INT		not null,
	attribute_value_id	INT		not null,
	primary key(product_id, attribute_value_id)
) engine=MyISAM;

insert into product_attribute (product_id, attribute_value_id) 
	select p.product_id, av.attribute_value_id
	from	product p, attribute_value av;

delimiter $$

create procedure catalog_get_product_attributes(in inProductId INT)
begin
	select a.name as attribute_name,
		av.attribute_value_id, av.value as attribute_value 
	from attribute_value av 
	inner join attribute a 
		on av.attribute_id = a.attribute_id 
	where av.attribute_value_id in 
		(select attribute_value_id 
			from product_attribute 
			where product_id = inProductId)
	order by a.name;
end$$

delimiter ;



	