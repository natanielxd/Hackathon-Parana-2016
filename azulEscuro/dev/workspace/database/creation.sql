

CREATE TABLE Problema(
   id serial NOT NULL,	
   timestamp DATE NOT NULL,
   latitude  VARCHAR(25)  NOT NULL,
   longitude VARCHAR(25)  NOT NULL,
   tipo INT NOT NULL,
   observacao VARCHAR(140) NOT NULL,
   userId VARCHAR(25),
   PRIMARY KEY(id),
   FOREIGN KEY(login) 
	REFERENCES Usuario(login),
   FOREIGN KEY(tipo) 
        REFERENCES PROBLEMA_TIPO(id)
);