Algoritmo login
	Definir  password Como Caracter
	Definir usuario Como Caracter
	Definir user Como Caracter
	Definir userPass Como Caracter
	Definir sesion Como Entero
	
	password = "123456"
	usuario = "Admin"
	sesion <- 0
	
	Mientras (sesion == 0)
		Escribir  "Ingrese su usuario"
		Leer user
	
		Escribir  "Ingrese la contrase�a"
		Leer userPass
	
		Si ( user == usuario ) Entonces
			Si ( userPass == password ) Entonces
				Escribir  "Ingresaste al Sistema"
				sesion <- 1
			SiNo
				Escribir "La contrase�a es incorrecta"
			FinSi
		SiNo
			Escribir "El usuario es Incorrecto"
		FinSi
	FinMientras

FinAlgoritmo
