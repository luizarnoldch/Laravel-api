use api_crud_vue;

DELIMITER //
CREATE PROCEDURE GetAllProducto()
BEGIN
	SELECT * from productos;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE GetProducto(IN data JSON)
BEGIN
	set @id_producto := json_unquote(json_extract(data,'$.id'));
	SELECT * from productos WHERE id = @id_producto;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE PostProducto(IN data JSON)
BEGIN
	SET @id_producto := json_unquote(json_extract(data,'$.id'));
	SET @nombre_producto := json_unquote(json_extract(data,'$.nombre'));
	SET @precio_producto := json_unquote(json_extract(data,'$.precio'));
	SET @stock_producto := json_unquote(json_extract(data,'$.stock'));

	INSERT INTO productos(nombre,precio,stock) VALUES
		(@nombre_producto, @precio_producto, @stock_producto);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE PutProducto(IN data JSON)
BEGIN
	SET @id_producto := json_unquote(json_extract(data,'$.id'));
    SET @nombre_producto := json_unquote(json_extract(data,'$.nombre'));
	SET @precio_producto := json_unquote(json_extract(data,'$.precio'));
	SET @stock_producto := json_unquote(json_extract(data,'$.stock'));
	UPDATE productos
		SET
			nombre = @nombre_producto,
			precio = @precio_producto,
			stock  = @stock_producto
	WHERE
		id = @id_producto;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeleteProducto(IN data JSON )
BEGIN
	SET @id_producto := json_unquote(json_extract(data,'$.id'));
	DELETE FROM productos WHERE id = @id_producto;
END //
DELIMITER ;