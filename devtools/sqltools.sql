SELECT
	s.*,
	SUM(s.stock) AS stock_total
FROM (
	SELECT
		id.id AS id,
		p.id AS products_id,
		pa.detail AS pa_detail,
		p.units AS products_units,
		p.detail AS products_detail,
		id.quantity AS entrada,
		id.created_at AS fecha_entrada,
		od.created_at AS fecha_salida,
		SUM(IFNULL(od.quantity, 0)) AS salidas,
		id.quantity - SUM(IFNULL(od.quantity, 0)) AS stock, 
		IFNULL(l.name, 'null') AS locations_name,
		IFNULL(po.minimum, 0) AS po_minimum,
		IFNULL(po.permanent, 0) AS po_permanent,
		IFNULL(po.duration, 0) AS po_duration
	FROM input_details AS id
	LEFT JOIN inputs AS i ON i.id = id.inputs_id
	LEFT JOIN output_details AS od ON od.input_details_id = id.id
	LEFT JOIN products AS p ON p.id = id.products_id
	LEFT JOIN product_options AS po ON p.id = po.products_id
	LEFT JOIN locations AS l ON l.id = po.locations_id
	LEFT JOIN packings AS pa ON pa.id = p.packings_id
	WHERE i.locations_id = 1 
	AND po.locations_id = 1
	GROUP BY id.id
	ORDER BY id.created_at, od.created_at DESC
) AS s
GROUP BY s.products_id;


SELECT
	s.*,
	SUM(s.stock) AS sock_total
FROM (
	SELECT
		po.id,
		p.id AS products_id,
		l.name AS ubicacion,
		p.detail AS product_name,
		IFNULL(id.quantity, 0) AS cantidad_entrada,
		SUM(IFNULL(od.quantity, 0)) AS total_salidas,
		(IFNULL(id.quantity, 0) - SUM(IFNULL(od.quantity, 0))) AS stock,
		MAX(od.created_at) AS fecha_ultima_salida,
		po.minimum,
		po.permanent,
		po.duration
	FROM product_options AS po
	LEFT JOIN products AS p ON p.id = po.products_id
	LEFT JOIN locations AS l ON l.id = po.locations_id
	LEFT JOIN input_details AS id ON id.products_id = po.products_id
	LEFT JOIN inputs AS i ON i.id = id.inputs_id
	LEFT JOIN output_details AS od ON od.input_details_id = id.id
	WHERE po.locations_id = 1
	GROUP BY po.products_id
) AS s
ORDER BY s.stock ASC;


SELECT
	p.detail AS products_detail,
	SUM(id.quantity) AS entradas,
	po.minimum,
	po.permanent,
	po.duration
FROM product_options AS po
LEFT JOIN products AS p ON p.id = po.products_id
LEFT JOIN input_details AS id ON id.products_id = po.products_id
WHERE po.locations_id = 1
GROUP BY po.products_id;

SELECT
	s.*
FROM (
	SELECT
		id.id AS id,
		p.id AS products_id,
		l.name AS ubicacion,
		c.detail AS categoria,
		p.detail AS product_name,
		id.created_at AS fecha_entrada,
		id.quantity AS cantidad_entrada,
		SUM(IFNULL(od.quantity, 0)) AS total_salidas,
		(id.quantity - SUM(IFNULL(od.quantity, 0))) AS stock,
		MAX(od.created_at) AS fecha_ultima_salida
	FROM input_details AS id
	LEFT JOIN products AS p ON p.id = id.products_id
	LEFT JOIN output_details AS od ON id.id = od.input_details_id
	LEFT JOIN inputs AS i ON i.id = id.inputs_id
	LEFT JOIN locations AS l ON l.id = i.locations_id
	LEFT JOIN categories AS c ON c.id = p.categories_id
	WHERE IFNULL(od.flagstate, 1) = 1
	AND i.locations_id = 1
	GROUP BY id.id
) AS s
WHERE s.stock > 0;


