CREATE TABLE Usuario
(
  nome VARCHAR(45)   NOT NULL,
  login VARCHAR(25)  NOT NULL,
  perfil VARCHAR(40)  NOT NULL,
  passwordx VARCHAR(15) NOT NULL, 
  PRIMARY KEY (login)
);

CREATE TABLE LocationPoint
(
   id serial NOT NULL,	
   timestamp DATE NOT NULL,
   latitude VARCHAR(25)  NOT NULL,
   longitude VARCHAR(25)  NOT NULL,  
   login VARCHAR(25) NOT NULL,

   FOREIGN KEY(login) 
	REFERENCES Usuario(login),
   PRIMARY KEY(id)
);

CREATE TABLE PROBLEMA_TIPO{
   id serial NOT NULL,
   desc VARCHAR(25) NOT NULL,
   PRIMARY KEY(id)

}

CREATE TABLE Problema(
   id serial NOT NULL,	
   timestamp DATE NOT NULL,
   latitude  VARCHAR(25)  NOT NULL,
   longitude VARCHAR(25)  NOT NULL,
   



)

CREATE TABLE Viagem(
   id serial NOT NULL,	
   timeSrc DATE NOT NULL, 
   

)