create table Jonnys (
	name string,
	team string,
	bornln string,
	bloodType string,
	birthYear int,
	age int
);

insert into Jonnys
(name, team, bornln, bloodType, birthYear)
values
(nakai, smap, kanagawa, a, 1972),
(kimura, smap, tokyo, o, 1972),
(inagaki, smap, tokyo, o, 1973),
(kusanagi, smap, saitama, a, 1974),
(ohno, arashi, tokyo, a, 1980),
(sakurai, arashi, tokyo, a, 1982),
(aiba, arashi, chiba, ab, 1982),
(ninomiya, arashi, tokyo, a, 1983),
(matsumoto, arashi, tokyo, a, 1983);

update Jonnys set age = 2018 - birthYear;

delete from Jonnys where team = 'smap';