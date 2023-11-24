DELIMITER //
CREATE PROCEDURE MostrarCuenta(IN p_email VARCHAR(255), OUT p_result INT)
BEGIN
    DECLARE user_id INT;
    DECLARE user_name VARCHAR(255);
    DECLARE user_email VARCHAR(255);

    -- Inicializa el resultado
    SET p_result = 0;

    -- Busca el usuario basándose en el correo electrónico
    SELECT idUsuario, nombre, correo INTO user_id, user_name, user_email
    FROM usuario
    WHERE correo = p_email
    LIMIT 1;

    -- Comprueba si se encontró el usuario
    IF user_id IS NOT NULL THEN
        -- Si el usuario se encuentra, establece el resultado en 1
        SET p_result = 1;
    END IF;

    -- Devuelve información relevante como resultado del procedimiento almacenado
    IF p_result = 1 THEN
        SELECT user_id AS idUsuario, user_name AS nombre, user_email AS correo;
    END IF;
END //
DELIMITER ;