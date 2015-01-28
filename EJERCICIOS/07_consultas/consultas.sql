
-- usuarios que están en barcelona
SELECT * FROM users, cities 
WHERE users.cities_idcity = cities.idcity AND cities.city = 'Barcelona';

-- ciudades que no tienen usuarios
SELECT DISTINCT cities.city 
FROM cities 
WHERE NOT EXISTS 
	(SELECT city FROM users WHERE cities.idcity=users.cities_idcity);
-- o hacer un left join y preguntar por los campos que son null

-- usuarios y sus hobbies
SELECT *
FROM users, hobbies, users_has_hobbies
WHERE users.iduser = users_has_hobbies.users_iduser 
	AND users_has_hobbies.hobbies_idhobby = hobbies.idhobby;

-- usuarios con hobbies separados por comas
SELECT users.name, GROUP_CONCAT(hobbies.hobby)
FROM users, hobbies, users_has_hobbies
WHERE users.iduser = users_has_hobbies.users_iduser 
	AND users_has_hobbies.hobbies_idhobby = hobbies.idhobby
    GROUP BY iduser
    ;

-- INSERT!!!
INSERT INTO cities (city) VALUES ('Albacete');
INSERT INTO users (iduser, name, email, password, cities_idcity, genders_idgender) 
		VALUES ('user5','minombre','blab@la.com','123123','1','1');
        
INSERT INTO users SET iduser = 'user6',
						name = 'nombre2',
						email = 'bbb@ggg.com',
						password = '11231',
						cities_idcity = '1',
						genders_idgender = '2';
                        
UPDATE users SET
						name = 'nombre2a',
						email = 'b1111@ggg.com'
			WHERE iduser = 'user6';
            
INSERT INTO users SET iduser = 'user7',
						name = 'nombre2',
						email = 'bbb@ggg.com',
						password = '11231',
						cities_idcity = '1',
						genders_idgender = '2';
DELETE FROM users WHERE iduser = 'user7';
