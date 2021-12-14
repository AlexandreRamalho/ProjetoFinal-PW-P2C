para funcionalidade total da aplicação deve ser criado um banco de dados "database_projeto" com duas tabelas distintas: "pacientes" e "usuarios";

as tabelas devem ser organizadas da seguinte forma:
    
    pacientes:
        1ª coluna = nome -> ID; tipo -> int; extra -> AUTO_INCREMENT(AI);
        2ª coluna = nome -> nome; tipo -> varchar; agrupamento -> utf8mb4_general_ci; 
        3ª coluna = nome -> idade; tipo -> int;
        4ª coluna = nome -> peso; tipo -> float;
        5ª coluna = nome -> altura; tipo -> float;
    
    usuarios:
        1ª coluna = nome -> ID; tipo -> int; extra -> AUTO_INCREMENT(AI);
        2ª coluna = nome -> email; tipo -> varchar; agrupamento -> utf8mb4_general_ci;
        3ª coluna = nome -> senha; tipo -> varchar; agrupamento -> utf8mb4_general_ci;

*caso as tabelas sejam organizadas de maneira diferente ou com outros nomes as devidas alterações devem ser efetuadas nos arquivos da pasta "funcoes_db" para a compatibilidade ser restaurada, caso contrario, o servidor não conseguirá enviar/solicitar as informações do banco de dados.* 
